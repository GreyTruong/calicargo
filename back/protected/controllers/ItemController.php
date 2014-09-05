<?php

class ItemController extends Controller {

    private $viewData;
    private $message = array('success' => true, 'error' => array());
    private $validator;
    private $ItemModel;
    private $CategoryModel;
    private $LanguageModel;

    public function init() {

        parent::init();
        /* @var $validator FormValidator */
        $this->validator = new FormValidator();

        /* @var $ItemModel ItemModel */
        $this->ItemModel = new ItemModel();

        /* @var $CategoryModel CategoryModel */
        $this->CategoryModel = new CategoryModel();
        /* @var $LanguageModel LanguageModel */
        $this->LanguageModel = new LanguageModel();
    }

    public function actions() {
        
    }

    public function actionIndex($category = '', $p = 1) {
        $this->CheckPermission();

    
        $ppp = Yii::app()->getParams()->itemAt('ppp');
        $s = isset($_GET['s']) ? $_GET['s'] : "";
        $s = strlen($s) > 2 ? $s : "";
        $args = array('s' => $s, 'deleted' => 0);
        $all_items = $this->ItemModel->gets($args, $p, $ppp);
        
        $total = $this->ItemModel->counts($args);
        //print_r($total);die;
        

        $this->viewData['message'] = $this->message;
        $this->viewData['items'] = $all_items;
        $this->viewData['total'] = $total;
        $this->viewData['paging'] = $total > $ppp ? HelperApp::get_paging($ppp, HelperUrl::baseUrl() . "item/index/category/$category/p/", $total, $p) : "";
        $this->render('index', $this->viewData);
    }

    public function actionAdd() {
        $this->CheckPermission();
        if ($_POST)
            $this->do_add();
        $args = array('deleted' => 0);
        $list_categories = $this->CategoryModel->gets($args, 1, 100);
        $this->cksession();
        $categories[0] = array();
        foreach ($list_categories as $c) {
            $categories[$c['parent']][] = $c;
        }
        $languages = $this->LanguageModel->gets($args);
        $this->viewData['languages'] = $languages;
        $this->viewData['categories'] = $categories;
        // $this->viewData['category'] = $category_details;
        $this->viewData['message'] = $this->message;
        $this->render('add', $this->viewData);
    }

    private function do_add() {

        $code = $_POST['code'];
        $price = $_POST['price'];
        $number = $_POST['number'];
        $file = $_FILES['file'];

        $data_lang = $_POST;
        unset($data_lang['categories']);
        unset($data_lang['code']);
        unset($data_lang['price']);
        unset($data_lang['number']);
        unset($data_lang['disabled']);
        //print_r($data_lang);die;


        $img = HelperApp::upload_files($file);
        $url = $img[0]['url'];
        $disabled = 0;
        if (isset($_POST['disabled']))
            $disabled = 1;
        $category = ',' . implode(',', $_POST['categories']) . ',';
        $item_id = $this->ItemModel->add($category, $code, $url, $price, $number, $disabled);
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Add', 'Data' => $_POST));
        foreach ($data_lang as $k => $d) {
            $title = $d['title'];
            $slug = $d['slug'];
            $this->ItemModel->add_metas($item_id, $k, $title, $slug);
        }
        $this->redirect(HelperUrl::baseUrl() . "item/edit/$item_id?s=1");
    }

    private function add_metas($id, $type, $data) {
        $this->ItemModel->add_metas($id, $type, $data);
    }

