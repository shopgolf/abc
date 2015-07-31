<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cronjob extends CI_Controller
{	
		
	public function __construct()
	{
		parent::__construct();
		$this->load->database();		
                $this->load->model('cronjob_model');
                
                $this->load->library('bookinglib');
                $this->bookinglib = new bookinglib();
        }
        
        public function cronMaker(){
                $str = '';
                $time = time();
                foreach($this->cronjob_model->cronMaker() as $keys => $vals){
                    $str .= '('.$vals->manufacturer_id.',"'.$vals->name.'","'.$vals->image.'",1,"'.$time.'"),';
                }
//INSERT INTO `golf.dev`.`px_maker` (`id`, `name`, `description`, `logo` ,`owner`, `lastupdated`) VALUES (NULL, 'ergresg', 'ersgesr', '1', '421521');                
        }
        
        public function cronCategory(){
                $str = '';
                $time = time();
                
                foreach($this->cronjob_model->cronCategory() as $key => $vals){
                    $str        .= '('.$vals->category_id.',"'.$vals->name.'","'.$vals->description.'","'.$vals->meta_keyword.'","'.$time.'"),';
                    $seo_url     =   $this->bookinglib->seoUrl($vals->name);
                    
                    $data = array(
                        'id'            =>  $vals->category_id,
                        'name'          =>  $vals->name,
                        'description'   =>  htmlspecialchars_decode($vals->description),
                        'keyword'       =>  $vals->name,
                        'seo_url'       =>  $seo_url,
                        'owner'         =>  1,
                        'lastupdated'   =>  time()
                    );
                    $this->cronjob_model->insertCategory($data);
                }
        }
        
        public function cronProduct(){
                $str = '';
                $time = time();
                
                foreach($this->cronjob_model->cronProduct() as $key => $vals){
                    
                    $seo_url     =   $this->bookinglib->seoUrl($vals->name);
                   
                    $this->view_data["data"]                                    = new stdClass();
                    $this->view_data["data"]->product_id                        =   $this->bookinglib->rendCode('PRO');
                    $this->view_data["data"]->product_name                        =   $vals->name;
                    $this->view_data["data"]->product_code                        =   $vals->model;
                    $this->view_data["data"]->image                        =   $vals->image;
                    $this->view_data["data"]->seo_url                        =   $seo_url;
                    $this->view_data["data"]->category                        =   $vals->category;
                    $this->view_data["data"]->manufacturer                        =   $vals->manufacturer_id;
                    $this->view_data["data"]->net_price                        =   $vals->price;
                    $this->view_data["data"]->quantity                        =   $vals->quantity;
                    $this->view_data["data"]->keyword                        =   trim(htmlspecialchars_decode($vals->meta_keyword));
                    $this->view_data["data"]->description                        =   trim(htmlspecialchars_decode($vals->meta_description));
                    $this->view_data["data"]->info                        =   trim(htmlspecialchars_decode($vals->description));
                    $this->view_data["data"]->tag                        =   $vals->tag;
                    $this->view_data["data"]->owner                        =   1;
                    $this->view_data["data"]->created                        =   $vals->date_added;
                    $this->view_data["data"]->lastupdated                        =   $vals->date_modified;

                    unset($seo_url);
                    $id                                 = $this->cronjob_model->create($this->view_data["data"]);
                    $this->view_data["_data"]                                   =   new stdClass();
                    $this->view_data["_data"]->product_id                        =   $this->view_data["data"]->product_id.$id;
                    
                    $this->cronjob_model->update($this->view_data["_data"], $id);
                    unset($this->view_data["data"]);
                    unset($this->view_data["_data"]);
                }
        }
        
}
