<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Page extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin_Pagem');


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

            $this->Admin_Pagem->insertPage();
            redirect('Admin_page/CreatePage');
        }
        else{
            redirect('Login');
        }
    }

    public function managePage()
    {
        if ($this->session->userdata('type') == "Admin") {
            $this->data['pageData'] = $this->Admin_Pagem->get_pagaData();
            $this->load->view('managePage', $this->data);
        }
        else{
            redirect('Login');
        }
    }

    public function editPageShow($id)
    {

        if ($this->session->userdata('type') == "Admin") {
            $this->data['editPageData'] = $this->Admin_Pagem->get_editPagaData($id);
            $this->load->view('editPage', $this->data);

        }
        else{
            redirect('Login');
        }
    }
    public function editPage($id)
    {
        if ($this->session->userdata('type') == "Admin") {
            $this->Admin_Pagem->updatePagaData($id);
            redirect('Admin_Page/managePage');
        }
        else{
            redirect('Login');
        }
    }


    public function deletePage($pageId)    // delete Page
    {
        if ($this->session->userdata('type') == "Admin") {

           $this->Admin_Pagem->deletePagebyId($pageId);
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

            $this->data['pagename'] = $this->Admin_Pagem->getPageIdName();
            $this->load->view('newPageSection', $this->data);                    //view create page section
        }
        else{
            redirect('Login');
        }
    }

    public function insertPageSection()
    {
        if ($this->session->userdata('type') == "Admin") {

        $this->Admin_Pagem->insertPageSection();                // insert page section
        redirect('Admin_Page/createPageSection');

        }
        else{
            redirect('Login');
        }
    }
    public function managePageSection()
    {

        if ($this->session->userdata('type') == "Admin") {

            $this->data['pagename'] = $this->Admin_Pagem->getPageIdName();
            $this->load->view('managePageSection', $this->data);                 //view manage page section

        } else{
            redirect('Login');
        }

    }
    public function editPageSectionShow($id){


        if ($this->session->userdata('type') == "Admin") {

            $this->data['pagesecdata'] = $this->Admin_Pagem->get_pageSecdataBySecId($id);
            $this->load->view('editPageSection', $this->data);                 //view edit page section

        } else{
            redirect('Login');
        }
    }

    public function editPageSection($id){


        if ($this->session->userdata('type') == "Admin") {

            $this->Admin_Pagem->updatePagaSectionData($id);
            redirect('Admin_Page/managePageSection');                                      // edit page section

        } else{
            redirect('Login');
        }
    }

    public function showPageSecManageTable(){

        if ($this->session->userdata('type') == "Admin") {

            $id = $this->input->post("id");
            $this->data['pagedata'] = $this->Admin_Pagem->get_pageSecdata($id);
            $this->load->view('showManagePageSec', $this->data);                 //view manage page section

        } else{
            redirect('Login');
        }

    }

    public function deletePageSection($pageSectionId)    // delete Page Section
    {
        if ($this->session->userdata('type') == "Admin") {

            $this->Admin_Pagem->deletePageSectionbyId($pageSectionId);
            //echo $pageId;
            redirect('Admin_Page/managePageSection');
        }
        else{
            redirect('Login');
        }
    }


}
