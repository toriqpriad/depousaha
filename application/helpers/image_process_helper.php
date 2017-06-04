<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function image_upload($image_form, $images_count, $upload_path) {
    $ci = & get_instance();
    $ci->load->helper('key_helper');
    $config = array();
    $config['upload_path'] = $upload_path;
    $config['allowed_types'] = 'jpeg|jpg|png';
    $config['max_size'] = '5000';
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
            $images[] = $images_data;
        } else {
            $images[] = "";
        }
    }
    return $images;
}

function access() {
    $ci = & get_instance();
    $from = $ci->input->get_request_header('access_from');
    return $from;
}

function empty_check($fill, $title) {
    $ci = & get_instance();
    $ci->load->helper('rest_response_helper');
    $params = new stdClass();
    if ($fill == '') {
        $params->response = FAIL_STATUS;
        $params->message = $title . ' is required';
        $params->data = "";
        $out = response_custom($params);
        echo json_encode($out);
        exit();
    }
}
