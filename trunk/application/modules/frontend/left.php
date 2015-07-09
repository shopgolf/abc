<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	// list server
	$this->load->helper('file');
	$content = @file_get_contents(SERVER_LIST_API);	
	if(!empty($content)){
		$this->view_data['server_list'] = json_decode($content);
	}	
	
	
	// get server near	
	if(!empty($_SESSION['user_info'])){
		$s = '';
		$user_info = $_SESSION['user_info'];
		$file = "static/text/user/".$user_info[0]->username.'.txt'; //$_SERVER['DOCUMENT_ROOT'].
		if(read_file('static/text/user/'.$user_info[0]->username.'.txt') === FALSE){
			foreach ($this->view_data['server_list'] as $k=>$item){
				if($item->playEnabled == 1){
					$s = $item->serverName;
				}
			}					
		}else{			
			$s = file_get_contents($file);
		}		
		$this->view_data['server_near'] = $s;
	}
	