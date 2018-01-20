<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Course extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menum');
        $this->load->model('Newsm');
        $this->load->model('Eventm');
        $this->load->model('Coursem');
        $this->load->model('CourseSectionm');
        $this->load->model('Departmentm');
        $this->load->model('CollegeInfom');
        $this->load->model('Photom');
    }
    public function index()
    {
    }
    public function courseList() //get the course list and department name for Course List page
    {
        $this->menu();
        $this->data['coourselist']=$this->Coursem->getCourseTitle();
        $this->data['departmentname']=$this->Departmentm->getDepartmentName();

        $this->load->view('course-list', $this->data);
    }
    public function courseDetails($id) //get the details of selected course
    {
        $this->menu();
        $this->data['coursedetail']= $this->Coursem->getCourseDetails($id);
        $this->data['courseSectiondetail']= $this->CourseSectionm->getCourseSectionDetails($id);

        $this->load->view('course-detail', $this->data);
    }

    public function menu() // get all the menu + footer
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
    }
}