<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Adminlog Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */

class News_model extends MY_Model{
	
	public function __construct(){
		parent::__construct();
		$this->table_name = 'px_post';
	}

}