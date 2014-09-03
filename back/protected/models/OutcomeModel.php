<?php

/**
 * This is the model class for table "outcome".
 *
 * The followings are the available columns in table 'outcome':
 * @property integer $outcome_id
 * @property string $outcome_type
 * @property double $value
 * @property string $description
 * @property string $date_added
 */
class OutcomeModel extends CFormModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Outcome the static model class
	 */

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function gets($page = 1, $ppp = 20){		
        $sql = "SELECT *
                FROM outcome
                WHERE 1";
        
        $command = Yii::app()->db->createCommand($sql);
        
        return $command->queryAll();
	}

	public function get($id) {
        $sql = "SELECT *
                FROM outcome
                WHERE outcome_id = :id
                ";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":id", $id, PDO::PARAM_INT);
        return $command->queryRow();
    }

	public function counts($args) {

        $sql = "SELECT count(*) as total
                FROM outcome vc
                WHERE 1
                ";
        $command = Yii::app()->db->createCommand($sql);
        $count = $command->queryRow();
        return $count['total'];
    }

    public function saveOutcome($outcome_type, $value, $description){

		$date_added = time();
		
		$sql = "INSERT INTO outcome(outcome_type, value, description, date_added) ";		
		$sql .= "VALUES (:outcome_type, :value, :description, :date_added) ";		

		$command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":outcome_type", $outcome_type);
        $command->bindParam(":value", $value);
        $command->bindParam(":description", $description);
        $command->bindParam(":date_added", $date_added);        

        $command->execute();
		
	}

    public function update($args){
    	$keys = array_keys($args);
        $custom = '';
        foreach ($keys as $k)
            $custom .= $k . ' = :' . $k . ', ';
        $custom = substr($custom, 0, strlen($custom) - 2);
        $sql = 'update outcome set ' . $custom . ' where outcome_id = :outcome_id';
        $command = Yii::app()->db->createCommand($sql);
        return $command->execute($args);
    }

    public function get_outcome_list($from = NULL, $to = NULL){

    	$custom = '';
    	
    	if($from != NULL && $to != NULL && $from <= $to){
			$custom .= " AND (outcome_id >= :from AND outcome_id <= :to ) ";
			$params[] = array('name' => ':from', 'value' => $from, 'type' => PDO::PARAM_INT);
			$params[] = array('name' => ':to', 'value' => $to, 'type' => PDO::PARAM_INT);
		}

		$sql = "SELECT *
                FROM outcome
                WHERE 1
                $custom
                ";
        
        $command = Yii::app()->db->createCommand($sql);            
        foreach ($params as $a)
            $command->bindParam($a['name'], $a['value'] , $a['type']);    
        return $command->queryAll();
	}

    public function remove_outcome($id){
    	$sql = "DELETE FROM outcome WHERE outcome_id = :outcome_id";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":outcome_id", $id,PDO::PARAM_INT);
        return $command->execute();
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'outcome';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('outcome_type', 'required'),
			array('value', 'numerical'),
			array('outcome_type', 'length', 'max'=>20),
			array('description', 'length', 'max'=>255),
			array('date_added', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('outcome_id, outcome_type, value, description, date_added', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'outcome_id' => 'Outcome',
			'outcome_type' => 'Outcome Type',
			'value' => 'Value',
			'description' => 'Description',
			'date_added' => 'Date Created',
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

		$criteria->compare('outcome_id',$this->outcome_id);
		$criteria->compare('outcome_type',$this->outcome_type,true);
		$criteria->compare('value',$this->value);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('date_added',$this->date_added,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}