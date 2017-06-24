<?php

/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

function make_pagination($url,$total,$per_page,$uri_segment){

  $ci = & get_instance();
  $ci->load->library("pagination");
  $config = array();
  $config["base_url"] = $url;
  $config["total_rows"] = $total;
  $config["per_page"] = $per_page;
  $config["uri_segment"] = $uri_segment;
  $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
  $config['full_tag_close'] ="</ul>";
  $config['num_tag_open'] = '<li>';
  $config['num_tag_close'] = '</li>';
  $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
  $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
  $config['next_tag_open'] = "<li>";
  $config['next_tagl_close'] = "</li>";
  $config['prev_tag_open'] = "<li>";
  $config['prev_tagl_close'] = "</li>";
  $config['first_tag_open'] = "<li>";
  $config['first_tagl_close'] = "</li>";
  $config['last_tag_open'] = "<li>";
  $config['last_tagl_close'] = "</li>";
  $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
  $config['full_tag_close'] ="</ul>";
  $config['num_tag_open'] = '<li>';
  $config['num_tag_close'] = '</li>';
  $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
  $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
  $config['next_tag_open'] = "<li>";
  $config['next_tagl_close'] = "</li>";
  $config['prev_tag_open'] = "<li>";
  $config['prev_tagl_close'] = "</li>";
  $config['first_tag_open'] = "<li>";
  $config['first_tagl_close'] = "</li>";
  $config['last_tag_open'] = "<li>";
  $config['last_tagl_close'] = "</li>";  
  $ci->pagination->initialize($config);
  $pagination = $ci->pagination->create_links();

  return $pagination;
}
