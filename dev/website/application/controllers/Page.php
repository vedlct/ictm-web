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

    }
    function _remap($id) {
        $this->index($id);
    }
    public function index($id)
    {
        $this->menu();
        $this->data['pagetype']=$this->Pagem->getPageType($id);

        foreach ($this->data['pagetype'] as $pt)

            if ($pt->pageType == 'About Type') {

                $this->data['aboutdata']= $this->PageSectionm->getPageData($id);
                $this->load->view('about', $this->data);
                //print_r($this->data['aboutdata']);
            }
            else if ($pt->pageType == 'Health Type') {

                //$this->data['healthdata']= $this->Pagem->getPageData($id);
                $this->data['healthdata']= $this->PageSectionm->getPageData($id);
                $this->load->view('health-safety', $this->data);

            } else if ($pt->pageType == 'Terms Type'){

                //$this->data['termsdata']= $this->Pagem->getPageData($id);
                $this->data['termsdata']= $this->PageSectionm->getPageData($id);
                $this->data['newsdata']= $this->Newsm->getNewsForTerms();
                $this->data['eventdata']= $this->Eventm->getEventForTerms();
                $this->data['coursedata']=$this->Coursem->getCourseTitle();

                $this->load->view('terms-conditions', $this->data);

            }
    }



    public function menu(){
        $this->data['topmenu'] = $this->Menum->getTopMenu();
        $this->data['mainmenu'] = $this->Menum->getMainMenu();
        $this->data['keyinfo'] = $this->Menum->getkeyInfoMenu();
        $this->data['quicklink'] = $this->Menum->getQuickLinksMenu();
        $this->data['implink'] = $this->Menum->getImportantLinkMenu();
        $this->data['bottom'] = $this->Menum->getBottomMenu();

    }
}
