<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (!function_exists("get_data")) {
    function get_data($url)
	{
		$ch = curl_init();
		$timeout = 50;
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // ignore HTTPS
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
		curl_setopt($ch, CURLOPT_HEADER, false);

		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
}
if (!function_exists("do_post_request")) {
    function do_post_request($url, $data) {

        $query = http_build_query($data);

        $ch = curl_init(); // Init cURL

        curl_setopt($ch, CURLOPT_URL, $url); // Post location
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // 1 = Return data, 0 = No return
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // ignore HTTPS
        curl_setopt($ch, CURLOPT_POST, 1); // This is POST
        curl_setopt($ch, CURLOPT_POSTFIELDS, $query); // Add the data to the request

		$response = curl_exec($ch); // Execute the request
        curl_close($ch); // Finish the request

        if ($response) {
            return $response;
        } else {
            return NULL;
        }
    }
}

if (!function_exists("decrypt")) {
    function decrypt($input, $key_seed) {

        $input = @base64_decode($input);
        $key = @substr(md5($key_seed), 0, 24);
        $text = @mcrypt_decrypt(MCRYPT_TRIPLEDES, $key, $input, MCRYPT_MODE_ECB, '12345678');
        $block = @mcrypt_get_block_size('tripledes', 'ecb');

        $packing = @ord($text{strlen($text) - 1});
        if ($packing and ($packing < $block)) {
            for ($P = @strlen($text) - 1; $P >= @strlen($text) - $packing; $P--) {
                if (@ord($text{$P}) != $packing) {
                    $packing = 0;
                }
            }
        }
        $text = @substr($text, 0, strlen($text) - $packing);

        return $text;
    }
}
if (!function_exists("getIP")) {
    function getIP() {
        $ip = '';
        if (getenv("HTTP_CLIENT_IP"))
            $ip = getenv("HTTP_CLIENT_IP");
        else if (getenv("HTTP_X_FORWARDED_FOR"))
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        else if (getenv("REMOTE_ADDR"))
            $ip = getenv("REMOTE_ADDR");
        else
            $ip = "UNKNOWN";

        $ip = explode(',', $ip);
        return $ip[0];
    }
}
if (!function_exists("ascii_to_entities")) {
    function ascii_to_entities($str) 
    { 
    $count    = 1; 
    $out    = ''; 
    $temp    = array(); 

    for ($i = 0, $s = strlen($str); $i < $s; $i++) 
    { 
        $ordinal = ord($str[$i]); 

        if ($ordinal < 128) 
        { 
                if (count($temp) == 1) 
                { 
                    $out  .= '&#'.array_shift($temp).';'; 
                    $count = 1; 
                } 

                $out .= $str[$i]; 
        } 
        else 
        { 
            if (count($temp) == 0) 
            { 
                $count = ($ordinal < 224) ? 2 : 3; 
            } 

            $temp[] = $ordinal; 

            if (count($temp) == $count) 
            { 
                $number = ($count == 3) ? (($temp['0'] % 16) * 4096) + 
    (($temp['1'] % 64) * 64) + 
    ($temp['2'] % 64) : (($temp['0'] % 32) * 64) + 
    ($temp['1'] % 64); 

                $out .= '&#'.$number.';'; 
                $count = 1; 
                $temp = array(); 
            } 
        } 
    } 

    return $out; 
    }
}
if (!function_exists("htmlentities_UTF8")) {

    function htmlentities_UTF8($str) {
        return htmlentities($str, ENT_QUOTES, 'utf-8');
    }

}
if (!function_exists("htmlentities_decode_UTF8")) {

    function htmlentities_decode_UTF8($str) {
        return html_entity_decode($str, ENT_QUOTES, 'utf-8');
    }

}
if (!function_exists("JO_location")) {

    function JO_location($URL = false) {
        if ($URL)
            exit("<script> try { parent.location.replace ( '" . $URL . "'						); } catch ( exception ) { location.replace( '" . $URL . "'							); } </script>");
        else
            exit("<script> try { parent.location.replace ( '" . $_SERVER["HTTP_REFERER"] . "'	); } catch ( exception ) { location.replace( '" . $_SERVER["HTTP_REFERER"] . "'	); } </script>");
    }

}
if (!function_exists("objectToArray")) {

    function objectToArray($d) {
        if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
        }

        if (is_array($d)) {
            /*
             * Return array converted to object
             * Using __FUNCTION__ (Magic constant)
             * for recursive call
             */
            return array_map(__FUNCTION__, $d);
        } else {
            // Return array
            return $d;
        }
    }

}
if (!function_exists("convertUrl")) {

    function convertUrl($str) {
        $remove = "~ ` ! @ # $ % ^ & * ( ) _ + | \\ = ' \" ; : ? / > . , < ] [ { }";
        $from = "à á ạ ả ã â ầ ấ ậ ẩ ẫ ă ằ ắ ặ ẳ ẵ è é ẹ ẻ ẽ ê ề ế ệ ể ễ ì í ị ỉ ĩ ò ó ọ ỏ õ ô ồ ố ộ ổ ỗ ơ ờ ớ ợ ở ỡ ù ú ụ ủ ũ ư ừ ứ ự ử ữ ỳ ý ỵ ỷ ỹ đ ";
        $to = "a a a a a a a a a a a a a a a a a e e e e e e e e e e e i i i i i o o o o o o o o o o o o o o o o o u u u u u u u u u u u y y y y y d ";
        $from .= " À Á Ạ Ả Ã Â Ầ Ấ Ậ Ẩ Ẫ Ă Ằ Ắ Ặ Ẳ Ẵ È É Ẹ Ẻ Ẽ Ê Ề Ế Ệ Ể Ễ Ì Í Ị Ỉ Ĩ Ò Ó Ọ Ỏ Õ Ô Ồ Ố Ộ Ổ Ỗ Ơ Ờ Ớ Ợ Ở Ỡ Ù Ú Ụ Ủ Ũ Ư Ừ Ứ Ự Ử Ữ Ỳ Ý Ỵ Ỷ Ỹ Đ ";
        $to .= " a a a a a a a a a a a a a a a a a e e e e e e e e e e e i i i i i o o o o o o o o o o o o o o o o o u u u u u u u u u u u y y y y y d ";
        $remove = explode(" ", $remove);
        $from = explode(" ", $from);
        $to = explode(" ", $to);
        $str = str_replace($from, $to, $str);
        $str = str_replace($remove, "", $str);
        $str = strip_tags($str);
        $str = iconv("UTF-8", "ISO-8859-1//TRANSLIT//IGNORE", $str);
        //$str = iconv("ISO-8859-1","UTF-8",$str);
        $str = str_replace(" ", "-", $str);
        while (!(strpos($str, "--") === false)) {
            $str = str_replace("--", "-", $str);
        }

        $str = strtolower($str);
        return $str;
    }

}

if (!function_exists("get_real_ip")) {
    function get_real_ip()
    {
            $ip = false;
            if(!empty($_SERVER['HTTP_CLIENT_IP']))
            {
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
            if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            {
                    $ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
                    if($ip)
                    {
                            array_unshift($ips, $ip);
                            $ip = false;
                    }
                    for($i = 0; $i < count($ips); $i++)
                    {
                            if(!preg_match("/^(10|172\.16|192\.168)\./i", $ips[$i]))
                            {
                                            if(version_compare(phpversion(), "5.0.0", ">="))
                                            {
                                                    if(ip2long($ips[$i]) != false)
                                                    {
                                                            $ip = $ips[$i];
                                                            break;
                                                    }
                                            }
                                            else
                                            {
                                                    if(ip2long($ips[$i]) != - 1)
                                                    {
                                                            $ip = $ips[$i];
                                                            break;
                                                    }
                                            }
                            }
                    }
            }
            return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
    } 
}