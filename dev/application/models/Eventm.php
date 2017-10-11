<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Eventm extends CI_Model
{

    public function getLatestEvents(){

        $this->db->select( 'eventId,eventPhotoPath,eventTitle,eventStartDate' );
        $this->db->order_by("eventStartDate", "desc");
        $this->db->limit(5);
        $query = $this->db->get('ictmevent');
        return $query->result();

    }
    public function getAllEvents(){

        $this->db->select( 'eventId,eventTitle,eventStartDate,eventEndDate' );
        $this->db->order_by("eventStartDate", "desc");
        $query = $this->db->get('ictmevent');
        return $query->result();

    }
    public function getEventDetails($id){

        $this->db->select( 'eventId,eventTitle,eventStartDate,eventEndDate,eventLocation,eventContent,eventPhotoPath,eventType,' );
        $this->db->where('eventId', $id);
        $query = $this->db->get('ictmevent');
        return $query->result();

    }


}