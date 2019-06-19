<?php

class Info_co1 extends Table {

    public function __construct() {
        $this->table_name = 'info_co1';
    }

    public function get_form_data() {

        $this->data = array(
            'lm' => (int) $_POST["lm"],
            'title' => $_POST["title"],
    		'title_key' => $_POST["title_key"],
    		'title_tion' => $_POST["title_tion"],
            'uselink' => $_POST["uselink"],
            'linkurl' => $_POST["linkurl"],
            'info_from' => $_POST["info_from"],
            'info_author' => $_POST["info_author"],
            'f_body' => $_POST["f_body"],
            'cpcs' => $_POST["cpcs"],
            'z_body' => $_POST["z_body"],
            'hot' => 0,
            'tuijian' => $_POST["tuijian"],
            'pass' => $_POST["pass"],
            'wtime' => strtotime($_POST['wtime']),
            'ip' => get_ip(),
            'toptime' => strtotime(date("Y-m-d H:i:s")),
            'px' => (int) $_POST["px"]
        );
    }

}

?>
