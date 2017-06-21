<?php

include 'Front.php';

class merchant extends front {

  function __construct() {
    parent::__construct();
    $this->load->library(array('pagination'));
    $this->data['active_page'] = "merchant";
  }

  public function all_merchant(){
    $m = new stdClass();
    $m->dest_table_as = 'merchant as m';
    $m->select_values = array('m.*');
    $get_m = $this->data_model->get($m);
    $results = [];

    if ($get_m["results"]) {
      foreach($get_m["results"] as $mr){
        $where = "";
        $where = array("where_column" => 'p.merchant_id', "where_value" => $mr->id);
        $product_total = $this->data_model->get_count('product as p',array($where));
        if($product_total['response'] == FAIL_STATUS){
          $mr->product_total = 0;
        } else {
          $mr->product_total = $product_total['results'];
        }
        $mr->link = base_url().'merchant/'.$mr->link;
        $img_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'merchant/'.$mr->id.'/logo/';
        $noimg_dir = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
        if($mr->logo != ""){
            $check = check_if_empty($mr->logo, $img_dir.$mr->logo);
            if($check == NO_IMG_NAME){
              $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
            } else {
              $img = base_url().$img_dir.$check;
            }
          }
          else {
            $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
          }
          $mr->logo = $img;
      }
      $results = $get_m["results"];
    } else {
      $results = [];
    }
    $this->data['merchant_data'] = $results;
    $this->data['title_page'] = 'Semua Merchant';
    $this->data['active_page'] = "all_merchant";
    parent::display('front/page/all_merchant',true);

  }

  public function category(){
    $parameter = $this->uri->segment(2);
    $kat = new stdClass();
    $kat->dest_table_as = 'product_category as pc';
    $kat->select_values = array('pc.*');
    $kat->where_tables = array(array("where_column" => 'pc.link', "where_value" => $parameter));
    $get_kat = $this->data_model->get($kat);
    if ($get_kat["results"][0] != "") {
      $this->data['title_page'] = $get_kat['results'][0]->name;
      $this->data['active_page'] = "category";
      // GET PRODUCT
      $id_kat = $get_kat['results'][0]->id;
      $produk = new stdClass();
      $produk->dest_table_as = 'product as p';
      $produk->select_values = array('p.*');
      $where = array("where_column" => 'p.product_category_id', "where_value" => $id_kat);
      $sort = array("order_column" => 'id', "order_type" => 'desc');
      $produk->order_by = array($sort);
      $produk->where_tables = array($where);
      if($this->uri->segment(3)){
        $start  = $this->uri->segment(3);
      } else {
        $start = '0';
      }
      $produk->pagination = ['offset'=>'12','start'=>$start];
      //count
      $count_produk = $this->data_model->get_count('product as p',$produk->where_tables);
      $total_produk = $count_produk['results'];
      //
      $get_produk = $this->data_model->get($produk);
      foreach($get_produk['results'] as $each){
        $each->link = base_url().'product/'.$each->link;
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
        $noimg_dir = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
        if(isset($get_img['results'][0]->name)){
          if($get_img['results'][0]->name != ""){
            $check = check_if_empty($get_img['results'][0]->name, $product_dir.$get_img['results'][0]->name);
            if($check == NO_IMG_NAME){
              $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
            } else {
              $img = base_url().$product_dir.$check;
            }
          } else {
            $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
          } }else {
            $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
          }
          $each->img = $img;
        }

        $category_info = array("category_name"=> $get_kat['results'][0]->name, 'category_product_count' => $total_produk, 'category_product' => $get_produk['results']);
        $this->data['category_data'] = $category_info;
        $this->data['pagination'] = make_pagination(base_url().'category/'.$get_kat['results'][0]->link,$total_produk,'12','3');
        $this->display('front/page/category',true);
      } else {
        redirect('/admin/404');
      }

    }
    }
