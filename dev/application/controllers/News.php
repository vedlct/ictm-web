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
        $this->load->model('Searchm');

    }

    public function index() // get news by date and news date for archive
    {
        $this->menu();
        $this->data['newsdata']= $this->Newsm->getLatestNews();
        $this->data['news'] = $this->Newsm->getNewsData();
        $this->data['year'] = $this->Newsm->getYear();
        $this->data['month'] = $this->Newsm->getMonth();
        $this->load->view('news', $this->data);
    }
    public function newsDetails($id) //get the details of the particular news and  date for archive
    {
        $this->menu();
        $this->data['newsDetails'] = $this->Newsm->getNewsDetails($id);
        if (!empty($this->data['newsDetails'])) {
        foreach ($this->data['newsDetails'] as $nd){$date = $nd->newsDate;}
        $this->data['next'] = $this->Newsm->getNext($date);
        $this->data['previous'] = $this->Newsm->getPrevious($date);
        $this->data['newsdata']= $this->Newsm->getLatestNews();
        $this->data['year'] = $this->Newsm->getYear();
        $this->data['month'] = $this->Newsm->getMonth();
        $this->load->view('news-detail', $this->data);
        }else{
            $this->load->view('error');
        }
    }
    public function newsDetailsArchive($id) //get the news details form selected news from archive
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

    public function ArchiveShow($year, $month) //get the year ,month for news archive
    {

        $this->menu();
        $this->data['newsArchive'] = $this->Newsm->ArchiveShow($year, $month);
        $this->data['newsdata']= $this->Newsm->getLatestNews();
        $this->data['year'] = $this->Newsm->getYear();
        $this->data['month'] = $this->Newsm->getMonth();
        $this->load->view('news-archive', $this->data);
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
