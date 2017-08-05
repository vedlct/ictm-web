<?php

class Admin_Pagem extends CI_Model
{
public function insertPage() {
    $title = $this->input->post("title");
    $content = $this->input->post("content");
    $image = $this->input->post("image");
    $pagetype = $this->input->post("pagetype");
    $status = $this->input->post("status");


    $data = array(
        'pageTitle' => $title,
        'pageContent' => $content,
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
}