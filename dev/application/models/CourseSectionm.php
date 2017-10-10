<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class CourseSectionm extends CI_Model
{

    public function getCourseSectionDetails($id){
        $this->db->where('courseId =', $id);
        $this->db->where('courseSectionStatus =', STATUS[0]);
        //$this->db->join('ictmcoursesection', 'ictmcourse.courseId = ictmcoursesection.courseId','left');
        $query = $this->db->get('ictmcoursesection');
        return $query->result();
    }

}