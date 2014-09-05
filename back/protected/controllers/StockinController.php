<?php

class StockinController extends Controller {

    private $viewData;
    private $message = array('success' => true, 'error' => array());
    private $validator;
    private $StockinModel;

    public function init() {

        /* @var $validator FormValidator */
        $this->validator = new FormValidator();

        /* @var $StockinModel StockinModel */
        $this->StockinModel = new StockinModel();
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

        $stockins = $this->StockinModel->gets($args, $p, $ppp);
        $total = $this->StockinModel->counts($args);
        $_mainlang = HelperLang::_lang('main');
        $_lang = HelperLang::_lang('stockin');

        $this->viewData['_mainlang'] = $_mainlang;
        $this->viewData['_lang'] = $_lang;
        $this->viewData['stockins'] = $stockins;
        $this->viewData['total'] = $total;
        $this->viewData['paging'] = $total > $ppp ? HelperApp::get_paging($ppp, HelperUrl::baseUrl() . "stockin/index/p/", $total, $p) : "";

        $this->render('index', $this->viewData);
    }

    public function actionAdd() {
        if ($_POST)
            $this->do_add();

        $this->viewData['message'] = $this->message;
        $this->render('add', $this->viewData);
    }

    private function do_add() {
        $item = trim($_POST['item']);
        $price = trim($_POST['price']);
        $number = trim($_POST['number']);
        if ($item == 0)
            $this->message['error'][] = "Please choose a Item.";
        if ($this->validator->is_empty_string($price))
            $this->message['error'][] = "Price cannot be blank.";
        if ($this->validator->is_empty_string($number))
            $this->message['error'][] = "Number cannot be blank.";

        if (count($this->message['error']) > 0) {
            $this->message['success'] = false;
            return false;
        }
        $total = $price * $number;
        $id = $this->StockinModel->add($item, $price, $number, $total);
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Add', 'Data' => $_POST));
        $this->redirect(HelperUrl::baseUrl() . "stockin/edit/id/$id?s=1");
    }

    public function actionEdit($id = "") {
        $this->CheckPermission();
        $stockin = $this->StockinModel->get($id);
        if (!$stockin)
            $this->load_404();
        if ($_POST)
            $this->do_edit($stockin);

        $this->viewData['message'] = $this->message;
        $this->viewData['stockin'] = $stockin;

        $this->render('edit', $this->viewData);
    }

    private function do_edit($stockin) {
        $item = trim($_POST['item']);
        $price = trim($_POST['price']);
        $number = trim($_POST['number']);
        if ($item == 0)
            $this->message['error'][] = "Please choose a Item.";
        if ($this->validator->is_empty_string($price))
            $this->message['error'][] = "Price cannot be blank.";
        if ($this->validator->is_empty_string($number))
            $this->message['error'][] = "Number cannot be blank.";

        if (count($this->message['error']) > 0) {
            $this->message['success'] = false;
            return false;
        }
        $total = $price * $number;

        $this->StockinModel->update(array('item_id'=>$item,'item_price'=>$price,'number'=>$number,'total_price'=>$total, 'id' => $stockin['id']));
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Sửa', 'Old Data' => $stockin, 'New Data' => $_POST));
        $this->redirect(HelperUrl::baseUrl() . "stockin/edit/id/$stockin[id]/?s=1");
    }

    public function actionDelete($id) {
        $this->CheckPermission();
        $stockin = $this->StockinModel->get($id);
        if (!$stockin)
            return;

        $this->StockinModel->update(array('deleted' => 1, 'id' => $id));
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Delete', 'Data' => array('id' => $id)));
    }

}
