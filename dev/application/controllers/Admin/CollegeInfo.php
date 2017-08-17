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

        $this->data['infodata'] = $this->CollegeInfom->getinfoId();
        if (empty($this->data['infodata'])) {
            $this->load->view('Admin/collegeinfo');

        }else{

            $this->data['infodata'] = $this->CollegeInfom->getinfodata();
            $this->load->view('Admin/editcollegeinfo', $this->data);
        }
    }
    public function insertCollegeInfo(){

        $this->CollegeInfom->insertCollegeinfo();
        redirect('Admin/CollegeInfo/createCollegeInfo');

    }
    public function editCollegeInfo($id){
        //$name = $this->input->post("college_name");
        //echo $name.$id;
        $this->CollegeInfom->updateCollegeinfo($id);
        redirect('Admin/CollegeInfo/createCollegeInfo');

    }
}