<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login_service {

    var $base_url = ID_URL;
    var $wsUsername = wsUserName;
    var $wsPassword = wsPassword;
	

    function __construct() {
        
    }

    function login($username, $password) {
        // define value
        $wsUserName = $this->wsUsername;
        $wsPassword = $this->wsPassword;
        $ip = "";
        $Signature = md5($username . $password . $wsUserName . $wsPassword);
        $url = $this->base_url . "api/api/checkLogin";
        $data = array(
            'UserName' => $username,
            'Password' => $password,
            'wsUserName' => $wsUserName,
            'wsPassword' => $wsPassword,
            'Signature' => $Signature,
            'Ip' => $ip
        );

        $checkLoginResult = do_post_request($url, $data); // ignore ssl
        switch ($checkLoginResult) {
            case '-888':
                $result['code'] = $checkLoginResult;
                $result['msg'] = "Tài khoản hoặc mật khẩu không đúng."; //'Lỗi hệ thống.';
                break;
            case '-110':
                $result['code'] = $checkLoginResult;
                $result['msg'] = 'Tham số của hàm không hợp lệ.';
                break;
            case '-102':
                $result['code'] = $checkLoginResult;
                $result['msg'] = 'Chữ ký điện tử không hợp lệ.';
                break;
            case '-101':
                $result['code'] = $checkLoginResult;
                $result['msg'] = 'Ip bị cấm truy cập WebService.';
                break;
            case '-100':
                $result['code'] = $checkLoginResult;
                $result['msg'] = 'Tài khoản WebService không tồn tại.';
                break;
            case '-1':
                $result['code'] = $checkLoginResult;
                $result['msg'] = 'Tài khoản hoặc mật khẩu không đúng.';
                break;
            default :
                $result['code'] = 1;
                $result['msg'] = $checkLoginResult;
        }
        //print_r($result);exit;
        return $result;
    }

    function register($username, $password, $email, $utm_source) {
        $ip = "";
        $Signature = md5($username . $email . $password . $this->wsUsername . $this->wsPassword);
        $url = $this->base_url . "api/api/register";
        $data = array(
            'UserName' => $username,
            'Email' => $email,
            'Source' => $utm_source,
            'Password' => $password,
            'wsUserName' => $this->wsUsername,
            'wsPassword' => $this->wsPassword,
            'Signature' => $Signature,
            'Ip' => $ip
        );
        $quickRegisterResult = do_post_request($url, $data); // ignore ssl

        switch ($quickRegisterResult) {
            case '-888':
                $result['code'] = $quickRegisterResult;
                $result['msg'] = 'Lỗi hệ thống.';
                break;
            case '-110':
                $result['code'] = $quickRegisterResult;
                $result['msg'] = 'Tham số của hàm không hợp lệ.';
                break;
            case '-102':
                $result['code'] = $quickRegisterResult;
                $result['msg'] = 'Chữ ký điện tử không hợp lệ.';
                break;
            case '-101':
                $result['code'] = $quickRegisterResult;
                $result['msg'] = 'Ip bị cấm truy cập WebService.';
                break;
            case '-100':
                $result['code'] = $quickRegisterResult;
                $result['msg'] = 'Tài khoản WebService không tồn tại.';
                break;
            case '-2':
                $result['code'] = $quickRegisterResult;
                $result['msg'] = 'Tài khoản không hợp lệ hoặc đã được đăng ký.';
                break;
            case '-3':
                $result['code'] = $quickRegisterResult;
                $result['msg'] = 'Email không hợp lệ hoặc đã được đăng ký.';
                break;
            case '-4':
                $result['code'] = $quickRegisterResult;
                $result['msg'] = 'Mật khẩu quá đơn giản.';
                break;
            case '-5':
                $result['code'] = $quickRegisterResult;
                $result['msg'] = 'Mật khẩu không được trùng với tài khoản.';
                break;
            default :
                $result['code'] = 1;
                $result['msg'] = $quickRegisterResult;
        }
        return $result;
    }

    function checkEmail($email) {
        $Email = $email;
        $wsUserName = $this->wsUsername;
        $wsPassword = $this->wsPassword;
        $ip = "";
        $Signature = md5($Email . $wsUserName . $wsPassword);
        $url = $this->base_url . "api/api/checkEmail";
        $data = array(
            'Email' => $Email,
            'wsUserName' => $wsUserName,
            'wsPassword' => $wsPassword,
            'Signature' => $Signature,
            'Ip' => $ip
        );
        $checkEmailResult = do_post_request($url, $data); // ignore ssl

        return $checkEmailResult;
    }

    function linkToGame($server, $username) {

        // define value            
        $Server = $server;
        $UserName = $username; // admin@gmail.com
        $Time = time();
        $wsUserName = $this->wsUsername;
        $wsPassword = $this->wsPassword;
        $ip = "";
        $Signature = md5($Server . $UserName . $Time . $wsUserName . $wsPassword);
        $url = $this->base_url . "api_server/server/linkToGame";
        $data = array(
            'Server' => $Server,
            'UserName' => $UserName,
            'Time' => $Time,
            'wsUserName' => $wsUserName,
            'wsPassword' => $wsPassword,
            'Signature' => $Signature,
            'Ip' => $ip
        );
        $result = urldecode(do_post_request($url, $data));
        return $result;
    }

    function Chanelling_linkToGame($UserName = NULL, $ServerName = NULL, $PartnerID = NULL, $SecretKey) {

        // define value            
        $PartnerID = $PartnerID;
        $GameID = GAME_ID;
        $Server = $ServerName;
        $UserName = $UserName;
        $Time = TIME;
        $ip = "";
        $Signature = md5($PartnerID . $GameID . $Server . $UserName . $Time . $SecretKey);
        $url = $this->base_url . "api/chanelling/linkToGame";
        $data = array(
            'PartnerID' => $PartnerID,
            'Server' => $Server,
            'UserName' => $UserName,
            'Time' => $Time,
            'Signature' => $Signature,
            'Ip' => $ip
        );
        ///
        $result = do_post_request($url, $data); // ignore ssl
        return urldecode($result);
    }

    public function check_username($username, $ip) {
        $url = $this->base_url . "api/api/checkUserName";

        $data = array(
            "UserName" => $username,
            "IP" => $ip,
            "wsUserName" => $this->wsUsername,
            "wsPassword" => $this->wsPassword,
            "Signature" => md5($username . $this->wsUsername . $this->wsPassword)
        );

        $result = do_post_request($url, $data); // ignore ssl
        return $result;
    }

    function Chanelling_getUserInfo($UserName = NULL, $PartnerID = NULL, $SecretKey = NULL) {
        // define value   
        $PartnerID = $PartnerID;
        $GameID = GAME_ID;
        $UserName = $UserName; // admin@gmail.com                
        $SecretKey = $SecretKey;
        $ip = "";
        $Signature = md5($PartnerID . $GameID . $UserName . $SecretKey);
        $url = $this->base_url . "api/chanelling/getUserInfo";
        $data = array(
            'PartnerID' => $PartnerID,
            'UserName' => $UserName,
            'Signature' => $Signature,
            'Ip' => $ip
        );
        ///        
        $result = do_post_request($url, $data); // ignore ssl
        return $result;
    }

    function _curl($url, $data) {
        /// 
        if (!isset($timeout))
            $timeout = 30;
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_POST, 1);
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // ignore HTTPS
        $buffer = curl_exec($curl_handle);
        curl_close($curl_handle);

        return $buffer;
    }

    function logout() {
        // Finally, destroy the session.
        session_destroy();
    }
    
    function getUserCardLog($username) {
        // define value
        $wsUserName = $this->wsUsername;
        $wsPassword = $this->wsPassword;
        $ip = "";
        $Signature = md5($username . $wsUserName . $wsPassword);
        $url = $this->base_url . "api/api/getUserCardLog";
        $data = array(
            'UserName' => $username,
            'wsUserName' => $wsUserName,
            'wsPassword' => $wsPassword,
            'Signature' => $Signature,
            'Ip' => $ip
        );

        $checkLoginResult = do_post_request($url, $data); // ignore ssl
        switch ($checkLoginResult) {
            case '-888':
                $result['code'] = $checkLoginResult;
                $result['msg'] = "Tài khoản hoặc mật khẩu không đúng."; //'Lỗi hệ thống.';
                break;
            case '-110':
                $result['code'] = $checkLoginResult;
                $result['msg'] = 'Tham số của hàm không hợp lệ.';
                break;
            case '-102':
                $result['code'] = $checkLoginResult;
                $result['msg'] = 'Chữ ký điện tử không hợp lệ.';
                break;
            case '-101':
                $result['code'] = $checkLoginResult;
                $result['msg'] = 'Ip bị cấm truy cập WebService.';
                break;
            case '-100':
                $result['code'] = $checkLoginResult;
                $result['msg'] = 'Tài khoản WebService không tồn tại.';
                break;
            case '-1':
                $result['code'] = $checkLoginResult;
                $result['msg'] = 'Tài khoản hoặc mật khẩu không đúng.';
                break;
            default :
                $result['code'] = 1;
                $result['msg'] = $checkLoginResult;
        }
        //print_r($result);exit;
        return $result;
    }
}
