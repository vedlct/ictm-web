<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Menum extends CI_Model
{
    public function CreateNewMenu()
    {
        $menuTitle = $this->input->post("menuTitle");
        $menuType = $this->input->post("menuType");
        $menuId = $this->input->post("menuId");
        $pageId = $this->input->post("pageId");
        $menuStatus = $this->input->post("menuStatus");

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
}