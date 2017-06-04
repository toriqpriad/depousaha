<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function generate_key($length) {
    if ($length == "" OR empty($length) OR ! isset($length)) {
        $length = 10;
    }
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
