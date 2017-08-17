<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class CollegeInfom extends CI_Model
{

    public function getinfoId() {
        $this->db->select('collegeInfoId');
        $query = $this->db->get('ictmcollegeinfo');
        return $query->result();

    }
    public function getinfodata() {
        $query = $this->db->get('ictmcollegeinfo');
        return $query->result();

    }
    public function insertCollegeinfo(){
        $name = $this->input->post("college_name");
        $location = $this->input->post("college_location");
        $tel1 = $this->input->post("college_tel1");
        $tel2 = $this->input->post("college_tel2");
        $fax = $this->input->post("college_fax");
        $email = $this->input->post("college_email");
        $domain = $this->input->post("college_domain");
        $facebook = $this->input->post("college_facebook");
        $twitter = $this->input->post("college_twitter");
        $linkedin = $this->input->post("college_linkedin");
        $google = $this->input->post("college_google");
        $youtube = $this->input->post("college_youtube");
        $status = $this->input->post("college_status");
        date_default_timezone_set("Europe/London");

        $data = array(
            'collegeName' => $name,
            'collegeDomain' => $domain,
            'collegeAddress' => $location,
            'collegeTelephone1' => $tel1,
            'collegeTelephone2' => $tel2,
            'collegeFax' => $fax,
            'collegeEmail' =>$email,
            'collegeFacebook' => $facebook,
            'collegeTwitter' => $twitter,
            'collegeLinkedIn' => $linkedin,
            'collegeGoogle' => $google,
            'collegeYoutube' => $youtube,
            'InsertedBy' => $this->session->userdata('userEmail'),
            'InsertedDate' => date("Y-m-d H:i:s"),
            'collegeInfoStatus'=>$status



        );
        //$data = $this->security->xss_clean($data);
        $this->db->insert('ictmcollegeinfo', $data);


    }

    public function updateCollegeinfo($id){
        $name = $this->input->post("college_name");
        $location = $this->input->post("college_location");
        $tel1 = $this->input->post("college_tel1");
        $tel2 = $this->input->post("college_tel2");
        $fax = $this->input->post("college_fax");
        $email = $this->input->post("college_email");
        $domain = $this->input->post("college_domain");
        $facebook = $this->input->post("college_facebook");
        $twitter = $this->input->post("college_twitter");
        $linkedin = $this->input->post("college_linkedin");
        $google = $this->input->post("college_google");
        $youtube = $this->input->post("college_youtube");
        $status = $this->input->post("college_status");

        date_default_timezone_set("Europe/London");

        $data = array(
            'collegeName' => $name,
            'collegeDomain' => $domain,
            'collegeAddress' => $location,
            'collegeTelephone1' => $tel1,
            'collegeTelephone2' => $tel2,
            'collegeFax' => $fax,
            'collegeEmail' =>$email,
            'collegeFacebook' => $facebook,
            'collegeTwitter' => $twitter,
            'collegeLinkedIn' => $linkedin,
            'collegeGoogle' => $google,
            'collegeYoutube' => $youtube,
            'lastModifiedBy' => $this->session->userdata('userEmail'),
            'lastModifiedDate' => date("Y-m-d H:i:s"),
            'collegeInfoStatus'=>$status



        );

        $this->db->where('collegeInfoId', $id);
        $this->db->update('ictmcollegeinfo', $data);

    }


}