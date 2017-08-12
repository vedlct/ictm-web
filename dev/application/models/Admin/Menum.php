<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Menum extends CI_Model
{

    public function createNewMenu() // this creates a new Menu in database
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
            'insertedBy'=>$this->session->userdata('id'),
            'insertedDate'=>date("Y-m-d H:i:s"),
            'lastModifiedDate'=>date("Y-m-d H:i:s"),
        );

        $this->db->insert('ictmmenu', $data);
    }
    public function getMenuName($menuType)  //get Menu Name and id
    {
        $this->db->select('menuId, menuName');
        $this->db->where('menuType', $menuType);
        $query = $this->db->get('ictmmenu');
        return $query->result();
    }

    public function getAllforManageMenu() // get all menu for mangeMenuView
    {

        $this->db->select('m.*,u.userTitle as userName');
        $this->db->from('ictmmenu m');
        $this->db->join('ictmusers u', 'm.lastModifiedBy = u.userId');
        $query = $this->db->get();
        return $query->result();


//        $this->db->select('m.*,p.pageTitle');
//        $this->db->from('ictmmenu m');
//        $this->db->join('ictmpage p', 'p.pageId = m.pageId');
//        $this->db->where('menuId', $id);
//
//        $query = $this->db->get();
//        return $query->result();

//        $query = $this->db->get('ictmmenu');
//        return $query->result();
    }


    public function getAllMenubyId($menuId)  //get all information of the selected Menu
    {
        $query = $this->db->get_where('ictmmenu', array('menuId' => $menuId));
        return $query->result();
    }

    public function editMenubyId($id)  // edit menu by id  in database
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
            'lastModifiedBy'=>$this->session->userdata('id')


        );

        $this->db->where('menuId', $id);
        $this->db->update('ictmmenu', $data);
    }

    public function deleteMenubyId($menuId) //delete menu and it's submenu
    {
        $this->db->where('parentId', $menuId);
        $this->db->delete('ictmmenu');

        $this->db->where('menuId', $menuId);
        $this->db->delete('ictmmenu');
    }


}