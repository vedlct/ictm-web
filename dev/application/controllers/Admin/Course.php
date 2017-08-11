<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Course extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin/Coursem');
    }

    public function index()
    {

    }

     /* this will show create course page*/
    public function createCourse(){
       $this->load->view('Admin/newCourse');
    }



    /* this insert course */
    public  function insertCourse(){


    }

    public function manageCourse(){
        $this->load->view('Admin/manageCourse');
    }
}