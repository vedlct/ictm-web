<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {


   // public function index(){}

    public function contactEmail()
    {
        include APPPATH . 'controllers/Recaptchalib.php';
        $reCaptchalip = new $reCaptchalib();
        $secret = "6LdVdC8UAAAAAJBVvMe6oQ_Kq7Gd4MdwH3mDSCzX";

        // empty response
        $response = null;

        // check secret key
        $reCaptcha = new ReCaptcha($secret);

        if ($_POST["g-recaptcha-response"]) {
            $response = $reCaptcha->verifyResponse(
                $_SERVER["REMOTE_ADDR"],
                $_POST["g-recaptcha-response"]
            );
        }

        if ($response != null && $response->success) {
            //extract($_POST);
            $admin_email = "md.sakibrahman@gmail.com";
            $subject = $this->input->post('subject');
            // $message = "name: ".$this->input->post('name')."<br>".$this->input->post('comment');
            $email = $this->input->post('email');

            $message = "Name: $this->input->post('name') \r\n\n";
            $message .= "$this->input->post('comment') \r\n\n";

            mail($admin_email, $subject, $message, $email);
        } else {

            echo("<script>alert('Please fill the Captcha Box');</script>");
        }
    }
    public function RegisterInsertEmail($subject, $email, $message){

        $admin_email = "md.sakibrahman@gmail.com";

        mail($admin_email, $subject, $message , $email);

        return true;

    }



}
?>