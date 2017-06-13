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

    $params_data = array(
      "product_category_id" => $pc,
      "name" => $name,
      "link" => $link,
      "price" => $price,
      "dimension" => $dim,
      "description" => $desc,
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
    $params->dest_table_as = 'product as p';
    $params->select_values = array('p.*');
    $params->where_tables = array(array("where_column" => 'p.id', "where_value" => $parameter));
    $get = $this->data_model->get($params);
    if ($get["results"][0] != "") {
      $params_img = new stdClass();
      $params_img->dest_table_as = 'product_images as pi';
      $params_img->select_values = array('pi.*');
      $params_img->where_tables = array(array("where_column" => 'pi.id_product', "where_value" => $parameter));
      $get_imgs = $this->data_model->get($params_img);

      $utama = array("name"=>"", "url" => BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG', "sort" => '0');
      $img1 = array("name"=>"","url" => BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG', "sort" => '1');
      $img2 = array("name"=>"","url" => BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG', "sort" => '2');
      $img3 = array("name"=>"","url" => BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG', "sort" => '3');
      $img4 = array("name"=>"","url" => BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG', "sort" => '4');

      $product_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'merchant/'.$get["results"][0]->merchant_id.'/product/'.$parameter.'/';
      $get['results'][0]->product_dir = $product_dir;
      foreach($get_imgs["results"] as $old){
        $product_img_dir = $product_dir.$old->name;
        $check_thumb = check_if_empty($old->name, $product_img_dir);
        if($old->sort == '0'){
          if($check_thumb == NO_IMG_NAME){
            $utama['name'] = "";
            $utama['url'] = BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
          } else {
            $utama['name'] = $check_thumb;
            $utama['url'] = $product_dir.$check_thumb;
          }
        } elseif ($old->sort == '1') {
          if($check_thumb == NO_IMG_NAME){
            $img1['name'] = "";
            $img1['url'] = BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
          } else {
            $img1['name'] = $check_thumb;
            $img1['url'] = $product_dir.$check_thumb;
          }
        }elseif ($old->sort == '2') {
          if($check_thumb == NO_IMG_NAME){
            $img2['name'] = "";
            $img2['url'] = BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
          } else {
            $img2['name'] =$check_thumb;
            $img2['url'] = $product_dir.$check_thumb;
          }
        }elseif ($old->sort == '3') {
          if($check_thumb == NO_IMG_NAME){
            $img3['name'] = "";
            $img3['url'] = BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
          } else {
            $img3['name'] = $check_thumb;
            $img3['url'] = $product_dir.$check_thumb;
          }
        }elseif ($old->sort == '4') {
          if($check_thumb == NO_IMG_NAME){
            $img4['name'] = "";
            $img4['url'] = BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
          } else {
            $img4['name'] = $check_thumb;
            $img4['url'] = $product_dir.$check_thumb;
          }
        }
      }

      $array_img_old_name = array("img_utama" => $utama, "img1" => $img1, "img2" => $img2, "img3" => $img3, "img4" => $img4);
      $dest_table_as = 'product_category as pc';
      $select_values = array('pc.*');
      $params_pc = new stdClass();
      $params_pc->dest_table_as = $dest_table_as;
      $params_pc->select_values = $select_values;
      $get_pc = $this->data_model->get($params_pc);

      $dest_table_as = 'merchant as mc';
      $select_values = array('mc.id','mc.name');
      $params_mc = new stdClass();
      $params_mc->dest_table_as = $dest_table_as;
      $params_mc->select_values = $select_values;
      $get_mc = $this->data_model->get($params_mc);

      $this->data['pc_options'] = $get_pc['results'];
      $this->data['mc_options'] = $get_mc['results'];
      $this->data['old_img'] = $array_img_old_name;
      $this->data['records'] = $get['results'][0];
      $this->data['title_page'] = $get["results"][0]->name;
      parent::display('admin/product/detail','admin/product/function');
    } else {
      redirect('/admin/404');
    }
    // print_r($parameter);
  }

  public function update(){
    $id = $this->input->post("id");
    $params = new stdClass();
    $params->dest_table_as = 'product as p';
    $params->select_values = array('p.id');
    $params->where_tables = array(array("where_column" => 'p.id', "where_value" => $id));
    $get = $this->data_model->get($params);
    if($get["response"] == FAIL_STATUS){
      echo json_encode(response_fail());
      exit();
    } else {
      if($get["results"] == ""){
        echo json_encode(response_fail());
        exit();
      }
    }
    $name = $this->input->post("name");
    $merchant_id = $this->input->post("merchant");
    $pc = $this->input->post("pc");
    $desc = $this->input->post("desc");
    $dim = $this->input->post("dim");
    $price = $this->input->post("price");
    $utamaold = $this->input->post("utama_old");
    $img1old = $this->input->post("img_1_old");
    $img2old = $this->input->post("img_2_old");
    $img3old = $this->input->post("img_3_old");
    $img4old = $this->input->post("img_4_old");
    $to_delete = $this->input->post("to_delete");
    if($price == NULL){
      $price = '0';
    }

    $link = strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $name)).'.html';

    //CHECKNAME
    $params_data = new stdClass();
    $params_data->new_data = array(
      "product_category_id" => $pc,
      "name" => $name,
      "link" => $link,
      "price" => $price,
      "dimension" => $dim,
      "description" => $desc,
      "merchant_id" => $merchant_id,
      "update_at" => date('d-m-Y h:m')
    );
    $where = array("where_column" => 'id', "where_value" => $id);
    $params_data->where_tables = array($where);
    $params_data->table_update = 'product';
    $update = $this->data_model->update($params_data);

    $img_uploads_array = [];
    if(isset($_FILES["utama_new"])){
      $utama = array("file" =>$_FILES["utama_new"], "old" => $utamaold,"sort" => '0');
      array_push($img_uploads_array,$utama);
    }
    if(isset($_FILES["img_1_new"])){
      $img1 = array("file" =>$_FILES["img_1_new"], "old" => $img1old,"sort" => '1');
      array_push($img_uploads_array,$img1);
    }
    if(isset($_FILES["img_2_new"])){
      $img2 = array("file" =>$_FILES["img_2_new"], "old" => $img2old,"sort" => '2');
      array_push($img_uploads_array,$img2);
    }

    if(isset($_FILES["img_3_new"])){
      $img3 = array("file" =>$_FILES["img_3_new"], "old" => $img3old,"sort" => '3');
      array_push($img_uploads_array,$img3);
    }

    if(isset($_FILES["img_4_new"])){
      $img4 = array("file" =>$_FILES["img_4_new"], "old" => $img4old,"sort" => '4');
      array_push($img_uploads_array,$img4);
    }

    $error_upload = [];
    $success_upload = [];
    foreach($img_uploads_array as $ar){
      $upload = image_upload(array($ar["file"]) , "assets/images/backend/merchant/" . $merchant_id . "/product/"."$id");
      if ($upload->response == OK_STATUS) {
        $image_name = $upload->data[0];
        if ($ar["old"] != "") {
          $remove_old = unlink('./assets/images/backend/merchant/' . $merchant_id . '/product/'.$id.'/' . $ar["old"]);
        }
        array_push($success_upload,array("new" => $image_name, "old" => $ar["old"], "sort" => $ar['sort']));

      } else {
        if ($upload->data['error']) {
          foreach ($upload->data['error'] as $er) {
            array_push($error_upload, $er);
          }
        }
      }
    }

    foreach($success_upload as $each){
      if($each['old'] != ""){
        $params_update_images = new stdClass();
        $params_update_images->new_data = array("name" => $each['new']);
        $where1 = array("where_column" => 'name', "where_value" => $each['old']);
        $where2 = array("where_column" => 'sort', "where_value" => $each['sort']);
        $params_update_images->where_tables = array($where1,$where2);
        $params_update_images->table_update = 'product_images';
        $update_images = $this->data_model->update($params_update_images);
      } else {
        $params_data = array(
          "name" => $each['new'],
          "id_product" => $id,
          "sort" => $each['sort'],
        );
        $dest_table = 'product_images';
        $add = $this->data_model->add($params_data, $dest_table);
      }
    }

    if(isset($to_delete)){
      $del_data = json_decode($to_delete);
      foreach($del_data as $del){
        $params_delete = new stdClass();
        $where1 = array("where_column" => 'name', "where_value" => $del);
        $params_delete->where_tables = array($where1);
        $params_delete->table = 'product_images';
        $delete = $this->data_model->delete($params_delete);
        $product_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'merchant/'.$merchant_id.'/product/'.$id.'/'.$del;
        $check_thumb = check_if_empty($del, $product_dir);
        if($check_thumb != NO_IMG_NAME){
          $remove_old = unlink('./assets/images/backend/merchant/' . $merchant_id . '/product/'.$id.'/' . $del);
        }
      }
    }

    if ($update['response'] == OK_STATUS ) {
      $params = new stdClass();
      if ($error_upload) {
        $params->response = FAIL_STATUS;
        $params->message = "Peringatan";
        $params->data = array('link' => base_url() . 'admin/product/' . $id,"error" => $error_upload);
      } else {
        $params->response = OK_STATUS;
        $params->message = OK_MESSAGE;
        $params->data = array('link' => base_url() . 'admin/product/' . $id);
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
