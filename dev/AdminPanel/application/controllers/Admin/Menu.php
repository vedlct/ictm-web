<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Menu extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Menum');
        $this->load->model('Admin/Pagem');
        $this->load->library("pagination");
    }

    /*---------datatable code --------------------- */
    public function ajax_list()
    {
        $list = $this->Menum->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $menu) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $menu->menuName;
            $row[] = $menu->orderNumber;
            $row[] = $menu->menuType;

            if ($menu->submenu == ""){
                $row[] = NONE;
            }else{
                $row[] = $menu->submenu;
            }
            if ($menu->pageTitle==""){
                $row[]= NONE;
            }else{
                $row[]= $menu->pageTitle;
            }

            $row[] = $menu->menuStatus;
            $row[] = $menu->insertedBy;

            if ($menu->lastModifiedBy==""){
                $row[]='Never Modified';
            }else{
                $row[] = $menu->lastModifiedBy;
            }
            if ($menu->lastModifiedDate==""){
                $row[]='Never Modified';
            }else{
                $row[] = $menu->lastModifiedDate;
            }


            $row[] = '<a class="btn" href="'. base_url().'Admin/Menu/editMenuView/'. $menu->menuId.'"><i class="icon_pencil-edit"></i></a>
                                                        <a class="btn" data-panel-id="'. $menu->menuId .'"onclick="selectid(this)"><i class="icon_trash"></i></a>';

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Menum->count_all(),
            "recordsFiltered" => $this->Menum->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
    /*---------for creating new Menu --------------------- */
    public function newMenu()    // for new menu view
    {
        if ($this->session->userdata('type') == USER_TYPE[0])
        {
                $this->data['page'] = $this->Pagem->getPageIdNameforMenu();
                $this->load->view('Admin/newMenu', $this->data);

        }
        else{
            redirect('Admin/Login');
        }
    }

    // for new Menu/sub Menu dropdown
    public function getMenuLevel($menuType)
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['menuName'] = $this->Menum->getMenuNameHasNoParent($menuType);
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
            redirect('Admin/Login');
        }
    }

    public function createNewMenu() // for insert new menu into database
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('createMenu')) {

                $this->data['page'] = $this->Pagem->getPageIdNameforMenu();
                $this->load->view('Admin/newMenu', $this->data);
            }
            else
            {

                $this->data['error'] =$this->Menum->createNewMenu();

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Menu Created Successfully');
                    redirect('Admin/Menu/manageMenu');


                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Menu/newMenu');
                }

            }
        }
        else{
            redirect('Admin/Login');
        }
    }
    /*---------for creating new Menu ------end--------------- */


    /*---------for Manage Menu -----------------------*/
    public function manageMenu() // for manage menu view
    {
        if ($this->session->userdata('type') == USER_TYPE[0])
        {
//            $config = array();
//            $config["base_url"] = base_url() . "Admin/Menu/manageMenu";
//            $config["total_rows"] = $this->Menum->record_count();
//            $config["per_page"] = 10;
//            $config["uri_segment"] = 4;
//            $choice = $config["total_rows"] / $config["per_page"];
//            $config["num_links"] = round($choice);
//            $this->pagination->initialize($config);
//            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
//            $this->data["menu"] = $this->Menum->getAllforManageMenu($config["per_page"], $page);
//            $this->data["links"] = $this->pagination->create_links();

                $this->load->view('Admin/manageMenu1');


        }
        else{
            redirect('Admin/Login');
        }
    }

    public function searchByTitleMenu(){
        if ($this->session->userdata('type') == USER_TYPE[0])
        {
        $title = $this->input->post('title');
        $this->data["links"] = null;
        $this->data["menu"] = $this->Menum->getAllforManageMenuSearchByTitle($title);

        $this->load->view('Admin/manageMenu',$this->data);
        }
        else{
            redirect('Admin/Login');
        }
    }
    public function searchByMenuType(){
        if ($this->session->userdata('type') == USER_TYPE[0])
        {
            $menutype = $this->input->post('menutype');
            //$this->data["links"] = null;
            $this->data["menu"] = $this->Menum->getAllforManageMenuSearchByMenuType($menutype);

            $this->load->view('Admin/searchByMenuType',$this->data);
        }
        else{
            redirect('Admin/Login');
        }
    }


    // for edit menu view
    public function editMenuView($menuId)
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['edit_menu'] = $this->Menum->getAllMenubyId($menuId);
            $this->data['page'] = $this->Pagem->getPageIdNameforMenu();

            $this->load->view('Admin/editMenu', $this->data);

        }
        else{
            redirect('Admin/Login');
        }
    }

    // for edit menu in database
    public function editMenu($id)
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('editMenu')) {

                $this->data['edit_menu'] = $this->Menum->getAllMenubyId($id);
                $this->data['page'] = $this->Pagem->getPageIdNameforMenu();

                $this->load->view('Admin/editMenu', $this->data);
            }
            else
            {

                $this->data['error'] = $this->Menum->editMenubyId($id);
                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Menu Updated Successfully');
                    redirect('Admin/Menu/ManageMenu');


                } else
                 {
                     $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                     redirect('Admin/Menu/editMenu/'.$id);

                }
            }
        }

        else{
            redirect('Admin/Login');
        }
    }

    // delete Menu if no SubMenu
    public function deleteMenu($menuId)
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $subMenuName=$this->Menum->deleteMenubyId($menuId);

            if ($subMenuName!='0'){
                $name=array();
                foreach ($subMenuName as $subMenuName){
                    array_push($name,$subMenuName->menuName);
                }
                $x=implode(" , ",$name);
                echo $x;
            }
            else{
                $this->session->set_flashdata('successMessage','Menu Deleted Successfully');
                echo $subMenuName;
            }

        }
        else{
            redirect('Admin/Login');
        }
    }
    /*---------for Manage Menu ----------end-------------*/


    /*------------ for callback menuTitle_check ------------*/
    public function menuTitleCheck()
    {
        $menuTitle = $this->input->post("menuTitle");
        $menuType = $this->input->post("menuType");

        try
        {
            $this->data['checkMenuTitle'] = $this->Menum->checkMenuTitleUniquePerMenuType($menuTitle,$menuType);

            if (empty($this->data['checkMenuTitle'])){

                return true;
            }
            else{
                $this->form_validation->set_message('menuTitleCheck', 'Menu Title Allready Existed');
                return false;
            }
        }
        catch (Exception $e){

            $this->form_validation->set_message('menuTitleCheck', 'Some thing Went Wrong !! Please Try Again!!');
            return false;
        }
    }

    public function menuOrderCheckFormNewMenu() // validation check for menu title from edit menu
    {
        $orderNumber = $this->input->post("orderNumber");
        $menuType = $this->input->post("menuType");



        try
        {
            $this->data['MenuOrder'] = $this->Menum->menuOrderCheckFormNewMenu($menuType,$orderNumber);

            if (empty($this->data['MenuOrder'])){

                return true;
            }
            else{
                $this->form_validation->set_message('menuOrderCheckFormNewMenu', 'Menu Order Number Allready Existed For this Menu Type');
                return false;
            }
        }
        catch (Exception $e){

            $this->form_validation->set_message('menuOrderCheckFormNewMenu', 'Some thing Went Wrong !! Please Try Again!!');
            return false;
        }

    }

    public function menuOrderCheckFormeditMenu() // validation check for menu title from edit menu
    {
        $orderNumber = $this->input->post("orderNumber");
        $menuType = $this->input->post("menuType");
        $id=$this->uri->segment(4);



        try
        {
            $this->data['MenuOrder'] = $this->Menum->menuOrderCheckFormeditMenu($id,$menuType,$orderNumber);

            if (empty($this->data['MenuOrder'])){

                return true;
            }
            else{
                $this->form_validation->set_message('menuOrderCheckFormeditMenu', 'Menu Order Number Allready Existed For this Menu Type');
                return false;
            }
        }
        catch (Exception $e){

            $this->form_validation->set_message('menuOrderCheckFormeditMenu', 'Some thing Went Wrong !! Please Try Again!!');
            return false;
        }

    }

    public function menuTitleCheckFormEditMenu() // validation check for menu title from edit menu
    {
        $menuTitle = $this->input->post("menuTitle");
        $menuType = $this->input->post("menuType");
        $id=$this->uri->segment(4);


        try
        {
            $this->data['checkMenuTitle'] = $this->Menum->checkUniqueMenuTitle($menuTitle,$menuType,$id);

            if (empty($this->data['checkMenuTitle'])){

                return true;
            }
            else{
                $this->form_validation->set_message('menuTitleCheckFormEditMenu', 'Menu Title Allready Existed');
                return false;
            }
        }
        catch (Exception $e){

            $this->form_validation->set_message('menuTitleCheckFormEditMenu', 'Some thing Went Wrong !! Please Try Again!!');
            return false;
        }

    }
    /*------------ for callback menuTitle_check ----- end -------*/
}