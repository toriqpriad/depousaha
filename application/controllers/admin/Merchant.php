<?php

include 'Admin.php';

class merchant extends admin {

  function __construct() {
    parent::__construct();
    parent::checkauth();
    $this->data['active_page'] = "merchant";
  }
  public function json(){
    $dest_table_as = 'merchant as m';
    $select_values = array('m.*');
    $params = new stdClass();
    $params->dest_table_as = $dest_table_as;
    $params->select_values = $select_values;
    $get = $this->data_model->get($params);
    echo json_encode(array("data" => $get['results']));
  }
  //Data on Page
  public function index() {
    $this->data['title_page'] = "Data Merchant";
    parent::display('admin/merchant/index','admin/merchant/function',TRUE);
  }


  public function add() {
    $this->data['title_page'] = "Tambah Merchant";
    parent::display('admin/merchant/add','admin/merchant/function',FALSE);
  }

  public function post(){
    $name = $this->input->post("name");
    $owner = $this->input->post("owner");
    $email = $this->input->post("email");
    $contact = $this->input->post("contact");
    $address = $this->input->post("address");
    $link = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $name));

    $params_check = new stdClass();
    $params_check->dest_table_as = 'merchant as m';
    $params_check->select_values = array('m.link', 'm.id');
    $where_data = array("where_column" => 'm.link', "where_value" => $link);
    $params_check->where_tables = array($where_data);
    $check = $this->data_model->get($params_check);
    if (!empty($check['results'])) {
      $params = new stdClass();
      $params->response = FAIL_STATUS;
      $params->message = "Nama sudah digunakan !";
      $params->data = "";
      $result = response_custom($params);
      echo json_encode($result);
      exit();
    }

    $params_data = array(
      "name" => $name,
      "owner" => $owner,
      "link" => $link,
      "email" => $email,
      "contact" => $contact,
      "address" => $address,
      "status" => 'A',
      "update_at" => date('d-m-Y h:m')
    );
    $dest_table = 'merchant';
    $add = $this->data_model->add($params_data, $dest_table);
    $merchant_id = $add["data"];
    $merchant_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'merchant/'.$merchant_id;
    $create_dir = mkdir($merchant_dir);
    $create_logo_dir = mkdir($merchant_dir . "/logo");
    $create_cover_dir = mkdir($merchant_dir. "/cover");
    $create_product_dir = mkdir($merchant_dir. "/product");
    $create_promo_dir = mkdir($merchant_dir. "/promo");

    if (isset($_FILES["logo"])) {
      if ($_FILES["logo"] != "") {
        $upload_logo = image_upload(array($_FILES["logo"]), $merchant_dir . "/logo/");
        $image_logo_name = $upload_logo->data[0];
      } else {
        $image_logo_name = "";
      }
    } else {
      $image_logo_name = "";
    }
    if (isset($_FILES["cover"])) {
      if ($_FILES["cover"] != "") {
        $upload_cover = image_upload(array($_FILES["cover"]), $merchant_dir. "/cover/");
        $image_cover_name = $upload_cover->data[0];
      } else {
        $image_cover_name = "";
      }
    } else {
      $image_cover_name = "";
    }

    $params_update = new stdClass();
    $params_update->new_data = array("logo" => $image_logo_name, "cover" => $image_cover_name);
    $params_update->table_update = 'merchant';
    $where = array("where_column" => 'id', "where_value" => $merchant_id);
    $params_update->where_tables = array($where);
    $update_logo_cover = $this->data_model->update($params_update);
    if ($add['response'] == OK_STATUS) {
      $data = array("link" => base_url() . 'admin/merchant/' . $link);
      $result = get_success($data);
    } else {
      $result = response_fail();
    }
    echo json_encode($result);
  }

  public function detail(){
    $parameter = $this->uri->segment(3);
    $params = new stdClass();
    $params->dest_table_as = 'merchant as m';
    $params->select_values = array('m.*');
    $params->where_tables = array(array("where_column" => 'm.link', "where_value" => $parameter));
    $get = $this->data_model->get($params);
    //CHECK DOMNameList
    if ($get["results"][0] != "") {
      //GET MAIN PROFILE
      $this->data['title_page'] = "Detail Merchant";
      $logo = $get['results'][0]->logo;
      $cover = $get['results'][0]->cover;
      $merchant_id = $get["results"][0]->id;
      $get["results"][0]->logo_old = $get['results'][0]->logo;
      $dir = BACKEND_IMAGE_UPLOAD_FOLDER . 'merchant/' . $get['results'][0]->id.'/';
      $image_dir_logo =  $dir.'logo/'. $logo;
      $check_thumb = check_if_empty($logo, $image_dir_logo);
      if($check_thumb == NO_IMG_NAME){
        $get["results"][0]->logo = BASE_URL.BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
      } else {
        $get["results"][0]->logo = BASE_URL . $dir.'logo/'.$check_thumb;
      }
      $get["results"][0]->cover_old = $get['results'][0]->cover;
      $image_dir_cover = $dir.'cover/' . $cover;
      $check_thumb = check_if_empty($cover, $image_dir_cover);
      if($check_thumb == NO_IMG_NAME){
        $get["results"][0]->cover = BASE_URL.BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
      } else {
        $get["results"][0]->cover = BASE_URL. $dir.'cover/' . $check_thumb;
      }
      $this->data['records'] = $get['results'][0];
      // GET SOCIAL MEDIA ACCOUNT
      $sc = new stdClass();
      $sc->dest_table_as = 'socmed as sc';
      $sc->select_values = array('sc.id as socmed_id','sc.name as socmed_name');
      $get_sc = $this->data_model->get($sc);
      if($get_sc['results'] != ""){
        foreach($get_sc['results'] as $each){
          $scm = new stdClass();
          $scm->dest_table_as = 'merchant_socmed as mc';
          $scm->select_values = array('*');
          $where1 = array("where_column" => 'mc.merchant_id', "where_value" => $merchant_id);
          $where2 = array("where_column" => 'mc.socmed_id', "where_value" => $each->socmed_id);
          $scm->where_tables = array($where1,$where2);
          $get_mc = $this->data_model->get($scm);
          if(empty($get_mc["results"][0])){
            $scm_id = "";
            $scm_url = "";
          } else {
            $scm_id = $get_mc["results"][0]->id;
            $scm_url = $get_mc["results"][0]->url;
          }
          $merchant_scm[] = array("sc_id" => $each->socmed_id,
          "sc_name"=> $each->socmed_name,
          "scm_id"=> $scm_id,
          "scm_url" => $scm_url
        );
      }
    }
    $this->data["merchant_scm"] = $merchant_scm;
    //GET PRODUCTS
    $products = new stdClass();
    $products->dest_table_as = 'product as pr';
    $products->select_values = array('pr.*','pc.name as category_name');
    $where1 = array("where_column" => 'pr.merchant_id', "where_value" => $merchant_id);
    $join1 = array("join_with" => 'product_category as pc', "join_on" => 'pr.product_category_id = pc.id', "join_type" => '');
    $products->where_tables = array($where1);
    $products->join_tables = array($join1);
    $get_products = $this->data_model->get($products);
    if($get_products["results"] !="" ){
      foreach($get_products["results"] as $each){
        $img = new stdClass();
        $img->dest_table_as = 'product_images as pi';
        $img->select_values = array('pi.name as thumbnail');
        $where1 = array("where_column" => 'pi.id_product', "where_value" => $each->id);
        $img->where_tables = array($where1);
        $get_thumbnail = $this->data_model->get($img);
        if(empty($get_thumbnail["results"][0]->thumbnail)){
          $thumbnail = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
        } else {
          $img_name = $get_thumbnail["results"][0]->thumbnail;
          $product_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'merchant/'.$merchant_id.'/product/'.$each->id.'/'.$img_name;
          $check_thumb = check_if_empty($img_name, $product_dir);
          if($check_thumb != NO_IMG_NAME){
            $thumbnail  = base_url().$product_dir;
          } else {
            $thumbnail = base_url().BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
          }
        }
        $each->thumbnail = $thumbnail;
      }

      $this->data["merchant_product"] = $get_products["results"];
    }
    parent::display('admin/merchant/detail','admin/merchant/function');
  } else {
    redirect('/admin/404');
  }
}

