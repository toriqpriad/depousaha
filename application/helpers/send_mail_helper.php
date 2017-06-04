<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function send_mail($params) {
    $ci = & get_instance();
    $config = array();
    $config['useragent'] = 'Codeigniter';
    $config['protocol'] = "smtp";
    $config['smtp_host'] = "ssl://smtp.gmail.com";
    $config['smtp_port'] = "465";
    $config['smtp_user'] = MAIN_EMAIL;
    $config['smtp_pass'] = MAIN_EMAIL_PASSWORD;
    $config['charset'] = "utf-8";
    $config['mailtype'] = "html";
    $config['newline'] = "\r\n";
    $config['wordwrap'] = TRUE;
    $ci->email->initialize($config);
    $ci->email->from(MAIN_EMAIL, MAIN_EMAIL_NAME);
    $ci->email->to($params->email_destination);
    $ci->email->subject($params->email_subject);
    $ci->email->message($params->email_message);
    $send = $ci->email->send();
    if ($send) {
        $ci->load->model('log_mail_model');
        $params_add = array("code" => $params->code,
            "event" => $params->event,
            "destination" => $params->email_destination,
            "subject" => $params->email_subject,
            "message" => $params->email_message,
            "created_by" => $params->email_destination
        );
        $insert_log = $ci->log_mail_model->add($params_add);
        $status = OK_STATUS;
    } else {
        $status = FAIL_STATUS;
    }

    return $status;
}

