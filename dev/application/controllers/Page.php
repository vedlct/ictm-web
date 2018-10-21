<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

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
    function _remap($id) {
        $this->index($id);
        //$this->pageSearch($id);
    }
    public function index($id) // get the page+ page Section data
    {
        $this->menu();
        $this->data['pagetype']=$this->Pagem->getPageType($id);

        foreach ($this->data['pagetype'] as $pt)

            if ($pt->pageType == 'About Type') {

                $this->data['aboutdata']= $this->PageSectionm->getPageData($id);
                if (!empty($this->data['aboutdata'])) {
                    $this->data['coursedata'] = $this->Coursem->getCourseTitle();
                    $this->load->view('about', $this->data);
                }else{
                    $this->load->view('error');
                }
            }
            else if ($pt->pageType == 'Health Type') {


                $this->data['healthdata']= $this->PageSectionm->getPageData($id);
                if (!empty($this->data['healthdata'])) {
                    $this->load->view('health-safety', $this->data);

                }else{
                    $this->load->view('error');
                }

            } else if ($pt->pageType == 'Terms Type'){


                $this->data['termsdata']= $this->PageSectionm->getPageData($id);
                if (!empty($this->data['termsdata'])) {
                $this->data['newsdata']= $this->Newsm->getLatestNews();
                $this->data['eventdata']= $this->Eventm->getLatestEvents();
                $this->data['coursedata']=$this->Coursem->getCourseTitle();

                $this->load->view('terms-conditions', $this->data);

            }else{
                    $this->load->view('error');
                }
            }

    }

//    public function pageSearch($id){
//
//        $this->menu();
//        $this->data['pagetype']=$this->Pagem->getPageType($id);
//
//        foreach ($this->data['pagetype'] as $pt)
//
//            if ($pt->pageType == 'About Type') {
//
//                $this->data['aboutdata']= $this->PageSectionm->getPageData($id);
//                $this->data['coursedata']=$this->Coursem->getCourseTitle();
//                $this->load->view('about', $this->data);
//
//            }
//            else if ($pt->pageType == 'Health Type') {
//
//
//                $this->data['healthdata']= $this->PageSectionm->getPageData($id);
//                $this->load->view('health-safety', $this->data);
//
//            } else if ($pt->pageType == 'Terms Type'){
//
//
//                $this->data['termsdata']= $this->PageSectionm->getPageData($id);
//                $this->data['newsdata']= $this->Newsm->getLatestNews();
//                $this->data['eventdata']= $this->Eventm->getLatestEvents();
//                $this->data['coursedata']=$this->Coursem->getCourseTitle();
//
//                $this->load->view('terms-conditions', $this->data);
//
//            }
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
