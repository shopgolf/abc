<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function bootstrap_paging($url = '', $total, $per_page = 10, $uri_segment = 4, $num_links = 4) {
	$config 					= array();
	$config['base_url']         = $url;
	$config['total_rows']       = $total;
	$config['per_page']         = $per_page;
	$config['full_tag_open']    = '<div class="pagination"><ul>';
	$config['full_tag_close']   = '</ul></div>';
	$config['first_link']       = '&larr; First';
	$config['last_link']        = 'Last &rarr;';
	$config['first_tag_open']   = '<li>';
	$config['first_tag_close']  = '</li>';
	$config['prev_link']        = 'Previous';
	$config['prev_tag_open']    = '<li class="prev">';
	$config['prev_tag_close']   = '</li>';
	$config['next_link']        = 'Next';
	$config['next_tag_open']    = '<li>';
	$config['next_tag_close']   = '</li>';
	$config['last_tag_open']    = '<li>';
	$config['last_tag_close']   = '</li>';
	$config['cur_tag_open']     = '<li class="active"><a href="#">';
	$config['cur_tag_close']    = '</a></li>';
	$config['num_tag_open']     = '<li>';
	$config['num_tag_close']    = '</li>';
	$config['num_links']        = $num_links;
	$config['uri_segment'] 		= $uri_segment;
	return $config;
}

function paging($url = '', $total, $per_page = 10, $uri_segment = 4, $num_links = 4) {	
	$config 					= array();
	$config['base_url']         = $url;
	$config['total_rows']       = $total;
	$config['per_page']         = $per_page;
	$config['full_tag_open']    = '<div class="padding"><ul class="padding-ul" >';
	$config['full_tag_close']   = '</div></ul>';
	$config['first_link']       = '';//&larr; First
	$config['last_link']        = '';//Last &rarr;
	$config['first_tag_open']   = '<li class="padding-li first" onclick="go_page(this);return false;">';
	$config['first_tag_close']  = ' </li>';
	$config['prev_link']        = '';//Previous
	$config['prev_tag_open']    = '<li class="padding-li back" onclick="go_page(this);return false;">';
	$config['prev_tag_close']   = '</li>';
	$config['next_link']        = '';//next
	$config['next_tag_open']    = '<li class="padding-li next" onclick="go_page(this);return false;"> ';
	$config['next_tag_close']   = '</li>';
	$config['last_tag_open']    = '<li class="padding-li la" onclick="go_page(this);return false;"> ';
	$config['last_tag_close']   = '</li>';
	$config['cur_tag_open']     = '<li class="padding-li" ><a class="active" href="#">';
	$config['cur_tag_close']    = '</a></li>';
	$config['num_tag_open']     = '<li class="padding-li" onclick="go_page(this);return false;">';
	$config['num_tag_close']    = '</li>';
	$config['use_page_numbers'] = TRUE;
	$config['num_links']        = $num_links;
	$config['uri_segment'] 		= $uri_segment;
	return $config;
}

function pagination($url = '',$total,$per_page = 1,$uri_segment = 2){
		$config                     = array();
		$config['base_url']         = $url; 
		$config['total_rows']       = $total;
		$config['per_page']         = $per_page;
		$config['uri_segment']      = $uri_segment;
		$config['use_page_numbers'] = TRUE;
		$config['first_link']       = '<<';
		$config['last_link']        = '>>';
		$config['first_tag_open']   = '<li>';
		$config['first_tag_close']  = '</li>';
		$config['last_tag_open']    = '<li >';
		$config['last_tag_close']   = '</li>';
		$config['prev_tag_open']    = '<li >';
		$config['prev_tag_close']   = '</li>';
		$config['next_tag_open']    = '<li >';
		$config['next_tag_close']   = '</li>';
		$config['num_tag_open']     = '<li >';
		$config['num_tag_close']    = '</li>';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['cur_tag_open']     = '<li class="active"><a>';
		$config['cur_tag_close']    = '</a></li>';
		return $config;
}

/* End of file paging_helper.php */
/* Location: ./helpers/paging_helper.php */
