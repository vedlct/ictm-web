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
    public function newApplyFromAgent()
    {
        if ($this->session->userdata('loggedin') == "true") {

            $this->menu();
            $this->data['coursedata'] = $this->Coursem->getCourseTitle();
            $this->data['courseInfo'] = $this->Coursem->getCourseInfo();

            $this->load->view('application-form', $this->data);

        } else{

            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";

        }

    }
    public function editApplyFromAgent($id)
    {
        if ($this->session->userdata('loggedin') == "true") {

            $this->menu();
            $this->data['coursedata'] = $this->Coursem->getCourseTitle();
            $this->data['courseInfo'] = $this->Coursem->getCourseInfo();

            $dataSession = [
                'studentApplicationId' => $id,
            ];
            $this->session->set_userdata($dataSession);

            redirect('Apply');

         //   print_r($id);
          //  print_r($this->session->userdata('studentApplicationId'));

//            $this->data['candidateInfos'] = $this->ApplyOnlinem->getCandidateInfo($id);
//
//            $this->load->view('application-formv', $this->data);

        } else{

            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";

        }

    }
    public function viewForm1()
    {
        if ($this->session->userdata('loggedin') == "true") {
            $this->menu();
            $this->data['coursedata'] = $this->Coursem->getCourseTitle();
            $this->data['courseInfo'] = $this->Coursem->getCourseInfo();

            $this->data['studentApplicationId'] = $this->session->userdata('studentApplicationId');
           // print_r($this->session->userdata('studentApplicationId'));
//
            if (!empty($this->data['studentApplicationId'])){

                $studentApplicationId=$this->data['studentApplicationId'];
                $this->data['candidateInfos'] = $this->ApplyOnlinem->getCandidateInfo($studentApplicationId);
                $this->load->view('application-formv', $this->data);


            }
            else {


                $studentOrAgentId = $this->session->userdata('id');
                $type = $this->session->userdata('type');

                if ($type != 'Agent'){

                    $this->data['applicationId'] = $this->ApplyOnlinem->getApplicationId($studentOrAgentId);
                } else{
                    $this->data['applicationId']=null;
                }

                if (empty($this->data['applicationId'])) {
                    $this->load->view('application-form', $this->data);
                } else {
                    foreach ($this->data['applicationId'] as $studentApplication) {
                        $studentApplicationId = $studentApplication->id;
                        $studentApplicationSubmited = $studentApplication->isSubmited;
                    }
                    $dataSession = [
                        'studentApplicationId' => $studentApplicationId,
                    ];
                    $this->session->set_userdata($dataSession);
                    //$this->data['applicationSubmited'] = $this->ApplyOnlinem->getApplicationInfo($studentApplicationId);
                    if ($studentApplicationSubmited == '0') {

                        $this->data['candidateInfos'] = $this->ApplyOnlinem->getCandidateInfo($studentApplicationId);
                        $this->load->view('application-formv', $this->data);

                    } elseif ($studentApplicationSubmited == '1') {

                        echo "<script>
                    alert('You Have Already Submitted Your Application');
                    window.location.href= '" . base_url() . "Login';
                    </script>";

                    }

                }
            }
        }else{

            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";

        }
    }
    public function viewallFormsForAgents()
    {
        if ($this->session->userdata('loggedin') == "true") {
            $this->menu();
            $this->data['coursedata'] = $this->Coursem->getCourseTitle();
            $this->data['courseInfo'] = $this->Coursem->getCourseInfo();
            $studentOrAgentId = $this->session->userdata('id');
            $this->data['applications'] = $this->ApplyOnlinem->getApplicationInfoForAgent($studentOrAgentId);
            $this->load->view('allApplicationsForAgent', $this->data);
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }
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
//                $candidateOtherNamee = $this->input->post("otherName");
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
                $candidateCurrentAddressCountry = $this->input->post("currentAddressCountry");
                $candidateCurrentAddressPO = $this->input->post("currentAddressPO");

                //This is overseas Address ,We consider this permanent address

                $candidateOverseasHomeAddress = $this->input->post("overseasHomeAddress");
                $candidatePermanentAddressCountry = $this->input->post("permanentAddressCountry");
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
                $EmergencyContactCountry = $this->input->post("emergencyContactCountry");
                $EmergencyContactMobile = $this->input->post("EmergencyContactMobile");
                $EmergencyContactEmail = $this->input->post("EmergencyContactEmail");
                $courseName = $this->input->post("courseName");
                $awardingBody = $this->input->post("awardingBody");
                $courseLevel = $this->input->post("courseLevel");

//                $courseStartDate = $this->input->post("courseStartDate");
//                $courseEndDate = $this->input->post("courseEndDate");

                $methodeOfStudy = $this->input->post("methodeOfStudy");
                $aplicationFormid=$this->session->userdata('id').date("YmdHis");

                $courseSession = $this->input->post("courseSession");
                $courseYear = $this->input->post("courseYear");
                $timeOfStudy = $this->input->post("timeOfStudy");
                $ulnNo = $this->input->post("ulnNo");
                $ucasCourseCode = $this->input->post("ucasCourseCode");




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
//                    'otherNames'=>$candidateOtherNamee,
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
                    'currentAddressCountry'=>$candidateCurrentAddressCountry,
                    'overseasAddress'=>$candidateOverseasHomeAddress,
                    'overseasAddressPo'=>$candidateOverseasHomeAddressPO,
                    'permanentAddressCountry'=>$candidatePermanentAddressCountry,
                    'telephoneNo'=>$candidateTelephone,
                    'mobileNo'=>$candidateMobile,
                    'email'=>$candidateEmail,
                    'fax'=>$candidateFax,
                    'emergencyContactName'=>$EmergencyContactName,
                    'emergencyContactTitle'=>$EmergencyContactTitle,
                    'emergencyContactRelation'=>$EmergencyContactRelation,
                    'emergencyContactAddress'=>$EmergencyContactAddress,
                    'emergencyContactAddressPo'=>$EmergencyContactAddressPO,
                    'emergencyContactCountry'=>$EmergencyContactCountry,
                    'emergencyContactMobile'=>$EmergencyContactMobile,
                    'emergencyContactEmail'=>$EmergencyContactEmail,


                );
                $data1=array(
                    'courseName'=>$courseName,
                    'awardingBody'=>$awardingBody,
                    'courseLevel'=>$courseLevel,
//                    'courseStartDate'=>$courseStartDate,
//                    'courseEndDate'=>$courseEndDate,
                    'methodOfStudy'=>$methodeOfStudy,

                    'courseSession'=>$courseSession,
                    'courseYear'=>$courseYear,
                    'timeOfStudy'=>$timeOfStudy,
                    'ulnNo'=>$ulnNo,
                    'ucasCourseCode'=>$ucasCourseCode,
                );
                $this->data['error']=$this->ApplyOnlinem->insertApplyForm1($data,$data1);

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                    redirect('Apply');

                } else {


                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('Apply');

                }

            }
        }
        else {
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }
    }
    public function insertApplicationForm1AndNext()
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
//                $candidateOtherNamee = $this->input->post("otherName");
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
                $candidateCurrentAddressCountry = $this->input->post("currentAddressCountry");
                $candidateCurrentAddressPO = $this->input->post("currentAddressPO");

                //This is overseas Address ,We consider this permanent address

                $candidateOverseasHomeAddress = $this->input->post("overseasHomeAddress");
                $candidatePermanentAddressCountry = $this->input->post("permanentAddressCountry");
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
                $EmergencyContactCountry = $this->input->post("emergencyContactCountry");
                $EmergencyContactMobile = $this->input->post("EmergencyContactMobile");
                $EmergencyContactEmail = $this->input->post("EmergencyContactEmail");
                $courseName = $this->input->post("courseName");
                $awardingBody = $this->input->post("awardingBody");
                $courseLevel = $this->input->post("courseLevel");

