<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Albumm');
        $this->load->model('Menum');
        $this->load->model('CollegeInfom');
        $this->load->model('Photom');

    }

    public function albumList() // show album list and its photo in photo gallery
    {
        $this->menu();

        $this->data['albumCategoryList']=$this->Albumm->getAlbumCategoryList();
        $this->data['albumname']=$this->Albumm->getAllAlbumName();
        $this->load->view('photo-gallery', $this->data);
    }

    public function albumPhoto($id) // show to all photo of the album
    {

        $this->menu();
        $this->data['albumphoto']=$this->Photom->albumPhoto($id);
        $this->load->view('album-pictures', $this->data);
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
    }
}