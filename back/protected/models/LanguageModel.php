<?php

class LanguageModel extends CFormModel {

    public function __construct() {
        
    }

    public function gets($args) {
        $custom = "";
        $params = array();

        if (isset($args['deleted'])) {
            $custom.= " AND s.deleted = :deleted";
            $params[] = array('name' => ':deleted', 'value' => $args['deleted'], 'type' => PDO::PARAM_INT);
        }
        $sql = "SELECT *
                FROM languages s
                WHERE 1
                $custom";
        $command = Yii::app()->db->createCommand($sql);
        
     
        foreach ($params as $a)
            $command->bindParam($a['name'], $a['value'], $a['type']);
        
        return $command->queryAll();
    }
    
    
    public function counts($args) {

        $custom = "";
        $params = array();

        if(isset($args['deleted'])){
            $custom.= " AND vc.deleted = :deleted";
            $params[] = array('name' => ':deleted', 'value' => $args['deleted'],'type'=>PDO::PARAM_INT);
        }
        
       
        $sql = "SELECT count(*) as total
                FROM languages vc
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
        $sql = "SELECT *
                FROM languages
                WHERE id = :id
                ";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":id", $id, PDO::PARAM_INT);
        return $command->queryRow();
    }
    
    

    public function add($title) {
        $time = time();
        $sql = "INSERT INTO languages(title,date_added) VALUES(:title,:date_added)";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":title", $title);
        $command->bindParam(":date_added", $time,PDO::PARAM_INT);
        $command->execute();
        return Yii::app()->db->lastInsertID;
    }

 

    public function update($args) {
        $keys = array_keys($args);
        $custom = '';
        foreach ($keys as $k)
            $custom .= $k . ' = :' . $k . ', ';
        $custom = substr($custom, 0, strlen($custom) - 2);
        $sql = 'update languages set ' . $custom . ' where id = :id';
        $command = Yii::app()->db->createCommand($sql);
        return $command->execute($args);
    }
    

}