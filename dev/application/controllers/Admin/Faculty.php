<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Faculty extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Coursem');
    }

    public function index()
    {
    }

    /*---------for creating new Faculty --------------------- */
    public function newFaculty() // for new Faculty view
    {
        if ($this->session->userdata('type') == "Admin") {

            $this->data['course'] = $this->Coursem->getCourseIdNameforFaculty();
            $this->load->view('Admin/newFaculty',$this->data);
        } else {
            redirect('Login');
        }
    }
}