<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class AlumniFormsm extends CI_Model
{



    public function sendAlumni(){

        $title = $this->input->post("title");
        $firstName = $this->input->post("firstName");
        $lastName = $this->input->post("lastName");
        $gender = $this->input->post("gender");
        $dateOfBirth=$this->input->post('dateOfBirth');
        $nationality = $this->input->post("nationality");
        $address = $this->input->post("address");
        $postcode = $this->input->post("postcode");
        $mobileNo = $this->input->post("mobileNo");
        $email = $this->input->post("email");
        $studentId = $this->input->post("studentId");
        $courseComplete = $this->input->post("courseComplete");
        $courseStartYear = $this->input->post("courseStartYear");
        $courseCompleteYear = $this->input->post("courseCompleteYear");
        $currentStatus = $this->input->post("currentStatus");
        $currentOther = $this->input->post("currentOther");
        $organisation = $this->input->post("organisation");
        $emAddress = $this->input->post("emAddress");
        $jobTitle = $this->input->post("jobTitle");
        $startCourse = $this->input->post("startCourse");
        $receiveInfo = $this->input->post("receiveInfo");

        $data= array(
            'title'=>$title,
            'firstName'=>$firstName,
            'lastName'=>$lastName,
            'gender'=>$gender,
            'nationality'=>$nationality,
            'address'=>$address,
            'postcode'=>$postcode,
            'mobileNo'=>$mobileNo,
            'email'=>$email,
            'studentId'=>$studentId,
            'courseComplete'=>$courseComplete,
            'courseStartYear'=>$courseStartYear,
            'courseCompleteYear'=>$courseCompleteYear,
            'currentStatus'=>$currentStatus,
            'currentOther'=>$currentOther,
            'organisation'=>$organisation,
            'emAddress'=>$emAddress,
            'jobTitle'=>$jobTitle,
            'startCourse'=>$startCourse,
            'receiveInfo'=>$receiveInfo,
            'dateOfBirth'=>$dateOfBirth,
			'applydate'=> date('Y-m-d H:i:s'),
        );

        $data1=$this->security->xss_clean($data);
        $error=$this->db->insert('alumniregistration', $data1);

        if (empty($error))
        {
            return $this->db->error();
        }
        else{
            $personId=$this->db->insert_id();
            $this->db->where('personId', $personId);
            return $error=null;

        }


    }


}
?>
