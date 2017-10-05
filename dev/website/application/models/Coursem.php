<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Coursem extends CI_Model
{
    public function getCourseTitle(){
        $this->db->select('courseId,courseTitle,courseImage,academicYear, departmentId');
        $query = $this->db->get('ictmcourse');
        return $query->result();
    }
    public function getCourseDetails($id){
        $this->db->where('courseId =', $id);
        $this->db->where('courseStatus =', STATUS[0]);
        $query = $this->db->get('ictmcourse');
        return $query->result();
    }
}