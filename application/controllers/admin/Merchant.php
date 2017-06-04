<?php

include 'Admin.php';

class merchant extends admin {

    function __construct() {
        parent::__construct();
        parent::checkauth();
        $this->data['active_page'] = "merchant";
    }

    //Data on Page
    public function index() {
        $this->data['title_page'] = "Data Merchant";
        $dest_table_as = 'merchant as m';
        $select_values = array('m.*');
        $params = new stdClass();
        $params->dest_table_as = $dest_table_as;
        $params->select_values = $select_values;
        $get = $this->data_model->get($params);
        if ($get['results'] != "") {
            $this->data['records'] = array("status" => 'available', "data" => $get['results']);
        } else {
            $this->data['records'] = array("status" => 'empty');
        }
        parent::display('admin/merchant/index','admin/merchant/function',TRUE);
    }


    public function add() {
        $this->data['title_page'] = "Tambah Merchant";
        parent::display('admin/merchant/add','admin/merchant/function',FALSE);
    }

}
