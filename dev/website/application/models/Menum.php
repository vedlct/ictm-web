<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Menum extends CI_Model
{

    public function getTopMenu(){

        $this->db->select('menuId, menuName, pageTitle, ictmpage.pageId,pageType,pageContent' );
        $this->db->where('menuType', MENU_TYPE[0]);
        $this->db->where('menuStatus', STATUS[0]);
        $this->db->join('ictmpage', 'ictmmenu.pageId = ictmpage.pageId','left');
        $query = $this->db->get('ictmmenu');
        return $query->result();

    }
    public function getMainMenu(){
        $this->db->select('menuId, menuName, parentId ');
        $this->db->where('menuType', MENU_TYPE[1]);
        $this->db->where('menuStatus', STATUS[0]);
        $this->db->where('parentId =', NULL);
        $query = $this->db->get('ictmmenu');
        return $query->result();

    }
    public function getkeyInfoMenu(){
        $this->db->select('menuId, menuName, pageTitle, ictmpage.pageId,pageType,pageContent' );
        $this->db->where('menuType', MENU_TYPE[2]);
        $this->db->where('menuStatus', STATUS[0]);
        $this->db->join('ictmpage', 'ictmmenu.pageId = ictmpage.pageId','left');
        $query = $this->db->get('ictmmenu');
        return $query->result();
    }
    public function getQuickLinksMenu(){
        $this->db->select('menuId, menuName, pageTitle, ictmpage.pageId,pageType,pageContent' );
        $this->db->where('menuType', MENU_TYPE[3]);
        $this->db->where('menuStatus', STATUS[0]);
        $this->db->join('ictmpage', 'ictmmenu.pageId = ictmpage.pageId','left');
        $query = $this->db->get('ictmmenu');
        return $query->result();
    }
    public function getImportantLinkMenu(){
        $this->db->select('menuId, menuName, pageTitle, ictmpage.pageId,pageType,pageContent' );
        $this->db->where('menuType', MENU_TYPE[4]);
        $this->db->where('menuStatus', STATUS[0]);
        $this->db->join('ictmpage', 'ictmmenu.pageId = ictmpage.pageId','left');
        $query = $this->db->get('ictmmenu');
        return $query->result();
    }
    public function getBottomMenu(){
        $this->db->select('menuId, menuName, pageTitle, ictmpage.pageId,pageType,pageContent' );
        $this->db->where('menuType', MENU_TYPE[5]);
        $this->db->where('menuStatus', STATUS[0]);
        $this->db->join('ictmpage', 'ictmmenu.pageId = ictmpage.pageId','left');
        $query = $this->db->get('ictmmenu');
        return $query->result();
    }

//    public function getParentMenu($id){
//        $this->db->select('menuId, menuName, parentId ');
//        $this->db->where('menuType', MENU_TYPE[1]);
//        $this->db->where('menuStatus', STATUS[0]);
//        $this->db->where('parentId =', $id);
//        $query = $this->db->get('ictmmenu');
//        return $query->result();
//
//    }

    public function getParentMenu(){
        $this->db->select('menuId, menuName, parentId ');
        $this->db->where('menuType', MENU_TYPE[1]);
        $this->db->where('menuStatus', STATUS[0]);
        $this->db->where('parentId =', null);
        $query = $this->db->get('ictmmenu');
        return $query->result();

    }
}