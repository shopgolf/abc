<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


	$this->load->model('news_model');
	
	
	$list_event_month = $this->news_model->get_list_news_month('news','su-kien',date('Y-m'));
	
	$data = array();
	foreach($list_event_month as $key=>$value){		
		$data[intval(date('d',strtotime($value->published)))] = base_url().'sandbox/event_list/'.date('Y-m-d',strtotime($value->published)).'.html';	
	}
	
	$prefs = array (
			'show_next_prev'  => TRUE,
			'next_prev_url'   => base_url().'sandbox/get_calendar/'
	);
	
	$this->load->library('tt_calendar', $prefs);
	$this->view_data['calendar']   = $this->tt_calendar->generate($this->uri->segment(3),$this->uri->segment(4), $data);
