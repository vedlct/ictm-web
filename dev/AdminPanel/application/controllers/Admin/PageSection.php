<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageSection extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin/PageSectionm');
        $this->load->model('Admin/Pagem');

    }
    //this will show create page section
    public function createPageSection()
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['pagename'] = $this->Pagem->getPageIdName();
            $this->load->view('Admin/newPageSection', $this->data);

        }
        else{
            redirect('Admin/Login');
        }
    }

    //this will insert page section
    public function insertPageSection()
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('createPageSection')) {

                $this->data['pagename'] = $this->Pagem->getPageIdName();
                $this->load->view('Admin/newPageSection', $this->data);
            }
            else {


                    $this->data['error'] = $this->PageSectionm->insertPageSection();
                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Page Section Inserted Successfully');
                    redirect('Admin/PageSection/managePageSection');

                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/PageSection/createPageSection');

                }

            }
        }
        else{
            redirect('Admin/Login');
        }
    }

    //this will show manage page section
    public function managePageSection()
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['pagename'] = $this->Pagem->getPageIdName();
            $this->load->view('Admin/managePageSection', $this->data);

        } else{
            redirect('Admin/Login');
        }

    }
    //this will show edit page section
    public function editPageSectionShow($id){


        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['pagesecdata'] = $this->PageSectionm->get_pageSecdataBySecId($id);
            $this->load->view('Admin/editPageSection', $this->data);

        } else{
            redirect('Admin/Login');
        }
    }

    //this will edit the page section
    public function editPageSection($id){

        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0] ) {

            if (!$this->form_validation->run('editPageSection')) {

                $this->data['pagesecdata'] = $this->PageSectionm->get_pageSecdataBySecId($id);
                $this->load->view('Admin/editPageSection', $this->data);
            }


                $this->data['error'] = $this->PageSectionm->updatePagaSectionData($id);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage','Page Section Updated Successfully');
                redirect('Admin/PageSection/managePageSection');


            }
            else
            {
                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/PageSection/editPageSection'.$id);

            }

        } else{
            redirect('Admin/Login');
        }
    }

    //this is a AJAX controller
    //this will show manage page table after select the page
    public function showPageSecManageTable(){

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $id = $this->input->post("id");
            $this->data['pagedata'] = $this->PageSectionm->get_pageSecdata($id);
            $this->load->view('Admin/showManagePageSec', $this->data);

        } else{
            redirect('Admin/Login');
        }

    }
    public function PageSectionOrderNumber()
    {
        $ordernumber= $this->input->post("ordernumber");
        $id=$this->uri->segment(4);

        try
        {
            $this->data['pgordernumber'] = $this->PageSectionm->checkPageSectionOrderNumberUnique($ordernumber,$id);

            if (empty($this->data['pgordernumber'])){

                return true;
            }
            else{
                $this->form_validation->set_message('PageSectionOrderNumber', 'Order Number Allready Existed');
                return false;
            }
        }
        catch (Exception $e){

            $this->form_validation->set_message('PageSectionOrderNumber', 'Some thing Went Wrong !! Please Try Again!!');
            return false;
        }
    }
    //this will delete page section
    public function deletePageSection($pageSectionId)
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            try {
                $this->PageSectionm->deletePageSectionbyId($pageSectionId);
                $this->session->set_flashdata('successMessage','Page Section Deleted Successfully');
                redirect('Admin/PageSection/managePageSection');
            }
            catch (Exception $e)
            {

                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/PageSection/managePageSection');


            }
        }
        else{
            redirect('Admin/Login');
        }
    }
}
