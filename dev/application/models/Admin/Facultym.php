<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Facultym extends CI_Model
{
    /*---------for creating new Faculty --------------------- */
    public function createNewFaculty() // creates new faculty in database
    {

        $facultyFirstName = $this->input->post("facultyFirstName");
        $facultyLastName = $this->input->post("facultyLastName");
        $facultyDegree = $this->input->post("facultyDegree");
        $facultyPosition = $this->input->post("facultyPosition");
        $facultyImage=$_FILES['facultyImage']['name'];
        $facultyEmpType = $this->input->post("facultyEmpType");
        $facultyEmail = $this->input->post("facultyEmail");
        $facultyPhone = $this->input->post("facultyPhone");
        $facultyTwitter = $this->input->post("facultyTwitter");
        $facultyLinkdin = $this->input->post("facultyLinkedin");
        $facultyStatus = $this->input->post("facultyStatus");
        $facultyCourse = $this->input->post("facultyCourses[]");
        $facultyIntro = $this->input->post("facultyIntro");

        if (!empty($_FILES['facultyImage']['name'])) {
            $this->load->library('upload');
            $config = array(
                'upload_path' => "images/",
                'allowed_types' => "jpg|png|jpeg",
                'overwrite' => TRUE,
                //'max_size' => "2048000",
                'remove_spaces'=>FALSE,
                'mod_mime_fix'=>FALSE,

            );
            $this->upload->initialize($config);

            if($this->upload->do_upload('facultyImage')){
                $response   =array('upload_data' => $this->upload->data());
                //print_r($response);
            }else{
                $error =array('error'=>$this->upload->display_errors());
                print_r($error);
                return false;
            }
        }
        else
        {
            echo "<script>
                    alert('No Photo Selected!!');
                    window.location.href= '" . base_url() . "Admin/Faculty/newFaculty';
                    </script>";
            return false;
        }

        $data = array(
            'facultyFirstName' => $facultyFirstName,
            'facultyLastName' => $facultyLastName,
            'facultyDegree' => $facultyDegree,
            'facultyPosition' => $facultyPosition,
            'facultyEmpType' => $facultyEmpType,
            'facultyEmail'=>$facultyEmail,
            'faultyPhone'=>$facultyPhone,
            'facultyTwitter'=>$facultyTwitter,
            'facultyLinkedIn'=>$facultyLinkdin,
            'facultyIntro'=>$facultyIntro,
            'facultyImage'=>$facultyImage,
            'facultyStatus'=>$facultyStatus,
            'insertedBy'=>$this->session->userdata('userEmail'),
            'insertedDate'=>date("Y-m-d H:i:s"),

        );
        $this->security->xss_clean($data,true);
        $this->db->insert('ictmfaculty', $data);

        $query = $this->db->query("SELECT `facultyId` FROM `ictmfaculty` ORDER  BY `facultyId` DESC limit 1 ");

        foreach ($query->result() as $r){

            $facultyId=$r->facultyId;
        }
        for ($i = 0; $i < count($facultyCourse); $i++) {
            $data1=array(
                'courseId'=>$facultyCourse[$i],
                'facultyId'=>$facultyId
            );
            $this->security->xss_clean($data1);
            $this->db->insert('ictmfacultycourse', $data1);
        }

    }
    /*---------for creating new Faculty ---------end------------ */

    /*---------for Manage Faculty -----------------------*/
    public function getAllforManageFaculty() // for manage Faculty view
    {


        $this->db->select('facultyId,facultyFirstName,facultyLastName,facultyEmail,facultyPosition,facultyEmpType,facultyDegree,facultyStatus,insertedBy,lastModifiedBy,lastModifiedDate');
        $this->db->from('ictmfaculty');
        $query = $this->db->get();
        return $query->result();

    }

    public function getAllFacultybyId($facultyId) // for edit  Selected Faculty view
    {
        $query = $this->db->get_where('ictmfaculty', array('facultyId' => $facultyId));
        return $query->result();
    }

    public function editFacultybyId($id)        // for edit Faculty by id from database
    {
        $facultyFirstName = $this->input->post("faculty_first_name");
        $facultyLastName = $this->input->post("faculty_last_name");
        $facultyDegree = $this->input->post("faculty_degree");
        $facultyPosition = $this->input->post("faculty_position");
        $facultyImage=$_FILES['faculty_image']['name'];
        $facultyEmpType = $this->input->post("faculty_emp_type");
        $facultyEmail = $this->input->post("faculty_email");
        $facultyPhone = $this->input->post("faculty_phone");
        $facultyTwitter = $this->input->post("faculty_twitter");
        $facultyLinkdin = $this->input->post("faculty_linkedin");
        $facultyStatus = $this->input->post("faculty_status");

        $facultyIntro = $this->input->post("faculty_intro");
        date_default_timezone_set("Europe/London");

        if (!empty($_FILES['faculty_image']['name'])) {
            $this->load->library('upload');
            $config = array(
                'upload_path' => "images/",
                'allowed_types' => "jpg|png|jpeg",
                'overwrite' => TRUE,
//                'max_size' => "2048000",
                'remove_spaces'=>FALSE,
                'mod_mime_fix'=>FALSE,

            );
            $this->upload->initialize($config);

            if($this->upload->do_upload('faculty_image')){
                $response   =array('upload_data' => $this->upload->data());
                //print_r($response);
            }else{
                $error =array('error'=>$this->upload->display_errors());
                print_r($error);
                return false;
            }
            $data = array(
                'facultyFirstName' => $facultyFirstName,
                'facultyLastName' => $facultyLastName,
                'facultyDegree' => $facultyDegree,
                'facultyPosition' => $facultyPosition,
                'facultyEmpType' => $facultyEmpType,
                'facultyEmail'=>$facultyEmail,
                'faultyPhone'=>$facultyPhone,
                'facultyTwitter'=>$facultyTwitter,
                'facultyLinkedIn'=>$facultyLinkdin,
                'facultyIntro'=>$facultyIntro,
                'facultyImage'=>$facultyImage,
                'facultyStatus'=>$facultyStatus,
                'lastModifiedBy'=>$this->session->userdata('userEmail'),
                'lastModifiedDate'=>date("Y-m-d H:i:s"),

            );

        }
        else
        {
            $data = array(
                'facultyFirstName' => $facultyFirstName,
                'facultyLastName' => $facultyLastName,
                'facultyDegree' => $facultyDegree,
                'facultyPosition' => $facultyPosition,
                'facultyEmpType' => $facultyEmpType,
                'facultyEmail'=>$facultyEmail,
                'faultyPhone'=>$facultyPhone,
                'facultyTwitter'=>$facultyTwitter,
                'facultyLinkedIn'=>$facultyLinkdin,
                'facultyIntro'=>$facultyIntro,
                'facultyStatus'=>$facultyStatus,
                'lastModifiedBy'=>$this->session->userdata('userEmail'),
                'lastModifiedDate'=>date("Y-m-d H:i:s"),

            );
        }


        $this->db->where('facultyId', $id);
        $this->db->update('ictmfaculty',$data);
    }

    public function deleteFacultybyId($facultyId)  // delete Faculty and his teaching Course from database
    {

        $this->db->where('facultyId',$facultyId);
        $this->db->delete('ictmfacultycourse');

        $this->db->where('facultyId',$facultyId);
        $this->db->delete('ictmfaculty');

    }

    /*---------for Manage Faculty ---------end--------------*/

}