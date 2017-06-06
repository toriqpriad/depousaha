<?php

include 'Admin.php';

class product_category extends admin {

  function __construct() {
    parent::__construct();
    parent::checkauth();
    $this->data['active_page'] = "product_category";
  }
  public function json(){
    $dest_table_as = 'product_category as pc';
    $select_values = array('pc.*');
    $params = new stdClass();
    $params->dest_table_as = $dest_table_as;
    $params->select_values = $select_values;
    $get = $this->data_model->get($params);
    echo json_encode(array("data" => $get['results']));
  }
  //Data on Page
  public function index() {
    $this->data['title_page'] = "Data Kategori Produk";
    parent::display('admin/product_category/index','admin/product_category/function',TRUE);
  }


  public function add() {
    $this->data['title_page'] = "Tambah Merchant";
    parent::display('admin/product_category/add','admin/product_category/function',FALSE);
  }

  public function post(){
    $name = $this->input->post("name");
    $desc = $this->input->post("desc");

    $params_data = array(
      "name" => $name,
      "description" => $desc,
      "update_at" => date('d-m-Y h:m')
    );
    $dest_table = 'product_category';
    $add = $this->data_model->add($params_data, $dest_table);
    $id = $add["data"];
    if($add){
      $link = base_url().'admin/product_category/'.$id;
      $data = array("link" => $link);
      echo json_encode(get_success($data));
    } else {
      echo json_encode(response_fail());
    }

  }

  public function detail(){
    $parameter = $this->uri->segment(3);
    $params = new stdClass();
    $params->dest_table_as = 'product_category as pc';
    $params->select_values = array('pc.*');
    $params->where_tables = array(array("where_column" => 'pc.id', "where_value" => $parameter));
    $get = $this->data_model->get($params);
    if ($get["results"][0] != "") {
      $this->data['title_page'] = $get['results'][0]->name;
      $this->data['records'] = $get['results'][0];
      parent::display('admin/product_category/detail','admin/product_category/function');
    } else {
      redirect('/admin/404');
    }
  }

  public function update(){
    $id = $this->input->post("id");
    $name = $this->input->post("name");
    $desc = $this->input->post("desc");
    $params_data = new stdClass();
    $params_data->new_data = array(
      "name" => $name,
      "description" => $desc,
      "update_at" => date('d-m-Y h:m')
    );
    $where = array("where_column" => 'id', "where_value" => $id);
    $params_data->where_tables = array($where);
    $params_data->table_update = 'product_category';
    $update = $this->data_model->update($params_data);
    if ($update['response'] == OK_STATUS ) {
      $link = base_url().'admin/product_category/'.$id;
      $data = array("link" => $link);
      $result = get_success($data);
    } else {
      $result = response_fail();
    }
    echo json_encode($result);
  }


  public function delete(){
    $link = $this->input->post("id");
    $params_delete = new stdClass();
    $where1 = array("where_column" => 'id', "where_value" => $link);
    $params_delete->where_tables = array($where1);
    $params_delete->table = 'product_category';
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
