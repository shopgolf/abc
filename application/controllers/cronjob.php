<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cronjob extends CI_Controller
{	
		
	public function __construct()
	{
		parent::__construct();
		$this->load->database();		
                $this->load->model('cronjob_model');
                $this->load->model('parameters_model');
                $this->load->model('product_model');
                $this->load->model('category_model');
                $this->load->model('menu_model');
                
                $this->load->library('bookinglib');
                $this->bookinglib = new bookinglib();
        }
		
        public function explodeInfo(){
                $info           =   $this->cronjob_model->explodeInfo("clubspec");
                foreach($info as $key => $value){
                    preg_match_all("'<span style=\"font-family:times new roman,times,serif\">(.*?)</span>'si", $value->info, $match);
                    if($match[1][11] != "" && $match[1][23] != ""){
                        echo '("'.trim($value->product_id).'","'.trim($this->removeSpace($match[1][11])).'","'.trim($this->removeSpace($match[1][23])).'"),';
                    }
                    unset($_data);
                    unset($match);
                }
        }
        
        private function removeSpace($str){
            return str_replace("&nbsp;", "", $str);
        }


        public function cronMenuCate(){
                $category = $this->category_model->find_by();
                $arr = array();
                foreach($category as $keys => $vals){
                    if(in_array($vals->id,array('149','150','151','152'))){
                        $child_category = $this->category_model->getCategoryById(array('child_category'=>$vals->id));
                        $str = array();
                        foreach($child_category as $values){
                            $str[] = $values->id;
                        }

                        $this->view_data                =   new stdClass();
                        $this->view_data->name          =   $vals->name;
                        $this->view_data->category      =   json_encode($str);
                        $this->view_data->lastupdated   =   date("Y-m-d H:i:s",time());
                        $this->menu_model->create($this->view_data);
                        unset($this->view_data);   
                    }
                }                
        }
        
        
        public function removeChar(){
                foreach($this->category_model->find_by() as $keys => $vals){
                    $this->view_data["_data"]               =   new stdClass();
                    $this->view_data["_data"]->description  =   $vals->keyword;
                    $this->category_model->update($this->view_data["_data"], $vals->id);
                    echo $vals->id.' update success!<br/>';
                }
        }
                
        function save_image($link,$count)
        { //Download images from remote server
                $img    = 'C:\Users\phuc\Downloads\album_hinh_cuoi\PT3'.$count.'.JPG';
                $file   = file($link);
                $result = file_put_contents($img, $file);
                unset($img);
                unset($file);
                unset($result);
        }


        public function trackImg(){
            $i = 0;
            while($i < 10){
                    $link       =   "http://thienduong.vn/khachhang/upload/khachhang/3726/37861/MB9A03".$i;
                    $count      =   '0';
                    while($count < 10){
                        $this->save_image($link.$count.'.JPG',$i.'_'.$count);
                        $count++;
                    }
                    $i++;
            }
        }
        
        public function cronParameters(){                
                foreach($this->product_model->find_by() as $keys => $vals){
                    
                    $this->view_data["parameters"]                      = new stdClass();
                    $this->view_data["parameters"]->id                  = $vals->id;
                    $this->view_data["parameters"]->classification      = NULL;
                    $this->view_data["parameters"]->manufacturer        = $vals->manufacturer;
                    $this->view_data["parameters"]->model      = NULL;
                    $this->view_data["parameters"]->shaft      = NULL;
                    $this->view_data["parameters"]->count      = NULL;
                    $this->view_data["parameters"]->loft      = NULL;
                    $this->view_data["parameters"]->hardness      = NULL;
                    $this->view_data["parameters"]->gross      = NULL;
                    $this->view_data["parameters"]->balance      = NULL;
                    $this->view_data["parameters"]->price      = NULL;
                    $this->view_data["parameters"]->club      = NULL;
                    
                    $params = $this->parameters_model->create($this->view_data["parameters"]);
                    echo 'Tạo id='.$params.' thành công!<br/>';
                }

        }
        
        public function cronMaker(){
                $str = NULL;
                $time = time();
                foreach($this->cronjob_model->cronMaker() as $keys => $vals){
                    $str .= '('.$vals->manufacturer_id.',"'.$vals->name.'","'.$vals->image.'",1,"'.$time.'"),';
                }
//INSERT INTO `golf.dev`.`px_maker` (`id`, `name`, `description`, `logo` ,`owner`, `lastupdated`) VALUES (NULL, 'ergresg', 'ersgesr', '1', '421521');                
        }
        
        public function cronCategory(){
                $str = NULL;
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
                $image  =   array();

                foreach($this->cronjob_model->cronProduct() as $key => $vals){
                    $seo_url    =   $this->bookinglib->seoUrl($vals->name);
                    $image[]  =   $vals->image;
                    foreach($this->cronjob_model->getProductFromImg($vals->product_id) as $k => $v){
                        $image[]    =   $v->image;
                    }
                    
                    $this->view_data["data"]                                    = new stdClass();
                    $this->view_data["data"]->product_id                        =   $this->bookinglib->rendCode('PRO');
                    $this->view_data["data"]->product_name                        =   trim($vals->name);
                    $this->view_data["data"]->product_code                        =   trim($vals->model);
                    $this->view_data["data"]->product_type                        =   1;
                    $this->view_data["data"]->image                        = json_encode($image);
                    $this->view_data["data"]->seo_url                        =   $seo_url;
                    $this->view_data["data"]->category                        =   $vals->category;
                    $this->view_data["data"]->manufacturer                        =   $vals->manufacturer_id;
                    $this->view_data["data"]->net_price                        =   $vals->price;
                    $this->view_data["data"]->quantity                        =   $vals->quantity;
                    $this->view_data["data"]->keyword                        =   trim(htmlspecialchars_decode($vals->meta_keyword));
                    $this->view_data["data"]->description                        =   trim(htmlspecialchars_decode($vals->meta_keyword));
                    $this->view_data["data"]->info                        =   trim(htmlspecialchars_decode($vals->description));
                    $this->view_data["data"]->tag                        =   trim($vals->tag);
                    $this->view_data["data"]->view                        =   $vals->viewed;
                    $this->view_data["data"]->owner                        =   1;
                    $this->view_data["data"]->created                        =   $vals->date_added;
                    $this->view_data["data"]->lastupdated                        =   $vals->date_modified;

                    unset($seo_url);
                    $id                                 = $this->cronjob_model->create($this->view_data["data"]);
                    $this->view_data["_data"]                                   =   new stdClass();
                    $this->view_data["_data"]->product_id                       =   $this->view_data["data"]->product_id.$id;
                    
                    $this->cronjob_model->update($this->view_data["_data"], $id);
                    unset($this->view_data["data"]);
                    unset($this->view_data["_data"]);
                    unset($image);
                    unset($id);
                }
        }
        
        public function groupByCategory(){
            $groupByCategory    =   $this->cronjob_model->groupByCategory();
            foreach($groupByCategory as $key => $val){
                $str                = new stdClass();
                $str->product_id    = $val->product_id;
                $str->category_id   = $val->category_id;
                
                $this->cronjob_model->create($str);
                unset($str);
            }
        }
        
        public function updateCateNew(){
            $updateCateNew = $this->cronjob_model->updateCateNew();
            foreach($updateCateNew as $keys => $vals){
                $str                =   new stdClass();
                $str->id          =   trim($vals->id);
                $str->name          =   trim($vals->name);
                $str->description          =   strip_tags(htmlspecialchars_decode($vals->description));
                $str->keyword          =   strip_tags(htmlspecialchars_decode($vals->name));
                $str->seo_url          =   $this->bookinglib->seoUrl($vals->name);
                $str->owner          =   1;
                $str->lastupdated          =   time();
                
                $this->cronjob_model->create($str);
                unset($str);
            }
        }
        
        public function insertCateNew(){
            $updateCateNew = $this->category_model->find_by();
            foreach($updateCateNew as $keys => $vals){
                $str                =   new stdClass();
                $str->name          =   trim($vals->name);
                $str->description          =   strip_tags(htmlspecialchars_decode($vals->description));
                $str->keyword          =   strip_tags(htmlspecialchars_decode($vals->name));
                $str->seo_url          =   $this->bookinglib->seoUrl($vals->name);
                $str->type          =   $vals->type;
                $str->owner          =   1;
                $str->lastupdated          =   time();
                
                $this->cronjob_model->create($str);
                unset($str);
            }
        }
        
}
