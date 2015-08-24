<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller']             = 'home';
$route['gioi-thieu']                     = 'about';
$route['lien-he']                        = 'contact';
$route['hang-moi-ve']                    = 'product/new_products_go';
$route['hang-moi-ve/(:num)']             = 'product/new_products_go/$1';
$route['mua-hang/(:any)']                = 'product/order/$1/$2';
$route['xem-nhieu']                      = 'product/top_view_product';
$route['xem-nhieu/(:num)']               = 'product/top_view_product/$1';
$route['ban-chay']                       = 'product/sell_product';
$route['ban-chay/(:num)']                = 'product/sell_product/$1';
$route['([a-zA-Z0-9-_]+)n(:num)']        = 'news/detail/(:num)';
$route['danh-muc/(:any)']                = 'product/category/$1';
$route['danh-muc/(:any)/(:any)']         = 'product/category/$1/$2';
$route['([a-zA-Z0-9-_]+)c(:num)/(:num)'] = 'product/category/(:num)/(:num)';
$route['tin-tuc']                        = 'news/index';
$route['tin-tuc/(:any)']                 = 'news/detail/$1';
$route['xac-nhan']                       = 'product/orderSuccess';
$route['404_override']                   = '';
$route['xac-nhan-don-hang']              = 'product/orderSuccess';

if (strpos($_SERVER['QUERY_STRING'], 'auth') === false) {
    $route['([a-zA-Z0-9-_]+)/(:any)']        = "product/detail/$1/$2";
}