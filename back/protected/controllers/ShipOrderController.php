<?php

class ShipOrderController extends Controller
{
    
    private $viewData;
    private $ShipOrderModel;

    public function init() {    

        /* @var $ShipOrderModel ShipOrderModel*/
        $this->ShipOrderModel = new ShipOrderModel();
    }

    //view all orders
    public function actionIndex($order_type = "all", $ship_type = "all", $p = 1)
    {
        $this->CheckPermission();
        $ppp = Yii::app()->getParams()->itemAt('ppp');
        $args = array();
        if($order_type != "all")
            $args['order_type'] = $order_type;
        if($ship_type != "all")
            $args['ship_type'] = $ship_type;

        $orders = array();
        $orders = $this->ShipOrderModel->gets($args, $p, $ppp);

        $total_order = $this->ShipOrderModel->counts($args);
        $all_reported = $this->ShipOrderModel->get_all_reported_record();
        $this->viewData['all_reported'] = $all_reported;
        $this->viewData['orders'] = $orders;
        $this->viewData['total'] = $total_order;
        $this->viewData['paging'] = $total_order > $ppp ? HelperApp::get_paging($ppp, HelperUrl::baseUrl() . "order/index/order_type/$order_type/p/", $total_order, $p) : "";
        $this->viewData['order_type'] = $order_type;
        $this->render('index', $this->viewData);
    }

    public function actionGet_orders(){
        // if(!$_POST) return;
        $this->CheckPermission();
        echo json_encode($this->ShipOrderModel->gets());
    }

    //add new order
    public function actionAdd(){
        $this->CheckPermission();
        $data = NULL;
        $data = json_decode(file_get_contents('php://input'));
        if(!$data || $data->items == NULL){
            $util = $this->ShipOrderModel->get_order_type();            
            $this->viewData['util'] = $util;
            $this->render('add', $this->viewData);
            return;            
        }                
                
        if($data && $data->items != NULL && $data->info != null){
            //get variables
            $items = $data->items;        
            $info = $data->info;
            //customer info
            $sender_first_name = $info->firstname; //sender firstname
            $sender_middle_name = $info->middlename; //sender middlename
            $sender_last_name = $info->lastname; //sender lastname
            $sender_address = $info->address; //sender address
            $sender_city = $info->city; //sender city
            $sender_state = $info->state; //sender state
            $sender_zipcode = $info->code; //sender zipcode
            $sender_country = $info->country; //sender country
            $sender_tel = $info->tel; //sender mobile phone number
            $sender_email = $info->email; //sender email
            $receiver_first_name = $info->firstname2; //receiver firstname
            $receiver_middle_name = $info->middlename2; //receiver middlename
            $receiver_last_name = $info->lastname2; //receiver lastname
            $receiver_address = $info->address2; //receiver address
            $receiver_city = $info->city2; //receiver city
            $receiver_state = $info->state2; //receiver state
            $receiver_zipcode = $info->code2; //receiver zipcode
            $receiver_country = $info->country2; //receiver country
            $receiver_tel = $info->tel2; //receiver mobile phone number
            $receiver_email = $info->email2; //receiver email
            //order type + ship type + quantity
            $order_type = $info->order_type; //order type
            $box_qty = $info->box_qty; //box quantity        
            $ship_type = $info->ship_type; //shipping type
            //order item related
            $order_discount = $info->total_discount; //order discount
            $order_fee = $info->order_fee; //shipping amazon order fee
            $total_value = 0; //order total value - will be calculated later
            $total_airport_fee = 0; //total airport fee - will be calculated later
            //shipping related
            $total_wt_lbs = $info->total_wt_lbs; //total weight in pound       
            $total_wt_kg = intval($total_wt_lbs) *  0.45359237; //total weight in kilogram       
            $ship_fee_per_lbs = $info->ship_fee_lbs; //shipping fee per pound       
            $ship_discount = $info->ship_discount; //shipping discount                       
            $delivery_instruction = $info->delivery_instruction;
            //total
            $total =0; // tobe calculated later
            for($i = 0; $i < count($items); $i++){
                $item = $items[$i];
                $name = $item->name;
                $qty = $item->qty;
                $description = $item->description;
                $wt = $item->wt_lbs;
                $airport_fee = $item->airport_fee;
                $value = $item->value;
                $total_value += intval($value);
                $total_airport_fee += intval($airport_fee);
            }
            $ship_total = $ship_fee_per_lbs * $total_wt_lbs;
            if(intval($order_discount) > 0) $total_airport_fee = $total_airport_fee - $total_airport_fee * $order_discount/100;
            if(intval($ship_discount) > 0) $ship_total = $ship_total - $ship_total * $ship_discount/100;

            $total = $total_airport_fee + $ship_total;

            echo $this->ShipOrderModel->saveOrder($order_type, $ship_type, $sender_first_name, $sender_middle_name, $sender_last_name, 
            $sender_address, $sender_city, $sender_state, $sender_zipcode, $sender_country, $sender_tel, $sender_email,
            $receiver_first_name, $receiver_middle_name, $receiver_last_name, $receiver_address, $receiver_city, 
            $receiver_state, $receiver_zipcode, $receiver_country, $receiver_tel, $receiver_email, $box_qty, $total_value, 
            $total_airport_fee, $order_discount, $order_fee, $total_wt_lbs, $total_wt_kg, $ship_fee_per_lbs, $ship_discount,
            $ship_total, $total, $delivery_instruction, $items);
        }        

    }

