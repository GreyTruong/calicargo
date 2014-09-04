<?php

class OutcomeController extends Controller
{
	private $viewData;
	private $OutcomeModel;

	public function init(){
		$this->OutcomeModel = new OutcomeModel();
	}

	public function actionIndex()
	{
        $this->CheckPermission();
		$outcomes = $this->OutcomeModel->gets();
		$this->viewData['outcomes'] = $outcomes;
		$this->render('index', $this->viewData);
	}

	public function actionAdd()
	{
        $this->CheckPermission();
		if(!$_POST || !isset($_POST['info']))
		{
			$this->render('add');
			return;
		}
		$type = $_POST['info']['type'];
		$value = $_POST['info']['value'];
		$desc = $_POST['info']['desc'];
		
		$this->OutcomeModel->saveOutcome($type,$value,$desc);
	}

	public function actionEdit($id){
        $this->CheckPermission();
		$outcome = $this->OutcomeModel->get($id);
		if(!$_POST){			
			$this->viewData['outcome'] = $outcome;
			$this->render('edit', $this->viewData);
			return;
		}
		//update into db
		$this->do_edit($outcome);
	}

	public function do_edit($outcome){
		$id = $outcome['outcome_id'];
        $type = $_POST['info']['type'];
        $value = $_POST['info']['value'];
        $desc = $_POST['info']['desc'];

        $this->OutcomeModel->update(array('outcome_type' => $type, 'value' => $value, 'description'=>$desc, 'outcome_id' => $id));
	}

	public function actionDelete($id){
        $this->CheckPermission();
		$this->OutcomeModel->remove_outcome($id);
	}

	public function actionReport(){
        $this->CheckPermission();
		if(!$_POST){			
			return;
		}
		$from = $_POST['from'];
		$to = $_POST['to'];
		$outcomes = $this->OutcomeModel->get_outcome_list($from, $to);

		//Init excel file

        //import lib
        Yii::import('ext.phpexcel.XPHPExcel');    
        //create file
        $objPHPExcel = XPHPExcel::createPHPExcel();
        //load template
        $objPHPExcel = PHPExcel_IOFactory::load(HelperUrl::rootUrl().'/sample_outcome.xlsx'); 
        //set properties for the excel file
        $objPHPExcel->getProperties()->setCreator("Cali Cargo")
                             ->setLastModifiedBy("Cali Cargo")
                             ->setTitle("Outcome List")
                             ->setSubject("Outcome List")
                             ->setDescription("Outcome List")
                             ->setKeywords("excel report")
                             ->setCategory("Outcome");
        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('CaliCargo Outcome List');

        //Start writing report

        //init variables
        $sum = 0;
        //get today
        $dt = new DateTime();
        $today = $dt->format('Y-m-d');
        
        //count total weight, total boxes, total d2d and a2a packages
        for($i=0; $i<count($outcomes);$i++){
            $sum+=$outcomes[$i]['value'];            
        }        
        
        //writing titles
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('H1', $today)
            ->setCellValue('F2', '$'.$sum)
            ;

        //writing list outcomes
        $row = 0;
        for($i = 0; $i < count($outcomes); $i++ ){
            $item = $outcomes[$i];
            $ci = $i+6;            
            if($row < $ci) $row = $ci;
            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$ci, $item['outcome_id'])
            ->setCellValue('B'.$ci, $item['outcome_type'])
            ->setCellValue('E'.$ci, '$'.$item['value'])
            ->setCellValue('H'.$ci, $item['description'])            
            ;

            //styling excel row
            $objPHPExcel->getActiveSheet()->mergeCells('B'.$ci.':D'.$ci);
            $objPHPExcel->getActiveSheet()->mergeCells('E'.$ci.':G'.$ci);
            $objPHPExcel->getActiveSheet()->mergeCells('H'.$ci.':J'.$ci);
            $objPHPExcel->getActiveSheet()
                        ->getRowDimension($ci)
                        ->setRowHeight(30);
        } 

        //styling excel sheet

        //prepare border
        $styleArray = array(
          'borders' => array(
              'allborders' => array(
                  'style' => PHPExcel_Style_Border::BORDER_THIN
              )
          )
        );
        //add borders to all rows
        $objPHPExcel->getActiveSheet()->getStyle('A6:I' . $row)->applyFromArray($styleArray);
        //wrap text for long rows
        $objPHPExcel->getActiveSheet()->getStyle('A6:I' . $row)->getAlignment()->setWrapText(true);
        //vertical alignment
        $objPHPExcel->getActiveSheet()->getStyle('A6:I' . $row)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        //horizontal alignment
        $objPHPExcel->getActiveSheet()->getStyle('A6:I' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
        // Set active sheet index to the first sheet
        $objPHPExcel->setActiveSheetIndex(0);
        
        // Redirect output to a clientâ€™s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Outcome List.xls"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        //write into file
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
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