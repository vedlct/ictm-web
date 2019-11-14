<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
//        $this->load->model('Admin/Userm');
        $this->load->library("pagination");

    }

    public function index()
    {

    }

    /* this will show  create Feedback page*/
    public function newUser()
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->load->view('Admin/newUser');


        } else {

            redirect('Admin/Login');
        }
    }

//    public function createNewUser() // for insert new Feedback into database
//    {
//        $this->load->library('form_validation');
//
//        if ($this->session->userdata('type') == USER_TYPE[0]) {
//
//            if (!$this->form_validation->run('createFeedback')) {
//
//                $this->load->view('Admin/newFeedback');
//            } else {
//
//                $this->data['error'] = $this->Feedbackm->createNewFeedback();
//
//                if (empty($this->data['error'])) {
//
//                    $this->session->set_flashdata('successMessage', 'User Created Successfully');
//                    redirect('Admin/Feedback/manageFeedback');
//
//
//                } else {
//                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
//                    redirect('Admin/Feedback/newFeedback');
//                }
//
//            }
//        } else {
//            redirect('Admin/Login');
//        }
//    }
}
