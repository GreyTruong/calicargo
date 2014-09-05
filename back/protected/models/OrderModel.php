<?php

class OrderModel extends CFormModel {

    public function __construct() {
        
    }

    public function gets($args, $page = 1, $ppp = 20) {
        $page = ($page - 1) * $ppp;
        $custom = "";
        $params = array();
        
        if (isset($args['s']) && $args['s'] != "") {
            $custom.= " AND s.link like :title";            
            $params[] = array('name' => ':title', 'value' => "%$args[s]%",'type'=>PDO::PARAM_STR);
        }

        $sql = "SELECT s.*,c.name
                FROM orders s
                LEFT JOIN customers c ON c.id = s.customer_id
                WHERE 1
                $custom
                ORDER BY id DESC
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
            $custom.= " AND vc.link like :title";
            $params[] = array('name' => ':title', 'value' => "%$args[s]%",'type'=>PDO::PARAM_STR);
        }
        $sql = "SELECT count(*) as total
                FROM orders vc
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
        $sql = "SELECT o.*,od.item,od.color,od.proto,od.decor,od.total,od.number,od.size,od.font,od.decor_d,od.font_d,od.type
                FROM orders as o
                LEFT JOIN order_details as od ON od.order_id = o.id
                WHERE o.id = :id
                ";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":id", $id, PDO::PARAM_INT);
        return $command->queryAll();
    }
    
    public function get_by_id($id) {
        $sql = "SELECT o.*,c.email,c.name,c.phone,c.address
                FROM orders as o
                 LEFT JOIN customers c ON c.id = o.customer_id
               
                WHERE o.id = :id
                ";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":id", $id, PDO::PARAM_INT);
        return $command->queryRow();
    }
    
     public function get_details($id) {
        $sql = "SELECT od.*,i.code FROM order_details od
                LEFT JOIN items as i ON i.id = od.item_id 
                WHERE od.order_id = :id
                ";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":id", $id, PDO::PARAM_INT);
        return $command->queryAll();
    }

    public function add($link,$img,$description,$position) {
        $sql = "INSERT INTO sliders(link,img,description,position) VALUES(:link,:img,:description,:position)";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":link", $link);
        $command->bindParam(":img", $img);
        $command->bindParam(":description", $description);
        $command->bindParam(":position", $position, PDO::PARAM_INT);
       
        $command->execute();
        
        return Yii::app()->db->lastInsertID;
    }
    public function update($args) {
        $keys = array_keys($args);
        $custom = '';
        foreach ($keys as $k)
            $custom .= $k . ' = :' . $k . ', ';
        $custom = substr($custom, 0, strlen($custom) - 2);
        $sql = 'update sliders set ' . $custom . ' where id = :id';
        $command = Yii::app()->db->createCommand($sql);
        return $command->execute($args);
    }
    
    

}