<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *  Stats Model
 *
 * @package XGO CMS v3.0
 * @subpackage stats
 * @link http://sunsoft.vn
 */

class Stats_model extends MY_Model{
	
	public function __construct(){
		parent::__construct();
		$this->table_name = 'stats';
	}
	
	public function get_list_news_hits($day){
		if(empty($day)){
			$day = date('Y-m-d',time());
		}				
		$this->db->select("title, created, id, hits");
		$this->db->from('news');	
		$this->db->like('published',$day);
		$this->db->where('active', 1);
		$this->db->order_by('hits', 'desc');
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
	}
	
	private function get_last_news(){
		$this->db->select("title, created, id");
		$this->db->from('news');
		$this->db->order_by('created', 'decs');
		$this->db->where('active', 1);
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
	}
	
	private function get_most_view(){
		$day = date('Y-m-d',time());
		$this->db->cache_on();
		$this->db->select("title, created, id, hits");
		$this->db->from('news');	
		$this->db->like('published',$day);
		$this->db->where('active', 1);
		$this->db->order_by('hits', 'desc');
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
	}
	
	private function role_total(){
		$this->db->cache_on();
		$this->db->select("count(id) as count");
		$this->db->from('role');
		$query = $this->db->get();
		foreach($query->result() as $item){
			if($item->count>0){
				return $item->count;
			}
		}
		return 0;
	}
	
	private function group_total(){
		$this->db->cache_on();
		$this->db->select("count(id) as count");
		$this->db->from('groups');
		$query = $this->db->get();
		foreach($query->result() as $item){
			if($item->count>0){
				return $item->count;
			}
		}
		return 0;
	}

	private function user_total(){
		$this->db->cache_on();
		$this->db->select("count(id) as count");
		$this->db->where('active', 1);
		$this->db->from('users');
		$query = $this->db->get();
		foreach($query->result() as $item){
			if($item->count>0){
				return $item->count;
			}
		}
		return 0;
	}
	
	private function configuration_total(){
		$this->db->cache_on();
		$this->db->select("count(id) as count");
		$this->db->from('configuration');
		$query = $this->db->get();
		foreach($query->result() as $item){
			if($item->count>0){
				return $item->count;
			}
		}
		return 0;
	}
	
	private function menu_total(){
		$this->db->cache_on();
		$this->db->select("count(id) as count");
		$this->db->where('active', 1);
		$this->db->from('menu');
		$query = $this->db->get();
		foreach($query->result() as $item){
			if($item->count>0){
				return $item->count;
			}
		}		
		return 0;		
	}
	
	private function category_total(){
		$this->db->cache_on();
		$this->db->select("count(id) as count");
		$this->db->where('active', 1);
		$this->db->from('category');
		$query = $this->db->get();
		foreach($query->result() as $item){
			if($item->count>0){
				return $item->count;
			}
		}
		return 0;
	}
	
	private function pie_chart_category(){
		$this->db->cache_on();
		$category_important = 181;
			
		$this->db->select("COUNT(news.id) as count, news.category_id as category_id, category.title as category_title");
		$this->db->from('news');
		$this->db->join('category', 'category.id = news.category_id');
		$this->db->group_by("category_id");
		$query = $this->db->get();
	
		$return = $array = array();
		foreach($query->result() as $item){
			if($item->category_id>0){
				if($item->category_id ==$category_important){
					$return['important'][$item->count] 	= trim($item->category_title);
				}else{
					$return['normal'][$item->count] 	= trim($item->category_title);
				}
			}
		}
	
		return $return;
	}
	
	private function pie_chart_data(){
		$this->db->cache_on();
		$this->db->select("count(id) as count, type");
		$this->db->from('data');
		$this->db->group_by("type");
		$query = $this->db->get();
		 
		$return = array();
		foreach($query->result() as $item){
			if($item->count>0){
				$return[$item->type]		= $item->count;
			}
		}
		return $return;
	}
	
	
	function bar_chart_advertising(){
		$this->db->cache_on();
		$this->db->select("count(id) as count, position, active");
		$this->db->from('advertising');
		$this->db->group_by("position, active");
		$query = $this->db->get();
		 
		$array = array();
		foreach($query->result() as $item){
			$array[$item->position][$item->active] = $item->count;
		}
		return $array;
	}
}

/* End of file stats_model.php */
/* Location: ./application/models/stats_model.php */