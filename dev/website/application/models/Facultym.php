<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Facultym extends CI_Model
{
    public function getAllFacultyList(){
        $this->db->select('facultyId,facultyTitle,facultyFirstName,facultyLastName, facultyPosition,facultyEmail,facultyTwitter,facultyLinkedIn,facultyImage');
        $this->db->from('ictmfaculty');
        $this->db->where('facultyStatus', STATUS[0]);
        $query = $this->db->get();
        return $query->result();
    }
    public function getCourseDetails($id){
        $this->db->where('courseId =', $id);
        $this->db->where('courseStatus =', STATUS[0]);
        $query = $this->db->get('ictmcourse');
        return $query->result();
    }
}