<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_base extends CI_Model {
	public $table = ''; //this is variables table
	public $field = '';
	public function __construct(){
		parent:: __construct();
		$this->load->database();
	}
	/* this is function lits all
	   $limit this is variables record
 	   $start this is variabless start
 	   $filed this variables filed database
	*/
 	//this is fucntion list 
	public function all($limit,$start,$field){
		$this->db->select($field);
		$this->db->limit($limit,$start);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	//this is function insert data
	public function insert($filed){
		$this->db->insert($this->table,$filed);
	}

	// total numrows record table user
	public function total_record(){
		return $this->db->count_all($this->table);
	}

	// this is function select data
	public function select_data($filed,$table){
		$this->db->select($filed);
		$query = $this->db->get($table);
		return $query->result_array();
	}

	//this is function update record
	public function update($id,$filed){
		$this->db->where('id', $id);
		$this->db->update($this->table,$filed);
	}

	// this is funtion get data recoded
	public function get_data($param,$field){
		$this->db->where($param);
		$this->db->select($field);
		$query = $this->db->get($this->table);
		return $query->row_array();
	}
	
	//this is function delete record
	public function delete_data($param){
		$this->db->delete($param);
	}
	//this is function debug 
	public function debug($val){
	    echo "<pre>";
	    	print_r($val);
	    echo "</pre>";
	    die();
	}
}

/* End of file model_base.php */
/* Location: ./application/models/model_base.php */