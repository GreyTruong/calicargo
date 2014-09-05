<?php

/**
 * This is the model class for table "ship_order".
 *
 * The followings are the available columns in table 'ship_order':
 * @property integer $ship_order_id
 * @property string $order_type
 * @property string $ship_type
 * @property string $sender_first_name
 * @property string $sender_middle_name
 * @property string $sender_last_name
 * @property string $sender_address
 * @property string $sender_city
 * @property string $sender_state
 * @property string $sender_zipcode
 * @property string $sender_country
 * @property string $sender_tel
 * @property string $sender_email
 * @property string $receiver_first_name
 * @property string $receiver_middle_name
 * @property string $receiver_last_name
 * @property string $receiver_address
 * @property string $receiver_city
 * @property string $receiver_state
 * @property string $receiver_zipcode
 * @property string $receiver_country
 * @property string $receiver_tel
 * @property string $receiver_email
 * @property integer $box_qty
 * @property double $total_value
 * @property double $total_airport_fee
 * @property integer $order_discount
 * @property double $order_fee
 * @property double $total_wt_lbs
 * @property double $total_wt_kg
 * @property double $ship_fee_per_lbs
 * @property integer $ship_discount
 * @property double $total_ship_fee
 * @property string $date_created
 *
 * The followings are the available model relations:
 * @property ShipItem[] $shipItems
 * @property ShipTransaction[] $shipTransactions
 * @property ShipTransaction[] $shipTransactions1
 */
