<?php

    /* ****** ****** ****** ****** ****** ******
    *
    * Author       :   Shafiul Azam
    *              :   ishafiul@gmail.com
    *              :   Core Developer
    * Page         :
    * Description  :
    * Last Updated :
    *
    * ****** ****** ****** ****** ****** ******/



class Page {
    //put your code here
    public $CI;

    public $cssDir = 'templates/css/default/';
    public $jsDir = 'templates/js/default/';

    public $defaultCssArr = array();
    public $cssArr = array();
    public $jsArr = array();
    public $defaultJsArr = array();

    public $title = 'Academic Network';

    function  __construct() {
        $this->CI = & get_instance();
        $this->CI->load->helper('url');
    }

    function set($array, $type='css'){
        if($type=='css'){
            $this->cssArr = $array;
        }else if($type == "js"){
            $this->jsArr = $array;
        }
    }

    function get($type="css",$default=false){
        $html = "<!-- Inserting $type -->";
        if($type == "css"){
            $arr = ($default)?($this->defaultCssArr):($this->cssArr);
            foreach ($arr as $i){
                $html .= '<link rel="stylesheet" type="text/css" media="screen,projection,print" href="' . base_url() . $this->cssDir . $i . '" />';
            }
        }else if($type == "js"){
            $arr = ($default)?($this->defaultJsArr):($this->jsArr);
            foreach ($arr as $i){
                $html .= '<script src = "' . base_url() . $this->cssDir . $i . '"></script>';
            }
        }
        return $html;
    }

    function img($src,$w='', $h = '', $alt='Image!'){
        return "<img width = '$w' height = '$h' alt = '$alt' src = '" . base_url() . $this->cssDir . "$src' />";
    }

    function contentFormat($title,$body){
        return "<h1 class=\"pagetitle\">$title</h1>
                    <div class=\"column1-unit\">$body</div>";
    }

    function rSidebarFormat($title,$body){
        return "<div class=\"subcontent-unit-border\">
                        <div class=\"round-border-topleft\"></div><div class=\"round-border-topright\"></div>
                        <h1>$title</h1>$body</div>";
    }

    function loadAllViews($header = null, $left_sidebar=null, $content=null, $right_sidebar=null, $footer=null){
        $h = $header;
        if(!isset ($header)){
            $h = array();
            $h['file'] = 'default/header';
            $h['arr'] = array();
        }
        $this->CI->load->view($h['file'], $h['arr']);
        
        $h = $left_sidebar;
        if(!isset ($left_sidebar)){
            $h = array();
            $h['file'] = 'default/left_sidebar';
            $h['arr'] = array();
        }
        $this->CI->load->view($h['file'], $h['arr']);

        $h = $content;
        if(!isset ($content)){
            $h = array();
            $h['file'] = 'default/content';
            $h['arr'] = array();
        }
        $this->CI->load->view($h['file'], $h['arr']);

        $h = $right_sidebar;
        if(!isset ($right_sidebar)){
            $h = array();
            $h['file'] = 'default/right_sidebar';
            $h['arr'] = array();
        }
        $this->CI->load->view($h['file'], $h['arr']);

        $h = $footer;
        if(!isset ($footer)){
            $h = array();
            $h['file'] = 'default/footer';
            $h['arr'] = array();
        }
        $this->CI->load->view($h['file'], $h['arr']);
    }



}
?>
