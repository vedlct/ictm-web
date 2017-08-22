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
        if ($this->session->userdata('type') == USER_TYPE[0])
        {
                $this->data['page'] = $this->Pagem->getPageIdName();
                $this->load->view('Admin/newMenu', $this->data);

        }
        else{
            redirect('Login');
        }
    }
    public function getMenuLevel($menuType) // for new Menu/sub Menu dropdown
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['menuName'] = $this->Menum->getMenuName($menuType);
            if ($this->data['menuName'] == null) {
                echo "<option value='' selected>".NEW_MENU."</option>";
            } else {
                echo "<option value='' selected>".NEW_MENU."</option>";
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
        if ($this->session->userdata('type') == USER_TYPE[0]) {
            if (!$this->form_validation->run('createMenu')) {

                $this->data['page'] = $this->Pagem->getPageIdName();
                $this->load->view('Admin/newMenu', $this->data);
            }
            else {
                try
                {

                    $this->Menum->createNewMenu();
                    echo "<script>
                    alert('Menu Created Successfully');
                    window.location.href= '" . base_url() . "Admin/Menu/manageMenu';
                    </script>";
                }
                catch (Exception $e)
                {
                    echo "<script>
                    alert('Some thing Went Wrong !! Please Try Again!!');
                    window.location.href= '" . base_url() . "Admin/Menu/manageMenu';
                    </script>";
                }

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
        if ($this->session->userdata('type') == USER_TYPE[0])
        {
                $this->data['menu'] = $this->Menum->getAllforManageMenu();
                $this->load->view('Admin/manageMenu', $this->data);
        }
        else{
            redirect('Login');
        }
    }
    public function editMenuView($menuId)  // for edit menu view
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['edit_menu'] = $this->Menum->getAllMenubyId($menuId);
            $this->data['page'] = $this->Pagem->getPageIdName();

            $this->load->view('Admin/editMenu', $this->data);

        }
        else{
            redirect('Login');
        }
    }
    public function editMenu($id) // for edit menu in database
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('editMenu')) {

                $this->data['edit_menu'] = $this->Menum->getAllMenubyId($id);
                $this->data['page'] = $this->Pagem->getPageIdName();

                $this->load->view('Admin/editMenu', $this->data);
            }
            else {

                $this->data['edit_menu_by_id'] = $this->Menum->editMenubyId($id);
                echo "<script>
                    alert('Menu Updated Successfully');
                    window.location.href= '" . base_url() . "Admin/Menu/ManageMenu';
                    </script>";
            }
        }
        else{
            redirect('Login');
        }
    }
    public function deleteMenu($menuId)    // delete Menu if no SubMenu
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {
            $r=$this->Menum->deleteMenubyId($menuId);
            if ($r!='0'){
                $name=array();

                foreach ($r as $r){
                    array_push($name,$r->menuName);
                }

                $x=implode(" , ",$name);
                   echo $x;

            }
            else{echo $r;}


        }
        else{
            redirect('Login');
        }
    }
    /*---------for Manage Menu ----------end-------------*/


    /*------------ for callback menuTitle_check ------------*/
    public function menuTitle_Check()
    {
        $menuTitle = $this->input->post("menuTitle");
        $menuType = $this->input->post("menuType");
        try
        {
            $this->data['checkMenuTitle'] = $this->Menum->checkMenuTitleUniquePerMenuType($menuTitle,$menuType);

            if ($this->data['checkMenuTitle']==""){

                return true;
            }
            else{
                $this->form_validation->set_message('menuTitle_Check', 'Menu Title Allready Existed');
                return false;
            }
        }
        catch (Exception $e){

            $this->form_validation->set_message('menuTitle_Check', 'Some thing Went Wrong !! Please Try Again!!');
            return false;
        }


    }
    /*------------ for callback menuTitle_check ----- end -------*/
}