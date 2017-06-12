<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//front
$route['default_controller'] = 'welcome/index';
//$route['404_override'] = 'welcome/not_found';
$route['translate_uri_dashes'] = FALSE;
//AUTH
$route['checkwebtoken'] = 'authentication/authentication/checkwebtoken';
$route['admin_submit_login'] = 'authentication/authentication/admin_submit_login';
$route['admin/logout'] = 'authentication/authentication/logout';
$route['login'] = 'authentication/authentication/login';
$route['logout'] = 'authentication/authentication/logout';

//DASHBOARD
$route['admin'] = 'admin/admin/dashboard';
$route['admin/login'] = 'authentication/authentication/admin_login';
$route['admin/404'] = 'admin/admin/notfound';

// ADMIN merchant
$route['admin/merchant'] = 'admin/merchant/index';
$route['admin/merchant/json'] = 'admin/merchant/json';
$route['admin/merchant/add'] = 'admin/merchant/add';
$route['admin/merchant/post'] = 'admin/merchant/post';
$route['admin/merchant/update'] = 'admin/merchant/update';
$route['admin/merchant/delete'] = 'admin/merchant/delete';
$route['admin/merchant/(:any)'] = 'admin/merchant/detail';

// ADMIN PRODUCT Category
$route['admin/product_category'] = 'admin/product_category/index';
$route['admin/product_category/json'] = 'admin/product_category/json';
$route['admin/product_category/add'] = 'admin/product_category/add';
$route['admin/product_category/post'] = 'admin/product_category/post';
$route['admin/product_category/update'] = 'admin/product_category/update';
$route['admin/product_category/delete'] = 'admin/product_category/delete';
$route['admin/product_category/(:any)'] = 'admin/product_category/detail';


//ADMIN SOCMED
$route['admin/socmed'] = 'admin/socmed/index';
$route['admin/socmed/json'] = 'admin/socmed/json';
$route['admin/socmed/add'] = 'admin/socmed/add';
$route['admin/socmed/post'] = 'admin/socmed/post';
$route['admin/socmed/update'] = 'admin/socmed/update';
$route['admin/socmed/delete'] = 'admin/socmed/delete';
$route['admin/socmed/(:any)'] = 'admin/socmed/detail';

//ADMIN product
$route['admin/product'] = 'admin/product/index';
$route['admin/product/json'] = 'admin/product/json';
$route['admin/product/add'] = 'admin/product/add';
$route['admin/product/post'] = 'admin/product/post';
$route['admin/product/update'] = 'admin/product/update';
$route['admin/product/delete'] = 'admin/product/delete';
$route['admin/product/(:any)'] = 'admin/product/detail';

//setting
$route['admin/setting/website'] = 'admin/setting/website';
$route['admin/setting/account'] = 'admin/setting/account';
$route['admin/setting/update_website'] = 'admin/setting/update_website';
$route['admin/setting/update_account_password'] = 'admin/setting/update_account_password';
$route['admin/setting/update_account'] = 'admin/setting/update_account';
$route['admin/test'] = 'admin/admin/test';



//front
$route['notfound'] = 'front/front/notfound';
