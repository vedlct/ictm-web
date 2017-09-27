<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Eventm extends CI_Model
{

    public function getEventForTerms(){

        $this->db->select( 'eventTitle,eventStartDate' );
        $this->db->order_by("eventStartDate", "desc");
        $query = $this->db->get('ictmevent');
        return $query->result();

    }


}