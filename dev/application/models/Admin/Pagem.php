<?php

class Pagem extends CI_Model
{
    public function insertPage() // creates a new page in database
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
            'insertedBy'=>$this->session->userdata('id'),
            'lastModifiedBy'=>$this->session->userdata('id'),


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

    public function getPagaData()
    {

        $query = $this->db->get('ictmpage');
        return $query->result();
    }

    public function geteditPagaData($id)
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
        date_default_timezone_set("Europe/London");

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
                'lastModifiedBy'=>$this->session->userdata('id'),
                'lastModifiedDate'=>date("Y-m-d H:i:s"),

            );

        } else {
            $data = array(
                'pageTitle' => $title,
                'pageKeywords' => $keywords,
                'pageMetaData' => $metadata,
                'pageContent' => $content,
                'pageType' => $pagetype,
                'pageStatus' => $status,
                'lastModifiedBy'=>$this->session->userdata('id'),
                'lastModifiedDate'=>date("Y-m-d H:i:s"),

            );

        }
        $this->db->where('pageId', $id);
        $this->db->update('ictmpage', $data);

    }


    public function deletePagebyId($pageId)
    {
       $this->db->where('pageId',$pageId);
       $this->db->delete('ictmpagesection');

       $this->db->where('pageId',$pageId);
       $this->db->delete('ictmmenu');

       $this->db->where('pageId',$pageId);
       $this->db->delete('ictmpage');
    }


    public function insertPageSection()
    {

        $pagetitle = $this->input->post("pagetitle");
        extract($_POST);
        $image= $_FILES["textimage"]["name"];
        for ($i = 0; $i < count($image); $i++) {

            //$image= $_FILES["textimage"]["name"];
            move_uploaded_file($_FILES["textimage"]["tmp_name"], "images/" . $image);

            $data = array(
                'pageId' => $pagetitle,
                'pageSectionTitle' => $textbox[$i],
                'pageSectionContent' => $text[$i],
                'pageSectionImage' => $image[$i],
                'insertedBy'=>$this->session->userdata('id'),
                'lastModifiedBy'=>$this->session->userdata('id'),

            );
            $this->db->insert('ictmpagesection', $data);
        }
    }

    public function updatePagaSectionData($id){

        $title = $this->input->post("textbox");
        $content = $this->input->post("text");
        $image = $_FILES["textimage"]["name"];
        date_default_timezone_set("Europe/London");

        if ($image != null) {

            $image = $_FILES["textimage"]["name"];
            move_uploaded_file($_FILES["textimage"]["tmp_name"], "images/" . $image);

            $data = array(
                'pageSectionTitle' => $title,
                'pageSectionContent' => $content,
                'pageSectionImage' => $image,
                'lastModifiedBy'=>$this->session->userdata('id'),
                'lastModifiedDate'=>date("Y-m-d H:i:s")
            );
        } else {

            $data = array(
                'pageSectionTitle' => $title,
                'pageSectionContent' => $content,
                'pageSectionImage' => $image,
                'lastModifiedBy'=>$this->session->userdata('id'),
                'lastModifiedDate'=>date("Y-m-d H:i:s")
            );
        }
        $this->db->where('pageSectionId', $id);
        $this->db->update('ictmpagesection', $data);

    }

    public function get_pageSecdata($id){

        $this->db->where('pageId', $id);
        $query = $this->db->get('ictmpagesection');
        return $query->result();
    }


    public function get_pageSecdataBySecId($id)
    {
        $this->db->where('pageSectionId', $id);
        $query = $this->db->get('ictmpagesection');
        return $query->result();


    }
    public function deletePageSectionbyId($pageSectionId)
    {
        $this->db->where('pageSectionId',$pageSectionId);
        $this->db->delete('ictmpagesection');


    }

}

