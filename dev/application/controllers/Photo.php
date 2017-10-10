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

    public function albumList(){
        $this->menu();
        //$this->data['albumlist']=$this->Albumm->getAlbumListWithCategory();
        $this->data['albumCategoryList']=$this->Albumm->getAlbumCategoryList();
        $this->load->view('photo-gallery', $this->data);
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