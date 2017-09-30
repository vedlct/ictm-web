<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {
            $this->load->view('Admin/home');
        }
        else{
            redirect('Admin/Login');
        }
    }

}