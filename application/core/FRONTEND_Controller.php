<?php if (!defined('BASEPATH')){ exit('No direct script access allowed');
}

/**
 *  FRONTEND Controller
 *
 * @package XGO CMS v3.0
 * @subpackage FRONTEND
 * @link http://sunsoft.vn
 */

class FRONTEND_Controller extends MY_Controller {

	private $controller 	= '';
	private $model 			= '';
	
	protected $view_data 	= NULL;

	public function __construct() {
		parent::__construct();
		$this->output->enable_profiler(ENABLE_PROFILER);
	}
	
	protected function trust_ip() {
		$ip = $this->input->ip_address();
	
		$ip_list = '14.161.32.21, 113.161.8.175,113.161.79.95,113.161.93.109,118.69.77.23';
	
		if(strpos($ip_list, $ip) === FALSE) {
			show_404(); exit;
		}
	}
}

/* End of file FRONTEND_Controller.php */
/* Location: ./application/core/MY_Backend_Controller.php */