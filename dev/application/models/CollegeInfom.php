<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class CollegeInfom extends CI_Model
{
    public function getCollegeContact() // get the college information
    {

        $this->db->select('collegeName,collegeAddress,collegeTelephone1,collegeFax,collegeEmail,collegeFacebook,collegeYoutube,collegeTwitter,collegeGoogle,collegeLinkedIn');
        $query = $this->db->get('ictmcollegeinfo');
        return $query->result();
    }

}