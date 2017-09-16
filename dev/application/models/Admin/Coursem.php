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
        $code = $this->input->post("Code");
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
        $status= $this->input->post("status");
        $department= $this->input->post("department");


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
            'departmentId'=>$department,
            'insertedBy' => $this->session->userdata('userEmail'),
            'insertedDate' => date("Y-m-d H:i:s"),

        );

        $this->security->xss_clean($data);
        $error=$this->db->insert('ictmcourse', $data);
        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            $courseId=$this->db->insert_id();

            if (!empty($_FILES['image']['name'])) {

                $image=$_FILES['image']['name'];
                $this->load->library('upload');
                $config = array(
                    'upload_path' => "images/courseImages/",
                    'allowed_types' => "jpg|png|jpeg|gif",
                    'overwrite' => TRUE,
                    'remove_spaces' => FALSE,
                    'mod_mime_fix' => FALSE,
                    'file_name' => $courseId,

                );
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {
                    // if something need after image upload
                } else {

                    $error = array('error' => $this->upload->display_errors());
                    $che = json_encode($error);
                    echo "<script>
                    
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Course/createCourse';
                    </script>";
                }

                $data1 = array(
                    'courseImage' => $courseId.".".pathinfo($image, PATHINFO_EXTENSION),
                );

                $data1=$this->security->xss_clean($data1,true);
                $this->db->where('courseId', $courseId);
                $this->db->update('ictmcourse', $data1);
            }

            return $error=null;
        }
    }

    //this function will return some course data
    public function getCourseData(){

        $this->db->select('c.courseId,c.courseTitle,c.courseCodeIcon,c.awardingTitle,c.insertedBy,c.lastModifiedBy,c.lastModifiedDate,c.courseStatus,c.departmentId,v.departmentName');
        $this->db->from('ictmcourse c');
        $this->db->join('ictmdepartment v', 'v.departmentId = c.departmentId');
        $this->db->order_by("c.courseId", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    //this function will return course title and course id
    public function getCourseTitle(){

        $this->db->select('courseId,courseTitle');

        $query = $this->db->get('ictmcourse');
        return $query->result();
    }

    //this function will return course data
    public function getCourseAllData(){

        $query = $this->db->get('ictmcourse');
        return $query->result();
    }
    // for Course edit
    public function getCourseAllDataforEdit($id){

        $this->db->where('courseId', $id);
        $query = $this->db->get('ictmcourse');
        return $query->result();

    }

    // show the CourseImage for editCourse
    public function getImage($id){

        $this->db->select('courseImage');
        $this->db->where('courseId',$id);
        $query = $this->db->get('ictmcourse');
        return $query->result();


    }

    // show the CourseImage for editCourse
    public function deleteCourseImage($id){

        $this->db->select('courseImage');
        $this->db->where('courseId',$id);
        $query = $this->db->get('ictmcourse');
        foreach ($query->result() as $image){$courseImage=$image->courseImage;}

        unlink(FCPATH."images/courseImages/".$courseImage);

        $data = array(
            'courseImage'=>null,
            'lastModifiedBy'=>$this->session->userdata('userEmail'),
            'lastModifiedDate'=>date("Y-m-d H:i:s"),

        );

        $this->db->where('courseId', $id);
        $error=$this->db->update('ictmcourse', $data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }


    }

    //this funcion will update course data
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
        $status= $this->input->post("status");
        $department= $this->input->post("department");

        $image = $_FILES["image"]["name"];


            if (!empty($_FILES['image']['name'])) {
                $this->load->library('upload');
                $config = array(
                    'upload_path' => "images/courseImages/",
                    'allowed_types' => "jpg|png|jpeg|gif",
                    'overwrite' => TRUE,

                    'remove_spaces'=>FALSE,
                    'mod_mime_fix'=>FALSE,
                    'file_name' => $id,

                );
                $this->upload->initialize($config);

                if($this->upload->do_upload('image')){
                    // if something need after image upload
                }else{

                    $error =array('error'=>$this->upload->display_errors());
                    $che=json_encode($error);
                    echo "<script>
                    
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Course/manageCourse';
                    </script>";
                }

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
                'courseImage' => $id.".".pathinfo($image, PATHINFO_EXTENSION),
                'departmentId'=>$department,
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
                'departmentId'=>$department,
                'lastModifiedBy'=>$this->session->userdata('userEmail'),
                'lastModifiedDate'=>date("Y-m-d H:i:s"),

            );
        }
        $data = $this->security->xss_clean($data,true);
        $this->db->where('courseId', $id);
        $error=$this->db->update('ictmcourse', $data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }
    }

    //this function will return course title and facult all data
    public function getFacultyCourseIdName($facultyId){

        $this->db->select('f.*,c.courseTitle');
        $this->db->from('ictmfacultycourse f');
        $this->db->group_by('courseId');
        $this->db->join('ictmcourse c', 'f.courseId = c.courseId','left');
        $this->db->where('facultyId', $facultyId);
        $query = $this->db->get();
        return $query->result();
    }


    //this function will insert course for faculty in edit faculty section
    public function addCoursetoFaculty($courseId){


        $facultyId=$this->input->post('facultyId');

        $query = $this->db->get_where('ictmfacultycourse', array('facultyId' => $facultyId,'courseId'=>$courseId));

        if (empty($query->result())){

            $data=array(
                'facultyId' => $facultyId,
                'courseId'=>$courseId
            );

            $this->db->insert('ictmfacultycourse', $data);

            $data1=array(
                'lastModifiedBy'=>$this->session->userdata('userEmail'),
                'lastModifiedDate'=>date("Y-m-d H:i:s"),
            );
            $this->db->where('facultyId', $facultyId);
            $this->db->update('ictmfaculty', $data1);

            return 0;
        }
        else{
            return 1;
        }
    }

    //this function will delete insert course for faculty in edit faculty section
    public function deleteCoursetoFaculty($id)
    {
        $facultyId = $this->input->post("facultyId");

        $this->db->where('facultyCourseId',$id);
        $this->db->delete('ictmfacultycourse');

        $data1=array(
            'lastModifiedBy'=>$this->session->userdata('userEmail'),
            'lastModifiedDate'=>date("Y-m-d H:i:s"),
        );
        $this->db->where('facultyId', $facultyId);
        $this->db->update('ictmfaculty', $data1);


    }

    public  function checkParentId($courseId){

        $coursereturn = array();

        $this->db->select('courseSectionTitle');
        $this->db->where('courseId',$courseId);
        $query = $this->db->get('ictmcoursesection');

        foreach ( $query->result() as $cr){
            array_push($coursereturn, $cr->courseSectionTitle);
        }

        return $coursereturn;



    }
    public function deleteCoursebyId($courseId){

        $this->db->where('courseId',$courseId);
        $this->db->delete('ictmfacultycourse');

        $this->db->where('courseId',$courseId);
        $this->db->delete('ictmcoursesection');

        $this->db->where('courseId',$courseId);
        $this->db->delete('ictmcourse');




    }

    /*----------- check Course Uniqueness ---- editCourse------------*/
    public function checkUniqueCourse($courseTitle,$department,$id)
    {

        $this->db->select('courseTitle');
        $this->db->where('courseTitle',$courseTitle);
        $this->db->where('departmentId',$department);
        $this->db->where('courseId !=', $id);
        $query = $this->db->get('ictmcourse');
        return $query->result();

    }

    /*----------- check Course Uniqueness ---- editCourse------------*/
    public function checkUniqueCourseTitle($courseTitle,$department)
    {

        $this->db->select('courseTitle,departmentId');
        $this->db->where('courseTitle',$courseTitle);
        $this->db->where('departmentId',$department);

        $query = $this->db->get('ictmcourse');
        return $query->result();

    }



}