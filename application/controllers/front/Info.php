<?php

include 'Front.php';

class info extends front {

  function __construct() {
    parent::__construct();
    $this->load->library(array('pagination'));
    $this->data['active_page'] = "info";
    $this->data['description'] = "Informasi terkait website";
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
      $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
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

  public function search(){
    $keyword = $this->input->post('keyword');
    $category = $this->input->post('category');
    // FIND IN PRODUCT
    $product_search = new stdClass();
    $join1 = array("join_with" => 'merchant as m', "join_on" => 'p.merchant_id = m.id', "join_type" => '');
    $where_merchant = array("where_column" => 'm.status', "where_value" => 'A');
    $product_search->dest_table_as = 'product as p';
    $product_search->select_values = array('*');
    $where1 = array("where_column" => 'p.name', "where_value" => $keyword);
    if($category != ""){
      $where2 =   array("where_column" => 'product_category_id', "where_value" => $category);
      $product_search->where_tables = array($where2);
    }
    $product_search->join_tables = array($join1);
    $product_search->where_tables = array($where_merchant);
    $product_search->where_tables_like = array($where1);
    $do_product_search = $this->data_model->get($product_search);
    if($do_product_search['results'] != ""){
      foreach($do_product_search['results'] as $each){
        $each->link = base_url().'product/detail/'.$each->link;
        $product_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'merchant/'.$each->merchant_id.'/product/'.$each->id.'/';
        $dest = 'product_images';
        $select = array('name');
        $where1 = array("where_column" => 'id_product', "where_value" => $each->id);
        $where2 = array("where_column" => 'sort', "where_value" => '0');
        $img = new stdClass();
        $img->dest_table_as = $dest;
        $img->select_values = $select;
        $img->where_tables = array($where1,$where2);
        $get_img = $this->data_model->get($img);
        $noimg_dir = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
        if(isset($get_img['results'][0]->name)){
          if($get_img['results'][0]->name != ""){
            $check = check_if_empty($get_img['results'][0]->name, $product_dir.$get_img['results'][0]->name);
            if($check == NO_IMG_NAME){
              $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
            } else {
              $img = base_url().$product_dir.$check;
            }
          } else {
            $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
          } }else {
            $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
          }
          $each->img = $img;
        }
      }

      //FIND IN MERCHANT
      $merchant_search = new stdClass();
      $merchant_search->dest_table_as = 'merchant';
      $merchant_search->select_values = array('*');
      $where1 = array("where_column" => 'name', "where_value" => $keyword);
      $where2 = array("where_column" => 'status', "where_value" => 'A');
      $merchant_search->where_tables_like = array($where1,$where2);
      $do_merchant_search = $this->data_model->get($merchant_search);
      if ($do_merchant_search["results"] != "") {
        foreach($do_merchant_search["results"] as $mr){
          $where = "";
          $cover = "";
          $img = "";
          $where = array("where_column" => 'p.merchant_id', "where_value" => $mr->id);
          $product_total = $this->data_model->get_count('product as p',array($where));
          if($product_total['response'] == FAIL_STATUS){
            $mr->product_total = 0;
          } else {
            $mr->product_total = $product_total['results'];
          }
          $mr->link = base_url().'merchant/detail/'.$mr->link;
          //chekc logo
          $img_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'merchant/'.$mr->id.'/logo/';
          $noimg_dir = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
          if($mr->logo != ""){
            $check = check_if_empty($mr->logo, $img_dir.$mr->logo);
            if($check == NO_IMG_NAME){
              $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
            } else {
              $img = base_url().$img_dir.$check;
            }
          }
          else {
            $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
          }
          $mr->logo = $img;
          // check cover
          $img_dir_cover = BACKEND_IMAGE_UPLOAD_FOLDER.'merchant/'.$mr->id.'/cover/';
          $noimg_dir = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
          if($mr->cover != ""){
            $check = check_if_empty($mr->cover, $img_dir_cover.$mr->cover);
            if($check == NO_IMG_NAME){
              $cover = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
            } else {
              $cover = base_url().$img_dir_cover.$check;
            }
          }
          else {
            $cover = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
          }
          $mr->cover = $cover;
        }
      }
      //initialize search result
      $this->data['search_product'] = [];
      $this->data['search_merchant'] = [];

      if($do_product_search['results'] != ""){
        $this->data['search_product'] = $do_product_search['results'];
      }

      if($do_merchant_search['results'] != ""){
        $this->data['search_merchant'] = $do_merchant_search['results'];
      }
      $this->data['keyword'] = $keyword;
      $this->data['title_page'] = "Hasil pencarian dengan keyword '". $keyword." '";
      parent::display('front/page/search_result',true);
    }
  }
