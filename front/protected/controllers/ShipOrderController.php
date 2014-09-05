<?php

class ShipOrderController extends Controller
{

	private $ShipOrderModel;

	public function init(){
		parent::init();
        /* @var $ShipOrderModel ShipOrderModel */
        $this->ShipOrderModel = new ShipOrderModel();
	}

	public function actionShip_amazon()
	{		
			$this->render('ship_amazon');
	}

	public function actionShip_order()
	{
		if($_POST)
		{			
			$track_number = "";
			$ship_carrier = "";
			$sender_address = "";
			$sender_city = "";
			$sender_state = "";
			$sender_zipcode = "";
			$sender_country = "";
			$receiver_first_name = "";
			$receiver_middle_name = "";
			$receiver_last_name = "";
			$receiver_address = "";
			$receiver_city = "";
			$receiver_state = "";
			$receiver_zipcode = "";
			$receiver_country = "";
			$receiver_tel = "";
			$receiver_email = "";
			$sender_note = "";
			$receiver_note = "";
			$ups_box_w = 0;
			$ups_box_h = 0;
			$ups_box_l = 0;
			$ups_box_d = 0;
			$item_list = array();

			if(isset($_POST['shipping_amazon_info']))
			{
				$order_type = "ship_amazon";				
				$info = $_POST['shipping_amazon_info'];
				$track_number = $info['number'];
				$ship_carrier = $info['carrier'];
				$sender_address = $info['address'];
				$sender_city = $info['city'];
				$sender_state = $info['state'];
				$sender_zipcode = $info['code'];
				$sender_country = $info['country'];
				$receiver_first_name = $info['firstname2'];
				$receiver_middle_name = $info['middlename2'];
				$receiver_last_name = $info['lastname2'];
				$receiver_address = $info['address2'];
				$receiver_city = $info['city2'];
				$receiver_state = $info['state2'];
				$receiver_zipcode = $info['code2'];
				$receiver_country = $info['country2'];
				$receiver_tel = $info['tel2'];
				$receiver_email = $info['email2'];
				$sender_note = $info['note'];
				$receiver_note = $info['note2'];
			}

			else if(isset($_POST['shipping_ups_info']))
			{				
				$order_type = "ship_ups";	
				$info = $_POST['shipping_ups_info'];			
				$ups_box_w = $info['weight'];
				$ups_box_h = $info['height'];
				$ups_box_l = $info['length'];
				$ups_box_d = $info['depth'];
				$sender_note = $info['note'];
			}

			else if(isset($_POST['order_amazon_info']))
			{
				$order_type = "order_amazon";
				$info = $_POST['order_amazon_info'];				
				$sender_address = $info['address'];
				$sender_city = $info['city'];
				$sender_state = $info['state'];
				$sender_zipcode = $info['code'];
				$sender_country = $info['country'];
				$receiver_first_name = $info['firstname2'];
				$receiver_middle_name = $info['middlename2'];
				$receiver_last_name = $info['lastname2'];
				$receiver_address = $info['address2'];
				$receiver_city = $info['city2'];
				$receiver_state = $info['state2'];
				$receiver_zipcode = $info['code2'];
				$receiver_country = $info['country2'];
				$receiver_tel = $info['tel2'];
				$receiver_email = $info['email2'];

				$total_item = intval($_POST['order_amazon_info']['total_item']);
				echo $total_item;
				for ($x=1; $x<=$total_item; $x++) {
				  $item = array();
				  $item['link'] = $_POST['order_amazon_info']['item_link'.$x];
				  $item['size'] = $_POST['order_amazon_info']['item_size'.$x];
				  $item['qty'] = $_POST['order_amazon_info']['item_qty'.$x];
				  $item['color'] = $_POST['order_amazon_info']['item_color'.$x];
				  $item['value'] = 0;
				  $item['airport_fee'] = 0;	
				  $item['wt_kg'] = 0;	
				  array_push($item_list, $item);			  
				} 
			}
			else{
				echo "404 action not found";
				return;
			}

			$sender_first_name = $info['firstname'];
			$sender_middle_name = $info['middlename'];
			$sender_last_name = $info['lastname'];
			$sender_tel = $info['tel'];
			$sender_email = $info['email'];			

			echo $this->ShipOrderModel->saveOrder($order_type, $track_number, $ship_carrier, $sender_first_name, $sender_middle_name, $sender_last_name, 
			$sender_address, $sender_city, $sender_state, $sender_zipcode, $sender_country, $sender_tel, $sender_email,
			$receiver_first_name, $receiver_middle_name, $receiver_last_name, $receiver_address, $receiver_city, 
			$receiver_state, $receiver_zipcode, $receiver_country, $receiver_tel, $receiver_email, $ups_box_w, $ups_box_h, 
			$ups_box_l, $ups_box_d, $sender_note, $receiver_note, $item_list);
		}
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}