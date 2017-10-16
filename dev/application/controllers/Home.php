<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Homem');
        $this->load->model('Menum');
        $this->load->model('CollegeInfom');
        $this->load->model('Photom');

    }

    public function index() //get all the information for menu
    {

        $this->menu();
        $this->data['news'] = $this->Homem->getNews();
        $this->data['events'] = $this->Homem->getEvents();
        $this->data['affiliation'] = $this->Homem->getAffiliations();
        $this->data['feedback'] = $this->Homem->getFeedback();
        $this->data['home'] = $this->Homem->getHomeAlldata();
        $this->load->view('home', $this->data);

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
