<?php

class front extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('data_model');
    $this->load->library(array('pagination'));
    $this->load->helper(array('url', 'jwt_helper', 'image_process_helper','pagination_helper'));
    $this->data = [];
  }

  public function display($location,$search_bar = NULL) {
    $this->data ['menu'] = $this->menu();
    $this->data['menu_category'] = $this->get_category_menu();
    $this->data ['footer'] = $this->menu();
    $this->load->view('front/include/head', $this->data);
    $this->load->view('front/include/top_menu');
    if($search_bar){
      $this->load->view('front/include/search_bar');
    }
    $this->load->view($location);
    $this->load->view('front/include/footer_menu');
  }

  public function home() {
    $this->data['active_page'] = "home";
    $this->data['title_page'] = "Home";
    $this->data['slider_data'] = $this->get_slider();
    $this->data['category_data'] = $this->get_category_product();
    $this->data['merchant_promo_data'] = $this->get_merchant_promo();
    $this->data['merchant_data'] = $this->get_merchant();
    $this->data['testimoni_data'] = $this->get_testimoni();
    $this->data['product_count'] = $this->data_model->get_count('product')['results'];
    $this->data['merchant_count'] = $this->data_model->get_count('merchant')['results'];
    $this->display ('front/page/index');
  }

    public function get_category_menu(){
      $dest_table_as = 'product_category';
      $select_values = array('id','name','link');
      $params = new stdClass();
      $params->dest_table_as = $dest_table_as;
      $params->select_values = $select_values;
      $params->limit = '10';
      $get = $this->data_model->get($params);
      if ($get['response'] == OK_STATUS) {
        $new_menu = new stdClass();
        $new_menu->name = 'Lainnya';
        $new_menu->link = '';
        array_push($get['results'],$new_menu);
        foreach($get['results'] as $each){
          $each->link = base_url().'category/'.$each->link;
        }
        $results = $get['results'];
      } else {
        $results = [];
      }
      return $results;
    }

    public function get_category_product(){
      $dest_table_as = 'product_category';
      $select_values = array('id','name');
      $params = new stdClass();
      $params->dest_table_as = $dest_table_as;
      $params->select_values = $select_values;
      $params->limit = '4';
      $get = $this->data_model->get($params);
      if ($get['response'] == OK_STATUS) {
        foreach($get['results'] as $res){
          $dest = 'product';
          $select = array('id','name','link','description','price','merchant_id','product_category_id','dimension');
          $where = array("where_column" => 'product_category_id', "where_value" => $res->id);
          $sort = array("order_column" => 'id', "order_type" => 'desc');
          $product = new stdClass();
          $product->dest_table_as = $dest;
          $product->select_values = $select;
          $product->limit = '4';
          $product->where_tables = array($where);
          $product->order_by = array($sort);
          $get_product = $this->data_model->get($product);
          $res->products =$get_product['results'];
          if($get_product['results'] != ""){
            foreach($get_product['results'] as $each){
              $each->link = base_url().'produk/detail/'.$each->link;
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
            }
            $category_info[] = array("category_name"=> $res->name, "category_link" => '', 'category_product' => $res->products);
          }
        } else {
          $category_info = [];
        }

        return $category_info;
      }

      public function notfound() {
        $this->data['title_page'] = "Tidak ditemukan";
        $this->load->view('front/404', $this->data);
      }

      public function get_merchant_promo(){
        $dest_table_as = 'merchant_promo';
        $select_values = array('*');
        $where = array('where_column' => 'active', 'where_value' => 'Y');
        $params = new stdClass();
        $params->dest_table_as = $dest_table_as;
        $params->select_values = $select_values;
        $params->where_tables = array($where);
        $get = $this->data_model->get($params);
        if ($get['response'] == OK_STATUS) {
          if($get['results'] != ""){
            foreach($get['results'] as $each){
              $img_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'merchant/'.$each->merchant_id.'/promo/'.$each->id.'/';
              $noimg_dir = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
              if($each->image != ""){
                $check = check_if_empty($each->image, $img_dir.$each->image);
                if($check == NO_IMG_NAME){
                  $img = $noimg_dir;
                } else {
                  $img = base_url().$img_dir.$check;
                }
              }
              else {
                $img = $noimg_dir;
              }
              $each->image = $img;


            }
            $results = $get['results'];
          } else {
            $results = [];
          }
        } else {
          $results = [];
        }
        return $results;
      }

      public function get_merchant(){
        $dest_table_as = 'merchant';
        $select_values = array('*');
        $params = new stdClass();
        $params->dest_table_as = $dest_table_as;
        $params->select_values = $select_values;
        $params->limit = '6';
        $get = $this->data_model->get($params);
        if ($get['response'] == OK_STATUS) {
          if($get['results'] != ""){
            foreach($get['results'] as $each){
              $each->link = base_url().'merchant/detail/'.$each->link;
              $img_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'merchant/'.$each->id.'/logo/';
              $noimg_dir = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
              if($each->logo != ""){
                $check = check_if_empty($each->logo, $img_dir.$each->logo);
                if($check == NO_IMG_NAME){
                  $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
                } else {
                  $img = base_url().$img_dir.$check;
                }
              }
              else {
                $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
              }
              $each->logo = $img;

              // cover

              $img_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'merchant/'.$each->id.'/cover/';
              $noimg_dir = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
              if($each->cover != ""){
                $check = check_if_empty($each->cover, $img_dir.$each->cover);
                if($check == NO_IMG_NAME){
                  $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
                } else {
                  $img = base_url().$img_dir.$check;
                }
              }
              else {
                $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
              }
              $each->cover = $img;
            }
            $results = $get['results'];
          } else {
            $results = [];
          }
          return $results;
        }
      }

      public function get_slider(){
        $dest_table_as = 'slider';
        $select_values = array('*');
        $params = new stdClass();
        $params->dest_table_as = $dest_table_as;
        $params->select_values = $select_values;
        $get = $this->data_model->get($params);
        if ($get['response'] == OK_STATUS) {
          if($get['results'] != ""){
            foreach($get['results'] as $each){
              $img_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'slider/'.$each->id.'/';
              $noimg_dir = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
              if($each->image != ""){
                $check = check_if_empty($each->image, $img_dir.$each->image);
                if($check == NO_IMG_NAME){
                  $img = $noimg_dir;
                } else {
                  $img = base_url().$img_dir.$check;
                }
              }
              else {
                $img = $noimg_dir;
              }
              $each->image = $img;
            }
            $results = $get['results'];
          } else {
            $results = [];
          }
        } else {
          $results = [];
        }
        return $results;
      }

      public function get_testimoni(){
        $dest_table_as = 'testimoni';
        $select_values = array('*');
        $params = new stdClass();
        $params->dest_table_as = $dest_table_as;
        $params->select_values = $select_values;
        $get = $this->data_model->get($params);
        if ($get['response'] == OK_STATUS) {
          if($get['results'] != ""){
            foreach($get['results'] as $each){
              $img_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'testimoni'.$each->id.'/';
              $noimg_dir = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
              if($each->image != ""){
                $check = check_if_empty($each->image, $img_dir.$each->image);
                if($check == NO_IMG_NAME){
                  $img = $noimg_dir;
                } else {
                  $img = base_url().$img_dir.$check;
                }
              }
              else {
                $img = $noimg_dir;
              }
              $each->image = $img;
            }
            $results = $get['results'];
          } else {
            $results = [];
          }
        } else {
          $results = [];
        }
        return $results;
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

      public function menu() {
        $home = array (
          "type" => "menu",
          "label" => "Beranda",
          "link" => site_url () . 'home',
          "page_name" => "home",
          "icon" => "ti-panel"
        );
        $kategori = array (
          "type" => "menu",
          "label" => "Kategori",
          "link" => site_url () . 'category',
          "sub" => $this->get_category_menu(),
          "page_name" => "setting",
          "icon" => "ti-settings"
        );

        $merchant = array (
          "type" => "menu",
          "label" => "Merchant",
          "link" => site_url () . 'merchant',
          "page_name" => "merchant",
          "icon" => "fa fa-users 1x"
        );

        $galeri = array (
          "type" => "menu",
          "label" => "Galeri",
          "link" => site_url () . 'galeri',
          "page_name" => "product_category",
          "icon" => "fa fa-cube 1x"
        );

        $tentang_kami = array (
          "type" => "menu",
          "label" => "Tentang Kami",
          "link" => site_url () . 'tentang_kami',
          "page_name" => "product_category",
          "icon" => "fa fa-cube 1x"
        );

        $kontak = array (
          "type" => "menu",
          "label" => "Kontak",
          "link" => site_url () . 'kontak',
          "page_name" => "product_category",
          "icon" => "fa fa-cube 1x"
        );

        $array = [$home,$kategori,$merchant,$galeri,$tentang_kami,$kontak];

        return $array;
      }

    }
