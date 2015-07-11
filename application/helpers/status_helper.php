<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('get_order_status')) 
{
	function get_order_status($status = -2) 
	{
	    switch ($status) {
	    	case 0:
	    		return "Chưa xử lý";
	    		break;
	    	case 1:
	    		return "Đã xử lý";
	    		break;
	    	case -1:
	    		return "Đã hủy";
	    		break;
	    	default:
	    		return "Chưa xác định";
	    		break;
	    }
	}
}
	
/* End of file status_helper.php */
/* Location: ./helpers/status_helper.php */
