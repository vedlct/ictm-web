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

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->load->model('Admin/Departmentm');
            $this->data['departmentName'] = $this->Departmentm->gellDepartmentName();
            $this->load->view('Admin/newCourse', $this->data);
        }
        else{
            redirect('Login');
        }
    }



    /* this insert course */
    public  function insertCourse(){

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->Coursem->insertCourse();
            redirect('Admin/Course/createCourse');
        }
        else{
            redirect('Login');
        }
    }

    //this will show manage course
    public function manageCourse(){

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['coursedata']= $this->Coursem->getCourseData();
            $this->load->view('Admin/manageCourse', $this->data);
        }
        else{
            redirect('Login');
        }
    }

    //this will show edited data
    public function  showEditCourse($id){

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['coursealldata']= $this->Coursem->getCourseAllData($id);
            $this->load->view('Admin/editCourse', $this->data);
        }
        else{
            redirect('Login');
        }

    }

    //this funtion will edit data
    public function editCourse($id){

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['coursealldata']= $this->Coursem->updateCourseData($id);

            redirect('Admin/Course/manageCourse');
        }
        else{
            redirect('Login');
        }
    }

}