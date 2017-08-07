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
        if ($this->session->userdata('type') == "Admin") {
            $this->load->view('home');
        }
        else{
            redirect('Login');
        }
    }

    public function CreatePage()
    {
        if ($this->session->userdata('type') == "Admin") {
            $this->load->view('newPage');
        }
        else{
            redirect('Login');
        }
    }

    public function insertPage()
    {
        if ($this->session->userdata('type') == "Admin") {

            $this->Admin_pagem->insertPage();
            redirect('Admin_page/CreatePage');
        }
        else{
            redirect('Login');
        }
    }

    public function managePage()
    {
        if ($this->session->userdata('type') == "Admin") {
            $this->data['pageData'] = $this->Admin_pagem->get_pagaData();
            $this->load->view('managePage', $this->data);
        }
        else{
            redirect('Login');
        }
    }

    public function editPageShow($id)
    {

        if ($this->session->userdata('type') == "Admin") {
            $this->data['editPageData'] = $this->Admin_pagem->get_editPagaData($id);
            $this->load->view('editPage', $this->data);

        }
        else{
            redirect('Login');
        }
    }
    public function editPage($id)
    {
        if ($this->session->userdata('type') == "Admin") {
            $this->Admin_pagem->updatePagaData($id);
            redirect('Admin_Page/managePage');
        }
        else{
            redirect('Login');
        }
    }


    public function deletePage($pageId)    // delete Page
    {
        if ($this->session->userdata('type') == "Admin") {

           $this->Admin_pagem->deletePagebyId($pageId);
            //echo $pageId;
        }
        else{
            redirect('Login');
        }
    }

    /////////PageSection///////////////

    public function createPageSection()
    {
        if ($this->session->userdata('type') == "Admin") {

            $this->data['pagename'] = $this->Admin_pagem->getPageIdName();
            $this->load->view('newPageSection', $this->data);                    //view create page section
        }
        else{
            redirect('Login');
        }
    }

    public function insertPageSection()
    {
        if ($this->session->userdata('type') == "Admin") {

        $this->Admin_pagem->insertPageSection();                // insert page section
       redirect('Admin_Page/createPageSection');

        }
        else{
            redirect('Login');
        }
    }
    public function managePageSection()
    {

        if ($this->session->userdata('type') == "Admin") {

            $this->data['pagename'] = $this->Admin_pagem->getPageIdName();
            $this->load->view('managePageSection', $this->data);                 //view manage page section

        } else{
            redirect('Login');
        }

    }

    public function showPageSecManageTable(){

        if ($this->session->userdata('type') == "Admin") {

            $id = $this->input->post("id");
            $this->data['pagedata'] = $this->Admin_pagem->get_pageSecdata($id);
            $this->load->view('showManagePageSec', $this->data);                 //view manage page section

        } else{
            redirect('Login');
        }

    }


}
