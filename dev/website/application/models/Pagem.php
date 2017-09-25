<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Pagem extends CI_Model
{

    public function getPageData(){

        $this->db->select( 'pageId,pageTitle,pageType,pageContent,pageKeywords,pageMetaData,pageImage' );
        $this->db->where('pageStatus', STATUS[0]);
        $query = $this->db->get('ictmpage');
        return $query->result();

    }

}