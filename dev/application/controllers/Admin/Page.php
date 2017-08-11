<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin/Pagem');


    }
    public function index()
    {
        if ($this->session->userdata('type') == Admin) {
            $this->load->view('home');
        }
        else{
            redirect('Login');
        }
    }

    public function createPage() // create page view
    {
        if ($this->session->userdata('type') == Admin) {
            $this->load->view('Admin/newPage');
        }
        else{
            redirect('Login');
        }
    }

    public function insertPage() // this creates a new page in database
    {
        if ($this->session->userdata('type') == Admin) {

            $this->Pagem->insertPage();
            redirect('Admin/Page/createPage');
        }
        else{
            redirect('Login');
        }
    }

    public function managePage()
    {
        if ($this->session->userdata('type') == Admin) {
            $this->data['pageData'] = $this->Pagem->getPagaData();
          // var_dump($this->data['pageData']);
             $this->load->view('Admin/managePage', $this->data);
        }
        else{
            redirect('Login');
        }
    }

    public function editPageShow($id)
    {

        if ($this->session->userdata('type') == Admin) {
            $this->data['editPageData'] = $this->Pagem->geteditPagaData($id);
            $this->load->view('Admin/editPage', $this->data);

        }
        else{
            redirect('Login');
        }
    }
    public function editPage($id)
    {
        if ($this->session->userdata('type') == Admin) {
            $this->Pagem->updatePagaData($id);
            redirect('Admin/Page/managePage');
        }
        else{
            redirect('Login');
        }
    }


    public function deletePage($pageId)    // delete Page
    {
        if ($this->session->userdata('type') == Admin) {

           $this->Pagem->deletePagebyId($pageId);

        }
        else{
            redirect('Login');
        }
    }

    /////////PageSection///////////////

    public function createPageSection()
    {
        if ($this->session->userdata('type') == Admin) {

            $this->data['pagename'] = $this->Pagem->getPageIdName();
            $this->load->view('Admin/newPageSection', $this->data);                    //view create page section
        }
        else{
            redirect('Login');
        }
    }

    public function insertPageSection()
    {
        if ($this->session->userdata('type') == Admin) {

        $this->Pagem->insertPageSection();                                        // insert page section
        redirect('Admin/Page/createPageSection');

        }
        else{
            redirect('Login');
        }
    }
    public function managePageSection()
    {

        if ($this->session->userdata('type') == Admin) {

            $this->data['pagename'] = $this->Pagem->getPageIdName();
            $this->load->view('Admin/managePageSection', $this->data);                         //view manage page section

        } else{
            redirect('Login');
        }

    }
    public function editPageSectionShow($id){


        if ($this->session->userdata('type') == Admin) {

            $this->data['pagesecdata'] = $this->Pagem->get_pageSecdataBySecId($id);
            $this->load->view('Admin/editPageSection', $this->data);                          //view edit page section

        } else{
            redirect('Login');
        }
    }

    public function editPageSection($id){


        if ($this->session->userdata('type') == Admin) {

            $this->Pagem->updatePagaSectionData($id);
            redirect('Admin/Page/managePageSection');                                      // edit page section

        } else{
            redirect('Login');
        }
    }

    public function showPageSecManageTable(){

        if ($this->session->userdata('type') == Admin) {

            $id = $this->input->post("id");
            $this->data['pagedata'] = $this->Pagem->get_pageSecdata($id);
            $this->load->view('Admin/showManagePageSec', $this->data);                        //view manage page section

        } else{
            redirect('Login');
        }

    }

    public function deletePageSection($pageSectionId)                                    // delete Page Section
    {
        if ($this->session->userdata('type') == Admin) {

            $this->Pagem->deletePageSectionbyId($pageSectionId);
            //echo $pageId;
            redirect('Admin/Page/managePageSection');
        }
        else{
            redirect('Login');
        }
    }


}
