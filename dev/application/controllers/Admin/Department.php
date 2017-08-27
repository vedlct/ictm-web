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

    public function newDepartment()    // for new Department view
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->load->view('Admin/newDepartment');
        } else {
            redirect('Admin/Login');
        }
    }

    public function createNewDepartment() // creates new Department in database
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            try {
                $this->Departmentm->createNewDepartment();
                echo "<script>
                    alert('Department Created Successfully');
                    window.location.href= '" . base_url() . "Admin/Department/newDepartment';
                    </script>";
            }
            catch (Exception $e){
                echo "<script>
                    alert('Something Went Wrong!! please try again');
                    window.location.href= '" . base_url() . "Admin/Department/newDepartment';
                    </script>";
            }

        }
        else
        {
            redirect('Admin/Login');
        }
    }
    /*---------for creating new Department  --------end---------------*/

    /*---------for Manage Department -----------------------*/
    public function manageDepartment() // for manage Department view
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {
            $this->data['departments'] = $this->Departmentm->getAllforManageDepartment();

            $this->load->view('Admin/manageDepartment',$this->data);
        }
        else{
            redirect('Admin/Login');
        }
    }

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

    public function editDepartmentbyId($departmentId) // for edit Department by id from database
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->Departmentm->editDepartmentbyId($departmentId);

            echo "<script>
                    alert('Department Updated Successfully');
                    window.location.href= '" . base_url() . "Admin/Department/ManageDepartment';
                    </script>";
        }
        else{
            redirect('Admin/Login');
        }
    }

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
            else{echo $r;}


        }
        else{
            redirect('Admin/Login');
        }
    }
    /*---------for Manage Menu ----------end-------------*/
}