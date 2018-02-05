<?php
class Searchm extends CI_Model
{
    public function getpage(){
        //$this->db->select( 'pageId,pageTitle,pageType,pageContent,pageKeywords,pageMetaData,pageImage' );
        $this->db->where('pageStatus', STATUS[0]);
        $this->db->where('pageType !=', 'Static Type');
        $query = $this->db->get('ictmpage');
        return $query->result();
    }

    public function getNews() // get the news data
    {

     //   $this->db->select( 'newsId,newsTitle,newsDate,newsPhoto,newsContent' );
       // $this->db->order_by("newsDate", "desc");
        $this->db->where('newsStatus', STATUS[0]);
        $query = $this->db->get('ictmnews');
        return $query->result();
    }

    public function getEvents() // get all the events
    {

     //   $this->db->select('eventId,eventTitle,eventStartDate,eventEndDate');
        $this->db->where('eventStatus', STATUS[0]);
        //$this->db->order_by("eventStartDate", "desc");
        $query = $this->db->get('ictmevent');
        return $query->result();

    }
}