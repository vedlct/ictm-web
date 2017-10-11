<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Newsm extends CI_Model
{

    public function getLatestNews(){

        $this->db->select( 'newsId,newsTitle,newsDate,newsPhoto' );
        $this->db->order_by("newsDate", "desc");
        $this->db->limit(3);
        $query = $this->db->get('ictmnews');
        return $query->result();

    }
    public function getNewsData() {

        $this->db->select( 'newsId,newsTitle,newsDate,newsPhoto,newsContent' );
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
    public function ArchiveShow($year, $month){

        $this->db->select( 'newsId,newsTitle,newsContent,newsDate,newsPhoto' );
        $this->db->where('Year(`newsDate`)', $year);
        $this->db->where('Month(`newsDate`)', $month);
        $query = $this->db->get('ictmnews');
        return $query->result();
    }
    public function getYear(){
        $this->db->distinct('Year(`newsDate`)');
        $this->db->select( 'Year(`newsDate`) as year' );
        $query = $this->db->get('ictmnews');
        return $query->result();
    }
    public function getMonth(){

        $this->db->select( 'Year(`newsDate`) as year,COUNT(Month(`newsDate`)) as monthcount, Month(`newsDate`) as month ' );
        $this->db->group_by('Month(`newsDate`),Year(`newsDate`)');
        $query = $this->db->get('ictmnews');
        return $query->result();
    }



}