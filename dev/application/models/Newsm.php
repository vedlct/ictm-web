<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Newsm extends CI_Model
{

    public function getLatestNews(){

        $this->db->select( 'newsId,newsTitle,newsDate,newsPhoto' );
        $this->db->order_by("newsDate", "desc");
        $query = $this->db->get('ictmnews');
        return $query->result();

    }
    public function getNewsDetails($id){

        $this->db->select( 'newsId,newsTitle,newsContent,newsDate,newsPhoto' );
        $this->db->where('newsId', $id);
        $query = $this->db->get('ictmnews');
        return $query->result();

    }



}