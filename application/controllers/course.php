
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class course extends CI_Controller {

           function __construct()
           {
                   parent::__construct();
           }
           function index(){
              $this->LoadCourseView();
           }
           function LoadCourseView()
           {
//             echo "<pre>";
//             print_r($this->page->nav2);
//             echo "<pre>";
             $this->page->title = "Course";

              $this->page->nav1 = array(
                  "Home" => base_url(),
                  "logout" => site_url('logout')
              );

              $this->page->nav2[] = array(
                                    array("Field",site_url('field')),
                                    array('Computer Science'=>site_url('field/cse'))
                                 );



              $this->page->breadcrumbs = array(
                  "Home" => base_url(),
                  "Course" => site_url('Course')
              );

            $this->page->loadViews(
                    null,
                    array(
                        array("Course : [Name:say java programming]", "single/course")
                    ),
                    null);
           }
           
   }

?>
 