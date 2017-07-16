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
    $where = array('where_column' => 'm.status', 'where_value' => 'A');
    $m->dest_table_as = 'merchant as m';
    $m->select_values = array('m.*');
    $m->where_tables = array($where);
    if($this->uri->segment(2)){
      $start  = $this->uri->segment(2);
    } else {
      $start = '0';
    }
    $m->pagination = ['offset'=>'8','start'=>$start];
    $get_m = $this->data_model->get($m);
    $merchant_total = $this->data_model->get_count('merchant')['results'];
    $results = [];
    if ($get_m["results"]) {
      foreach($get_m["results"] as $mr){
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
      $results = $get_m["results"];
    } else {
      $results = [];
    }
    $this->data['merchant_data'] = $results;
    $this->data['title_page'] = 'Semua Merchant';
    $this->data['pagination'] = make_pagination(base_url().'merchant/',$merchant_total,'6' ,'4');
    $this->data['active_page'] = "all_merchant";
    $this->data['description'] = "Semua merchant ";
    parent::display('front/page/all_merchant',true);
  }

  public function detail(){
    $link = $this->uri->segment(3);
    $mc = new stdClass();
    $mc->dest_table_as = 'merchant';
    $mc->select_values = array('*');
    $mc->where_tables = array(array("where_column" => 'link', "where_value" => $link));
    $get_mc = $this->data_model->get($mc);
    if ($get_mc["results"][0] != "") {
      // GET PRODUCT
      $merchant_id = $get_mc['results'][0]->id;
      $mr = $get_mc["results"][0];
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

      $produk = new stdClass();
      $produk->dest_table_as = 'product as p';
      $produk->select_values = array('p.*');
      $where = array("where_column" => 'p.merchant_id', "where_value" => $merchant_id);
      $sort = array("order_column" => 'p.id', "order_type" => 'desc');
      $produk->order_by = array($sort);
      $produk->where_tables = array($where);
      if($this->uri->segment(4)){
        $start  = $this->uri->segment(4);
      } else {
        $start = '0';
      }
      $produk->pagination = ['offset'=>'12','start'=>$start];
      //count
      $count_produk = $this->data_model->get_count('product as p',$produk->where_tables);
      if($count_produk['response'] == FAIL_STATUS){
        $count_produk['results'] = 0;
      }
      $get_produk = $this->data_model->get($produk);
      if($get_produk['results'] != ""){
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
        } else {
          $get_produk['results'] = [];
        }
        //SOCIAL MEDIA
        $sc = new stdClass();
        $sc->dest_table_as = 'socmed as sc';
        $sc->select_values = array('sc.id as socmed_id','sc.name as socmed_name','sc.icon as socmed_icon');
        $get_sc = $this->data_model->get($sc);
        if($get_sc['results'] != ""){
          foreach($get_sc['results'] as $each){
            $scm = new stdClass();
            $scm->dest_table_as = 'merchant_socmed as mc';
            $scm->select_values = array('*');
            $where1 = array("where_column" => 'mc.merchant_id', "where_value" => $merchant_id);
            $where2 = array("where_column" => 'mc.socmed_id', "where_value" => $each->socmed_id);
            $scm->where_tables = array($where1,$where2);
            $get_scm = $this->data_model->get($scm);
            if(!empty($get_scm["results"])){
              $scm_id = $get_scm["results"][0]->id;
              $scm_url = $get_scm["results"][0]->url;
            } else {
              $scm_id = [];
              $scm_url = [];
            }
            $merchant_scm[] = array("sc_id" => $each->socmed_id,
            "sc_name"=> $each->socmed_name,
            "sc_icon"=> $each->socmed_icon,
            "sc_id"=> $scm_id,
            "sc_url" => $scm_url
          );
        }
      }
      //MEDIA SOSIAL
      $promo = new stdClass();
      $promo->dest_table_as = 'merchant_promo as mp';
      $promo->select_values = array('mp.*');
      $where1 = array("where_column" => 'mp.merchant_id', "where_value" => $merchant_id);
      $where2 = array("where_column" => 'mp.active', "where_value" => 'Y');
      $sort = array("order_column" => 'mp.id', "order_type" => 'desc');
      $promo->order_by = array($sort);
      $promo->where_tables = array($where1,$where2);
      $get_promo = $this->data_model->get($promo);

      foreach($get_promo['results'] as $each){
        $img_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'merchant/'.$merchant_id.'/promo/'.$each->id.'/';
        $noimg_dir = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
        $check = check_if_empty($each->image, $img_dir.$each->image);
        if($check == NO_IMG_NAME){
          $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
        } else {
          $img = base_url().$img_dir.$check;
        }
        $each->img = $img;
      }
      $this->data["merchant_promo"] = $get_promo['results'];
      $this->data["merchant_scm"] = $merchant_scm;
      $this->data['title_page'] = $get_mc['results'][0]->name;
      $this->data['merchant_info'] = $get_mc['results'][0];
      $this->data['merchant_product_total'] = $count_produk['results'];
      $this->data['merchant_product'] = $get_produk['results'];
      $this->data['pagination'] = make_pagination(base_url().'merchant/detail/'.$link.'/',$count_produk['results'],'12','4');
      $this->data['description'] = "Informasi terkait merchant  ". $get_mc['results'][0]->name;
      $this->display('front/page/detail_merchant',true);
    } else {
      redirect('not_found');
    }

  }

  public function register(){
    $this->load->helper('captcha_helper');
    $vals = array(
      'img_path'      => BACKEND_IMAGE_UPLOAD_FOLDER.'captcha/',
      'img_url'       => base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'captcha/',
      'font_path'     => FCPATH.'engine/312/fonts/texb.ttf',
      'img_width'     => '200',
      'img_height'    => 100,
      'expiration'    => 7200,
      'word_length'   => 5,
      'font_size'     => 22,
      'pool'          => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',

      // White background and border, black text and red grid
      'colors'        => array(
        'background' => array(255, 255, 255),
        'border' => array(255, 255, 255),
        'text' => array(0, 0, 0),
        'grid' => array(255, 40, 40)
      )
      );
      $cap = create_captcha($vals);

      $this->data['captcha'] = $cap['image'];
      $this->data['captcha_word'] = $cap['word'];
      $this->data['title_page'] = 'Pendaftaran Merchant';
      $this->data['description'] = 'Pendaftaran Merchant';
      // print_r($cap);exit();
      $this->display('front/page/register_merchant');
      $this->load->view('front/static/ajax');
      $this->load->view('front/include/function');
    }

    public function register_submit(){
      $this->load->helper(array('rest_response_helper',));
      $name = $this->input->post('name');
      $owner = $this->input->post('owner');
      $contact = $this->input->post('contact');
      $email = $this->input->post('email');
      $captcha = $this->input->post('captcha');
      $captcha_word = $this->input->post('captcha_word');
      $link = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $name));
      if($name == ""){
        $params = new stdClass();
        $params->response = FAIL_STATUS;
        $params->message = "Post tidak sesuai";
        $result = response_custom($params);
        echo json_encode($result);
        exit();
      }
      if($captcha_word == $captcha){
        $params_data = array(
          "name" => $name,
          "owner" => $owner,
          "link" => $link,
          "email" => $email,
          "contact" => $contact,
          "status" => 'N',
          "update_at" => date('d-m-Y')
        );
        $dest_table = 'merchant';
        $add = $this->data_model->add($params_data, $dest_table);
        if($add){

          $merchant_id = $add["data"];
          $merchant_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'merchant/'.$merchant_id;
          $create_dir = mkdir($merchant_dir);
          $create_logo_dir = mkdir($merchant_dir . "/logo");
          $create_cover_dir = mkdir($merchant_dir. "/cover");
          $create_product_dir = mkdir($merchant_dir. "/product");
          $create_promo_dir = mkdir($merchant_dir. "/promo");

          $admin = new stdClass();
          $admin->dest_table_as = 'setting';
          $admin->select_values = array('site_email as email');
          $where1 = array("where_column" => 'id', "where_value" => '0');
          $get_admin_email = $this->data_model->get($admin);
          $admin_email = $get_admin_email['results'][0]->email;
          //SEND EMAIL TO ADMIN
          $this->load->library('email');
          $this->email->from($admin_email, '');
          $this->email->to($admin_email);
          $this->email->subject('Pendaftaran Merchant di Depousaha.com');
          $this->email->message('Merchant baru telah mendaftar atas nama '. $name .' . Harap segera di proses');
          $this->email->send();

          //SEND EMAIL TO NEW MERCHANT
          $this->email->from($admin_email, '');
          $this->email->to($email);
          $this->email->subject('Pendaftaran Merchant di Depousaha.com');
          $this->email->message('Terima kasih telah mendaftar. Informasi pendaftaran telah dikirimkan . Kami akan segera menghubungi anda, Terima kasih.');
          $this->email->send();

          $params = new stdClass();
          $params->response = OK_STATUS;
          $params->message = "Pendaftaran berhasil";
          $params->data = array("link" => base_url() . 'merchant/register');
          $result = response_custom($params);
          echo json_encode($result);
        }
      }  else {
        $params = new stdClass();
        $params->response = FAIL_STATUS;
        $params->message = "Karakter captcha tidak sesuai";
        $params->data = "";
        $result = response_custom($params);
        echo json_encode($result);
        exit();
      }

    }
  }
