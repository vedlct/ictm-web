<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin/PageSectionm');



    }
    //this will show create page section
    public function createPageSection()
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['pagename'] = $this->PageSectionm->getPageIdName();
            $this->load->view('Admin/newPageSection', $this->data);                    //view create page section

        }
        else{
            redirect('Login');
        }
    }

    //this will insert page section
    public function insertPageSection()
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('createPageSection')) {

                $this->data['pagename'] = $this->PageSectionm->getPageIdName();
                $this->load->view('Admin/newPageSection', $this->data);
            }
            else {
                try {

                    $this->PageSectionm->insertPageSection();
                    echo "<script>
                    alert('Page Section Inserted Successfully');
                    window.location.href= '" . base_url() . "Admin/Page/createPageSection';
                    </script>";
                }
                catch (Exception $e)
                {
                    echo "<script>
                    alert('Some thing Went Wrong !! Please Try Again!!');
                    window.location.href= '" . base_url() . "Admin/Page/managePageSection';
                    </script>";
                }
            }
        }
        else{
            redirect('Login');
        }
    }

    //this will show manage page section
    public function managePageSection()
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['pagename'] = $this->PageSectionm->getPageIdName();
            $this->load->view('Admin/managePageSection', $this->data);

        } else{
            redirect('Login');
        }

    }
    //this will show edit page section
    public function editPageSectionShow($id){


        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['pagesecdata'] = $this->PageSectionm->get_pageSecdataBySecId($id);
            $this->load->view('Admin/editPageSection', $this->data);

        } else{
            redirect('Login');
        }
    }

    //this will edit the page section
    public function editPageSection($id){


        if ($this->session->userdata('type') == USER_TYPE[0] ) {

            if (!$this->form_validation->run('editPageSection')) {

                $this->data['pagesecdata'] = $this->PageSectionm->get_pageSecdataBySecId($id);
                $this->load->view('Admin/editPageSection', $this->data);
            }
            try {

                $this->PageSectionm->updatePagaSectionData($id);
                echo "<script>
                    alert('Page Section Updated Successfully');
                    window.location.href= '" . base_url() . "Admin/Page/managePageSection';
                    </script>";
            }
            catch (Exception $e)
            {
                echo "<script>
                    alert('Some thing Went Wrong !! Please Try Again!!');
                    window.location.href= '" . base_url() . "Admin/Page/managePageSection';
                    </script>";
            }



        } else{
            redirect('Login');
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
            redirect('Login');
        }

    }

    //this will delete page section
    public function deletePageSection($pageSectionId)
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            try {
                $this->PageSectionm->deletePageSectionbyId($pageSectionId);

                redirect('Admin/Page/managePageSection');
            }
            catch (Exception $e)
            {
                echo "<script>
                    alert('Some thing Went Wrong !! Please Try Again!!');
                    window.location.href= '" . base_url() . "Admin/Page/managePageSection';
                    </script>";
            }
        }
        else{
            redirect('Login');
        }
    }
    /* -------------------------------Image validation-------------------------*/
    public function val_img_check()
    {
        $image = $_FILES["image"]["name"];
        if ($image != null) {
            $this->load->library('upload');
            $config['upload_path'] = "images/";
            $config['allowed_types'] = 'jpg|png|jpeg|gif';

//        $config['max_size']    = '2048000';
//        $config['overwrite'] = TRUE;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                $this->form_validation->set_message('val_img_check', $this->upload->display_errors());
                return false;
            } else {
                return true;
            }
        }
    }


}
