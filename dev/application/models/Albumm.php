<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Albumm extends CI_Model
{

//    public function getAlbumListWithCategory()
//    {
//        $this->db->select('albumCategoryName');
//        $this->db->from('ictmalbum');
//        $this->db->where('albumStatus',STATUS[0]);
//        $query = $this->db->get();
//        //return $query->result();
//
//        $x =array();
//        foreach ($query->result() as $album){
//
//            $this->db->select('p.albumId,albumTitle,p.photoName');
//            $this->db->from('ictmalbum');
//            $this->db->where('albumCategoryName',$album->albumCategoryName);
//            $this->db->join('ictmphoto p', 'p.albumId = ictmalbum.albumId','left');
//            $query1 = $this->db->get();
//
//            foreach ($query1->result() as $albumlist) {
//
//                $data = array(
//                    'CategoryName' =>$album->albumCategoryName,
//                    'albumId'=>$albumlist->albumId,
//                    'albumTitle'=>$albumlist->albumTitle,
//                    'photoName'=>$albumlist->photoName,
//
//                );
//
//                array_push($x,$data);
//            }
//        }
//        return $x;
//
//
//    }

    public function getAlbumCategoryList()
    {
        $this->db->select('albumCategoryName');
        $this->db->from('ictmalbum');
        $this->db->where('albumStatus',STATUS[0]);
        $this->db->group_by("albumCategoryName");
        $this->db->order_by("albumId", "desc");
        $query = $this->db->get();
        return $query->result();

    }

}