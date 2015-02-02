<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 * @package		Adminpro
 * @author		Tran Hoang Thien (thienhb12@gmail.com)
 * @copyright   PHP TEAM
 * @link		http://phpandmysql.net
 * @since		Version 1.0
 * @phone       0944418192
 *
 */
class Sidebar extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('options_model');
	}

	public function index()
	{
		$test = $this->options_model->get_option(array('option_name =' => 'admin_menu_setting'),'option_value');
		debug($test);
	}

	
}

/* End of file sidebar.php */
/* Location: ./application/modules/admin/controllers/sidebar.php */