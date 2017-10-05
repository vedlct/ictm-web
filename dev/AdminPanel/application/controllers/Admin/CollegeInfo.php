<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CollegeInfo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/CollegeInfom');
    }

    //collegeInfo view
    public function createCollegeInfo(){

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['infodata'] = $this->CollegeInfom->getinfoId();
            if (empty($this->data['infodata'])) {
                $this->load->view('Admin/collegeinfo');

            } else {

                $this->data['infodata'] = $this->CollegeInfom->getinfodata();
                $this->load->view('Admin/editCollegeinfo', $this->data);
            }
        }
        else{
            redirect('Admin/Login');
        }
    }
    //create collegeInfo
    public function insertCollegeInfo()
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('CollegeInfo')) {

                $this->load->view('Admin/collegeinfo');

            }
            else {

                $this->data['error']=$this->CollegeInfom->insertCollegeinfo();

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','College Info Created Successfully');
                    redirect('Admin/CollegeInfo/createCollegeInfo');

                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/CollegeInfo/createCollegeInfo');

                }


            }

        }
        else{
            redirect('Admin/Login');
        }
    }
    //edit collegeInfo
    public function editCollegeInfo($id)
    {
        $this->load->library('form_validation');

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('CollegeInfo')) {

                $this->data['infodata'] = $this->CollegeInfom->getinfodata();
                $this->load->view('Admin/editCollegeinfo', $this->data);

            }
            else {

                $this->data['error']=$this->CollegeInfom->updateCollegeinfo($id);

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','College Info Updated Successfully');
                    redirect('Admin/CollegeInfo/createCollegeInfo');

                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/CollegeInfo/createCollegeInfo');
                }

            }
        }
        else{
            redirect('Admin/Login');
        }
    }
}