    public function actionEdit($id = "") {


        $this->CheckPermission();
        $item = $this->ItemModel->get($id);



        if (!$item)
            $this->load_404();


        $_item = array();
        $items_lang = array();
        foreach ($item as $k => $i) {
            $_item['id'] = $i['id'];
            $_item['code'] = $i['code'];
            $_item['category_id'] = $i['category_id'];
            $_item['price'] = $i['price'];
            $_item['number'] = $i['number'];
            $_item['code'] = $i['code'];
            $_item['disabled'] = $i['disabled'];
            $_item['img'] = $i['img'];


            $items_lang[$i['language_id']]['title'] = $i['title'];
            $items_lang[$i['language_id']]['slug'] = $i['slug'];
        }

        if ($_POST)
            $this->do_edit($_item);

        $_item['category_id'] = explode(',', $_item['category_id']);
        $category_args = array_filter($_item['category_id']);

        $this->cksession();
        $args['deleted'] = 0;
        $list_categories = $this->CategoryModel->gets($args, 1, 100);

        $categories[0] = array();
        foreach ($list_categories as $c) {
            $categories[$c['parent']][] = $c;
        }


        $args_lang = array('deleted' => 0);
        $languages = $this->LanguageModel->gets($args_lang);
        $this->viewData['categories'] = $categories;
        $this->viewData['category_args'] = $category_args;
        $this->viewData['languages'] = $languages;
        $this->viewData['message'] = $this->message;
        $this->viewData['item'] = $_item;
        $this->viewData['items_lang'] = $items_lang;
        $this->render('edit', $this->viewData);
    }

    private function do_edit($item) {

        //print_r($item);die;

        $code = $_POST['code'];
        $price = $_POST['price'];
        $number = $_POST['number'];
        $file = $_FILES['file'];

        $data_lang = $_POST;
        unset($data_lang['categories']);
        unset($data_lang['code']);
        unset($data_lang['price']);
        unset($data_lang['number']);
        unset($data_lang['disabled']);

        $url = $item['img'];
        if (!$this->validator->is_empty_string($file['name'])) {
            $img = HelperApp::upload_files($file);
            if (file_exists(HelperUrl::upload_dir() . $url)) {
                @unlink(HelperUrl::upload_dir() . $url);
            }

            $url = $img[0]['url'];
        }
        $disabled = 0;
        if (isset($_POST['disabled']))
            $disabled = 1;
        $category = ',' . implode(',', $_POST['categories']) . ',';
        $this->ItemModel->update(array('code' => $code, 'category_id' => $category, 'disabled' => $disabled,
            'price' => $price, 'number' => $number, 'img' => $url,
            'last_updated' => time(), 'id' => $item['id']));
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Edit', 'Old Data' => $item, 'New Data' => $_POST));
        $id = $item['id'];
        foreach ($data_lang as $k => $d) {
            $title = $d['title'];
            $slug = $d['slug'];
            $check = $this->ItemModel->check_item_lang($id, $k);
            if (!$check)
                $this->ItemModel->add_metas($id, $k, $title, $slug);
            else {
                $this->ItemModel->update_metas(array('item_id' => $id, 'language_id' => $k, 'title' => $title, 'slug' => $slug));
            }
        }

        $this->redirect(HelperUrl::baseUrl() . "item/edit/id/$id/?s=1");
    }

    public function actionEditcolor($id) {
        $this->CheckPermission();
        $color = $this->ItemModel->get_color($id);
        $item = $this->ItemModel->get($color['item']);
        $category_details = $this->CategoryModel->get($item['category']);
        if (!$color)
            $this->load_404();
        if ($_POST)
            $this->do_edit_color($color, $item);
        $items_lang = json_decode($item['data'], true);
        $args_lang = array('deleted' => 0);
        $languages = $this->LanguageModel->gets($args_lang);
        $images = $this->ItemModel->get_images($id);
        $color_lang = json_decode($color['data'], true);
        $this->viewData['message'] = $this->message;
        $this->viewData['item'] = $item;
        $this->viewData['category'] = $category_details;
        $this->viewData['items_lang'] = $items_lang;
        $this->viewData['color'] = $color;
        $this->viewData['languages'] = $languages;
        $this->viewData['images'] = $images;
        $this->viewData['color_lang'] = $color_lang;

        $this->render('edit_color', $this->viewData);
    }

