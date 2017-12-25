<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Eventm extends CI_Model
{

    public function getLatestEvents() // get the latest event info
    {

        $this->db->select( 'eventId,eventPhotoPath,eventTitle,eventStartDate' );
        $this->db->order_by("eventStartDate", "desc");
        $this->db->limit(5);
        $query = $this->db->get('ictmevent');
        return $query->result();

    }
    public function getAllEvents() // get all the events
    {

        $this->db->select('eventId,eventTitle,eventStartDate,eventEndDate');
        $this->db->where('eventStatus', STATUS[0]);
        //$this->db->order_by("eventStartDate", "desc");
        $query = $this->db->get('ictmevent');
        return $query->result();

    }
    public function getEventDetails($id) // get the details of selected events
    {

        $this->db->select( 'eventId,eventTitle,eventStartDate,eventEndDate,eventLocation,eventContent,eventPhotoPath,eventType');
        $this->db->where('eventId', $id);
        $query = $this->db->get('ictmevent');
        return $query->result();

    }

    public function getNext($date,$id) //get the next event of seletced events
    {

        $this->db->select( 'eventId,eventTitle' );
        $this->db->where('eventStartDate >', $date);
        $this->db->where('eventId !=', $id);
        $this->db->where('eventStatus', STATUS[0]);
        $this->db->order_by("eventStartDate", "ASC");
        $this->db->limit(1);
        $query = $this->db->get('ictmevent');
        return $query->result();

    }
    public function getPrevious($date,$id) //get the previous event of seletced events
    {

        $this->db->select( 'eventId,eventTitle' );
        $this->db->where('eventStartDate <=', $date);
        $this->db->where('eventId !=', $id);
        $this->db->where('eventStatus', STATUS[0]);
        $this->db->order_by("eventStartDate", "desc");
        $this->db->limit(1);
        $query = $this->db->get('ictmevent');
        return $query->result();
    }


}