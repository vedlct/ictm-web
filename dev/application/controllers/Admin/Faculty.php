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
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['course'] = $this->Coursem->getCourseIdNameforFaculty();
            $this->load->view('Admin/newFaculty',$this->data);

        } else {
            redirect('Admin/Login');
        }
    }

    public function createNewFaculty() // creates new faculty in database
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('createFaculty')) {

                $this->data['course'] = $this->Coursem->getCourseIdNameforFaculty();
                $this->load->view('Admin/newFaculty',$this->data);
            }
            else {

                $this->data['error'] = $this->Facultym->createNewFaculty();

                if (empty($this->data['error'])) {
                    echo "<script>
                    alert('Faculty Created Successfully');
                    window.location.href= '" . base_url() . "Admin/Faculty/manageFaculty';
                    </script>";
                } else {

                    echo "<script>
                        alert('Some thing Went Wrong !! Please Try Again!!');
                        window.location.href= '" . base_url() . "Admin/Faculty/newFaculty';
                        </script>";
                }
            }


        }
        else
            {
                redirect('Admin/Login');
            }
    }
    /*---------for creating new Faculty  --------end---------------*/


    /*---------for Manage Faculty -----------------------*/
    public function manageFaculty() // for manage Faculty view
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['faculty'] = $this->Facultym->getAllforManageFaculty();
            $this->load->view('Admin/manageFaculty',$this->data);
        }
        else{
            redirect('Admin/Login');
        }
    }

    public function editFacultyView($facultyId) // for edit  Selected Faculty view
    {
        if ($this->session->userdata('type') == USER_TYPE[0])
        {

                $this->data['editFaculty'] = $this->Facultym->getAllFacultybyId($facultyId);
                $this->data['facultyCourse'] = $this->Coursem->getFacultyCourseIdName($facultyId);
                $this->data['course'] = $this->Coursem->getCourseIdNameforFaculty();
                $this->load->view('Admin/editFaculty', $this->data);
        }

        else{
            redirect('Admin/Login');
        }
    }

    public function showImageForEdit($id){

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['facultyImage'] = $this->Facultym->getImage($id);
            $this->load->view('Admin/showImage', $this->data);
        }
        else{
            redirect('Admin/Login');
        }
    }

    public function addCoursetoFaculty($courseId)  //add Course to selected faculty
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $addCourse=$this->Coursem->addCoursetoFaculty($courseId);
            echo $addCourse;
        }
        else{
            redirect('Admin/Login');
        }
    }

    public function deleteCoursetoFaculty($id) //delete  Course to selected faculty
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->Coursem->deleteCoursetoFaculty($id);

        }
        else{
            redirect('Admin/Login');
        }
    }

    public function editFacultybyId($id) // for edit Faculty by id from database
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('editFaculty')) {

                $this->data['editFaculty'] = $this->Facultym->getAllFacultybyId($id);
                $this->data['facultyCourse'] = $this->Coursem->getFacultyCourseIdName($id);
                $this->data['course'] = $this->Coursem->getCourseIdNameforFaculty();
                $this->load->view('Admin/editFaculty', $this->data);
            }
            else {

                $this->data['error'] = $this->Facultym->editFacultybyId($id);

                if (empty($this->data['error'])) {

                    echo "<script>
                    alert('Faculty Updated Successfully');
                    //window.location.href= '" . base_url() . "Admin/Faculty/ManageFaculty';
                    </script>";
                } else {

                    echo "<script>
                        alert('Some thing Went Wrong !! Please Try Again!!');
                       // window.location.href= '" . base_url() . "Admin/Faculty/ManageFaculty';
                        </script>";
                }
            }
        }
        else{
            redirect('Admin/Login');
        }
    }

    public function deleteFaculty($facultyId) // delete Faculty and his teaching Course from database
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->Facultym->deleteFacultybyId($facultyId);
        }

        else{
            redirect('Admin/Login');
        }
    }
    /*---------for Manage Faculty ----------end-------------*/

    /* -------------------------------Image validation-------------------------*/
    public function val_img_check()
    {
        $image = $_FILES['facultyImage']['name'];
        if ($image != null) {
            $this->load->library('upload');
            $config['upload_path'] = "images/";
            $config['allowed_types'] = 'jpg|png|jpeg|gif';

//        $config['max_size']    = '2048000';
//        $config['overwrite'] = TRUE;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('facultyImage')) {
                $this->form_validation->set_message('val_img_check', $this->upload->display_errors());
                return false;
            } else {
                return true;
            }
        }
    }

}