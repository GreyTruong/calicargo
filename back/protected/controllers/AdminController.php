<?php

class AdminController extends Controller {

    private $viewData;
    private $message = array('success' => true, 'error' => array());
    private $validator;
    private $AdminModel;

    public function init() {

        /* @var $validator FormValidator */
        $this->validator = new FormValidator();

        /* @var $AdminModel AdminModel */
        $this->AdminModel = new AdminModel();
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
        $args = array('s' => $s);

        $admins = $this->AdminModel->gets($args, $p, $ppp);
        $total = $this->AdminModel->counts($args);
        $_mainlang = HelperLang::_lang('main');
        $_lang = HelperLang::_lang('admin');
        //print_r($_lang);die;
        $this->viewData['_mainlang'] = $_mainlang;
         $this->viewData['_lang'] = $_lang;
        $this->viewData['admins'] = $admins;
        $this->viewData['total'] = $total;
        $this->viewData['paging'] = $total > $ppp ? HelperApp::get_paging($ppp, HelperUrl::baseUrl() . "admin/index/p/", $total, $p) : "";

        $this->render('index', $this->viewData);
    }
    
    
    public function actionAdd() {
        
        $this->CheckPermission();
        if ($_POST)
            $this->do_add();
        $roler = Helper::roler();
        $this->viewData['roler'] = $roler;
        $this->viewData['message'] = $this->message;
        $this->render('add', $this->viewData);
    }

    private function do_add() {
       $title = trim($_POST['title']);
        $role = trim($_POST['role']);
        $email = trim($_POST['email']);
        $newpwd1 = trim($_POST['password']);
        $newpwd2 = $_POST['re_password'];


        $user = $this->AdminModel->get_by_email($email);
        if ($user)
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

        $admin_id = $this->AdminModel->add($title,$email, $password, $secret_key,$role);
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Thêm', 'Data' => $_POST));
        $this->redirect(HelperUrl::baseUrl() . "admin/edit/id/$admin_id/?s=1");
    }

    public function actionEdit($id = "") {

        $this->CheckPermission();
       
        $admin = $this->AdminModel->get($id);

        if (!$admin)
            $this->load_404();
        if ($_POST)
            $this->do_edit($admin);
        $roler = Helper::roler();
        $this->viewData['roler'] = $roler;
        $this->viewData['user'] = $admin;
        $this->viewData['message'] = $this->message;
        $this->render('edit', $this->viewData);
    }

    public function do_edit($admin) {
        //$title = trim($_POST['title']);
        $email = trim($_POST['email']);
        $role = trim($_POST['role']);
        $newpwd1 = trim($_POST['password']);
        $newpwd2 = $_POST['re_password'];
        $user_check = '';

        $data = array('email' => $email, 'role' => $role, 'last_modified' => time(), 'id' => $admin['id']);
        if ($email != $admin['email'])
            $user_check = $this->AdminModel->get_by_email($email);
        if ($user_check)
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


        $this->AdminModel->update($data);
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Edit', 'Old Data' => $admin, 'New Data' => $_POST));
        $this->redirect(HelperUrl::baseUrl() . "admin/edit/id/$admin[id]/?s=1");
    }

    public function actionDelete($id) {
        $this->CheckPermission();
        $user = $this->AdminModel->get($id);
        if (!$user)
            return;

        $this->AdminModel->update(array('deleted' => 1, 'id' => $id));
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Delete', 'Data' => array('id' => $id)));
    }

    public function actionLogout() {
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Thoát'));
        UserControl::DoLogout();
        $this->redirect(HelperUrl::baseUrl() . "admin/login/");
    }

    public function actionLogin() {
        if (UserControl::LoggedIn())
            $this->redirect(HelperUrl::baseUrl());
        $this->layout = "login";
        if ($_POST)
            $this->do_login();
        $this->viewData['message'] = $this->message;
        $this->render('login', $this->viewData);
    }

    private function do_login() {
        
        $title = trim($_POST['title']);
        $password = trim($_POST['password']);

        if ($this->validator->is_empty_string($title))
            $this->message['error'][] = "Username cannot be blank.";
        if ($this->validator->is_empty_string($password))
            $this->message['error'][] = "Password cannot be blank.";
        if (count($this->message['error']) > 0) {
            $this->message['success'] = false;
            return false;
        }

        $admin = $this->AdminModel->get_by_title($title);
        
        
        
        if (!$admin) {
            $this->message['error'][] = "Username or password does not correct.";
            $this->message['success'] = false;
            return false;
        }

        $hasher = new PasswordHash(10, true);
        if (!$hasher->CheckPassword($password, $admin['password'])) {
            $this->message['error'][] = "Username or password does not correct.";
            $this->message['success'] = false;
            return false;
        }
        
        HelperApp::add_cookie('secret_key', $admin['secret_key'], true);
        //HelperApp::add_cookie('secret_key', $admin['secret_key'], false);
        HelperGlobal::add_log($admin['id'], $this->controllerID(), $this->methodID(), array('Action' => 'Login'));        
        $this->redirect(HelperUrl::baseUrl() . "home/");
    }

    public function actionPassword() {

        HelperGlobal::require_login();

        if ($_POST)
            $this->do_password();
        $this->viewData['message'] = $this->message;
        $this->render('password', $this->viewData);
    }

    private function do_password() {
        $oldpwd = trim($_POST['oldpwd']);
        $newpwd1 = trim($_POST['newpwd1']);
        $newpwd2 = trim($_POST['newpwd2']);

        $hasher = new PasswordHash(10, TRUE);
        
        if ($this->validator->is_empty_string($oldpwd))
            $this->message['error'][] = "Old password cannot be blank.";
        if (!$hasher->CheckPassword($oldpwd, UserControl::getPassword()))
            $this->message['error'][] = "Old password does not correct.";
        if ($this->validator->is_empty_string($newpwd1))
            $this->message['error'][] = "New password cannot be blank.";
        if ($newpwd1 != $newpwd2)
            $this->message['error'][] = "New password and confirm do not match.";

        if (count($this->message['error']) > 0) {
            $this->message['success'] = false;
            return false;
        }

        $password = $hasher->HashPassword($newpwd1);
        $this->AdminModel->update(array('password' => $password, 'id' => UserControl::getId()));
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Change password'));
        $this->redirect(HelperUrl::baseUrl() . "admin/password/?s=1");
    }
   

}