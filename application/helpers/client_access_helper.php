<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


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
