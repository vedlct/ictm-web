<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Homem extends CI_Model
{

    public function getNews(){

        $this->db->where('newsStatus =', STATUS[0]);
        $this->db->where('homeStatus =', SELECT_APPROVE[0]);
        $this->db->order_by("newsDate", "desc");
        $this->db->limit(3);
        $query = $this->db->get('ictmnews');
        return $query->result();
    }
    public function getEvents(){

        $this->db->where('eventStatus =', STATUS[0]);
        $this->db->where('homeStatus =', SELECT_APPROVE[0]);
        $this->db->order_by("eventStartDate", "desc");
        $this->db->limit(3);
        $query = $this->db->get('ictmevent');
        return $query->result();
    }
    public function getAffiliations(){

        $this->db->where('affiliationsStatus =', STATUS[0]);
        $this->db->where('homeStatus =', SELECT_APPROVE[0]);
        $query = $this->db->get('ictmaffiliations');
        return $query->result();
    }

}