//                $courseStartDate = $this->input->post("courseStartDate");
//                $courseEndDate = $this->input->post("courseEndDate");

                $methodeOfStudy = $this->input->post("methodeOfStudy");
                $aplicationFormid=$this->session->userdata('id').date("YmdHis");

                $courseSession = $this->input->post("courseSession");
                $courseYear = $this->input->post("courseYear");
                $timeOfStudy = $this->input->post("timeOfStudy");
                $ulnNo = $this->input->post("ulnNo");
                $ucasCourseCode = $this->input->post("ucasCourseCode");




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
//                    'otherNames'=>$candidateOtherNamee,
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
                    'currentAddressCountry'=>$candidateCurrentAddressCountry,
                    'overseasAddress'=>$candidateOverseasHomeAddress,
                    'overseasAddressPo'=>$candidateOverseasHomeAddressPO,
                    'permanentAddressCountry'=>$candidatePermanentAddressCountry,
                    'telephoneNo'=>$candidateTelephone,
                    'mobileNo'=>$candidateMobile,
                    'email'=>$candidateEmail,
                    'fax'=>$candidateFax,
                    'emergencyContactName'=>$EmergencyContactName,
                    'emergencyContactTitle'=>$EmergencyContactTitle,
                    'emergencyContactRelation'=>$EmergencyContactRelation,
                    'emergencyContactAddress'=>$EmergencyContactAddress,
                    'emergencyContactAddressPo'=>$EmergencyContactAddressPO,
                    'emergencyContactCountry'=>$EmergencyContactCountry,
                    'emergencyContactMobile'=>$EmergencyContactMobile,
                    'emergencyContactEmail'=>$EmergencyContactEmail,


                );
                $data1=array(
                    'courseName'=>$courseName,
                    'awardingBody'=>$awardingBody,
                    'courseLevel'=>$courseLevel,
//                    'courseStartDate'=>$courseStartDate,
//                    'courseEndDate'=>$courseEndDate,
                    'methodOfStudy'=>$methodeOfStudy,

                    'courseSession'=>$courseSession,
                    'courseYear'=>$courseYear,
                    'timeOfStudy'=>$timeOfStudy,
                    'ulnNo'=>$ulnNo,
                    'ucasCourseCode'=>$ucasCourseCode,
                );
                $this->data['error']=$this->ApplyOnlinem->insertApplyForm1($data,$data1);




                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                    redirect('ApplyForm2');

                } else {


                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('ApplyForm2');

                }
            }
        }
        else {
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }
    }

    public function applyNow2() // go to the apply page of selected course
    {
        if ($this->session->userdata('loggedin') == "true") {
            $this->menu();
            $this->data['coursedata'] = $this->Coursem->getCourseTitle();
            $applicationId = $this->session->userdata('studentApplicationId');
            $this->data['qualification'] = $this->ApplyOnlinem->getQualifications($applicationId);
            if (empty($this->data['qualification'])) {
                $this->load->view('application-form2', $this->data);
            } else {
                $this->load->view('application-form2v', $this->data);
            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }

    }
    public function applyNow3() // go to the apply page of selected course
    {
        if ($this->session->userdata('loggedin') == "true") {
            $this->menu();
            $this->data['coursedata'] = $this->Coursem->getCourseTitle();

            $applicationId = $this->session->userdata('studentApplicationId');

            $firstLanguage = $this->ApplyOnlinem->getfirstLanguage($applicationId);

            if(!empty($firstLanguage)){

                foreach ( $firstLanguage as $First){
                    $this->data['fLanguage']=$First->firstLanguageEnglish;
                }

            }else{
                $this->data['fLanguage']=null;

            }

            $this->data['languagetest'] = $this->ApplyOnlinem->getlanguagetest($applicationId);


            if (empty($this->data['languagetest'])) {
                $this->load->view('application-form3', $this->data);
            } else {
                $this->load->view('application-form3v', $this->data);
            }

        }else{

            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";

        }

    }

    public function insertApplicationForm2() // insert application form 2
    {
        if ($this->session->userdata('loggedin') == "true") {

            $this->ApplyOnlinem->applyNow2Insert();
            redirect('ApplyForm2');
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }
    }
    public function insertApplicationForm2AndNext() // insert application form 2 and go form 3
    {
        if ($this->session->userdata('loggedin') == "true") {
            $this->ApplyOnlinem->applyNow2Insert();
            redirect('Apply-Work-Experience');
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }
    }


    public function insertApplicationForm3() // insert application form 3
    {

        if ($this->session->userdata('loggedin') == "true") {
            $this->ApplyOnlinem->applyNow3Insert();
            redirect('ApplyForm3');
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }
    }
    public function insertApplicationForm3AndNext() // insert application form 3 and go form 4
    {
        if ($this->session->userdata('loggedin') == "true") {
            $this->ApplyOnlinem->applyNow3Insert();
            redirect('ApplyForm4');
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";

        }
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
//                $candidateOtherNamee = $this->input->post("otherName");
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
//                $courseStartDate = $this->input->post("courseStartDate");
//                $courseEndDate = $this->input->post("courseEndDate");
                $methodeOfStudy = $this->input->post("methodeOfStudy");

                $candidateCurrentAddressCountry = $this->input->post("currentAddressCountry");
                $candidatePermanentAddressCountry = $this->input->post("permanentAddressCountry");
                $EmergencyContactCountry = $this->input->post("emergencyContactCountry");

                $courseSession = $this->input->post("courseSession");
                $courseYear = $this->input->post("courseYear");
                $timeOfStudy = $this->input->post("timeOfStudy");
                $ulnNo = $this->input->post("ulnNo");
                $ucasCourseCode = $this->input->post("ucasCourseCode");


//                $aplicationFormid=$this->session->userdata('id').date("YmdHis");
//
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
//                    'otherNames'=>$candidateOtherNamee,
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

                    'currentAddressCountry'=>$candidateCurrentAddressCountry,
                    'permanentAddressCountry'=>$candidatePermanentAddressCountry,
                    'emergencyContactCountry'=>$EmergencyContactCountry,
                );
                $data1=array(
                    'courseName'=>$courseName,
                    'awardingBody'=>$awardingBody,
                    'courseLevel'=>$courseLevel,
//                    'courseStartDate'=>$courseStartDate,
//                    'courseEndDate'=>$courseEndDate,
                    'methodOfStudy'=>$methodeOfStudy,

                    'courseSession'=>$courseSession,
                    'courseYear'=>$courseYear,
                    'timeOfStudy'=>$timeOfStudy,
                    'ulnNo'=>$ulnNo,
                    'ucasCourseCode'=>$ucasCourseCode,

                );

                $this->data['error']=$this->ApplyOnlinem->editApplyForm1($data,$data1);

              //  print_r($this->session->userdata('studentApplicationId'));


                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                    redirect('Apply');

                } else {


                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('Apply');

                }

            }
        }
        else {
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }

    }
    public function editApplicationForm1AndNext(){

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
                $this->data['error']=$this->ApplyOnlinem->editApplyForm1($data,$data1);

                if (empty($this->data['error'])) {


                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                    redirect('ApplyForm2');

                } else {


                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('ApplyForm2');

                }


            }
        }
        else {
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }

    }

    public function editORInsertApplicationForm2() // edit OR Insert Application Form2
    {
        if ($this->session->userdata('loggedin') == "true") {

            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfromQualification')) {
                $this->menu();
                $this->data['coursedata']=$this->Coursem->getCourseTitle();

                $applicationId = $this->session->userdata('studentApplicationId');
                $this->data['qualification'] = $this->ApplyOnlinem->getQualifications($applicationId);
                if (empty($this->data['qualification'])) {
                    $this->load->view('application-form2', $this->data);
                } else {
                    $this->load->view('application-form2v', $this->data);
                }

            }else {


                $qualificationId = $this->input->post("qualificationId");
                $qualification = $this->input->post("qualification");
                $institution = $this->input->post("institution");
//            $startdate = $this->input->post("startdate");
//            $enddate = $this->input->post("enddate");
                $grade = $this->input->post("grade");


                $qualificationLevel = $this->input->post("qualificationLevel");
                $awardingBody = $this->input->post("awardingBody");
                $subject = $this->input->post("subject");
                $completionYear = $this->input->post("completionYear");

                $data = array(
                    'qualification' => $qualification,
                    'institution' => $institution,
//                'startdate' => $startdate,
//                'enddate' => $enddate,
                    'obtainResult' => $grade,
                    'qualificationLevel' => $qualificationLevel,
                    'awardingBody' => $awardingBody,
                    'subject' => $subject,
                    'completionYear' => $completionYear,
                );

                if (!empty($qualificationId)) {

                    $this->ApplyOnlinem->editQualificationsDetailsById($qualificationId, $data);
                    $this->session->set_flashdata('successMessage', 'Qualification Edited Successfully');
                    redirect('ApplyForm2');
                } else {

                    $data2 = array(
                        'fkApplicationId' => $this->session->userdata('studentApplicationId'),
                    );
                    $data = array_merge($data, $data2);
                    $this->ApplyOnlinem->insertQualificationsDetailsFromEdit($data);
                    $this->session->set_flashdata('successMessage', 'Qualification Added Successfully');
                    redirect('ApplyForm2');

                }
            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }

    }
    public function editORInsertApplicationForm2AndNext() // edit OR Insert Application Form2 And Next
    {
        if ($this->session->userdata('loggedin') == "true") {

            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfromQualification')) {
                $this->menu();
                $this->data['coursedata']=$this->Coursem->getCourseTitle();

                $applicationId = $this->session->userdata('studentApplicationId');
                $this->data['qualification'] = $this->ApplyOnlinem->getQualifications($applicationId);
                if (empty($this->data['qualification'])) {
                    $this->load->view('application-form2', $this->data);
                } else {
                    $this->load->view('application-form2v', $this->data);
                }

            }else {


                $qualificationId = $this->input->post("qualificationId");
                $qualification = $this->input->post("qualification");
                $institution = $this->input->post("institution");
//            $startdate = $this->input->post("startdate");
//            $enddate = $this->input->post("enddate");
                $grade = $this->input->post("grade");

                $qualificationLevel = $this->input->post("qualificationLevel");
                $awardingBody = $this->input->post("awardingBody");
                $subject = $this->input->post("subject");
                $completionYear = $this->input->post("completionYear");

                $data = array(
                    'qualification' => $qualification,
                    'institution' => $institution,
//                'startdate' => $startdate,
//                'enddate' => $enddate,
                    'obtainResult' => $grade,

                    'qualificationLevel' => $qualificationLevel,
                    'awardingBody' => $awardingBody,
                    'subject' => $subject,
                    'completionYear' => $completionYear,

                );

                if (!empty($qualificationId)) {

                    $this->ApplyOnlinem->editQualificationsDetailsById($qualificationId, $data);
                    $this->session->set_flashdata('successMessage', 'Qualification Edited Successfully');
                    redirect('Apply-Work-Experience');
                } else {

                    $data2 = array(
                        'fkApplicationId' => $this->session->userdata('studentApplicationId'),
                    );
                    $data = array_merge($data, $data2);
                    $this->ApplyOnlinem->insertQualificationsDetailsFromEdit($data);
                    $this->session->set_flashdata('successMessage', 'Qualification Added Successfully');
                    redirect('Apply-Work-Experience');

                }
            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
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
        if ($this->session->userdata('loggedin') == "true") {
            $this->menu();
            $this->data['coursedata'] = $this->Coursem->getCourseTitle();

            $applicationId = $this->session->userdata('studentApplicationId');

            $this->data['Financer'] = $this->ApplyOnlinem->getFinancerData($applicationId);

            foreach ($this->data['Financer'] as $Financer){
                $finance=$Financer->sourceOfFinance;
            }


            if (empty($finance)) {
                $this->data['financeYes'] = null;
                $this->load->view('application-form4', $this->data);
            } else {


                if ($finance == 'own') {
                    $this->data['financeYes'] = 'own';
                    $this->load->view('application-form4', $this->data);
                } else {
                    $this->data['financeYes'] = $finance;
                    $this->data['Financer'] = $this->ApplyOnlinem->getFinancerDataFromOthers($applicationId);
                    //print_r($this->data['Financer']);
                    $this->load->view('application-form4v', $this->data);
                }

            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }

    }

///////////////////////////////////FORM 3 ///////////////////////////////////


    public  function EditLanguageTest(){
        $languagetestId = $this->input->post("id");
        $data = $this->ApplyOnlinem->getLanguageTestDetails($languagetestId);

        echo  json_encode($data);

    }
    public function EditLanguageTestHead(){
        $languagetestId = $this->input->post("id");
        $data = $this->ApplyOnlinem->getLanguageTestHeadDetails($languagetestId);

        echo  json_encode($data);
    }

    public function editapplyNow3(){
        if ($this->session->userdata('loggedin') == "true") {
            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfrom3')) {
                $this->menu();
                $this->data['coursedata'] = $this->Coursem->getCourseTitle();

                $applicationId = $this->session->userdata('studentApplicationId');

                $this->data['languagetest'] = $this->ApplyOnlinem->getlanguagetest($applicationId);

                if (empty($this->data['languagetest'])) {
                    $this->load->view('application-form3', $this->data);
                } else {
                    $this->load->view('application-form3v', $this->data);
                }
            }
            else {
                $this->data['error']=$this->ApplyOnlinem->applyNow3update();

                if (empty($this->data['error'])) {


                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                    redirect('ApplyForm3');

                } else {


                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('ApplyForm3');

                }


            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }
    }
    public function editORInsertApplicationForm3AndNext(){
        if ($this->session->userdata('loggedin') == "true") {
            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfrom3')) {
                $this->menu();
                $this->data['coursedata'] = $this->Coursem->getCourseTitle();

                $applicationId = $this->session->userdata('studentApplicationId');

                $this->data['languagetest'] = $this->ApplyOnlinem->getlanguagetest($applicationId);

                if (empty($this->data['languagetest'])) {
                    $this->load->view('application-form3', $this->data);
                } else {
                    $this->load->view('application-form3v', $this->data);
                }
            }
            else {
                $this->data['error']=$this->ApplyOnlinem->applyNow3update();

                if (empty($this->data['error'])) {


                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                    redirect('ApplyForm4');

                } else {


                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('ApplyForm4');

                }


            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }
    }

    public function DeleteLanguageProficiency(){

        $LanguageProficiencyId = $this->input->post("id");
        $data = $this->ApplyOnlinem->deleteLanguageProficiency($LanguageProficiencyId);
        $this->session->set_flashdata('successMessage', 'Language Proficiency Deleted Successfully');
    }

/////////////////////////////////////////////////////////////////////

    public function insertapplyNow4()

    {

        if ($this->session->userdata('loggedin') == "true") {

            $selfFinance=$this->input->post('selfFinance');

            if ($selfFinance != 'own'){

                $this->load->library('form_validation');
                if (!$this->form_validation->run('applyfromfinance')) {
                    $this->menu();
                    $this->data['coursedata'] = $this->Coursem->getCourseTitle();

                    $applicationId=$this->session->userdata('studentApplicationId');

                    $this->data['financeYes'] = $selfFinance;
                    $this->data['Financer'] = $this->ApplyOnlinem->getFinancerDataFromOthers($applicationId);
                    $this->load->view('application-form4', $this->data);

                }

            }


                $this->data['error'] = $this->ApplyOnlinem->insertnewfrom4();




                    if (empty($this->data['error'])) {


                        $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                        redirect('ApplyForm4');

                    } else {


                        $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                        redirect('ApplyForm4');

                    }


        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }

    }

    public function updateInfoApply4()
    {

        if ($this->session->userdata('loggedin') == "true") {

            $selfFinance=$this->input->post('selfFinance');
            if ($selfFinance != 'own'){

                $this->load->library('form_validation');
                if (!$this->form_validation->run('applyfromfinance')) {
                    $this->menu();
                    $this->data['coursedata'] = $this->Coursem->getCourseTitle();

                    $applicationId=$this->session->userdata('studentApplicationId');

                    $this->data['financeYes'] = $selfFinance;
                    $this->data['Financer'] = $this->ApplyOnlinem->getFinancerDataFromOthers($applicationId);
                    $this->load->view('application-form4v', $this->data);

                }

            }

                $applicationId = $this->session->userdata('studentApplicationId');

                $this->data['Financer'] = $this->ApplyOnlinem->getFinancerData($applicationId);

                foreach ($this->data['Financer'] as $Financer) {
                    $finance = $Financer->sourceOfFinance;
                }

                if (empty($finance)) {

                    $this->data['error'] = $this->ApplyOnlinem->editORInsertApplicationForm4();

                } else {

                    if ($finance == 'own') {
                        $this->data['financeYes'] = 'own';
                        $this->data['error'] = $this->ApplyOnlinem->editORInsertApplicationForm4();
                    } else {
                        $this->data['financeYes'] = $finance;
                        $this->data['error'] = $this->ApplyOnlinem->updatApplynow4();
                    }


                }


                if (empty($this->data['error'])) {


                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                    redirect('ApplyForm4');


                } else {

                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('ApplyForm4');

                }


            }
            else{

            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";

        }

    }
    public function editORInsertApplicationForm4AndNext()
    {

        if ($this->session->userdata('loggedin') == "true") {

            $selfFinance=$this->input->post('selfFinance');

            if ($selfFinance != 'own'){

                $this->load->library('form_validation');
                if (!$this->form_validation->run('applyfromfinance')) {
                    $this->menu();
                    $this->data['coursedata'] = $this->Coursem->getCourseTitle();

                    $applicationId=$this->session->userdata('studentApplicationId');

                    $this->data['financeYes'] = $selfFinance;
                    $this->data['Financer'] = $this->ApplyOnlinem->getFinancerDataFromOthers($applicationId);
                    $this->load->view('application-form4v', $this->data);

                }

            }


                $applicationId = $this->session->userdata('studentApplicationId');

                $this->data['Financer'] = $this->ApplyOnlinem->getFinancerData($applicationId);

                foreach ($this->data['Financer'] as $Financer) {
                    $finance = $Financer->sourceOfFinance;
                }

                if (empty($finance)) {

                    $this->data['error'] = $this->ApplyOnlinem->editORInsertApplicationForm4();

                } else {

                    if ($finance == 'own') {
                        $this->data['financeYes'] = 'own';
                        $this->data['error'] = $this->ApplyOnlinem->editORInsertApplicationForm4();
                    } else {
                        $this->data['financeYes'] = $finance;
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


            }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }

    }

    public function applyNow5() // go to the apply page of selected course
    {
        if ($this->session->userdata('loggedin') == "true") {


            $this->menu();
            $this->data['coursedata'] = $this->Coursem->getCourseTitle();

            $applicationId=$this->session->userdata('studentApplicationId');

            $this->data['PersonalStatementData'] = $this->ApplyOnlinem->getPersonalStatementData($applicationId);


            $this->load->view('application-form5v', $this->data);


        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }

    }

    public function updateAapplyNow5()
    {

        if ($this->session->userdata('loggedin') == "true") {

            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfromPersonalStatement')) {
                $this->menu();
                $this->data['coursedata'] = $this->Coursem->getCourseTitle();

                $applicationId=$this->session->userdata('studentApplicationId');

                $this->data['PersonalStatementData'] = $this->ApplyOnlinem->getPersonalStatementData($applicationId);
                $this->load->view('application-form5v', $this->data);

            }
            else {


                $this->data['error'] = $this->ApplyOnlinem->updatApplynow5();
                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                    redirect('ApplyForm5');


                } else {

                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('ApplyForm5');

                }
            }

            }
            else{
                echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }


    }
    public function editApplicationForm5AndNext()
    {

        if ($this->session->userdata('loggedin') == "true") {

            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfromPersonalStatement')) {
                $this->menu();
                $this->data['coursedata'] = $this->Coursem->getCourseTitle();

                $applicationId=$this->session->userdata('studentApplicationId');

                $this->data['PersonalStatementData'] = $this->ApplyOnlinem->getPersonalStatementData($applicationId);
                $this->load->view('application-form5v', $this->data);

            }else {


                $this->data['error'] = $this->ApplyOnlinem->updatApplynow5();
                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                    redirect('ApplyForm6');


                } else {

                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('ApplyForm6');

                }
            }

            }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }

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

        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
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
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
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
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
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
        }else{

            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }



    }

    public function applyNow7() // go to the apply page of selected course
    {
        if ($this->session->userdata('loggedin') == "true") {
            $this->menu();

            $this->data['coursedata'] = $this->Coursem->getCourseTitle();

            $this->load->view('application-form7', $this->data);


        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
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
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
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
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
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

        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }

    }
    public function insertapplyNow8() // go to the apply page of selected course
    {
        if ($this->session->userdata('loggedin') == "true") {


            $this->data['error'] = $this->ApplyOnlinem->insertAllReferees();

            if (empty($this->data['error'])) {


                $this->session->set_flashdata('successMessage', 'Information was  Successfully save');
                redirect('ApplyForm8');


            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('ApplyForm8');

            }

        }else{

            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";

        }

    }
    public function insertApplicationForm8AndNext() // go to the apply page of selected course
    {
        if ($this->session->userdata('loggedin') == "true") {


            $this->data['error'] = $this->ApplyOnlinem->insertAllReferees();

            if (empty($this->data['error'])) {


                $this->session->set_flashdata('successMessage', 'Information was  Successfully save');
                redirect('ApplyForm9');


            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('ApplyForm9');

            }

        }else{

            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";

        }

    }

    public function EditPersonalReferees()
    {
        $refereesId = $this->input->post("id");
        $data = $this->ApplyOnlinem->getRefereesDetails($refereesId);

        echo  json_encode($data);
    }

    public function editORInsertApplicationForm8() // edit OR Insert Application Form2
    {
        if ($this->session->userdata('loggedin') == "true") {

            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfromRefrees')) {
                $this->menu();
                $this->data['coursedata'] = $this->Coursem->getCourseTitle();


                $this->data['References'] = $this->ApplyOnlinem->getAllRefences();

                if (empty($this->data['References'])) {

                    $this->load->view('application-form8', $this->data);
                } else {

                    $this->load->view('application-form8v', $this->data);
                }

            }
            else {


                $refereesId = $this->input->post("refereesId");
                $title = $this->input->post("title");
                $name = $this->input->post("name");
                $company = $this->input->post("company");
                $jobTitle = $this->input->post("jobTitle");
                $telephone = $this->input->post("telephone");
                $email = $this->input->post("email");
                $address = $this->input->post("address");
                $addressPo = $this->input->post("addressPo");
                $country = $this->input->post("country");


                $data = array(

                    'name' => $title,
                    'title' => $name,
                    'workingCompany' => $company,
                    'jobTitle' => $jobTitle,
                    'address' => $telephone,
                    'postCode' => $email,
                    'contactNo' => $address,
                    'email' => $addressPo,
                    'fkCountry' => $country,

                );

                if (!empty($refereesId)) {

                    $this->ApplyOnlinem->editRefereesDetailsById($refereesId, $data);
                    $this->session->set_flashdata('successMessage', 'Referees Edited Successfully');
                    redirect('ApplyForm8');
                } else {

                    $data2 = array(
                        'fkApplicationId' => $this->session->userdata('studentApplicationId'),
                    );
                    $data = array_merge($data, $data2);
                    $this->ApplyOnlinem->insertRefereesDetailsFromEdit($data);
                    $this->session->set_flashdata('successMessage', 'Referees Added Successfully');
                    redirect('ApplyForm8');

                }
            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }

    }
    public function editApplicationForm8AndNext() // edit OR Insert Application Form8
    {
        if ($this->session->userdata('loggedin') == "true") {

            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfromRefrees')) {
                $this->menu();
                $this->data['coursedata'] = $this->Coursem->getCourseTitle();


                $this->data['References'] = $this->ApplyOnlinem->getAllRefences();

                if (empty($this->data['References'])) {

                    $this->load->view('application-form8', $this->data);
                } else {

                    $this->load->view('application-form8v', $this->data);
                }

            }else {


                $refereesId = $this->input->post("refereesId");
                $title = $this->input->post("title");
                $name = $this->input->post("name");
                $company = $this->input->post("company");
                $jobTitle = $this->input->post("jobTitle");
                $telephone = $this->input->post("telephone");
                $email = $this->input->post("email");
                $address = $this->input->post("address");
                $addressPo = $this->input->post("addressPo");
                $country = $this->input->post("country");


                $data = array(

                    'name' => $title,
                    'title' => $name,
                    'workingCompany' => $company,
                    'jobTitle' => $jobTitle,
                    'address' => $telephone,
                    'postCode' => $email,
                    'contactNo' => $address,
                    'email' => $addressPo,
                    'fkCountry' => $country,

                );

                if (!empty($refereesId)) {

                    $this->ApplyOnlinem->editRefereesDetailsById($refereesId, $data);
                    $this->session->set_flashdata('successMessage', 'Referees Edited Successfully');
                    redirect('ApplyForm9');
                } else {

                    $data2 = array(
                        'fkApplicationId' => $this->session->userdata('studentApplicationId'),
                    );
                    $data = array_merge($data, $data2);
                    $this->ApplyOnlinem->insertRefereesDetailsFromEdit($data);
                    $this->session->set_flashdata('successMessage', 'Referees Added Successfully');
                    redirect('ApplyForm9');

                }
            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }

    }

    public function applyNow9() // go to the apply page of selected course
    {
        if ($this->session->userdata('loggedin') == "true") {
            $this->menu();

            $this->data['coursedata'] = $this->Coursem->getCourseTitle();

            $this->load->view('application-form9', $this->data);


        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }

    }




    public function insertApplyNow9() // go to the apply page of selected course
    {
        if ($this->session->userdata('loggedin') == "true") {

            $check = $this->input->post("check");
            if ($check){

                $this->data['error'] = $this->ApplyOnlinem->insertApplyForm9();

                if (empty($this->data['error'])) {


                    $this->session->set_flashdata('successMessage', 'Application Submited Successfully');
                    redirect('Login');


                } else {

                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('ApplyForm9');

                }

            }



        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }

    }

    public function applyNow10() // go to the apply page of selected course
    {

        if ($this->session->userdata('loggedin') == "true") {
            $this->menu();
            $this->data['coursedata'] = $this->Coursem->getCourseTitle();
            $applicationId = $this->session->userdata('studentApplicationId');
            $this->data['experience'] = $this->ApplyOnlinem->getExprerience($applicationId);
            if (empty($this->data['experience'])) {
                $this->load->view('application-form10', $this->data);
            } else {
                $this->load->view('application-form10v', $this->data);
            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }



    }


    public function insertApplicationForm10(){

        if ($this->session->userdata('loggedin') == "true") {


            $this->data['error'] = $this->ApplyOnlinem->insertApplyForm10();

            if (empty($this->data['error'])) {


                $this->session->set_flashdata('successMessage', 'Application Submited Successfully');
                redirect('ApplyForm9');


            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('ApplyForm9');

            }

        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }
    }
    public function insertApplicationForm10AndNext(){

        if ($this->session->userdata('loggedin') == "true") {


            $this->data['error'] = $this->ApplyOnlinem->insertApplyForm10();

            if (empty($this->data['error'])) {


                $this->session->set_flashdata('successMessage', 'Work Experience Saved  Successfully');
                redirect('ApplyForm3');


            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('ApplyForm3');

            }

        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }
    }

    public function EditPersonalExperience()
    {


        $experienceId = $this->input->post("id");
        $data = $this->ApplyOnlinem->getExprerienceDetails($experienceId);

        echo json_encode($data);

    }



    public function updateApplicationForm10(){
        if ($this->session->userdata('loggedin') == "true") {
            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfromPersonexperience')) {
                $this->menu();
                $this->data['coursedata'] = $this->Coursem->getCourseTitle();
                $applicationId = $this->session->userdata('studentApplicationId');
                $this->data['experience'] = $this->ApplyOnlinem->getExprerience($applicationId);
                if (empty($this->data['experience'])) {
                    $this->load->view('application-form10', $this->data);
                } else {
                    $this->load->view('application-form10v', $this->data);
                }
            }else{
                $this->ApplyOnlinem->applyNow10update();
                redirect('ApplyForm10');
            }
        }
        else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }
    }
    public function updateApplicationForm10AndNext(){
        if ($this->session->userdata('loggedin') == "true") {
            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfromPersonexperience')) {
                $this->menu();
                $this->data['coursedata'] = $this->Coursem->getCourseTitle();
                $applicationId = $this->session->userdata('studentApplicationId');
                $this->data['experience'] = $this->ApplyOnlinem->getExprerience($applicationId);
                if (empty($this->data['experience'])) {
                    $this->load->view('application-form10', $this->data);
                } else {
                    $this->load->view('application-form10v', $this->data);
                }
            }
            else{
                $this->ApplyOnlinem->applyNow10update();
                redirect('ApplyForm3');
            }
        }
        else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }
    }
    public function DeletePersonalExperience()
    {
        $experienceId = $this->input->post("id");
        $data = $this->ApplyOnlinem->deleteExperience($experienceId);
        $this->session->set_flashdata('successMessage', 'Experience Deleted Successfully');
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