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
        $this->menu();
        $this->data['facultydetails']= $this->Facultym->getfacultyDetails($id);
        $this->data['coursedata']=$this->Coursem->getCourseTitle();
        $this->data['facultyCourseData']=$this->Coursem->facultyAllCourseData($id);
        $this->load->view('faculty-member-detail',$this->data);
    }
    public function menu() //  get all the menu+ footer
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