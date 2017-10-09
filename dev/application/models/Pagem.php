<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Pagem extends CI_Model
{

    public function getPageData($id){

        $this->db->select( 'pageId,pageTitle,pageType,pageContent,pageKeywords,pageMetaData,pageImage' );
        $this->db->where('pageStatus', STATUS[0]);
        $this->db->where('pageId=', $id);
        $query = $this->db->get('ictmpage');
        return $query->result();

    }
    public function getPageType($id){

        $this->db->select( 'pageId,pageTitle,pageType' );
        $this->db->where('pageStatus', STATUS[0]);
        $this->db->where('pageId=', $id);
        $query = $this->db->get('ictmpage');
        return $query->result();

    }

}