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
            $this->load->view('Admin/newPageSection', $this->data);                    //view create page section

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
                try {

                    $this->PageSectionm->insertPageSection();
                    echo "<script>
                    alert('Page Section Inserted Successfully');
                    window.location.href= '" . base_url() . "Admin/PageSection/managePageSection';
                    </script>";
                }
                catch (Exception $e)
                {
                    echo "<script>
                    alert('Some thing Went Wrong !! Please Try Again!!');
                    window.location.href= '" . base_url() . "Admin/PageSection/managePageSection';
                    </script>";
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
            try {

                $this->PageSectionm->updatePagaSectionData($id);
                echo "<script>
                    alert('Page Section Updated Successfully');
                    window.location.href= '" . base_url() . "Admin/PageSection/managePageSection';
                    </script>";
            }
            catch (Exception $e)
            {
                echo "<script>
                    alert('Some thing Went Wrong !! Please Try Again!!');
                    window.location.href= '" . base_url() . "Admin/PageSection/managePageSection';
                    </script>";
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

    //this will delete page section
    public function deletePageSection($pageSectionId)
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            try {
                $this->PageSectionm->deletePageSectionbyId($pageSectionId);

                redirect('Admin/PageSection/managePageSection');
            }
            catch (Exception $e)
            {
                echo "<script>
                    alert('Some thing Went Wrong !! Please Try Again!!');
                    window.location.href= '" . base_url() . "Admin/PageSection/managePageSection';
                    </script>";
            }
        }
        else{
            redirect('Admin/Login');
        }
    }
}
