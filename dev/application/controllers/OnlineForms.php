<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OnlineForms extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menum');
        $this->load->model('CollegeInfom');
        $this->load->model('Photom');
        $this->load->model('Eventm');
        $this->load->model('Newsm');
        $this->load->model('Coursem');
        $this->load->model('OnlineFormsm');

    }

    public function index()
    {

    }
    public function contactUs() //go to the contact us page
    {
        $this->menu();
        $this->load->view('contact', $this->data);

    }
    public function registerInterest() //go to the register Interest page
    {
        $this->menu();
        $this->data['course']=$this->Coursem->getCourseTitle();
        $this->load->view('register-ineterest', $this->data);

    }

    public function insertRegisterInterest(){

        if (!$this->form_validation->run('RegisterInterest')) {

         $this->registerInterest();

        }
        else {
            $this->data['error'] =$this->OnlineFormsm->insertRegisterInterest();
            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage','Your Form Submit Successfully');
                redirect('OnlineForms/registerInterest');


            }
            else
            {
                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('OnlineForms/registerInterest');

            }
        }

    }
    public function applyNow() // go to the apply page of selected course
    {
        $this->menu();
        $this->data['coursedata']=$this->Coursem->getCourseTitle();
        $this->load->view('application-form', $this->data);
    }


    public function menu() // get all the menu + footer
    {
        $this->data['topmenu'] = $this->Menum->getTopMenu();
        $this->data['parentmenu'] = $this->Menum->getParentMenu();
        $this->data['checkparentmenu'] = $this->Menum->checkParentMenu();
        $this->data['mainmenu'] = $this->Menum->getMainMenu();
        $this->data['keyinfo'] = $this->Menum->getkeyInfoMenu();
        $this->data['quicklink'] = $this->Menum->getQuickLinksMenu();
        $this->data['implink'] = $this->Menum->getImportantLinkMenu();
        $this->data['bottom'] = $this->Menum->getBottomMenu();
        $this->data['contact'] = $this->CollegeInfom->getCollegeContact();
        $this->data['photoGalleryForFooter'] = $this->Photom->getFooterPhotoGallery();

    }

}