<?php

class CategoryController extends Controller {

    private $viewData;
    private $message = array('success' => true, 'error' => array());
    private $validator;
    private $CategoryModel;
    private $LanguageModel;

    public function init() {

        parent::init();
        /* @var $validator FormValidator */
        $this->validator = new FormValidator();

        /* @var $CategoryModel CategoryModel */
        $this->CategoryModel = new CategoryModel();
        /* @var $LanguageModel LanguageModel */
        $this->LanguageModel = new LanguageModel();
   
    }

    public function actions() {
        
    }

    public function actionIndex($p = 1) {
        $this->CheckPermission();
        $ppp = 40; //Yii::app()->getParams()->itemAt('ppp');
        $s = isset($_GET['s']) ? $_GET['s'] : "";
        $s = strlen($s) > 2 ? $s : "";
        $args = array('s' => $s, 'deleted' => 0);

        $list_categories = $this->CategoryModel->gets($args, $p, $ppp);

        $categories[0] = array();
        foreach ($list_categories as $c) {
            $categories[$c['parent']][] = $c;
        }
        $total_category = $this->CategoryModel->counts($args);
        $languages = $this->LanguageModel->gets($args);

        //$this->viewData['all'] = $all;
        $this->viewData['languages'] = $languages;
        $this->viewData['categories'] = $categories;
        $this->viewData['total'] = $total_category;
        $this->viewData['paging'] = $total_category > $ppp ? HelperApp::get_paging($ppp, HelperUrl::baseUrl() . "category/index/p/", $total_category, $p) : "";

        $this->render('index', $this->viewData);
    }

    public function actionAdd() {

        $this->CheckPermission();
        if ($_POST)
            $this->do_add();
        
        
        $args = array('deleted' => 0);
        $languages = $this->LanguageModel->gets($args);
        $this->viewData['languages'] = $languages;
        $this->viewData['message'] = $this->message;
        $this->render('add', $this->viewData);
    }

    private function do_add() {
        $data = $_POST;
        $parent = 0;
        $args = array('deleted' => 0, 'parent' => $parent);
        $total_category = $this->CategoryModel->counts($args);
        $position = $total_category + 1;
        $category_id = $this->CategoryModel->add($parent, $position);
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Thêm', 'Data' => $_POST));

        foreach ($data as $k => $d) {
            $lang = $k;
            $title = $d['title'];
            $slug = $d['slug'];

            $this->add_metas($category_id, $title, $slug, $lang);
        }

        $this->redirect(HelperUrl::baseUrl() . "category/?s=1");
    }

    private function add_metas($id, $title, $slug, $lang) {
        $this->CategoryModel->add_metas($id, $title, $slug, $lang);
    }

    public function actionDoCatetory() {
        $category = $_POST['category'];

        $this->get_category($category);
        die;
    }

    private function get_category($array, $parent = 0) {
        foreach ($array as $k => $a) {
            $positon = $k + 1;
            $this->update_position($a['id'], $parent, $positon);
            if (isset($a['children'])) {
                $this->get_category($a['children'], $a['id']);
            }
        }
    }

    private function update_position($id, $parent, $position) {

        $this->CategoryModel->update(array('position' => $position, 'parent' => $parent, 'last_modified' => time(), 'id' => $id));
    }

    private function array_depth($array) {
        $max_depth = 1;
        foreach ($array as $value) {
            if (is_array($value)) {
                $depth = $this->array_depth($value) + 1;
                if ($depth > $max_depth) {
                    $max_depth = $depth;
                }
            }
        }
        return $max_depth;
    }

    public function actionEdit($id) {

        //print_r($id);die;
        $this->CheckPermission();
        $get_category = $this->CategoryModel->get_with_lang($id);
        $category = array();
        foreach ($get_category as $c) {
            $category[$c['language']] = $c;
        }
        
        

        if (!$category)
            $this->load_404();
        if ($_POST)
            $this->do_edit($category,$id);
       
        $args = array('deleted' => 0);
        $languages = $this->LanguageModel->gets($args);
        $this->viewData['languages'] = $languages;
        $this->viewData['message'] = $this->message;
        $this->viewData['category'] = $category;
        $this->render('edit', $this->viewData);
    }

