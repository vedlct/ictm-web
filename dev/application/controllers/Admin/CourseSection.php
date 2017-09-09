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

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('createCourseSection')) {

                $this->load->model('Admin/Coursem');
                $this->data['coursetitle']= $this->Coursem->getCourseTitle();
                $this->load->view('Admin/newCourseSection', $this->data);
            }
            else {
                $this->data['error'] =$this->CourseSectionm->insertCourseSec();
                if (empty($this->data['error'])) {

                    echo "<script>
                    alert('Course Section Inserted Successfully');
                    window.location.href= '" . base_url() . "Admin/CourseSection/manageCourseSec';
                    </script>";

                }
                else
                {

                    echo "<script>
                    alert('Some thing Went Wrong !! Please Try Again!!');
                    window.location.href= '" . base_url() . "Admin/CourseSection/createCourseSec';
                    </script>";
                }
            }
        }
        else{
            redirect('Admin/Login');
        }
    }
    //this will show manage course section
    public  function manageCourseSec(){
        if ($this->session->userdata('type') == USER_TYPE[0]) {

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

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $id = $this->input->post("id");
            $this->data['coursedata'] = $this->CourseSectionm->getCourseSecData($id);
            $this->load->view('Admin/showManageCourseSec', $this->data);                        //view manage page section

        } else{
            redirect('Admin/Login');
        }

    }
    //this will show Edit course section
    public  function showEditCourseSec($id){

        if ($this->session->userdata('type') == USER_TYPE[0]) {


            $this->data['coursedataall'] = $this->CourseSectionm->getCourseSecAllData($id);
            $this->load->view('Admin/editCourseSection', $this->data);

        } else{
            redirect('Admin/Login');
        }
    }
    //this will edit course section
    public  function editCourseSec($id){

        $this->load->library('form_validation');

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('editCourseSection')) {

                $this->data['coursedataall'] = $this->CourseSectionm->getCourseSecAllData($id);
                $this->load->view('Admin/editCourseSection', $this->data);
            }
            else {

                $this->data['error'] = $this->CourseSectionm->updateCourseSectionData($id);                       // edit Course section
                if (empty($this->data['error'])) {

                    echo "<script>
                    alert('Course Section Updated Successfully');
                    window.location.href= '" . base_url() . "Admin/CourseSection/manageCourseSec';
                    </script>";

                } else {
                    echo "<script>
                    alert('Some thing Went Wrong !! Please Try Again!!');
                    window.location.href= '" . base_url() . "Admin/CourseSection/manageCourseSec';
                    </script>";
                }
            }


        } else{
            redirect('Admin/Login');
        }
    }

    //this will delete Course section
    public function deleteCourseSection($courseSectionId){


            if ($this->session->userdata('type') == USER_TYPE[0]) {

                try {
                    $this->CourseSectionm->deleteCourseSectionbyId($courseSectionId);

                    redirect('Admin/CourseSection/manageCourseSec');
                }
                catch (Exception $e)
                {
                    echo "<script>
                    alert('Some thing Went Wrong !! Please Try Again!!');
                    window.location.href= '" . base_url() . "Admin/CourseSection/manageCourseSec';
                    </script>";
                }
            }
            else{
                redirect('Admin/Login');
            }
        }

    /* --------- Course Section Title check from newCoruse Section-------------------*/
//    public function CourseSectionCheckFormNewCourseSection()
//    {
//        $courseTitle = $this->input->post("coursetitle");
//
//        extract($_POST);
//        for ($i = 0; $i < count($textbox); $i++) {
//            $SectionTitle = $textbox[$i];
//            $this->data['checkSectionTitle'] = $this->CourseSectionm->checkUniqueSection($courseTitle,$SectionTitle);
//
//        }
//        if (empty($this->data['checkSectionTitle'])){
//
//            return true;
//        }
//        else{
//            $this->form_validation->set_message('CourseSectionCheckFormNewCourseSection', 'Course Section Allready Existed');
//            return false;
//        }
//
//
//    }


}
