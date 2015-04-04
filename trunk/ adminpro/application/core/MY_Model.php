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
	public $key   = '';
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
		* This is function update rule data
		* Variable where is an array conditions
		* example array("id" => $id)		
	*/
	public function update($id,$data){	
		if(!$id){
			return FALSE;
		}
		$where = array();
		$where['id'] = $id;
		return $this->update_rule($where,$data);
	}
	/*
		* This is function update rule data
		* Variable where is an array conditions
		* example array("field" => $data)		
	*/
	public function update_rule($where,$data){
		if(!$where){
			return FALSE;
		}
		$this->db->where($where);
		if($this->db->update($this->table,$data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	/*
		* This is function delete_rule data
		* Variable where is an array conditions
		* example array("where" => data)
	*/
	public function delete_rule($where){
		if(!$where){
			return FALSE;
		}
		$this->db->where($where);
		if($this->db->delete($this->table)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	/*
		* This is function delete data
		* Variable where is an array conditions
		* example array("id" => $id)
	*/
	public function delete($id){
		if(!$id){
			return FALSE;
		}
		if(is_numeric($id)){
			$where = array('id'=>$id);
		}else{
			$where = 'id IN ('.$id.')';
		}
		return $this->delete_rule($where);
	}
	/*
		* This is function get info rule 
		* Variable where is an array conditions
		* example array("id" => $where)
		* Variable $field is an array conditions field
		* example array("name" => $field,)
	*/
	public function get_info_rule($where,$field){
		if(!$where){
			return FALSE;
		}
		$this->db->where($where);
		$this->db->select($field);
		$query = $this->db->get($this->table);
		if($query->num_rows() > 0){
			return $query->row_array();
		} 
	}
	/*
		* This is function get info 
		* Variable where is an array conditions
		* example array("id" => $id)
		* Variable data is an array conditions field
		* example array("name" => $name,)
	*/
	public function get_info($id,$field){
		if(!$id){
			return FALSE;
		}
		$where = array();
		$where['id'] = $id;
		return $this->get_info_rule($where,$field);
	}
	/*
		* This is function get list input
		* Variable parram is an array conditions
	*/
	protected function get_list_input($param){
		// select
		if(isset($param['select'])){
			$this->db->select($param['select']);
		}
		// where
		if(isset($param['where']) && $param['where']){
			$this->db->where($param['where']);
		}
		// order by 
		// example ($param['order'] = array('id','DESC'))
		if(isset($param['order'][0]) && $param['order'][1]){
			$this->db->order_by($param['order'][0],$param['param'][1]);
		}else{
			// desc id record
			$this->db->order_by($this->key,'DESC');
		}
		if(isset($param['limit'][0]) && $param['limit'][1]){
			$this->db->limit($param['limit'][0],$param['limit'][1]);
		}
	}
	/*
		* This is function get list
		* Variable param is an array conditions
		* example $param['where'] = array('id',$id)
	*/
	public function get_list($param = array()){
		$this->get_list_input($param);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}
	/*
		* This is function get total
		* Variable param is an array conditions
		* example $param['where'] = array('id',$id)
		* result numrows record table
	*/
	public function get_total($param = array()){
		$this->get_list_input($param);
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	public function count_all(){
		return $this->db->count_all($this->table);
	}
}