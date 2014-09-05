<?php

/*
 * Class này dùng để hiển thị Text của phần BackEnd theo Ngôn ngữ.
 * vn,en là những array chứa nội dung của Text.
 * $key: là thành phần mình muốn lấy. Thường đặt tên giống với controller, vd nội dung các Text của phần hiển thị của Controller Admin, thì trong vn và en có chung array 'admin' và mình thêm các nội dung Text có trong phần Admin.
 * main là key chung, dùng nhiều và liên tục ở BackEnd.
 */

class HelperLang {

    public static function _lang($key) {
        $lang = HelperApp::get_session('lang');
        if (!$lang) {
            HelperApp::add_session('lang', 'en');
            $lang = Yii::app()->getParams()->itemAt('lang');
        }

        $data = array(
            
            'vn' => array('main'=>array('edit'=>'Thay đổi','add'=>'Thêm','delete'=>"Xóa"),
                'admin' => array('homepage' => 'Trang Chủ',
                                 'list' => 'Danh Sách User'),
                                    ),
            'en' => array('main'=>array('edit'=>'Edit','add'=>'Add','delete'=>"Delete"),
                'admin' => array('homepage' => 'Homepage',
                                 'list' => 'List User')
                          )
                    );
        return isset($data[$lang][$key]) ? $data[$lang][$key] : $key;
    }

}
