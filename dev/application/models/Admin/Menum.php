<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Menum extends CI_Model
{
    public function createNewMenu()
    {
        $menuTitle = $this->input->post("menuTitle");
        $menuType = $this->input->post("menuType");
        $menuId = $this->input->post("menuId");
        $pageId = $this->input->post("pageId");
        $menuStatus = $this->input->post("menuStatus");
        if ($menuId == "New Menu")
        {
            $menuId =null;
        }
        if ($pageId == "Select Page")
        {
            $pageId =null;
        }

        $data = array(
            'menuName' => $menuTitle,
            'menuType' => $menuType,
            'parentId' => $menuId,
            'pageId' => $pageId,
            'menuStatus' => $menuStatus,
            'lastModifiedBy'=>$this->session->userdata('id'),
            'insertedBy'=>$this->session->userdata('id')
        );

        $this->db->insert('ictmmenu', $data);
    }
    public function getMenuName($menuType)
    {
        $this->db->select('menuId, menuName');
        $this->db->where('menuType', $menuType);
        $query = $this->db->get('ictmmenu');
        return $query->result();
    }

    public function getAllforManageMenu()
    {

//        $this->db->select('m.*,u.userTitle as userName');
//        $this->db->from('ictmmenu m');
//        $this->db->join('ictmusers u', 'u.roleId = m.lastModifiedBy');
//

//        $this->db->select('m.*,p.pageTitle');
//        $this->db->from('ictmmenu m');
//        $this->db->join('ictmpage p', 'p.pageId = m.pageId');
//        $this->db->where('menuId', $id);
//
//        $query = $this->db->get();
//        return $query->result();

        $query = $this->db->get('ictmmenu');
        return $query->result();
    }


    public function getAllMenubyId($menuId)
    {
        $query = $this->db->get_where('ictmmenu', array('menuId' => $menuId));
        return $query->result();
    }

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
            'lastModifiedBy'=>$this->session->userdata('id')


        );

        $this->db->where('menuId', $id);
        $this->db->update('ictmmenu', $data);
    }

    public function deleteMenubyId($menuId)
    {
        $this->db->where('parentId', $menuId);
        $this->db->delete('ictmmenu');

        $this->db->where('menuId', $menuId);
        $this->db->delete('ictmmenu');
    }


}