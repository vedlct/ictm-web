<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class RegisterInterest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/RegisterInterestm');

        $this->load->library("pagination");
        $this->load->library('form_validation');
    }

    public function viewRI(){


        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $config = array();
            $config["base_url"] = base_url() . "Admin/RegisterInterest/viewRI";
            $config["total_rows"] = $this->RegisterInterestm->record_count();
            $config["per_page"] = 10;
            $config["uri_segment"] = 4;
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = round($choice);
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $this->data["RiData"] = $this->RegisterInterestm->showAllRegisterInterest($config["per_page"], $page);
            $this->data["links"] = $this->pagination->create_links();

            $this->load->view('Admin/manageRegisterInterest', $this->data);

        }
        else{
            redirect('Admin/Login');
        }
    }
// search by Firs Name in manage Register Interest
    public function searchByName(){


        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $name=$this->input->post('name');
            $this->data['RiData'] =$this->RegisterInterestm->viewAllRIByName($name);
            $this->load->view('Admin/manageRegisterInterestAfterSearch', $this->data);

        }
        else{
            redirect('Admin/Login');
        }
    }

    public function viewSelectedRI($riId){


        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['allDataForRI'] =$this->RegisterInterestm->viewAllForSelectedRI($riId);
            $this->load->view('Admin/ViewRegisterInterest',$this->data);


        }
        else{
            redirect('Admin/Login');
        }
    }

    //this will delete RegisterInterest
    public function deleteRegisterInterest($RiId)
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->RegisterInterestm->deleteRI($RiId);
            $this->session->set_flashdata('successMessage','Register Interest Deleted Successfully');
            redirect('Admin/RegisterInterest/viewRI');


        }
        else{
            redirect('Admin/Login');
        }
    }
}
