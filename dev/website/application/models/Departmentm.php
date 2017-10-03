<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Departmentm extends CI_Model
{

    public function getDepartmentName(){

        $this->db->select('departmentId,departmentName');
        $query = $this->db->get('ictmdepartment');
        return $query->result();

    }


}