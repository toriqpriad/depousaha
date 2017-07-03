<?php

include 'Admin.php';

class socmed extends admin {

  function __construct() {
    parent::__construct();
    parent::checkauth();
    $this->data['active_page'] = "socmed";
  }
  public function json(){
    $dest_table_as = 'socmed as s';
    $select_values = array('s.*');
    $params = new stdClass();
    $params->dest_table_as = $dest_table_as;
    $params->select_values = $select_values;
    $get = $this->data_model->get($params);
    echo json_encode(array("data" => $get['results']));
  }
  //Data on Page
  public function index() {
    $this->data['title_page'] = "Sosial Media";
    parent::display('admin/socmed/index','admin/socmed/function',TRUE);
  }


  public function add() {
    $this->data['title_page'] = "Tambah socmed";
    parent::display('admin/socmed/add','admin/socmed/function',FALSE);
  }

  public function post(){
    $name = $this->input->post("name");
    $icon = $this->input->post("icon");
    $link = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $name));

    $params_data = array(
      "name" => $name,
      "icon" => $icon,
      "update_at" => date('d-m-Y h:m')
    );
    $dest_table = 'socmed';
    $add = $this->data_model->add($params_data, $dest_table);
    $socmed_id = $add["data"];
    $socmed_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'socmed/'.$socmed_id;
    $create_dir = mkdir($socmed_dir);

    if (isset($_FILES["logo"])) {
      if ($_FILES["logo"] != "") {
        $upload_logo = image_upload(array($_FILES["logo"]), $socmed_dir . "/");
        $image_logo_name = $upload_logo->data[0];
      } else {
        $image_logo_name = "";
      }
    } else {
      $image_logo_name = "";
    }

    $params_update = new stdClass();
    $params_update->new_data = array("logo" => $image_logo_name);
    $params_update->table_update = 'socmed';
    $where = array("where_column" => 'id', "where_value" => $socmed_id);
    $params_update->where_tables = array($where);
    $update_logo_cover = $this->data_model->update($params_update);
    if ($add['response'] == OK_STATUS) {
      $data = array("link" => base_url() . 'admin/socmed/' . $socmed_id);
      $result = get_success($data);
    } else {
      $result = response_fail();
    }

    echo json_encode($result);

  }

  public function detail(){
    $parameter = $this->uri->segment(3);
    $params = new stdClass();
    $params->dest_table_as = 'socmed as m';
    $params->select_values = array('m.*');
    $params->where_tables = array(array("where_column" => 'm.id', "where_value" => $parameter));
    $get = $this->data_model->get($params);
    //CHECK DOMNameList
    if ($get["results"][0] != "") {
      $this->data['title_page'] = "Detail socmed";
      $logo = $get['results'][0]->logo;
      $get["results"][0]->logo_old = $get['results'][0]->logo;
      $dir = BACKEND_IMAGE_UPLOAD_FOLDER . 'socmed/' . $get['results'][0]->id.'/';
      $image_dir_logo =  $dir.$logo;
      $check_thumb = check_if_empty($logo, $image_dir_logo);
      if($check_thumb == NO_IMG_NAME){
        $get["results"][0]->logo = BASE_URL.BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
      } else {
        $get["results"][0]->logo = BASE_URL . $dir.$check_thumb;
      }

      $this->data['records'] = $get['results'][0];
      parent::display('admin/socmed/detail','admin/socmed/function');
    } else {
      redirect('/admin/404');
    }
  }

  public function update(){
    $id = $this->input->post("id");
    $name = $this->input->post("name");
    $icon = $this->input->post("icon");
    $old_logo = $this->input->post("logo_old");
    $link = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $name));

    //CHECKNAME

    $params_data = new stdClass();
    $params_data->new_data = array(
      "name" => $name,
      "icon" => $icon,
      "update_at" => date('d-m-Y h:m')
    );
    $where = array("where_column" => 'id', "where_value" => $id);
    $params_data->where_tables = array($where);
    $params_data->table_update = 'socmed';
    $update = $this->data_model->update($params_data);
    $error = [];
    if (isset($_FILES["logo_new"])) {
      if (!empty($_FILES["logo_new"]["name"])) {
        $upload_logo = image_upload(array($_FILES["logo_new"]), "assets/images/backend/socmed/" . $id . "/");
        if ($upload_logo->response == OK_STATUS) {
          $image_logo_name = $upload_logo->data[0];
          if ($old_logo != "") {
            $remove_old = unlink('./assets/images/backend/socmed/' . $id . '/' . $old_logo);
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

    $params_update = new stdClass();
    $params_update->new_data = array("logo" => $image_logo_name);
    $where = array("where_column" => 'id', "where_value" => $id);
    $params_update->where_tables = array($where);
    $params_update->table_update = 'socmed';
    $update_logo_cover = $this->data_model->update($params_update);
    if ($update['response'] == OK_STATUS ) {
      //            $result = response_success();
      $params = new stdClass();
      if ($error) {
        $params->response = FAIL_STATUS;
        $params->message = "Peringatan";
        $params->data = array('link' => base_url() . 'admin/tpq/detail/' . $link);
        $params->data = $error;
      } else {
        $params->response = OK_STATUS;
        $params->message = OK_MESSAGE;
        $params->data = array('link' => base_url() . 'admin/socmed/' . $id);
      }
      $result = response_custom($params);
    } else {
      $result = response_fail();
    }
    echo json_encode($result);
  }


  public function delete(){
    $id = $this->input->post("id");

    $params_delete = new stdClass();
    $where1 = array("where_column" => 'socmed_id', "where_value" => $id);
    $params_delete->where_tables = array($where1);
    $params_delete->table = 'merchant_socmed';
    $delete = $this->data_model->delete($params_delete);


    $params_delete = new stdClass();
    $where1 = array("where_column" => 'socmed_id', "where_value" => $id);
    $params_delete->where_tables = array($where1);
    $params_delete->table = 'site_socmed';
    $delete = $this->data_model->delete($params_delete);



    $params_delete = new stdClass();
    $where1 = array("where_column" => 'id', "where_value" => $id);
    $params_delete->where_tables = array($where1);
    $params_delete->table = 'socmed';
    $delete = $this->data_model->delete($params_delete);



    $dir = BACKEND_IMAGE_UPLOAD_FOLDER.'socmed/'.$id.'/';
    $files = glob($dir.'*');

    foreach($files as $file){
      $unlink_files = unlink($file);
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
