<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Email  {


   // public function index(){}

    public function contactEmail(){

        //extract($_POST);
        $admin_email = "md.sakibrahman@gmail.com";
        $subject = $this->input->post('subject');
       // $message = "name: ".$this->input->post('name')."<br>".$this->input->post('comment');
        $email = $this->input->post('email');

        $message = "Name: $this->input->post('name') \r\n\n";
        $message .= "$this->input->post('comment') \r\n\n";

        mail($admin_email, $subject, $message , $email);
    }
    public function RegisterInsertEmail($subject, $email, $message){

        $admin_email = "md.sakibrahman@gmail.com";

        mail($admin_email, $subject, $message , $email);

        return true;

    }

}
?>