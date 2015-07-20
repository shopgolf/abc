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
                $this->load->language('stats');
		require_once(APPPATH . 'modules/backend/autoload.php');
		if($this->is_logged_in() == FALSE) {
			$this->session->set_userdata('redirect_uri', current_url());redirect('auth');
		}
                $this->offset       =   0;
                $this->limit        =   10;
                $this->load->model('stats_model');
                $this->load->model('checkout_model');
	}

	public function index(){
		$this->view_data	= array();
		$this->view_data['flash_message_error']	= $this->session->flashdata('flash_message_error');
		$this->view_data['flash_message']		= $this->session->flashdata('flash_message');
		$this->view_data['role_by_group'] 		= array();
		if($this->database_connect_status){
			$user_info                              = $this->stats_model->get_user_info($this->stats_model->get_user_id());
			$this->view_data['role_by_group']       = $user_info['role_list'];
			$this->view_data['username']            = $user_info['username'];
                        //get list checkout
                        if($this->input->post('showall')){
                            $this->smarty->assign(array(
                                "list"  =>  $this->checkout_model->selectCartCheckOut(),
                                'count' =>  count($this->checkout_model->selectCartCheckOut())
                            ));
                            $this->smarty->display('auth/stats/showall');
                        } else {
                            $this->smarty->assign(array(
                                "list"  =>  $this->checkout_model->selectCartCheckOut($this->offset,$this->limit,0),
                                'count' =>  count($this->checkout_model->selectCartCheckOut(NULL,NULL,0))
                            ));
                            $this->smarty->display('auth/stats/dashboard');
                        }
		}else{
			$this->view_data['flash_message']	= $this->lang->line('database_connect_failed');
			$this->load->view('templates/backend/error', $this->view_data);
		}
	}
        
        public function delete($params){
            $this->checkout_model->delete(array('id'=>$params));
            $this->session->set_flashdata('flash_message', $this->lang->line('delete_successful'));
            
            $paramAdminLog  = array(
                'userid'            => $this->session->userdata['user_id'],
                'lastLogin'         => date('Y-m-d :H:i:s',time()),
                'ip'                => $_SERVER['REMOTE_ADDR'],
                'logAction'         => '[NewCart] '.$this->lang->line('delete_successful').' id = '.$params
            );
            $this->user_model->insertUserAdminLog($paramAdminLog);
            redirect(base_url('auth/stats'));
        }
        
        public function accept($params){
            if($this->input->server('REQUEST_METHOD')=='POST'){
                
            }
            $this->smarty->assign(array(
                "id"  =>  $params
            ));
            $this->smarty->display('auth/stats/accept');
        }
        
        public function action_accept($params){
            $this->view_data["checkout"]            =   new stdClass();
            $this->view_data["checkout"]->status    =   1;
            $this->checkout_model->update($this->view_data["checkout"], $params);
            //insert adminlog
            $paramAdminLog  = array(
                'userid'            => $this->session->userdata['user_id'],
                'lastLogin'         => date('Y-m-d :H:i:s',time()),
                'ip'                => $_SERVER['REMOTE_ADDR'],
                'logAction'         => 'Xác nhận đơn hàng '.$params.' '.$this->lang->line('success_successful')
            );
            $this->user_model->insertUserAdminLog($paramAdminLog);
            die("1");
        }
}

/* End of file statistic.php */
/* Location: ./application/controllers/auth/statistic.php */
