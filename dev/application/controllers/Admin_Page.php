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
        redirect('Admin_page/CreatePage');
    }

    public function managePage(){

        $this->data['pageData'] = $this->Admin_pagem->get_pagaData();
        $this->load->view('managePage', $this->data);
    }

    public function editPageShow($id){

        $this->data['editPageData'] = $this->Admin_pagem->get_editPagaData($id);
        $this->load->view('editPage', $this->data);

    }
    public function editPage($id){

        $this->Admin_pagem->updatePagaData($id);
        redirect('Admin_Page/managePage');
    }
}
