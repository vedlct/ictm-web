<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class PageSectionm extends CI_Model
{

    public function getPageData($id) //get the page and page section data of the selected page
    {

        $this->db->select( 'pageSectionId,ictmpagesection.pageId,pageSectionTitle,pageSectionContent,pageSectionImage,pageSectionStatus, pageTitle, pageType, pageContent, pageImage,pageMetaData,pageKeywords' );
        $this->db->join('ictmpagesection ', '(ictmpagesection.pageId = ictmpage.pageId) AND (ictmpagesection.pageSectionStatus = "Active")','left');
        $this->db->where('ictmpage.pageId=', $id);
        $query = $this->db->get('ictmpage');
        return $query->result();

    }
    public function getPageType($id) // get the page type of the selected page
    {

        $this->db->select( 'pageId,pageTitle,pageType' );
        $this->db->where('pageStatus', STATUS[0]);
        $this->db->where('pageId=', $id);
        $query = $this->db->get('ictmpage');
        return $query->result();

    }

}