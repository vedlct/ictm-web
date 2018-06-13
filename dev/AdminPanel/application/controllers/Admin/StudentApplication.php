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

    /* for edit application */

    public function viewApplication($applicationId) // for selected Application view
    {
        if ($this->session->userdata('type') == USER_TYPE[0])
        {
            $dataSession = [
                'studentApplicationId' => $applicationId,
            ];

            $this->session->set_userdata($dataSession);

            $studentApplicationId=$applicationId;
            $this->data['courseInfo'] = $this->StudentApplicationm->getCourseInfo();
            $this->data['candidateInfos'] = $this->StudentApplicationm->getCandidateInfo($studentApplicationId);
            $this->load->view('StudentApplicationForms/application-formv', $this->data);


        }

        else{
            redirect('Admin/Login');
        }
    }

    public function getCourseAwardBody() // get Award body of selected course
    {

        $courseId=$this->input->post('courseId');
        $this->data['courseAwardBody']=$this->StudentApplicationm->getCourseAwardBody($courseId);
        foreach ($this->data['courseAwardBody'] as $awardBody){

            $body=$awardBody->awardingBody;
        }

        echo $body;

    }

    public function editApplicationForm1(){


        if ($this->session->userdata('loggedin') == "true") {
            $this->load->library('form_validation');
            if (!$this->form_validation->run('checkApplicationForm1')) {


                $this->data['courseInfo']=$this->StudentApplicationm->getCourseInfo();

                $this->data['candidateInfos'] = $this->StudentApplicationm->getCandidateInfo($this->session->userdata('studentApplicationId'));
                $this->load->view('application-formv', $this->data);
            }
            else {
                $candidateTitle = $this->input->post("title");
                $candidateFirstName = $this->input->post("firstName");
                $candidateSurName = $this->input->post("surName");
//                $candidateOtherNamee = $this->input->post("otherName");
                $candidateDob = date('Y-m-d',strtotime($this->input->post("dob")));
                $candidateGender = $this->input->post("gender");
                $candidatePlaceOfBirth = $this->input->post("placeOfBirth");
                $candidateNationality = $this->input->post("nationality");
                $candidatePassportNo = $this->input->post("passportNo");
                $candidatePassportExpiryDate = date('Y-m-d',strtotime($this->input->post("passportExpiryDate")));
                $candidateUkEntryDate = date('Y-m-d',strtotime($this->input->post("UkEntryDate")));
                $candidateVisaType = $this->input->post("VisaType");
                $candidateVisaExpiryDate = date('Y-m-d',strtotime($this->input->post("visaExpiryDate")));
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

                $this->data['error']=$this->StudentApplicationm->editApplyForm1($data,$data1);

                //  print_r($this->session->userdata('studentApplicationId'));


                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                    redirect('Admin/StudentApplication/viewApplication/'.$this->session->userdata('studentApplicationId'));

                } else {


                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/StudentApplication/viewApplication/'.$this->session->userdata('studentApplicationId'));

                }

            }
        }
        else {
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }

    }

    public function editApplicationForm1AndNext(){

        if ($this->session->userdata('loggedin') == "true") {
            $this->load->library('form_validation');
            if (!$this->form_validation->run('checkApplicationForm1')) {

                $this->data['courseInfo']=$this->StudentApplicationm->getCourseInfo();

                $this->data['candidateInfos'] = $this->StudentApplicationm->getCandidateInfo($this->session->userdata('studentApplicationId'));
                $this->load->view('application-formv', $this->data);
            }
            else {
                $candidateTitle = $this->input->post("title");
                $candidateFirstName = $this->input->post("firstName");
                $candidateSurName = $this->input->post("surName");
                $candidateOtherNamee = $this->input->post("otherName");
                $candidateDob = date('Y-m-d',strtotime($this->input->post("dob")));
                $candidateGender = $this->input->post("gender");
                $candidatePlaceOfBirth = $this->input->post("placeOfBirth");
                $candidateNationality = $this->input->post("nationality");
                $candidatePassportNo = $this->input->post("passportNo");
                $candidatePassportExpiryDate = date('Y-m-d',strtotime($this->input->post("passportExpiryDate")));
                $candidateUkEntryDate = date('Y-m-d',strtotime($this->input->post("UkEntryDate")));
                $candidateVisaType = $this->input->post("VisaType");
                $candidateVisaExpiryDate = date('Y-m-d',strtotime($this->input->post("visaExpiryDate")));
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
                $this->data['error']=$this->StudentApplicationm->editApplyForm1($data,$data1);

                if (empty($this->data['error'])) {


                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');

                    redirect('Admin/StudentApplication/viewApplication/'.$this->session->userdata('studentApplicationId'));

                } else {


                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');

                    redirect('Admin/StudentApplication/viewApplication/'.$this->session->userdata('studentApplicationId'));

                }


            }
        }
        else {
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }

    }

    public function editStudentApplicationQualification() // go to the apply page of selected course
    {
        if ($this->session->userdata('loggedin') == "true") {

            $applicationId = $this->session->userdata('studentApplicationId');
            $this->data['qualification'] = $this->StudentApplicationm->getQualifications($applicationId);
            $this->load->view('StudentApplicationForms/application-form2v', $this->data);

        }
        else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }

    }

    public function EditPersonalQualification()
    {
        $qualificationId = $this->input->post("id");
        $data = $this->StudentApplicationm->getQualificationsDetails($qualificationId);

        echo  json_encode($data);
    }

    public function DeletePersonalQualification()
    {

        $qualificationId = $this->input->post("id");
        $data = $this->StudentApplicationm->deleteQualifications($qualificationId);
        $this->session->set_flashdata('successMessage', 'Qualification Deleted Successfully');


    }

    public function editORInsertApplicationForm2() // edit OR Insert Application Form2
    {
        if ($this->session->userdata('loggedin') == "true") {

            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfromQualification')) {

                $applicationId = $this->session->userdata('studentApplicationId');
                $this->data['qualification'] = $this->StudentApplicationm->getQualifications($applicationId);
                $this->load->view('StudentApplicationForms/application-form2v', $this->data);


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
                $completionYear = date('Y',strtotime($this->input->post("completionYear")));

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

                    $this->StudentApplicationm->editQualificationsDetailsById($qualificationId, $data);
                    $this->session->set_flashdata('successMessage', 'Qualification Edited Successfully');

                    redirect('Admin/StudentApplication/editStudentApplicationQualification');
                } else {

                    $data2 = array(
                        'fkApplicationId' => $this->session->userdata('studentApplicationId'),
                    );
                    $data = array_merge($data, $data2);
                    $this->StudentApplicationm->insertQualificationsDetailsFromEdit($data);
                    $this->session->set_flashdata('successMessage', 'Qualification Added Successfully');

                    redirect('Admin/StudentApplication/editStudentApplicationQualification');

                }
            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }

    }

    public function editORInsertApplicationForm2AndNext() // edit OR Insert Application Form2 And Next
    {
        if ($this->session->userdata('loggedin') == "true") {

            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfromQualification')) {

                $applicationId = $this->session->userdata('studentApplicationId');
                $this->data['qualification'] = $this->StudentApplicationm->getQualifications($applicationId);
                $this->load->view('StudentApplicationForms/application-form2v', $this->data);

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
                $completionYear = date('Y',strtotime($this->input->post("completionYear")));

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

                    $this->StudentApplicationm->editQualificationsDetailsById($qualificationId, $data);
                    $this->session->set_flashdata('successMessage', 'Qualification Edited Successfully');

                    redirect('Admin/StudentApplication/editStudentApplicationWorkExperience');
                } else {

                    $data2 = array(
                        'fkApplicationId' => $this->session->userdata('studentApplicationId'),
                    );
                    $data = array_merge($data, $data2);
                    $this->StudentApplicationm->insertQualificationsDetailsFromEdit($data);
                    $this->session->set_flashdata('successMessage', 'Qualification Added Successfully');

                    redirect('Admin/StudentApplication/editStudentApplicationWorkExperience');

                }
            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }

    }

    public function editStudentApplicationWorkExperience() // go to the apply page of selected course
    {

        if ($this->session->userdata('loggedin') == "true") {


            $applicationId = $this->session->userdata('studentApplicationId');
            $this->data['experience'] = $this->StudentApplicationm->getExprerience($applicationId);
            $this->load->view('StudentApplicationForms/application-form10v', $this->data);

        }else{
            echo "<script>
                        alert('Your Session has Expired ,Please Login Again');
                        window.location.href= '" . base_url() . "Admin/Login';
                        </script>";
        }



    }

    public function updateApplicationForm10(){
        if ($this->session->userdata('loggedin') == "true") {
            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfromPersonexperience')) {

                $applicationId = $this->session->userdata('studentApplicationId');
                $this->data['experience'] = $this->StudentApplicationm->getExprerience($applicationId);
                $this->load->view('StudentApplicationForms/application-form10v', $this->data);

            }else{
                $this->StudentApplicationm->applyNow10update();
                redirect('Admin/StudentApplication/editStudentApplicationWorkExperience');
            }
        }
        else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }
    }

    public function updateApplicationForm10AndNext(){
        if ($this->session->userdata('loggedin') == "true") {
            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfromPersonexperience')) {

                $applicationId = $this->session->userdata('studentApplicationId');
                $this->data['experience'] = $this->StudentApplicationm->getExprerience($applicationId);
                $this->load->view('StudentApplicationForms/application-form10v', $this->data);
            }
            else{
                $this->StudentApplicationm->applyNow10update();
                redirect('Admin/StudentApplication/editStudentApplicationEnglishLanguageProficiency');
            }
        }
        else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }
    }

    public function editStudentApplicationEnglishLanguageProficiency() // go to the apply page of selected course
    {
        if ($this->session->userdata('loggedin') == "true") {


            $applicationId = $this->session->userdata('studentApplicationId');
            $firstLanguage = $this->StudentApplicationm->getfirstLanguage($applicationId);

            if(!empty($firstLanguage)){

                foreach ( $firstLanguage as $First){
                    $this->data['fLanguage']=$First->firstLanguageEnglish;
                }

            }else{
                $this->data['fLanguage']=null;

            }

            $this->data['languagetest'] = $this->StudentApplicationm->getlanguagetest($applicationId);
            $this->load->view('StudentApplicationForms/application-form3v', $this->data);


        }else{

            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";

        }

    }

    public function EditPersonalExperience()
    {


        $experienceId = $this->input->post("id");
        $data = $this->StudentApplicationm->getExprerienceDetails($experienceId);

        echo json_encode($data);

    }

    public function DeletePersonalExperience()
    {
        $experienceId = $this->input->post("id");
        $data = $this->StudentApplicationm->deleteExperience($experienceId);
        $this->session->set_flashdata('successMessage', 'Experience Deleted Successfully');
    }

    public function updateEnglishLagugeProficiency(){
        if ($this->session->userdata('loggedin') == "true") {
            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfrom3')) {



                $applicationId = $this->session->userdata('studentApplicationId');
                $firstLanguage = $this->StudentApplicationm->getfirstLanguage($applicationId);

                if(!empty($firstLanguage)){

                    foreach ( $firstLanguage as $First){
                        $this->data['fLanguage']=$First->firstLanguageEnglish;
                    }

                }else{
                    $this->data['fLanguage']=null;

                }

                $this->data['languagetest'] = $this->StudentApplicationm->getlanguagetest($applicationId);
                $this->load->view('StudentApplicationForms/application-form3v', $this->data);

            }
            else {
                $this->data['error']=$this->StudentApplicationm->applyNow3update();

                if (empty($this->data['error'])) {


                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                    redirect('Admin/StudentApplication/editStudentApplicationEnglishLanguageProficiency');

                } else {


                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/StudentApplication/editStudentApplicationEnglishLanguageProficiency');

                }


            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }
    }
    public function editORInsertApplicationForm3AndNext(){
        if ($this->session->userdata('loggedin') == "true") {
            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfrom3')) {

                $applicationId = $this->session->userdata('studentApplicationId');
                $firstLanguage = $this->StudentApplicationm->getfirstLanguage($applicationId);

                if(!empty($firstLanguage)){

                    foreach ( $firstLanguage as $First){
                        $this->data['fLanguage']=$First->firstLanguageEnglish;
                    }

                }else{
                    $this->data['fLanguage']=null;

                }

                $this->data['languagetest'] = $this->StudentApplicationm->getlanguagetest($applicationId);
                $this->load->view('StudentApplicationForms/application-form3v', $this->data);

            }
            else {
                $this->data['error']=$this->StudentApplicationm->applyNow3update();

                if (empty($this->data['error'])) {


                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                    redirect('Admin/StudentApplication/editStudentApplicationFinance');

                } else {


                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/StudentApplication/editStudentApplicationFinance');

                }


            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }
    }

    public  function EditLanguageTest(){
        $languagetestId = $this->input->post("id");
        $data = $this->StudentApplicationm->getLanguageTestDetails($languagetestId);

        echo  json_encode($data);

    }

    public function EditLanguageTestHead(){
        $languagetestId = $this->input->post("id");
        $data = $this->StudentApplicationm->getLanguageTestHeadDetails($languagetestId);

        echo  json_encode($data);
    }

    public function DeleteLanguageProficiency(){

        $LanguageProficiencyId = $this->input->post("id");
        $data = $this->StudentApplicationm->deleteLanguageProficiency($LanguageProficiencyId);
        $this->session->set_flashdata('successMessage', 'Language Proficiency Deleted Successfully');
    }

    public function editStudentApplicationFinance()
    {
        if ($this->session->userdata('loggedin') == "true") {


            $applicationId = $this->session->userdata('studentApplicationId');

            $this->data['Financer'] = $this->StudentApplicationm->getFinancerData($applicationId);

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
                    $this->data['Financer'] = $this->StudentApplicationm->getFinancerDataFromOthers($applicationId);
                    //print_r($this->data['Financer']);
                    $this->load->view('StudentApplicationForms/application-form4v', $this->data);
                }

            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
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


                    $applicationId=$this->session->userdata('studentApplicationId');

                    $this->data['financeYes'] = $selfFinance;
                    $this->data['Financer'] = $this->StudentApplicationm->getFinancerDataFromOthers($applicationId);
                    $this->load->view('StudentApplicationForms/application-form4v', $this->data);

                }

            }

            $applicationId = $this->session->userdata('studentApplicationId');

            $this->data['Financer'] = $this->StudentApplicationm->getFinancerData($applicationId);

            foreach ($this->data['Financer'] as $Financer) {
                $finance = $Financer->sourceOfFinance;
            }

            if (empty($finance)) {

                $this->data['error'] = $this->StudentApplicationm->editORInsertApplicationForm4();

            } else {

                if ($finance == 'own') {
                    $this->data['financeYes'] = 'own';
                    $this->data['error'] = $this->StudentApplicationm->editORInsertApplicationForm4();
                } else {
                    $this->data['financeYes'] = $finance;
                    $this->data['error'] = $this->StudentApplicationm->updatApplynow4();
                }


            }


            if (empty($this->data['error'])) {


                $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                redirect('Admin/StudentApplication/editStudentApplicationFinance');


            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/StudentApplication/editStudentApplicationFinance');

            }


        }
        else{

            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
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

                    $applicationId=$this->session->userdata('studentApplicationId');

                    $this->data['financeYes'] = $selfFinance;
                    $this->data['Financer'] = $this->StudentApplicationm->getFinancerDataFromOthers($applicationId);
                    $this->load->view('StudentApplicationForms/application-form4v', $this->data);

                }

            }


            $applicationId = $this->session->userdata('studentApplicationId');

            $this->data['Financer'] = $this->StudentApplicationm->getFinancerData($applicationId);

            foreach ($this->data['Financer'] as $Financer) {
                $finance = $Financer->sourceOfFinance;
            }

            if (empty($finance)) {

                $this->data['error'] = $this->StudentApplicationm->editORInsertApplicationForm4();

            } else {

                if ($finance == 'own') {
                    $this->data['financeYes'] = 'own';
                    $this->data['error'] = $this->StudentApplicationm->editORInsertApplicationForm4();
                } else {
                    $this->data['financeYes'] = $finance;
                    $this->data['error'] = $this->StudentApplicationm->updatApplynow4();
                }


            }

            if (empty($this->data['error'])) {


                $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                redirect('Admin/StudentApplication/editStudentApplicationFinance');


            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/StudentApplication/editStudentApplicationFinance');

            }


        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }

    }

    public function insertapplyNow4()

    {

        if ($this->session->userdata('loggedin') == "true") {

            $selfFinance=$this->input->post('selfFinance');

            if ($selfFinance != 'own'){

                $this->load->library('form_validation');
                if (!$this->form_validation->run('applyfromfinance')) {

                    $applicationId=$this->session->userdata('studentApplicationId');

                    $this->data['financeYes'] = $selfFinance;
                    $this->data['Financer'] = $this->StudentApplicationm->getFinancerDataFromOthers($applicationId);

                    $this->load->view('application-form4', $this->data);

                }

            }


            $this->data['error'] = $this->StudentApplicationm->insertnewfrom4();




            if (empty($this->data['error'])) {


                $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                redirect('Admin/StudentApplication/editStudentApplicationFinance');

            } else {


                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/StudentApplication/editStudentApplicationFinance');

            }


        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }

    }


    /* for edit application end */
}