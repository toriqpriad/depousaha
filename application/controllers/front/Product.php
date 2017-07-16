<?php

include 'Front.php';

class product extends front {

  function __construct() {
    parent::__construct();
    $this->load->library(array('pagination'));
    $this->data['active_page'] = "product";
  }

  public function all_product (){
    if($this->uri->segment(2)){
      $start  = $this->uri->segment(2);
    } else {
      $start = '0';
    }
    $p = new stdClass();
    $p->dest_table_as = 'product as p';
    $p->select_values = array('p.*');
    $p->pagination = ['offset'=>'12','start'=>$start];
    $join = array("join_with" => 'merchant as m', "join_on" => 'p.merchant_id = m.id', "join_type" => '');
    $where = array("where_column" => 'm.status', "where_value" => 'A');
    $sort = array("order_column" => 'id', "order_type" => 'desc');
    $p->order_by = array($sort);
    $p->where_tables = array($where);
    $p->join_tables = array($join);
    $get_p = $this->data_model->get($p);
    $results = [];
    $count_produk = $this->data_model->get_count('product as p');
    $total_produk = $count_produk['results'];
    if ($get_p["results"] != "") {
      foreach($get_p['results'] as $each){
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
        $results = $get_p["results"];
        $this->data['product_data'] = $results;
        $this->data['total_product'] = $this->data_model->get_count('product')['results'];
        $this->data['pagination'] = make_pagination(base_url().'product/',$total_produk,'12','2');
        $this->data['title_page'] = 'Semua Product';
        $this->data['active_page'] = "all_product";
        $this->data['description'] = "Semua Produk";
        parent::display('front/page/all_product',true);
      }
    }

    public function detail(){
      $link  = $this->uri->segment(3);
      $p = new stdClass();
      $p->dest_table_as = 'product as p';
      $p->select_values = array('*');
      $p->where_tables = array(array("where_column" => 'p.link', "where_value" => $link));
      $get_p = $this->data_model->get($p);
      if(!empty($get_p["results"])){
        $pi = new stdClass();
        $pi->dest_table_as = 'product_images';
        $pi->select_values = array('*');
        $pi->where_tables = array(array("where_column" => 'id_product', "where_value" => $get_p["results"][0]->id));
        $get_pi = $this->data_model->get($pi);
        if($get_pi["results"] != ""){
          foreach($get_pi["results"] as $each){
            $product_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'merchant/'.$get_p["results"][0]->merchant_id.'/product/'.$get_p["results"][0]->id.'/';
            $noimg_dir = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
            if($each != ""){
              $check = check_if_empty($each->name, $product_dir.$each->name);
              if($check == NO_IMG_NAME){
                $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
              } else {
                $img = base_url().$product_dir.$check;
              }
            } else {
              $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
            }
            $array[] = array("url"=> $img,"sort" => $each->sort,"real" => $product_dir.$each->name);
          }
          if(!isset($array)){
            $array = [];
          }
          $result = array("info" => $get_p["results"][0],"images" => $array);
        } else {
          $result = [];
        }
        ///GET PRODUCT CATEGORY
        $c = new stdClass();
        $c->dest_table_as = 'product_category';
        $c->select_values = array('name','link');
        $c->where_tables = array(array("where_column" => 'id', "where_value" => $get_p['results'][0]->product_category_id));
        $get_c = $this->data_model->get($c);

        $result['info']->category_name = $get_c['results'][0]->name;
        $result['info']->category_link = base_url().'category/'.$get_c['results'][0]->link;

        //GET MERCHATN DATA
        $m = new stdClass();
        $m->dest_table_as = 'merchant';
        $m->select_values = array('id','name','link','logo','cover','description');
        $m->where_tables = array(array("where_column" => 'id', "where_value" => $get_p['results'][0]->merchant_id));
        $get_m = $this->data_model->get($m);

        if ($get_m["results"]) {
          foreach($get_m["results"] as $mr){
            $where = "";
            $cover = "";
            $img = "";
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
          $merchant_data = $get_m["results"];
        } else {
          $merchant_data = [];
        }

        $result['info']->merchant = $get_m['results'][0];
        $this->data["record"]  = $result;
        $this->data["title_page"] = $get_p["results"][0]->name;
        $this->data["active_page"] = "detail_product";
        $this->data['page_desc'] = "Detail Produk ". $this->data["title_page"];
        $this->data['description'] = $get_p['results'][0]->name.$get_p['results'][0]->description;
        parent::display('front/page/detail_product',true);
      } else {
        redirect('not_found');
      }
    }
  }