class ShipOrderModel extends CFormModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ShipOrder the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function saveOrder($order_type, $track_number, $ship_carrier, $sender_first_name, $sender_middle_name, $sender_last_name, 
		$sender_address, $sender_city, $sender_state, $sender_zipcode, $sender_country, $sender_tel, $sender_email,
		$receiver_first_name, $receiver_middle_name, $receiver_last_name, $receiver_address, $receiver_city, 
		$receiver_state, $receiver_zipcode, $receiver_country, $receiver_tel, $receiver_email, $ups_box_w, $ups_box_h, $ups_box_l, 
		$ups_box_d, $sender_note, $receiver_note, $item_list){

		$date_created = date( 'Y-m-d H:i:s', time());
		
		$box_qty = 1;
		$ship_type = "D2D";

		$sql = "INSERT INTO ship_order(order_type, track_number, ship_carrier, ship_type, sender_first_name, sender_middle_name, sender_last_name, ";
		$sql .= "sender_address, sender_city, sender_state, sender_zipcode, sender_country, sender_tel, sender_email, ";
		$sql .= "receiver_first_name, receiver_middle_name, receiver_last_name, receiver_address, receiver_city, receiver_state, ";
		$sql .= "receiver_zipcode, receiver_country, receiver_tel, receiver_email, box_qty, ups_box_w, ups_box_h, ups_box_l, ";
		$sql .= "ups_box_d, sender_note, receiver_note, date_created) ";		
		$sql .= "VALUES (:order_type, :track_number, :ship_carrier, :ship_type, :sender_first_name, :sender_middle_name, :sender_last_name, ";
		$sql .= ":sender_address, :sender_city, :sender_state, :sender_zipcode, :sender_country, :sender_tel, :sender_email, ";
		$sql .= ":receiver_first_name, :receiver_middle_name, :receiver_last_name, :receiver_address, :receiver_city, :receiver_state, ";
		$sql .= ":receiver_zipcode, :receiver_country, :receiver_tel, :receiver_email, :box_qty, :ups_box_w, :ups_box_h, :ups_box_l, ";
		$sql .= ":ups_box_d, :sender_note, :receiver_note, :date_created) ";		

		$command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":order_type", $order_type);
        $command->bindParam(":track_number", $track_number);
        $command->bindParam(":ship_carrier", $ship_carrier);
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
        $command->bindParam(":ups_box_w", $ups_box_w);
        $command->bindParam(":ups_box_h", $ups_box_h);
        $command->bindParam(":ups_box_l", $ups_box_l);
        $command->bindParam(":ups_box_d", $ups_box_d);
        $command->bindParam(":sender_note", $sender_note);
        $command->bindParam(":receiver_note", $receiver_note);
        $command->bindParam(":date_created", $date_created);

        $command->execute();
		
		$order_id = Yii::app()->db->getLastInsertID();

		for($i = 0; $i < count($item_list); $i++){
			$item = $item_list[$i];
			$this->save_item($order_id, $item['link'], $item['size'], $item['qty'], $item['color'], $item['value'],
				$item['airport_fee'], $item['wt_kg']);
		}
	}

	public function save_item($ship_order_id, $item_link, $size, $qty, $color, $value, $airport_fee, $wt_kg){
		$sql = "INSERT INTO ship_item(ship_order_id, item_link, size, qty, color, value, airport_fee, wt_kg, date_created)";
		$sql .= "VALUES (:ship_order_id, :item_link, :size, :qty, :color, :value, :airport_fee, :wt_kg, :date_created)";

		$date_created = date( 'Y-m-d H:i:s', time());

		$command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":ship_order_id", $ship_order_id);
        $command->bindParam(":item_link", $item_link);
        $command->bindParam(":size", $size);
        $command->bindParam(":qty", $qty);        
        $command->bindParam(":color", $color);
        $command->bindParam(":value", $value);
        $command->bindParam(":airport_fee", $airport_fee);        
        $command->bindParam(":wt_kg", $wt_kg);
        $command->bindParam(":date_created", $date_created);        

        $command->execute();

	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ship_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_type, ship_type, sender_first_name, sender_last_name, sender_address, sender_city, sender_state, sender_zipcode, sender_country, sender_tel, sender_email, receiver_first_name, receiver_last_name, receiver_address, receiver_city, receiver_state, receiver_zipcode, receiver_country, receiver_tel', 'required'),
			array('box_qty, order_discount, ship_discount', 'numerical', 'integerOnly'=>true),
			array('total_value, total_airport_fee, order_fee, total_wt_lbs, total_wt_kg, ship_fee_per_lbs, total_ship_fee', 'numerical'),
			array('order_type', 'length', 'max'=>10),
			array('ship_type, sender_tel, receiver_tel', 'length', 'max'=>20),
			array('sender_first_name, sender_middle_name, sender_last_name, sender_address, sender_email, receiver_first_name, receiver_middle_name, receiver_last_name, receiver_address, receiver_email', 'length', 'max'=>255),
			array('sender_city, sender_state, sender_country, receiver_city, receiver_state, receiver_country', 'length', 'max'=>100),
			array('sender_zipcode, receiver_zipcode', 'length', 'max'=>30),
			array('date_created', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ship_order_id, order_type, ship_type, sender_first_name, sender_middle_name, sender_last_name, sender_address, sender_city, sender_state, sender_zipcode, sender_country, sender_tel, sender_email, receiver_first_name, receiver_middle_name, receiver_last_name, receiver_address, receiver_city, receiver_state, receiver_zipcode, receiver_country, receiver_tel, receiver_email, box_qty, total_value, total_airport_fee, order_discount, order_fee, total_wt_lbs, total_wt_kg, ship_fee_per_lbs, ship_discount, total_ship_fee, date_created', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'shipItems' => array(self::HAS_MANY, 'ShipItem', 'ship_order_id'),
			'shipTransactions' => array(self::HAS_MANY, 'ShipTransaction', 'min_order_id'),
			'shipTransactions1' => array(self::HAS_MANY, 'ShipTransaction', 'max_order_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ship_order_id' => 'Ship Order',
			'order_type' => 'Order Type',
			'ship_type' => 'Ship Type',
			'sender_first_name' => 'Sender First Name',
			'sender_middle_name' => 'Sender Middle Name',
			'sender_last_name' => 'Sender Last Name',
			'sender_address' => 'Sender Address',
			'sender_city' => 'Sender City',
			'sender_state' => 'Sender State',
			'sender_zipcode' => 'Sender Zipcode',
			'sender_country' => 'Sender Country',
			'sender_tel' => 'Sender Tel',
			'sender_email' => 'Sender Email',
			'receiver_first_name' => 'Receiver First Name',
			'receiver_middle_name' => 'Receiver Middle Name',
			'receiver_last_name' => 'Receiver Last Name',
			'receiver_address' => 'Receiver Address',
			'receiver_city' => 'Receiver City',
			'receiver_state' => 'Receiver State',
			'receiver_zipcode' => 'Receiver Zipcode',
			'receiver_country' => 'Receiver Country',
			'receiver_tel' => 'Receiver Tel',
			'receiver_email' => 'Receiver Email',
			'box_qty' => 'Box Qty',
			'total_value' => 'Total Value',
			'total_airport_fee' => 'Total Airport Fee',
			'order_discount' => 'Order Discount',
			'order_fee' => 'Order Fee',
			'total_wt_lbs' => 'Total Wt Lbs',
			'total_wt_kg' => 'Total Wt Kg',
			'ship_fee_per_lbs' => 'Ship Fee Per Lbs',
			'ship_discount' => 'Ship Discount',
			'total_ship_fee' => 'Total Ship Fee',
			'date_created' => 'Date Created',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ship_order_id',$this->ship_order_id);
		$criteria->compare('order_type',$this->order_type,true);
		$criteria->compare('ship_type',$this->ship_type,true);
		$criteria->compare('sender_first_name',$this->sender_first_name,true);
		$criteria->compare('sender_middle_name',$this->sender_middle_name,true);
		$criteria->compare('sender_last_name',$this->sender_last_name,true);
		$criteria->compare('sender_address',$this->sender_address,true);
		$criteria->compare('sender_city',$this->sender_city,true);
		$criteria->compare('sender_state',$this->sender_state,true);
		$criteria->compare('sender_zipcode',$this->sender_zipcode,true);
		$criteria->compare('sender_country',$this->sender_country,true);
		$criteria->compare('sender_tel',$this->sender_tel,true);
		$criteria->compare('sender_email',$this->sender_email,true);
		$criteria->compare('receiver_first_name',$this->receiver_first_name,true);
		$criteria->compare('receiver_middle_name',$this->receiver_middle_name,true);
		$criteria->compare('receiver_last_name',$this->receiver_last_name,true);
		$criteria->compare('receiver_address',$this->receiver_address,true);
		$criteria->compare('receiver_city',$this->receiver_city,true);
		$criteria->compare('receiver_state',$this->receiver_state,true);
		$criteria->compare('receiver_zipcode',$this->receiver_zipcode,true);
		$criteria->compare('receiver_country',$this->receiver_country,true);
		$criteria->compare('receiver_tel',$this->receiver_tel,true);
		$criteria->compare('receiver_email',$this->receiver_email,true);
		$criteria->compare('box_qty',$this->box_qty);
		$criteria->compare('total_value',$this->total_value);
		$criteria->compare('total_airport_fee',$this->total_airport_fee);
		$criteria->compare('order_discount',$this->order_discount);
		$criteria->compare('order_fee',$this->order_fee);
		$criteria->compare('total_wt_lbs',$this->total_wt_lbs);
		$criteria->compare('total_wt_kg',$this->total_wt_kg);
		$criteria->compare('ship_fee_per_lbs',$this->ship_fee_per_lbs);
		$criteria->compare('ship_discount',$this->ship_discount);
		$criteria->compare('total_ship_fee',$this->total_ship_fee);
		$criteria->compare('date_created',$this->date_created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}