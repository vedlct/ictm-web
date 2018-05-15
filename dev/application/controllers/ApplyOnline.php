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

        $applicationId=$this->session->userdata('studentApplicationId');

        $this->data['languagetest'] = $this->ApplyOnlinem->getlanguagetest($applicationId);

        if (empty($this->data['languagetest'])) {
            $this->load->view('application-form3', $this->data);
        } else {
            $this->load->view('application-form3v', $this->data);
        }

    }

    public function insertApplicationForm2() // insert application form 2
    {
        $this->ApplyOnlinem->applyNow2Insert();
        redirect('ApplyForm2');
    }
    public function insertApplicationForm2AndNext() // insert application form 2 and go form 3
    {
        $this->ApplyOnlinem->applyNow2Insert();
        redirect('ApplyForm3');
    }


    public function insertApplicationForm3() // insert application form 2
    {


        $this->ApplyOnlinem->applyNow3Insert();
        redirect('ApplyForm3');
    }
    public function insertApplicationForm3AndNext() // insert application form 2 and go form 3
    {
        $this->ApplyOnlinem->applyNow3Insert();
        redirect('ApplyForm4');
    }

    public function editApplicationForm1(){

        if ($this->session->userdata('loggedin') == "true") {
            $this->load->library('form_validation');
            if (!$this->form_validation->run('checkApplicationForm1')) {
                $this->menu();
                $this->data['coursedata']=$this->Coursem->getCourseTitle();
                $this->data['courseInfo']=$this->Coursem->getCourseInfo();
                $this->data['candidateInfos'] = $this->ApplyOnlinem->getCandidateInfo($this->session->userdata('studentApplicationId'));
                $this->load->view('application-formv', $this->data);
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
               // $aplicationFormid=$this->session->userdata('id').date("YmdHis");

//                $data3=array(
//                    'studentOrAgentId'=>$this->session->userdata('id'),
//                    'studentApplicationFormId'=>$aplicationFormid
//                );
//                $studentApplicationId = $this->ApplyOnlinem->insertStudentApplicationForm($data3);
//                $dataSession = [
//                    'studentApplicationId' => $studentApplicationId,
//                ];
//                $this->session->set_userdata($dataSession);
                $data=array(
                    //'applicationId'=>$this->session->userdata('studentApplicationId'),
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
                $this->ApplyOnlinem->editApplyForm1($data,$data1);
                redirect('ApplyForm2');
            }
        }
        else {
            redirect('Admin/Login');
        }

    }

    public function editORInsertApplicationForm2() // edit OR Insert Application Form2
    {
        $qualificationId = $this->input->post("qualificationId");
        $qualification = $this->input->post("qualification");
        $institution = $this->input->post("institution");
        $startdate = $this->input->post("startdate");
        $enddate = $this->input->post("enddate");
        $grade = $this->input->post("grade");

        $data=array(
            'qualification'=>$qualification,
            'institution'=>$institution,
            'startdate'=>$startdate,
            'enddate'=>$enddate,
            'obtainResult'=>$grade,
        );

        if (!empty($qualificationId)){

            $this->ApplyOnlinem->editQualificationsDetailsById($qualificationId,$data);
            $this->session->set_flashdata('successMessage', 'Qualification Edited Successfully');
            redirect('ApplyForm2');
        }
        else{

            $data2 = array(
                'fkApplicationId' => $this->session->userdata('studentApplicationId'),
            );
            $data = array_merge($data, $data2);
            $this->ApplyOnlinem->insertQualificationsDetailsFromEdit($data);
            $this->session->set_flashdata('successMessage', 'Qualification Added Successfully');
            redirect('ApplyForm2');

        }

    }
    public function editORInsertApplicationForm2AndNext() // edit OR Insert Application Form2 And Next
    {
        $qualificationId = $this->input->post("qualificationId");
        $qualification = $this->input->post("qualification");
        $institution = $this->input->post("institution");
        $startdate = $this->input->post("startdate");
        $enddate = $this->input->post("enddate");
        $grade = $this->input->post("grade");

        $data=array(
            'qualification'=>$qualification,
            'institution'=>$institution,
            'startdate'=>$startdate,
            'enddate'=>$enddate,
            'obtainResult'=>$grade,
        );

        if (!empty($qualificationId)){

            $this->ApplyOnlinem->editQualificationsDetailsById($qualificationId,$data);
            $this->session->set_flashdata('successMessage', 'Qualification Edited Successfully');
            redirect('ApplyForm3');
        }
        else{

            $data2 = array(
                'fkApplicationId' => $this->session->userdata('studentApplicationId'),
            );
            $data = array_merge($data, $data2);
            $this->ApplyOnlinem->insertQualificationsDetailsFromEdit($data);
            $this->session->set_flashdata('successMessage', 'Qualification Added Successfully');
            redirect('ApplyForm3');

        }

    }
    public function EditPersonalQualification()
    {
        $qualificationId = $this->input->post("id");
        $data = $this->ApplyOnlinem->getQualificationsDetails($qualificationId);

        echo  json_encode($data);
    }
    public function DeletePersonalQualification()
    {
        $qualificationId = $this->input->post("id");
        $data = $this->ApplyOnlinem->deleteQualifications($qualificationId);
        $this->session->set_flashdata('successMessage', 'Qualification Deleted Successfully');

    }
    public function applyNow4() // go to the apply page of selected course
    {
        $this->menu();
        $this->data['coursedata'] = $this->Coursem->getCourseTitle();

        $applicationId=$this->session->userdata('studentApplicationId');

        $this->data['Financer'] = $this->ApplyOnlinem->getFinancerData($applicationId);

        if (empty($this->data['Financer'])) {
            $this->data['financeYes']=null;
            $this->load->view('application-form4', $this->data);
        } else {
            if ($this->data['Financer']=='y'){
                $this->data['financeYes']='y';
                $this->load->view('application-form4', $this->data);
            }else{
                $this->data['financeYes']='n';
                $this->load->view('application-form4v', $this->data);
            }

        }

    }

    public function insertapplyNow4()

    {

        if ($this->session->userdata('loggedin') == "true") {

//            $this->load->library('form_validation');
//            if (!$this->form_validation->run('applyfrom4')) {
//                $this->menu();
//                $this->data['coursedata'] = $this->Coursem->getCourseTitle();
//
//                $applicationId=$this->session->userdata('studentApplicationId');
//
//                $this->data['Financer'] = $this->ApplyOnlinem->getFinancerData($applicationId);
//
//                $this->load->view('application-form4', $this->data);
//
//            } else {

                $this->data['error'] = $this->ApplyOnlinem->insertnewfrom4();




                    if (empty($this->data['error'])) {


                        $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                        redirect('ApplyForm4');

                    } else {


                        $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                        redirect('ApplyForm4');

                    }

//            }
        }

    }

    public function updateInfoApply4()
    {

        if ($this->session->userdata('loggedin') == "true") {


            //$userId = $this->session->userdata('fkCandidateId');
//            $this->load->library('form_validation');
//            if (!$this->form_validation->run('applyfrom4')) {
//                $this->menu();
//                $this->data['apllyfrom4'] = $this->OnlineFormsm->getAllapplynow4($id);
//                $this->data['coursedata'] = $this->Coursem->getCourseTitle();
//                $this->load->view('application-form4v', $this->data);
//
//            }
//
//            else {


            $this->data['error'] = $this->ApplyOnlinem->updatApplynow4();




                if (empty($this->data['error'])) {


                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                    redirect('ApplyForm4');


                } else {

                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('ApplyForm4');

                }

            }
//        }
    }
    public function editORInsertApplicationForm4AndNext()
    {

        if ($this->session->userdata('loggedin') == "true") {


            //$userId = $this->session->userdata('fkCandidateId');
//            $this->load->library('form_validation');
//            if (!$this->form_validation->run('applyfrom4')) {
//                $this->menu();
//                $this->data['apllyfrom4'] = $this->OnlineFormsm->getAllapplynow4($id);
//                $this->data['coursedata'] = $this->Coursem->getCourseTitle();
//                $this->load->view('application-form4v', $this->data);
//
//            }
//
//            else {


            $applicationId=$this->session->userdata('studentApplicationId');

            $this->data['Financer'] = $this->ApplyOnlinem->getFinancerData($applicationId);

            if (empty($this->data['Financer'])) {

                $this->data['error'] = $this->ApplyOnlinem->editORInsertApplicationForm4();

            } else {
                if ($this->data['Financer']=='y'){
                    $this->data['error'] = $this->ApplyOnlinem->editORInsertApplicationForm4();
                }else{

                    $this->data['error'] = $this->ApplyOnlinem->updatApplynow4();
                }

            }



                if (empty($this->data['error'])) {


                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                    redirect('ApplyForm5');


                } else {

                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('ApplyForm5');

                }

            }
//        }
    }

    public function applyNow5() // go to the apply page of selected course
    {
        if ($this->session->userdata('loggedin') == "true") {


            $this->menu();
            $this->data['coursedata'] = $this->Coursem->getCourseTitle();

            $applicationId=$this->session->userdata('studentApplicationId');

            $this->data['PersonalStatementData'] = $this->ApplyOnlinem->getPersonalStatementData($applicationId);

          //  print_r($this->data['PersonalStatementData']);
            $this->load->view('application-form5v', $this->data);






        }

    }

    public function updateAapplyNow5()
    {

        if ($this->session->userdata('loggedin') == "true") {


            //$userId = $this->session->userdata('fkCandidateId');
//            $this->load->library('form_validation');
//            if (!$this->form_validation->run('applyfrom5')) {
//                $this->menu();
//                $this->data['apllyfrom5'] = $this->OnlineFormsm->getAllapplynow4($id);
//                $this->data['coursedata'] = $this->Coursem->getCourseTitle();
//                $this->load->view('application-form5v', $this->data);
//
//            } else {


                $this->data['error'] = $this->ApplyOnlinem->updatApplynow5();
                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                    redirect('ApplyForm5');


                } else {

                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('ApplyForm5');

                }

            }

//        }
    }
    public function editApplicationForm5AndNext()
    {

        if ($this->session->userdata('loggedin') == "true") {


            //$userId = $this->session->userdata('fkCandidateId');
//            $this->load->library('form_validation');
//            if (!$this->form_validation->run('applyfrom5')) {
//                $this->menu();
//                $this->data['apllyfrom5'] = $this->OnlineFormsm->getAllapplynow4($id);
//                $this->data['coursedata'] = $this->Coursem->getCourseTitle();
//                $this->load->view('application-form5v', $this->data);
//
//            } else {


                $this->data['error'] = $this->ApplyOnlinem->updatApplynow5();
                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                    redirect('ApplyForm6');


                } else {

                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('ApplyForm6');

                }

            }

