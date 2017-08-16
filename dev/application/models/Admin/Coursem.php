<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Coursem extends CI_Model
{
    /* this function return course name and id for faculty use*/
    public function getCourseIdNameforFaculty(){

        $this->db->select('courseId, courseTitle');
        $query = $this->db->get('ictmcourse');
        return $query->result();
        
    }

    /* insert course*/
    public function insertCourse() {

        $name = $this->input->post("name");
        $codeperson = $this->input->post("codeperson");
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
            'courseCodePearson' => $codeperson,
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
            'insertedBy' => $this->session->userdata('userEmail'),
            'insertedDate' => date("Y-m-d H:i:s"),

        );
        //$data = $this->security->xss_clean($data);
        $this->db->insert('ictmcourse', $data);
    }

    public function getCourseData(){

        $this->db->select('courseId,courseTitle, courseCodeIcon, awardingTitle,insertedBy,lastModifiedBy,lastModifiedDate,courseStatus');
        //$this->db->join('ictmusers', 'ictmusers.userId = ictmpage.insertedBy');
        $query = $this->db->get('ictmcourse');
        return $query->result();
    }
    public function getCourseTitle(){

        $this->db->select('courseId,courseTitle');
        //$this->db->join('ictmusers', 'ictmusers.userId = ictmpage.insertedBy');
        $query = $this->db->get('ictmcourse');
        return $query->result();
    }

    public function getCourseAllData($id){

        $query = $this->db->get('ictmcourse');
        return $query->result();
    }
    public function updateCourseData($id){

        $name = $this->input->post("name");
        $codeperson = $this->input->post("codeperson");
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

        date_default_timezone_set("Europe/London");

        if ($image != null) {

            $image = $_FILES["image"]["name"];
            move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image);
            $data = array(
                'courseCodePearson' => $codeperson,
                'courseCodeIcon' => $code,
                'ucasCode' => $ucascode,
                'courseTitle' => $name,
                'awardingTitle' => $award,
                'awardingBody' => $awarddingbody,
                'accreditationType' => $accreditation,
                'accreditationNumber' => $accreditationNo,
                'courseDuration' => $duration,
                'creditValue' => $credit,
                'courseStructutre' => $stucture,
                'studyMode' => $mode,
                'studyLanguage' => $language,
                'academicYear' => $year,
                'courseFees' => $fees,
                'couseLocation' => $location,
                'timeTable' => $timetables,
                'courseStatus' => $status,
                'courseImage' => $image,
                'lastModifiedBy'=>$this->session->userdata('userEmail'),
                'lastModifiedDate'=>date("Y-m-d H:i:s"),

            );
        }else {
            $data = array(
                'courseCodePearson' => $codeperson,
                'courseCodeIcon' => $code,
                'ucasCode' => $ucascode,
                'courseTitle' => $name,
                'awardingTitle' => $award,
                'awardingBody' => $awarddingbody,
                'accreditationType' => $accreditation,
                'accreditationNumber' => $accreditationNo,
                'courseDuration' => $duration,
                'creditValue' => $credit,
                'courseStructutre' => $stucture,
                'studyMode' => $mode,
                'studyLanguage' => $language,
                'academicYear' => $year,
                'courseFees' => $fees,
                'couseLocation' => $location,
                'timeTable' => $timetables,
                'courseStatus' => $status,
                'lastModifiedBy'=>$this->session->userdata('userEmail'),
                'lastModifiedDate'=>date("Y-m-d H:i:s"),

            );
        }
        //$data = $this->security->xss_clean($data);
        $this->db->where('courseId', $id);
        $this->db->update('ictmcourse', $data);
    }

    public function getFacultyCourseIdName($facultyId){

        $this->db->select('f.*,c.courseTitle');
        $this->db->from('ictmfacultycourse f');
        $this->db->group_by('courseId');
        $this->db->join('ictmcourse c', 'f.courseId = c.courseId','left');
        $this->db->where('facultyId', $facultyId);
        $query = $this->db->get();
        return $query->result();
    }

    public function addCoursetoFaculty($courseId){


        $facultyId=$this->input->post('facultyId');

        $query = $this->db->get_where('ictmfacultycourse', array('facultyId' => $facultyId,'courseId'=>$courseId));

        if (empty($query->result())){

            $data=array(
                'facultyId' => $facultyId,
                'courseId'=>$courseId
            );
            $this->db->insert('ictmfacultycourse', $data);
            return 0;
        }
        else{
            return 1;
        }
    }

    public function deleteCoursetoFaculty($id){

        $this->db->where('facultyCourseId',$id);
        $this->db->delete('ictmfacultycourse');
    }

    /////////course section ///////////////

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
}