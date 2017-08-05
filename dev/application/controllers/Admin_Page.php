<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Page extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin_pagem');

    }
    public function index()
    {
        $this->load->view('home');
    }

    public function CreatePage()
    {
        $this->load->view('newPage');
    }

    public function insertPage(){

        $this->Admin_pagem->insertPage();

    }
}
