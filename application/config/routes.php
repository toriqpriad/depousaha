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

//ADMIN merchant_promo
$route['admin/merchant_promo'] = 'admin/merchant_promo/index';
$route['admin/merchant_promo/json'] = 'admin/merchant_promo/json';
$route['admin/merchant_promo/add'] = 'admin/merchant_promo/add';
$route['admin/merchant_promo/post'] = 'admin/merchant_promo/post';
$route['admin/merchant_promo/update'] = 'admin/merchant_promo/update';
$route['admin/merchant_promo/delete'] = 'admin/merchant_promo/delete';
$route['admin/merchant_promo/(:any)'] = 'admin/merchant_promo/detail';

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

//ADMIN gallery
$route['admin/gallery'] = 'admin/gallery/index';
$route['admin/gallery/json'] = 'admin/gallery/json';
$route['admin/gallery/add'] = 'admin/gallery/add';
$route['admin/gallery/post'] = 'admin/gallery/post';
$route['admin/gallery/update'] = 'admin/gallery/update';
$route['admin/gallery/delete'] = 'admin/gallery/delete';
$route['admin/gallery/(:any)'] = 'admin/gallery/detail';

//ADMIN slider
$route['admin/slider'] = 'admin/slider/index';
$route['admin/slider/json'] = 'admin/slider/json';
$route['admin/slider/add'] = 'admin/slider/add';
$route['admin/slider/post'] = 'admin/slider/post';
$route['admin/slider/update'] = 'admin/slider/update';
$route['admin/slider/delete'] = 'admin/slider/delete';
$route['admin/slider/(:any)'] = 'admin/slider/detail';


//ADMIN testimoni
$route['admin/testimoni'] = 'admin/testimoni/index';
$route['admin/testimoni/json'] = 'admin/testimoni/json';
$route['admin/testimoni/add'] = 'admin/testimoni/add';
$route['admin/testimoni/post'] = 'admin/testimoni/post';
$route['admin/testimoni/update'] = 'admin/testimoni/update';
$route['admin/testimoni/delete'] = 'admin/testimoni/delete';
$route['admin/testimoni/(:any)'] = 'admin/testimoni/detail';

//setting
$route['admin/setting'] = 'admin/setting/index';
$route['admin/setting/update'] = 'admin/setting/update';
$route['admin/setting/change_password'] = 'admin/setting/change_password';




//front
$route['notfound'] = 'front/front/notfound';
