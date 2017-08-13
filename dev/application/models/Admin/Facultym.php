<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Facultym extends CI_Model
{
    public function createNewFaculty()
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
        $facultyCourse = $this->input->post("faculty_courses[]");
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
        $this->db->insert('ictmfaculty', $data);

        $query = $this->db->query("SELECT * FROM `ictmfaculty` ORDER  BY `facultyId` DESC limit 1 ");

        foreach ($query->result() as $r){

            $facultyId=$r->facultyId;
        }
        for ($i = 0; $i < count($facultyCourse); $i++) {
            $data1=array(
                'courseId'=>$facultyCourse[$i],
                'facultyId'=>$facultyId
            );
            $this->db->insert('ictmfacultycourse', $data1);
        }

    }

}