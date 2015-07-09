<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('render_uri')){
	function render_uri($uri){		
		$ci = & get_instance();
		$ci->load->library('gosu/gosu_authenticate', 'gosu_authenticate');
		if(isset($_SESSION['user_info'])){
			return $uri;
		}

		$zone = '';
		if(!empty($_SESSION['zone'])) {
			$zone = "|{$_SESSION['zone']}";
		}
	
		if($uri==site_url('teaser/logout').'?returnURL='.site_url('tai-khoan/kich-hoat')){
			return $ci->gosu_authenticate->authorize(site_url('tai-khoan/kich-hoat').$zone, site_url('authenticate'))."&popup=true\" rel=\"duo-popup-login";
		}		
		
		return $ci->gosu_authenticate->authorize($uri.$zone, site_url('authenticate'))."&popup=true\" rel=\"duo-popup-login";
	}	
	
}

/* End of file paging_helper.php */
/* Location: ./helpers/paging_helper.php */