<?php

class cp_lm extends Table {

    public function __construct() {
        $this->table_name = 'cp_lm';
    }

    public function get_form_data() {
        $this->data = array(
            'fid' => $_POST["fid"],
            'title_lm' => $_POST["title_lm"],
            //'en_titlelm' => $_POST["en_titlelm"],
            'add_xx' => (int) $_POST["add_xx"],
            'px' => (int) $_POST["px"],
            'xia' => (int) $_POST["xia"],
            'uselink' => (int) $_POST["uselink"],
            'info_from' => (int) $_POST["info_from"],
            'f_body' => (int) $_POST["f_body"],
            'z_body' => (int) $_POST["z_body"],
            'img_sl' => (int) $_POST["img_sl"]
           // 'bimg_sl' => (int) $_POST["bimg_sl"],
           // 'down_info' => (int) $_POST["down_info"]
        );
        //var_dump($this->data);
    }

}

?>