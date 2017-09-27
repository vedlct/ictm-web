<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class PageSectionm extends CI_Model
{

    public function getPageData($id){

        $this->db->select( 'pageSectionId,ictmpagesection.pageId,pageSectionTitle,pageSectionContent,pageSectionImage,pageSectionStatus, pageTitle, pageType, pageContent, pageImage' );
        $this->db->join('ictmpage', 'ictmpagesection.pageId = ictmpage.pageId','left');
        $this->db->where('pageSectionStatus', STATUS[0]);
        $this->db->where('ictmpagesection.pageId=', $id);
        $query = $this->db->get('ictmpagesection');
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