//        }
    }

    public function applyNow6() // go to the apply page of selected course
    {
        if ($this->session->userdata('loggedin') == "true") {
            $this->menu();
            $this->data['coursedata'] = $this->Coursem->getCourseTitle();

            $this->data['EqualOpportunity'] = $this->ApplyOnlinem->getAllEqualOpportunity();
            $this->data['opportunityTitle']= $this->ApplyOnlinem->checkopportunityTitle();
            $this->data['opportunitySubGroupId']= $this->ApplyOnlinem->getOpportunitySubGroupId();

          //  print_r($this->data['EqualOpportunity']);


            if (empty($this->data['EqualOpportunity'])) {

                $this->load->view('application-form6', $this->data);
            } else {

                $this->load->view('application-form6v', $this->data);
            }

        }

    }

    public function insertapplyNow6()
    {
        if ($this->session->userdata('loggedin') == "true") {

            $check_list = $this->input->post('check_list');
            $check_list1 = $this->input->post('check_list1');
            $check_list2 = $this->input->post('check_list2');
            $check_list3 = $this->input->post('check_list3');


            $this->data['opportunityTitle'] = $this->ApplyOnlinem->checkopportunityTitle();
            $applicationId = $this->session->userdata('studentApplicationId');
            foreach ($this->data['opportunityTitle'] as $title) {

                if ($title->opportunityTitle == 'Ethnicity')

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list,
                        'fkApplicationId' => $applicationId,

                    );

                if ($title->opportunityTitle == 'Disability')

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list1,
                        'fkApplicationId' => $applicationId,

                    );

                if ($title->opportunityTitle == 'Religion Belief')

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list2,
                        'fkApplicationId' => $applicationId,

                    );

                if ($title->opportunityTitle == 'Sexual Orientation')

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list3,
                        'fkApplicationId' => $applicationId,

                    );


                $this->data['error'] = $this->ApplyOnlinem->insertapplyNow6personal($data1);


            }

            if (empty($this->data['error'])) {


                $this->session->set_flashdata('successMessage', 'Information was  Successfully save');
                redirect('ApplyForm6');


            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('ApplyForm6');

            }
        }


    }
    public function updatefrom6()
    {
        if ($this->session->userdata('loggedin') == "true") {


            $check_list = $this->input->post('check_list');
            $check_list1 = $this->input->post('check_list1');
            $check_list2 = $this->input->post('check_list2');
            $check_list3 = $this->input->post('check_list3');
            $Id_check_list = $this->input->post('id_check_list');
            $Id_check_list1 = $this->input->post('id_check_list1');
            $Id_check_list2 = $this->input->post('id_check_list2');
            $Id_check_list3 = $this->input->post('id_check_list3');


            $this->data['opportunityTitle'] = $this->ApplyOnlinem->checkopportunityTitle();

            foreach ($this->data['opportunityTitle'] as $title) {

                if ($title->opportunityTitle == 'Ethnicity') {

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list,


                    );
                    $id = $Id_check_list;
                }


                if ($title->opportunityTitle == 'Disability') {

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list1,


                    );
                    $id = $Id_check_list1;
                }

                if ($title->opportunityTitle == 'Religion Belief') {

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list2,


                    );
                    $id = $Id_check_list2;
                }

                if ($title->opportunityTitle == 'Sexual Orientation') {

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list3,


                    );
                    $id = $Id_check_list3;
                }


                $this->data['error'] = $this->ApplyOnlinem->updateApplyNow6personal($id, $data1);


            }

            if (empty($this->data['error'])) {


                $this->session->set_flashdata('successMessage', 'Information was  Successfully save');
                redirect('ApplyForm6');


            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('ApplyForm6');

            }
        }



    }
    public function editApplicationForm6AndNext()
    {
        if ($this->session->userdata('loggedin') == "true") {

            $check_list = $this->input->post('check_list');
            $check_list1 = $this->input->post('check_list1');
            $check_list2 = $this->input->post('check_list2');
            $check_list3 = $this->input->post('check_list3');
            $Id_check_list = $this->input->post('id_check_list');
            $Id_check_list1 = $this->input->post('id_check_list1');
            $Id_check_list2 = $this->input->post('id_check_list2');
            $Id_check_list3 = $this->input->post('id_check_list3');


            $this->data['opportunityTitle'] = $this->ApplyOnlinem->checkopportunityTitle();

            foreach ($this->data['opportunityTitle'] as $title) {

                if ($title->opportunityTitle == 'Ethnicity') {

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list,


                    );
                    $id = $Id_check_list;
                }


                if ($title->opportunityTitle == 'Disability') {

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list1,


                    );
                    $id = $Id_check_list1;
                }

                if ($title->opportunityTitle == 'Religion Belief') {

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list2,


                    );
                    $id = $Id_check_list2;
                }

                if ($title->opportunityTitle == 'Sexual Orientation') {

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list3,


                    );
                    $id = $Id_check_list3;
                }


                $this->data['error'] = $this->ApplyOnlinem->updateApplyNow6personal($id, $data1);


            }

            if (empty($this->data['error'])) {


                $this->session->set_flashdata('successMessage', 'Information was  Successfully save');
                redirect('ApplyForm7');


            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('ApplyForm7');

            }
        }



    }

    public function applyNow7() // go to the apply page of selected course
    {
        if ($this->session->userdata('loggedin') == "true") {
            $this->menu();

            $this->data['coursedata'] = $this->Coursem->getCourseTitle();

            $this->load->view('application-form7', $this->data);

            //  print_r($this->data['opportunitySubGroupId']);


//            if (empty($this->data['EqualOpportunity'])) {
//
//                $this->load->view('application-form6', $this->data);
//            } else {
//
//                $this->load->view('application-form6v', $this->data);
//            }

        }

    }

    public function insertapplyNow7()
    {

        if ($this->session->userdata('loggedin') == "true") {

            $applicatfiles = $_FILES['fileUpload']['name'];
            $applicationId = $this->session->userdata('studentApplicationId');
            $files = $_FILES;
            $data = array();
            $fileCount = 0;

            if (array_filter($applicatfiles)!=null ) {

                for ($i = 0; $i < count($applicatfiles); $i++) {

                    if ($applicatfiles[$i] != null) {


                        $_FILES['fileUpload']['name'] = $files['fileUpload']['name'][$i];
                        $_FILES['fileUpload']['type'] = $files['fileUpload']['type'][$i];
                        $_FILES['fileUpload']['tmp_name'] = $files['fileUpload']['tmp_name'][$i];
                        $_FILES['fileUpload']['error'] = $files['fileUpload']['error'][$i];
                        $_FILES['fileUpload']['size'] = $files['fileUpload']['size'][$i];

                        $this->load->library('upload');

                        $this->upload->initialize($this->set_upload_options($applicationId));

                        if (!$this->upload->do_upload('fileUpload')) {
                            $error[$i] = $this->upload->display_errors();
                            $data[$error[$i]];

                        }

                        $fileCount++;


                    } else {

                    }
                }

                if (empty($data)) {


                    $this->session->set_flashdata('successMessage', $fileCount . ' are uploaded Successfully');
                    redirect('ApplyForm7');


                } else {

                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('ApplyForm7');

                }

            }else{

                $this->session->set_flashdata('errorMessage', 'There was no files for Upload');
                redirect('ApplyForm7');

            }
        }
    }
    public function editApplicationForm7AndNext()
    {

        if ($this->session->userdata('loggedin') == "true") {

            $applicatfiles = $_FILES['fileUpload']['name'];
            $applicationId = $this->session->userdata('studentApplicationId');
            $files = $_FILES;
            $data = array();
            $fileCount = 0;

            if (array_filter($applicatfiles)!=null ) {

                for ($i = 0; $i < count($applicatfiles); $i++) {

                    if ($applicatfiles[$i] != null) {


                        $_FILES['fileUpload']['name'] = $files['fileUpload']['name'][$i];
                        $_FILES['fileUpload']['type'] = $files['fileUpload']['type'][$i];
                        $_FILES['fileUpload']['tmp_name'] = $files['fileUpload']['tmp_name'][$i];
                        $_FILES['fileUpload']['error'] = $files['fileUpload']['error'][$i];
                        $_FILES['fileUpload']['size'] = $files['fileUpload']['size'][$i];

                        $this->load->library('upload');

                        $this->upload->initialize($this->set_upload_options($applicationId));

                        if (!$this->upload->do_upload('fileUpload')) {
                            $error[$i] = $this->upload->display_errors();
                            $data[$error[$i]];

                        }

                        $fileCount++;


                    } else {

                    }
                }

                if (empty($data)) {


                    $this->session->set_flashdata('successMessage', $fileCount . ' are uploaded Successfully');
                    redirect('ApplyForm8');


                } else {

                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('ApplyForm8');

                }

            }else{

                $this->session->set_flashdata('errorMessage', 'There was no files for Upload');
                redirect('ApplyForm7');

            }
        }
    }

    //upload an image options
    private function set_upload_options($applicationId)
    {

        $config = array();
        $config['upload_path'] = 'AdminPanel/studentApplications/'.$applicationId."/";
        $config['allowed_types'] = 'jpg|jpeg|gif|png|xlsx|pdf|doc|docx|xls|xlsx';

        $config['overwrite'] = true;
        //  $config['file_name'] = $photoId;

        return $config;
    }

    public function applyNow8() // go to the apply page of selected course
    {
        if ($this->session->userdata('loggedin') == "true") {
            $this->menu();

            $this->data['coursedata'] = $this->Coursem->getCourseTitle();

            $this->data['References'] = $this->ApplyOnlinem->getAllRefences();


            if (empty($this->data['References'])) {

                $this->load->view('application-form8', $this->data);
            } else {

                $this->load->view('application-form8v', $this->data);
            }

        }

    }
    public function insertapplyNow8() // go to the apply page of selected course
    {
        if ($this->session->userdata('loggedin') == "true") {


           // $this->data['error'] = $this->ApplyOnlinem->insertAllReferees();

            


//            if (empty($this->data['References'])) {
//
//                $this->load->view('application-form8', $this->data);
//            } else {
//
//                $this->load->view('application-form8v', $this->data);
//            }

        }

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