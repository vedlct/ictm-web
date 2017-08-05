<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Menum extends CI_Model
{
    public function getMenu()
    {
        $query = $this->db->get('ictmmenu');
        return $query->result();
    }
    public function getMenuName($menuType)
    {

        $this->db->select('menuId, menuName');
        $this->db->where('menuType', $menuType);
        $query = $this->db->get('ictmmenu');
        return $query->result();
    }
}