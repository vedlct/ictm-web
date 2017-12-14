<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Coursem extends CI_Model
{
    public function getCourseTitle() //get the course information
    {
        $this->db->select('courseId,courseTitle,courseImage,academicYear, departmentId');
        $this->db->where('courseStatus =', STATUS[0]);
        $query = $this->db->get('ictmcourse');
        return $query->result();
    }

    public function getCourseInfo() //get the course information for online
    {
        $this->db->select('courseId,courseTitle');
        $this->db->where('courseStatus =', STATUS[0]);
        $query = $this->db->get('ictmcourse');
        return $query->result();
    }
    public function getCourseAwardBody($courseId) //get the course AwardBody for online
    {
        $this->db->select('awardingBody');
        $this->db->where('courseStatus =', STATUS[0]);
        $this->db->where('courseId =', $courseId);
        $query = $this->db->get('ictmcourse');
        return $query->result();
    }
    public function getCourseDetails($id) // get the details of selected course
    {
        $this->db->where('courseId =', $id);
        $this->db->where('courseStatus =', STATUS[0]);
        $query = $this->db->get('ictmcourse');
        return $query->result();
    }
    public function facultyAllCourseData($id) // get the courses of selected faculty
    {
        $this->db->select('fc.*,c.courseTitle,c.courseDuration,c.courseCodePearson');
        $this->db->from('ictmfacultycourse fc');
        $this->db->where('fc.facultyId', $id);
        $this->db->join('ictmcourse c', 'c.courseId = fc.courseId','left');
        $query = $this->db->get();
        return $query->result();
    }
}