    private function do_edit($category,$id) {
        $data = $_POST;
//        if ($this->validator->is_empty_string($data[]))
//            $this->message['error'][] = "Please enter Title.";
//        if (count($this->message['error'])) {
//            $this->message['success'] = false;
//            return false;
//        }
        
       
        foreach ($data as $k => $d) {
            $lang = $k;
            $title = $d['title'];
            $slug = $d['slug'];
            
            $meta = $this->CategoryModel->check_by_language($id, $lang);
            if (!$meta)
                $this->add_metas($id, $title, $slug, $lang);
            else
                $this->edit_metas($meta, $title, $slug, $lang);
        }
        
        
        
         $this->redirect(HelperUrl::baseUrl() . "category/edit/id/$id/?s=1");
        
    }
    private function edit_metas($meta,$title,$slug,$lang){
        $data = array('title'=>$title,'slug'=>$slug,'language'=>$lang,'id'=>$meta['id']);
        $this->CategoryModel->update_metas($data);
    }

    public function actionDelete($id) {
        $this->CheckPermission();
        $category = $this->CategoryModel->get($id);
        if (!$category)
            return;
        $this->position('delete', $category['parent'], $category['position']);
        $this->CategoryModel->update(array('deleted' => 1, 'position' => 0, 'last_modified' => time(), 'id' => $id));
        HelperGlobal::add_log(UserControl::getId(), $this->controllerID(), $this->methodID(), array('Action' => 'Delete', 'Data' => array('id' => $id)));
    }

    public function actionCreateSlug() {
        $title = $_POST['title'];
        $slug = Helper::create_slug($title);
        $count_slug = $this->CategoryModel->check_exist_slug($slug);
        if ($count_slug > 0)
            $slug = $slug . "-" . $count_slug;
        $data['slug'] = $slug;
        $data_json = json_encode($data);
        echo $data_json;
    }


    private function position($type, $parent, $position_old = 0, $position_new = 0) {
        if ($position_old == $position_new)
            return false;
        $args['deleted'] = 0;
        $args['type'] = 'category';
        $args['parent'] = $parent;
        if ($type == 'delete') {
            $args['small'] = $position_old;
            $categories = $this->CategoryModel->gets($args, 1, 100);
            foreach ($categories as $s) {
                $this->CategoryModel->update(array('position' => ($s['position'] - 1), 'id' => $s['id']));
            }
            return true;
        }
        if ($type == 'update') {
            if ($position_old < $position_new) {
                $args['small'] = $position_old;
                $args['larg'] = $position_new;
                $categories = $this->CategoryModel->gets($args, 1, 100);
                foreach ($categories as $s) {
                    $this->CategoryModel->update(array('position' => ($s['position'] - 1), 'id' => $s['id']));
                }
            } else {
                $args['small'] = $position_new;
                $args['larg'] = $position_old;
                $categories = $this->CategoryModel->gets($args, 1, 100);
                foreach ($categories as $s) {
                    $this->CategoryModel->update(array('position' => ($s['position'] + 1), 'id' => $s['id']));
                }
            }
            return true;
        }
    }

    public function actionGetchild($id) {

        $data['success'] = 0;
        $html = '<option value="0"> -- Chọn thể loại con -- </option>';
        $category = $this->CategoryModel->get($id);
        // print_r($category);die;
        if (!$category) {
            $data['html'] = $html;
            echo json_encode($data);
            die;
        }
        $args = array('parent' => $id, 'deleted' => 0);
        $childs = $this->CategoryModel->gets($args);

        $data['success'] = 1;
        foreach ($childs as $c) {
            $html .= '<option value="' . $c['id'] . '">' . $c['title'] . '</option>';
        }
        $data['html'] = $html;
        echo json_encode($data);
        die;
    }

}