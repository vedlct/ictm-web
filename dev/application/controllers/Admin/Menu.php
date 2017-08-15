<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Menu extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Menum');
        $this->load->model('Admin/Pagem');
    }
    public function index()
    {
    }
    /*---------for creating new Menu --------------------- */
    public function newMenu()    // for new menu view
    {
        if ($this->session->userdata('type') == Admin) {
            $this->data['page'] = $this->Pagem->getPageIdName();
            $this->load->view('Admin/newMenu', $this->data);
        }
        else{
            redirect('Login');
        }
    }
    public function getMenuLevel($menuType) // for new/sub Menu dropdown
    {
        if ($this->session->userdata('type') == Admin) {

            $this->data['menuName'] = $this->Menum->getMenuName($menuType);
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
    public function createNewMenu() // for insert new menu into database
    {
        if ($this->session->userdata('type') == Admin) {
            if (!$this->form_validation->run('createMenu')) {

                $this->data['page'] = $this->Pagem->getPageIdName();
                $this->load->view('Admin/newMenu', $this->data);
            }
            else {

                $this->Menum->createNewMenu();
                echo "<script>
                    alert('Menu Created Successfully');
                    window.location.href= '" . base_url() . "Admin/Menu/newMenu';
                    </script>";

            }
        }
        else{
            redirect('Login');
        }
    }
    /*---------for creating new Menu ------end--------------- */


    /*---------for Manage Menu -----------------------*/
    public function manageMenu() // for manage menu view
    {
        if ($this->session->userdata('type') == Admin) {
            $this->data['menu'] = $this->Menum->getAllforManageMenu();
            //print_r($this->data['menu']);
            $this->load->view('Admin/manageMenu', $this->data);
        }
        else{
            redirect('Login');
        }
    }
    public function editMenuView($menuId) // for edit menu view
    {
        if ($this->session->userdata('type') == Admin) {

            $this->data['edit_menu'] = $this->Menum->getAllMenubyId($menuId);
            $this->data['page'] = $this->Pagem->getPageIdName();

            $this->load->view('Admin/editMenu', $this->data);
        }
        else{
            redirect('Login');
        }
    }
    public function editMenu($id) // for edit menu from database
    {
        if ($this->session->userdata('type') == Admin) {
            $this->data['edit_menu_by_id'] = $this->Menum->editMenubyId($id);
            echo "<script>
                    alert('Menu Updated Successfully');
                    window.location.href= '" . base_url() . "Admin/Menu/ManageMenu';
                    </script>";

        }
        else{
            redirect('Login');
        }
    }
    public function deleteMenu($menuId)    // delete Menu if no Submenu
    {
        if ($this->session->userdata('type') == Admin) {
            $r=$this->Menum->deleteMenubyId($menuId);
            if ($r!='0'){
                $name=array();
//            for ($i=0;$i<count($r);$i++){
//                array_push($name, $r[$i]);
//            }
                foreach ($r as $r){
                    array_push($name,$r->menuName);
                }

                $x=implode(" , ",$name);;
                   echo $x;

            }
            else{echo $r;}


        }
        else{
            redirect('Login');
        }
    }
    /*---------for Manage Menu ----------end-------------*/
}