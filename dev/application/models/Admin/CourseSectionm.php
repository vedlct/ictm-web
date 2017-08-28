<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class CourseSectionm extends CI_Model
{

    //this will insert course section
    public function insertCourseSec()
    {

        $coursetitle = $this->input->post("coursetitle");
        extract($_POST);
        date_default_timezone_set("Europe/London");
        for ($i = 0; $i < count($textbox); $i++) {

            $data = array(
                'courseId' => $coursetitle,
                'courseSectionTitle' => $textbox[$i],
                'courseSectionContent' => $text[$i],
                'insertedBy'=>$this->session->userdata('userEmail'),
                'insertedDate'=>date("Y-m-d H:i:s"),

            );
            $this->db->insert('ictmcoursesection', $data);
        }
    }
    //this will return some course section data and search by courseid.
    public function getCourseSecData($id){
        $this->db->select('courseSectionId,courseId, courseSectionTitle, insertedBy,lastModifiedBy,lastModifiedDate');
        $this->db->where('courseId', $id);
        $query = $this->db->get('ictmcoursesection');
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
        date_default_timezone_set("Europe/London");

        $data = array(
            'courseSectionTitle' => $title,
            'courseSectionContent' => $content,
            'lastModifiedBy'=>$this->session->userdata('userEmail'),
            'lastModifiedDate'=>date("Y-m-d H:i:s")
        );

        $this->db->where('courseSectionId', $id);
        $this->db->update('ictmcoursesection', $data);
    }

    //this will delete page section data
    public function deleteCourseSectionbyId($courseSectionId)
    {
        $this->db->where('courseSectionId',$courseSectionId);
        $this->db->delete('ictmcoursesection');


    }
}