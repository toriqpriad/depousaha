<?php

include 'Admin.php';

class merchant extends admin {

  function __construct() {
    parent::__construct();
    parent::checkauth();
    $this->data['active_page'] = "merchant";
  }

  //Data on Page
  public function index() {
    $this->data['title_page'] = "Data Merchant";
    $dest_table_as = 'merchant as m';
    $select_values = array('m.*');
    $params = new stdClass();
    $params->dest_table_as = $dest_table_as;
    $params->select_values = $select_values;
    $get = $this->data_model->get($params);
    if ($get['results'] != "") {
      $this->data['records'] = array("status" => 'available', "data" => $get['results']);
    } else {
      $this->data['records'] = array("status" => 'empty');
    }
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
        $upload_logo = image_upload($_FILES["logo"], '1', $merchant_dir . "/logo/");
        $image_logo_name = $upload_logo['data'][0];
      } else {
        $image_logo_name = "";
      }
    } else {
      $image_logo_name = "";
    }
    if (isset($_FILES["cover"])) {
      if ($_FILES["cover"] != "") {
        $upload_cover = image_upload($_FILES["cover"], '1',$merchant_dir. "/cover/");
        $image_cover_name = $upload_cover['data'][0];
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
      $data = array("link" => base_url() . 'admin/merchant/detail/' . $link);
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
      // $params->join_tables = array(array("join_with" => 'tb_tpq as t', "join_on" => 'p.id_tpq = t.id', "join_type" => ''));
      // $params->where_tables = array(array("where_column" => 'p.link', "where_value" => $parameter));
      $get = $this->data_model->get($params);
      if ($get["results"][0] != "") {
          $this->data['title_page'] = "Detail Merchant";
          $this->data['records'] = $get['results'][0];
          parent::display('admin/merchant/detail','admin/merchant/function');
      } else {
          redirect('/admin/404');
      }
  }



}
