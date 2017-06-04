<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function response_custom($params) {
//    $results = array("response" => $params->response, "message" => $params->message, "data" => $params->data);
    return $params;
}

function get_success($data) {
    $response = OK_STATUS;
    $message = OK_MESSAGE;
    $results = array("response" => $response, "message" => $message, "data" => $data);
    return $results;
}

function get_not_found() {
    $response = NO_DATA_STATUS;
    $message = NO_DATA_MESSAGE;
    $results = array("response" => $response, "message" => $message);
    return $results;
}

function post_empty() {
    $response = EMPTY_POST_STATUS;
    $message = EMPTY_POST_MESSAGE;
    $results = array("response" => $response, "message" => $message);
    return $results;
}

function response_success() {
    $response = OK_STATUS;
    $message = OK_MESSAGE;
    $results = array("response" => $response, "message" => $message);
    return $results;
}

function response_fail() {
    $response = FAIL_STATUS;
    $message = FAIL_MESSAGE;
    $results = array("response" => $response, "message" => $message);
    return $results;
}

function clicked_status() {
    $response = FAIL_STATUS;
    $message = CLICKED_ACTION_MESSAGE;
    $results = array("response" => $response, "message" => $message);
    return $results;
}
