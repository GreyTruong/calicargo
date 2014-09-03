<?php

class ShipOrderModel extends CFormModel
{

	const D2D = 'd2d';
	const A2A = 'a2a';
	const SHIP_AMAZON = 'ship_amazon';
	const SHIP_UPS = 'ship_ups';
	const ORDER_AMAZON = 'order_amazon';
	const ALL_SHIP = 'all_ship';
	const ALL_ORDER = 'all_order';
	const SHIP_AMAZON_LABEL = 'Shipping From Amazon';
	const SHIP_UPS_LABEL = 'Shipping From UPS';
	const ORDER_AMAZON_LABEL = 'Order From Amazon';
	const ALL_SHIP_LABEL = 'All Shipping Type';
	const ALL_ORDER_LABEL = 'All Order Type';
	
	public function __construct() {		
	}

	//get all orders
	public function gets(){
		// //$page = ($page - 1) * $ppp;
  //       $custom = "";
  //       $params = array();
        
  //       if(isset($args['order_type'])){
  //           $custom.= " AND vc.order_type = :order_type";
  //           $params[] = array('name' => ':order_type', 'value' => $args['order_type'],'order_type'=>PDO::PARAM_STR);
  //       }

  //       if(isset($args['ship_type'])){
  //           $custom.= " AND vc.ship_type = :ship_type";
  //           $params[] = array('name' => ':ship_type', 'value' => $args['ship_type'],'ship_type'=>PDO::PARAM_STR);
  //       }
//from
        $sql = "SELECT *
                FROM ship_order
                WHERE 1";
        
        $command = Yii::app()->db->createCommand($sql);
        //$command->bindParam(":page", $page, PDO::PARAM_INT);
        //$command->bindParam(":ppp", $ppp, PDO::PARAM_INT);
        // foreach ($params as $a)        
        //     $command->bindParam($a['order_type'], $a['ship_type']);
        

        return $command->queryAll();
	}

	//get order by id
	public function get($id) {
        $sql = "SELECT *
                FROM ship_order
                WHERE ship_order_id = :id
                ";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":id", $id, PDO::PARAM_INT);
        return $command->queryRow();
    }

    //count orders
	public function counts($args) {

        $custom = "";
        $params = array();

        if(isset($args['order_type'])){
            $custom.= " AND vc.order_type = :order_type";
            $params[] = array('name' => ':order_type', 'value' => $args['order_type'],'order_type'=>PDO::PARAM_STR);
        }

        if(isset($args['ship_type'])){
            $custom.= " AND vc.ship_type = :ship_type";
            $params[] = array('name' => ':ship_type', 'value' => $args['ship_type'],'ship_type'=>PDO::PARAM_STR);
        }

        $sql = "SELECT count(*) as total
                FROM ship_order vc
                WHERE 1
                $custom
                ";
        $command = Yii::app()->db->createCommand($sql);
        foreach ($params as $a)
            $command->bindParam($a['order_type'], $a['ship_type']);

        $count = $command->queryRow();
        return $count['total'];
    }

    //update order
    public function update_order($args){
    	$keys = array_keys($args);
        $custom = '';
        foreach ($keys as $k)
            $custom .= $k . ' = :' . $k . ', ';
        $custom = substr($custom, 0, strlen($custom) - 2);
        $sql = 'update ship_order set ' . $custom . ' where ship_order_id = :ship_order_id';
        $command = Yii::app()->db->createCommand($sql);
        return $command->execute($args);        
    }

