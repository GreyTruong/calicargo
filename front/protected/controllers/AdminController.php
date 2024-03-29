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

        $this->viewData['admins'] = $admins;
        $this->viewData['total'] = $total;
        $this->viewData['paging'] = $total > $ppp ? HelperApp::get_paging($ppp, HelperUrl::baseUrl() . "admin/index/p/", $total, $p) : "";

        $this->render('index', $this->viewData);
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