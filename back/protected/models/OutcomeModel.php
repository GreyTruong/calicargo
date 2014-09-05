<?php

class OutcomeModel extends CFormModel
{
    public function __construct() {
        
    }

	public function gets($page = 1, $ppp = 20){		
        $sql = "SELECT *
                FROM outcomes
                WHERE 1";
        
        $command = Yii::app()->db->createCommand($sql);
        
        return $command->queryAll();
	}

	public function get($id) {
        $sql = "SELECT *
                FROM outcomes
                WHERE outcome_id = :id
                ";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":id", $id, PDO::PARAM_INT);
        return $command->queryRow();
    }

	public function counts($args) {

        $sql = "SELECT count(*) as total
                FROM outcomes vc
                WHERE 1
                ";
        $command = Yii::app()->db->createCommand($sql);
        $count = $command->queryRow();
        return $count['total'];
    }

    public function saveOutcome($outcome_type, $value, $description){

		$date_added = time();
		
		$sql = "INSERT INTO outcomes(outcome_type, value, description, date_added) ";		
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
        $sql = 'update outcomes set ' . $custom . ' where outcome_id = :outcome_id';
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
                FROM outcomes
                WHERE 1
                $custom
                ";
        
        $command = Yii::app()->db->createCommand($sql);            
        foreach ($params as $a)
            $command->bindParam($a['name'], $a['value'] , $a['type']);    
        return $command->queryAll();
	}

    public function remove_outcome($id){
    	$sql = "DELETE FROM outcomes WHERE outcome_id = :outcome_id";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":outcome_id", $id,PDO::PARAM_INT);
        return $command->execute();
    }

	public function tableName()
	{
		return 'outcomes';
	}
}