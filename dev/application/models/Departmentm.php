<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Departmentm extends CI_Model
{

    public function getDepartmentName(){

        $this->db->select('departmentId,departmentName,departmentImage');
        $query = $this->db->get('ictmdepartment');
        return $query->result();

    }
    public function getDepartmentDetails($id){

        $this->db->select('departmentId,departmentName,departmentSummary,departmentHead,departmentImage');
        $this->db->where('departmentId =', $id);
        $this->db->where('departmentStatus =', STATUS[0]);
        $query = $this->db->get('ictmdepartment');
        return $query->result();

    }


}