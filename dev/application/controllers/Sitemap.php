<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Sitemap extends CI_Controller {


    /**
     * Index Page for this controller.
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menum');
        $this->load->model('Pagem');
        $this->load->model('PageSectionm');
        $this->load->model('Newsm');
        $this->load->model('Eventm');
        $this->load->model('Coursem');
        $this->load->model('CollegeInfom');
        $this->load->model('Photom');
        $this->load->model('Searchm');


    }
    public function index()
    {

        $this->menu();
//        print_r($this->data['parentmenu']);

        $this->load->database();
        $queryMenu = $this->db->where('menuStatus', STATUS[0])->join('ictmpage', 'ictmmenu.pageId = ictmpage.pageId','left')->order_by("ictmmenu.menuName", "asc")->get("ictmmenu");
        $queryPage = $this->db->where('pageStatus', STATUS[0])->get("ictmpage");
        $this->data['pages'] = $queryPage->result();
        $this->data['menu'] = $queryMenu->result();
        $this->load->view('sitemap', $this->data);
    }

//    public function showsitemap(){
//
//        $this->menu();
//        foreach ( $this->data['parentmenu'] as $topmenu){
//        foreach ( $this->data['parentmenu'] as $topmenu){
//
//        }
//
//    }
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