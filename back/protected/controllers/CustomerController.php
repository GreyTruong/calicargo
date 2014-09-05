<?php

class CustomerController extends Controller {

    private $viewData;
    private $message = array('success' => true, 'error' => array());
    private $validator;
    private $CustomerModel;
   // private $OrderModel;

    public function init() {

        parent::init();
        /* @var $validator FormValidator */
        $this->validator = new FormValidator();

        /* @var $CustomerModel CustomerModel */
        $this->CustomerModel = new CustomerModel();
        
//          /* @var $OrderModel OrderModel */
//        $this->OrderModel = new OrderModel();
        
        
    }

    public function actions() {
        
    }

    public function actionIndex($p = 1) {

        $this->CheckPermission();

        $ppp = 20; //Yii::app()->getParams()->itemAt('ppp');
        $s = isset($_GET['s']) ? $_GET['s'] : "";
        $s = strlen($s) > 2 ? $s : "";

        $args = array('s' => $s, 'deleted' => 0);


        $customers = $this->CustomerModel->gets($args, $p, $ppp);
        
        $total = $this->CustomerModel->counts($args);

        $this->viewData['customers'] = $customers;
        $this->viewData['total'] = $total;
        $this->viewData['paging'] = $total > $ppp ? HelperApp::get_paging($ppp, HelperUrl::baseUrl() . "customer/index/p/", $total, $p) : "";

        $this->render('index', $this->viewData);
    }

    public function actionAdd() {

        $this->CheckPermission();
        if ($_POST)
            $this->do_add();

        $this->viewData['message'] = $this->message;
        $this->render('add', $this->viewData);
    }

    private function do_add() {
//        $title = trim($_POST['title']);
        $email = trim($_POST['email']);
        $newpwd1 = trim($_POST['password']);
        $newpwd2 = $_POST['re_password'];
        
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $customer = $this->CustomerModel->get_by_email($email);
        if ($customer)
            $this->message['error'][] = "Email này đã được sử dụng";
        if ($this->validator->is_empty_string($email))
            $this->message['error'][] = "Vui lòng nhập Email";
        if (!$this->validator->is_email($email))
            $this->message['error'][] = "Vui lòng đúng Email";
        if ($this->validator->is_empty_string($newpwd1))
            $this->message['error'][] = "Vui lòng nhập Mật khẩu";
        if ($newpwd1 != $newpwd2)
            $this->message['error'][] = "Mật khẩu nhập lại không khớp.";

        if (count($this->message['error'])) {
            $this->message['success'] = false;
            return false;
        }
        $hasher = new PasswordHash(10, TRUE);
        $password = $hasher->HashPassword($newpwd1);
        $secret_key = Ultilities::base32UUID();

        $customer_id = $this->CustomerModel->add($email, $password,$secret_key,$name,$phone,$address);
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Thêm', 'Data' => $_POST));
        $this->redirect(HelperUrl::baseUrl() . "customer/edit/id/$customer_id/?s=1");
    }

    public function actionEdit($id = "") {

        $this->CheckPermission();
        $customer = $this->CustomerModel->get($id);
        if (!$customer)
            $this->load_404();
        if ($_POST)
            $this->do_edit($customer);
        $this->viewData['customer'] = $customer;
        $this->viewData['message'] = $this->message;
        $this->render('edit', $this->viewData);
    }

    public function do_edit($customer) {
        $email = trim($_POST['email']);
        $newpwd1 = trim($_POST['password']);
        $newpwd2 = $_POST['re_password'];
        $customer_check = '';
        
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        
        $data = array('email' => $email, 'date_updated' => time(), 'id' => $customer['id'],'name'=>$name,'phone'=>$phone,'address'=>$address);
        if ($email != $customer['email'])
            $customer_check = $this->CustomerModel->get_by_email($email);
        if ($customer_check)
            $this->message['error'][] = "Email này đã được sử dụng";
        if ($this->validator->is_empty_string($email))
            $this->message['error'][] = "Vui lòng nhập Email";
        if (!$this->validator->is_email($email))
            $this->message['error'][] = "Vui lòng đúng Email";
        if (!$this->validator->is_empty_string($newpwd1)) {
            if ($newpwd1 != $newpwd2)
                $this->message['error'][] = "Mật khẩu nhập lại không khớp.";
            $hasher = new PasswordHash(10, TRUE);
            $password = $hasher->HashPassword($newpwd1);
            $data['password'] = $password;
        }

        if (count($this->message['error'])) {
            $this->message['success'] = false;
            return false;
        }


        $this->CustomerModel->update($data);
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Edit', 'Old Data' => $customer, 'New Data' => $_POST));
        $this->redirect(HelperUrl::baseUrl() . "customer/edit/id/$customer[id]/?s=1");
    }

    public function actionDelete($id) {
        $this->CheckPermission();
        $customer = $this->CustomerModel->get($id);
        if (!$customer)
            return;

        $this->CustomerModel->update(array('deleted' => 1, 'id' => $id));
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Delete', 'Data' => array('id' => $id)));
    }

    public function actionBan($id) {
        $disabled = $_GET['disabled'];
        $this->CheckPermission();
        $customer = $this->CustomerModel->get($id);
           if (!$customer)
            return;
      
        $this->CustomerModel->update(array('disabled' => $disabled, 'id' => $id));
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Delete', 'Data' => array('id' => $id)));
    }

}