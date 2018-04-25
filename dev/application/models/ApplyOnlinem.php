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

        $this->db->select('institution,startDate,endDate,obtainResult');
        $this->db->where('fkApplicationId',$applicationId);
        $this->db->from('personqualifications');
        $query=$this->db->get();
        return $query->result();


    }

}