<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Newsm extends CI_Model
{

    public function getNewsForTerms(){

        $this->db->select( 'newsTitle,newsDate' );
        $this->db->order_by("newsDate", "desc");
        $query = $this->db->get('ictmnews');
        return $query->result();

    }



}