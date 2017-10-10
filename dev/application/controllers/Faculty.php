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

    }
    public function index()
    {
    }
    public function facultyList(){
        $this->menu();
        $this->data['facultylist']=$this->Facultym->getAllFacultyList();
        $this->data['coursedata']=$this->Coursem->getCourseTitle();
        $this->data['eventdata']= $this->Eventm->getEventForTerms();
        $this->load->view('faculty-members', $this->data);
    }
    public function facultyDetails($id){
        $this->menu();
        $this->data['facultydetails']= $this->Facultym->getfacultyDetails($id);
        $this->data['coursedata']=$this->Coursem->getCourseTitle();
        $this->data['facultyCourseData']=$this->Coursem->facultyAllCourseData($id);
        $this->load->view('faculty-member-detail',$this->data);
    }
    public function menu(){
        $this->data['topmenu'] = $this->Menum->getTopMenu();
        $this->data['parentmenu'] = $this->Menum->getParentMenu();
        $this->data['mainmenu'] = $this->Menum->getMainMenu();
        $this->data['keyinfo'] = $this->Menum->getkeyInfoMenu();
        $this->data['quicklink'] = $this->Menum->getQuickLinksMenu();
        $this->data['implink'] = $this->Menum->getImportantLinkMenu();
        $this->data['bottom'] = $this->Menum->getBottomMenu();
        $this->data['contact'] = $this->CollegeInfom->getCollegeContact();
    }


}