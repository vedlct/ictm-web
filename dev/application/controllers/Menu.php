<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menum');

    }

    public function index() // get the menu data
    {
        $this->data['mainmenu'] = $this->Menum->getMainMenu();
       foreach ($this->data['mainmenu'] as $mm){
         
           $id=$mm->menuId;
           $this->data['parentmenu'] = $this->Menum->getParentMenu($id);

           $this->load->view('test', $this->data);
       }
    }


}