public function update(){
  $id = $this->input->post("id");
  $name = $this->input->post("name");
  $owner = $this->input->post("owner");
  $email = $this->input->post("email");
  $contact = $this->input->post("contact");
  $address = $this->input->post("address");
  $desc = $this->input->post("desc");
  $status = $this->input->post("status");
  $old_logo = $this->input->post("old_logo");
  $old_cover = $this->input->post("old_cover");
  $link = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $name));
  $socmed_data = $this->input->post("socmed_data");

  //CHECKNAME
  $params_check = new stdClass();
  $params_check->dest_table_as = 'merchant as m';
  $params_check->select_values = array('m.link', 'm.id');
  $where_data = array("where_column" => 'm.link', "where_value" => $link);
  $params_check->where_tables = array($where_data);
  $check = $this->data_model->get($params_check);
  // print_r($check);
  // print_r($id);
  if (!empty($check['results'])) {
    if ($check['results'][0]->id != $id) {
      $params = new stdClass();
      $params->response = FAIL_STATUS;
      $params->message = "Nama sudah digunakan !";
      $params->data = "";
      $result = response_custom($params);
      echo json_encode($result);
      exit();
    }
  }
  $params_data = new stdClass();
  $params_data->new_data = array(
    "name" => $name,
    "owner" => $owner,
    "link" => $link,
    "email" => $email,
    "contact" => $contact,
    "address" => $address,
    "status" => $status,
    "description" => $desc,
    "update_at" => date('d-m-Y h:m')
  );
  $where = array("where_column" => 'id', "where_value" => $id);
  $params_data->where_tables = array($where);
  $params_data->table_update = 'merchant';
  $update = $this->data_model->update($params_data);
  $error = [];
  if (isset($_FILES["logo"])) {
    if (!empty($_FILES["logo"]["name"])) {
      $upload_logo = image_upload(array($_FILES["logo"]), "assets/images/backend/merchant/" . $id . "/logo/");
      if ($upload_logo->response == OK_STATUS) {
        $image_logo_name = $upload_logo->data[0];
        if ($old_logo != "") {
          $remove_old = unlink('./assets/images/backend/merchant/' . $id . '/logo/' . $old_logo);
        }
      } else {
        if ($upload_logo->data['error']) {
          foreach ($upload_logo->data['error'] as $er) {
            array_push($error, $er);
          }
        }
        $image_logo_name = $old_logo;
      }
    } else {
      $image_logo_name = $old_logo;
    }
  } else {
    $image_logo_name = $old_logo;
  }
  if (isset($_FILES["cover"])) {
    if (!empty($_FILES["cover"]["name"])) {
      $upload_cover = image_upload(array($_FILES["cover"]), "assets/images/backend/merchant/" . $id . "/cover/");
      if ($upload_cover->response == OK_STATUS) {
        $image_cover_name = $upload_cover->data[0];
        if ($old_cover != "") {
          $remove_old = unlink('./assets/images/backend/merchant/' . $id . '/cover/' . $old_cover);
        }
      } else {
        if ($upload_cover->data['error']) {
          foreach ($upload_cover->data['error'] as $er) {
            array_push($error, $er);
          }
        }
        $image_cover_name = $old_cover;
      }
    } else {
      $image_cover_name = $old_cover;
    }
  } else {
    $image_cover_name = $old_cover;
  }

  if(isset($socmed_data)){
    $decode_socmed_data = json_decode($socmed_data);
    if(!empty($decode_socmed_data)){
      $params_delete = new stdClass();
      $where1 = array("where_column" => 'merchant_id', "where_value" => $id);
      $params_delete->where_tables = array($where1);
      $params_delete->table = 'merchant_socmed';
      $delete = $this->data_model->delete($params_delete);
    }
    foreach($decode_socmed_data as $data){

      $new_data = array(
        "socmed_id" => $data->sc_id,
        "merchant_id" => $id,
        "url" => $data->sc_value,
        "update_at" => date('d-m-Y h:m')
      );
      $dest_table_sc = 'merchant_socmed';
      $add_sc = $this->data_model->add($new_data, $dest_table_sc);
    }

  }

  $params_update = new stdClass();
  $params_update->new_data = array("logo" => $image_logo_name, "cover" => $image_cover_name);
  $where = array("where_column" => 'id', "where_value" => $id);
  $params_update->where_tables = array($where);
  $params_update->table_update = 'merchant';
  $update_logo_cover = $this->data_model->update($params_update);
  if ($update['response'] == OK_STATUS ) {
    $params = new stdClass();
    if ($error) {
      $params->response = FAIL_STATUS;
      $params->message = "Peringatan";
      $params->data = array('link' => base_url() . 'admin/merchant/' . $link);
      $params->data = $error;
    } else {
      $params->response = OK_STATUS;
      $params->message = OK_MESSAGE;
      $params->data = array('link' => base_url() . 'admin/merchant/' . $link);
    }
    $result = response_custom($params);
  } else {
    $result = response_fail();
  }
  echo json_encode($result);
}


