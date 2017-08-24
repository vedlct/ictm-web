<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CourseSection extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin/CourseSectionm');
    }

    public function index()
    {

    }

    //this will show course section
    public  function createCourseSec(){

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['coursetitle']= $this->CourseSectionm->getCourseTitle();
            $this->load->view('Admin/newCourseSection', $this->data);
        }
        else{
            redirect('Login');
        }


    }
    //this will insert ta course section data
    public  function insertCourseSec(){
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->Coursem->insertCourseSec();
            redirect('Admin/CourseSection/createCourseSec');
        }
        else{
            redirect('Login');
        }
    }
    //this will show manage course section
    public  function manageCourseSec(){
        $this->data['coursetitle']= $this->CourseSectionm->getCourseTitle();
        $this->load->view('Admin/manageCourseSection', $this->data);


    }
    //this is the ajax controller . this will show the course section manage table
    public function showCourseSecManageTable(){

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $id = $this->input->post("id");
            $this->data['coursedata'] = $this->CourseSectionm->getCourseSecData($id);
            $this->load->view('Admin/showManageCourseSec', $this->data);                        //view manage page section

        } else{
            redirect('Login');
        }

    }
    //this will show Edit course section
    public  function showEditCourseSec($id){

        if ($this->session->userdata('type') == USER_TYPE[0]) {


            $this->data['coursedataall'] = $this->CourseSectionm->getCourseSecAllData($id);
            $this->load->view('Admin/editCourseSection', $this->data);

        } else{
            redirect('Login');
        }
    }
    //this will edit course section
    public  function editCourseSec($id){

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->Coursem->updateCourseSectionData($id);
            redirect('Admin/CourseSection/manageCourseSec');                                      // edit page section

        } else{
            redirect('Login');
        }
    }
}