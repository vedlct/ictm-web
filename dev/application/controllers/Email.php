<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {


    // public function index(){}

    public function contactEmail()
    {
        $this->load->library('recaptcha');
        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($recaptcha);
        if (isset($response['success']) and $response['success'] === true) {
            //extract($_POST);
            $admin_email = "md.sakibrahman@gmail.com";
            $subject = $this->input->post('subject');
            // $message = "name: ".$this->input->post('name')."<br>".$this->input->post('comment');
            $email = $this->input->post('email');
            $name= $this->input->post('name');
            $comment= $this->input->post('comment');

            $message = "Name: $name \r\n\n";
            $message .= "$comment \r\n\n";

            mail(ADMIN_EMAIL, $subject, $message, $email);

        }else{
            echo "<script>alert('Please select the recaptcha')</script>";
        }

        Redirect('Contact');
    }
//    public function RegisterInsertEmail($subject, $email, $message){
//
//        $admin_email = "md.sakibrahman@gmail.com";
//
//        mail($admin_email, $subject, $message , $email);
//
//        return true;
//
//    }
    public function FacultyEmail($facultyid){


        $name= $this->input->post('name');
        $iam= $this->input->post('iam');
        $email= $this->input->post('email');
        $contact= $this->input->post('contact');
        $comment= $this->input->post('comment');
        $facultyEmail= $this->input->post('facultyEmail');



        $this->load->library('recaptcha');
        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($recaptcha);
        if (isset($response['success']) and $response['success'] === true) {

            $admin_email = "md.sakibrahman@gmail.com";
            $subject = $this->input->post('subject');
            // $message = "name: ".$this->input->post('name')."<br>".$this->input->post('comment');
            $email = $this->input->post('email');
//            $name= $this->input->post('name');
//            $comment= $this->input->post('comment');

            $message = "Name: $name \r\n\n";
            $message .= "Email: $email \r\n\n";
            $message .= "$comment \r\n\n";

            mail($facultyEmail, $subject, $message, $email);
            redirect('Faculty-details/'.$facultyid);

        }
        else{
            echo "<script>alert('Please select the recaptcha');
//                    window.location('Faculty-details/'.$facultyid);
                </script>";


        }

    }



}
?>