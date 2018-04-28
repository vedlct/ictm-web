<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class ApplyOnlinem extends CI_Model
{
    public function insertStudentApplicationForm($data3){

        $this->security->xss_clean($data3);
        $error=$this->db->insert('studentapplicationform', $data3);

        $insert_id = $this->db->insert_id();
        return  $insert_id;


    }

    public function insertApplyForm1($data,$data1)
    {
        $data=$this->security->xss_clean($data);
        $error=$this->db->insert('candidateinfo', $data);

        if (empty($error)) {
            return $this->db->error();
        } else {

            $data2 = array(
                'fkApplicationId' => $this->session->userdata('studentApplicationId'),
            );
            $newdata1 = array_merge($data1, $data2);
            $newdata1 = $this->security->xss_clean($newdata1);
            $error=$this->db->insert('coursedetails', $newdata1);

            if (empty($error)) {
                return $this->db->error();
            } else {
                return $error = null;
            }

        }


    }
    public function getQualifications($applicationId){

        $this->db->select('id,qualification,institution,startDate,endDate,obtainResult');
        $this->db->where('fkApplicationId',$applicationId);
        $this->db->from('personqualifications');
        $query=$this->db->get();
        return $query->result();


    }
    public function getQualificationsDetails($qualificationId)
    {

        $this->db->select('id,qualification,institution,startDate,endDate,obtainResult');
        $this->db->where('id',$qualificationId);
        $this->db->from('personqualifications');
        $query=$this->db->get();
        return $query->result();


    }
    public function getApplicationId($studentOrAgentId)
    {

        $this->db->select('id,studentApplicationFormId');
        $this->db->where('studentOrAgentId',$studentOrAgentId);
        $this->db->from('studentapplicationform');
        $query=$this->db->get();
        return $query->result();


    }
    public function getCandidateInfo($studentApplicationId)
    {

        $this->db->select('title,firstName,surName,otherNames,dateOfBirth,gender,placeOfBirth,nationality,passportNo,passportExpiryDate,ukEntryDate,visaType,visaExpiryDate,currentAddress,currentAddressPo,overseasAddress,overseasAddressPo,telephoneNo,mobileNo,email,fax,emergencyContactName,emergencyContactTitle,emergencyContactRelation,emergencyContactAddress,emergencyContactAddressPo,emergencyContactMobile,emergencyContactEmail');
        $this->db->where('applicationId',$studentApplicationId);
        $this->db->from('candidateinfo');
        $query=$this->db->get();
        return $query->result();


    }

    public function applyNow2Insert()
    {
        $qualification = $this->input->post('qualification[]');
        $institution = $this->input->post('institution[]');
        $startdate = $this->input->post('startdate[]');
        $enddate = $this->input->post('enddate[]');
        $grade = $this->input->post('grade[]');


        for ($i = 0; $i < count($qualification); $i++) {
            $data = array(
                'fkApplicationId' => $this->session->userdata('studentApplicationId'),
                'qualification' => $qualification[$i],
                'institution' => $institution[$i],
                'startDate' => $startdate[$i],
                'endDate' => $enddate[$i],
                'obtainResult' => $grade[$i],

            );


            $error = $this->db->insert('personqualifications', $data);
        }

        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }
    }

}