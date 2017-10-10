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
    public function getfacultyDetails($id){
        $this->db->where('facultyId', $id);
        //$this->db->where('facultyStatus', STATUS[0]);
        $query = $this->db->get('ictmfaculty');
        return $query->result();
    }

}