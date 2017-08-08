<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_Faculty extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
    }

    /*---------for creating new Faculty --------------------- */
    public function newFaculty() // for new Faculty view
    {
        if ($this->session->userdata('type') == "Admin") {

            $this->data['faculty_course'] = $this->Admin_Coursem->getCourseIdName();
            $this->load->view('newFaculty');
        } else {
            redirect('Login');
        }
    }
}