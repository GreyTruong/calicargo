<?php

class OrderController extends Controller {

    private $viewData;
    private $message = array('success' => true, 'error' => array());
    private $validator;
    private $OrderModel;
    private $LanguageModel;
    private $ItemModel;
   

    public function init() {

        /* @var $validator FormValidator */
        $this->validator = new FormValidator();

        /* @var $OrderModel OrderModel */
        $this->OrderModel = new OrderModel();
        /* @var $LanguageModel LanguageModel */
        $this->LanguageModel = new LanguageModel();

        /* @var $ItemModel ItemModel */
        $this->ItemModel = new ItemModel();

       
    }

    public function actions() {
        
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex($p = 1) {

        $this->CheckPermission();
        $ppp = Yii::app()->getParams()->itemAt('ppp');
        $s = isset($_GET['s']) ? $_GET['s'] : "";
        $s = strlen($s) > 2 ? $s : "";
        $args = array('s' => $s, 'deleted' => 0);
        $orders = $this->OrderModel->gets($args, $p, $ppp);
        $total = $this->OrderModel->counts($args);


        $this->viewData['message'] = $this->message;
        $this->viewData['orders'] = $orders;
        $this->viewData['total'] = $total;
        $this->viewData['paging'] = $total > $ppp ? HelperApp::get_paging($ppp, HelperUrl::baseUrl() . "order/index/p/", $total, $p) : "";
        $this->render('index', $this->viewData);
    }

    public function actionView($id) {
        $this->CheckPermission();
        $order = $this->OrderModel->get_by_id($id);
      

        $order_details = $this->OrderModel->get_details($id);

        //print_r($order_details);die;

        $this->viewData['message'] = $this->message;
        $this->viewData['order_details'] = $order_details;
        $this->viewData['order'] = $order;
        $this->render('view', $this->viewData);
    }

}