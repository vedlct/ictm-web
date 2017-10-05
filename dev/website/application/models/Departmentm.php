<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Departmentm extends CI_Model
{

    public function getDepartmentName(){

<<<<<<< HEAD
        $this->db->select('departmentId,departmentName');
=======
        $this->db->select('departmentId,departmentName,departmentImage');
        $query = $this->db->get('ictmdepartment');
        return $query->result();

    }
    public function getDepartmentDetails($id){

        $this->db->select('departmentId,departmentName,departmentSummary,departmentHead,departmentImage');
        $this->db->where('departmentId =', $id);
        $this->db->where('departmentStatus =', STATUS[0]);
>>>>>>> 6758b94a3ab101d460a1c670bc2a637fda535109
        $query = $this->db->get('ictmdepartment');
        return $query->result();

    }


}