    public function actionView_history(){
        $this->CheckPermission();
        //var_dump($this->ShipOrderModel->get_history());
        $this->viewData['records'] = $this->ShipOrderModel->get_history();
        $this->render('history', $this->viewData);
    }

    public function actionCheck_reported(){
        $this->CheckPermission();
        $data = NULL;
        $data = json_decode(file_get_contents('php://input'));
        if($data == NULL || $data->from ==null || $data->to == null){
            return;
        }
        $from = $data->from;
        $to = $data->to;
        $arr = $this->ShipOrderModel->is_reported($from, $to);
        if($arr!=NULL && count($arr > 0)){
            $warning = "ID(s) ";
            foreach ($arr as $a) {
                $warning .= '['.$a.']';
                $warning .= " ";
            }
            $warning .= "have been reported. Do you want to report the ID(s) again?";
            echo $warning;
            return;
        }            
        echo "";
    }

    public function actionReport_layout(){
        $this->CheckPermission();
        $orders = $this->ShipOrderModel->gets();
        $this->viewData['orders'] = $orders;
        $this->render('report', $this->viewData);
    }

    public function actionReport_order(){
        $this->CheckPermission();
        if(!$_POST){
            echo $a = "nopost";
            $this->viewData['data'] = $a;
            //$this->render('index', $this->viewData);
            return;
        }
        
        if( !isset($_POST['ship_type']) || !isset($_POST['from_ship_id']) || !isset($_POST['to_ship_id'])){
            return;
        }
        
        $from_id = $_POST['from_ship_id'];
        $to_id = $_POST['to_ship_id'];
        $type = $_POST['ship_type'];

        //echo $type;
        $orders = $this->ShipOrderModel->get_order_list($type, $from_id, $to_id);
        // var_dump($orders);
        // return;

        if(count($orders) > 0)
            $this->ShipOrderModel->save_transaction($from_id, $to_id, $type);        

        //Init excel file

        //import lib
        Yii::import('ext.phpexcel.XPHPExcel');    
        //create file
        $objPHPExcel = XPHPExcel::createPHPExcel();
        //load template
        $objPHPExcel = PHPExcel_IOFactory::load(HelperUrl::rootUrl().'/sample_list.xlsx'); 
        //set properties for the excel file
        $objPHPExcel->getProperties()->setCreator("Cali Cargo")
                             ->setLastModifiedBy("Cali Cargo")
                             ->setTitle("Order List")
                             ->setSubject("Order List")
                             ->setDescription("Order List")
                             ->setKeywords("excel report")
                             ->setCategory("Order");
        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('CaliCargo Order List');

        //Start writing report

        //init variables
        $sum_total_wt_lbs = 0;
        $total_boxes = 0;
        $d_packages = 0;
        $a_packages = 0;        

        //get today
        $dt = new DateTime();
        $today = $dt->format('Y-m-d');
        
        //count total weight, total boxes, total d2d and a2a packages
        for($i=0; $i<count($orders);$i++){
            $o=$orders[$i];
            $sum_total_wt_lbs += $o['total_wt_lbs'];
            $total_boxes += $o['box_qty'];
            if(strtolower($o['ship_type']) == 'd2d') $d_packages += 1;
            if(strtolower($o['ship_type']) == 'a2a') $a_packages += 1;
        }        
        $sum_total_wt_kg = $sum_total_wt_lbs * 0.453592;
        $sum_title = "TOTAL SUMMARY WEIGHT = " . $sum_total_wt_lbs . "lbs OR " . $sum_total_wt_kg . "kg";
        $customer_count = count($orders);        
        
        //writing titles
        $objPHPExcel->setActiveSheetIndex(0)
            // ->setCellValue('H1', $today)
            ->setCellValue('A2', $sum_title)
            ->setCellValue('H2', $customer_count)
            ->setCellValue('B4', $type)
            ->setCellValue('I4', $total_boxes)
            ->setCellValue('B3', $d_packages)
            ->setCellValue('F3', $a_packages)
            ;

        //writing list orders
        $row = 0;
        for($i = 0; $i < count($orders); $i++ ){
            $item = $orders[$i];
            $items = $this->ShipOrderModel->get_item($item['ship_order_id']);
            $temp_str = "";
            for($j = 0; $j < count($items); $j++){
                $temp_str .= $items[$j]['name'];
                $temp_str .= ":";
                $temp_str .= $items[$j]['qty'];
                $temp_str .= " ";
            }
            $ci = $i+8;            
            if($row < $ci) $row = $ci;
            $objPHPExcel->setActiveSheetIndex(0)            
            ->setCellValue('A'.$ci, date('Y-m-d',$item['date_added']))
            ->setCellValue('B'.$ci, $item['ship_order_id'])
            ->setCellValue('C'.$ci, $item['ship_type'])
            ->setCellValue('D'.$ci, $item['box_qty'])
            ->setCellValue('E'.$ci, $item['total_wt_lbs'])
            ->setCellValue('F'.$ci, $item['sender_first_name'] . ' ' . $item['sender_middle_name'] . ' ' . $item['sender_last_name'])
            ->setCellValue('G'.$ci, $item['receiver_first_name'] . ' ' . $item['receiver_middle_name'] . ' ' . $item['receiver_last_name'])
            ->setCellValue('H'.$ci, $item['receiver_address'] . ', ' . $item['receiver_city'] . ', ' . $item['receiver_state'] . ', '. $item['receiver_zipcode'] . ', '. $item['receiver_country'])
            ->setCellValue('I'.$ci, $temp_str)
            ;

            //styling excel row
            $objPHPExcel->getActiveSheet()->mergeCells('I'.$ci.':J'.$ci);
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
        $objPHPExcel->getActiveSheet()->getStyle('A8:I' . $row)->applyFromArray($styleArray);
        //wrap text for long rows
        $objPHPExcel->getActiveSheet()->getStyle('A8:I' . $row)->getAlignment()->setWrapText(true);
        //vertical alignment
        $objPHPExcel->getActiveSheet()->getStyle('A8:I' . $row)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        //horizontal alignment
        $objPHPExcel->getActiveSheet()->getStyle('A8:I' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
        // Set active sheet index to the first sheet
        $objPHPExcel->setActiveSheetIndex(0);
        
        // Redirect output to a clientâ€™s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Order List.xls"');
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

    public function actionDelete(){
        $this->CheckPermission();
        $data = NULL;
        $data = json_decode(file_get_contents('php://input'));
        if($data != null && $data->id != null && $data->id >= 0){
            $id = intval($data->id);
            $this->ShipOrderModel->remove_order($id);
            return "Order Has Been Removed";
        }
        return "Please try again";
    }

    public function actionGet_items_by_order($id){
        $this->CheckPermission();
        echo json_encode($this->ShipOrderModel->get_item($id));
    }

    public function actionGet_order_by_id($id){
        $this->CheckPermission();
        echo json_encode($this->ShipOrderModel->get($id));
    }

    public function actionEdit($id = "")
    {   
        $this->CheckPermission();
        $data = NULL;
        $data = json_decode(file_get_contents('php://input'));
        if(!$data || $data->info == NULL){
            $util = $this->ShipOrderModel->get_order_type();            
            $this->viewData['util'] = $util;
            $this->viewData['id'] = $id;
            $this->render('edit', $this->viewData);
            return;            
        }    
        $this->do_edit($id, $data->info, $data->items);            
    }

    public function do_edit($id, $info, $items){
        $ship_order_id = $id;
        //customer info
        $sender_first_name = $info->firstname; //sender firstname
        $sender_middle_name = $info->middlename; //sender middlename
        $sender_last_name = $info->lastname; //sender lastname
        $sender_address = $info->address; //sender address
        $sender_city = $info->city; //sender city
        $sender_state = $info->state; //sender state
        $sender_zipcode = $info->code; //sender zipcode
        $sender_country = $info->country; //sender country
        $sender_tel = $info->tel; //sender mobile phone number
        $sender_email = $info->email; //sender email
        $receiver_first_name = $info->firstname2; //receiver firstname
        $receiver_middle_name = $info->middlename2; //receiver middlename
        $receiver_last_name = $info->lastname2; //receiver lastname
        $receiver_address = $info->address2; //receiver address
        $receiver_city = $info->city2; //receiver city
        $receiver_state = $info->state2; //receiver state
        $receiver_zipcode = $info->code2; //receiver zipcode
        $receiver_country = $info->country2; //receiver country
        $receiver_tel = $info->tel2; //receiver mobile phone number
        $receiver_email = $info->email2; //receiver email
        //order type + ship type + quantity
        $order_type = $info->order_type; //order type
        $box_qty = $info->box_qty; //box quantity        
        $ship_type = $info->ship_type; //shipping type
        //order item related
        $order_discount = $info->total_discount; //order discount
        $order_fee = $info->order_fee; //shipping amazon order fee
        $total_value = 0; //order total value - will be calculated later
        $total_airport_fee = 0; //total airport fee - will be calculated later
        //shipping related
        $total_wt_lbs = $info->total_wt_lbs; //total weight in pound       
        $total_wt_kg = intval($total_wt_lbs) *  0.45359237; //total weight in kilogram       
        $ship_fee_per_lbs = $info->ship_fee_lbs; //shipping fee per pound       
        $ship_discount = $info->ship_discount; //shipping discount                       
        $delivery_instruction = $info->delivery_instruction;
        // //total
        // $total =0; // tobe calculated later
        for($i = 0; $i < count($items); $i++){
            $item = $items[$i];
            $id = $item->ship_item_id;
            $name = $item->name;
            $qty = $item->qty;
            $description = $item->description;
            $wt = $item->wt_lbs;
            $airport_fee = $item->airport_fee;
            $value = $item->value;
            $total_value += intval($value);
            $total_airport_fee += intval($airport_fee);
            $wt_kg = $wt * 0.45359237;
            $this->ShipOrderModel->update_item(array('name' => $name, 'qty' => $qty, 'wt_lbs' => $wt, 'description' => $description,
                'wt_kg' => $wt_kg, 'value' => $value, 'airport_fee' => $airport_fee, 'ship_item_id' => $id));            
        }
        $total_ship_fee = $ship_fee_per_lbs * $total_wt_lbs;
        if(intval($order_discount) > 0) $total_airport_fee = $total_airport_fee - $total_airport_fee * $order_discount/100;
        if(intval($ship_discount) > 0) $total_ship_fee = $total_ship_fee - $total_ship_fee * $ship_discount/100;

        $total = $total_airport_fee + $total_ship_fee + $order_fee;        

        echo $this->ShipOrderModel->update_order(array('order_type' => $order_type, 'ship_type' => $ship_type, 
            'sender_first_name' => $sender_first_name, 'sender_middle_name' => $sender_middle_name, 
            'sender_last_name' => $sender_last_name, 'sender_address'=>$sender_address,'sender_city'=>$sender_city,
            'sender_state'=>$sender_state,'sender_zipcode'=>$sender_zipcode,'sender_country' => $sender_country,
            'sender_tel'=>$sender_tel, 'sender_email' => $sender_email, 'receiver_first_name' => $receiver_first_name, 
            'receiver_middle_name' => $receiver_middle_name, 'receiver_last_name' => $receiver_last_name, 
            'receiver_address'=>$receiver_address,'receiver_city'=>$receiver_city,
            'receiver_state'=>$receiver_state,'receiver_zipcode'=>$receiver_zipcode,'receiver_country' => $receiver_country,
            'receiver_tel'=>$sender_tel, 'receiver_email' => $receiver_email, 'box_qty' => $box_qty, 'total_value' => $total_value,
            'total_airport_fee' => $total_airport_fee, 'order_discount' => $order_discount, 'order_fee' => $order_fee,
            'total_wt_lbs' => $total_wt_lbs, 'total_wt_kg' => $total_wt_kg, 'ship_fee_per_lbs' => $ship_fee_per_lbs,
            'ship_discount' => $ship_discount, 'total' => $total, 'total_ship_fee' => $total_ship_fee, 'delivery_instruction' => $delivery_instruction, 
            'ship_order_id' => $ship_order_id));      

        // for($i = 0 ; $i < count($item_list); $i++) {
        //     $item = $item_list[$i];
        //     $value = $info['item_value'.$i];
        //     $air_fee = $info['item_airport_fee'.$i];            
        //     $this->ShipOrderModel->update_item(array(
        //         'value' => $value, 'airport_fee' => $air_fee, 'ship_item_id' => $item['ship_item_id']
        //         ));
        // }        
    }

    public function actionExport($id){
        $this->CheckPermission();
        $order = $this->ShipOrderModel->get_invoice($id)['order'];
        $items = $this->ShipOrderModel->get_invoice($id)['items'];

        Yii::import('ext.phpexcel.XPHPExcel');    
        $objPHPExcel = XPHPExcel::createPHPExcel();
        $objPHPExcel = PHPExcel_IOFactory::load(HelperUrl::rootUrl().'/sample_invoice.xlsx'); //ARCHIVE excel2007 dir        
        $objPHPExcel->getProperties()->setCreator("Cali Cargo")
                             ->setLastModifiedBy("Cali Cargo")
                             ->setTitle("Invoice for Order #" . $id)
                             ->setSubject("Invoice for Order #" . $id)
                             ->setDescription("Invoice for Order #" . $id)
                             ->setKeywords("excel report")
                             ->setCategory("Invoice");


        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('CaliCargo Invoice #' . $id);

        // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('C6', '#' . $id)
            ->setCellValue('I6', $order['ship_type'])
            ->setCellValue('E6', date("Y-m-d",$order['date_added']))
            ->setCellValue('C7', $order['sender_first_name'] . ' ' . $order['sender_middle_name'] . ' ' . $order['sender_last_name'])
            ->setCellValue('C8', $order['sender_address'] . ', ' . $order['sender_city'] . ', ' . $order['sender_state'] . ', '. $order['sender_zipcode'] . ', '. $order['sender_country'])
            ->setCellValue('C9', $order['sender_tel'])
            ->setCellValue('F9', $order['sender_email'])
            ->setCellValue('C11', $order['receiver_first_name'] . ' ' . $order['receiver_middle_name'] . ' ' . $order['receiver_last_name'])
            ->setCellValue('C12', $order['receiver_address'] . ', ' . $order['receiver_city'] . ', ' . $order['receiver_state'] . ', '. $order['receiver_zipcode'] . ', '. $order['receiver_country'])
            ->setCellValue('C13', $order['receiver_tel'])
            ->setCellValue('F13', $order['receiver_email'])
            ->setCellValue('C14', $order['delivery_instruction'])
            ->setCellValue('I38', $order['total_wt_lbs'])
            ->setCellValue('J38', $order['total_wt_kg'])
            ->setCellValue('I39', $order['ship_fee_per_lbs'])
            ->setCellValue('I40', $order['ship_discount'])
            ->setCellValue('I41', $order['total'])
            ->setCellValue('E38', $order['total_value'])
            ->setCellValue('F38', $order['total_airport_fee'])
            ->setCellValue('G38', $order['order_discount'] . " %")            
            ;

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A17', $order['box_qty']);

        for($i = 0; $i < count($items); $i++ ){
            $item = $items[$i];
            $ci = $i+17;            
            $objPHPExcel->setActiveSheetIndex(0)            
            ->setCellValue('B'.$ci, $item['name'])
            ->setCellValue('E'.$ci, $item['value'])
            ->setCellValue('F'.$ci, $item['airport_fee'])
            ->setCellValue('H'.$ci, $item['qty'])
            ->setCellValue('I'.$ci, $item['wt_lbs'])
            ->setCellValue('J'.$ci, $item['wt_kg'])
            ;
        } 


        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


        // Redirect output to a clientâ€™s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Invoice_Order_Number.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        //Yii::app()->end();
    }   
}