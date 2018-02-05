<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Pagem extends CI_Model
{

    public function getPageData($id) //get selected page data
    {

        $this->db->select( 'pageId,pageTitle,pageType,pageContent,pageKeywords,pageMetaData,pageImage' );
        $this->db->where('pageStatus', STATUS[0]);
        $this->db->where('pageId=', $id);
        $query = $this->db->get('ictmpage');
        return $query->result();

    }
    public function getPageType($id) //get the page type of the selected page
    {

        $this->db->select( 'pageId,pageTitle,pageType' );
        $this->db->where('pageStatus', STATUS[0]);
        $this->db->where('pageId=', $id);
        $query = $this->db->get('ictmpage');
        return $query->result();

    }

    public function getPageDataSearch($id) //get selected page data
    {

        $this->db->select( 'pageId,pageTitle,pageType,pageContent,pageKeywords,pageMetaData,pageImage' );
        $this->db->where('pageStatus', STATUS[0]);
        $this->db->where('pageId=', $id);
        $query = $this->db->get('ictmpage');
        return $query->result();

    }

}