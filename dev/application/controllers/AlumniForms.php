<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AlumniForms extends CI_Controller
{
//    public function __construct()
//    {
//        parent::__construct();
//        $this->load->model('Menum');
//        $this->load->model('CollegeInfom');
//        $this->load->model('Photom');
//        $this->load->model('Eventm');
//        $this->load->model('Newsm');
//        $this->load->model('Coursem');
//        $this->load->model('OnlineFormsm');
//        $this->load->helper('cookie');
//        $this->load->model('Searchm');
//    }
    public function alumni() // go to the feedback page
    {
//        $this->menu();
//        $this->load->view('feedback-form', $this->data);
        $this->load->view('alumni-form');
    }
//    public function SubmitFeedback() // Submit the feedback
//    {
//        $this->load->library('recaptcha');
//        $recaptcha = $this->input->post('g-recaptcha-response');
//        $response = $this->recaptcha->verifyResponse($recaptcha);
//        if (isset($response['success']) and $response['success'] === true) {
//            $this->load->model('OnlineFormsm');
//            $this->load->library('form_validation');
//            if (!$this->form_validation->run('feedbacks')) {
//                $this->menu();
//                $this->load->view('feedback-form', $this->data);
//            } else {
//                $this->data['error'] = $this->OnlineFormsm->sendFeedback();
//                if (empty($this->data['error'])) {
//                    $this->session->set_flashdata('successMessage', 'Feedback given Successfully.Thak You For Your Feedback');
//                    redirect('Feedback');
//                } else {
//                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
//
//                    $this->menu();
//
//                    $this->data['name']=$this->input->post('name');
//                    $this->data['profession']=$this->input->post('profession');
//                    $this->data['email']=$this->input->post('email');
//                    $this->data['mobile']=$this->input->post('mobile');
//                    $this->data['details']=$this->input->post('details');
//                    $this->load->view('feedback-form', $this->data);
//
////                    redirect('Feedback');
//                }
//
//            }
//        }else{
////            echo "<script>alert('Please select the recaptcha');
////                    window.location.href='".site_url('Contact')."';
////
////                    </script>";
//
//
//            $this->session->set_flashdata('errorMessage', 'Please select the recaptcha!!');
//
//            $this->menu();
//
//            $this->data['name']=$this->input->post('name');
//            $this->data['profession']=$this->input->post('profession');
//            $this->data['email']=$this->input->post('email');
//            $this->data['mobile']=$this->input->post('mobile');
//            $this->data['details']=$this->input->post('details');
//            $this->load->view('feedback-form', $this->data);
//
//        }
//    }
//    public function menu() // get all the menu + footer
//    {
//        $this->data['affiliation'] = $this->Menum->getAffiliations();
//        $this->data['topmenu'] = $this->Menum->getTopMenu();
//        $this->data['parentmenu'] = $this->Menum->getParentMenu();
//        $this->data['checkparentmenu'] = $this->Menum->checkParentMenu();
//        $this->data['mainmenu'] = $this->Menum->getMainMenu();
//        $this->data['keyinfo'] = $this->Menum->getkeyInfoMenu();
//        $this->data['quicklink'] = $this->Menum->getQuickLinksMenu();
//        $this->data['implink'] = $this->Menum->getImportantLinkMenu();
//        $this->data['bottom'] = $this->Menum->getBottomMenu();
//        $this->data['contact'] = $this->CollegeInfom->getCollegeContact();
//        $this->data['photoGalleryForFooter'] = $this->Photom->getFooterPhotoGallery();
//
//        $this->data['searchpage'] = $this->Searchm->getpage();
//        $this->data['searchnews'] = $this->Searchm->getNews();
//        $this->data['searchevents'] = $this->Searchm->getEvents();
//    }




}