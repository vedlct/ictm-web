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

    }
    public function getkeyInfoMenu(){

    }
    public function getQuickLinksMenu(){

    }
    public function getImportantLinkMenu(){

    }
    public function getBottomMenu(){

    }
}