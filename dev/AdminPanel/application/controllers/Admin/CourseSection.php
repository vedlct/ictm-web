<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CourseSection extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin/CourseSectionm');

    }

    //this will show course section
    public  function createCourseSec(){

        if ($this->session->userdata('type') == "Admin") {

            $this->load->model('Admin/Coursem');
            $this->data['coursetitle']= $this->Coursem->getCourseTitle();
            $this->load->view('Admin/newCourseSection', $this->data);
        }
        else{
            redirect('Admin/Login');
        }


    }
    //this will insert  course section data
    public  function insertCourseSec(){
        $this->load->library('form_validation');

        if ($this->session->userdata('type') == "Admin") {

            if (!$this->form_validation->run('createCourseSection')) {

                $this->load->model('Admin/Coursem');
                $this->data['coursetitle']= $this->Coursem->getCourseTitle();
                $this->load->view('Admin/newCourseSection', $this->data);
            }
            else {
                $this->data['error'] =$this->CourseSectionm->insertCourseSec();
                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Course Section Inserted Successfully');
                    redirect('Admin/CourseSection/manageCourseSec');

                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/CourseSection/createCourseSec');

                }
            }
        }
        else{
            redirect('Admin/Login');
        }
    }
    //this will show manage course section
    public  function manageCourseSec(){
        if ($this->session->userdata('type') == "Admin" ) {

            $this->load->model('Admin/Coursem');
            $this->data['coursetitle'] = $this->Coursem->getCourseTitle();
            $this->load->view('Admin/manageCourseSection', $this->data);
        }
        else{
            redirect('Admin/Login');
        }


    }
    //this is the ajax controller . this will show the course section manage table
    public function showCourseSecManageTable(){

        if ($this->session->userdata('type') == "Admin") {

            $id = $this->input->post("id");
            $this->data['coursedata'] = $this->CourseSectionm->getCourseSecData($id);
            $this->load->view('Admin/showManageCourseSec', $this->data);                        //view manage page section

        } else{
            redirect('Admin/Login');
        }

    }
    //this will show Edit course section
    public  function showEditCourseSec($id){

        if ($this->session->userdata('type') == "Admin") {


            $this->data['coursedataall'] = $this->CourseSectionm->getCourseSecAllData($id);
            $this->load->view('Admin/editCourseSection', $this->data);

        } else{
            redirect('Admin/Login');
        }
    }
    //this will edit course section
    public  function editCourseSec($id){

        $this->load->library('form_validation');

        if ($this->session->userdata('type') == "Admin" ) {

            if (!$this->form_validation->run('editCourseSection')) {

                $this->data['coursedataall'] = $this->CourseSectionm->getCourseSecAllData($id);
                $this->load->view('Admin/editCourseSection', $this->data);
            }
            else {

                $this->data['error'] = $this->CourseSectionm->updateCourseSectionData($id);                       // edit Course section
                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Course Section Updated Successfully');
                    redirect('Admin/CourseSection/manageCourseSec');


                } else {

                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/CourseSection/editCourseSec/'.$id);

                }
            }


        } else{
            redirect('Admin/Login');
        }
    }

    //this will delete Course section
    public function deleteCourseSection($courseSectionId){


            if ($this->session->userdata('type') == "Admin" ) {

                try {
                    $this->CourseSectionm->deleteCourseSectionbyId($courseSectionId);
                    $this->session->set_flashdata('successMessage','Course Section Deleted Successfully');
                    redirect('Admin/CourseSection/manageCourseSec');
                }
                catch (Exception $e)
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/CourseSection/manageCourseSec');

                }
            }
            else{
                redirect('Admin/Login');
            }
        }


}
