<?php

include 'Admin.php';

class merchant_promo extends admin {

  function __construct() {
    parent::__construct();
    parent::checkauth();
    $this->data['active_page'] = "merchant_promo";
  }
  public function json(){
    $params = new stdClass();
    $dest_table_as = 'merchant_promo as mp';
    $select_values = array('mp.*','mc.link as merchant_link');
    $join1 = array("join_with" => 'merchant as mc', "join_on" => 'mp.merchant_id = mc.id', "join_type" => '');
    $params->dest_table_as = $dest_table_as;
    $params->select_values = $select_values;
    $params->join_tables = array($join1);
    $get = $this->data_model->get($params);
    foreach($get['results'] as $each){
      if($each->active == "Y"){
          $each->active = 'Ya';
      } else {
          $each->active = 'Tidak';
      }
    }
    echo json_encode(array("data" => $get['results']));
  }
  //Data on Page
  public function index() {
    $this->data['title_page'] = "Merchant Promo";
    parent::display('admin/merchant_promo/index','admin/merchant_promo/function',TRUE);
  }


  public function add() {

    $dest_table_as = 'merchant as m';
    $select_values = array('m.id as id','m.name as name');
    $params = new stdClass();
    $params->dest_table_as = $dest_table_as;
    $params->select_values = $select_values;
    $get = $this->data_model->get($params);
    $this->data['merchant_options'] = $get['results'];
    $this->data['title_page'] = "Tambah Merchant Promo";
    parent::display('admin/merchant_promo/add','admin/merchant_promo/function',FALSE);
  }

