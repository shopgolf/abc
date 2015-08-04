<?php
if(in_array($controller, array("product"))){
    if($this->input->server('REQUEST_METHOD')=='POST' && $this->input->post('submit') == 'search'){
        $data = array(
            'product_name'    =>  $this->input->post('product_name')
        );
        $this->session->set_userdata('s_product', json_encode($data));
    }
}