public function delete_product($id,$merchant_id){

  $params_delete_img = new stdClass();
  $where1 = array("where_column" => 'id_product', "where_value" => $id);
  $params_delete_img->where_tables = array($where1);
  $params_delete_img->table = 'product_images';
  $delete_img = $this->data_model->delete($params_delete_img);

  $product_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'merchant/'.$merchant_id.'/product/'.$id.'/';
  $files = glob($product_dir.'*');

  foreach($files as $file){
    $unlink_files = unlink($file);
  }

  $rm_dir = rmdir($product_dir);

  $params= new stdClass();
  $where1 = array("where_column" => 'id', "where_value" => $id);
  $params->where_tables = array($where1);
  $params->table = 'product';
  $delete_produk = $this->data_model->delete($params);
}

public function delete_socmed($id){
  $params_delete = new stdClass();
  $where1 = array("where_column" => 'id', "where_value" => $id);
  $params_delete->where_tables = array($where1);
  $params_delete->table = 'merchant_socmed';
  $delete = $this->data_model->delete($params_delete);
}

public function delete_promo($id,$merchant_id){
  $params_delete = new stdClass();
  $where1 = array("where_column" => 'id', "where_value" => $id);
  $params_delete->where_tables = array($where1);
  $params_delete->table = 'merchant_promo';
  $delete = $this->data_model->delete($params_delete);
  $dir = BACKEND_IMAGE_UPLOAD_FOLDER.'merchant/'.$merchant_id.'/promo/'.$id.'/';
  $files = glob($dir.'*');
  foreach($files as $file){
    $unlink_files = unlink($file);
  }
  $rm_dir = rmdir($dir);
}


