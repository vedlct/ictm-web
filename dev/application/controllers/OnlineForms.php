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
        $this->load->view('register-ineterest', $this->data);

    }
<<<<<<< HEAD
    public function applyNow() // go to the apply pageNow
=======

    public function insertRegisterInterest(){



    }
    public function applyNow() // go to the apply page of selected course
>>>>>>> c78cda7b6da93a506f26c71b617055689f237939
    {
        $this->menu();
        $this->data['coursedata']=$this->Coursem->getCourseTitle();
        $this->load->view('application-form', $this->data);
    }
<<<<<<< HEAD
    public function feedback() // go to the feedback page
    {
        $this->menu();
        $this->load->view('feedback-form', $this->data);
    }
    public function SubmitFeedback() // Submit the feedback
    {
        //$this->load->model('Departmentm');
    }
=======


>>>>>>> c78cda7b6da93a506f26c71b617055689f237939
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