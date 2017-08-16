<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Departmentm extends CI_Model
{
    /*---------for creating new Department --------------------- */
    public function createNewDepartment() // creates new Department in database
    {
        $departmentName = $this->input->post("departmentName");
        $departmentHead = $this->input->post("departmentHead");
        $departmentStatus = $this->input->post("departmentStatus");
        $departmentSummary = $this->input->post("departmentSummary");

        date_default_timezone_set("Europe/London");

        $data = array(
            'departmentName' => $departmentName,
            'departmentHead' => $departmentHead,
            'departmentSummary' => $departmentSummary,
            'departmentStatus' =>$departmentStatus,

            'insertedBy' => $this->session->userdata('userEmail'),
            'insertedDate' => date("Y-m-d H:i:s"),
        );

        $this->db->insert('ictmdepartment', $data);
    }
    /*---------for creating new Department ---------end------------ */

    /*---------for Manage Department -----------------------*/
    public function getAllforManageDepartment() // for manage Department view
    {
        $query = $this->db->get('ictmdepartment');
        return $query->result();

    }

    public function getAllDepartmentbyId($departmentId) // for edit  Selected Department view
    {
        $query = $this->db->get_where('ictmdepartment', array('departmentId' => $departmentId));
        return $query->result();
    }

}