public function delete(){
  $link = $this->input->post("link");


  $where1 = array("where_column" => 'link', "where_value" => $link);
  $dest_table_as = 'merchant';
  $select_values = array('id');
  $params = new stdClass();
  $params->dest_table_as = $dest_table_as;
  $params->select_values = $select_values;
  $params->where_tables = array($where1);
  $get = $this->data_model->get($params);
  // print_r($get);exit();
  $id_delete = $get['results'][0]->id;

  $product_data = new stdClass();
  $product_data->dest_table_as = 'product';
  $product_data->select_values = array('id');
  $product_data->where_tables = array(array("where_column" => 'merchant_id', "where_value" => $id_delete));
  $get_product_data = $this->data_model->get($product_data);
  $product_id = $get_product_data["results"];

  if($product_id != ""){
    $product_id_array = [];
    foreach($product_id as $product){
      array_push($product_id_array,$product->id);
    }
    foreach($product_id_array as $id){
      $this->delete_product($id,$id_delete);
    }
  }


  $socmed_data = new stdClass();
  $socmed_data->dest_table_as = 'merchant_socmed';
  $socmed_data->select_values = array('id');
  $socmed_data->where_tables = array(array("where_column" => 'merchant_id', "where_value" => $id_delete));
  $get_socmed_data = $this->data_model->get($socmed_data);
  $socmed_id = $get_socmed_data["results"];
  if($socmed_id != ""){
    $socmed_id_array = [];
    foreach($socmed_id as $socmed){
      array_push($socmed_id_array,$socmed->id);
    }

    foreach($socmed_id_array as $id){

      $this->delete_socmed($id);
    }
  }

  $promo_data = new stdClass();
  $promo_data->dest_table_as = 'merchant_promo';
  $promo_data->select_values = array('id');
  $promo_data->where_tables = array(array("where_column" => 'merchant_id', "where_value" => $id_delete));
  $get_promo_data = $this->data_model->get($promo_data);
  $promo_id = $get_promo_data["results"];
  if($promo_id != ""){
    $promo_id_array = [];
    foreach($promo_id as $promo){
      array_push($promo_id_array,$promo->id);
    }
    foreach($promo_id_array as $id){
      $this->delete_promo($id,$id_delete);
    }
  }

  $params_delete = new stdClass();
  $where1 = array("where_column" => 'id', "where_value" => $id_delete);
  $params_delete->where_tables = array($where1);
  $params_delete->table = 'merchant';
  $delete = $this->data_model->delete($params_delete);

  $dir = BACKEND_IMAGE_UPLOAD_FOLDER.'merchant/'.$id_delete.'/';
  $files = glob($dir.'*'.'/'.'*');
  $folders = glob($dir.'*');
  // print_r($files);exit();

  foreach($files as $file){
    if(is_file($file)){
      $unlink_files = unlink($file);
    }
    if(is_dir($file)){
      $rm = rmdir($file);
    }
  }

  foreach($folders as $file){
    if(is_file($file)){
      $unlink_files = unlink($file);
    }
    if(is_dir($file)){
      $rm = rmdir($file);
    }
  }

  $rm_dir = rmdir($dir);

  if ($delete['response'] == OK_STATUS) {
    $result = response_success();
  } else {
    $result = response_fail();
  }
  echo json_encode($result);
}


}
