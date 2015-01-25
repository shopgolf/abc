<?php
class My_controller extends CI_Controller{
	public function __construct(){
		parent:: __construct();
	}
  //this is function fetch contetn
  public function fetch($template = null,$data = array()){
    ob_start();
    $this->load->view($template,$data);
    $content = ob_get_contents();
    ob_get_clean();
    return $content;
  } 
}