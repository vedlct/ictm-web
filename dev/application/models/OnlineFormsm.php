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
}
?>