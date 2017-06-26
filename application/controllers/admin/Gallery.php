<?php

include 'Admin.php';

class gallery extends admin {

  function __construct() {
    parent::__construct();
    parent::checkauth();
    $this->data['active_page'] = "gallery";
  }

  public function json(){
    $dest_table_as = 'gallery as g';
    $select_values = array('g.*');
    $params = new stdClass();
    $params->dest_table_as = $dest_table_as;
    $params->select_values = $select_values;
    $get = $this->data_model->get($params);
    echo json_encode(array("data" => $get['results']));
  }


  public function index() {
    $this->data['title_page'] = "Data Galeri";
    parent::display('admin/gallery/index','admin/gallery/function',TRUE);
  }


  public function add() {
    $this->data['title_page'] = "Tambah Galeri";
    parent::display('admin/gallery/add','admin/gallery/function',FALSE);
  }

  public function post(){
    $name = $this->input->post("name");
    $desc = $this->input->post("desc");
    $link = strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $name)).'.html';
    $params_check = new stdClass();

    $params_data = array(
      "name" => $name,
      "description" => $desc,
      "update_at" => date('d-m-Y h:m')
    );
    $dest_table = 'gallery';
    $add = $this->data_model->add($params_data, $dest_table);
    $gallery_id = $add["data"];

    $gallery_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'gallery/'.$gallery_id;
    $create_dir = mkdir($gallery_dir);
    $error = array();

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

    $upload_images_support = image_upload($images_support,$gallery_dir);
    $name_success = [];
    $error_data = [];
    $int = 1;

    if(isset($err_msg_utama)){
      $error_data[] = $err_msg_utama;
    }

    if($upload_images_support->response == OK_STATUS){
      foreach($upload_images_support->data as $name){
        $name_success[] = array($gallery_id,$name, $int,date('d-m-Y h:m'));
        $int++;
      }
    } else {
      foreach($upload_images_support->data['success'] as $name){
        $name_success[] = array($gallery_id,$name, $int,date('d-m-Y h:m'));
        $int++;
      }
      foreach($upload_images_support->data['error'] as $err){
        $error_data[] = $err;
      }
    }


    foreach($name_success as $name) {
      $params_image_gallery = array(
        "gallery_id" => $name[0],
        "name" => $name[1],
        "sort" => $name[2],
        "update_at" => date('d-m-Y h:m')
      );
      $dest_table = 'gallery_images';
      $add_images = $this->data_model->add($params_image_gallery, $dest_table);
    }

    if(empty($error_data)){
      $data = array("link" => base_url() . 'admin/gallery/' . $gallery_id);
      $result = get_success($data);
    } else {
      $params = new stdClass();
      $params->response =  NO_DATA_STATUS;
      $params->message = "Proses upload tidak lengkap";
      $params->data = array("error" => $error_data, "link" => base_url() . 'admin/gallery/' . $gallery_id);
      $result = response_custom($params);
    }

    echo json_encode($result);

  }

  public function detail(){
    $parameter = $this->uri->segment(3);
    $params = new stdClass();
    $params->dest_table_as = 'gallery as p';
    $params->select_values = array('p.*');
    $params->where_tables = array(array("where_column" => 'p.id', "where_value" => $parameter));
    $get = $this->data_model->get($params);
    if ($get["results"][0] != "") {
      $params_img = new stdClass();
      $params_img->dest_table_as = 'gallery_images as pi';
      $params_img->select_values = array('pi.*');
      $params_img->where_tables = array(array("where_column" => 'pi.gallery_id', "where_value" => $parameter));
      $get_imgs = $this->data_model->get($params_img);

      $utama = array("name"=>"", "url" => BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png', "sort" => '0');
      $img1 = array("name"=>"","url" => BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png', "sort" => '1');
      $img2 = array("name"=>"","url" => BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png', "sort" => '2');
      $img3 = array("name"=>"","url" => BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png', "sort" => '3');
      $img4 = array("name"=>"","url" => BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png', "sort" => '4');

      $gallery_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'gallery/'.$parameter.'/';
      $get['results'][0]->gallery_dir = $gallery_dir;
      foreach($get_imgs["results"] as $old){
        $gallery_img_dir = $gallery_dir.$old->name;
        $check_thumb = check_if_empty($old->name, $gallery_img_dir);
        if ($old->sort == '1') {
          if($check_thumb == NO_IMG_NAME){
            $img1['name'] = "";
          } else {
            $img1['name'] = $check_thumb;
            $img1['url'] = $gallery_dir.$check_thumb;
          }
        }elseif ($old->sort == '2') {
          if($check_thumb == NO_IMG_NAME){
            $img2['name'] = "";
          } else {
            $img2['name'] =$check_thumb;
            $img2['url'] = $gallery_dir.$check_thumb;
          }
        }elseif ($old->sort == '3') {
          if($check_thumb == NO_IMG_NAME){
            $img3['name'] = "";
          } else {
            $img3['name'] = $check_thumb;
            $img3['url'] = $gallery_dir.$check_thumb;
          }
        }elseif ($old->sort == '4') {
          if($check_thumb == NO_IMG_NAME){
            $img4['name'] = "";
          } else {
            $img4['name'] = $check_thumb;
            $img4['url'] = $gallery_dir.$check_thumb;
          }
        }
      }

      $array_img_old_name = array("img1" => $img1, "img2" => $img2, "img3" => $img3, "img4" => $img4);

      $this->data['old_img'] = $array_img_old_name;
      $this->data['records'] = $get['results'][0];
      $this->data['title_page'] = $get["results"][0]->name;
      parent::display('admin/gallery/detail','admin/gallery/function');
    } else {
      redirect('/admin/404');
    }
  }

  public function update(){
    $id = $this->input->post("id");
    $params = new stdClass();
    $params->dest_table_as = 'gallery as g';
    $params->select_values = array('g.id');
    $params->where_tables = array(array("where_column" => 'g.id', "where_value" => $id));
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
    $desc = $this->input->post("desc");

    $img1old = $this->input->post("img_1_old");
    $img2old = $this->input->post("img_2_old");
    $img3old = $this->input->post("img_3_old");
    $img4old = $this->input->post("img_4_old");
    $to_delete = $this->input->post("to_delete");

    $link = strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $name)).'.html';

    $params_data = new stdClass();
    $params_data->new_data = array(
      "name" => $name,
      "description" => $desc,
      "update_at" => date('d-m-Y h:m')
    );
    $where = array("where_column" => 'id', "where_value" => $id);
    $params_data->where_tables = array($where);
    $params_data->table_update = 'gallery';
    $update = $this->data_model->update($params_data);

    $img_uploads_array = [];

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
      $upload = image_upload(array($ar["file"]) , "assets/images/backend/gallery/".$id."/");
      if ($upload->response == OK_STATUS) {
        $image_name = $upload->data[0];
        if ($ar["old"] != "") {
          $remove_old = unlink('./assets/images/backend/gallery/'.$id.'/' . $ar["old"]);
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
        $params_update_images->table_update = 'gallery_images';
        $update_images = $this->data_model->update($params_update_images);
      } else {
        $params_data = array(
          "name" => $each['new'],
          "gallery_id" => $id,
          "sort" => $each['sort'],
        );
        $dest_table = 'gallery_images';
        $add = $this->data_model->add($params_data, $dest_table);
      }
    }

    if(isset($to_delete)){
      $del_data = json_decode($to_delete);
      foreach($del_data as $del){
        $params_delete = new stdClass();
        $where1 = array("where_column" => 'name', "where_value" => $del);
        $params_delete->where_tables = array($where1);
        $params_delete->table = 'gallery_images';
        $delete = $this->data_model->delete($params_delete);
        $gallery_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'gallery/'.$id.'/'.$del;
        $check_thumb = check_if_empty($del, $gallery_dir);
        if($check_thumb != NO_IMG_NAME){
          $remove_old = unlink('./assets/images/backend/gallery/'.$id.'/' . $del);
        }
      }
    }

    if ($update['response'] == OK_STATUS ) {
      $params = new stdClass();
      if ($error_upload) {
        $params->response = FAIL_STATUS;
        $params->message = "Peringatan";
        $params->data = array('link' => base_url() . 'admin/gallery/' . $id,"error" => $error_upload);
      } else {
        $params->response = OK_STATUS;
        $params->message = OK_MESSAGE;
        $params->data = array('link' => base_url() . 'admin/gallery/' . $id);
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
    $params_delete->table = 'gallery';
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
