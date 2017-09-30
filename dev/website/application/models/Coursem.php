<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Coursem extends CI_Model
{

    public function getCourseForTerms(){

        $this->db->select('courseId,courseTitle,courseImage,academicYear');
        $query = $this->db->get('ictmcourse');
        return $query->result();

    }


}