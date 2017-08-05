<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Menu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menum');
        $this->load->model('Admin_Pagem');

    }


    public function index()
    {

    }
/*---------for creating new Menu --------------------- */
    public function NewMenu()
    {
        $this->data['page']=$this->Admin_Pagem->getPageIdName();
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
            echo "<option>New Menu</option>";
            foreach ($this->data['menuName'] as $menuName) {

                echo "<option value='$menuName->menuId'>$menuName->menuName</option>";
            }
        }

    }
    public function CreateNewMenu()
    {
            $this->Menum->CreateNewMenu();
            redirect('Admin_Menu/NewMenu');

    }

}