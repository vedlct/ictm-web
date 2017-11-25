<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Albumm extends CI_Model
{

    public function getAlbumCategoryList() //get all the album category name
    {
        $this->db->select('albumCategoryName');
        $this->db->from('ictmalbum');
        $this->db->where('albumStatus',STATUS[0]);
        $this->db->group_by("albumCategoryName");
        $this->db->order_by("albumId", "desc");
        $query = $this->db->get();
        return $query->result();

    }

    public function getAllAlbumName() //get album name ,title and category name from album
    {

        $this->db->select('albumId,albumTitle,albumCategoryName');
        $this->db->from('ictmalbum');
        $this->db->where('albumStatus',STATUS[0]);

        $this->db->order_by("albumId", "desc");
        $query = $this->db->get();
        return $query->result();
    }

}