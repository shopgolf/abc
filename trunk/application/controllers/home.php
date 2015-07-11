<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
class Home extends FRONTEND_Controller
{	
	var $num_per_page = 12;
  	var $num_links    = 3;
	public function __construct()
	{
		parent::__construct();
                redirect(base_url().'auth');
	}
}