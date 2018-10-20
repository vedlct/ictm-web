<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Facultym extends CI_Model
{
    public function getAllFacultyList() // get all the faculty information
    {
        $this->db->select('facultyId,facultyTitle,facultyFirstName,facultyLastName, facultyPosition,facultyEmail,facultyTwitter,facultyLinkedIn,facultyImage');
        $this->db->from('ictmfaculty');
        $this->db->where('facultyStatus', STATUS[0]);
        $this->db->order_by("facultyId", "asc");
        $query = $this->db->get();
        return $query->result();
    }
    public function getfacultyDetails($id) // get the details of selected faculty
    {
        $this->db->where('facultyId', $id);

        $query = $this->db->get('ictmfaculty');
        return $query->result();
    }

}