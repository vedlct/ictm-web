<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

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
        $this->load->model('Searchm');
    }
    public function index()
    {
       // $this->load->view('department');
    }

    public function showDetails ($id) //get the details of selected department
    {

        $this->menu();
        $this->data['dDeteails'] = $this->Departmentm->getDepartmentDetails($id);
        if (!empty($this->data['dDeteails'])) {
            $this->data['coursedata'] = $this->Coursem->getCourseTitle();
            $this->load->view('department', $this->data);
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
