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
        //$this->debugging = TRUE;
        //global $URI;
        //if (!empty($URI->segments[1])) {
          //  $this->lang = $URI->segments[1] . '/';
        //}
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

    function view($name, $location = 'pagecontent') {
        if (substr_count($name, ".") == 0) {
            $filePath = APPPATH . "views/" . $this->lang . $name . '.tpl';
        } else {
            $filePath = APPPATH . "views/" . $this->lang . $name;
        }
        //echo $filePath;
        if (file_exists($filePath)) {
            $content = $this->fetch($filePath);
            $this->assign($location, $content);
        } else {
            show_error('Unable to load the requested file: ' . $filePath);
        }
    }

    function get_contents($html) {
        if (substr_count($html, ".") == 0) {
            $filePath = APPPATH . "views/" . $this->lang . $html . '.tpl';
        } else {
            $filePath = APPPATH . "views/" . $this->lang . $html;
        }
        if (file_exists($filePath)) {
            return $this->fetch($filePath);
        } else {
            show_error('Unable to load the requested file: ' . $filePath);
        }
    }

}