<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Coursem extends CI_Model
{

    public function getCourseTitle(){

        $this->db->select('courseId,courseTitle,courseImage,academicYear, departmentId');
        $query = $this->db->get('ictmcourse');
        return $query->result();

    }

    public function getCourseList(){
        $this->db->select('courseId,courseTitle,courseImage,academicYear,departmentId,departmentName');
        $this->db->where('courseStatus', STATUS[0]);
        $this->db->join('ictmdepartment', 'ictmdepartment.departmentId = ictmcourse.departmentId','left');
        $query = $this->db->get('ictmcourse');
        return $query->result();
    }


}