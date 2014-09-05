<?php

class SettingModel extends CFormModel {

    public function __construct() {
        
    }

    

    public function get($title) {
        $sql = "SELECT *
                FROM settings
                WHERE title = :title
                ";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":title", $title, PDO::PARAM_INT);
        return $command->queryRow();
    }
 

    public function update($args) {
        $keys = array_keys($args);
        $custom = '';
        foreach ($keys as $k)
            $custom .= $k . ' = :' . $k . ', ';
        $custom = substr($custom, 0, strlen($custom) - 2);
        $sql = 'update settings set ' . $custom . ' where title = :title';
        $command = Yii::app()->db->createCommand($sql);
        return $command->execute($args);
    }

}