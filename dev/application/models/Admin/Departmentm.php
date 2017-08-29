<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Departmentm extends CI_Model
{
    /*---------for creating new Department --------------------- */

    // creates new Department in database
    public function createNewDepartment()
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

    // for manage Department view
    public function getAllforManageDepartment()
    {
//        $query = $this->db->get('ictmdepartment');
//        return $query->result();
        $this->db->select('departmentId,departmentName,departmentHead,departmentStatus,insertedBy,lastModifiedBy,lastModifiedDate');
        $this->db->from('ictmdepartment');
        $query = $this->db->get();
        return $query->result();

    }

    // for edit  Selected Department view
    public function getAllDepartmentbyId($departmentId)
    {
        $query = $this->db->get_where('ictmdepartment', array('departmentId' => $departmentId));
        return $query->result();
    }
    public function gellDepartmentName(){

        $this->db->select('departmentId,departmentName');
        $this->db->from('ictmdepartment');
        $query = $this->db->get();
        return $query->result();

    }

    // for edit Department by id from database
    public function editDepartmentbyId($departmentId)
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
                'lastModifiedBy'=>$this->session->userdata('userEmail'),
                'lastModifiedDate'=>date("Y-m-d H:i:s"),
            );

        $this->db->where('departmentId', $departmentId);
        $this->db->update('ictmdepartment',$data);
    }

    /*---------delete Department if no Course-----------------*/
    //delete Department if no Course
    public function deleteDepartmentId($departmentId)
    {

//        $query = $this->db->get_where('ictmcourse', array('departmentId' => $departmentId));
        $this->db->select('courseId,departmentId,courseTitle');
        $this->db->where('departmentId',$departmentId);
        $this->db->from('ictmcourse');
        $query = $this->db->get();

        if (empty($query->result())){

            $this->db->where('departmentId',$departmentId);
            $this->db->delete('ictmdepartment');
            return 0;
        }
        else{
            return $query->result();
        }



    }

}