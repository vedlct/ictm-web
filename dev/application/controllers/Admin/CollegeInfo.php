<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CollegeInfo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin/CollegeInfom');
    }

    public function createCollegeInfo(){

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['infodata'] = $this->CollegeInfom->getinfoId();
            if (empty($this->data['infodata'])) {
                $this->load->view('Admin/collegeinfo');

            } else {

                $this->data['infodata'] = $this->CollegeInfom->getinfodata();
                $this->load->view('Admin/editcollegeinfo', $this->data);
            }
        }
        else{
            redirect('Admin/Login');
        }
    }
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
                    echo "<script>
                    alert('Course Updated Successfully');
                    window.location.href= '" . base_url() . "Admin/CollegeInfo/createCollegeInfo';
                    </script>";

                }
                else
                {
                    echo "<script>
                    alert('Some thing Went Wrong !! Please Try Again!!');
                    window.location.href= '" . base_url() . "Admin/Course/createCollegeInfo';
                    </script>";
                }


            }

        }
        else{
            redirect('Admin/Login');
        }
    }
    public function editCollegeInfo($id)
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('CollegeInfo')) {

                $this->data['infodata'] = $this->CollegeInfom->getinfodata();
                $this->load->view('Admin/editcollegeinfo', $this->data);

            }
            else {

                $this->data['error']=$this->CollegeInfom->updateCollegeinfo($id);

                if (empty($this->data['error'])) {
                    echo "<script>
                    alert('Course Updated Successfully');
                    window.location.href= '" . base_url() . "Admin/CollegeInfo/createCollegeInfo';
                    </script>";

                }
                else
                {
                    echo "<script>
                    alert('Some thing Went Wrong !! Please Try Again!!');
                    window.location.href= '" . base_url() . "Admin/Course/createCollegeInfo';
                    </script>";
                }

            }
        }
        else{
            redirect('Admin/Login');
        }
    }
}