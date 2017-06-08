<?php

include 'Admin.php';

class product extends admin {

  function __construct() {
    parent::__construct();
    parent::checkauth();
    $this->data['active_page'] = "product";
  }
  public function json(){
    $dest_table_as = 'product as p';
    $select_values = array('p.*','m.name as merchant_name','pc.name as product_category');
    $join_1 = array("join_with" => 'merchant as m', "join_on" => 'p.merchant_id = m.id', "join_type" => '');
    $join_2 = array("join_with" => 'product_category as pc', "join_on" => 'p.product_category_id = pc.id', "join_type" => '');
    $join_tables = array($join_1,$join_2);
    $params = new stdClass();
    $params->dest_table_as = $dest_table_as;
    $params->select_values = $select_values;
    $params->join_tables = $join_tables;
    $get = $this->data_model->get($params);
    echo json_encode(array("data" => $get['results']));
  }
  //Data on Page
  public function index() {
    $this->data['title_page'] = "Data Product";
    parent::display('admin/product/index','admin/product/function',TRUE);
  }


  public function add() {
    $this->data['title_page'] = "Tambah Product";
    $dest_table_as = 'merchant as m';
    $select_values = array('m.id as id_merchant','m.name as name_merchant');
    $params = new stdClass();
    $params->dest_table_as = $dest_table_as;
    $params->select_values = $select_values;
    $get = $this->data_model->get($params);
    $this->data['merchant_options'] = $get['results'];

    $dest_table_as = 'product_category as pc';
    $select_values = array('pc.id as id_pc','pc.name as name_pc');
    $params = new stdClass();
    $params->dest_table_as = $dest_table_as;
    $params->select_values = $select_values;
    $get = $this->data_model->get($params);
    $this->data['pc_options'] = $get['results'];

    // print_r($this->data['merchant_options']);
    parent::display('admin/product/add','admin/product/function',FALSE);
  }

