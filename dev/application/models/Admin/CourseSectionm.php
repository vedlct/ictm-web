<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class CourseSectionm extends CI_Model
{

    //this will insert course section
    public function insertCourseSec()
    {

        $coursetitle = $this->input->post("coursetitle");
        extract($_POST);

        for ($i = 0; $i < count($textbox); $i++) {

            $data = array(

                'courseId' => $coursetitle,
                'courseSectionTitle' => $textbox[$i],
                'courseSectionContent' => $text[$i],
                'courseSectionStatus'=>$status[$i],
                'insertedBy'=>$this->session->userdata('userEmail'),
                'insertedDate'=>date("Y-m-d H:i:s"),

            );
            $this->security->xss_clean($data,true);
            $error=$this->db->insert('ictmcoursesection', $data);
        }
        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }
    }
    //this will return some course section data and search by courseid.
    public function getCourseSecData($id){
        $this->db->select('courseSectionId,courseId, courseSectionTitle,courseSectionStatus, insertedBy,lastModifiedBy,lastModifiedDate');
        $this->db->where('courseId', $id);
        $this->db->from('ictmcoursesection');
        $this->db->order_by("courseSectionId","desc");
        $query = $this->db->get();
        return $query->result();
    }
    //this will return all course section data and search by coursesectionid.
    public function getCourseSecAllData($id){
        $this->db->where('courseSectionId', $id);
        $query = $this->db->get('ictmcoursesection');
        return $query->result();
    }
    //this will update course section data
    public function updateCourseSectionData($id){

        $title = $this->input->post("textbox");
        $content = $this->input->post("text");
        $status = $this->input->post("status");


        $data = array(
            'courseSectionTitle' => $title,
            'courseSectionContent' => $content,
            'courseSectionStatus'=>$status,
            'lastModifiedBy'=>$this->session->userdata('userEmail'),
            'lastModifiedDate'=>date("Y-m-d H:i:s")
        );

        $this->db->where('courseSectionId', $id);
        $error=$this->db->update('ictmcoursesection', $data);
        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }
    }

    //this will delete Course section data
    public function deleteCourseSectionbyId($courseSectionId)
    {
        $this->db->where('courseSectionId',$courseSectionId);
        $this->db->delete('ictmcoursesection');


    }

    /*----------- check Course Section Uniqueness ---- newCourse Section------------*/
//    public function checkUniqueSection($courseTitle,$SectionTitle)
//    {
//
//        $this->db->select('courseSectionTitle,courseId');
//        $this->db->where('courseId',$courseTitle);
//        $this->db->where('courseSectionTitle',$SectionTitle);
//
//        $query = $this->db->get('ictmcoursesection');
//        return $query->result();
//
//    }
}