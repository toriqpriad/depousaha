<?php

class front extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('data_model');
    $this->load->library(array('pagination','user_agent'));
    $this->load->helper(array('url', 'jwt_helper', 'image_process_helper','pagination_helper'));
    $this->data = [];
    $this->get_access_user();

  }

  public function get_access_user(){
    $ip = $this->input->ip_address();
    $params_check = new stdClass();
    $params_check->dest_table_as = 'access_log';
    $params_check->select_values = array('*');
    $sort = array("order_column" => 'date', "order_type" => 'desc');
    $params_check->order_by = array($sort);
    $where_data = array("where_column" => 'ip_address', "where_value" => $ip);
    $params_check->where_tables = array($where_data);
    $check = $this->data_model->get($params_check);
    if (!empty($check['results'][0])) {
      $date = date('d-m-Y');
      if($date != $check['results'][0]->date){
        $params_data = array(
          "ip_address" => $this->input->ip_address(),
          "platform" => $this->agent->platform,
          "browser" => $this->agent->browser,
          "date" => date('d-m-Y')
        );
        $dest_table = 'access_log';
        $add = $this->data_model->add($params_data, $dest_table);
      }
    } else {
      $params_data = array(
        "ip_address" => $this->input->ip_address(),
        "platform" => $this->agent->platform,
        "browser" => $this->agent->browser,
        "date" => date('d-m-Y')
      );
      $dest_table = 'access_log';
      $add = $this->data_model->add($params_data, $dest_table);
    }

    $count = $this->data_model->get_count('access_log')['results'];
    return $count;
  }

  public function display($location,$search_bar = NULL) {
    $this->data ['menu'] = $this->menu();
    $this->data['menu_category'] = $this->get_category_search_opt();
    $this->data ['footer'] = $this->footer();
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
    $this->data['title_page'] = "Beranda";
    $this->data['slider_data'] = $this->get_slider();
    $this->data['category_data'] = $this->get_category_product();
    $this->data['merchant_promo_data'] = $this->get_merchant_promo();
    $this->data['merchant_data'] = $this->get_merchant();
    $this->data['testimoni_data'] = $this->get_testimoni();
    $this->data['product_count'] = $this->data_model->get_count('product')['results'];
    $this->data['merchant_count'] = $this->data_model->get_count('merchant')['results'];
    $this->display ('front/page/index');
  }

  public function get_category_search_opt(){
    $dest_table_as = 'product_category';
    $select_values = array('id','name','link');
    $params = new stdClass();
    $params->dest_table_as = $dest_table_as;
    $params->select_values = $select_values;
    $get = $this->data_model->get($params);
    if ($get['response'] == OK_STATUS) {
      $new_menu = new stdClass();
      $new_menu->id = NULL;
      $new_menu->name = 'Lainnya';
      $new_menu->link = '';
      array_push($get['results'],$new_menu);
      foreach($get['results'] as $each){
        $each->value = $each->link;
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
        $dest = 'product as p';
        $select = array('p.*');
        $where = array("where_column" => 'p.product_category_id', "where_value" => $res->id);
        $join1 = array("join_with" => 'merchant as m', "join_on" => 'p.merchant_id = m.id', "join_type" => '');
        $where2 = array("where_column" => 'm.status', "where_value" => 'A');
        $sort = array("order_column" => 'id', "order_type" => 'desc');
        $product = new stdClass();
        $product->dest_table_as = $dest;
        $product->select_values = $select;
        $product->limit = '4';
        $product->join_tables = array($join1);
        $product->where_tables = array($where,$where2);
        $product->order_by = array($sort);
        $get_product = $this->data_model->get($product);
        $res->products =$get_product['results'];
        if($get_product['results'] != ""){
          foreach($get_product['results'] as $each){
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
            $noimg_dir = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
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
      $where = array('where_column' => 'status', 'where_value' => 'A');
      $params = new stdClass();
      $params->dest_table_as = $dest_table_as;
      $params->select_values = $select_values;
      $params->where_tables = array($where);
      $params->limit = '6';
      $get = $this->data_model->get($params);
      if ($get['response'] == OK_STATUS) {
        if($get['results'] != ""){
          foreach($get['results'] as $each){
            $each->link = base_url().'merchant/detail/'.$each->link;
            $img_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'merchant/'.$each->id.'/logo/';
            $noimg_dir = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
            if($each->logo != ""){
              $check = check_if_empty($each->logo, $img_dir.$each->logo);
              if($check == NO_IMG_NAME){
                $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
              } else {
                $img = base_url().$img_dir.$check;
              }
            }
            else {
              $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
            }
            $each->logo = $img;

            // cover

            $img_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'merchant/'.$each->id.'/cover/';
            $noimg_dir = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
            if($each->cover != ""){
              $check = check_if_empty($each->cover, $img_dir.$each->cover);
              if($check == NO_IMG_NAME){
                $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
              } else {
                $img = base_url().$img_dir.$check;
              }
            }
            else {
              $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
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
            $noimg_dir = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
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
            $noimg_dir = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
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
        "sub" => $this->get_category_search_opt(),
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
        "link" => site_url () . 'gallery',
        "page_name" => "gallery",
        "icon" => "fa fa-cube 1x"
      );

      $tentang_kami = array (
        "type" => "menu",
        "label" => "Tentang Kami",
        "link" => site_url () . 'about_us',
        "page_name" => "info",
        "icon" => "fa fa-cube 1x"
      );


      $array = [$home,$kategori,$merchant,$galeri,$tentang_kami];

      return $array;
    }

    public function footer(){
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
        $array = array("info" => $get['results'][0],"social_media" => $site_scm, "visitor" => $this->get_access_user());
      } else {
        $array = [];
      }


      return $array;
    }
  }
