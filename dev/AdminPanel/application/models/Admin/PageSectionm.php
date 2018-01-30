<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PageSectionm extends CI_Model
{

    /////////datatable//////////
    var $table = 'ictmpagesection';
    var $select = array('pageSectionId','pageId','orderNumber','pageSectionTitle','pageSectionStatus','insertedBy','lastModifiedBy','lastModifiedDate'); //specify the columns you want to fetch from table
    var $column_order = array(null,'pageSectionTitle','orderNumber'); //set column field database for datatable orderable
    var $column_search = array('pageSectionTitle'); //set column field database for datatable searchable
    var $order = array('pageSectionId' => 'desc'); // default order

    private function _get_datatables_query($id)
    {

        $this->db->select($this->select);
        $this->db->from($this->table);
        $this->db->where('pageId', $id);

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($id)
    {
        $this->_get_datatables_query($id);
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);

        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($id)
    {
        $this->_get_datatables_query($id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($id)
    {
        $this->db->from($this->table);
        $this->db->where('pageId', $id);
        return $this->db->count_all_results();
    }
    ///////////////////end of datatable/////////////////////////////

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
        $this->db->where('pageSectionId',$id1);
        $query = $this->db->get('ictmpagesection');

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