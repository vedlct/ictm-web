<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Photom extends CI_Model
{
    public function getFooterPhotoGallery() //get the all the photo for footer photo galley
    {
        $this->db->select('homeStatus,albumId,albumTitle');
        $this->db->from('ictmalbum');
        $this->db->where('homeStatus',SELECT_APPROVE[0]);
        $query = $this->db->get();

        $x =array();

        foreach ($query->result() as $album) {

            $this->db->select('photoName,albumId');
            $this->db->from('ictmphoto');
            $this->db->where('albumId',$album->albumId);
            $this->db->limit(3);
            $query1 = $this->db->get();

            foreach ($query1->result() as $photo) {

                $data = array(
                    'photoName' =>$photo->photoName,
                    'albumId'=>$photo->albumId,
                    'albumTitle'=>$album->albumTitle,

                );

                array_push($x,$data);
            }
        }
        return $x;


    }

    public function albumPhoto($id) //get the photos from the selected album
    {

        $this->db->select('photoName,photoId,photoDetails,albumTitle,ictmalbum.albumDescription');
        $this->db->from('ictmphoto');
        $this->db->where('ictmphoto.albumId',$id);
        $this->db->where('photoStatus',STATUS[0]);
        $this->db->join('ictmalbum', 'ictmalbum.albumId = ictmphoto.albumId','left');
        $query = $this->db->get();
        return $query->result();
    }

}