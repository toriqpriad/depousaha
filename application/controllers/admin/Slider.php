<?php

include 'Admin.php';

class slider extends admin {

  function __construct() {
    parent::__construct();
    parent::checkauth();
    $this->data['active_page'] = "slider";
  }
  public function json(){
    $dest_table_as = 'slider as s';
    $select_values = array('s.*');
    $params = new stdClass();
    $params->dest_table_as = $dest_table_as;
    $params->select_values = $select_values;
    $get = $this->data_model->get($params);
    echo json_encode(array("data" => $get['results']));
  }
  //Data on Page
  public function index() {
    $this->data['title_page'] = "Slider";
    parent::display('admin/slider/index','admin/slider/function',TRUE);
  }


  public function add() {
    $this->data['title_page'] = "Tambah Slider";
    parent::display('admin/slider/add','admin/slider/function',FALSE);
  }

  public function post(){
    $name = $this->input->post("name");
    $link = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $name));

    $params_data = array(
      "name" => $name,
      "update_at" => date('d-m-Y h:m')
    );
    $dest_table = 'slider';
    $add = $this->data_model->add($params_data, $dest_table);
    $slider_id = $add["data"];
    $slider_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'slider/'.$slider_id;
    $create_dir = mkdir($slider_dir);

    if (isset($_FILES["image"])) {
      if ($_FILES["image"] != "") {
        $upload = image_upload(array($_FILES["image"]), $slider_dir . "/");
        $image_name = $upload->data[0];
      } else {
        $image_name = "";
      }
    } else {
      $image_name = "";
    }

    $params_update = new stdClass();
    $params_update->new_data = array("image" => $image_name);
    $params_update->table_update = 'slider';
    $where = array("where_column" => 'id', "where_value" => $slider_id);
    $params_update->where_tables = array($where);
    $update_logo_cover = $this->data_model->update($params_update);
    if ($add['response'] == OK_STATUS) {
      $data = array("link" => base_url() . 'admin/slider/' . $slider_id);
      $result = get_success($data);
    } else {
      $result = response_fail();
    }

    echo json_encode($result);

  }

  public function detail(){
    $parameter = $this->uri->segment(3);
    $params = new stdClass();
    $params->dest_table_as = 'slider as s';
    $params->select_values = array('s.*');
    $params->where_tables = array(array("where_column" => 's.id', "where_value" => $parameter));
    $get = $this->data_model->get($params);
    //CHECK DOMNameList
    if ($get["results"][0] != "") {
      $this->data['title_page'] = $get['results'][0]->name;
      $img = $get['results'][0]->image;
      $get["results"][0]->img_old = $get['results'][0]->image;
      $dir = BACKEND_IMAGE_UPLOAD_FOLDER . 'slider/' . $get['results'][0]->id.'/';
      $image_dir =  $dir.$img;
      $check_thumb = check_if_empty($img, $image_dir);
      if($check_thumb == NO_IMG_NAME){
        $get["results"][0]->img = BASE_URL.BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.png';
      } else {
        $get["results"][0]->img = BASE_URL . $dir.$check_thumb;
      }

      $this->data['records'] = $get['results'][0];
      parent::display('admin/slider/detail','admin/slider/function');
    } else {
      redirect('/admin/404');
    }
  }

  public function update(){
    $id = $this->input->post("id");
    $name = $this->input->post("name");
    $old_img = $this->input->post("img_old");
    $link = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $name));

    //CHECKNAME

    $params_data = new stdClass();
    $params_data->new_data = array(
      "name" => $name,
      "update_at" => date('d-m-Y h:m')
    );
    $where = array("where_column" => 'id', "where_value" => $id);
    $params_data->where_tables = array($where);
    $params_data->table_update = 'slider';
    $update = $this->data_model->update($params_data);
    $error = [];
    if (isset($_FILES["img_new"])) {
      if (!empty($_FILES["img_new"]["name"])) {
        $upload = image_upload(array($_FILES["img_new"]), "assets/images/backend/slider/" . $id . "/");
        if ($upload->response == OK_STATUS) {
          $image_name = $upload->data[0];
          if ($old_img != "") {
            $remove_old = unlink('./assets/images/backend/slider/' . $id . '/' . $old_img);
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
        $image_name = $old_img;
      }
    } else {
      $image_name = $old_img;
    }

    $params_update = new stdClass();
    $params_update->new_data = array("image" => $image_name);
    $where = array("where_column" => 'id', "where_value" => $id);
    $params_update->where_tables = array($where);
    $params_update->table_update = 'slider';
    $update_logo_cover = $this->data_model->update($params_update);
    if ($update['response'] == OK_STATUS ) {
      $params = new stdClass();
      if ($error) {
        $params->response = FAIL_STATUS;
        $params->message = "Peringatan";
        $params->data = array('link' => base_url() . 'admin/slider/' . $id);
        $params->data = $error;
      } else {
        $params->response = OK_STATUS;
        $params->message = OK_MESSAGE;
        $params->data = array('link' => base_url() . 'admin/slider/' . $id);
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
    $where1 = array("where_column" => 'id', "where_value" => $id);
    $params_delete->where_tables = array($where1);
    $params_delete->table = 'slider';
    $delete = $this->data_model->delete($params_delete);    
    if ($delete['response'] == OK_STATUS) {
      $result = response_success();
    } else {
      $result = response_fail();
    }
    echo json_encode($result);
  }


}
