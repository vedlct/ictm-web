<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menum');
        $this->load->model('CollegeInfom');
        $this->load->model('Photom');
        $this->load->model('Newsm');

    }

    public function index()
    {
        $this->menu();
        $this->data['newsdata']= $this->Newsm->getLatestNews();
        $this->data['news'] = $this->Newsm->getNewsData();
        $this->data['year'] = $this->Newsm->getYear();
        $this->data['month'] = $this->Newsm->getMonth();
        $this->load->view('news', $this->data);
    }
    public function newsDetails($id)
    {
        $this->menu();
        $this->data['newsDetails'] = $this->Newsm->getNewsDetails($id);
        foreach ($this->data['newsDetails'] as $nd){$date = $nd->newsDate;}
        $this->data['next'] = $this->Newsm->getNext($date);
        $this->data['previous'] = $this->Newsm->getPrevious($date);
        $this->data['newsdata']= $this->Newsm->getLatestNews();
        $this->data['year'] = $this->Newsm->getYear();
        $this->data['month'] = $this->Newsm->getMonth();
        $this->load->view('news-detail', $this->data);
    }
    public function newsDetailsArchive($id)
    {
        $this->menu();
        $this->data['newsDetails'] = $this->Newsm->getNewsDetails($id);
        $this->data['yearmonth'] = $this->Newsm->getYearMonth($id);
        foreach ($this->data['newsDetails'] as $nd){$date = $nd->newsDate;}
        foreach ($this->data['yearmonth'] as $ym){$year = $ym->year; $month=$ym->month;}
        $this->data['next'] = $this->Newsm->getNextArchive($date, $year, $month);
        $this->data['previous'] = $this->Newsm->getPreviousArchive($date, $year, $month);
        $this->data['newsdata']= $this->Newsm->getLatestNews();
        $this->data['year'] = $this->Newsm->getYear();
        $this->data['month'] = $this->Newsm->getMonth();
        $this->load->view('news-archive-details', $this->data);
    }

    public function ArchiveShow($year, $month) {

        $this->menu();
        $this->data['newsArchive'] = $this->Newsm->ArchiveShow($year, $month);
        $this->data['newsdata']= $this->Newsm->getLatestNews();
        $this->data['year'] = $this->Newsm->getYear();
        $this->data['month'] = $this->Newsm->getMonth();
        $this->load->view('news-archive', $this->data);
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
