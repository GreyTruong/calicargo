<?php

class ItemModel extends CFormModel {

    public function __construct() {
        
    }

    public function gets($args, $category, $page = 1, $ppp = 20) {
        $page = ($page - 1) * $ppp;
        $custom = "";
        $params = array();


        if (isset($args['s']) && $args['s'] != "") {
            $custom.= " AND s.title like :title";
            $params[] = array('name' => ':title', 'value' => "%$args[s]%", 'type' => PDO::PARAM_STR);
        }


        if (isset($args['deleted'])) {
            $custom.= " AND s.deleted = :deleted";
            $params[] = array('name' => ':deleted', 'value' => $args['deleted'], 'type' => PDO::PARAM_INT);
        }

        $sql = "SELECT s.*,im.title,im.slug
                FROM items s
                LEFT JOIN item_metas im ON s.id = im.item_id  AND im.language_id = 1
                WHERE 1
                $custom
               ORDER BY s.id DESC
                LIMIT :page,:ppp";
        
        //print_r($sql);die;
        //AND (s.category_id LIKE :category )
        //     $category = "%,$category,%";

        
        $command = Yii::app()->db->createCommand($sql);

        // $command->bindParam(":category", $category, PDO::PARAM_INT);

        $command->bindParam(":page", $page, PDO::PARAM_INT);
        $command->bindParam(":ppp", $ppp, PDO::PARAM_INT);

        foreach ($params as $a)
            $command->bindParam($a['name'], $a['value'], $a['type']);


        return $command->queryAll();
    }

    public function counts($args, $category) {

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

        $sql = "SELECT count(*) as total
                FROM items vc
               WHERE 1 
                $custom
                ";
        // AND (vc.category_id LIKE :category)
        //$category = "%,$category,%";
        $command = Yii::app()->db->createCommand($sql);
        //$command->bindParam(":category", $category, PDO::PARAM_INT);
        foreach ($params as $a)
            $command->bindParam($a['name'], $a['value'], $a['type']);

        $count = $command->queryRow();
        return $count['total'];
    }

    public function get_alls($args, $page = 1, $ppp = 20) {
        $page = ($page - 1) * $ppp;
        $custom = "";
        $params = array();


        if (isset($args['s']) && $args['s'] != "") {
            $custom.= " AND s.title like :title";
            $params[] = array('name' => ':title', 'value' => "%$args[s]%", 'type' => PDO::PARAM_STR);
        }


        if (isset($args['deleted'])) {
            $custom.= " AND s.deleted = :deleted";
            $params[] = array('name' => ':deleted', 'value' => $args['deleted'], 'type' => PDO::PARAM_INT);
        }

        $sql = "SELECT s.*,ic.number,ic.img as color_image,im.data
                FROM items s
                LEFT JOIN item_metas im ON s.id = im.taget_id AND im.type = :type
                LEFT JOIN item_colors ic ON s.img = ic.id  AND ic.deleted = :ic_deleted
                WHERE 1 $custom
               ORDER BY s.id DESC
                LIMIT :page,:ppp";

        $ic_deleted = 0;
        $type = 'product';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":ic_deleted", $ic_deleted, PDO::PARAM_INT);

        $command->bindParam(":type", $type, PDO::PARAM_INT);
        $command->bindParam(":page", $page, PDO::PARAM_INT);
        $command->bindParam(":ppp", $ppp, PDO::PARAM_INT);
        foreach ($params as $a)
            $command->bindParam($a['name'], $a['value'], $a['type']);

