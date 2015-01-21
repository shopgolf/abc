<?php
class My_controller extends CI_Controller{
	public function __construct(){
		parent:: __construct();
	}

	public function replace($str) {
		if(!$str) return false;
  	        $unicode = array(
        		'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'),
  	            'A'=>array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
  	            'd'=>array('đ'),
				'-'=>array('-'),
  	            'D'=>array('Đ'),
  	            'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
  	            'E'=>array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
  	            'i'=>array('í','ì','ỉ','ĩ','ị'),
  	            'I'=>array('Í','Ì','Ỉ','Ĩ','Ị'),
  	            'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
  	            '0'=>array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
  	            'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
  	            'U'=>array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
  	            'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'),
  	            'Y'=>array('Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
  	            '-'=>array(',',' ','&quot;','.',';',':'),
				''=>array(' ,',', ',' .','. ',' ;','; ',' :',': ',"'")
  	        );
  	        foreach($unicode as $nonUnicode=>$uni){
  	        	foreach($uni as $value)
            	$str = str_replace($value,$nonUnicode,$str);
				$str = strtolower($str);
				
  	        }
    	return $str;	
	}

	public function debug($val){
	    echo "<pre>";
	    	print_r($val);
	    echo "</pre>";
	    die();
	}
//Clean XSS
	public function fillter($str){
		$str = str_replace("<", "&lt;", $str);
		$str = str_replace(">", "&gt;", $str);
		$str = str_replace("&", "&amp;", $str);			
		$str = str_replace("|", "&brvbar;", $str);
		$str = str_replace("~", "&tilde;", $str);
		$str = str_replace("`", "&lsquo;", $str);
		$str = str_replace("#", "&curren;", $str);
		$str = str_replace("%", "&permil;", $str);
		$str = str_replace("'", "&rsquo;", $str);
		$str = str_replace("\"", "&quot;", $str);
		$str = str_replace("\\", "&frasl;", $str);
		$str = str_replace("--", "&ndash;&ndash;", $str);
		$str = str_replace("ar(", "ar&Ccedil;", $str);
		$str = str_replace("Ar(", "Ar&Ccedil;", $str);
		$str = str_replace("aR(", "aR&Ccedil;", $str);
		$str = str_replace("AR(", "AR&Ccedil;", $str);
		return htmlspecialchars($str);
	}
// get IP
	public function get_ip() {
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
   //this is function cut string description
  public function cut( $str, $limit, $more=" ..."){
      if ($str=="" || $str == NULL || is_array($str) || strlen($str)==0)
          return $str;
      $str = trim($str);
       
      if (strlen($str) <= $limit) return $str;
      $str = substr($str,0,$limit);
  
      if (!substr_count($str," ")){
          if ($more) $str .= " ...";
          return $str;
      }
      while(strlen($str) && ($str[strlen($str)-1] != " ")){
          $str = substr($str,0,-1);
      }
      $str = substr($str,0,-1);
      if ($more) $str .= " ...";
      return $str;
  }

  //this is function fetch contetn
  public function fetch($template = null,$data = array()){
    ob_start();
    $this->load->view($template,$data);
    $content = ob_get_contents();
    ob_get_clean();
    return $content;
  } 
}