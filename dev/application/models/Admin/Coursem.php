<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Coursem extends CI_Model
{
    public function getCourseIdNameforFaculty(){

        $this->db->select('courseId, courseTitle');
        $query = $this->db->get('ictmcourse');
        return $query->result();
        
    }

}