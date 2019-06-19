<?php

class Info_lm extends Table {

    public function __construct() {
        $this->table_name = 'info_lm';
    }

    public function get_form_data() {
        $this->data = array(
            'fid' => $_POST["fid"],
            'title_lm' => $_POST["title_lm"],
            'add_xx' => (int) $_POST["add_xx"],
            'e_name' => (int) $_POST["e_name"],
            'tuijiana' => (int) $_POST["tuijiana"],
            'title_en' =>$_POST["title_en"],
            'keywords' =>$_POST["keywords"],
            'jianjie' =>$_POST["jianjie"],
            'neirong' =>$_POST["neirong"],
            'description' =>$_POST["description"],
            'web_key' => (int) $_POST["web_key"],
            'px' => (int) $_POST["px"],
            'xia' => (int) $_POST["xia"],
            'uselink' => (int) $_POST["uselink"],
            'info_from' => (int) $_POST["info_from"],
            'f_body' => (int) $_POST["f_body"],
            'z_body' => (int) $_POST["z_body"],
            'img_sl' => (int) $_POST["img_sl"],
            'bimg_sl' => (int) $_POST["bimg_sl"]
        );
    }

}

?>