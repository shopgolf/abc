<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller']             = 'home';
$route['gioi-thieu']                     = 'about';
$route['lien-he']                        = 'contact';
$route['dang-nhap']                      = 'member';
$route['dang-ky']                        = 'member/registered';
$route['so-sanh']                        = 'compare';
$route['hang-moi-ve']                    = 'product/new_products_go';
$route['hang-moi-ve/(:num)']             = 'product/new_products_go/$1';
$route['mua-hang/(:any)']                = 'product/order/$1/$2';	
$route['thanh-toan']                     = 'product/checkout';
$route['xem-nhieu']                      = 'product/top_view_product';
$route['xem-nhieu/(:num)']               = 'product/top_view_product/(:num)';
$route['ban-chay']                       = 'product/sell_product';
$route['ban-chay/(:num)']                = 'product/sell_product/(:num)';
$route['([a-zA-Z0-9-_]+)n(:num)']        = 'news/detail/(:num)';
$route['danh-muc/(:any)']                = 'product/category/$1';
$route['danh-muc/(:any)/(:any)']         = 'product/category/$1/$2';
$route['([a-zA-Z0-9-_]+)c(:num)/(:num)'] = 'product/category/(:num)/(:num)';
$route['tin-tuc']                        = 'news';
$route['404_override']                   = '';
$route['xac-nhan-don-hang']                     = 'product/orderSuccess';

if (strpos($_SERVER['QUERY_STRING'], 'auth') === false) {
    $route['([a-zA-Z0-9-_]+)/(:any)']        = "product/detail/$1/$2";
}