<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PageSectionm extends CI_Model
{
    //this will insert page section data
    public function insertPageSection()
    {
        $pageId = $this->input->post("pageId");
        extract($_POST);
        for ($i = 0; $i < count($textbox); $i++) {
            $data = array(
                'pageId' => $pageId,
                'pageSectionTitle' => $textbox[$i],
                'pageSectionContent' => $text[$i],
                'pageSectionStatus' => $status[$i],
                'orderNumber' => $ordernumber[$i],
                'insertedBy'=>$this->session->userdata('userEmail'),
                'insertedDate'=>date("Y-m-d H:i:s"),
            );
            $this->security->xss_clean($data,true);
            $error= $this->db->insert('ictmpagesection', $data);
        }
        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }
    }
    //this will upadate page section data
    public function updatePagaSectionData($id){
        $title = $this->input->post("textbox");
        $content = $this->input->post("text");
        $status = $this->input->post("status");
        $ordernumber = $this->input->post('ordernumber');
        $data = array(
            'pageSectionTitle' => $title,
            'pageSectionContent' => $content,
            'pageSectionStatus' => $status,
            'orderNumber' => $ordernumber,
            'lastModifiedBy'=>$this->session->userdata('userEmail'),
            'lastModifiedDate'=>date("Y-m-d H:i:s")
        );
        $this->security->xss_clean($data,true);
        $this->db->where('pageSectionId', $id);
        $error= $this->db->update('ictmpagesection', $data);
        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }
    }
    //this will  return page section data search by pageID
    public function get_pageSecdata($id){
        $this->db->select('pageSectionId,pageId,orderNumber,pageSectionTitle,pageSectionStatus,insertedBy,lastModifiedBy,lastModifiedDate');
        $this->db->from('ictmpagesection');
        $this->db->where('pageId', $id);
        $this->db->order_by("pageSectionId", "desc");
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
    public function checkPageSectionOrderNumberUnique($ordernumber,$id1)
    {
        $this->db->select('pageId');
        $this->db->where('pageSectionId', $id1);
        $query = $this->db->get('ictmpagesection');
        //return $query->result();
        foreach ($query->result() as $pageSec) {
            $pageId = $pageSec->pageId;
        }
        $this->db->select('pageSectionId');
        $this->db->where('pageSectionId !=', $id1);
        $this->db->where('pageId', $pageId);
        $this->db->where('orderNumber', $ordernumber);
        $query1 = $this->db->get('ictmpagesection');
        return $query1->result();
    }
}