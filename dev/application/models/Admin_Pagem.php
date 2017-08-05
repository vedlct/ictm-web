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
        'title' => $title,
        'content' => $content,
        'image' => $image,
        'pagetype' => $pagetype,
        'status' => $status
    );
    //$data = $this->security->xss_clean($data);
    $this->db->insert('about_banner', $data);
}
}