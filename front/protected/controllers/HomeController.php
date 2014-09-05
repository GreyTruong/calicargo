<?php

class HomeController extends Controller {
    
    private $viewData;
    private $message = array('success' => true, 'error' => array());
    private $validator;
    private $AdminModel;
    
    public function init() {
        parent::init();
        
        /* @var $AdminModel AdminModel */
        $this->AdminModel = new AdminModel();
    }
    
    /**
     * Declares class-based actions.
     */
    public function actions() {
        
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {     
        $this->CheckPermission();   

        $this->render('index');
        
    }   
    
    
    public function actionTest(){
        $this->CheckPermission();   
        echo "hello world";
    }

    public function actionError() {
        HelperGlobal::require_login();
        $this->layout = "404";
        $this->render("error");
    }

    public function actionAccess_denied() {        
        HelperGlobal::require_login();
        $this->layout = "401";
        $this->render("error");
        
    }
    
    public function actionLanguage($lang = "vn"){
        
        $arr = array('en','vn');
        if(in_array($lang, $arr) !== false)
            HelperApp::add_session ('lang', $lang);
        else
            HelperApp::add_session ('lang', "vn");      
        
        $this->redirect(HelperUrl::baseUrl()."admin/login/");
        
    }
    
}