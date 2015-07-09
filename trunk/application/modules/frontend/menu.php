<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	$this->view_data['menu_list'] =  $this->menu_model->get_list_menu(0,'homepage');	