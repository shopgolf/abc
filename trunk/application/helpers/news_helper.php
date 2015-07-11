<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
// --------------------------------------------------------------------
if (!function_exists('truncate') ){
    function truncate($text, $limit = 20, $details = '...') {
       if(strlen($text) < $limit) {
	        return $text;
       }
	   $uid = uniqid();
	   return array_shift(explode($uid, wordwrap($text, $limit, $uid))) . $details;
    }
}

/* End of file news_helper.php */
/* Location: ./helpers/news_helper.php */