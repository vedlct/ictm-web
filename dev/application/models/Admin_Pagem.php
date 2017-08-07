<?php

class Admin_Pagem extends CI_Model
{
    public function insertPage()
    {
        $title = $this->input->post("title");
        $content = $this->input->post("content");
        $keywords = $this->input->post("keywords");
        $metadata = $this->input->post("metadata");
        $pagetype = $this->input->post("pagetype");
        $status = $this->input->post("status");


        $image = $_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image);
        $data = array(
            'pageTitle' => $title,
            'pageKeywords' => $keywords,
            'pageMetaData' => $metadata,
            'pageContent' => $content,
            'pageImage' => $image,
            'pageType' => $pagetype,
            'pageStatus' => $status,


        );
        //$data = $this->security->xss_clean($data);
        $this->db->insert('ictmpage', $data);
    }

    public function getPageIdName()
    {

        $this->db->select('pageId, pageTitle');
        $this->db->group_by('pageTitle');
        $query = $this->db->get('ictmpage');
        return $query->result();
    }

    public function get_pagaData()
    {

        $query = $this->db->get('ictmpage');
        return $query->result();
    }

    public function get_editPagaData($id)
    {

        $this->db->where('pageId', $id);
        $query = $this->db->get('ictmpage');
        return $query->result();
    }

    public function updatePagaData($id)
    {

        $title = $this->input->post("title");
        $keywords = $this->input->post("keywords");
        $metadata = $this->input->post("metadata");
        $content = $this->input->post("content");
        $pagetype = $this->input->post("pagetype");
        $status = $this->input->post("status");
        $image = $_FILES["image"]["name"];

        if ($image != null) {

            $image = $_FILES["image"]["name"];
            move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image);
            $data = array(
                'pageTitle' => $title,
                'pageKeywords' => $keywords,
                'pageMetaData' => $metadata,
                'pageContent' => $content,
                'pageImage' => $image,
                'pageType' => $pagetype,
                'pageStatus' => $status,

            );

        } else {
            $data = array(
                'pageTitle' => $title,
                'pageKeywords' => $keywords,
                'pageMetaData' => $metadata,
                'pageContent' => $content,
                'pageType' => $pagetype,
                'pageStatus' => $status,

            );

        }
        $this->db->where('pageId', $id);
        $this->db->update('ictmpage', $data);

    }


    public function deletePagebyId($pageId)
    {

//            $this->db->select('m.pageId,p.*');
//            $this->db->from('ictmmenu m');
//            $this->db->join('ictmpage p', 'p.pageId = m.pageId');
//
//                $this->db->where('pageId',$pageId);
////                $this->db->update('ictmmenu',$data);
//                $this->db->delete('ictmpage');

    }


    public function insertPageSection()
    {


    }

}