    public function saveOrder($order_type, $ship_type, $sender_first_name, $sender_middle_name, $sender_last_name, 
        $sender_address, $sender_city, $sender_state, $sender_zipcode, $sender_country, $sender_tel, $sender_email,
        $receiver_first_name, $receiver_middle_name, $receiver_last_name, $receiver_address, $receiver_city, 
        $receiver_state, $receiver_zipcode, $receiver_country, $receiver_tel, $receiver_email, $box_qty, $total_value, 
        $total_airport_fee, $order_discount, $order_fee, $total_wt_lbs, $total_wt_kg, $ship_fee_per_lbs, $ship_discount,
        $total_ship_fee, $total, $delivery_instruction, $items){

        $today = time();
        
        $sql = "INSERT INTO ship_order(order_type, ship_type, sender_first_name, sender_middle_name, sender_last_name, ";
        $sql .= "sender_address, sender_city, sender_state, sender_zipcode, sender_country, sender_tel, sender_email, ";
        $sql .= "receiver_first_name, receiver_middle_name, receiver_last_name, receiver_address, receiver_city, receiver_state, ";
        $sql .= "receiver_zipcode, receiver_country, receiver_tel, receiver_email, box_qty, total_value, total_airport_fee, ";
        $sql .= "order_discount, order_fee, total_wt_lbs, total_wt_kg, ship_fee_per_lbs, ship_discount, total_ship_fee, ";
        $sql .= "total, date_added, delivery_instruction) ";        
        $sql .= "VALUES (:order_type, :ship_type, :sender_first_name, :sender_middle_name, :sender_last_name, ";
        $sql .= ":sender_address, :sender_city, :sender_state, :sender_zipcode, :sender_country, :sender_tel, :sender_email, ";
        $sql .= ":receiver_first_name, :receiver_middle_name, :receiver_last_name, :receiver_address, :receiver_city, :receiver_state, ";
        $sql .= ":receiver_zipcode, :receiver_country, :receiver_tel, :receiver_email, :box_qty, :total_value, :total_airport_fee, ";
        $sql .= ":order_discount, :order_fee, :total_wt_lbs, :total_wt_kg, :ship_fee_per_lbs, :ship_discount, :total_ship_fee, ";
        $sql .= ":total, :date_added, :delivery_instruction) ";        

        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":order_type", $order_type);
        $command->bindParam(":ship_type", $ship_type);
        $command->bindParam(":sender_first_name", $sender_first_name);
        $command->bindParam(":sender_middle_name", $sender_middle_name);
        $command->bindParam(":sender_last_name", $sender_last_name);
        $command->bindParam(":sender_address", $sender_address);
        $command->bindParam(":sender_city", $sender_city);
        $command->bindParam(":sender_state", $sender_state);
        $command->bindParam(":sender_zipcode", $sender_zipcode);
        $command->bindParam(":sender_country", $sender_country);
        $command->bindParam(":sender_tel", $sender_tel);
        $command->bindParam(":sender_email", $sender_email);
        $command->bindParam(":receiver_first_name", $receiver_first_name);
        $command->bindParam(":receiver_middle_name", $receiver_middle_name);
        $command->bindParam(":receiver_last_name", $receiver_last_name);
        $command->bindParam(":receiver_address", $receiver_address);
        $command->bindParam(":receiver_city", $receiver_city);
        $command->bindParam(":receiver_state", $receiver_state);
        $command->bindParam(":receiver_zipcode", $receiver_zipcode);
        $command->bindParam(":receiver_country", $receiver_country);
        $command->bindParam(":receiver_tel", $receiver_tel);
        $command->bindParam(":receiver_email", $receiver_email);
        $command->bindParam(":box_qty", $box_qty);
        $command->bindParam(":total_value", $total_value);
        $command->bindParam(":total_airport_fee", $total_airport_fee);
        $command->bindParam(":order_discount", $order_discount);
        $command->bindParam(":order_fee", $order_fee);
        $command->bindParam(":total_wt_lbs", $total_wt_lbs);
        $command->bindParam(":total_wt_kg", $total_wt_kg);
        $command->bindParam(":ship_fee_per_lbs", $ship_fee_per_lbs);
        $command->bindParam(":ship_discount", $ship_discount);
        $command->bindParam(":total_ship_fee", $total_ship_fee);
        $command->bindParam(":total", $total);
        $command->bindParam(":date_added", $today);
        $command->bindParam(":delivery_instruction", $delivery_instruction);

        $command->execute();

        $order_id = Yii::app()->db->getLastInsertId();
        
