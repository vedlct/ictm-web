<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Menu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menum');
        $this->load->model('Menum');

    }


    public function index()
    {

    }
/*---------for creating new Menu --------------------- */
    public function NewMenu()
    {
        $this->data['menuType']=$this->Menum->getMenu();
        $this->load->view('newMenu',$this->data);
    }

    public function getMenuLevel($menuType)
    {
        //$menuType=$this->input->post('type');
        $this->data['menuName']=$this->Menum->getMenuName($menuType);

        if ($this->data['menuName'] == null){

            echo "<option selected>Select Menu Name</option>
                   <option>New Menu</option>";
        }
        else
        {
            foreach ($this->data['menuName'] as $menuName) {

                echo "<option>New Menu</option>
                        <option>$menuName->menuName</option>";
            }
        }

    }
    
}