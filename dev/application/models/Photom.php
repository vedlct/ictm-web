<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Photom extends CI_Model
{
    public function getFooterPhotoGallery()
    {

//        $this->db->select('ictmphoto.photoName,ictmalbum.homeStatus,ictmalbum.albumId,ictmalbum.albumTitle');
//        $this->db->from('ictmalbum');
//        $this->db->where('ictmalbum.homeStatus',SELECT_APPROVE[0]);
//        $this->db->join('ictmphoto', 'ictmphoto.albumId = ictmalbum.albumId','left');
//        $this->db->order_by("ictmalbum.albumId", "ASC");
//        $this->db->limit(3);
//        $query = $this->db->get();
//        return $query->result();


//        $this->db->select('homeStatus,albumId,albumTitle');
//        $this->db->from('ictmalbum');
//        $this->db->where('homeStatus',SELECT_APPROVE[0]);
//        $query = $this->db->get();
//
//        foreach ($query->result() as $album){
//            $albumId=$album->albumId;
//            $albumTitle=$album->albumTitle;
//
//            $this->db->select('photoName,albumId');
//            $this->db->from('ictmphoto');
//            $this->db->where('albumId',$albumId);
//            $this->db->limit(3);
//            $query1 = $this->db->get();
//        }
//        return array('photo' => $query1->result(),'albumTitle' => $albumTitle);

    }

}