    private function do_edit_color($color, $item) {
        $data_lang = $_POST;
        $file = $_FILES['file'];
        $image = $_FILES['image'];
        unset($data_lang['number']);
        unset($data_lang['color_default']);
        $number = $_POST['number'];


        $url = $color['img'];
        if (!$this->validator->is_empty_string($file['name'])) {
            $img = HelperApp::upload_files($file);
            if (file_exists(HelperUrl::upload_dir() . $url)) {
                @unlink(HelperUrl::upload_dir() . $url);
            }
            $url = $img[0]['url'];
        }

        $url_image = $color['image'];
        if (!$this->validator->is_empty_string($image['name'])) {
            $img = HelperApp::upload_files($image);
            if (file_exists(HelperUrl::upload_dir() . $url_image)) {
                @unlink(HelperUrl::upload_dir() . $url_image);
            }

            $url_image = $img[0]['url'];
        }

        $this->ItemModel->update_color(array('img' => $url, 'number' => $number, 'image' => $url_image,
            'date_updated' => time(), 'id' => $color['id']));

        if (isset($_POST['color_default'])) {
            $data_item = array('color' => $color['id'], 'img' => $url_image, 'id' => $item['id']);
            $this->ItemModel->update($data_item);
        }
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Edit', 'Old Data' => $color, 'New Data' => $_POST));
        $id = $color['id'];
        $data_color = array();
        foreach ($data_lang as $k => $d) {
            $lang = $k;
            $data_color[$lang]['price'] = $d['price'];
            $data_color[$lang]['price_plus'] = $d['price_plus'];
            //$meta = $this->ItemModel->check_item_lang($item[0]['id'], $lang);
        }

        if (isset($_POST['color_default'])) {
            $data_item = array('color' => $color['id'], 'img' => $url_image, 'id' => $item['id'], 'price' => json_encode($data_color));
            $this->ItemModel->update($data_item);
        }

        $data_json = json_encode($data_color);
        $check_meta = $this->ItemModel->get_metas($color['id'], 'color');
        if ($check_meta)
            $this->edit_metas($color['id'], 'color', $data_json);
        else
            $this->add_metas($color['id'], 'color', $data_json);
        $this->redirect(HelperUrl::baseUrl() . "item/editcolor/id/$id/?s=1");
    }

    public function actionAddColor($item) {
        $item_details = $this->ItemModel->get($item);
        $item_details['data'] = json_decode($item_details['data'], true);

        if (!$item_details)
            $this->load_404();
        if ($_POST)
            $this->do_add_color($item, $item_details);


        $args_lang = array('deleted' => 0);
        $languages = $this->LanguageModel->gets($args_lang);
        $category_details = $this->CategoryModel->get($item_details['category']);
        $this->viewData['languages'] = $languages;
        $this->viewData['item'] = $item_details;
        $this->viewData['category'] = $category_details;
        $this->viewData['message'] = $this->message;

        $this->render('add_color', $this->viewData);
    }

    private function do_add_color($item, $item_details) {

        $data_lang = $_POST;
        $file = $_FILES['file'];

        $image = $_FILES['image'];
        unset($data_lang['number']);
        unset($data_lang['color_default']);

        $number = $_POST['number'];
        $url = '';
        //$this->ItemModel->check_item_color_default($item);

        if (!$this->validator->is_empty_string($file['name'])) {
            $img = HelperApp::upload_files($file);
            $url = $img[0]['url'];
        }

        $url_img = '';
        if (!$this->validator->is_empty_string($image['name'])) {
            $img = HelperApp::upload_files($image);
            $url_img = $img[0]['url'];
        }
        $id = $this->ItemModel->add_color($item, $url, $url_img, $number);

//        if (isset($_POST['color_default'])) {
//            $data_item = array('color' => $id, 'img' => $url_img, 'id' => $item['id']);
//            $this->ItemModel->update($data_item);
//        }
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Add', 'New Data' => $_POST));
        $data_color = array();
        foreach ($data_lang as $k => $d) {
            $lang = $k;
            $data_color[$lang]['price'] = $d['price'];
            $data_color[$lang]['price_plus'] = $d['price_plus'];
            //$meta = $this->ItemModel->check_item_lang($item[0]['id'], $lang);
        }

        if (isset($_POST['color_default']) || $item_details['color'] == '') {
            $data_item = array('color' => $id, 'id' => $item, 'img' => $url_img, 'price' => json_encode($data_color));
            $this->ItemModel->update($data_item);
        }
        $data_json = json_encode($data_color);
        $this->add_metas($id, 'color', $data_json);
        $this->redirect(HelperUrl::baseUrl() . "item/editcolor/id/$id/?s=1");
    }

