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
        if ($this->session->userdata('type') == Admin) {

            $this->load->view('Admin/newDepartment');
        } else {
            redirect('Login');
        }
    }

    public function createNewDepartment() // creates new Department in database
    {

        if ($this->session->userdata('type') == Admin) {

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
            redirect('Login');
        }
    }
    /*---------for creating new Department  --------end---------------*/

    /*---------for Manage Department -----------------------*/
    public function manageDepartment() // for manage Department view
    {
        if ($this->session->userdata('type') == Admin) {
            $this->data['departments'] = $this->Departmentm->getAllforManageDepartment();

            $this->load->view('Admin/manageDepartment',$this->data);
        }
        else{
            redirect('Login');
        }
    }

    public function editDepartmentView($departmentId) // for edit  Department view
    {
        if ($this->session->userdata('type') == Admin) {

            $this->data['editDepartment'] = $this->Departmentm->getAllDepartmentbyId($departmentId);

            $this->load->view('Admin/editDepartment', $this->data);
        }
        else{
            redirect('Login');
        }
    }
}