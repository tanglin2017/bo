<?php

class Info_co extends Table {

    public function __construct() {
        $this->table_name = 'info_co';
    }

    public function get_form_data() {

        $this->data = array(
            'lm' => (int) $_POST["lm"],
            'title' => $_POST["title"],
            'e_title' => $_POST["e_title"],
            'color' => $_POST["color"],
            'info_author' => $_POST["info_author"],
            'keywords' => $_POST["keywords"],
            'description' => $_POST["description"],
            'linkurl' => $_POST["linkurl"],
            'f_body' => $_POST["f_body"],
            'z_body' => $_POST["z_body"],
            'hot' => 0,
            'tuijian' => (int)$_POST["tuijian"],
            'pass' =>  (int)$_POST["pass"],
            'wtime' => strtotime($_POST['wtime']),
            'ip' => get_ip(),
            'toptime' => strtotime(date("Y-m-d H:i:s")),
            'px' => (int) $_POST["px"]
        );
    }

}

?>