<?php

include 'Front.php';

class gallery extends front {

  function __construct() {
    parent::__construct();
    $this->load->library(array('pagination'));
    $this->data['active_page'] = "gallery";
    $this->data['description'] = "Semua galeri";
  }

  public function all_gallery (){
    if($this->uri->segment(2)){
      $start  = $this->uri->segment(2);
    } else {
      $start = '0';
    }
    $g = new stdClass();
    $g->dest_table_as = 'gallery as p';
    $g->select_values = array('p.*');
    $g->pagination = ['offset'=>'10','start'=>$start];
    $sort = array("order_column" => 'id', "order_type" => 'desc');
    $g->order_by = array($sort);
    $get_g = $this->data_model->get($g);
    $results = [];
    $count = $this->data_model->get_count('gallery as g');
    $total = $count['results'];
    if ($get_g["results"]) {
      foreach($get_g['results'] as $each){
        // $each->link = base_url().'gallery/detail/'.$each->link;
        $gallery_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'gallery/'.$each->id.'/';
        $dest = 'gallery_images';
        $select = array('*');
        $where1 = array("where_column" => 'gallery_id', "where_value" => $each->id);
        $img = new stdClass();
        $img->dest_table_as = $dest;
        $img->select_values = $select;
        $img->where_tables = array($where1);
        $get_img = $this->data_model->get($img);
        $noimg_dir = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
        // print_r($get_img);exit();
        $each->img = [];
        if($get_img["results"] != ""){
          foreach($get_img["results"] as $data){
            $gallery_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'gallery/'.$each->id.'/';
            $noimg_dir = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
            if($each != ""){
              $check = check_if_empty($data->name, $gallery_dir.$data->name);
              if($check == NO_IMG_NAME){
                $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
              } else {
                $img = base_url().$gallery_dir.$check;
              }
            } else {
              $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
            }
            array_push($each->img,$img);
          }
        }
      }
      $results = $get_g['results'];
    }
    $this->data['gallery_data'] = $results;
    $this->data['total_gallery'] = $this->data_model->get_count('gallery')['results'];
    $this->data['pagination'] = make_pagination(base_url().'gallery/',$count['results'],'12','2');
    $this->data['title_page'] = 'Semua gallery';
    $this->data['active_page'] = "all_gallery";
    // print_r($this->data);exit();
    parent::display('front/page/all_gallery',true);


  }

  public function detail(){
    $link  = $this->uri->segment(3);
    $p = new stdClass();
    $p->dest_table_as = 'gallery as p';
    $p->select_values = array('*');
    $p->where_tables = array(array("where_column" => 'p.link', "where_value" => $link));
    $get_p = $this->data_model->get($p);
    if($get_p["results"] != ""){
      $pi = new stdClass();
      $pi->dest_table_as = 'gallery_images';
      $pi->select_values = array('*');
      $pi->where_tables = array(array("where_column" => 'id_gallery', "where_value" => $get_p["results"][0]->id));
      $get_pi = $this->data_model->get($pi);
      if($get_pi["results"] != ""){
        foreach($get_pi["results"] as $each){
          $gallery_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'merchant/'.$get_p["results"][0]->merchant_id.'/gallery/'.$get_p["results"][0]->id.'/';
          $noimg_dir = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
          if($each != ""){
            $check = check_if_empty($each->name, $gallery_dir.$each->name);
            if($check == NO_IMG_NAME){
              $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
            } else {
              $img = base_url().$gallery_dir.$check;
            }
          } else {
            $img = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
          }
          $array[] = array("url"=> $img,"sort" => $each->sort,"real" => $gallery_dir.$each->name);
        }
        if(!isset($array)){
          $array = [];
        }
        $result = array("info" => $get_p["results"][0],"images" => $array);
      } else {
        $result = [];
      }
      ///GET gallery CATEGORY
      $c = new stdClass();
      $c->dest_table_as = 'gallery_category';
      $c->select_values = array('name','link');
      $c->where_tables = array(array("where_column" => 'id', "where_value" => $get_p['results'][0]->gallery_category_id));
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
      $this->data["active_page"] = "detail_gallery";

      // print_r($this->data["record"]);exit();
      parent::display('front/page/detail_gallery',true);
    }
  }
}