    public function actionColor($item) {
        $item_details = $this->ItemModel->get($item);
        $item_details['data'] = json_decode($item_details['data'], true);

        if (!$item_details)
            $this->load_404();
        $category_details = $this->CategoryModel->get($item_details['category']);
        $colors = $this->ItemModel->get_colors($item);

        //print_r($colors);die;

        $this->viewData['colors'] = $colors;
        $this->viewData['item'] = $item_details;
        $this->viewData['category'] = $category_details;
        $this->viewData['message'] = $this->message;
        $this->render('color', $this->viewData);
    }

    public function actionDelete($id) {
        $this->CheckPermission();
        $item = $this->ItemModel->get($id);
        if (!$item)
            return;
        $this->ItemModel->update(array('deleted' => 1, 'date_updated' => time(), 'id' => $id));
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Delete', 'Data' => array('id' => $id)));
        $this->redirect(HelperUrl::baseUrl() . "item/?s=1");
    }

    public function actionUploadImage($item, $color) {
        $file = $_FILES['file'];
        $url = '';
        if ($file != '' && !$this->validator->is_empty_string($file['name'])) {
            $img = HelperApp::upload_files($file);
            $url = $img[0]['url'];
        }

        $id = $this->ItemModel->add_image($item, $color, $url);

        $html = '<li>
                                                <div>
                                                    <img width="200" height="200" src="' . HelperUrl::upload_url() . $url . '">
                                                    <div class="text">
                                                        <div class="inner">
                                                            <a href="#">
                                                                <i data-id="' . $id . '" class="ace-icon fa fa-times red remove-image"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>';
        $data['html'] = $html;
        $data_json = json_encode($data);
        echo $data_json;
        die;
    }

    public function actionUploadColor($id) {
        $file = $_FILES['file'];
        $url = '';
        if ($file != '' && !$this->validator->is_empty_string($file['name'])) {
            $img = HelperApp::upload_files($file);
            $url = $img[0]['url'];
        }

        $id = $this->ItemModel->add_color($id, $url);

        $html = '   <li>
                                                <div>
                                                    <img width="200" height="200" src = "' . HelperUrl::upload_url() . $url . '" >

                                                    <div class="text">
                                                        <div class="inner">
                                                            <a data-rel="colorbox" href = "' . HelperUrl::baseUrl() . 'item/editcolor/' . $id . '"  class="cboxElement">
                                                                <i class="ace-icon fa fa-star"></i>
                                                            </a>
                                                            <a href="' . HelperUrl::baseUrl() . 'item/editcolor/' . $id . '">
                                                                <i class="ace-icon fa fa-pencil"></i>
                                                            </a>
                                                            <a href="#">
                                                                <i data-id="' . $id . '" class="ace-icon fa fa-times red remove-color"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>';


        $data['html'] = $html;
        $data_json = json_encode($data);
        echo $data_json;
        die;
    }

    public function actionRemoveImage() {
        $this->CheckPermission();
        $id = $_POST['id'];
        $this->ItemModel->removeImage($id);
    }

    public function actionRemoveColor($id) {

        $this->CheckPermission();
//        $item = $this->ItemModel->get($id);
//        if (!$item)
//            return;
        $this->ItemModel->update_color(array('deleted' => 1, 'date_updated' => time(), 'id' => $id));
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Delete', 'Data' => array('id' => $id)));
        // $this->redirect(HelperUrl::baseUrl() . "item/?s=1");
        die;
    }

    private function cksession() {

        $uploadURL = HelperUrl::upload_url() . 'uploads';
        $uploadDir = HelperUrl::upload_dir() . 'uploads';
        // $session['KCFINDER'] = array();
        $ck = array('disabled' => false, 'uploadURL' => $uploadURL, 'uploadDir' => $uploadDir, 'access' => array(
                'files' => array(
                    'upload' => true,
                    'delete' => true,
                    'copy' => true,
                    'move' => true,
                    'rename' => true
                ),
                'dirs' => array(
                    'create' => true,
                    'delete' => true,
                    'rename' => true
                )
        ));
        //$session['KCFINDER'] = $ck;
        HelperApp::add_session('KCFINDER', $ck);
        HelperApp::add_cookie('KCFINDER', $ck);
    }

}
