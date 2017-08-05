<?php

class Admin_Pagem extends CI_Model
{
public function insertPage() {
    $title = $this->input->post("title");
    $content = $this->input->post("content");

    $pagetype = $this->input->post("pagetype");
    $status = $this->input->post("status");


    $image= $_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image);
    $data = array(
        'pageTitle' => $title,
        'pageContent' => $content,
        'pageImage' =>$image,
        'pageType' => $pagetype,
        'pageStatus' => $status,
        'insertedBy' => '',
        'insertedDate' => '',
        'lastModifiedBy' => '',
        'lastModifiedDate' => '',
        'approvedBy' => '',
        'publishingDate' => '',

    );
    //$data = $this->security->xss_clean($data);
    $this->db->insert('ictmpage', $data);
}
}