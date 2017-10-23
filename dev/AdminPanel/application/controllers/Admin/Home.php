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
    public function slider()
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->load->view('Admin/homeSlider');

        }
        else{
            redirect('Admin/Login');
        }
    }
    public function verticalBar()
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->load->view('Admin/homeVerticalBar');

        }
        else{
            redirect('Admin/Login');
        }
    }
    public function middleBanner()
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->load->view('Admin/homeMiddleBanner');

        }
        else{
            redirect('Admin/Login');
        }
    }
    public function squreBox()
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->load->view('Admin/homeSqureBox');

        }
        else{
            redirect('Admin/Login');
        }
    }

    public function bottomBanner()
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->load->view('Admin/homeBottomBanner');

        }
        else{
            redirect('Admin/Login');
        }
    }

}