<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Faculty extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Coursem');
        $this->load->model('Admin/Facultym');
    }

    public function index()
    {
    }

    /*---------for creating new Faculty --------------------- */

    public function newFaculty() // for new Faculty view
    {
        if ($this->session->userdata('type') == Admin) {

            $this->data['course'] = $this->Coursem->getCourseIdNameforFaculty();
            $this->load->view('Admin/newFaculty',$this->data);
        } else {
            redirect('Login');
        }
    }

    public function createNewFaculty() // creates new faculty in database
    {
        if ($this->session->userdata('type') == Admin) {
            try {
                $this->Facultym->createNewFaculty();
                echo "<script>
                    alert('Faculty Created Successfully');
                    window.location.href= '" . base_url() . "Admin/Faculty/newFaculty';
                    </script>";
            }
            catch (Exception $e){
                echo "<script>
                    alert('Something Went Wrong!! please try again');
                    window.location.href= '" . base_url() . "Admin/Faculty/newFaculty';
                    </script>";
            }

        }
        else
            {
                redirect('Login');
            }
    }
    /*---------for creating new Faculty  --------end---------------*/


    /*---------for Manage Faculty -----------------------*/
    public function manageFaculty() // for manage Faculty view
    {
        if ($this->session->userdata('type') == Admin) {
            $this->data['faculty'] = $this->Facultym->getAllforManageFaculty();
            //print_r($this->data['menu']);
            $this->load->view('Admin/manageFaculty',$this->data);
        }
        else{
            redirect('Login');
        }
    }

    public function editFacultyView($facultyId) // for edit  Selected Faculty view
    {
        if ($this->session->userdata('type') == Admin) {

            $this->data['editFaculty'] = $this->Facultym->getAllFacultybyId($facultyId);
            $this->data['facultyCourse'] = $this->Coursem->getFacultyCourseIdName($facultyId);
            $this->data['course'] = $this->Coursem->getCourseIdNameforFaculty();

            $this->load->view('Admin/editFaculty', $this->data);
        }
        else{
            redirect('Login');
        }
    }

    public function addCoursetoFaculty($courseId) //add Course to selected faculty
    {
        if ($this->session->userdata('type') == Admin) {

            $r=$this->Coursem->addCoursetoFaculty($courseId);
            echo $r;
        }
        else{
            redirect('Login');
        }
    }

    public function deleteCoursetoFaculty($id) //delete  Course to selected faculty
    {
        if ($this->session->userdata('type') == Admin) {

            $this->Coursem->deleteCoursetoFaculty($id);

        }
        else{
            redirect('Login');
        }
    }

    public function editFacultybyId($id) // for edit Faculty by id from database
    {
        if ($this->session->userdata('type') == Admin) {

            $this->Facultym->editFacultybyId($id);

            echo "<script>
                    alert('Faculty Updated Successfully');
                    window.location.href= '" . base_url() . "Admin/Faculty/ManageFaculty';
                    </script>";

        }
        else{
            redirect('Login');
        }
    }

    public function deleteFaculty($facultyId) // delete Faculty and his teaching Course from database
    {
        if ($this->session->userdata('type') == Admin) {
            $this->Facultym->deleteFacultybyId($facultyId);
        }

        else{
            redirect('Login');
        }
    }
    /*---------for Manage Faculty ----------end-------------*/

}