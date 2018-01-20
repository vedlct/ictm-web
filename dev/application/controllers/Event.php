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

    public function getEventForTerms()
    {

    }

    public function EventList() //get all the events for Events page
    {
        $this->menu();
        $this->data['allEvents'] = $this->Eventm->getAllEvents();

        $this->load->view('event-list', $this->data);

    }

    public function eventDetails($id) //get the event details for selected event page + simple nev
    {
        $this->menu();
        $this->data['Eventdetails'] = $this->Eventm->getEventDetails($id);
        foreach ($this->data['Eventdetails'] as $eventdetails){$date=$eventdetails->eventStartDate;}
        $this->data['next'] = $this->Eventm->getNext($date,$id);
        $this->data['previous'] = $this->Eventm->getPrevious($date,$id);
        $this->data['eventdata']= $this->Eventm->getLatestEvents();
        $this->load->view('event-detail', $this->data);

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
