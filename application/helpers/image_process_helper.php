<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function image_upload($image_form, $images_count, $upload_path)
{
    $ci = & get_instance();
    $ci->load->helper('key_helper', 'rest_response_helper');
    $config = array();
    $config['upload_path'] = $upload_path;
    $config['allowed_types'] = 'jpeg|jpg|png';
    $config['max_size'] = '5000';
    $error = [];
    for ($i = 0; $i < $images_count; $i++) {
        $_FILES['img']['name_first'] = $image_form['name'];
        $_FILES['img']['extension'] = pathinfo($_FILES['img']['name_first'], PATHINFO_EXTENSION);
        $_FILES['img']['name'] = generate_key('6') . '.' . $_FILES['img']['extension'];
        $_FILES['img']['type'] = $image_form['type'];
        $_FILES['img']['tmp_name'] = $image_form['tmp_name'];
        $_FILES['img']['error'] = $image_form['error'];
        $_FILES['img']['size'] = $image_form['size'];
        $load = $ci->load->library('upload', $config);
        $initialize = $ci->upload->initialize($config);
        $upload = $ci->upload->do_upload('img');
        if ($upload) {
            $img = $_FILES['img']['name'];
            $images_data = $img;
            $images = array($images_data);
        } else {
            $error_message = $ci->upload->display_errors();
            $push_error = array_push($error, $error_message);
            $images[] = "";
        }
    }
    if (count($error) > 0) {
        $params = new stdClass();
        $params->response =  NO_DATA_STATUS;
        $params->message = "Proses upload tidak lengkap";
        $params->data = array("error" => $error, "success" => $images);
        $return_data = response_custom($params);
    } else {
        $return_data = get_success($images);
    }
    return $return_data;
}

function check_if_empty($image, $image_dir)
{
    //    IMAGE_DIR IS NOT URL
    if (isset($image)) {
        if ($image != "") {
            $check_thumb = file_exists($image_dir);
            if (!$check_thumb) {
                $src = BACKEND_IMAGE_DIRECTORY . 'noimg.png';
            } else {
                $src = $image_dir;
            }
        } else {
            $src = BACKEND_IMAGE_DIRECTORY . 'noimg.png';
        }
    } else {
        $src = BACKEND_IMAGE_DIRECTORY . 'noimg.png';
    }

    return $src;
}
