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
    public function applyNow() // go to the apply pageNow
    {
        $this->menu();
        $this->data['coursedata']=$this->Coursem->getCourseTitle();
        $this->load->view('application-form', $this->data);
    }
    public function feedback() // go to the feedback page
    {
        $this->menu();
        $this->load->view('feedback-form', $this->data);
    }
    public function SubmitFeedback() // Submit the feedback
    {
        //$this->load->model('Departmentm');
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