  public function post(){
    $name = $this->input->post("name");
    $merchant_id = $this->input->post("merchant_id");
    $url = $this->input->post("url");
    $desc = $this->input->post("desc");
    $link = strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $name)).".html";
    $params_data = array(
      "name" => $name,
      "merchant_id" => $merchant_id,
      "link" => $link,
      "url" => $url,
      "description" => $desc,
      "update_at" => date('d-m-Y')
    );
    $dest_table = 'merchant_promo';
    $add = $this->data_model->add($params_data, $dest_table);
    $merchant_promo_id = $add["data"];
    $merchant_promo_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'merchant/'.$merchant_id.'/promo/'.$merchant_promo_id;
    $create_dir = mkdir($merchant_promo_dir);

    if (isset($_FILES["img"])) {
      if ($_FILES["img"] != "") {
        $upload = image_upload(array($_FILES["img"]), $merchant_promo_dir . "/");
        $image_name = $upload->data[0];
      } else {
        $image_name = "";
      }
    } else {
      $image_name = "";
    }

    $params_update = new stdClass();
    $params_update->new_data = array("image" => $image_name);
    $params_update->table_update = 'merchant_promo';
    $where = array("where_column" => 'id', "where_value" => $merchant_promo_id);
    $params_update->where_tables = array($where);
    $update_logo_cover = $this->data_model->update($params_update);
    if ($add['response'] == OK_STATUS) {
      $data = array("link" => base_url() . 'admin/merchant_promo/' . $merchant_promo_id);
      $result = get_success($data);
    } else {
      $result = response_fail();
    }
    echo json_encode($result);

  }

  public function detail(){
    $parameter = $this->uri->segment(3);
    $params = new stdClass();
    $params->dest_table_as = 'merchant_promo as m';
    $params->select_values = array('m.*');
    $params->where_tables = array(array("where_column" => 'm.id', "where_value" => $parameter));
    $get = $this->data_model->get($params);
    //CHECK DOMNameList
    if ($get["results"][0] != "") {
      $this->data['title_page'] = $get["results"][0]->name;
      $img = $get['results'][0]->image;
      $get["results"][0]->image_old = $get['results'][0]->image;
      $dir = $merchant_promo_dir = BACKEND_IMAGE_UPLOAD_FOLDER.'merchant/'.$get['results'][0]->merchant_id.'/promo/'.$parameter.'/';
      $image_dir =  $dir.$img;
      $check_thumb = check_if_empty($img, $image_dir);
      if($check_thumb == NO_IMG_NAME){
        $get["results"][0]->image = BASE_URL.BACKEND_IMAGE_UPLOAD_FOLDER.'noimg.PNG';
      } else {
        $get["results"][0]->image = BASE_URL . $dir.$check_thumb;
      }

      $this->data['records'] = $get['results'][0];
      $dest_table_as = 'merchant as m';
      $select_values = array('m.id as id','m.name as name');
      $params = new stdClass();
      $params->dest_table_as = $dest_table_as;
      $params->select_values = $select_values;
      $get = $this->data_model->get($params);
      $this->data['merchant_options'] = $get['results'];
      parent::display('admin/merchant_promo/detail','admin/merchant_promo/function');
    } else {
      redirect('/admin/404');
    }
  }

  public function update(){
    $id = $this->input->post("id");
    $name = $this->input->post("name");
    $merchant_id = $this->input->post("merchant_id");
    $merchant_last_id = $this->input->post("merchant_last_id");
    $url = $this->input->post("url");
    $desc = $this->input->post("desc");
    $active = $this->input->post("active");
    $link = strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $name)).".html";
    $old_image = $this->input->post("image_old");

    //CHECKNAME

    $params_data = new stdClass();
    $params_data->new_data = array(
      "name" => $name,
      "merchant_id" => $merchant_id,
      "link" => $link,
      "url" => $url,
      "description" => $desc,
      "active" => $active,
      "update_at" => date('d-m-Y')
    );
    $where = array("where_column" => 'id', "where_value" => $id);
    $params_data->where_tables = array($where);
    $params_data->table_update = 'merchant_promo';
    $update = $this->data_model->update($params_data);
    $error = [];
    if (isset($_FILES["image_new"])) {
      if (!empty($_FILES["image_new"]["name"])) {
        $upload = image_upload(array($_FILES["image_new"]), "assets/images/backend/merchant/" . $merchant_id . "/promo/".$id."/");
        if ($upload->response == OK_STATUS) {
          $image_name = $upload->data[0];
          if ($old_image != "") {
              // $remove_old = unlink('./assets/images/backend/merchant/' . $merchant_last_id . '/promo/'.$id.'/'.$old_image);
          }
        } else {
          if ($upload->data['error']) {
            foreach ($upload->data['error'] as $er) {
              array_push($error, $er);
            }
          }
          $image_name = $old_image;
        }
      } else {
        $image_name = $old_image;
      }
    } else {
      $image_name = $old_image;
    }

    if($merchant_id != $merchant_last_id){
      $old_dir = "assets/images/backend/merchant/" . $merchant_last_id . "/promo/".$id."/";
      $new_dir = "assets/images/backend/merchant/" . $merchant_id . "/promo/".$id."/";
      $image_name = $old_image;
      $copy = image_move($new_dir,$old_dir,$image_name);
    }
    $params_update = new stdClass();
    $params_update->new_data = array("image" => $image_name);
    $where = array("where_column" => 'id', "where_value" => $id);
    $params_update->where_tables = array($where);
    $params_update->table_update = 'merchant_promo';
    $update_logo_cover = $this->data_model->update($params_update);
    if ($update['response'] == OK_STATUS ) {
      $params = new stdClass();
      if ($error) {
        $params->response = FAIL_STATUS;
        $params->message = "Peringatan";
        $params->data = array('link' => base_url() . 'admin/merchant_promo/' . $id);
        $params->data = $error;
      } else {
        $params->response = OK_STATUS;
        $params->message = OK_MESSAGE;
        $params->data = array('link' => base_url() . 'admin/merchant_promo/' . $id);
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
    $params_delete->table = 'merchant_promo';
    $delete = $this->data_model->delete($params_delete);
    if ($delete['response'] == OK_STATUS) {
      $result = response_success();
    } else {
      $result = response_fail();
    }
    echo json_encode($result);
  }


}
