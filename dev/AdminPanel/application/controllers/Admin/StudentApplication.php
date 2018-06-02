<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class StudentApplication extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin/StudentApplicationm');
    }

    public function index()
    {

    }




    /*---------for Manage StudentApplication -----------------------*/

    public function manageApplication() // for manage Application view
    {
        if ($this->session->userdata('type') == USER_TYPE[0])
        {

            $this->load->view('Admin/manageStudentApplication');

        }
        else{
            redirect('Admin/Login');
        }
    }

    /*---------datatable code --------------------- */
    public function ajax_list()
    {
        $list = $this->StudentApplicationm->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $application) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $application->title.' '.$application->firstName.' '.$application->surName;
            $row[] = $application->studentApplicationFormId;

            if ($application->applydate==""){
                $row[] = '';
            }else{
                $row[] = preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($application->applydate)),1);
            }




            $html = '<a class="btn" href="'. base_url().'Admin/StudentApplication/viewApplication/'.$application->id.'"><i class="icon_pencil-edit"></i></a>
                                                    <a class="btn" data-panel-id="'.$application->id .'"  onclick="selectid(this)"><i class="icon_trash"></i></a>';

            $row[] = $html;

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->StudentApplicationm->count_all(),
            "recordsFiltered" => $this->StudentApplicationm->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }



    public function viewApplication($applicationId) // for selected Application view
    {
        if ($this->session->userdata('type') == USER_TYPE[0])
        {
            $this->data['viewApplication'] = $this->StudentApplicationm->getApplication($applicationId);
            $this->load->view('Admin/viewStudentApplication', $this->data);
        }

        else{
            redirect('Admin/Login');
        }
    }

    ///////////////////////////////sakib//////////////////

    public function ApplicationDetails(){

        //$applicationId = $this->input->post();
        $applicationId = 9;

        $this->data['personalDetails'] = $this->StudentApplicationm->personalDetails($applicationId);
        $this->load->view('Admin/detailsForms', $this->data);
    }
    /////////////////////////////////////////////////////
}