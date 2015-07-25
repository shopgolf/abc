<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Dev by Mr Phuc - nguyenvanphuc0626@gmail.com
 */

$route['default_controller']            = 'home';
$route['gioi-thieu']                    = 'about';
$route['lien-he']                       = 'contact';
$route['dang-nhap']                     = 'member';
$route['dang-ky']                       = 'member/registered';
$route['so-sanh']                       = 'compare';
$route['hang-moi-ve']                   = 'product/new_products_go';
$route['gio-hang']						= 'product/order';	
$route['thanh-toan']					= 'product/checkout';
$route['xem-nhieu']						= 'product/top_view_product';
$route['ban-chay']						= 'product/sell_product';
$route['tin-tuc']						= 'news';
$route['404_override']            	    = '';