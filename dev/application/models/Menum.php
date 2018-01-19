<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Menum extends CI_Model
{

    public function getTopMenu() //get the top menu info
    {

        $this->db->select('menuId, menuName,pageTitle,ictmpage.pageId,pageType,pageContent');
        $this->db->where('menuType',MENU_TYPE[0]);
        $this->db->where('menuStatus',STATUS[0]);
        $this->db->order_by("ictmmenu.orderNumber", "asc");
        $this->db->join('ictmpage','ictmmenu.pageId = ictmpage.pageId','left');
        $query = $this->db->get('ictmmenu');
        return $query->result();

    }
    public function getMainMenu() //get the main menu info
    {

        $this->db->select('menuId, menuName, parentId,pageTitle, ictmpage.pageId,pageType,pageContent ');
        $this->db->where('menuType', MENU_TYPE[1]);
        $this->db->where('menuStatus', STATUS[0]);
        $this->db->where('parentId =', null);
        $this->db->where('ictmmenu.pageId =', null);
        $this->db->order_by("ictmmenu.orderNumber", "asc");
        $this->db->join('ictmpage', 'ictmmenu.pageId = ictmpage.pageId','left');
        $query = $this->db->get('ictmmenu');
        return $query->result();

    }
    public function getkeyInfoMenu() //get the keyInfo menu info
    {
        $this->db->select('menuId, menuName, pageTitle, ictmpage.pageId,pageType,pageContent' );
        $this->db->where('menuType', MENU_TYPE[2]);
        $this->db->where('menuStatus', STATUS[0]);
        $this->db->order_by("ictmmenu.orderNumber", "asc");
        $this->db->join('ictmpage', 'ictmmenu.pageId = ictmpage.pageId','left');
        $query = $this->db->get('ictmmenu');
        return $query->result();
    }
    public function getQuickLinksMenu() //get the Quicklink menu info
    {
        $this->db->select('menuId, menuName, pageTitle, ictmpage.pageId,pageType,pageContent' );
        $this->db->where('menuType', MENU_TYPE[3]);
        $this->db->where('menuStatus', STATUS[0]);
        $this->db->order_by("ictmmenu.orderNumber", "asc");
        $this->db->join('ictmpage', 'ictmmenu.pageId = ictmpage.pageId','left');
        $query = $this->db->get('ictmmenu');
        return $query->result();
    }
    public function getImportantLinkMenu() //get the importantlink menu info
    {

        $this->db->select('menuId, menuName, pageTitle, ictmpage.pageId,pageType,pageContent' );
        $this->db->where('menuType', MENU_TYPE[4]);
        $this->db->where('menuStatus', STATUS[0]);
        $this->db->order_by("ictmmenu.orderNumber", "asc");
        $this->db->join('ictmpage', 'ictmmenu.pageId = ictmpage.pageId','left');
        $query = $this->db->get('ictmmenu');
        return $query->result();
    }
    public function getBottomMenu() //get the bottom menu info
    {

        $this->db->select('menuId, menuName, pageTitle, ictmpage.pageId,pageType,pageContent' );
        $this->db->where('menuType', MENU_TYPE[5]);
        $this->db->where('menuStatus', STATUS[0]);
        $this->db->order_by("ictmmenu.orderNumber", "asc");
        $this->db->join('ictmpage', 'ictmmenu.pageId = ictmpage.pageId','left');
        $query = $this->db->get('ictmmenu');
        return $query->result();
    }


    public function checkParentMenu() //check the parent menu info of main menu
    {
        $this->db->select('menuId, menuName, parentId,pageTitle, ictmpage.pageId,pageType,pageContent ');
        $this->db->where('menuType', MENU_TYPE[1]);
        $this->db->where('menuStatus', STATUS[0]);
        $this->db->where('parentId =', null);
        $this->db->where('ictmmenu.pageId !=', null);

        $this->db->join('ictmpage', 'ictmmenu.pageId = ictmpage.pageId','left');
        $query = $this->db->get('ictmmenu');
        return $query->result();
    }
    public function getParentMenu() //get the submenu info of main menu
    {

        $this->db->select('menuId, menuName, parentId,pageTitle, ictmpage.pageId,pageType,pageContent ');
        $this->db->where('menuType', MENU_TYPE[1]);
        $this->db->where('menuStatus', STATUS[0]);
        $this->db->where('parentId !=', null);

        $this->db->join('ictmpage', 'ictmmenu.pageId = ictmpage.pageId','left');
        $query = $this->db->get('ictmmenu');
        return $query->result();

    }
}