  public function post(){
    // print_r($this->input->post());exit();
    $name = $this->input->post("name");
    $merchant_id = $this->input->post("merchant");

    $pc = $this->input->post("pc");
    $desc = $this->input->post("desc");
    $dim = $this->input->post("dim");
    $price = $this->input->post("price");
    if($price == NULL){
      $price = '0';
    }
    $link = strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $name)).'.html';
    $params_check = new stdClass();
    $params_check->dest_table_as = 'product as p';
    $params_check->select_values = array('p.link', 'p.id');
    $where_data = array("where_column" => 'p.link', "where_value" => $link);
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
      "product_category_id" => $pc,
      "name" => $name,
      "link" => $link,
      "price" => $price,
      "dimension" => $dim,
      "merchant_id" => $merchant_id,
      "update_at" => date('d-m-Y h:m')
    );
    $dest_table = 'product';
    $add = $this->data_model->add($params_data, $dest_table);
    $product_id = $add["data"];
    $product_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'merchant/'.$merchant_id.'/product/'.$product_id;
    $create_produk_dir = mkdir($product_dir);
    $error = array();
    if (isset($_FILES["utama"])) {
      if ($_FILES["utama"] != "") {
        $array = array($_FILES["utama"]);
        $upload_utama = image_upload($array, $product_dir);
        if($upload_utama->response == OK_STATUS){
          $image_utama_name = $upload_utama->data[0];
          $array_img_utama = array($product_id,$image_utama_name, '0');
        } else {
          $err_msg_utama = $upload_utama->data['error'][0];
        }
      } else {
        $array_img_utama = FALSE;
      }
    } else {
      $image_utama_name = FALSE;
    }

    $images_support = [];
    if (isset($_FILES["image_1"])) {
      if ($_FILES["image_1"] != "") {
        array_push($images_support, $_FILES["image_1"]);
      }
    }

    if (isset($_FILES["image_2"])) {
      if ($_FILES["image_2"] != "") {
        array_push($images_support, $_FILES['image_2']);
      }
    }

    if (isset($_FILES["image_3"])) {
      if ($_FILES["image_3"] != "") {
        array_push($images_support, $_FILES['image_3']);
      }
    }

    if (isset($_FILES["image_4"])) {
      if ($_FILES["image_4"] != "") {
        array_push($images_support, $_FILES['image_4']);
      }
    }

    $upload_images_support = image_upload($images_support,$product_dir);
    $name_success = [];
    $error_data = [];
    $int = 1;
    if(isset($array_img_utama)){
      $name_success[] = $array_img_utama;
    }

    if(isset($err_msg_utama)){
      $error_data[] = $err_msg_utama;
    }

    if($upload_images_support->response == OK_STATUS){
      foreach($upload_images_support->data as $name){
        $name_success[] = array($product_id,$name, $int,date('d-m-Y h:m'));
        $int++;
      }
    } else {
      foreach($upload_images_support->data['success'] as $name){
        $name_success[] = array($product_id,$name, $int,date('d-m-Y h:m'));
        $int++;
      }
      foreach($upload_images_support->data['error'] as $err){
        $error_data[] = $err;
      }
    }


    foreach($name_success as $name) {
    $params_image_product = array(
      "id_product" => $name[0],
      "name" => $name[1],
      "sort" => $name[2],
      "update_at" => date('d-m-Y h:m')
    );
    $dest_table = 'product_images';
    $add_images = $this->data_model->add($params_image_product, $dest_table);
    }

    if(empty($error_data)){
      $data = array("link" => base_url() . 'admin/product/' . $product_id);
      $result = get_success($data);
    } else {
      $params = new stdClass();
      $params->response =  NO_DATA_STATUS;
      $params->message = "Proses upload tidak lengkap";
      $params->data = array("error" => $error_data, "link" => base_url() . 'admin/product/' . $product_id);
      $result = response_custom($params);
    }
    
    echo json_encode($result);

  }

  public function detail(){
    $parameter = $this->uri->segment(3);
    $params = new stdClass();
    $params->dest_table_as = 'product as m';
    $params->select_values = array('m.*');
    $params->where_tables = array(array("where_column" => 'm.link', "where_value" => $parameter));
    $get = $this->data_model->get($params);
    //CHECK DOMNameList
    if ($get["results"][0] != "") {
      $this->data['title_page'] = "Detail product";
      $logo = $get['results'][0]->logo;
      $cover = $get['results'][0]->cover;
      $get["results"][0]->logo_old = $get['results'][0]->logo;
      $image_dir_logo = BACKEND_IMAGE_UPLOAD_FOLDER . 'product/' . $get['results'][0]->id . '/logo/' . $logo;
      $check_thumb = check_if_empty($logo, $image_dir_logo);
      $get["results"][0]->logo = BASE_URL . $check_thumb;

      $get["results"][0]->cover_old = $get['results'][0]->cover;
      $image_dir_cover = BACKEND_IMAGE_UPLOAD_FOLDER . 'product/' . $get['results'][0]->id . '/cover/' . $cover;
      $check_thumb = check_if_empty($cover, $image_dir_cover);
      $get["results"][0]->cover = BASE_URL . $check_thumb;

      $this->data['records'] = $get['results'][0];
      parent::display('admin/product/detail','admin/product/function');
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
    $old_logo = $this->input->post("old_logo");
    $old_cover = $this->input->post("old_cover");
    $link = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $name));

    //CHECKNAME
    $params_check = new stdClass();
    $params_check->dest_table_as = 'product as m';
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
      "description" => $desc,
      "update_at" => date('d-m-Y h:m')
    );
    $where = array("where_column" => 'id', "where_value" => $id);
    $params_data->where_tables = array($where);
    $params_data->table_update = 'product';
    $update = $this->data_model->update($params_data);
    $error = [];
    if (isset($_FILES["logo"])) {
      if (!empty($_FILES["logo"]["name"])) {
        $upload_logo = image_upload($_FILES["logo"], '1', "assets/images/backend/product/" . $id . "/logo/");
        if ($upload_logo->response == OK_STATUS) {
          $image_logo_name = $upload_logo->data[0];
          if ($old_logo != "") {
            $remove_old = unlink('./assets/images/backend/product/' . $id . '/logo/' . $old_logo);
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
        $upload_cover = image_upload($_FILES["cover"], '1', "assets/images/backend/product/" . $id . "/cover/");
        if ($upload_cover->response == OK_STATUS) {
          $image_cover_name = $upload_cover->data[0];
          if ($old_cover != "") {
            $remove_old = unlink('./assets/images/backend/product/' . $id . '/cover/' . $old_cover);
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

    $params_update = new stdClass();
    $params_update->new_data = array("logo" => $image_logo_name, "cover" => $image_cover_name);
    $where = array("where_column" => 'id', "where_value" => $id);
    $params_update->where_tables = array($where);
    $params_update->table_update = 'product';
    $update_logo_cover = $this->data_model->update($params_update);
    if ($update['response'] == OK_STATUS ) {
      //            $result = response_success();
      $params = new stdClass();
      if ($error) {
        $params->response = FAIL_STATUS;
        $params->message = "Peringatan";
        // $params->data = array('link' => base_url() . 'admin/tpq/detail/' . $link);
        $params->data = $error;
      } else {
        $params->response = OK_STATUS;
        $params->message = OK_MESSAGE;
        $params->data = array('link' => base_url() . 'admin/product/' . $link);
      }
      $result = response_custom($params);
    } else {
      $result = response_fail();
    }
    echo json_encode($result);
  }


  public function delete(){
    $link = $this->input->post("link");
    $params_delete = new stdClass();
    $where1 = array("where_column" => 'link', "where_value" => $link);
    $params_delete->where_tables = array($where1);
    $params_delete->table = 'product';
    $delete = $this->data_model->delete($params_delete);

    // $params_delete_akun = new stdClass();
    // $params_delete_akun->table = 'tb_akun';
    // $where1 = array("where_column" => 'level', "where_value" => 'T');
    // $where2 = array("where_column" => 'id_level', "where_value" => $id);
    // $params_delete_akun->where_tables = array($where1, $where2);
    // $delete_akun = $this->data_model->delete($params_delete_akun);

    if ($delete['response'] == OK_STATUS) {
      $result = response_success();
    } else {
      $result = response_fail();
    }
    echo json_encode($result);
  }


}
