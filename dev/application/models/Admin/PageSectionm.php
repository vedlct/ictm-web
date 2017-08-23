<?php

class PageSectionm extends CI_Model
{
    //this will insert page section data
    public function insertPageSection()
    {

        $pageId = $this->input->post("pageId");
        extract($_POST);
        date_default_timezone_set("Europe/London");

        for ($i = 0; $i < count($textbox); $i++) {

            $data = array(
                'pageId' => $pageId,
                'pageSectionTitle' => $textbox[$i],
                'pageSectionContent' => $text[$i],
                'pageSectionStatus' => $status[$i],
                'insertedBy'=>$this->session->userdata('userEmail'),
                'insertedDate'=>date("Y-m-d H:i:s"),


            );
            $this->security->xss_clean($data,true);
            $this->db->insert('ictmpagesection', $data);
        }
    }

    //this will upadate page section data
    public function updatePagaSectionData($id){

        $title = $this->input->post("textbox");
        $content = $this->input->post("text");
        $status = $this->input->post("status");
        date_default_timezone_set("Europe/London");

        $data = array(
            'pageSectionTitle' => $title,
            'pageSectionContent' => $content,
            'pageSectionStatus' => $status,
            'lastModifiedBy'=>$this->session->userdata('userEmail'),
            'lastModifiedDate'=>date("Y-m-d H:i:s")
        );
        $this->security->xss_clean($data,true);
        $this->db->where('pageSectionId', $id);
        $this->db->update('ictmpagesection', $data);

    }

    //this will  return page section data search by pageID
    public function get_pageSecdata($id){

        $this->db->select('pageSectionId,pageId,pageSectionTitle,pageSectionStatus,insertedBy,lastModifiedBy,lastModifiedDate');
        $this->db->from('ictmpagesection');
        $this->db->where('pageId', $id);
        $query = $this->db->get();
        return $query->result();

    }

    //this will  return page section data search by pageSectionID
    public function get_pageSecdataBySecId($id)
    {
        $this->db->where('pageSectionId', $id);
        $query = $this->db->get('ictmpagesection');
        return $query->result();


    }
    //this will delete page section data
    public function deletePageSectionbyId($pageSectionId)
    {
        $this->db->where('pageSectionId',$pageSectionId);
        $this->db->delete('ictmpagesection');


    }

}

