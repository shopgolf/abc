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
    
	public function build_view(&$view){
	
		$view['series_data_news']="[";
			
		$seria_data_news 	= $this->pie_chart_category();

		$view['total_news']	= 0;
		if(isset($seria_data_news['normal'])){
			foreach($seria_data_news['normal'] as $k=>$item){
				$view['series_data_news'].="['{$item}',   {$k}],";
				$view['total_news']+=$k;
			}
		}

			
		if(isset($seria_data_news['important'])){
			foreach($seria_data_news['important'] as $k=>$item){
				$view['series_data_news'].="{
					name: '{$item}',
					y: {$k},
					sliced: true,
					selected: true
				},";
				$view['total_news']+=$k;
	
			}
		}
		$view['series_data_news'].="]";
		
		$view['series_data_data']="[";		
		$seria_data_data 	= $this->pie_chart_data();
			
		$view['total_data'] = 0;
		foreach($seria_data_data as $k=>$item){
			$view['total_data']+=$item;
			$k = ucfirst($k);
			$view['series_data_data'].="['{$k}',   {$item}],";
		}		
		$view['series_data_data'].="]";

		$seria_data_advertising 	= $this->bar_chart_advertising();
		$view['total_advertising'] = 0;
		$view['series_data_advertising_disable']="{name: '".$this->lang->line('stats_deactive')."', data: [";
		$view['series_data_advertising_active']	="{name: '".$this->lang->line('stats_active')."', data: [";
		$view['series_category_advertising'] 	= "";
		foreach($seria_data_advertising as $k=>$item){
			$k = ucfirst($k);
			$view['series_category_advertising'] .= "'{$k}', ";
		
			$item[1]=isset($item[1])?$item[1]:0;
			$item[0]=isset($item[0])?$item[0]:0;
			$view['series_data_advertising_disable'].=$item[0].",";
			$view['series_data_advertising_active'].=$item[1].",";
		
			$view['total_advertising']+=$item[0]+$item[1];
		}
		$view['series_data_advertising_disable'].="]}";
		$view['series_data_advertising_active'].="]}";
		
		$view['other_statistics']['1']	=	array(
			'total' =>	$this->category_total(),
			'title' =>  $this->lang->line('stats_category'),
		);		
		$view['other_statistics']['2']	=	array(
			'total' =>	$this->menu_total(),
			'title' =>  $this->lang->line('stats_menu'),
		);
		$view['other_statistics']['3']	=	array(
				'total' =>	$this->configuration_total(),
				'title' =>  $this->lang->line('stats_configuration'),
		);
		$view['other_statistics']['4']	=	array(
				'total' =>	$this->user_total(),
				'title' =>  $this->lang->line('stats_user'),
		);		
		$view['other_statistics']['5']	=	array(
				'total' =>	$this->group_total(),
				'title' =>  $this->lang->line('stats_user'),
		);	
		
		$view['other_statistics']['6']	= 	array(
				'total' =>	$this->role_total(),
				'title' =>  $this->lang->line('stats_role'),
		);	
		
		$view['news_top_last']		= $this->get_last_news();		
		$view['news_top_hits']		= $this->get_most_view();
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