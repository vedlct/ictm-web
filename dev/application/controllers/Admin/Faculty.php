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

    public function createNewFaculty(){
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
}