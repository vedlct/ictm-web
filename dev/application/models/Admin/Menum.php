<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Menum extends CI_Model
{
        /*----------- this creates a new Menu in database------------*/
    public function createNewMenu()
    {
        $menuTitle = $this->input->post("menuTitle");
        $menuType = $this->input->post("menuType");
        $menuId = $this->input->post("menuId");
        $pageId = $this->input->post("pageId");
        $menuStatus = $this->input->post("menuStatus");
        if ($menuId == newMenu)
        {
            $menuId =null;
        }
        if ($pageId == selectPage)
        {
            $pageId =null;
        }
        date_default_timezone_set("Europe/London");
        $data = array(
            'menuName' => $menuTitle,
            'menuType' => $menuType,
            'parentId' => $menuId,
            'pageId' => $pageId,
            'menuStatus' => $menuStatus,
            'insertedBy'=>$this->session->userdata('userEmail'),
            'insertedDate'=>date("Y-m-d H:i:s"),

        );

        $this->db->insert('ictmmenu', $data);
    }
            /*-----get Menu Name and id----------*/
    public function getMenuName($menuType)
    {
        $this->db->select('menuId, menuName');
        $this->db->where('menuType', $menuType);
        $query = $this->db->get('ictmmenu');
        return $query->result();
    }


    /*---- get all menu for mangeMenuView -----*/
    public function getAllforManageMenu()
    {

        $this->db->select('m.*,menu.menuName as submenu,p.pageTitle');
        $this->db->from('ictmmenu m');
        $this->db->join('ictmmenu menu', 'm.parentId = menu.menuId','left');
        $this->db->join('ictmpage p', 'm.pageId = p.pageId','left');
        $query = $this->db->get();
        return $query->result();


    }

        /*-- get all information of the selected Menu ---*/
    public function getAllMenubyId($menuId)
    {
        $query = $this->db->get_where('ictmmenu', array('menuId' => $menuId));
        return $query->result();
    }

        /*-------- edit menu by id  in database--------------*/
    public function editMenubyId($id)
    {
        $menuTitle = $this->input->post("menuTitle");
        $menuType = $this->input->post("menuType");
        $menuId = $this->input->post("menuId");
        $pageId = $this->input->post("pageId");
        $menuStatus = $this->input->post("menuStatus");

        if ($menuId == newMenu || $menuId == Menu)
        {
            $menuId =null;
        }
        if ($pageId == None)
        {
            $pageId =null;
        }

        date_default_timezone_set("Europe/London");
        $data = array(
            'menuName' => $menuTitle,
            'menuType' => $menuType,
            'parentId' => $menuId,
            'pageId' => $pageId,
            'menuStatus' => $menuStatus,
            'lastModifiedDate'=>date("Y-m-d H:i:s"),
            'lastModifiedBy'=>$this->session->userdata('userEmail')

        );

        $this->db->where('menuId', $id);
        $this->db->update('ictmmenu', $data);
    }


    /*---------delete menu if no Submenu-----------------*/
    public function deleteMenubyId($menuId) //delete menu if no Submenu
    {

        $query = $this->db->get_where('ictmmenu', array('parentId' => $menuId));

        if (empty($query->result())){

        $this->db->where('menuId',$menuId);
        $this->db->delete('ictmmenu');
        return 0;
        }
        else{
            return $query->result();
        }



    }


}