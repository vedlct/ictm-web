<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin/Pagem');


    }
 

    // this will show create page
    public function createPage()
    {
        if ($this->session->userdata('type') == Admin) {
            $this->load->view('Admin/newPage');
        }
        else{
            redirect('Login');
        }
    }

    // this will insert page
    public function insertPage()
    {
        if ($this->session->userdata('type') == Admin) {

            $this->Pagem->insertPage();
            redirect('Admin/Page/createPage');
        }
        else{
            redirect('Login');
        }
    }

    //this will show manage page section
    public function managePage()
    {
        if ($this->session->userdata('type') == Admin) {
            $this->data['pageData'] = $this->Pagem->getPagaData();

             $this->load->view('Admin/managePage', $this->data);
        }
        else{
            redirect('Login');
        }
    }

    //this will show edit page with data
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
    //this will edit page
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


    //this will delete page
    public function deletePage($pageId)
    {
        if ($this->session->userdata('type') == Admin) {

            //  echo $pageId;
            $this->data['pagedata'] =$this->Pagem->checkParentId($pageId);



            $name=array();
            $y=$this->data['pagedata'];
            if (empty($y)){
                $this->Pagem->deletePagebyId($pageId);
            }else{


                for ($i=0;$i<count($y);$i++){
                    array_push($name, $y[$i]);
                }
                ?>
                <script type='text/javascript'>
                    var x =<?php echo json_encode( $name ) ?>;
                    alert('Please Delete '+x+' First');
                </script>

                <?php
                echo "<script>
                    window.location.href= '" . base_url() . "Admin/Page/managePage';
                    </script>";
            }
            //print_r($this->data['pagedata']);
        }
        else{
            redirect('Login');
        }
    }


    /////////PageSection///////////////

    //this will show create page section
    public function createPageSection()
    {
        if ($this->session->userdata('type') == Admin) {

            $this->data['pagename'] = $this->Pagem->getPageIdName();
            $this->load->view('Admin/newPageSection', $this->data);
        }
        else{
            redirect('Login');
        }
    }

    //this will insert page section
    public function insertPageSection()
    {
        if ($this->session->userdata('type') == Admin) {

        $this->Pagem->insertPageSection();
        redirect('Admin/Page/createPageSection');

        }
        else{
            redirect('Login');
        }
    }

    //this will show manage page section
    public function managePageSection()
    {

        if ($this->session->userdata('type') == Admin) {

            $this->data['pagename'] = $this->Pagem->getPageIdName();
            $this->load->view('Admin/managePageSection', $this->data);

        } else{
            redirect('Login');
        }

    }
    //this will show edit page section
    public function editPageSectionShow($id){


        if ($this->session->userdata('type') == Admin) {

            $this->data['pagesecdata'] = $this->Pagem->get_pageSecdataBySecId($id);
            $this->load->view('Admin/editPageSection', $this->data);

        } else{
            redirect('Login');
        }
    }

    //this will edit the page section
    public function editPageSection($id){


        if ($this->session->userdata('type') == Admin) {

            $this->Pagem->updatePagaSectionData($id);
            redirect('Admin/Page/managePageSection');

        } else{
            redirect('Login');
        }
    }

    //this is a AJAX controller
    //this will show manage page table after select the page
    public function showPageSecManageTable(){

        if ($this->session->userdata('type') == Admin) {

            $id = $this->input->post("id");
            $this->data['pagedata'] = $this->Pagem->get_pageSecdata($id);
            $this->load->view('Admin/showManagePageSec', $this->data);

        } else{
            redirect('Login');
        }

    }

    //this will delete page section
    public function deletePageSection($pageSectionId)
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
