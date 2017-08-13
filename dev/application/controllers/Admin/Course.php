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

        if ($this->session->userdata('type') == Admin) {

            $this->load->view('Admin/newCourse');
        }
        else{
            redirect('Login');
        }
    }



    /* this insert course */
    public  function insertCourse(){

        if ($this->session->userdata('type') == Admin) {

            $this->Coursem->insertCourse();
            redirect('Admin/Course/createCourse');
        }
        else{
            redirect('Login');
        }
    }

    public function manageCourse(){

        if ($this->session->userdata('type') == Admin) {

            $this->data['coursedata']= $this->Coursem->getCourseData();
            $this->load->view('Admin/manageCourse', $this->data);
        }
        else{
            redirect('Login');
        }
    }
}