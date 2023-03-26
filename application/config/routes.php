<?php
defined('BASEPATH') or exit('No direct script access allowed');
 
$route['default_controller'] = 'index';
// $route['admin'] = 'admin/login';
// $route['index/products'] = 'products';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['forgot-password'] = 'Index/forgot_password';
$route['login'] = 'index/login';
$route['register'] = 'index/register';
$route['privacy_policy'] = 'Index/privacypolicy';

$route['shipping_policy'] = 'Index/shipping_policy';
$route['about'] = 'Index/about';

$route['login'] = 'index/login';
$route['contact'] = 'Index/contact';

$route['faq'] = 'Index/faq';
$route['profile'] = 'Index/profile';

$route['faq'] = 'Index/faq';
$route['terms_condition'] = 'Index/terms_condition';
$route['returnPolicy'] = 'Index/returnPolicy';
$route['cart-list'] = 'Index/cart_list';



$route['shop_by_category'] = 'Index/shop_by_category';
$route['product'] = 'Index/product';

$route['checkout'] = 'Index/cart_checkout';


$route['upload-list'] = 'Index/upload_product_list';

$route['orders'] = 'Index/orders';
$route['logout'] = 'Index/logout';
