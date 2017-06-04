<?php

include 'Admin.php';

class setting extends admin {

    function __construct() {
        parent::__construct();
        parent::checkauth();
        $this->data['active_page'] = "setting";
    }

    //Data on Page
    public function website() {
        $this->data['title_page'] = "Website";
        $dest_table_as = 'setting_website as sw';
        $select_values = array('sw.*');
        $params = new stdClass();
        $params->dest_table_as = $dest_table_as;
        $params->select_values = $select_values;
        $get = $this->data_model->get($params);
        if ($get['results'] != "") {
            $this->data['detail'] = $get['results'][0];
        } else {
            $this->data['detail'] = '';
        }
        $this->load->view('admin/setting/website', $this->data);
    }

    public function account() {
        $this->data['title_page'] = "Login Account";
        $dest_table_as = 'user as u';
        $select_values = array('u.*');
        $params = new stdClass();
        $params->dest_table_as = $dest_table_as;
        $params->select_values = $select_values;
        $get = $this->data_model->get($params);
        if ($get['results'] != "") {
            $this->data['detail'] = $get['results'][0];
        } else {
            $this->data['detail'] = '';
        }
        $this->load->view('admin/setting/account', $this->data);
    }

    public function update_website() {
        $id = $this->input->post("id");
        $name = $this->input->post("name");
        $description = $this->input->post("description");
        $address = $this->input->post("address");
        $city = $this->input->post("city");
        $contact = $this->input->post("contact");
        $moto = $this->input->post("moto");
        $old_logo = $this->input->post("old_logo");
        if (isset($_FILES['logo'])) {
            if ($_FILES['logo']['name'] != "") {
                $upload = image_upload($_FILES['logo'], '1', "assets/images/backend/profile/");
                $image_name = $upload[0];
                if ($old_logo != "") {
                    $old_dir = './assets/images/backend/profile/' . $old_logo;
                    $remove = unlink('./assets/images/backend/profile/' . $old_logo);
                }
            } else {
                $image_name = "";
            }
        }

        $params_data = new stdClass();
        if (isset($image_name)) {
            $params_data->new_data = array(
                "name" => $name,
                "description" => $description,
                "address" => $address,
                "contact" => $contact,
                "city" => $city,
                "moto" => $moto,
                "logo" => $image_name,
            );
        } else {
            $params_data->new_data = array(
                "name" => $name,
                "description" => $description,
                "address" => $address,
                "city" => $city,
                "contact" => $contact,
                "moto" => $moto,
            );
        }
        $where = array("where_column" => 'id', "where_value" => $id);
        $params_data->where_tables = array($where);
        $params_data->table_update = 'setting_website';
        $update = $this->data_model->update($params_data);


        if ($update['response'] == OK_STATUS) {
            $data = array("link" => base_url() . 'admin/setting/website');
            $result = get_success($data);
        } else {
            $result = response_fail();
        }
        echo json_encode($result);
    }

    public function update_account_password() {
        $input = json_decode(file_get_contents('php://input'));
        $last_password = $input->last_password;
        $new_password = $input->new_password;
        $dest_table_as = 'user as u';
        $select_values = array('u.password');
        $params = new stdClass();
        $params->dest_table_as = $dest_table_as;
        $params->select_values = $select_values;
        $where1 = array("where_column" => 'u.role', "where_value" => "A");
        $params->where_tables = array($where1);
        $get = $this->data_model->get($params);
        if ($get['response'] == OK_STATUS) {
            if ($last_password != $get['results'][0]->password) {
                $response_data = array("response" => FAIL_STATUS, "message" => "Password lama tidak sesuai");
            } else {
                $params_data = new stdClass();
                $params_data->new_data = array("password" => $new_password);
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

    public function update_account_email() {
        $input = json_decode(file_get_contents('php://input'));
        $email = $input->email;
        $params_data = new stdClass();
        $params_data->new_data = array("email" => $email);
        $where = array("where_column" => 'role', "where_value" => "A");
        $params_data->where_tables = array($where);
        $params_data->table_update = 'user';
        $update = $this->data_model->update($params_data);
        if ($update["response"] == OK_STATUS) {
            $response_data = response_success();
        } else {
            $response_data = response_fail();
        }
        echo json_encode($response_data);
    }

}
