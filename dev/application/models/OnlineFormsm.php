<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class OnlineFormsm extends CI_Model
{

    public function insertRegisterInterest($title, $fname,$sname,$house,$street,$postcode,$city,$country,$phone,$email,$course,$hear,$other,$disability,$appoinment,$comments){

        $data = array(
            'title' => $title,
            'firstName' => $fname,
            'surName' => $sname,
            'House' => $house,
            'street' => $street,
            'postalCode' => $postcode,
            'city' => $city,
            'country' => $country,
            'mobile' => $phone,
            'email'=>$email,
            'course'=>$course,
            'hearAboutUs'=>$hear,
            'other'=>$other,
            'disabilityRequire'=>$disability,
            'appointmentDate'=>$appoinment,
            'comments'=>$comments,
            'inserDate'=>date("Y-m-d H:i:s"),

        );
        $this->security->xss_clean($data);
        $error=$this->db->insert('ictmregisterinterest', $data);

        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }


    }
    public function insertStudentApplicationForm($data3){

        $this->security->xss_clean($data3);
        $error=$this->db->insert('studentapplicationform', $data3);

        $insert_id = $this->db->insert_id();
        return  $insert_id;



    }


    public function getAllapplynow4()
    {
        $this->db->where('fkCandidateId', 1);
        $query=$this->db->get('financer');
        return $query->result();

    }

    public function getAllapplynow5($id)
    {
        $this->db->where('id', $id);
        $this->db->select('id,courseChoiceStatement,collegeChoiceStatement');
        $this->db->from('candidateinfo');
        $query=$this->db->get();
        return $query->result();

    }




    public function updatApplynow5($id, $data)
    {
        $error=$this->db->where('id',$id)->update('candidateinfo',$data);
        if (empty($error))
        {
            return $this->db->error();
        }
        else {

            return $error = null;
        }
    }


    public function insertnewfrom4($data)
    {
        $this->security->xss_clean($data);
        $error=$this->db->insert('financer', $data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else {

            return $error = null;
        }
    }
    public function insertnewfrom5($data)
    {
        $this->security->xss_clean($data);
        $error=$this->db->insert('candidateinfo', $data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else {

            return $error = null;
        }
    }


    public function sendFeedback(){

        $feedbackName = $this->input->post("name");
        $feedbackProfession = $this->input->post("profession");
        $feedbackDetails = $this->input->post("details");
        $feedbackEmail = $this->input->post("email");
        $feedbackMobile = $this->input->post("mobile");


        $data= array(
            'feedbackByName'=>$feedbackName,
            'feedbackByProfession'=>$feedbackProfession,
            'feedbackDetails'=>$feedbackDetails,
            'feedbackByEmail'=>$feedbackEmail,
            'feedbackByMobile'=>$feedbackMobile,
            'feedbackStatus'=>STATUS[1],
            'feedbackApprove'=>SELECT_APPROVE[1],
            'feedbackSource'=>FEEDBACK_SOURCE[7],
            'InsertedBy'=>$feedbackName,
            'InsertedDate'=>date("Y-m-d H:i:s"),
        );

        $data1=$this->security->xss_clean($data);
        $error=$this->db->insert('ictmfeedback', $data1);

        if (empty($error))
        {
            return $this->db->error();
        }
        else{
            $feedbackId=$this->db->insert_id();
            $feedbackImage = $_FILES['image']['name'];

            if (!empty($_FILES['image']['name'])) {

                $this->load->library('upload');
                $config = array(
                    'upload_path' => FOLDER_NAME."/images/feedbackImages/",
                    'allowed_types' => "jpg|png|jpeg|gif",
                    'max_size' => "4096",
                    'overwrite' => TRUE,
                    'remove_spaces'=>FALSE,
                    'mod_mime_fix'=>FALSE,
                    'file_name' => $feedbackId,

                );
                $this->upload->initialize($config);

                if($this->upload->do_upload('image')){
                    // if something need after image upload
                }
                else{

                    $error =array('error'=>$this->upload->display_errors());
                    $che=json_encode($error);
                    echo "<script>
                    alert($che.error);
                    window.location.href= '" . base_url() . "FeedBack';
                    </script>";
                    return false;
                }

                $data2 = array(
                    'feedbackByPhoto' => $feedbackId.".".pathinfo($feedbackImage, PATHINFO_EXTENSION),
                );
                $data2=$this->security->xss_clean($data2,true);
                $this->db->where('feedbackId', $feedbackId);
                $this->db->update('ictmfeedback', $data2);
            }

            return $error=null;

        }


    }

    public function applyNow2()
    {
        $qualification = $this->input->post('qualification[]');
        $institution = $this->input->post('institution[]');
        $startdate = $this->input->post('startdate[]');
        $enddate = $this->input->post('enddate[]');
        $grade = $this->input->post('grade[]');


            for ($i = 0; $i < count($qualification); $i++) {
                $data = array(
                    'fkCandidateId' => '1',
                    'qualification' => $qualification[$i],
                    'institution' => $institution[$i],
                    'startDate' => $startdate[$i],
                    'endDate' => $enddate[$i],
                    'obtainResult' => $grade[$i],

                );

                //$this->security->xss_clean($data);
                $error = $this->db->insert('personqualifications', $data);
            }
          //  return $data;
            if (empty($error)) {
                return $this->db->error();
            } else {
                return $error = null;
            }
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

    public function getCandidateinfo(){

        $query = $this->db->get('candidateinfo');
        return $query->result();

    }
    public function getQualifications($applicationId){

        $this->db->select('qualification.institution,startDate,endDate,obtainResult');
        $this->db->where('fkApplicationId',$applicationId);
        $this->db->from('personqualifications');
        $query=$this->db->get();
        return $query->result();


    }
}
?>