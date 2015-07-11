<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login_service {

    var $api_url = API_URL;
    
    function __construct() {
        
    }

    function getsListPhone(){
        $ip                 = "";
        $Signature          = md5(API_TOKEN);
        $url                = $this->api_url . "/api/getsListPhone";
        $data = array(
            'API_TOKEN'     => API_TOKEN,
            'Signature'     => $Signature,
            'Ip'            => $ip
        );

        $response           = do_post_request($url, $data);
        switch ($response){
            case '-110':
                $result['code'] = $response;
                $result['msg']  = 'Mã bảo mật không chính xác';
            case '-111':
                $result['code'] = $response;
                $result['msg']  = 'Chữ ký điện tử không hợp lệ';
            default :
                $result['code'] = $response;
                $result['msg']  = '';
        }
        return $result;
    }
}
