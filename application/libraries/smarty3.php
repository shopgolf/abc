<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once("smarty3/Smarty.class.php");

class CI_Smarty3 extends Smarty {

    var $lang = '';

    function __construct() {
        parent::__construct();
        $this->template_dir = APPPATH."views/";
        $this->compile_dir = 'views_c/';
        $this->caching = 0; //0 = no caching; 1 = use class cache_lifetime value; 2 = use cache_lifetime in cache file
        $this->cache_dir = 'cache/';
        $this->cache_lifetime = 3600;
        $this->left_delimiter = '{{';
        $this->right_delimiter = '}}';
    }

    function display($html) {
        if (substr_count($html, ".") == 0) {
            $filePath = APPPATH . "views/" . $this->lang . $html . '.tpl';
        } else {
            $filePath = APPPATH . "views/" . $this->lang . $html;
        }
        if (file_exists($filePath)) {
            parent::display($filePath);
        } else {
            show_error('Unable to load the requested file: ' . $filePath);
        }
    }

    function view_tmp($filePath, $location = 'pagecontent') {
        if (substr_count($filePath, ".") == 0) {
            $_filePath = APPPATH.'views/'.$filePath . '.tpl';
        } else {
            $_filePath = APPPATH.'views/'.$filePath;
        }
        if (file_exists($_filePath)) {
            $content = $this->fetch($_filePath);
            return $content;
        } else {
            show_error('Unable to load the requested file: ' . $_filePath);
        }
    }

}