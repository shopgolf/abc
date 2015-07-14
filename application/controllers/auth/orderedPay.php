<?php 
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}

/**
 * OrderedPay Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */

class OrderedPay extends BACKEND_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->language('orderedPay');
		$this->load->language('button');
		if($this->database_connect_status){
			$this->load->model('orderedPay_model');
			$this->set_controller('orderedPay');
			$this->set_model($this->orderedPay_model);
		}
	}
        
        protected function update($params=NULL){
		if($this->input->server('REQUEST_METHOD')=='POST'){
                        $this->view_data["orderedPay"]                                   = new stdClass();
                        $this->view_data["orderedPay"]->customerID                       = trim($this->input->post('customerID'));
                        $this->view_data["orderedPay"]->orderedPayNow                       = $this->input->post('orderedPayNow');
                        $this->view_data["orderedPay"]->deduct                           = $this->input->post('deduct');
                        $this->view_data["orderedPay"]->orderedPayRemaine                   = $this->input->post('orderedPayRemaine');
                        $this->view_data["orderedPay"]->note                             = $this->input->post('note');
                        $this->view_data["orderedPay"]->owner                            = $this->session->userdata['user_id'];
                        $this->view_data["orderedPay"]->agent_code                       = $this->session->userdata['agent_code'];
                        $this->view_data["orderedPay"]->lastupdated                      = date("Y-m-d H:i:s",time());

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
                                'field'   => 'orderedPayRemaine',
                                'label'   =>  $this->lang->line('orderedPay'),
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
					$this->orderedPay_model->update($this->view_data["orderedPay"], $params);
                                        $logAction                              = '[UpdateOrderedPay] '.$this->lang->line('update_orderedPay_success');
				}else{
					$params                                 = $this->orderedPay_model->create($this->view_data["orderedPay"]);
                                        $logAction                              = '[AddOrderedPay] '.$this->lang->line('add_orderedPay_success');
				}
                                //update so du
                                $this->load->model('listcustomers_model');
                                $this->listcustomers_model->updateOrderedPay($this->view_data["orderedPay"]->customerID,$this->view_data["orderedPay"]->orderedPayRemaine);
                                
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
                                        redirect('auth/orderedPay');
				}
                        }
            }
            
            $this->load->model('orderedPay_model');
            $this->load->model('language_model');

            if(isset($params)){
                    $orderedPay_query	= $this->orderedPay_model->find_by(array('id'=>$params));
                    
                    if(!isset($orderedPay_query[0])){
                            $this->session->set_flashdata('flash_message', $this->lang->line('not_exists'));
                            redirect(site_url('auth/orderedPay'));
                            exit();
                    }

                    $this->view_data['orderedPay']				= $orderedPay_query[0];
            }

            $this->view_data['js'] = array(
                            base_url().'static/templates/backend/js/main.js'
            );
            $this->view_data['css'] = array(
            );
            $this->load->view('auth/orderedPay/edit', $this->view_data);
	}
}