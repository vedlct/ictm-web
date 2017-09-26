<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Affiliation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Affiliationm');
        $this->load->library("pagination");

    }

    public function index()
    {

    }
    /* this will show  create Affiliation page*/
    public function newAffiliation()
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->load->view('Admin/newAffiliation');


        }
        else {

            redirect('Admin/Login');
        }
    }

    public function createNewAffiliation() // for insert new Affiliation into database
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('createAffiliation')) {

                $this->load->view('Admin/newAffiliation');
            }
            else
            {

                $this->data['error'] =$this->Affiliationm->createNewAffiliation();

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Affiliation Created Successfully');
                    redirect('Admin/Affiliation/manageAffiliation');


                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Affiliation/newAffiliation');
                }

            }

        }
        else{
            redirect('Admin/Login');
        }
    }
    /*---------for creating new Affiliation ------end--------------- */

    /*---------for Manage Affiliation -----------------------*/
    public function manageAffiliation() // for manage Affiliation view
    {
        if ($this->session->userdata('type') == USER_TYPE[0])
        {
            $config = array();
            $config["base_url"] = base_url() . "Admin/Affiliation/manageAffiliation";
            $config["total_rows"] = $this->Affiliationm->record_count();
            $config["per_page"] = 10;
            $config["uri_segment"] = 4;
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = round($choice);
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $this->data["affiliations"] = $this->Affiliationm->getAllforManageAffiliation($config["per_page"], $page);
            $this->data["links"] = $this->pagination->create_links();

            $this->load->view('Admin/manageAffiliation',$this->data);

        }
        else{
            redirect('Admin/Login');
        }
    }

    public function editAffiliationView($affiliationId) // for edit  Selected Affiliation view
    {
        if ($this->session->userdata('type') == USER_TYPE[0])
        {

            $this->data['editAffiliation'] = $this->Affiliationm->getAllAffiliationbyId($affiliationId);
            $this->load->view('Admin/editAffiliation', $this->data);
        }

        else{
            redirect('Admin/Login');
        }
    }

    public function editAffiliation($affiliationId) // for edit Affiliation by id from database
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('editAffiliation')) {

                $this->data['editAffiliation'] = $this->Affiliationm->getAllAffiliationbyId($affiliationId);
                $this->load->view('Admin/editAffiliation', $this->data);
            }

            else
            {

                $this->data['error'] = $this->Affiliationm->editAffiliationbyId($affiliationId);


                if (empty($this->data['error'])) {
                    $this->session->set_flashdata('successMessage','Affiliation Update Successfully');
                    redirect('Admin/Affiliation/manageAffiliation');
                }
                else
                {

                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Affiliation/editAffiliation/'.$affiliationId);
                }


            }
        }
        else{
            redirect('Admin/Login');
        }
    }

    public function deleteAffiliation($AffiliationId) // delete Affiliation from database
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->Affiliationm->deleteAffiliationbyId($AffiliationId);
            $this->session->set_flashdata('successMessage','Affiliation Deleted Successfully');

        }

        else{
            redirect('Admin/Login');
        }
    }

    // show Affiliation image in new tab
    public function showImageForEdit($AffiliationId)
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['affiliationIdImage'] = $this->Affiliationm->getImage($AffiliationId);
            $this->load->view('Admin/showImage', $this->data);
        }
        else{
            redirect('Admin/Login');
        }
    }

    //this function will delete the image in edit
    public function deleteAffiliationImage($AffiliationId){

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['error'] = $this->Affiliationm->deleteAffiliationImage($AffiliationId);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage','Affiliation Image Deleted Successfully');
                redirect('Admin/Affiliation/editAffiliationView/'.$AffiliationId);
            }
            else
            {
                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/Affiliation/editAffiliationView/'.$AffiliationId);
            }
        }
        else{
            redirect('Admin/Login');
        }
    }


    public function val_img_check()
    {
        $image = $_FILES['affiliationImage']['name'];
        $supported_image = array('gif','jpg','jpeg','png');

        if ($image != null) {
            $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));

            if (in_array($ext, $supported_image)) {
                //echo "it's image";
                return true;
            } else {
                $this->form_validation->set_message('val_img_check', "Only JPEG/JPG/PNG/GIF Image is allowed!!");
                return false;
                //echo 'not image';

            }
        }
    }
}