        return $command->queryAll();
    }

    public function count_alls($args) {

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

        $sql = "SELECT count(*) as total
                FROM items vc
                WHERE 1 $custom
                $custom
                ";
        $command = Yii::app()->db->createCommand($sql);

        foreach ($params as $a)
            $command->bindParam($a['name'], $a['value'], $a['type']);

        $count = $command->queryRow();
        return $count['total'];
    }

    public function get($id) {
        $sql = "SELECT i.*, im.title,im.slug,im.language_id
            FROM items i 
            LEFT JOIN item_metas im ON i.id = im.item_id 
            WHERE i.id = :id";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":id", $id, PDO::PARAM_INT);
        return $command->queryAll();
    }

    public function get_images($id) {
        $sql = "SELECT *
            FROM item_images 
            WHERE color = :id";

        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":id", $id, PDO::PARAM_INT);
        return $command->queryAll();
    }

    public function get_colors($id) {
        $sql = "SELECT c.*,m.data
            FROM item_colors c
            LEFT JOIN item_metas m ON c.id = m.taget_id AND m.type = :type
            WHERE c.item = :id AND c.deleted = :ic_deleted";
        $ic_deleted = 0;
        $type = 'color';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":ic_deleted", $ic_deleted, PDO::PARAM_INT);
        $command->bindParam(":id", $id, PDO::PARAM_INT);
        $command->bindParam(":type", $type);
        return $command->queryAll();
    }

    public function get_color($id) {
        $sql = "SELECT c.*,m.data
            FROM item_colors c
            LEFT JOIN item_metas m ON c.id = m.taget_id AND m.type = :type
            WHERE c.id = :id AND c.deleted = :ic_deleted";
        $ic_deleted = 0;
        $type = 'color';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":ic_deleted", $ic_deleted, PDO::PARAM_INT);
        $command->bindParam(":id", $id, PDO::PARAM_INT);
        $command->bindParam(":type", $type);
        return $command->queryRow();
    }

    public function check_item_lang($id, $lang) {
        $sql = "SELECT *
                FROM item_metas
                WHERE item_id = :id
                AND language_id = :language";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":id", $id, PDO::PARAM_INT);
        $command->bindParam(":language", $lang, PDO::PARAM_INT);
        return $command->queryRow();
    }

    public function add($category, $code, $url, $price, $number, $disabled) {

        $sql = "INSERT INTO items(category_id,code,img,price,number,disabled,date_added) 
            VALUES(:category_id,:code,:img,:price,:number,:disabled,:date_added)";
        $time = time();
        $command = Yii::app()->db->createCommand($sql);

        $command->bindParam(":category_id", $category, PDO::PARAM_INT);
        $command->bindParam(":code", $code);
        $command->bindParam(":img", $url);
        $command->bindParam(":price", $price);
        $command->bindParam(":number", $number);
        $command->bindParam(":disabled", $disabled);
        $command->bindParam(":date_added", $time);

        $command->execute();
        return Yii::app()->db->lastInsertID;
    }

    public function add_metas($id, $language, $title, $slug) {


        $sql = "INSERT INTO item_metas(item_id,language_id,title,slug) VALUES(:item_id,:language_id,:title,:slug)";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":item_id", $id);
        $command->bindParam(":title", $title);
        $command->bindParam(":slug", $slug);
        $command->bindParam(":language_id", $language);
        $command->execute();
        return Yii::app()->db->lastInsertID;
    }

    public function get_metas($id, $type) {
        $sql = "SELECT *
                FROM item_metas
                WHERE taget_id = :id
                AND type = :type
                ";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":id", $id, PDO::PARAM_INT);
        $command->bindParam(":type", $type);
        return $command->queryRow();
    }

    private function check_exist_slug($slug) {
        $sql = 'SELECT count(slug) as count FROM items WHERE slug REGEXP "^' . $slug . '(-[[:digit:]]+)?$"';
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
        $sql = 'update items set ' . $custom . ' where id = :id';
        $command = Yii::app()->db->createCommand($sql);
        return $command->execute($args);
    }

    public function update_metas($args) {
        $keys = array_keys($args);
        $custom = '';
        foreach ($keys as $k)
            $custom .= $k . ' = :' . $k . ', ';
        $custom = substr($custom, 0, strlen($custom) - 2);
        $sql = 'update item_metas set ' . $custom . ' where item_id = :item_id and language_id = :language_id';
        $command = Yii::app()->db->createCommand($sql);
        return $command->execute($args);
    }

}
