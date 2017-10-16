<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Departmentm extends CI_Model
{

    public function getDepartmentName() //get the department info
    {

        $this->db->select('departmentId,departmentName,departmentImage');
        $query = $this->db->get('ictmdepartment');
        return $query->result();

    }
    public function getDepartmentDetails($id) // get the details of selected department
    {

        $this->db->select('departmentId,departmentName,departmentSummary,departmentHead,departmentImage');
        $this->db->where('departmentId =', $id);
        $this->db->where('departmentStatus =', STATUS[0]);
        $query = $this->db->get('ictmdepartment');
        return $query->result();

    }


}