<?php if (!defined('BASEPATH')){ exit('No direct script access allowed');
}

/**
 *  Configuration Controller
 *
 * @package XGO CMS v3.0
 * @subpackage configuration
 * @link http://sunsoft.vn
 */

class Stats_user extends BACKEND_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->language('stats_user');
		$this->load->language('button');
		if($this->database_connect_status){
			$this->load->model('stats_user_model');
			$this->load->model('stats_zone_model');
			$this->set_controller('stats_user');
			$this->set_model($this->stats_user_model);	
		}
	}
}

/* End of file configuration.php */
/* Location: ./application/controllers/auth/configuration.php */
