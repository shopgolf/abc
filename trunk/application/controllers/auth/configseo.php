<?php 
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}

/**
 * Congifseo Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */

class Congifseo extends BACKEND_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->language('configseo');
		$this->load->language('button');
		if($this->database_connect_status){
                    $this->load->language('stats');
//                    $this->load->model('stats_model');

                    $this->load->library('session');
                    $this->load->library('smarty3');
                    $this->smarty = new CI_Smarty3();

                    $static     =   json_decode(STATIC_URL);
                    $userinfo   =   $this->user_model->find_by(array('id'=>$this->session->userdata['user_id']));

                    $this->smarty->assign(array(
                        "lang"          =>  $this->lang->language,
                        "static_bk"     =>  base_url($static->STATIC_BK),
                        "link_bk"       =>  base_url($static->BACKEND),
                        'site_url'      =>  base_url(),
                        "userinfo"      =>  $userinfo[0],
                        'flash_message' =>  ($this->session->flashdata('flash_message'))?$this->session->flashdata('flash_message'):''
                    ));
		}
	}
        
        protected function update($params=NULL){
		if($this->input->server('REQUEST_METHOD')=='POST'){
                        $this->view_data["configseo"]                                   = new stdClass();
                        $this->view_data["configseo"]->customerID                       = trim($this->input->post('customerID'));
                        $this->view_data["configseo"]->configseoNow                       = $this->input->post('configseoNow');
                        $this->view_data["configseo"]->deduct                           = $this->input->post('deduct');
                        $this->view_data["configseo"]->configseoRemaine                   = $this->input->post('configseoRemaine');
                        $this->view_data["configseo"]->note                             = $this->input->post('note');
                        $this->view_data["configseo"]->owner                            = $this->session->userdata['user_id'];
                        $this->view_data["configseo"]->agent_code                       = $this->session->userdata['agent_code'];
                        $this->view_data["configseo"]->lastupdated                      = date("Y-m-d H:i:s",time());

                        $this->load->helper('form');
                        $this->load->helper('character');
                        $this->load->helper('form');
                        $this->load->library('form_validation');
                        $this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>'.$this->lang->line('error').': </strong>', '</div>');
                        $rules = array(
                            array(
                                'field'   => 'customerID',
                                'label'   =>  $this->lang->line('customerID'),
                                'rules'   => 'required|trim|max_length[50]|xss_clean'
                            )
                            ,array(
                                'field'   => 'configseoRemaine',
                                'label'   =>  $this->lang->line('configseo'),
                                'rules'   => 'numberic|xss_clean'
                            )
                            ,array(
                                'field'   => 'note',
                                'label'   =>  $this->lang->line('note'),
                                'rules'   => 'required|trim|max_length[255]|xss_clean'
                            )
                        );

                        $this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>'.$this->lang->line('error').': </strong>', '</div>');
                        $this->form_validation->set_rules($rules);

                        if ($this->form_validation->run()==TRUE){
                                if($params){
                                        //edit data
					$this->configseo_model->update($this->view_data["configseo"], $params);
                                        $logAction                              = '[UpdateCongifseo] '.$this->lang->line('update_configseo_success');
				}else{
					$params                                 = $this->configseo_model->create($this->view_data["configseo"]);
                                        $logAction                              = '[AddCongifseo] '.$this->lang->line('add_configseo_success');
				}
                                //update so du
                                $this->load->model('listcustomers_model');
                                $this->listcustomers_model->updateCongifseo($this->view_data["configseo"]->customerID,$this->view_data["configseo"]->configseoRemaine);
                                
				if($params){
					$this->session->set_flashdata('flash_message', $this->lang->line('update_successful'));
					$paramAdminLog  = array(
                                            'userid'            => $this->session->userdata['user_id'],
                                            'lastLogin'         => date('Y-m-d :H:i:s',time()),
                                            'ip'                => $_SERVER['REMOTE_ADDR'],
                                            'logAction'         => $logAction,
                                            'agent_code'        => $this->session->userdata['agent_code']
                                        );
                                        $this->user_model->insertUserAdminLog($paramAdminLog);
                                        redirect('auth/configseo');
				}
                        }
            }
            
            $this->load->model('configseo_model');
            $this->load->model('language_model');

            if(isset($params)){
                    $configseo_query	= $this->configseo_model->find_by(array('id'=>$params));
                    
                    if(!isset($configseo_query[0])){
                            $this->session->set_flashdata('flash_message', $this->lang->line('not_exists'));
                            redirect(site_url('auth/configseo'));
                            exit();
                    }

                    $this->view_data['configseo']				= $configseo_query[0];
            }

            $this->view_data['js'] = array(
                            base_url().'static/templates/backend/js/main.js'
            );
            $this->view_data['css'] = array(
            );
            $this->load->view('auth/configseo/edit', $this->view_data);
	}
}