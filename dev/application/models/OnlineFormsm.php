<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class OnlineFormsm extends CI_Model
{

    public function insertRegisterInterest(){


        $fname= $this->input->post('fname');
        $sname= $this->input->post('sname');
        $house= $this->input->post('house');
        $street= $this->input->post('street');
        $postcode= $this->input->post('postcode');
        $city= $this->input->post('city');
        $country= $this->input->post('country');
        $phone= $this->input->post('phone');
        $email= $this->input->post('email');
        $course= $this->input->post('course');
        $hear= $this->input->post('hear');
        $other= $this->input->post('other');
        $disability= $this->input->post('disability');
        $appoinment= $this->input->post('appoinment');
        $comments= $this->input->post('comments');


        $data = array(
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

    public function sendFeedback(){

        $feedbackName = $this->input->post("name");
        $feedbackProfession = $this->input->post("profession");
        $feedbackDetails = $this->input->post("details");


        $data= array(
            'feedbackByName'=>$feedbackName,
            'feedbackByProfession'=>$feedbackProfession,
            'feedbackDetails'=>$feedbackDetails,
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
                    'max_size' => "1024*4",
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
}
?>