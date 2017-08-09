<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_Faculty extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Coursem');
    }

    public function index()
    {
    }

    /*---------for creating new Faculty --------------------- */
    public function newFaculty() // for new Faculty view
    {
        if ($this->session->userdata('type') == "Admin") {

            $this->data['course'] = $this->Admin_Coursem->getCourseIdNameforFaculty();
            $this->load->view('newFaculty',$this->data);
        } else {
            redirect('Login');
        }
    }
}