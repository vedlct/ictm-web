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
        if ($this->session->userdata('type') == "Admin") {
            $this->data['page'] = $this->Admin_Pagem->getPageIdName();
            $this->load->view('newMenu', $this->data);
        }
        else{
            redirect('Login');
        }
    }
    public function getMenuLevel($menuType) // for new/sub Menu dropdown
    {
        if ($this->session->userdata('type') == "Admin") {
            //$menuType=$this->input->post('type');
            $this->data['menuName'] = $this->Admin_Menum->getMenuName($menuType);
            if ($this->data['menuName'] == null) {
                echo "<option selected>New Menu</option>";
            } else {
                echo "<option selected>New Menu</option>";
                foreach ($this->data['menuName'] as $menuName) {
                    echo "<option value='$menuName->menuId'>$menuName->menuName</option>";
                }
            }
        }
        else{
            redirect('Login');
        }
    }
    public function CreateNewMenu() // for insert new menu into database
    {
        if ($this->session->userdata('type') == "Admin") {
            if (!$this->form_validation->run('createMenu')) {
                $this->data['page'] = $this->Admin_Pagem->getPageIdName();
                $this->load->view('newMenu', $this->data);
            } else {
                $this->Admin_Menum->CreateNewMenu();
                echo "<script>
                    alert('Menu Created Successfully');
                    window.location.href= '" . base_url() . "Admin_Menu/NewMenu';
                    </script>";
                // redirect('Admin_Menu/NewMenu');
            }
        }
        else{
            redirect('Login');
        }
    }
    /*---------for creating new Menu ------end--------------- */
    /*---------for Manage Menu -----------------------*/
    public function ManageMenu() // for manage menu view
    {
        if ($this->session->userdata('type') == "Admin") {
            $this->data['menu'] = $this->Admin_Menum->getAllforManageMenu();
            //print_r($this->data['menu']);
            $this->load->view('manageMenu', $this->data);
        }
        else{
            redirect('Login');
        }
    }
    public function editMenuView($menuId) // for edit menu view
    {
        if ($this->session->userdata('type') == "Admin") {
            //$menuId = $this->input->post("menuid");
            $this->data['edit_menu'] = $this->Admin_Menum->getAllMenubyId($menuId);
            $this->data['page'] = $this->Admin_Pagem->getPageIdName();
            //print_r($menuId);
            //print_r($this->data['edit_menu']);
            $this->load->view('editMenu', $this->data);
        }
        else{
            redirect('Login');
        }
    }
    public function editMenu($id) // for edit menu from database
    {
        if ($this->session->userdata('type') == "Admin") {
            $this->data['edit_menu_by_id'] = $this->Admin_Menum->editMenubyId($id);
            echo "<script>
                    alert('Menu Updated Successfully');
                    window.location.href= '" . base_url() . "Admin_Menu/ManageMenu';
                    </script>";
            //redirect('Admin_Menu/ManageMenu');
        }
        else{
            redirect('Login');
        }
    }
    public function deleteMenu($menuId)    // delete Menu
    {
        if ($this->session->userdata('type') == "Admin") {
            $this->Admin_Menum->deleteMenubyId($menuId);
        }
        else{
            redirect('Login');
        }
    }
    /*---------for Manage Menu ----------end-------------*/
}