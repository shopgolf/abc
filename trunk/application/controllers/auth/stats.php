<?php if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

/**
 *  Stats Controller
 *
 * @package XGO CMS v3.0
 * @subpackage Stats
 * @link http://sunsoft.vn
 */

class Stats extends MY_Controller {

	public function __construct() {
		parent::__construct();
		require_once(APPPATH . 'modules/backend/autoload.php');
		if($this->is_logged_in() == FALSE) {
			$this->session->set_userdata('redirect_uri', current_url());
			redirect('auth');
		}else {
			$this->load->language('stats');
		}
		$this->output->enable_profiler(ENABLE_PROFILER);
                $this->load->model('adminlog_model');
                $this->offset       =   0;
                $this->limit        =   2;
	}

	/**
	 * Displays list of category.
	 */
	public function index(){
		$this->view_data	= array();
		$this->view_data['flash_message_error']	= $this->session->flashdata('flash_message_error');
		$this->view_data['flash_message']		= $this->session->flashdata('flash_message');
		$this->view_data['role_by_group'] 		= array();
		if($this->database_connect_status){
			$this->load->model('stats_model');
                        $this->load->model('checkout_model');
			$user_info                              = $this->stats_model->get_user_info($this->stats_model->get_user_id());
			$this->view_data['role_by_group']       = $user_info['role_list'];
			$this->view_data['username']            = $user_info['username'];
                        //get list checkout
                        if($this->input->post('showall')){
                            $this->view_data['list']            = $this->checkout_model->selectCartCheckOut();
                            $this->load->view('auth/stats/showall', $this->view_data);
                        } else {
                            $this->view_data['list']            = $this->checkout_model->selectCartCheckOut($this->offset,$this->limit);
                            $this->load->view('auth/stats/dashboard', $this->view_data);
                        }
		}else{
			$this->view_data['flash_message']	= $this->lang->line('database_connect_failed');
			$this->load->view('templates/backend/error', $this->view_data);
		}
	}
}

/* End of file statistic.php */
/* Location: ./application/controllers/auth/statistic.php */
