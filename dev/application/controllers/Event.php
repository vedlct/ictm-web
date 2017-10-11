<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menum');
        $this->load->model('CollegeInfom');
        $this->load->model('Photom');
        $this->load->model('Eventm');

    }

    public function index()
    {

    }

    public function getEventForTerms(){

    }

    public function EventList(){
        $this->menu();
        $this->data['allEvents'] = $this->Eventm->getAllEvents();
        $this->load->view('event-list', $this->data);

    }

    public function eventDetails($id){
        $this->menu();
        $this->data['Eventdetails'] = $this->Eventm->getEventDetails($id);
        $this->data['eventdata']= $this->Eventm->getLatestEvents();
        $this->load->view('event-detail', $this->data);

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
        $this->data['photoGalleryForFooter'] = $this->Photom->getFooterPhotoGallery();

    }
}
