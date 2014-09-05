<?php

class CategoryModel extends CFormModel {

    public function __construct() {
        
    }

    public function get_all($args) {

        $custom = "";
        $params = array();

        if (isset($args['s']) && $args['s'] != "") {
            $custom.= " AND vc.title like :title";
            $params[] = array('name' => ':title', 'value' => "%$args[s]%", 'type' => PDO::PARAM_STR);
        }

        if (isset($args['deleted'])) {
            $custom.= " AND vc.deleted = :deleted";
            $params[] = array('name' => ':deleted', 'value' => $args['deleted'], 'type' => PDO::PARAM_INT);
        }

        /* */
        $sql = "SELECT *
                FROM categories vc
                LEFT JOIN category_metas cm ON cm.category_id = vc.id
                WHERE 1
                $custom
                ORDER BY vc.position ASC
                ";

        $command = Yii::app()->db->createCommand($sql);

        foreach ($params as $a)
            $command->bindParam($a['name'], $a['value'], $a['type']);


        return $command->queryAll();
    }

    public function gets($args, $page = 1, $ppp = 20) {
        $page = ($page - 1) * $ppp;
        $custom = "";
        $params = array();

        if (isset($args['s']) && $args['s'] != "") {
            $custom.= " AND vc.title like :title";
            $params[] = array('name' => ':title', 'value' => "%$args[s]%", 'type' => PDO::PARAM_STR);
        }

        if (isset($args['deleted'])) {
            $custom.= " AND vc.deleted = :deleted";
            $params[] = array('name' => ':deleted', 'value' => $args['deleted'], 'type' => PDO::PARAM_INT);
        }



        if (isset($args['parent'])) {
            $custom.= " AND vc.parent = :parent";
            $params[] = array('name' => ':parent', 'value' => $args['parent'], 'type' => PDO::PARAM_STR);
        }
        if (isset($args['remove'])) {
            $custom.= " AND vc.id != :remove";
            $params[] = array('name' => ':remove', 'value' => $args['remove'], 'type' => PDO::PARAM_STR);
        }

        if (isset($args['small']) && $args['small'] != 0) {
            $custom.= " AND vc.position >= :small";
            $params[] = array('name' => ':small', 'value' => $args['small'], 'type' => PDO::PARAM_INT);
        }
        if (isset($args['larg']) && $args['larg'] != 0) {
            $custom.= " AND vc.position <= :larg";
            $params[] = array('name' => ':larg', 'value' => $args['larg'], 'type' => PDO::PARAM_INT);
        }
        /* LEFT JOIN category_metas cm ON cm.category_id = vc.id */
        $sql = "SELECT vc.*,cm.title, cm.slug, cm.language
                FROM categories vc
                LEFT JOIN category_metas cm ON vc.id = cm.category_id AND cm.language = 1
                WHERE 1
                $custom
                ORDER BY vc.position ASC
                LIMIT :page,:ppp";

        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":page", $page, PDO::PARAM_INT);
        $command->bindParam(":ppp", $ppp, PDO::PARAM_INT);
        foreach ($params as $a)
            $command->bindParam($a['name'], $a['value'], $a['type']);


