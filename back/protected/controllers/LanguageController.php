<?php

class LanguageController extends Controller {

    private $viewData;
    private $message = array('success' => true, 'error' => array());
    private $validator;
    private $LanguageModel;
    private $SettingModel;

    public function init() {

        parent::init();
        /* @var $validator FormValidator */
        $this->validator = new FormValidator();

        /* @var $LanguageModel LanguageModel */
        $this->LanguageModel = new LanguageModel();
        
          /* @var $SettingModel SettingModel */
        $this->SettingModel = new SettingModel();
        
     
    }

    public function actions() {
        
    }

    public function actionIndex($p = 1) {

        $this->CheckPermission();
        $default = 1;// = $this->SettingModel->get('language');
       
        $ppp = 20; //Yii::app()->getParams()->itemAt('ppp');
        $s = isset($_GET['s']) ? $_GET['s'] : "";
        $s = strlen($s) > 2 ? $s : "";

        $args = array('s' => $s, 'deleted' => 0);


        $langs = $this->LanguageModel->gets($args, $p, $ppp);

        $total = $this->LanguageModel->counts($args);
        $this->viewData['default'] = $default['data'];
        $this->viewData['langs'] = $langs;
        $this->viewData['total'] = $total;
        $this->viewData['paging'] = $total > $ppp ? HelperApp::get_paging($ppp, HelperUrl::baseUrl() . "language/index/p/", $total, $p) : "";

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
        $title = trim($_POST['title']);
        if ($this->validator->is_empty_string($title))
            $this->message['error'][] = "Vui lòng nhập Ngôn Ngữ";


        if (count($this->message['error'])) {
            $this->message['success'] = false;
            return false;
        }


        $id = $this->LanguageModel->add($title);
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Thêm', 'Data' => $_POST));
        $this->redirect(HelperUrl::baseUrl() . "language/edit/id/$id/?s=1");
    }

    public function actionEdit($id = "") {

        $this->CheckPermission();
        $lang = $this->LanguageModel->get($id);
        if (!$lang)
            $this->load_404();
        if ($_POST)
            $this->do_edit($lang);
        $this->viewData['lang'] = $lang;
        $this->viewData['message'] = $this->message;
        $this->render('edit', $this->viewData);
    }

    public function do_edit($lang) {
        $title = trim($_POST['title']);


        if ($this->validator->is_empty_string($title))
            $this->message['error'][] = "Vui lòng nhập Ngôn Ngữ";


        if (count($this->message['error'])) {
            $this->message['success'] = false;
            return false;
        }
        $data = array('title' => $title, 'id' => $lang['id']);

        $this->LanguageModel->update($data);
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Edit', 'Old Data' => $lang, 'New Data' => $_POST));
        $this->redirect(HelperUrl::baseUrl() . "language/edit/id/$lang[id]/?s=1");
    }

    public function actionDelete($id) {
        $this->CheckPermission();
        $user = $this->LanguageModel->get($id);
        if (!$user)
            return;

        $this->LanguageModel->update(array('deleted' => 1, 'id' => $id));
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Delete', 'Data' => array('id' => $id)));
    }

    public function actionBan($id) {
        $disabled = $_GET['disabled'];
        $this->CheckPermission();
        $user = $this->LanguageModel->get($id);
        if (!$user)
            return;

        $this->LanguageModel->update(array('disabled' => $disabled, 'id' => $id));
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Delete', 'Data' => array('id' => $id)));
    }
    
    public function actionChangedefault(){
        $id = $_POST['id'];
        $args = array('title'=>'language','data'=>$id,'date_updated'=>time());
        $this->SettingModel->update($args);
        die;
    }

}