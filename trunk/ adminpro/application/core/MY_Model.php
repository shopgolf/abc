<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/**
 *
 * @package		Adminpro
 * @author		Tran Hoang Thien (thienhb12@gmail.com)
 * @copyright   PHP TEAM
 * @link		http://phpandmysql.net
 * @since		Version 1.0
 * @phone       0944418192
 *
 */
class MY_Model extends CI_Model{
	public $table = '';
	public function __construct(){
		parent:: __construct();
		$this->load->database();
	}
	/*
		* This is function Insert data 
	*/
	public function insert($data){
		if($this->db->insert($this->table,$data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	/*
		* This is function update data
		* Variable where is an array conditions
		* example array("id" => $id)
	*/
	public function update($where,$data){
		if(!$where){
			return FALSE;
		}
		$this->db->where($where);
		if($this->db->update($this->table,$data)){
			return TRUE;
		}else{
			return FALSE;
		};
	}
	/*
		* This is function delete data
		* Variable where is an array conditions
		* example array("id" => $id)
	*/
}