        return $command->queryAll();
    }

    public function counts($args) {

        $custom = "";
        $params = array();

        if (isset($args['s']) && $args['s'] != "") {
            $custom.= " AND vc.title like :title";
            $params[] = array('name' => ':title', 'value' => "%$args[s]%", 'type' => PDO::PARAM_STR);
        }

        if (isset($args['deleted'])) {
            $custom.= " AND vc.deleted = :deleted";
            $params[] = array('name' => ':deleted', 'value' => $args['deleted'], 'type' => PDO::PARAM_INT);
        }


        if (isset($args['parent'])) {
            $custom.= " AND vc.parent = :parent";
            $params[] = array('name' => ':parent', 'value' => $args['parent'], 'type' => PDO::PARAM_STR);
        }

        $sql = "SELECT count(*) as total
                FROM categories vc
                WHERE 1
                $custom
                ";
        $command = Yii::app()->db->createCommand($sql);
        foreach ($params as $a)
            $command->bindParam($a['name'], $a['value'], $a['type']);

        $count = $command->queryRow();
        return $count['total'];
    }

    public function get($id) {
        $sql = "SELECT vc.*,cm.title, cm.slug, cm.language
                FROM categories vc
                LEFT JOIN category_metas cm ON vc.id = cm.category_id AND cm.language = 1
                WHERE vc.id = :id
                ";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":id", $id, PDO::PARAM_INT);
        return $command->queryRow();
    }

    public function get_with_lang($id) {
        $sql = "SELECT vc.*,cm.title, cm.slug, cm.language
                FROM categories vc
                LEFT JOIN category_metas cm ON vc.id = cm.category_id 
                WHERE vc.id = :id
                ";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":id", $id, PDO::PARAM_INT);
        return $command->queryAll();
    }

    public function add($parent, $position = '') {


        $time = time();

        $sql = "INSERT INTO categories(parent,position,date_added) VALUES(:parent,:position,:date_added)";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":parent", $parent);
        $command->bindParam(":position", $position);
        $command->bindParam(":date_added", $time);
        $command->execute();
        return Yii::app()->db->lastInsertID;
    }

    public function add_metas($id, $title, $slug, $lang) {
        $count_slug = $this->check_exist_slug($slug);
        if ($count_slug > 0)
            $slug = $slug . "-" . $count_slug;
        $sql = "INSERT INTO category_metas(category_id,title,slug,language) VALUES(:category_id,:title,:slug,:language)";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":category_id", $id);
        $command->bindParam(":title", $title);
        $command->bindParam(":slug", $slug);
        $command->bindParam(":language", $lang);
        $command->execute();
        return Yii::app()->db->lastInsertID;
    }

    public function check_by_language($id, $lang) {
        $sql = "SELECT *
                FROM category_metas
                WHERE category_id = :id
                AND language = :language";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":id", $id, PDO::PARAM_INT);
        $command->bindParam(":language", $lang, PDO::PARAM_INT);
        return $command->queryRow();
    }

    public function check_exist_slug($slug) {
        $sql = 'SELECT count(slug) as count FROM category_metas WHERE slug REGEXP "^' . $slug . '(-[[:digit:]]+)?$"';
        $command = Yii::app()->db->createCommand($sql);
        $row = $command->queryRow();
        return $row['count'];
    }

    public function update($args) {
        $keys = array_keys($args);
        $custom = '';
        foreach ($keys as $k)
            $custom .= $k . ' = :' . $k . ', ';
        $custom = substr($custom, 0, strlen($custom) - 2);
        $sql = 'update categories set ' . $custom . ' where id = :id';
        $command = Yii::app()->db->createCommand($sql);
        return $command->execute($args);
    }

    public function update_metas($args) {
        $keys = array_keys($args);
        $custom = '';
        foreach ($keys as $k)
            $custom .= $k . ' = :' . $k . ', ';
        $custom = substr($custom, 0, strlen($custom) - 2);
        $sql = 'update category_metas set ' . $custom . ' where id = :id';
        $command = Yii::app()->db->createCommand($sql);
        return $command->execute($args);
    }

    public function get_child($parent) {
        $deleted = 0;
        $sql = "SELECT cm.*
                FROM categories c
                LEFT JOIN category_metas cm ON c.id = cm.category_id
                WHERE c.parent = :parent AND c.deleted = :deleted AND cm.language = :language
                ";
        $lang = 1;
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":parent", $parent, PDO::PARAM_INT);
        $command->bindParam(":deleted", $deleted, PDO::PARAM_INT);
        $command->bindParam(":language", $lang, PDO::PARAM_INT);

        return $command->queryAll();
    }

}