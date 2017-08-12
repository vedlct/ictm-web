<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Coursem extends CI_Model
{
    /* this function return course name for faculty use*/
    public function getCourseIdNameforFaculty(){

        $this->db->select('courseId, courseTitle');
        $query = $this->db->get('ictmcourse');
        return $query->result();
        
    }

    /* insert course*/
    public function insertCourse() {

        $name = $this->input->post("name");
        $code = $this->input->post("code");
        $award = $this->input->post("award");
        $ucascode = $this->input->post("ucasCode");
        $location = $this->input->post("location");
        $awarddingbody = $this->input->post("awardingBody");
        $credit = $this->input->post("credit");
        $stucture = $this->input->post("structure");
        $accreditation = $this->input->post("accreditation");
        $accreditationNo = $this->input->post("accreditationNo");
        $duration = $this->input->post("duration");
        $year = $this->input->post("year");
        $mode = $this->input->post("mode");
        $language = $this->input->post("language");
        $fees = $this->input->post("fees");
        $timetables = $this->input->post("timetables");
        $status= $this->input->post("stutus");

        $image = $_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image);

        date_default_timezone_set("Europe/London");

        $data = array(
            'courseCodePearson' => "",
            'courseCodeIcon' => $code,
            'ucasCode' => $ucascode,
            'courseTitle' => $name,
            'awardingTitle' => $award,
            'awardingBody' => $awarddingbody,
            'accreditationType' => $accreditation,
            'accreditationNumber'=>$accreditationNo,
            'courseDuration' => $duration,
            'creditValue' => $credit,
            'courseStructutre' => $stucture,
            'studyMode' => $mode,
            'studyLanguage' => $language,
            'academicYear' => $year,
            'courseFees' => $fees,
            'couseLocation'=>$location,
            'timeTable' => $timetables,
            'courseStatus' => $status,
            'courseImage' => $image,
            'insertedBy' => $this->session->userdata('id'),
            'insertedDate' => date("Y-m-d H:i:s"),

        );
        //$data = $this->security->xss_clean($data);
        $this->db->insert('ictmcourse', $data);
    }
}