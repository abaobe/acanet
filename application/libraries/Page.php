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

    public $theme = "default/";

    public $cssjsDir = 'templates/';

    public $defaultCssArr = array();
    public $cssArr = array();
    public $jsArr = array();
    public $defaultJsArr = array('jquery-1.5.2.min','registerscript');

    public $title = 'Academic Network';

    public $nav1;

    public $nav2;
    public $breadcrumbs; 
    

    function  __construct() {
        $this->CI = & get_instance();
        $this->CI->load->helper('url');

        $this->nav1 = array(
            "Home" => base_url(),
            "Registration" => site_url('registration')
        );
        // dummy breadcrumb
        $this->breadcrumbs = array(
            "Home" => base_url(),
            "Members" => "#",
            "Something" => "#"
        );

        // dummy nav2 : Should be set in the controller page
        //multidimention array --> ([]([main name,url])([subnames]=>url))
        $this->nav2 = array(
            array(
                  array(
                        "Home", base_url()
                       )
                ),
            array(
                array(
                      "Communities", "community/index"
                    ),
                    array(
                        "CSE" => "community/index/cse",
                        "EEE" => "community/index/eee",
                        "MME" => "community/index/mme"
                    )
                ),
            array(
                array(
                       "Institutions", "institute/index"
                    ),
                    array(
                        "BUET" => "community/buet",
                        "DU" => "community/du",
                        "DMC" => "community/dmc"
                    )
                )
        );
    }

    function set($array, $type='css'){       
        if($type=='css'){
            $this->cssArr = array_merge($this->cssArr ,$array);
        }else if($type == "js"){
            $this->jsArr = array_merge($this->jsArr,$array);
        }        
    }

    function get($type="css",$default=false){       
        $html = "<!-- Inserting $type -->";
        if($type == "css"){
            $arr = ($default)?($this->defaultCssArr):($this->cssArr);
            foreach ($arr as $i){
                $html .= '<link rel="stylesheet" type="text/css" media="screen,projection,print" href="' . base_url() . $this->cssjsDir . $this->theme . "css/" . $i . '.css" />';
            }
        }else if($type == "js"){
            $arr = ($default)?($this->defaultJsArr):($this->jsArr);
            foreach ($arr as $i){
                $html .= '<script src = "' . base_url() . $this->cssjsDir . $this->theme . "js/" . $i . '.js"></script>';
            }
        }
        return $html;
    }

    function img($src,$w='', $h = '', $alt='Image!'){
        return "<img width = '$w' height = '$h' alt = '$alt' src = '" . base_url() . $this->cssjsDir . $this->theme . "img/" . "$src' />";
    }



    function loadViews($left_sidebar = null, $content = null, $right_sidebar = null){
        if( !isset($left_sidebar) && !isset($right_sidebar)){
            // Only Middle Sidebar present!
            // Set CSS
            $this->set(array('layout1_setup', 'layout1_text'),'css');
            // Load actual views
            $this->CI->load->view($this->theme . "general/header");
            $this->CI->load->view($this->theme . "general/content",array('content' => $content));
            $this->CI->load->view($this->theme . "general/footer");

        }else{
            // Either one or both sidebar present.
            // Set CSS
            $this->set(array('layout_setup', 'layout_text'),'css');
            // Load actual views
            $this->CI->load->view($this->theme . "general/header");
            $this->CI->load->view($this->theme . "general/left_sidebar", array('sidebars' => $left_sidebar));
            $this->CI->load->view($this->theme . "general/content",array('content' => $content));
            $this->CI->load->view($this->theme . "general/right_sidebar",array('sidebars' => $right_sidebar));
            $this->CI->load->view($this->theme . "general/footer");
        }
    }

    function showMessage($content){
       // Set CSS
        $this->set(array('layout1_setup', 'layout1_text'),'css');
        // Load actual views
        $this->CI->load->view($this->theme . "general/header");
        $this->CI->load->view($this->theme . "general/content",array('html' => $content));
        $this->CI->load->view($this->theme . "general/footer");
    }
}
?>
