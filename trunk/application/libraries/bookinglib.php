<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class bookinglib {

    function __construct() {
        
    }
    
    public function rand_string_limit($length){
        $str        = "";
        $chars  = "0123456789";
        $size   = strlen( $chars );
        for( $i = 0; $i < $length; $i++ ) {
            $str .= $chars[ rand( 0, $size - 1 ) ];
        }
        return $str;
    }
    
    public function createCustomerID(){
        return date("imd").$this->rand_string_limit(4).date("s");
    }
    
    public function direct(){
        $checkDirect = $_SERVER['HTTP_REFERER'];
        if(!isset($checkDirect)){
            redirect(base_url());
        }
    }
    
    public function my_number_format($number, $dec_point, $thousands_sep) 
    { 
        $was_neg = $number < 0; // Because +0 == -0 
        $number = abs($number); 

        $tmp = explode('.', $number); 
        $out = number_format($tmp[0], 0, $dec_point, $thousands_sep); 
        if (isset($tmp[1])) $out .= $dec_point.$tmp[1]; 

        if ($was_neg) $out = "-$out"; 

        return $out; 
    }
    
    function getweekday($params) {
        $params_thang_nam   =   explode('/',$params);
        $params             =   $params_thang_nam[0];
        $thang              =   $params_thang_nam[1];
        $nam                =   $params_thang_nam[2];
        $jd                 =   cal_to_jd(CAL_GREGORIAN,$thang,$params,$nam);
        $day                =   jddayofweek($jd,0);
        switch($day)
        {
            case 0:
            $thu="Chủ nhật";
            break;
            case 1:
            $thu="Thứ hai";
            break;
            case 2:
            $thu="Thứ ba";
            break;
            case 3:
            $thu="Thứ tư";
            break;
            case 4:
            $thu="Thứ năm";
            break;
            case 5:
            $thu="Thứ sáu";
            break;
            case 6:
            $thu ="Thứ bảy";
            break;
       }
       return $thu;
    }
    
    function checkPhoneValid($params){       
        $result = json_decode($params);
        $i = 0;
        while($i < count($result)){
            $shortrest = substr($result[$i], -9, 1);
            if($shortrest != 9){
                $longrest = substr($result[$i], -10, 1);
                if($longrest != 1){
                    unset($result[$i]);
                }
            } else {
                $result[$i] = '0'.substr($result[$i],-9);
            }
            $i++;
        }
        unset($i);
        return $result;
    }
    
    function isInteger($input)
    {
        if(strpos($input,".")){
            $input=preg_replace("/\.$/","",rtrim(strval($input),"0"));
        }
        return ctype_digit($input);
    }
    
    function onlyNumbers($string){ 
        //This function removes all characters other than numbers 
        //Esta função limpa a url e conserva apenas os numeros 
        $string = preg_replace("/[^0-9]/", "", $string); 
        return (int) $string; 
    }
    function secondsToTime($seconds)
    {
        // extract hours
        $hours = floor($seconds / (60 * 60));

        // extract minutes
        $divisor_for_minutes = $seconds % (60 * 60);
        $minutes = floor($divisor_for_minutes / 60);

        // extract the remaining seconds
        $divisor_for_seconds = $divisor_for_minutes % 60;
        $seconds = ceil($divisor_for_seconds);

        // return the final array
        $obj = array(
            "h" => (int) $hours,
            "m" => (int) $minutes,
            "s" => (int) $seconds,
        );
        return $obj;
    }
    
    function removeSignText($cs, $tolower = false)
    {
        $marTViet=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
        "ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề",
        "ế","ệ","ể","ễ",
        "ì","í","ị","ỉ","ĩ",
        "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ",
        "ờ","ớ","ợ","ở","ỡ",
        "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
        "ỳ","ý","ỵ","ỷ","ỹ",
        "đ",
        "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă",
        "Ằ","Ắ","Ặ","Ẳ","Ẵ",
        "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
        "Ì","Í","Ị","Ỉ","Ĩ",
        "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
        "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
        "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
        "Đ"," ");

        $marKoDau=array("a","a","a","a","a","a","a","a","a","a","a",
        "a","a","a","a","a","a",
        "e","e","e","e","e","e","e","e","e","e","e",
        "i","i","i","i","i",
        "o","o","o","o","o","o","o","o","o","o","o","o",
        "o","o","o","o","o",
        "u","u","u","u","u","u","u","u","u","u","u",
        "y","y","y","y","y",
        "d",
        "A","A","A","A","A","A","A","A","A","A","A","A",
        "A","A","A","A","A",
        "E","E","E","E","E","E","E","E","E","E","E",
        "I","I","I","I","I",
        "O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O",
        "U","U","U","U","U","U","U","U","U","U","U",
        "Y","Y","Y","Y","Y",
        "D","-");

        if ($tolower) {
                return strtolower(str_replace($marTViet,$marKoDau,$cs));
        }
        return str_replace($marTViet,$marKoDau,$cs);
    }
    
    function convertCachToText($amount)
    {
             if($amount <=0)
            {
                return $textnumber="Tiền phải là số nguyên dương lớn hơn số 0";
            }
            $Text=array("không", "một", "hai", "ba", "bốn", "năm", "sáu", "bảy", "tám", "chín");
            $TextLuythua =array("","nghìn", "triệu", "tỷ", "ngàn tỷ", "triệu tỷ", "tỷ tỷ");
            $textnumber = "";
            $length = strlen($amount);

            for ($i = 0; $i < $length; $i++)
            $unread[$i] = 0;

            for ($i = 0; $i < $length; $i++)
            {               
                $so = substr($amount, $length - $i -1 , 1);                

                if ( ($so == 0) && ($i % 3 == 0) && ($unread[$i] == 0)){
                    for ($j = $i+1 ; $j < $length ; $j ++)
                    {
                        $so1 = substr($amount,$length - $j -1, 1);
                        if ($so1 != 0)
                            break;
                    }                       

                    if (intval(($j - $i )/3) > 0){
                        for ($k = $i ; $k <intval(($j-$i)/3)*3 + $i; $k++)
                            $unread[$k] =1;
                    }
                }
            }

            for ($i = 0; $i < $length; $i++)
            {        
                $so = substr($amount,$length - $i -1, 1);       
                if ($unread[$i] ==1)
                continue;

                if ( ($i% 3 == 0) && ($i > 0))
                $textnumber = $TextLuythua[$i/3] ." ". $textnumber;     

                if ($i % 3 == 2 )
                $textnumber = 'trăm ' . $textnumber;

                if ($i % 3 == 1)
                $textnumber = 'mươi ' . $textnumber;


                $textnumber = $Text[$so] ." ". $textnumber;
            }

            //Phai de cac ham replace theo dung thu tu nhu the nay
            $textnumber = str_replace("không mươi", "lẻ", $textnumber);
            $textnumber = str_replace("lẻ không", "", $textnumber);
            $textnumber = str_replace("mươi không", "mươi", $textnumber);
            $textnumber = str_replace("một mươi", "mười", $textnumber);
            $textnumber = str_replace("mươi năm", "mươi lăm", $textnumber);
            $textnumber = str_replace("mươi một", "mươi mốt", $textnumber);
            $textnumber = str_replace("mười năm", "mười lăm", $textnumber);

            return ucfirst($textnumber." đồng chẵn");
    }
    
    function apiCurl($params){
            // Get cURL resource
             $curl = curl_init();
             // Set some options - we are passing in a useragent too here
             curl_setopt_array($curl, array(
                 CURLOPT_RETURNTRANSFER => 1,
                 CURLOPT_URL => SMS_API_URL,
                 CURLOPT_USERAGENT => 'Codular Sample cURL Request',
                 CURLOPT_POST => 1,
                 CURLOPT_POSTFIELDS => $params
             ));
             // Send the request & save response to $resp
             $resp = curl_exec($curl);
             // Close request to clear up some resources
             curl_close($curl);
             return $resp;
    }
    
    public function apiPostGetContent($params){
        
            $postdata = http_build_query(
                $params
            );

            $opts = array('http' =>
                array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'content' => $postdata
                )
            );

            $context  = stream_context_create($opts);

            return file_get_contents(SMS_API_URL, false, $context);
    }
}
