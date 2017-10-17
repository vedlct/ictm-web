<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Homem extends CI_Model
{

    public function getNews() // get the news for the home page
    {

        $this->db->where('newsStatus =', STATUS[0]);
        $this->db->where('homeStatus =', SELECT_APPROVE[0]);
        $this->db->order_by("newsDate", "desc");
        $this->db->limit(3);
        $query = $this->db->get('ictmnews');
        return $query->result();
    }
    public function getEvents() // get the events for the home page
    {

        $this->db->where('eventStatus =', STATUS[0]);
        $this->db->where('homeStatus =', SELECT_APPROVE[0]);
        $this->db->order_by("eventStartDate", "desc");
        $this->db->limit(3);
        $query = $this->db->get('ictmevent');
        return $query->result();
    }
    public function getAffiliations() // get the affiliations for the home page
    {

        $this->db->where('affiliationsStatus =', STATUS[0]);
        $this->db->where('homeStatus =', SELECT_APPROVE[0]);
        $query = $this->db->get('ictmaffiliations');
        return $query->result();
    }

    public function getFeedback() // get the feedback for the home page
    {

        $this->db->select('feedbackByName,feedbackByProfession,feedbackDetails,feedbackByPhoto');
        $this->db->where('feedbackStatus', STATUS[0]);
        $this->db->where('feedbackApprove', SELECT_APPROVE[0]);
        $this->db->where('homeStatus', SELECT_APPROVE[0]);
        $query = $this->db->get('ictmfeedback');
        return $query->result();
    }
    public function getHomeAlldata() // get all the data of home page
    {

        $query = $this->db->get('ictmhome');
        return $query->result();
    }

}
