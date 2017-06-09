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
      $this->data['title_page'] = "Detail Merchant";
      $logo = $get['results'][0]->logo;
      $cover = $get['results'][0]->cover;
      $get["results"][0]->logo_old = $get['results'][0]->logo;
      $image_dir_logo = BACKEND_IMAGE_UPLOAD_FOLDER . 'merchant/' . $get['results'][0]->id . '/logo/' . $logo;
      $check_thumb = check_if_empty($logo, $image_dir_logo);
      $get["results"][0]->logo = BASE_URL . $check_thumb;

      $get["results"][0]->cover_old = $get['results'][0]->cover;
      $image_dir_cover = BACKEND_IMAGE_UPLOAD_FOLDER . 'merchant/' . $get['results'][0]->id . '/cover/' . $cover;
      $check_thumb = check_if_empty($cover, $image_dir_cover);
      $get["results"][0]->cover = BASE_URL . $check_thumb;

      $this->data['records'] = $get['results'][0];
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
    $old_logo = $this->input->post("old_logo");
    $old_cover = $this->input->post("old_cover");
    $link = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $name));

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
        $upload_logo = image_upload(array($_FILES["logo"]), '1', "assets/images/backend/merchant/" . $id . "/logo/");
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
        $upload_cover = image_upload(array($_FILES["cover"]), '1', "assets/images/backend/merchant/" . $id . "/cover/");
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

    $params_update = new stdClass();
    $params_update->new_data = array("logo" => $image_logo_name, "cover" => $image_cover_name);
    $where = array("where_column" => 'id', "where_value" => $id);
    $params_update->where_tables = array($where);
    $params_update->table_update = 'merchant';
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
        $params->data = array('link' => base_url() . 'admin/merchant/' . $link);
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
    $params_delete->table = 'merchant';
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
