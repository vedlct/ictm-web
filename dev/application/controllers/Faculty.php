<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Faculty extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menum');
        $this->load->model('Facultym');
        $this->load->model('Coursem');
        $this->load->model('Eventm');
        $this->load->model('CollegeInfom');
        $this->load->model('Photom');
        $this->load->model('Searchm');

    }
    public function index()
    {
    }
    public function facultyList() //get the faculty list for faculty members page
    {
        $this->menu();
        $this->data['facultylist']=$this->Facultym->getAllFacultyList();
        $this->data['coursedata']=$this->Coursem->getCourseTitle();
        $this->data['eventdata']= $this->Eventm->getLatestEvents();
        $this->load->view('faculty-members', $this->data);
    }
    public function facultyDetails($id) //get all the details of selected faculty
    {

        $this->data['facultydetails']= $this->Facultym->getfacultyDetails($id);
        if (!empty($this->data['facultydetails'])) {
            $this->menu();
            $this->data['coursedata'] = $this->Coursem->getCourseTitle();
            $this->data['facultyCourseData'] = $this->Coursem->facultyAllCourseData($id);
            $this->load->view('faculty-member-detail', $this->data);
        }else{
            $this->load->view('error');
        }
    }

    public function menu() //  get all the menu+ footer
    {
        $this->data['affiliation'] = $this->Menum->getAffiliations();
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

        $this->data['searchpage'] = $this->Searchm->getpage();
        $this->data['searchnews'] = $this->Searchm->getNews();
        $this->data['searchevents'] = $this->Searchm->getEvents();
    }


}