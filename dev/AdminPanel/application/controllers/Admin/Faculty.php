<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Faculty extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Coursem');
        $this->load->model('Admin/Facultym');
        $this->load->library("pagination");
    }

    public function index()
    {

    }

    /*---------datatable code --------------------- */
    public function ajax_list()
    {
        $list = $this->Facultym->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $faculty) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $faculty->facultyTitle;
            $row[] = $faculty->facultyFirstName;
            $row[] = $faculty->facultyLastName;
            $row[] = $faculty->facultyEmail;
            $row[] = $faculty->facultyEmpType;
            $row[] = $faculty->facultyPosition;
            $row[] = $faculty->facultyStatus;
            $row[] = $faculty->insertedBy;
            $row[] = $faculty->lastModifiedBy;
            $row[] = $faculty->lastModifiedDate;
            $row[] = '<a class="btn" href="'.base_url().'Admin/News/editNewsView/'.$faculty->facultyId.'"><i class="icon_pencil-edit"></i></a>
            <a class="btn " data-panel-id="'.$faculty->facultyId.'"onclick=\'return confirm("Are you sure to Delete This RegisterInterest?")\' href="'.base_url().'Admin/RegisterInterest/deleteRegisterInterest/'. $faculty->facultyId.'"><i class="icon_trash"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Facultym->count_all(),
            "recordsFiltered" => $this->Facultym->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
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


//                $this->data['error'] = $this->Facultym->createNewFaculty();
//                if (empty($this->data['error'])) {
//
//                    $this->session->set_flashdata('successMessage','Faculty Created Successfully');
//                    redirect('Admin/Faculty/manageFaculty');
//
//                } else {
//
//                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
//                    redirect('Admin/Faculty/newFaculty');
//
//                }
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

//            $config = array();
//            $config["base_url"] = base_url() . "Admin/Faculty/manageFaculty";
//            $config["total_rows"] = $this->Facultym->record_count();
//            $config["per_page"] = 10;
//            $config["uri_segment"] = 4;
//            $choice = $config["total_rows"] / $config["per_page"];
//            $config["num_links"] = round($choice);
//            $this->pagination->initialize($config);
//            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
//            $this->data["faculty"] = $this->Facultym->getAllforManageFaculty($config["per_page"], $page);
//            $this->data["links"] = $this->pagination->create_links();


            $this->load->view('Admin/manageFaculty1');
        }
        else{
            redirect('Admin/Login');
        }
    }

    public function manageFacultySearchByTitle() // for manage Faculty view
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {


            $title= $this->input->post('title');
            $this->data["faculty"] = $this->Facultym->getAllforManageFacultySearchByTitle($title);
            $this->data["links"] = null;

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

    public function showImageForEdit($id) // show faculty image in new tab
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['facultyImage'] = $this->Facultym->getImage($id);
            $this->load->view('Admin/showImage', $this->data);
        }
        else{
            redirect('Admin/Login');
        }
    }

    //this function will delete the image in edit
    public function deleteFacultyImage($id){

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['error'] = $this->Facultym->deleteFacultyImage($id);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage','Faculty Image Deleted Successfully');
                redirect('Admin/Faculty/editFacultyView/'.$id);
            }
            else
            {
                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/Faculty/editFacultyView/'.$id);
            }
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
    //delete  Course from selected faculty
    public function deleteCoursetoFaculty($id)
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->Coursem->deleteCoursetoFaculty($id);
            $this->session->set_flashdata('successMessage','Faculty Course Delated Successfully');

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

                    $this->session->set_flashdata('successMessage','Faculty Updated Successfully');
                    redirect('Admin/Faculty/ManageFaculty');

                } else {

                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Faculty/editFacultybyId/'.$id);

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
            $this->session->set_flashdata('successMessage','Faculty Deleted Successfully');
        }

        else{
            redirect('Admin/Login');
        }
    }


    public function emailCheckFormEditFaculty()
    {
        $email = $this->input->post("faculty_email");
        $id=$this->uri->segment(4);


        try
        {
            $this->data['checkEmail'] = $this->Facultym->checkUniqueEmail($email,$id);

            if (empty($this->data['checkEmail'])){

                return true;
            }
            else{
                $this->form_validation->set_message('emailCheckFormEditFaculty', 'Email Allready Existed');
                return false;
            }
        }
        catch (Exception $e){

            $this->form_validation->set_message('emailCheckFormEditFaculty', 'Some thing Went Wrong !! Please Try Again!!');
            return false;
        }


    }
    /*---------for Manage Faculty ----------end-------------*/

    /* -------------------------------Image validation-------------------------*/
    public function val_img_check()
    {
        $image = $_FILES['facultyImage']['name'];
        $imageSize = ($_FILES['facultyImage']['size']/1024);
        $supported_image = array('gif','jpg','jpeg','png');

        if ($image != null) {
            $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));

            if (in_array($ext, $supported_image)) {

                if ($imageSize <4096){
                    return true;
                }
                else{
                    $this->form_validation->set_message('val_img_check', "Maximum Image Size 4MB is allowed!!");
                    return false;
                }
            } else {
                $this->form_validation->set_message('val_img_check', "Only JPEG/JPG/PNG/GIF Image is allowed!!");
                return false;


            }
        }
    }

}