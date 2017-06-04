<?php

class front extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('data_model');
        $this->load->library(array('curl', 'session'));
        $this->load->helper(array('form', 'url', 'jwt_helper', 'rest_response_helper', 'key_helper', 'image_process_helper', 'file'));
        $this->data = [];
        $this->data['kategori_properti'] = $this->get_kat_properti();
        $this->data['website_information'] = $this->website_information();

    }

    private function get_kat_properti() {
        $params = new stdClass();
        $params->dest_table_as = 'kategori_properti as kat';
        $params->select_values = array('kat.id as id', 'kat.name as nama');
        $get = $this->data_model->get($params);
        return $get["results"];
    }

    public function notfound() {
        $this->data['title_page'] = "Tidak ditemukan";
        $this->load->view('front/404', $this->data);
    }

    private function website_information() {
        $dest_table_as = 'setting_website';
        $select_values = array('*');
        $params = new stdClass();
        $params->dest_table_as = $dest_table_as;
        $params->select_values = $select_values;
        $get = $this->data_model->get($params);
        if ($get['response'] == OK_STATUS) {
            $website = $get['results'][0];
        } else {
            $website = [];
        }

        return $website;
    }

}
