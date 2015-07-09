<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
// --------------------------------------------------------------------

if (!function_exists('get_list_server_play')) {
    function get_list_server_play($url_list_server="") {
        $list = array();
        if($url_list_server!=""){
            $allServer = @json_decode(@file_get_contents($url_list_server));
            if(!empty($allServer)){
                foreach($allServer as $server){
                    if($server->playEnabled==1){
                        $list[] = $server;
                    }
                }
            }
        }
        return $list;
    }
}

if (!function_exists('get_list_server_bt')) {
    function get_list_server_bt($url_list_server="") {
        $list = array();
        if($url_list_server!=""){
            $list = @json_decode(@file_get_contents($url_list_server));
        }
        return $list;
    }
}

if (!function_exists('get_list_server_topup')) {

    function get_list_server_topup($url_list_server="") {
        $list = array();
        if($url_list_server!=""){
            $allServer = @json_decode(@file_get_contents($url_list_server));
            if(!empty($allServer)){
                foreach($allServer as $server){
                    if($server->topupEnabled==1){
                        $list[] = $server;
                    }
                }
            }
        }
        return $list;
    }

}

if (!function_exists('get_hot_OR_news_server')){
    
    function get_hot_OR_news_server($list_server = array(), $num_server = 2){
        if(!empty($list_server)){
            $list = array();
            //lấy server hot, số lượng = $num_server
            foreach($list_server as $server){
                if(count($list)<$num_server){
                    if($server->ishot==1){
                        $list[] = $server;
                    }
                }else break;
            }
            //nếu số lượng server < $num_server, lấy thêm server mới add vào cho = $num_server
            if (count($list) < $num_server) {
                foreach ($list_server as $server) {
                    if (count($list) < $num_server) {
                        if(!in_array($server, $list)){
                            $list[] = $server;
                        }
                    }else break;
                }
            }
            return $list;
        }
    }
    
}