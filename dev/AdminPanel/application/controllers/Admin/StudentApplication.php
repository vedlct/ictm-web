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
            $row[] = $application->email;
            $row[] = $application->mobileNo;
            $row[] = $application->courseName;
            $row[] = $application->studentApplicationFormId;

            if ($application->applydate==""){
                $row[] = '';
            }else{
                $row[] = preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($application->applydate)),1);
            }




            $html = '<a class="btn" target="_blank" href="'. base_url().'Admin/StudentApplication/viewApplication/'.$application->id.'"><i class="icon_pencil-edit"></i></a>
                                                    
                                                    <a class="btn" target="_blank" href="'. base_url().'Admin/StudentApplication/showApplicationPdf/'.$application->id.'"><i class="fa fa-file-pdf-o"></i></a>';

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
            $dataSession = [
                'studentApplicationId' => $applicationId,
            ];

          //   $this->session->set_userdata($dataSession);
            $sessionId=session_id();

            //print_r(session_id());

            //redirect("../"."ApplyOnline/viewForm1as/".$sessionId);
        }

        else{
            redirect('Admin/Login');
        }
    }
    public function showApplicationPdf($applicationId) // for selected Application view
    {
        if ($this->session->userdata('type') == USER_TYPE[0])
        {
            $this->load->library('pdfgenerator');
//            $data='';
//
//            $html = $this->load->view('Admin/testPdf', $data, true);
//            $filename = 'testPdf';
//            $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');

            //$applicationId = $this->input->post();
            $applicationId = 4;

            $this->data['personalDetails'] = $this->StudentApplicationm->personalDetails($applicationId);
            $this->data['contactDetails'] = $this->StudentApplicationm->contactDetails($applicationId);
            $this->data['emmergencyContact'] = $this->StudentApplicationm->emmergancyContact($applicationId);
            $this->data['courseDetails'] = $this->StudentApplicationm->courseDetails($applicationId);
            $this->data['qualifications'] = $this->StudentApplicationm->qualifications($applicationId);
            $this->data['experience'] = $this->StudentApplicationm->workExperience($applicationId);
//            $this->data['languageProficiency'] = $this->StudentApplicationm->languageProficiency($applicationId);
            $this->data['languageProficiencyTestScore'] = $this->StudentApplicationm->languageProficiencyTestScore();
            $this->data['personalstatement'] = $this->StudentApplicationm->personalStatement($applicationId);
            $this->data['finance'] = $this->StudentApplicationm->finance($applicationId);
            $this->data['referees'] = $this->StudentApplicationm->referees($applicationId);
            //$this->data['personalstatement'] = $this->StudentApplicationm->personalStatement($applicationId);

            //$this->data['languageProficiencyTestScore'] = $this->StudentApplicationm->languageProficiencyTestScore($applicationId);
            $html=$this->load->view('Admin/detailsForms', $this->data,true);

            $filename = 'testPdf';
            $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');

        }

        else{
            redirect('Admin/Login');
        }
    }

    ///////////////////////////////sakib//////////////////

    public function ApplicationDetails()
    {

        //$applicationId = $this->input->post();
        $applicationId = 4;

        $this->data['personalDetails'] = $this->StudentApplicationm->personalDetails($applicationId);
        $this->data['contactDetails'] = $this->StudentApplicationm->contactDetails($applicationId);
        $this->data['emmergencyContact'] = $this->StudentApplicationm->emmergancyContact($applicationId);
        $this->data['courseDetails'] = $this->StudentApplicationm->courseDetails($applicationId);
        $this->data['qualifications'] = $this->StudentApplicationm->qualifications($applicationId);
        $this->data['experience'] = $this->StudentApplicationm->workExperience($applicationId);
        $this->data['languageProficiency'] = $this->StudentApplicationm->languageProficiency($applicationId);
        $this->data['languageProficiencyTestScore'] = $this->StudentApplicationm->languageProficiencyTestScore();
        $this->data['personalstatement'] = $this->StudentApplicationm->personalStatement($applicationId);
        $this->data['finance'] = $this->StudentApplicationm->finance($applicationId);
        $this->data['referees'] = $this->StudentApplicationm->referees($applicationId);
        //$this->data['personalstatement'] = $this->StudentApplicationm->personalStatement($applicationId);

        //$this->data['languageProficiencyTestScore'] = $this->StudentApplicationm->languageProficiencyTestScore($applicationId);
        $this->load->view('Admin/detailsForms', $this->data);
    }
    /////////////////////////////////////////////////////
}