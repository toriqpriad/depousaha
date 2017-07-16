<?php

include 'Front.php';

class category extends front {

  function __construct() {
    parent::__construct();
    $this->load->library(array('pagination'));
    $this->data['active_page'] = "category";
  }

  public function all_category(){
    $kat = new stdClass();
    $kat->dest_table_as = 'product_category as pc';
    $kat->select_values = array('pc.*');
    $get_kat = $this->data_model->get($kat);
    $results = [];

    if ($get_kat["results"]) {
      foreach($get_kat["results"] as $kat){
        $where = "";
        $where = array("where_column" => 'p.product_category_id', "where_value" => $kat->id);
        $count_produk = $this->data_model->get_count('product as p',array($where));
        $category_info[] = array("category_name"=> $kat->name, "category_link" => base_url().'category/'.$kat->link, 'category_product_count' => $count_produk['results']);
      }
      $results = $category_info;
    }
    $this->data['title_page'] = 'Semua Kategori';
    $this->data['active_page'] = "all_category";
    $this->data['category_info'] = $results;
    $this->data['description'] = "Semua Kategori";
    parent::display('front/page/all_category',true);

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
      $where1 = array("where_column" => 'p.product_category_id', "where_value" => $id_kat);
      $join1 = array("join_with" => 'merchant as m', "join_on" => 'p.merchant_id = m.id', "join_type" => '');
      $where2 = array("where_column" => 'm.status', "where_value" => 'A');
      $sort = array("order_column" => 'id', "order_type" => 'desc');
      $produk->order_by = array($sort);
      $produk->where_tables = array($where1,$where2);
      $produk->join_tables = array($join1);
      if($this->uri->segment(3)){
        $start  = $this->uri->segment(3);
      } else {
        $start = '0';
      }
      $produk->pagination = ['offset'=>'12','start'=>$start];
      //count
      $count_produk = $this->data_model->get_count('product as p',array($where1));

      if($count_produk['response'] == FAIL_STATUS){
        $total_produk = '0';
      } else {
        $total_produk = $count_produk['results'];
      }

      //
      $get_produk = $this->data_model->get($produk);
      foreach($get_produk['results'] as $each){
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

        $category_info = array("category_name"=> $get_kat['results'][0]->name, 'category_product_count' => $total_produk, 'category_product' => $get_produk['results']);
        $this->data['category_data'] = $category_info;
        $this->data['pagination'] = make_pagination(base_url().'category/'.$get_kat['results'][0]->link,$total_produk,'12','3');
        $this->data['description'] = "Semua produk dengan kategori ". $get_kat['results'][0]->name;
        $this->display('front/page/category',true);

      } else {
        redirect('not_found');
      }

    }
  }
