<?php

include 'Admin.php';

class setting extends admin {

  function __construct() {
    parent::__construct();
    parent::checkauth();
    $this->data['active_page'] = "setting";
  }

  //Data on Page
  public function index() {
    $this->data['title_page'] = "Setting";
    $dest_table_as = 'setting as s';
    $select_values = array('s.*');
    $params = new stdClass();
    $params->dest_table_as = $dest_table_as;
    $params->select_values = $select_values;
    $get = $this->data_model->get($params);

    $dest = 'user as u';
    $select = array('u.*');
    $param = new stdClass();
    $param->dest_table_as = $dest;
    $param->select_values = $select;
    $where = array("where_column" => 'u.role', "where_value" => 'A');
    $param->where_tables = array($where);
    $akun = $this->data_model->get($param);
    if ($get['results'] != "") {
      $logo = $get['results'][0]->site_logo;
      $get["results"][0]->logo_old = $get['results'][0]->site_logo;
      $dir = BACKEND_IMAGE_UPLOAD_FOLDER . 'logo/';
      $logo_dir =  $dir.$logo;
      $check_thumb = check_if_empty($logo, $logo_dir);
      if($check_thumb == NO_IMG_NAME){
        $get["results"][0]->logo = BASE_URL.BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
      } else {
        $get["results"][0]->logo = BASE_URL . $dir.$check_thumb;
      }

      $this->data['akun'] = $akun['results'][0];
      $this->data['records'] = $get['results'][0];
    } else {
      $this->data['records'] = '';
    }
    parent::display('admin/setting/detail','admin/setting/function');
  }


  public function update() {
    $id = $this->input->post("id");
    $name = $this->input->post("name");
    $uname = $this->input->post("username");
    $moto = $this->input->post("moto");
    $desc = $this->input->post("desc");
    $addr = $this->input->post("addr");
    $contact = $this->input->post("contact");
    $old_logo = $this->input->post("logo_old");
    $error = [];
    if (isset($_FILES['logo_new'])) {
      if ($_FILES['logo_new']['name'] != "") {
        $upload = image_upload(array($_FILES['logo_new']), "assets/images/backend/logo/");
        if ($upload->response == OK_STATUS) {
          $image_name = $upload->data[0];
          if ($old_logo != "") {
            $old_dir = './assets/images/backend/logo/' . $old_logo;
            $remove = unlink($old_dir);
          }
        } else {
          if ($upload->data['error']) {
            foreach ($upload->data['error'] as $er) {
              array_push($error, $er);
            }
          }
          $image_name = $old_img;
        }
      } else {
        $image_name = "";
      }
    }

    $params_data = new stdClass();
    if (isset($image_name)) {
      $params_data->new_data = array(
        "site_name" => $name,
        "site_moto" => $moto,
        "site_description" => $desc,
        "site_address" => $addr,
        "site_contact" => $contact,
        "site_logo" => $image_name,
        "update_at" => date('d-m-Y hh:mm')
      );
    } else {
      $params_data->new_data = array(
        "site_name" => $name,
        "site_moto" => $moto,
        "site_description" => $desc,
        "site_address" => $addr,
        "site_contact" => $contact,
        "update_at" => date('d-m-Y hh:mm')
      );
    }
    $where = array("where_column" => 'id', "where_value" => $id);
    $params_data->where_tables = array($where);
    $params_data->table_update = 'setting';
    $update_setting = $this->data_model->update($params_data);


    $params_account = new stdClass();
    $params_account->new_data = array(
      "username" => $uname,
    );
    $where = array("where_column" => 'role', "where_value" => 'A');
    $params_account->where_tables = array($where);
    $params_account->table_update = 'user';
    $update_account = $this->data_model->update($params_account);


    if ($update_setting['response'] == OK_STATUS ) {
      $params = new stdClass();
      if ($error) {
        $params->response = FAIL_STATUS;
        $params->message = "Peringatan";
        $params->data = array('link' => base_url() . 'admin/setting/', 'error' => $error);
      } else {
        $params->response = OK_STATUS;
        $params->message = OK_MESSAGE;
        $params->data = array('link' => base_url() . 'admin/setting/');
      }
      $result = response_custom($params);
    } else {
      $result = response_fail();
    }
    echo json_encode($result);
  }

  public function change_password() {
    $old_pass = $this->input->post("old_pass");
    $new_pass = $this->input->post("new_pass");
    $dest_table_as = 'user as u';
    $select_values = array('u.password');
    $params = new stdClass();
    $params->dest_table_as = $dest_table_as;
    $params->select_values = $select_values;
    $where1 = array("where_column" => 'u.role', "where_value" => "A");
    $params->where_tables = array($where1);
    $get = $this->data_model->get($params);
    if ($get['response'] == OK_STATUS) {
      if ($old_pass != $get['results'][0]->password) {
        $response_data = array("response" => FAIL_STATUS, "message" => "Password lama tidak sesuai");
      } else {
        $params_data = new stdClass();
        $params_data->new_data = array("password" => $new_pass);
        $where = array("where_column" => 'role', "where_value" => "A");
        $params_data->where_tables = array($where);
        $params_data->table_update = 'user';
        $update = $this->data_model->update($params_data);
        if ($update["response"] == OK_STATUS) {
          $response_data = array("response" => OK_STATUS, "message" => "Password sudah diganti");
        }
      }
    }
    echo json_encode($response_data);
  }

}
