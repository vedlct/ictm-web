<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Albumm extends CI_Model
{
    public function getAlbum() {
        $this->db->select('albumId,albumTitle');
        $query = $this->db->get('ictmalbum');
        return $query->result();

    }

}