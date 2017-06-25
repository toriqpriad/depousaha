<?php

include 'Front.php';

class info extends front {

  function __construct() {
    parent::__construct();
    $this->load->library(array('pagination'));
    $this->data['active_page'] = "info";
  }

  public function about_us(){
    $dest_table_as = 'setting as s';
    $select_values = array('s.*');
    $params = new stdClass();
    $params->dest_table_as = $dest_table_as;
    $params->select_values = $select_values;
    $get = $this->data_model->get($params);
    $dir_logo = BACKEND_IMAGE_UPLOAD_FOLDER.'logo/'.$get['results'][0]->site_logo;
    $check = check_if_empty($get['results'][0]->site_logo, $dir_logo);
    if($check == NO_IMG_NAME){
      $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
    } else {
      $img = base_url().$dir_logo;
    }
    $get['results'][0]->logo = $img;

    $sc = new stdClass();
    $sc->dest_table_as = 'socmed as sc';
    $sc->select_values = array('*');
    $get_sc = $this->data_model->get($sc);
    if($get_sc['results'] != ""){
      foreach($get_sc['results'] as $each){
        $scm = new stdClass();
        $scm->dest_table_as = 'site_socmed as sc';
        $scm->select_values = array('*');
        $where1 = array("where_column" => 'sc.socmed_id', "where_value" => $each->id);
        $scm->where_tables = array($where1);
        $get_sc = $this->data_model->get($scm);
        if(empty($get_sc["results"][0])){
          $scm_id = "";
          $scm_url = "";
        } else {
          $scm_id = $get_sc["results"][0]->id;
          $scm_url = $get_sc["results"][0]->url;
        }
        $site_scm[] = array(
        "sc_id" => $each->id,
        "sc_icon" => $each->icon,
        "sc_name"=> $each->name,
        "scm_url" => $scm_url
      );
    }

    $this->data['title_page'] = "Tentang Kami";
    $this->data['site_scm'] = $site_scm;
    $this->data['site_info'] = $get['results'][0];
  } else {
    $this->data['site_info'] = [];
  }
  parent::display('front/page/aboutus',true);
}

  public function not_found(){
    $this->data['title_page'] = "Tidak ditemukan";
    parent::display('front/page/not_found',true);
  }
}
