<?php

class StockinModel extends CFormModel {

    public function __construct() {
        
    }

    public function gets($args) {
        $custom = "";
        $params = array();

        if (isset($args['deleted'])) {
            $custom.= " AND s.deleted = :deleted";
            $params[] = array('name' => ':deleted', 'value' => $args['deleted'], 'type' => PDO::PARAM_INT);
        }
        $sql = "SELECT s.*,i.code
                FROM stock_ins s
                LEFT JOIN items as i ON i.id = s.item_id
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
                FROM stock_ins vc
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
                FROM stock_ins
                WHERE id = :id
                ";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":id", $id, PDO::PARAM_INT);
        return $command->queryRow();
    }
    
    

    public function add($item, $price, $number, $total) {
        $time = time();
        $sql = "INSERT INTO stock_ins(item_id,item_price,number,total_price,date_added) VALUES(:item_id,:item_price,:number,:total_price,:date_added)";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":item_id", $item);
        $command->bindParam(":item_price", $price);
        $command->bindParam(":number", $number);
        $command->bindParam(":total_price", $total);
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
        $sql = 'update stock_ins set ' . $custom . ' where id = :id';
        $command = Yii::app()->db->createCommand($sql);
        return $command->execute($args);
    }
    

}