<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menum');
        $this->load->model('Pagem');
        $this->load->model('PageSectionm');
        $this->load->model('Newsm');
        $this->load->model('Eventm');
        $this->load->model('Coursem');


    }
    public function index()
    {
        $this->load->view('course-list');
    }
}
