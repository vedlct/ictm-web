<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Feedback extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Feedbackm');
        $this->load->library("pagination");

    }

    public function index()
    {

    }

    /* this will show  create Feedback page*/
    public function newFeedback()
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->load->view('Admin/newFeedback');


        }
        else {

            redirect('Admin/Login');
        }
    }

    public function createNewFeedback() // for insert new Feedback into database
    {
        $this->load->library('form_validation');

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('createFeedback')) {

                $this->load->view('Admin/newFeedback');
            }
            else
            {

                $this->data['error'] =$this->Feedbackm->createNewFeedback();

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Feedback Created Successfully');
                    redirect('Admin/Feedback/manageFeedback');


                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Feedback/newFeedback');
                }

            }
        }
        else{
            redirect('Admin/Login');
        }
    }
    /*---------for creating new Feedback ------end--------------- */

    /*---------for Manage Feedback -----------------------*/
    public function manageFeedback() // for manage Feedback view
    {
        if ($this->session->userdata('type') == USER_TYPE[0])
        {
//            $config = array();
//            $config["base_url"] = base_url() . "Admin/Feedback/manageFeedback";
//            $config["total_rows"] = $this->Feedbackm->record_count();
//            $config["per_page"] = 10;
//            $config["uri_segment"] = 4;
//            $choice = $config["total_rows"] / $config["per_page"];
//            $config["num_links"] = round($choice);
//            $this->pagination->initialize($config);
//            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
//            $this->data["feedback"] = $this->Feedbackm->getAllforManageFeedback($config["per_page"], $page);
//            $this->data["links"] = $this->pagination->create_links();
            $this->load->helper('url');
            $this->load->view('Admin/manageFeedback1');

        }
        else{
            redirect('Admin/Login');
        }
    }

    public function ajax_list()
    {
        $list = $this->Feedbackm->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $customers->feedbackByName;
            $row[] = $customers->feedbackByProfession;
            $row[] = $customers->feedbackSource;
            $row[] = $customers->feedbackStatus;
            $row[] = $customers->feedbackApprove;
            $row[] = $customers->feedbackApprovedBy;

            if ($customers->feedbackApprovedDate == ""){
                $row[] = 'Pending!!';
            }else{
                $row[] = $customers->feedbackApprovedDate;
            }
            $row[] = $customers->insertedBy;

            if ($customers->lastModifiedBy==""){
                $row[] = "Never Modified";

            }else{
                $row[] = $customers->lastModifiedBy;
            }
            if ($customers->lastModifiedDate==""){
                $row[] = "Never Modified";

            }else{
                $row[] = $customers->lastModifiedDate;
            }
            if ($customers->feedbackApprove == SELECT_APPROVE[0]){

                if ($customers->homeStatus === SELECT_APPROVE[0]){

                    $row[]='<input type="checkbox" id="appearInHome" name="appearInHome" data-panel-id="'. $customers->feedbackId .'" onclick="selectHome(this)" checked="checked">Yes';
                }
                else{
                    $row[]='<input type="checkbox" id="appearInHome" name="appearInHome" data-panel-id="'. $customers->feedbackId .'" onclick="selectHome(this)" >Yes';
                }


            }else{
                $row[] = 'Need Approval First !!';
            }

            $row[] = '<a class="btn" href="'. base_url()."Admin/Feedback/editFeedbackView/".$customers->feedbackId.'"><i class="icon_pencil-edit"></i></a>
                                                    <a class="btn" data-panel-id="'. $customers->feedbackId .'"  onclick="selectid(this)"><i class="icon_trash"></i></a>';



            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Feedbackm->count_all(),
            "recordsFiltered" => $this->Feedbackm->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);

    }

    public function editFeedbackView($feedbackId) // for edit  Selected Feedback view
    {
        if ($this->session->userdata('type') == USER_TYPE[0])
        {

            $this->data['editFeedback'] = $this->Feedbackm->getAllFeedbackbyId($feedbackId);
            $this->load->view('Admin/editFeedback', $this->data);
        }
        else{
            redirect('Admin/Login');
        }
    }

    public function editFeedbackbyId($feedbackId) // for edit Event by id from database
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('editFeedback')) {

                $this->data['editFeedback'] = $this->Feedbackm->getAllFeedbackbyId($feedbackId);
                $this->load->view('Admin/editFeedback', $this->data);
            }

            else
            {

                $this->data['error'] = $this->Feedbackm->editFeedbackbyId($feedbackId);


                if (empty($this->data['error'])) {
                    $this->session->set_flashdata('successMessage','Feedback Update Successfully');
                    redirect('Admin/Feedback/manageFeedback');
                }
                else
                {

                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Feedback/editFeedbackbyId/'.$feedbackId);
                }


            }
        }
        else{
            redirect('Admin/Login');
        }
    }


    public function deleteFeedback($feedbackId) // delete Feedback from database
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->Feedbackm->deleteFeedbackbyId($feedbackId);
            $this->session->set_flashdata('successMessage','Feedback Deleted Successfully');

        }

        else{
            redirect('Admin/Login');
        }
    }

    // show Feedback image in new tab
    public function showImageForEdit($feedbackId)
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['feedbackImage'] = $this->Feedbackm->getImage($feedbackId);
            $this->load->view('Admin/showImage', $this->data);
        }
        else{
            redirect('Admin/Login');
        }
    }

    //this function will delete the image in edit
    public function deleteFeedbackImage($feedbackId){

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['error'] = $this->Feedbackm->deleteFeedbackImage($feedbackId);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage','Feedback Image Deleted Successfully');
                redirect('Admin/Feedback/editFeedbackView/'.$feedbackId);
            }
            else
            {
                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/Feedback/editFeedbackView/'.$feedbackId);
            }
        }
        else{
            redirect('Admin/Login');
        }
    }

    // appear in the Home page
    public function appearInHomePage($feedbackId)
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $approve=$this->Feedbackm->appearInHomePage($feedbackId);
            echo $approve;

        }

        else{
            redirect('Admin/Login');
        }
    }

    /* -------------------------------Image validation-------------------------*/
    public function val_img_check()
    {
        $image = $_FILES['feedbackByImage']['name'];
        $imageSize = ($_FILES['feedbackByImage']['size']/1024);
        $supported_image = array('gif','jpg','jpeg','png');
        if ($image != null) {
            $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));

            if (in_array($ext, $supported_image))

            {

                if ($imageSize <4096){
                    return true;
                }
                else{
                    $this->form_validation->set_message('val_img_check', "Maximum Image Size 4MB is allowed!!");
                    return false;
                }
            }

            else

            {
                $this->form_validation->set_message('val_img_check',"Only JPEG/JPG/PNG/GIF Image is allowed!!");
                return false;


            }


        }
    }
}