        for($i = 0; $i < count($items); $i++){
            $item = $items[$i];
            //return json_encode($item);
            $wt_kg = intval($item->wt_lbs) * 0.453592;
            $this->saveItem($order_id, $item->name, $item->description, $item->qty, $item->value,
                $item->airport_fee, $item->wt_lbs, $wt_kg);
        }
    }

    public function saveItem($ship_order_id, $name, $description, $qty, $value, $airport_fee, $wt_lbs, $wt_kg){
        $sql = "INSERT INTO ship_item(ship_order_id, name, `description`, qty, wt_lbs, value, airport_fee, wt_kg, date_added)";
        $sql .= "VALUES (:ship_order_id, :name, :description, :qty, :wt_lbs, :value, :airport_fee, :wt_kg, :date_added)";

        $today = time();

        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":ship_order_id", $ship_order_id);
        $command->bindParam(":name", $name);
        $command->bindParam(":description", $description);
        $command->bindParam(":qty", $qty);        
        $command->bindParam(":wt_lbs", $wt_lbs);
        $command->bindParam(":value", $value);
        $command->bindParam(":airport_fee", $airport_fee);        
        $command->bindParam(":wt_kg", $wt_kg);
        $command->bindParam(":date_added", $today);        

        $command->execute();

    }

    //get items that belong to an order id
    public function get_item($id){
    	$sql = "SELECT *
                FROM ship_item
                WHERE ship_order_id = :id
                ";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":id", $id, PDO::PARAM_INT);
        return $command->queryAll();
    }

    //update item
    public function update_item($args){
    	$keys = array_keys($args);
        $custom = '';
        foreach ($keys as $k)
            $custom .= $k . ' = :' . $k . ', ';
        $custom = substr($custom, 0, strlen($custom) - 2);
        $sql = 'update ship_item set ' . $custom . ' where ship_item_id = :ship_item_id';
        $command = Yii::app()->db->createCommand($sql);
        $command->execute($args);        
    }

    //get invoice information
    public function get_invoice($id)
    {
        $invoice = array();
        $invoice['order'] = $this->get($id);
		$invoice['items'] = $this->get_item($id);
		return $invoice;
    }


    //get order list on conditions
    public function get_order_list($type, $from_id, $to_id){		

		$sql = "SELECT *
                FROM ship_order
                WHERE ship_type = :type              
                AND ship_order_id >= :from_id
                AND ship_order_id <= :to_id
                ";        
        $command = Yii::app()->db->createCommand($sql);                    
        $command->bindParam(":type", $type, PDO::PARAM_STR);    
        $command->bindParam(":from_id", $from_id, PDO::PARAM_INT);    
        $command->bindParam(":to_id", $to_id, PDO::PARAM_INT);    
        //return $command;
        return $command->queryAll();
	}

    public function remove_order($id){
    	$item_sql = "DELETE FROM ship_item WHERE ship_order_id = :ship_order_id";
    	$command = Yii::app()->db->createCommand($item_sql);
        $command->bindParam(":ship_order_id", $id, PDO::PARAM_INT);
        $command->execute();
        $order_sql = "DELETE FROM ship_order WHERE ship_order_id = :ship_order_id";
        $command = Yii::app()->db->createCommand($order_sql);
        $command->bindParam(":ship_order_id", $id,PDO::PARAM_INT);
        return $command->execute();
    }

    //get order report history
    public function get_history(){
    	$sql = "SELECT * FROM ship_transaction";
    	$command = Yii::app()->db->createCommand($sql);
    	return $command->queryAll();
    }

    //save report transaction
    public function save_transaction($from, $to, $type){
    	$lang = "VI";
    	$today = time();
    	$sql = "INSERT INTO ship_transaction(min_order_id, max_order_id, report_type, report_lang, date_added) ";
    	$sql .= "VALUES(:from, :to, :type, :lang, :today)";
    	$command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":from", $from);
        $command->bindParam(":to", $to);
        $command->bindParam(":type", $type);
        $command->bindParam(":lang", $lang);
        $command->bindParam(":today", $today);
        return $command->execute();
    }

    //get all the exported records
    public function get_all_reported_record(){
    	$max = Yii::app()->db->createCommand()->select('max(ship_order_id) as max')->from('ship_order')->queryScalar();
    	return $this->is_reported(0, $max);
    }

    public function is_reported($from, $to){
    	$id_arr = array();

    	$x = $from;
    	do{
    		array_push($id_arr, $x);    		
    		$x++;
    	}while($x <= $to);


    	$return_arr = array();
    	for($i = 0; $i < count($id_arr); $i++)
    	{
    		$order_id  = $id_arr[$i];
    		$sql = "SELECT count(*) as total "; 
	    	$sql .= "FROM ship_transaction WHERE min_order_id <= :order_id AND max_order_id >= :order_id";
	    	$command = Yii::app()->db->createCommand($sql);
	        $command->bindParam(":order_id", $order_id, PDO::PARAM_INT);
	        $count = $command->queryRow();
	        if ($count['total'] > 0) array_push($return_arr, (string)$order_id);
    	}
    	return $return_arr;
    }

    public function get_order_type(){
    	$list = array();
    	$list[ShipOrderModel::SHIP_AMAZON] = ShipOrderModel::SHIP_AMAZON_LABEL;
    	$list[ShipOrderModel::SHIP_UPS] = ShipOrderModel::SHIP_UPS_LABEL;
    	$list[ShipOrderModel::ORDER_AMAZON] = ShipOrderModel::ORDER_AMAZON_LABEL;
    	return $list;
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ship_order';
	}
	
}