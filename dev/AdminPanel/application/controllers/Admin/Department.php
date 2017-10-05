<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Department extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Departmentm');


    }

    public function index()
    {
    }

    /*---------for creating new Department --------------------- */

    //this will view the create department page
    public function newDepartment()
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->load->view('Admin/newDepartment');
        } else {
            redirect('Admin/Login');
        }
    }

    //this will insert depeartment
    public function createNewDepartment() // creates new Department in database
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {



            if (!$this->form_validation->run('createDepartment')) {


                $this->load->view('Admin/newDepartment');
            }
            else {

                $this->data['error'] = $this->Departmentm->createNewDepartment();

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Department Created Successfully');
                    redirect('Admin/Department/manageDepartment');


                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Department/newDepartment');

                }

            }

        }
        else
        {
            redirect('Admin/Login');
        }
    }
    /*---------for creating new Department  --------end---------------*/

    /*---------for Manage Department -----------------------*/

    //this will show manage department view
    public function manageDepartment()
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {
            $this->data['departments'] = $this->Departmentm->getAllforManageDepartment();

            $this->load->view('Admin/manageDepartment',$this->data);
        }
        else{
            redirect('Admin/Login');
        }
    }

    //this will show edit department viwe
    public function editDepartmentView($departmentId) // for edit  Department view
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['editDepartment'] = $this->Departmentm->getAllDepartmentbyId($departmentId);
            $this->load->view('Admin/editDepartment', $this->data);
        }
        else{
            redirect('Admin/Login');
        }
    }

    //this will edit department
    public function editDepartmentbyId($departmentId) // for edit Department by id from database
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->load->library('form_validation');
            if (!$this->form_validation->run('editDepartment')) {
                $this->data['editDepartment'] = $this->Departmentm->getAllDepartmentbyId($departmentId);

                $this->load->view('Admin/editDepartment', $this->data);
            }
            else{
                $this->data['error'] =  $this->Departmentm->editDepartmentbyId($departmentId);
                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Department Updated Successfully');
                    redirect('Admin/Department/ManageDepartment');


                }
                else
                {

                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Department/editDepartmentbyId/'.$departmentId);

                }

        } }
        else{
            redirect('Admin/Login');
        }
    }

    //this will delete department
    public function deleteDepartment($departmentId)    // delete Department if no Submenu
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {
            $r=$this->Departmentm->deleteDepartmentId($departmentId);
            if ($r!='0'){
                $name=array();

                foreach ($r as $r){
                    array_push($name,$r->courseTitle);
                }

                $x=implode(" , ",$name);
                echo $x;

            }
            else{
                $this->session->set_flashdata('successMessage','Department Deleted Successfully');
                echo $r;}


        }
        else{
            redirect('Admin/Login');
        }
    }
    public function DepartmenteditUniqueCheck(){
        $departmentName = $this->input->post("departmentName");
        $id=$this->uri->segment(4);


        try
        {
            $this->data['checkdepartment'] = $this->Departmentm->checkUniqueDepartment($departmentName,$id);

            if (empty($this->data['checkdepartment'])){

                return true;
            }
            else{
                $this->form_validation->set_message('DepartmenteditUniqueCheck', 'Department Name Allready Existed');
                return false;
            }
        }
        catch (Exception $e){

            $this->form_validation->set_message('DepartmenteditUniqueCheck', 'Some thing Went Wrong !! Please Try Again!!');
            return false;
        }
    }

    //this function will show the image in edit
        public function showImageForEdit($id){

            if ($this->session->userdata('type') == USER_TYPE[0]) {

                $this->data['deptimagename'] = $this->Departmentm->getImage($id);
                $this->load->view('Admin/showImage', $this->data);

            }
            else{
                redirect('Admin/Login');
            }
        }

    //this function will delete the image in edit
    public function deleteDepartmentImage($id){

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['error'] = $this->Departmentm->deleteDepartmentImage($id);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage','Department Image Deleted Successfully');
                redirect('Admin/Department/editDepartmentbyId/'.$id);
            }
            else
            {
                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/Department/editDepartmentbyId/'.$id);
            }
        }
        else{
            redirect('Admin/Login');
        }
    }



    /* -------------------------------Image validation-------------------------*/
    public function val_img_check()
    {
        $image = $_FILES['image']['name'];
        $imageSize = ($_FILES['image']['size']/1024);
        $supported_image = array('gif','jpg','jpeg','png');

        if ($image != null) {
            $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));

            if (in_array($ext, $supported_image)) {
                //echo "it's image";
                //return true;
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
                //echo 'not image';

            }
        }
    }
    /*---------for Manage Menu ----------end-------------*/
}