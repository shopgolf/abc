<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cumulative extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();		
		$this->load->model('cumulative_model');
		$this->load->library('login_service');
	}
        
	public function index()
	{
                $this->view_data[]                          = new stdClass();
				$this->view_data['username']                = $username;

				$this->load->view('templates/frontend/template', $this->view_data);
	}
}