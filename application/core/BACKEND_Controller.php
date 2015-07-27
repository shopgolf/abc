<?php 
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}

/**
 *  MY Backend Controller
 *
 * @package XGO CMS v3.0
 * @subpackage MY Backend
 * @link http://sunsoft.vn
 */

class BACKEND_Controller extends MY_Controller {

	private $controller = '';
	private $model 		= '';
	
	public function __construct() {
		parent::__construct();		
		require_once(APPPATH . 'modules/backend/autoload.php');
		if($this->is_logged_in() == FALSE || $this->check_role() == FALSE) {
			$this->session->set_flashdata('flash_message_error', $this->lang->line('access_denied'));
			$this->session->set_userdata('redirect_uri', current_url());
			redirect('auth');
		}
	}

	/**
	 * Displays list of category.
	 */
	public function index(){		
		$this->view_data	= array();
		$this->view_data['role_by_group'] 	= array();
		$this->view_data['username'] 		= '';
		if($this->database_connect_status){
			$role 		= $this->uri->rsegment(1);
			//$controller
			$this->right	= array(
				'edit' 	=> $this->user_model->has_right_code($this->user_model->get_user_id(), $role, 'edit'),					
				'delete'=> $this->user_model->has_right_code($this->user_model->get_user_id(), $role, 'delete'),
				'add' 	=> $this->user_model->has_right_code($this->user_model->get_user_id(), $role, 'add'),
			);
			
			$user_info = $this->user_model->get_user_info($this->user_model->get_user_id());
			$this->view_data['role_by_group'] = $user_info['role_list'];
			$this->view_data['username'] 	  = $user_info['username'];
			
			$action = $this->uri->rsegment(3);
			$this->view_data['flash_message']	= $this->session->flashdata('flash_message');

			switch ($action) {
				case 'edit':
					$this->output->enable_profiler(ENABLE_PROFILER);
					$this->update($this->uri->rsegment(4));
					break;
				case 'add':
					$this->output->enable_profiler(ENABLE_PROFILER);
					$this->update();
					break;
				case 'delete':
					$this->delete($this->uri->rsegment(4));
					break;
				case 'view'://view/json_data
					$this->json_data();
					break;
				default:
					$this->output->cache(CACHE_EXPIRES);
					$this->output->enable_profiler(ENABLE_PROFILER);
					$this->datatables();
			}
		}else{
			$this->view_data['flash_message']	= $this->lang->line('database_connect_failed');
			$this->load->view('templates/backend/error', $this->view_data);
		}
	}

	protected function datatables(){
		$this->load->library('Xgo_datatables', '', 'datatables');
                $userinfo   =   $this->user_model->find_by(array('id'=>$this->session->userdata['user_id']));
                $this->smarty->assign(array(
                    'permission'                => $this->right,
                    'controller'                =>  $this->controller,
                    'database_connect_status'   =>  $this->database_connect_status,
                    'datatables'        => array(
                        'json_data'		=> site_url('auth/'.$this->controller.'/index/view/json_data'),
                        'init_data'             => $this->model->init_data($this->right),
                        'filter'		=> '',
                        'label'			=> $this->lang->line($this->controller)
                    ),
                    'css'               => array(
                        base_url().'third_party/datatables/css/dataTables.bootstrap.css',
                        base_url().'third_party/checkbox/style.css',
                                        ),
                    'js'                => array(
                        base_url().'third_party/datatables/js/jquery.dataTables.js',
                        base_url().'third_party/datatables/js/dataTables.bootstrap.js',
                        base_url().'third_party/datatables/js/jquery.dataTables.columnFilter.js'
                    ),
                    'lang'              => $this->lang->language,
                    'static_bk'         => base_url('/static/templates/backend'),
                    "link_bk"           =>  base_url('/auth'),
                    'site_url'          =>  base_url(),
                    "userinfo"          =>  $userinfo[0],
                    'flash_message'     =>  $this->session->flashdata('flash_message')
                ));
                
                $this->smarty->display('templates/backend/datatables_index');
	}

	protected function json_data(){
		$this->load->library('Xgo_datatables', '', 'datatables');
		echo $this->input->get('callback').'('.$this->model->json_data($this->controller, $this->right).')';
	}

	protected function delete($id){
		$this->load->helper('form');

		$this->model->delete(array('id' => $id));
		$this->session->set_flashdata('flash_message', $this->lang->line('delete_successful'));
		redirect('auth/'.$this->controller.'/');
	}
	
	protected function set_controller($controller){
		$this->controller = $controller;
	}
	
	protected function set_model($model){
		$this->model = $model;
	}
        
        public function adminlog($logAction){
            $paramAdminLog  = array(
                'userid'            => $this->session->userdata['user_id'],
                'lastLogin'         => date('Y-m-d :H:i:s',time()),
                'ip'                => $_SERVER['REMOTE_ADDR'],
                'logAction'         => $logAction
            );
            $this->user_model->insertUserAdminLog($paramAdminLog);
            unset($paramAdminLog);
        }
	
	
}

/* End of file MY_Backend_Controller.php */
/* Location: ./application/core/MY_Backend_Controller.php */