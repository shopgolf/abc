<?php
$info = $this->product_model->find_by(array('seo_url'=>trim(strtolower($params1))));
if($this->input->server('REQUEST_METHOD')=='POST'){
    $this->view_data["order"]                                   = new stdClass();
    $this->view_data['order']->customerID                       = $this->bookinglib->rendCode('cus');
    $this->view_data["order"]->cu_name                          = $this->input->post('cu_name');
    $this->view_data["order"]->cu_email                          = $this->input->post('cu_email');
    $this->view_data["order"]->cu_phone                          = $this->input->post('cu_phone');
    $this->view_data["order"]->product_id                          = $this->input->post('c_i_d');
    $this->view_data["order"]->quantity                          = $this->input->post('quantity');
    $this->view_data["order"]->order_price                          = $this->input->post('order_price_fake');
    $this->view_data["order"]->ship_price                          = $this->input->post('ship_price_fake');
    $this->view_data["order"]->address                          = $this->input->post('ship_price_fake');
    $this->view_data["order"]->ipaddress                          = $_SERVER['REMOTE_ADDR'];
    $this->view_data["order"]->createdTime                          = time();
    $this->view_data["order"]->lastupdated                      = time();
    
    $this->load->helper('character');
    $this->load->helper('form');
    $this->load->library('form_validation');

    $rules = array(
        array(
            'field'   => 'cu_name',
            'label'   =>  $this->lang->line('yourname'),
            'rules'   => 'required|trim|max_length[100]|xss_clean'
        ),array(
            'field'   => 'cu_email',
            'label'   =>  $this->lang->line('email'),
            'rules'   => 'required|trim|max_length[100]|xss_clean'
        ),array(
            'field'   => 'cu_phone',
            'label'   =>  $this->lang->line('phone'),
            'rules'   => 'required|trim|max_length[12]|xss_clean'
        ),array(
            'field'   => 'quantity',
            'label'   =>  $this->lang->line('quantity'),
            'rules'   => 'required|numberic|max_length[3]|xss_clean'
        ),array(
            'field'   => 'order_price_fake',
            'label'   =>  $this->lang->line('order_price'),
            'rules'   => 'required|numberic|max_length[10]|xss_clean'
        )
        
    );

    $this->form_validation->set_error_delimiters('<div class=""><strong>'.$this->lang->line('error').': </strong>', '</div>');
    $this->form_validation->set_rules($rules);

    if ($this->form_validation->run()==TRUE){
            $params         = $this->checkout_model->create($this->view_data["order"]);
            if($params){
                    $this->session->set_flashdata('flash_message', $this->lang->line('update_successful'));
                    $paramAdminLog  = array(
                        'userid'            => $this->session->userdata['user_id'],
                        'lastLogin'         => date('Y-m-d :H:i:s',time()),
                        'ip'                => $_SERVER['REMOTE_ADDR'],
                        'logAction'         => '[AddCarts] '.$this->input->post('cu_name').' - '.$this->lang->line('add_order_success'),
                        'agent_code'        => $this->session->userdata['agent_code']
                    );
                    $this->user_model->insertUserAdminLog($paramAdminLog);
                    redirect(base_url());
            }
    }
    
} else {
    if($this->input->get('token') != md5('shop'.$info[0]->product_id)){
        redirect(site_url());
    }
}

$this->smarty->assign(array(
        'data'                  =>          $info[0],
        'validation'            =>          validation_errors()
));
$this->smarty->assign(array(
    'content' 	 => $this->smarty->view_tmp('frontend/product/order','content')
));
