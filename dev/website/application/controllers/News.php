<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menum');

    }

    public function index()
    {
        $this->menu();
        $this->load->view('home', $this->data);
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
