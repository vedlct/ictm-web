<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Menu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Menum');
        $this->load->model('Admin_Pagem');

    }


    public function index()
    {

    }
/*---------for creating new Menu --------------------- */
    public function NewMenu() // for new menu view
    {
        $this->data['page']=$this->Admin_Pagem->getPageIdName();
        $this->load->view('newMenu',$this->data);
    }

    public function getMenuLevel($menuType) // for new/sub Menu dropdown
    {
        //$menuType=$this->input->post('type');
        $this->data['menuName']=$this->Admin_Menum->getMenuName($menuType);

        if ($this->data['menuName'] == null){

            echo "<option selected>New Menu</option>";
        }
        else
        {
            echo "<option selected>New Menu</option>";
            foreach ($this->data['menuName'] as $menuName) {

                echo "<option value='$menuName->menuId'>$menuName->menuName</option>";
            }
        }

    }
    public function CreateNewMenu() // for insert new menu into database
    {
            $this->Admin_Menum->CreateNewMenu();
            echo "<script>
                    alert('Menu Created Successfully');
                    window.location.href= '" . base_url() . "Admin_Menu/NewMenu';
                    </script>";
           // redirect('Admin_Menu/NewMenu');

    }
    /*---------for creating new Menu ------end--------------- */

    /*---------for Manage Menu -----------------------*/
    public function ManageMenu() // for manage menu view
    {
        $this->data['menu']=$this->Admin_Menum->getAllforManageMenu();
        //print_r($this->data['menu']);
        $this->load->view('manageMenu',$this->data);
    }

    public function editMenuView($menuId) // for edit menu view
    {
        //$menuId = $this->input->post("menuid");
        $this->data['edit_menu']=$this->Admin_Menum->getAllMenubyId($menuId);
        $this->data['page']=$this->Admin_Pagem->getPageIdName();
        //print_r($menuId);
        //print_r($this->data['edit_menu']);
        $this->load->view('editMenu',$this->data);

    }

    public function editMenu($id) // for edit menu from database
    {
        $menuTitle = $this->input->post("menuTitle");
        $menuType = $this->input->post("menuType");
        $menuId = $this->input->post("menuId");
        $pageId = $this->input->post("pageId");
        $menuStatus = $this->input->post("menuStatus");
        if ($menuId == "New Menu" || $menuId == "Menu")
        {
            $menuId =null;
        }
        if ($pageId == "Select Page")
        {
            $pageId =null;
        }
        $this->data['edit_menu_by_id']=$this->Admin_Menum->editMenubyId($id,$menuTitle,$menuType,$menuId,$pageId,$menuStatus);
        redirect('Admin_Menu/ManageMenu');

    }

    public function deleteMenu($menuId) // delete Menu
    {

        $this->Admin_Menum->deleteMenubyId($menuId);


    }
    /*---------for Manage Menu ----------end-------------*/
}