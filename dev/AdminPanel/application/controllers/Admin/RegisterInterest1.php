<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class RegisterInterest1 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/RegisterInterestm1');
        $this->load->library('form_validation');
    }

    public function viewRI(){

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->load->helper('url');
            $this->load->view('Admin/manageRegisterInterest1');

        }
        else{
            redirect('Admin/Login');
        }
    }

    public function ajax_list()
    {
        $list = $this->RegisterInterestm1->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $customers->title;
            $row[] = $customers->firstName.' '.$customers->surName;
//            $row[] = $customers->surName;
            $row[] = $customers->mobile;
            $row[] = $customers->appointmentDate;
            $row[] = $customers->course;
            $row[] = $customers->email;
            $row[] = $customers->inserDate;
            $row[] = '<a class="btn" href="'.base_url().'Admin/RegisterInterest/viewSelectedRI/'.$customers->registerInterestId.'"><i class="icon_pencil-edit"></i></a>
            <a class="btn " data-panel-id="'.$customers->registerInterestId.'"onclick=\'return confirm("Are you sure to Delete This RegisterInterest?")\' href="'.base_url().'Admin/RegisterInterest/deleteRegisterInterest/'. $customers->registerInterestId.'"><i class="icon_trash"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->RegisterInterestm1->count_all(),
            "recordsFiltered" => $this->RegisterInterestm1->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);

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
