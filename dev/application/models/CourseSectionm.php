<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class CourseSectionm extends CI_Model
{

    public function getCourseSectionDetails($id) //get the course Section of selected course
    {
        $this->db->where('courseId =', $id);
        $this->db->where('courseSectionStatus =', STATUS[0]);
        $this->db->order_by("ictmcoursesection.orderNumber", "asc");
        $query = $this->db->get('ictmcoursesection');
        return $query->result();
    }


}