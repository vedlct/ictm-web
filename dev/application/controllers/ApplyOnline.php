<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ApplyOnline extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menum');
        $this->load->model('CollegeInfom');
        $this->load->model('Photom');
        $this->load->model('Coursem');
        $this->load->model('ApplyOnlinem');
    }
    public function index()
    {
    }
    public function viewForm1()
    {
        $this->menu();
        $this->data['coursedata']=$this->Coursem->getCourseTitle();
        $this->data['courseInfo']=$this->Coursem->getCourseInfo();
        $studentOrAgentId=$this->session->userdata('id');
        $this->data['applicationId'] = $this->ApplyOnlinem->getApplicationId($studentOrAgentId);
        if (empty($this->data['applicationId'])) {
            $this->load->view('application-form', $this->data);
        } else {
            foreach ($this->data['applicationId'] as $studentApplication){
                $studentApplicationId= $studentApplication->id;
            }
            $dataSession = [
                'studentApplicationId' => $studentApplicationId,
            ];
            $this->session->set_userdata($dataSession);
            $this->data['candidateInfos'] = $this->ApplyOnlinem->getCandidateInfo($studentApplicationId);
            $this->load->view('application-formv', $this->data);
        }
    }
    public function viewallFormsForAgents()
    {
        $this->menu();
        $this->data['coursedata']=$this->Coursem->getCourseTitle();
        $this->data['courseInfo']=$this->Coursem->getCourseInfo();
        $studentOrAgentId=$this->session->userdata('id');
        $this->data['applications'] = $this->ApplyOnlinem->getApplicationId($studentOrAgentId);
        $this->load->view('allApplicationsForAgent', $this->data);
    }
    public function insertApplicationForm1()
    {
        if ($this->session->userdata('loggedin') == "true") {
            $this->load->library('form_validation');
            if (!$this->form_validation->run('checkApplicationForm1')) {
                $this->menu();
                $this->data['coursedata']=$this->Coursem->getCourseTitle();
                $this->data['courseInfo']=$this->Coursem->getCourseInfo();
                $this->load->view('application-form', $this->data);
            }
            else {
                $candidateTitle = $this->input->post("title");
                $candidateFirstName = $this->input->post("firstName");
                $candidateSurName = $this->input->post("surName");
                $candidateOtherNamee = $this->input->post("otherName");
                $candidateDob = $this->input->post("dob");
                $candidateGender = $this->input->post("gender");
                $candidatePlaceOfBirth = $this->input->post("placeOfBirth");
                $candidateNationality = $this->input->post("nationality");
                $candidatePassportNo = $this->input->post("passportNo");
                $candidatePassportExpiryDate = $this->input->post("passportExpiryDate");
                $candidateUkEntryDate = $this->input->post("UkEntryDate");
                $candidateVisaType = $this->input->post("VisaType");
                $candidateVisaExpiryDate = $this->input->post("visaExpiryDate");
                $candidateCurrentAddress = $this->input->post("currentAddress");
                $candidateCurrentAddressPO = $this->input->post("currentAddressPO");
                $candidateOverseasHomeAddress = $this->input->post("overseasHomeAddress");
                $candidateOverseasHomeAddressPO = $this->input->post("overseasAddressPO");
                $candidateTelephone = $this->input->post("telephone");
                $candidateMobile = $this->input->post("mobile");
                $candidateEmail = $this->input->post("email");
                $candidateFax = $this->input->post("fax");
                $EmergencyContactTitle = $this->input->post("EmergencyContactTitle");
                $EmergencyContactName = $this->input->post("EmergencyContactName");
                $EmergencyContactRelation = $this->input->post("EmergencyContactRelation");
                $EmergencyContactAddress = $this->input->post("EmergencyContactAddress");
                $EmergencyContactAddressPO = $this->input->post("EmergencyContactAddressPO");
                $EmergencyContactMobile = $this->input->post("EmergencyContactMobile");
                $EmergencyContactEmail = $this->input->post("EmergencyContactEmail");
                $courseName = $this->input->post("courseName");
                $awardingBody = $this->input->post("awardingBody");
                $courseLevel = $this->input->post("courseLevel");
                $courseStartDate = $this->input->post("courseStartDate");
                $courseEndDate = $this->input->post("courseEndDate");
                $methodeOfStudy = $this->input->post("methodeOfStudy");
                $aplicationFormid=$this->session->userdata('id').date("YmdHis");
                $data3=array(
                    'studentOrAgentId'=>$this->session->userdata('id'),
                    'studentApplicationFormId'=>$aplicationFormid
                );
                $studentApplicationId = $this->ApplyOnlinem->insertStudentApplicationForm($data3);
                $dataSession = [
                    'studentApplicationId' => $studentApplicationId,
                ];
                $this->session->set_userdata($dataSession);
                $data=array(
                    'applicationId'=>$studentApplicationId,
                    'title'=>$candidateTitle,
                    'firstName'=>$candidateFirstName,
                    'surName'=>$candidateSurName,
                    'otherNames'=>$candidateOtherNamee,
                    'dateOfBirth'=>$candidateDob,
                    'gender'=>$candidateGender,
                    'placeOfBirth'=>$candidatePlaceOfBirth,
                    'nationality'=>$candidateNationality,
                    'passportNo'=>$candidatePassportNo,
                    'passportExpiryDate'=>$candidatePassportExpiryDate,
                    'ukEntryDate'=>$candidateUkEntryDate,
                    'visaType'=>$candidateVisaType,
                    'visaExpiryDate'=>$candidateVisaExpiryDate,
                    'currentAddress'=>$candidateCurrentAddress,
                    'currentAddressPo'=>$candidateCurrentAddressPO,
                    'overseasAddress'=>$candidateOverseasHomeAddress,
                    'overseasAddressPo'=>$candidateOverseasHomeAddressPO,
                    'telephoneNo'=>$candidateTelephone,
                    'mobileNo'=>$candidateMobile,
                    'email'=>$candidateEmail,
                    'fax'=>$candidateFax,
                    'emergencyContactName'=>$EmergencyContactName,
                    'emergencyContactTitle'=>$EmergencyContactTitle,
                    'emergencyContactRelation'=>$EmergencyContactRelation,
                    'emergencyContactAddress'=>$EmergencyContactAddress,
                    'emergencyContactAddressPo'=>$EmergencyContactAddressPO,
                    'emergencyContactMobile'=>$EmergencyContactMobile,
                    'emergencyContactEmail'=>$EmergencyContactEmail,
                );
                $data1=array(
                    'courseName'=>$courseName,
                    'awardingBody'=>$awardingBody,
                    'courseLevel'=>$courseLevel,
                    'courseStartDate'=>$courseStartDate,
                    'courseEndDate'=>$courseEndDate,
                    'methodOfStudy'=>$methodeOfStudy,
                );
                $this->ApplyOnlinem->insertApplyForm1($data,$data1);
                redirect('ApplyForm2');
            }
        }
        else {
            redirect('Admin/Login');
        }
    }
    public function applyNow2() // go to the apply page of selected course
    {
        $this->menu();
        $this->data['coursedata'] = $this->Coursem->getCourseTitle();
        $applicationId=$this->session->userdata('studentApplicationId');
        $this->data['qualification'] = $this->ApplyOnlinem->getQualifications($applicationId);
        if (empty($this->data['qualification'])) {
            $this->load->view('application-form2', $this->data);
        } else {
            $this->load->view('application-form2v', $this->data);
        }
    }
    public function applyNow3() // go to the apply page of selected course
    {
        $this->menu();
        $this->data['coursedata'] = $this->Coursem->getCourseTitle();
        //$this->data['candiddata']=$this->OnlineFormsm->getCandidateinfo();
        $this->load->view('application-form3', $this->data);
    }
    public function insertApplicationForm2() // go to the apply page of selected course
    {
        $this->ApplyOnlinem->applyNow2Insert();
        redirect('ApplyForm2');
    }
    public function EditPersonalQualification()
    {
        $qualificationId = $this->input->post("id");
        $data = $this->ApplyOnlinem->getQualificationsDetails($qualificationId);

        echo  json_encode($data);
    }
    public function menu() // get all the menu + footer
    {
        $this->data['affiliation'] = $this->Menum->getAffiliations();
        $this->data['topmenu'] = $this->Menum->getTopMenu();
        $this->data['parentmenu'] = $this->Menum->getParentMenu();
        $this->data['checkparentmenu'] = $this->Menum->checkParentMenu();
        $this->data['mainmenu'] = $this->Menum->getMainMenu();
        $this->data['keyinfo'] = $this->Menum->getkeyInfoMenu();
        $this->data['quicklink'] = $this->Menum->getQuickLinksMenu();
        $this->data['implink'] = $this->Menum->getImportantLinkMenu();
        $this->data['bottom'] = $this->Menum->getBottomMenu();
        $this->data['contact'] = $this->CollegeInfom->getCollegeContact();
        $this->data['photoGalleryForFooter'] = $this->Photom->getFooterPhotoGallery();
    }
}