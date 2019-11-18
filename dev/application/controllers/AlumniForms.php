<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AlumniForms extends CI_Controller
{
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
        $this->load->model('AlumniFormsm');
        $this->load->helper('cookie');
        $this->load->model('Searchm');
    }
    public function alumni() // go to the feedback page
    {
        $this->menu();
//        $this->load->view('feedback-form', $this->data);
        $this->load->view('alumni-form',$this->data);
    }
    public function SubmitAlumni() // Submit the feedback
    {
        $this->load->library('recaptcha');
        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($recaptcha);
        if (isset($response['success']) and $response['success'] === true) {
            $this->load->model('AlumniFormsm');
            $this->load->library('form_validation');
            if (!$this->form_validation->run('alumnis')) {
                $this->menu();
                $this->load->view('alumni-form', $this->data);
            } else {
                $this->data['error'] = $this->AlumniFormsm->sendAlumni();
                if (empty($this->data['error'])) {
                    $this->session->set_flashdata('successMessage', 'Alumni given Successfully.Thank You');
                    redirect('Alumni');
                } else {
                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');

                    $this->menu();

                    $this->data['title']=$this->input->post('title');
                    $this->data['firstName']=$this->input->post('firstName');
                    $this->data['lastName']=$this->input->post('lastName');
                    $this->data['gender']=$this->input->post('gender');
                    $this->data['dateOfBirth']=$this->input->post('dateOfBirth');
                    $this->data['nationality']=$this->input->post('nationality');
                    $this->data['address']=$this->input->post('address');
                    $this->data['postcode']=$this->input->post('postcode');
                    $this->data['mobileNo']=$this->input->post('mobileNo');
                    $this->data['email']=$this->input->post('email');
                    $this->data['studentId']=$this->input->post('studentId');
                    $this->data['courseComplete']=$this->input->post('courseComplete');
                    $this->data['courseStartYear']=$this->input->post('courseStartYear');
                    $this->data['courseCompleteYear']=$this->input->post('courseCompleteYear');
                    $this->data['currentStatus']=$this->input->post('currentStatus');
                    $this->data['currentOther']=$this->input->post('currentOther');
                    $this->data['organisation']=$this->input->post('organisation');
                    $this->data['emAddress']=$this->input->post('emAddress');
                    $this->data['jobTitle']=$this->input->post('jobTitle');
                    $this->data['startCourse']=$this->input->post('startCourse');
                    $this->data['receiveInfo']=$this->input->post('receiveInfo');
                    $this->load->view('alumni-form', $this->data);

//                    redirect('Feedback');
                }

            }
        }else{
//            echo "<script>alert('Please select the recaptcha');
//                    window.location.href='".site_url('Contact')."';
//
//                    </script>";


            $this->session->set_flashdata('errorMessage', 'Please select the recaptcha!!');

            $this->menu();

            $this->data['title']=$this->input->post('title');
            $this->data['firstName']=$this->input->post('firstName');
            $this->data['lastName']=$this->input->post('lastName');
            $this->data['dateOfBirth']=$this->input->post('dateOfBirth');
            $this->data['gender']=$this->input->post('gender');
            $this->data['nationality']=$this->input->post('nationality');
            $this->data['address']=$this->input->post('address');
            $this->data['postcode']=$this->input->post('postcode');
            $this->data['mobileNo']=$this->input->post('mobileNo');
            $this->data['email']=$this->input->post('email');
            $this->data['studentId']=$this->input->post('studentId');
            $this->data['courseComplete']=$this->input->post('courseComplete');
            $this->data['courseStartYear']=$this->input->post('courseStartYear');
            $this->data['courseCompleteYear']=$this->input->post('courseCompleteYear');
            $this->data['currentStatus']=$this->input->post('currentStatus');
            $this->data['currentOther']=$this->input->post('currentOther');
            $this->data['organisation']=$this->input->post('organisation');
            $this->data['emAddress']=$this->input->post('emAddress');
            $this->data['jobTitle']=$this->input->post('jobTitle');
            $this->data['startCourse']=$this->input->post('startCourse');
            $this->data['receiveInfo']=$this->input->post('receiveInfo');
            $this->load->view('feedback-form', $this->data);

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