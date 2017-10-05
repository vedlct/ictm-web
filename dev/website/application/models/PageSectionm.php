<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class PageSectionm extends CI_Model
{

    public function getPageData($id){

        $this->db->select( 'pageSectionId,ictmpagesection.pageId,pageSectionTitle,pageSectionContent,pageSectionImage,pageSectionStatus, pageTitle, pageType, pageContent, pageImage' );
        $this->db->join('ictmpagesection ', '(ictmpagesection.pageId = ictmpage.pageId) OR (ictmpagesection.pageSectionStatus = "STATUS[0]")','left');
        $this->db->where('ictmpage.pageId=', $id);
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