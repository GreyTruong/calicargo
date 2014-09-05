<?php

class CustomerModel extends CFormModel {

    public function __construct() {
        
    }

    public function gets($args, $page = 1, $ppp = 20) {
        $page = ($page - 1) * $ppp;
        $custom = "";
        $params = array();
        
        if (isset($args['s']) && $args['s'] != "") {
            $custom.= " AND vc.email like :email";            
            $params[] = array('name' => ':email', 'value' => "%$args[s]%",'type'=>PDO::PARAM_STR);
        }
        
        if(isset($args['deleted'])){
            $custom.= " AND vc.deleted = :deleted";
            $params[] = array('name' => ':deleted', 'value' => $args['deleted'],'type'=>PDO::PARAM_INT);
        }
        $sql = "SELECT *
                FROM customers vc
                WHERE 1
                $custom
                ORDER BY vc.id DESC
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
            $params[] = array('name' => ':title', 'value' => "%$args[s]%",'type'=>PDO::PARAM_STR);
        }
        
        if(isset($args['deleted'])){
            $custom.= " AND vc.deleted = :deleted";
            $params[] = array('name' => ':deleted', 'value' => $args['deleted'],'type'=>PDO::PARAM_INT);
        }
        
       
        $sql = "SELECT count(*) as total
                FROM customers vc
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
                FROM customers
                WHERE id = :id
                ";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":id", $id, PDO::PARAM_INT);
        return $command->queryRow();
    }
    
    public function get_by_email($email) {
        $sql = "SELECT *
                FROM customers
                WHERE email = :email
                ";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":email", $email);
        return $command->queryRow();
    }

    public function add($email,$password,$secret_key,$name,$phone,$address) {
        $time = time();
        $sql = "INSERT INTO customers(email,`password`,secret_key,name,phone,address,date_added) VALUES(:email,:password,:secret_key,:name,:phone,:address,:date_added)";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":email", $email);
        $command->bindParam(":password", $password);
        $command->bindParam(":date_added", $time,PDO::PARAM_INT);
        $command->bindParam(":secret_key", $secret_key);
        $command->bindParam(":name", $name);
        $command->bindParam(":phone", $phone);
        $command->bindParam(":address", $address);
        $command->execute();
        return Yii::app()->db->lastInsertID;
    }

 

    public function update($args) {
        $keys = array_keys($args);
        $custom = '';
        foreach ($keys as $k)
            $custom .= $k . ' = :' . $k . ', ';
        $custom = substr($custom, 0, strlen($custom) - 2);
        $sql = 'update customers set ' . $custom . ' where id = :id';
        $command = Yii::app()->db->createCommand($sql);
        return $command->execute($args);
    }

}