<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {


    // public function index(){}

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menum');
        $this->load->model('CollegeInfom');
        $this->load->model('Photom');
        $this->load->model('Eventm');
        $this->load->model('Newsm');
        $this->load->model('Coursem');
        $this->load->model('OnlineFormsm');
        $this->load->helper('cookie');
        $this->load->model('Searchm');
        $this->load->model('Facultym');
    }

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
            $headers = 'From: <'.$email.'>' . "\r\n";

            if (mail(ADMIN_EMAIL, $subject, $message, $headers)){
                $this->session->set_flashdata('successMessage', 'We have received your message and we will reply you as soon as possible. However, if your inquiry is urgent, please telephone us to talk to one of our staff members.');
                redirect('Contact');
            }else{
                $this->session->set_flashdata('errorMessage', 'Email Not Sent, Some thing Went Wrong !! Please Try Again!!');



                $this->menu();

                $this->data['name']=$this->input->post('name');
                $this->data['subject']=$this->input->post('subject');
                $this->data['email']=$this->input->post('email');
                $this->data['comment']=$this->input->post('comment');

                $this->load->view('Contact', $this->data);
            }
        }
        else{
//            echo "<script>alert('Please select the recaptcha');
//
//
//                    </script>";

            $this->session->set_flashdata('errorMessage', 'Please select the recaptcha!!');

            $this->menu();

            $this->data['name']=$this->input->post('name');
            $this->data['subject']=$this->input->post('subject');
            $this->data['email']=$this->input->post('email');
            $this->data['comment']=$this->input->post('comment');
            $this->load->view('Contact', $this->data);

        }

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
      //  print_r($response);


        if (isset($response['success']) and $response['success'] === true) {

            $admin_email = "md.sakibrahman@gmail.com";
//            $subject = $this->input->post('subject');
            $subject = "Outside Inquery From Website";
            // $message = "name: ".$this->input->post('name')."<br>".$this->input->post('comment');
            $email = $this->input->post('email');
//            $name= $this->input->post('name');
//            $comment= $this->input->post('comment');

            $message = "Name: $name \r\n\n";
            $message .= "Email: $email \r\n\n";
            $message .= "$comment \r\n\n";
            $headers = 'From: <'.$email.'>' . "\r\n";

            if (mail($facultyEmail, $subject, $message, $headers)) {
                $this->session->set_flashdata('successMessage', 'We have received your message and we will reply you as soon as possible. However, if your inquiry is urgent, please telephone us to talk to one of our staff members.');
                redirect('Faculty-details/'.$facultyid);
            }
            else{

                $this->session->set_flashdata('errorMessage', 'Email Not Sent, Some thing Went Wrong !! Please Try Again!!');

                $this->menu();

                $this->data['name']=$this->input->post('name');
                $this->data['iam']=$this->input->post('iam');
                $this->data['email']=$this->input->post('email');
                $this->data['contact']=$this->input->post('contact');
                $this->data['comment']=$this->input->post('comment');
                $this->data['facultyEmail']=$this->input->post('facultyEmail');

                $this->data['facultydetails']= $this->Facultym->getfacultyDetails($facultyid);
                $this->data['coursedata'] = $this->Coursem->getCourseTitle();
                $this->data['facultyCourseData'] = $this->Coursem->facultyAllCourseData($facultyid);
                $this->load->view('faculty-member-detail', $this->data);

//                redirect('Faculty-details/'.$facultyid);
            }


        }
        else{
//            $this->session->set_flashdata('errorMessage', 'Email Not Sent, Please select the recaptcha !! And Try Again!!');
//            echo "<script>alert('Please select the recaptcha');
//                    window.location.href='".site_url('Faculty-details/'.$facultyid)."';
//                </script>";

            $this->session->set_flashdata('errorMessage', 'Please select the recaptcha!!');

            $this->menu();

            $this->data['name']=$this->input->post('name');
            $this->data['iam']=$this->input->post('iam');
            $this->data['email']=$this->input->post('email');
            $this->data['contact']=$this->input->post('contact');
            $this->data['comment']=$this->input->post('comment');
            $this->data['facultyEmail']=$this->input->post('facultyEmail');

            $this->data['facultydetails']= $this->Facultym->getfacultyDetails($facultyid);
            $this->data['coursedata'] = $this->Coursem->getCourseTitle();
            $this->data['facultyCourseData'] = $this->Coursem->facultyAllCourseData($facultyid);
            $this->load->view('faculty-member-detail', $this->data);


        }

    }

    public function menu() // get all the menu + footer
    {
        $this->data['affiliation'] = $this->Menum->getAffiliations();
        $this->data['topmenu'] = $this->Menum->getTopMenu();
        $this->data['parentmenu'] = $this->Menum->getParentMenu();
        $this->data['checkparentmenu'] = $this->Menum->checkParentMenu();
        $this->data['mainmenu'] = $this->Menum->getMainMenu();
        $this->data['keyinfo'] = $this->Menum->getkeyInfoMenu();
        $this->data['quicklink'] = $this->Menum->getQuickLinksMenu();
        $this->data['implink'] = $this->Menum->getImportantLinkMenu();
        $this->data['bottom'] = $this->Menum->getBottomMenu();
        $this->data['contact'] = $this->CollegeInfom->getCollegeContact();
        $this->data['photoGalleryForFooter'] = $this->Photom->getFooterPhotoGallery();
        $this->data['searchpage'] = $this->Searchm->getpage();
        $this->data['searchnews'] = $this->Searchm->getNews();
        $this->data['searchevents'] = $this->Searchm->getEvents();
    }



}
?>