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
		$this->load->model('StudentApplicationPdfm');

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
	public function userProfile()
	{
		if ($this->session->userdata('loggedin') == "true") {

			$this->menu();
			$this->data['coursedata'] = $this->Coursem->getCourseTitle();
			$this->data['courseInfo'] = $this->Coursem->getCourseInfo();
			$studentOrAgentId = $this->session->userdata('id');
			$this->data['applications'] = $this->ApplyOnlinem->getUserInfo($studentOrAgentId);
			$this->load->view('UserAllInfo', $this->data);

		} else{

			echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";

		}

	}
	public function editUserInfo($id)
	{
		if ($this->session->userdata('loggedin') == "true") {

			$title = $this->input->post('title');
			$firstname = $this->input->post('firstname');
			$surname = $this->input->post('surname');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$confirmpassword = $this->input->post('confirmpassword');

			if ($password == $confirmpassword){

				$data = array(

					'title' => $title,
					'firstname' => $firstname,
					'surname' => $surname,
					'email' => $email,
					'password' => $password,


				);

				$this->data['error'] = $this->ApplyOnlinem->updateUserInfo($data,$id);

				if (empty($this->data['error'])) {

					$this->session->set_flashdata('successMessage', 'Information Updated  Successfully');
					redirect('ApplyOnline/userProfile');

				} else {


					$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
					redirect('ApplyOnline/userProfile');

				}

			}

		} else{

			echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";

		}

	}
	public function newApplyFromStudents()
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
	public function editApplyFromStudents($id)
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


		} else{

			echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";

		}

	}
	public function editApplyFromAgents($id)
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

				//print_r($this->data['candidateInfos']);
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
                    window.location.href= '" . base_url() . "Login/logout';
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
	public function viewallFormsForStudents()
	{
		if ($this->session->userdata('loggedin') == "true") {
			$this->menu();
			$this->data['coursedata'] = $this->Coursem->getCourseTitle();
			$this->data['courseInfo'] = $this->Coursem->getCourseInfo();
			$studentOrAgentId = $this->session->userdata('id');
			$this->data['applications'] = $this->ApplyOnlinem->getApplicationInfoForStudens($studentOrAgentId);
			$this->load->view('allApplicationsForStudents', $this->data);
		}else{
			echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
		}
	}
	public function userApplications()
	{
		if ($this->session->userdata('loggedin') == "true") {

			$this->menu();
			$this->data['coursedata'] = $this->Coursem->getCourseTitle();
			$this->data['courseInfo'] = $this->Coursem->getCourseInfo();

			$studentOrAgentType = $this->session->userdata('type');

			if ($studentOrAgentType == 'Student'){
				redirect('AllFormForStudents');
			}elseif ($studentOrAgentType == 'Agent'){
				redirect('AllFormForAgents');
			}

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
				$dobyear = $this->input->post("dobyear");
				$dobmonth = $this->input->post("dobmonth")+1;
				$dobdate = $this->input->post("dobdate")+1;
				if ($dobmonth < 9){
					$dobmonth = "0".$dobmonth;
				}
				if ($dobdate < 9){
					$dobdate = "0".$dobdate;
				}
				$candidateDob = $dobyear."-".$dobmonth."-".$dobdate;
				//$candidateDob = date('Y-m-d', strtotime($this->input->post("dob")));
				$candidateGender = $this->input->post("gender");
				$candidateGenderChanged = $this->input->post("genderChange");
				$candidatePlaceOfBirth = $this->input->post("placeOfBirth");
				$candidateNationality = $this->input->post("nationality");
				$candidatePassportNo = $this->input->post("passportNo");
				$ppyear = $this->input->post("ppyear");
				$ppmonth = $this->input->post("ppmonth")+1;
				$ppdate = $this->input->post("ppdate")+1;
				if ($ppmonth < 9){
					$ppmonth = "0".$ppmonth;
				}
				if ($ppdate < 9){
					$ppdate = "0".$ppdate;
				}
				$candidatePassportExpiryDate = $ppyear."-".$ppmonth."-".$ppdate;
//            $candidatePassportExpiryDate = date('Y-m-d', strtotime($this->input->post("passportExpiryDate")));
				$ukyear = $this->input->post("ukyear");
				$ukmonth = $this->input->post("ukmonth")+1;
				$ukdate = $this->input->post("ukdate")+1;
				if ($ukmonth < 9){
					$ukmonth = "0".$ukmonth;
				}
				if ($ukdate < 9){
					$ukdate = "0".$ukdate;
				}

				$candidateUkEntryDate = $ukyear."-".$ukmonth."-".$ukdate;
//            $candidateUkEntryDate = date('Y-m-d', strtotime($this->input->post("UkEntryDate")));
				$candidateVisaType = $this->input->post("VisaType");
				$visayear = $this->input->post("visayear");
				$visamonth = $this->input->post("visamonth")+1;
				$visadate = $this->input->post("visadate")+1;
				if ($visamonth < 9){
					$visamonth = "0".$visamonth;
				}
				if ($visadate < 9){
					$visadate = "0".$visadate;
				}

				$candidateVisaExpiryDate = $visayear."-".$visamonth."-".$visadate;
//            $candidateVisaExpiryDate = date('Y-m-d', strtotime($this->input->post("visaExpiryDate")));

				$candidateCurrentAddress = $this->input->post("currentAddress");
				$candidateCurrentAddress2 = $this->input->post("currentAddress2");
				$candidateCurrentAddress3 = $this->input->post("currentAddress3");
				$candidateCurrentPostalCode = $this->input->post("currentAddressPo");
				$candidateCurrentAddressCity = $this->input->post("currentAddressCity");
				$candidateCurrentAddressState = $this->input->post("currentAddressState");
				$candidateCurrentAddressCountry = $this->input->post("currentAddressCountry");
				//  $candidateCurrentAddressPO = $this->input->post("currentAddressPO");

				//This is overseas Address ,We consider this permanent address

				//$candidateOverseasHomeAddress = $this->input->post("overseasHomeAddress");
				$candidatePermanentAddress = $this->input->post("permanentAddress");
				$candidatePermanentAddress2 = $this->input->post("permanentAddress2");
				$candidatePermanentAddress3 = $this->input->post("permanentAddress3");
				$candidatePermanentPostalCode = $this->input->post("overseasAddressPo");
				$candidatePermanentAddressCity = $this->input->post("permanentAddressCity");
				$candidatePermanentAddressState = $this->input->post("permanentAddressState");
				$candidatePermanentAddressCountry = $this->input->post("permanentAddressCountry");
				// $candidateOverseasHomeAddressPO = $this->input->post("overseasAddressPO");
				$candidateTelephone = $this->input->post("telephone");
				$candidateMobile = $this->input->post("mobile");
				$candidateEmail = $this->input->post("email");
				$candidateFax = $this->input->post("fax");
				$EmergencyContactTitle = $this->input->post("EmergencyContactTitle");
				$EmergencyContactName = $this->input->post("EmergencyContactName");
				$EmergencyContactRelation = $this->input->post("EmergencyContactRelation");

				$EmergencyContactAddress = $this->input->post("EmergencyContactAddress");
				$EmergencyContactAddress2 = $this->input->post("EmergencyContactAddress2");
				$EmergencyContactAddress3 = $this->input->post("EmergencyContactAddress3");
				$EmergencyPostalCode = $this->input->post("emergencyContactAddressPo");
				$EmergencyContactCity = $this->input->post("EmergencyContactCity");
				$EmergencyContactState = $this->input->post("EmergencyContactState");
				$EmergencyContactCountry = $this->input->post("emergencyContactCountry");

				$EmergencyContactMobile = $this->input->post("EmergencyContactMobile");
				$EmergencyContactEmail = $this->input->post("EmergencyContactEmail");
				$courseName = $this->input->post("courseName");
				$awardingBody = $this->input->post("awardingBody");
				$courseLevel = $this->input->post("courseLevel");

//                $courseStartDate = $this->input->post("courseStartDate");
//                $courseEndDate = $this->input->post("courseEndDate");

				$methodeOfStudy = $this->input->post("methodeOfStudy");
				$aplicationFormid = $this->session->userdata('id') . date("YmdHis");

				$courseSession = $this->input->post("courseSession");
				$courseYear = $this->input->post("courseYear");
				$timeOfStudy = $this->input->post("timeOfStudy");
				$ulnNo = $this->input->post("ulnNo");
				$ucasCourseCode = $this->input->post("ucasCourseCode");


				$data3 = array(
					'studentOrAgentId' => $this->session->userdata('id'),
					'studentApplicationFormId' => $aplicationFormid
				);
				$studentApplicationId = $this->ApplyOnlinem->insertStudentApplicationForm($data3);
				$dataSession = [
					'studentApplicationId' => $studentApplicationId,
				];
				$this->session->set_userdata($dataSession);
				$data = array(
					'applicationId' => $studentApplicationId,
					'title' => $candidateTitle,
					'firstName' => $candidateFirstName,
					'surName' => $candidateSurName,
//                    'otherNames'=>$candidateOtherNamee,
					'dateOfBirth' => $candidateDob,
					'gender' => $candidateGender,
					'ganderChange' => $candidateGenderChanged,
					'placeOfBirth' => $candidatePlaceOfBirth,
					'nationality' => $candidateNationality,
					'passportNo' => $candidatePassportNo,
					'passportExpiryDate' => $candidatePassportExpiryDate,
					'ukEntryDate' => $candidateUkEntryDate,
					'visaType' => $candidateVisaType,
					'visaExpiryDate' => $candidateVisaExpiryDate,
					'currentAddress' => $candidateCurrentAddress,
					'currentAddress2' => $candidateCurrentAddress2,
					'currentAddress3' => $candidateCurrentAddress3,
					'currentAddressPo'=> $candidateCurrentPostalCode,
					'currentAddressCity' => $candidateCurrentAddressCity,
					'currentAddressState' => $candidateCurrentAddressState,
					'currentAddressCountry' => $candidateCurrentAddressCountry,
					'permanentAddress' => $candidatePermanentAddress,
					'permanentAddress2' => $candidatePermanentAddress2,
					'permanentAddress3' => $candidatePermanentAddress3,
					'overseasAddressPo' => $candidatePermanentPostalCode,
					'permanentAddressCity' => $candidatePermanentAddressCity,
					'permanentAddressState' => $candidatePermanentAddressState,
					'permanentAddressCountry' => $candidatePermanentAddressCountry,
					'telephoneNo' => $candidateTelephone,
					'mobileNo' => $candidateMobile,
					'email' => $candidateEmail,
					'fax' => $candidateFax,
					'emergencyContactName' => $EmergencyContactName,
					'emergencyContactTitle' => $EmergencyContactTitle,
					'emergencyContactRelation' => $EmergencyContactRelation,
					'emergencyContactAddress' => $EmergencyContactAddress,
					'emergencyContactAddress2' => $EmergencyContactAddress2,
					'emergencyContactAddress3' => $EmergencyContactAddress3,
					'emergencyContactAddressPo' => $EmergencyPostalCode,
					'emergencyContactAddressCity' => $EmergencyContactCity,
					'emergencyContactAddressState' => $EmergencyContactState,
					'emergencyContactCountry' => $EmergencyContactCountry,
					'emergencyContactMobile' => $EmergencyContactMobile,
					'emergencyContactEmail' => $EmergencyContactEmail,

				);
				$data1 = array(
					'courseName' => $courseName,
					'awardingBody' => $awardingBody,
					'courseLevel' => $courseLevel,
//                    'courseStartDate'=>$courseStartDate,
//                    'courseEndDate'=>$courseEndDate,
					'methodOfStudy' => $methodeOfStudy,

					'courseSession' => $courseSession,
					'courseYear' => $courseYear,
					'timeOfStudy' => $timeOfStudy,
					'ulnNo' => $ulnNo,
					'ucasCourseCode' => $ucasCourseCode,
				);
				$this->data['error'] = $this->ApplyOnlinem->insertApplyForm1($data, $data1);

				if (empty($this->data['error'])) {

					$this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
					redirect('Apply');

				} else {


					$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
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
				$dobyear = $this->input->post("dobyear");
				$dobmonth = $this->input->post("dobmonth")+1;
				$dobdate = $this->input->post("dobdate")+1;
				if ($dobmonth < 9){
					$dobmonth = "0".$dobmonth;
				}
				if ($dobdate < 9){
					$dobdate = "0".$dobdate;
				}
				$candidateDob = $dobyear."-".$dobmonth."-".$dobdate;
//                $candidateDob = date('Y-m-d',strtotime($this->input->post("dob")));
				$candidateGender = $this->input->post("gender");
				$candidateGenderChanged = $this->input->post("genderChange");
				$candidatePlaceOfBirth = $this->input->post("placeOfBirth");
				$candidateNationality = $this->input->post("nationality");
				$candidatePassportNo = $this->input->post("passportNo");

				$ppyear = $this->input->post("ppyear");
				$ppmonth = $this->input->post("ppmonth")+1;
				$ppdate = $this->input->post("ppdate")+1;
				if ($ppmonth < 9){
					$ppmonth = "0".$ppmonth;
				}
				if ($ppdate < 9){
					$ppdate = "0".$ppdate;
				}
				$candidatePassportExpiryDate = $ppyear."-".$ppmonth."-".$ppdate;
//                $candidatePassportExpiryDate = date('Y-m-d',strtotime($this->input->post("passportExpiryDate")));
				$ukyear = $this->input->post("ukyear");
				$ukmonth = $this->input->post("ukmonth")+1;
				$ukdate = $this->input->post("ukdate")+1;
				if ($ukmonth < 9){
					$ukmonth = "0".$ukmonth;
				}
				if ($ukdate < 9){
					$ukdate = "0".$ukdate;
				}

				$candidateUkEntryDate = $ukyear."-".$ukmonth."-".$ukdate;
//                $candidateUkEntryDate = date('Y-m-d',strtotime($this->input->post("UkEntryDate")));
				$candidateVisaType = $this->input->post("VisaType");

				$visayear = $this->input->post("visayear");
				$visamonth = $this->input->post("visamonth")+1;
				$visadate = $this->input->post("visadate")+1;
				if ($visamonth < 9){
					$visamonth = "0".$visamonth;
				}
				if ($visadate < 9){
					$visadate = "0".$visadate;
				}

				$candidateVisaExpiryDate = $visayear."-".$visamonth."-".$visadate;
//                $candidateVisaExpiryDate = date('Y-m-d',strtotime($this->input->post("visaExpiryDate")));

				$candidateCurrentAddress = $this->input->post("currentAddress");
				$candidateCurrentAddress2 = $this->input->post("currentAddress2");
				$candidateCurrentAddress3 = $this->input->post("currentAddress3");
				$candidateCurrentPostalCode = $this->input->post("currentAddressPo");
				$candidateCurrentAddressCity = $this->input->post("currentAddressCity");
				$candidateCurrentAddressState = $this->input->post("currentAddressState");
				$candidateCurrentAddressCountry = $this->input->post("currentAddressCountry");
				$candidateCurrentAddressCountry = $this->input->post("currentAddressCountry");
				//  $candidateCurrentAddressPO = $this->input->post("currentAddressPO");

				//This is overseas Address ,We consider this permanent address

				$candidatePermanentAddress = $this->input->post("permanentAddress");
				$candidatePermanentAddress2 = $this->input->post("permanentAddress2");
				$candidatePermanentAddress3 = $this->input->post("permanentAddress3");
				$candidatePermanentPostalCode = $this->input->post("overseasAddressPo");
				$candidatePermanentAddressCity = $this->input->post("permanentAddressCity");
				$candidatePermanentAddressState = $this->input->post("permanentAddressState");
				$candidatePermanentAddressCountry = $this->input->post("permanentAddressCountry");
				// $candidateOverseasHomeAddressPO = $this->input->post("overseasAddressPO");

				$candidateTelephone = $this->input->post("telephone");
				$candidateMobile = $this->input->post("mobile");
				$candidateEmail = $this->input->post("email");
				$candidateFax = $this->input->post("fax");
				$EmergencyContactTitle = $this->input->post("EmergencyContactTitle");
				$EmergencyContactName = $this->input->post("EmergencyContactName");
				$EmergencyContactRelation = $this->input->post("EmergencyContactRelation");
				$EmergencyContactAddress = $this->input->post("EmergencyContactAddress");
				$EmergencyContactAddress2 = $this->input->post("EmergencyContactAddress2");
				$EmergencyContactAddress3 = $this->input->post("EmergencyContactAddress3");
				$EmergencyPostalCode = $this->input->post("emergencyContactAddressPo");
				$EmergencyContactCity = $this->input->post("EmergencyContactCity");
				$EmergencyContactState = $this->input->post("EmergencyContactState");
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
					'applicationId' => $studentApplicationId,
					'title' => $candidateTitle,
					'firstName' => $candidateFirstName,
					'surName' => $candidateSurName,
//                    'otherNames'=>$candidateOtherNamee,
					'dateOfBirth' => $candidateDob,
					'gender' => $candidateGender,
					'ganderChange' => $candidateGenderChanged,
					'placeOfBirth' => $candidatePlaceOfBirth,
					'nationality' => $candidateNationality,
					'passportNo' => $candidatePassportNo,
					'passportExpiryDate' => $candidatePassportExpiryDate,
					'ukEntryDate' => $candidateUkEntryDate,
					'visaType' => $candidateVisaType,
					'visaExpiryDate' => $candidateVisaExpiryDate,
					'currentAddress' => $candidateCurrentAddress,
					'currentAddress2' => $candidateCurrentAddress2,
					'currentAddress3' => $candidateCurrentAddress3,
					'currentAddressPo'=> $candidateCurrentPostalCode,
					'currentAddressCity' => $candidateCurrentAddressCity,
					'currentAddressState' => $candidateCurrentAddressState,
					'currentAddressCountry' => $candidateCurrentAddressCountry,
					'permanentAddress' => $candidatePermanentAddress,
					'permanentAddress2' => $candidatePermanentAddress2,
					'permanentAddress3' => $candidatePermanentAddress3,
					'overseasAddressPo' => $candidatePermanentPostalCode,
					'permanentAddressCity' => $candidatePermanentAddressCity,
					'permanentAddressState' => $candidatePermanentAddressState,
					'permanentAddressCountry' => $candidatePermanentAddressCountry,
					'telephoneNo' => $candidateTelephone,
					'mobileNo' => $candidateMobile,
					'email' => $candidateEmail,
					'fax' => $candidateFax,
					'emergencyContactName' => $EmergencyContactName,
					'emergencyContactTitle' => $EmergencyContactTitle,
					'emergencyContactRelation' => $EmergencyContactRelation,
					'emergencyContactAddress' => $EmergencyContactAddress,
					'emergencyContactAddress2' => $EmergencyContactAddress2,
					'emergencyContactAddress3' => $EmergencyContactAddress3,
					'emergencyContactAddressPo' => $EmergencyPostalCode,
					'emergencyContactAddressCity' => $EmergencyContactCity,
					'emergencyContactAddressState' => $EmergencyContactState,
					'emergencyContactCountry' => $EmergencyContactCountry,
					'emergencyContactMobile' => $EmergencyContactMobile,
					'emergencyContactEmail' => $EmergencyContactEmail,


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


					$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
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
	public function insertApplicationForm1Save()
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
				$dobyear = $this->input->post("dobyear");
				$dobmonth = $this->input->post("dobmonth")+1;
				$dobdate = $this->input->post("dobdate")+1;
				if ($dobmonth < 9){
					$dobmonth = "0".$dobmonth;
				}
				if ($dobdate < 9){
					$dobdate = "0".$dobdate;
				}
				$candidateDob = $dobyear."-".$dobmonth."-".$dobdate;
//                $candidateDob = date('Y-m-d',strtotime($this->input->post("dob")));
				$candidateGender = $this->input->post("gender");
				$candidateGenderChanged = $this->input->post("genderChange");
				$candidatePlaceOfBirth = $this->input->post("placeOfBirth");
				$candidateNationality = $this->input->post("nationality");
				$candidatePassportNo = $this->input->post("passportNo");

				$ppyear = $this->input->post("ppyear");
				$ppmonth = $this->input->post("ppmonth")+1;
				$ppdate = $this->input->post("ppdate")+1;
				if ($ppmonth < 9){
					$ppmonth = "0".$ppmonth;
				}
				if ($ppdate < 9){
					$ppdate = "0".$ppdate;
				}
				$candidatePassportExpiryDate = $ppyear."-".$ppmonth."-".$ppdate;
//                $candidatePassportExpiryDate = date('Y-m-d',strtotime($this->input->post("passportExpiryDate")));
				$ukyear = $this->input->post("ukyear");
				$ukmonth = $this->input->post("ukmonth")+1;
				$ukdate = $this->input->post("ukdate")+1;
				if ($ukmonth < 9){
					$ukmonth = "0".$ukmonth;
				}
				if ($ukdate < 9){
					$ukdate = "0".$ukdate;
				}

				$candidateUkEntryDate = $ukyear."-".$ukmonth."-".$ukdate;
//                $candidateUkEntryDate = date('Y-m-d',strtotime($this->input->post("UkEntryDate")));
				$candidateVisaType = $this->input->post("VisaType");

				$visayear = $this->input->post("visayear");
				$visamonth = $this->input->post("visamonth")+1;
				$visadate = $this->input->post("visadate")+1;
				if ($visamonth < 9){
					$visamonth = "0".$visamonth;
				}
				if ($visadate < 9){
					$visadate = "0".$visadate;
				}

				$candidateVisaExpiryDate = $visayear."-".$visamonth."-".$visadate;
//                $candidateVisaExpiryDate = date('Y-m-d',strtotime($this->input->post("visaExpiryDate")));

				$candidateCurrentAddress = $this->input->post("currentAddress");
				$candidateCurrentAddress2 = $this->input->post("currentAddress2");
				$candidateCurrentAddress3 = $this->input->post("currentAddress3");
				$candidateCurrentPostalCode = $this->input->post("currentAddressPo");
				$candidateCurrentAddressCity = $this->input->post("currentAddressCity");
				$candidateCurrentAddressState = $this->input->post("currentAddressState");
				$candidateCurrentAddressCountry = $this->input->post("currentAddressCountry");
				$candidateCurrentAddressCountry = $this->input->post("currentAddressCountry");
				//  $candidateCurrentAddressPO = $this->input->post("currentAddressPO");

				//This is overseas Address ,We consider this permanent address

				$candidatePermanentAddress = $this->input->post("permanentAddress");
				$candidatePermanentAddress2 = $this->input->post("permanentAddress2");
				$candidatePermanentAddress3 = $this->input->post("permanentAddress3");
				$candidatePermanentPostalCode = $this->input->post("overseasAddressPo");
				$candidatePermanentAddressCity = $this->input->post("permanentAddressCity");
				$candidatePermanentAddressState = $this->input->post("permanentAddressState");
				$candidatePermanentAddressCountry = $this->input->post("permanentAddressCountry");
				// $candidateOverseasHomeAddressPO = $this->input->post("overseasAddressPO");

				$candidateTelephone = $this->input->post("telephone");
				$candidateMobile = $this->input->post("mobile");
				$candidateEmail = $this->input->post("email");
				$candidateFax = $this->input->post("fax");
				$EmergencyContactTitle = $this->input->post("EmergencyContactTitle");
				$EmergencyContactName = $this->input->post("EmergencyContactName");
				$EmergencyContactRelation = $this->input->post("EmergencyContactRelation");
				$EmergencyContactAddress = $this->input->post("EmergencyContactAddress");
				$EmergencyContactAddress2 = $this->input->post("EmergencyContactAddress2");
				$EmergencyContactAddress3 = $this->input->post("EmergencyContactAddress3");
				$EmergencyPostalCode = $this->input->post("emergencyContactAddressPo");
				$EmergencyContactCity = $this->input->post("EmergencyContactCity");
				$EmergencyContactState = $this->input->post("EmergencyContactState");
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
					'applicationId' => $studentApplicationId,
					'title' => $candidateTitle,
					'firstName' => $candidateFirstName,
					'surName' => $candidateSurName,
//                    'otherNames'=>$candidateOtherNamee,
					'dateOfBirth' => $candidateDob,
					'gender' => $candidateGender,
					'ganderChange' => $candidateGenderChanged,
					'placeOfBirth' => $candidatePlaceOfBirth,
					'nationality' => $candidateNationality,
					'passportNo' => $candidatePassportNo,
					'passportExpiryDate' => $candidatePassportExpiryDate,
					'ukEntryDate' => $candidateUkEntryDate,
					'visaType' => $candidateVisaType,
					'visaExpiryDate' => $candidateVisaExpiryDate,
					'currentAddress' => $candidateCurrentAddress,
					'currentAddress2' => $candidateCurrentAddress2,
					'currentAddress3' => $candidateCurrentAddress3,
					'currentAddressPo'=> $candidateCurrentPostalCode,
					'currentAddressCity' => $candidateCurrentAddressCity,
					'currentAddressState' => $candidateCurrentAddressState,
					'currentAddressCountry' => $candidateCurrentAddressCountry,
					'permanentAddress' => $candidatePermanentAddress,
					'permanentAddress2' => $candidatePermanentAddress2,
					'permanentAddress3' => $candidatePermanentAddress3,
					'overseasAddressPo' => $candidatePermanentPostalCode,
					'permanentAddressCity' => $candidatePermanentAddressCity,
					'permanentAddressState' => $candidatePermanentAddressState,
					'permanentAddressCountry' => $candidatePermanentAddressCountry,
					'telephoneNo' => $candidateTelephone,
					'mobileNo' => $candidateMobile,
					'email' => $candidateEmail,
					'fax' => $candidateFax,
					'emergencyContactName' => $EmergencyContactName,
					'emergencyContactTitle' => $EmergencyContactTitle,
					'emergencyContactRelation' => $EmergencyContactRelation,
					'emergencyContactAddress' => $EmergencyContactAddress,
					'emergencyContactAddress2' => $EmergencyContactAddress2,
					'emergencyContactAddress3' => $EmergencyContactAddress3,
					'emergencyContactAddressPo' => $EmergencyPostalCode,
					'emergencyContactAddressCity' => $EmergencyContactCity,
					'emergencyContactAddressState' => $EmergencyContactState,
					'emergencyContactCountry' => $EmergencyContactCountry,
					'emergencyContactMobile' => $EmergencyContactMobile,
					'emergencyContactEmail' => $EmergencyContactEmail,


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

					$this->session->set_flashdata('successMessage', 'Your application has been saved successfully, please comeback later to complete your application');
					redirect('AllFormForStudents');

				} else {


					$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
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

			foreach ( $firstLanguage as $First){
				$this->data['fLanguage']=$First->firstLanguageEnglish;
			}



			if(($this->data['fLanguage'] != null)){


				if ($this->data['fLanguage'] == 1) {

					$this->data['fLanguage']='1';
					$this->load->view('application-form3', $this->data);

				}
				else{

					$this->data['fLanguage']='0';
					$this->data['languagetest'] = $this->ApplyOnlinem->getlanguagetest($applicationId);

					$this->load->view('application-form3v', $this->data);


				}

			}

			else{
				$this->data['fLanguage']=null;
				$this->load->view('application-form3', $this->data);

			}

//            $this->data['languagetest'] = $this->ApplyOnlinem->getlanguagetest($applicationId);
//
//
//            if (empty($this->data['languagetest'])) {
//                $this->load->view('application-form3', $this->data);
//            } else {
//                $this->load->view('application-form3v', $this->data);
//            }

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
			$this->session->set_flashdata('successMessage', 'Your data save successfully');
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
			$this->session->set_flashdata('successMessage', 'Your data save successfully');
			redirect('Apply-Work-Experience');
		}else{
			echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
		}
	}
	public function insertApplicationForm2Save() // insert application form 2 and go form 3
	{
		if ($this->session->userdata('loggedin') == "true") {
			$this->ApplyOnlinem->applyNow2Insert();
			$this->session->set_flashdata('successMessage', 'Your application has been saved successfully, please comeback later to complete your application');

			redirect('AllFormForStudents');
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
			$this->data['error']=$this->ApplyOnlinem->applyNow3Insert();

			if (empty($this->data['error'])) {

				$this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
				redirect('ApplyForm3');

			} else {


				$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
				redirect('ApplyForm3');

			}


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

			$this->data['error']=$this->ApplyOnlinem->applyNow3Insert();

			if (empty($this->data['error'])) {

				$this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
				redirect('ApplyForm5');

			} else {


				$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
				redirect('ApplyForm5');

			}


		}else{
			echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";

		}
	}
	public function insertApplicationForm3Save() // insert application form 3 and go form 4
	{
		if ($this->session->userdata('loggedin') == "true") {

			$this->data['error']=$this->ApplyOnlinem->applyNow3Insert();

			if (empty($this->data['error'])) {

//                $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
//                redirect('ApplyForm5');
				$this->session->set_flashdata('successMessage', 'Your application has been saved successfully, please comeback later to complete your application');
				redirect('AllFormForStudents');


			} else {


				$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
				redirect('ApplyForm5');

			}


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
				$dobyear = $this->input->post("dobyear");
				$dobmonth = $this->input->post("dobmonth")+1;
				$dobdate = $this->input->post("dobdate")+1;
				if ($dobmonth < 9){
					$dobmonth = "0".$dobmonth;
				}
				if ($dobdate < 9){
					$dobdate = "0".$dobdate;
				}
				$candidateDob = $dobyear."-".$dobmonth."-".$dobdate;
//                $candidateDob = date('Y-m-d',strtotime($this->input->post("dob")));
				$candidateGender = $this->input->post("gender");
				$candidateGenderChanged = $this->input->post("genderChange");
				$candidatePlaceOfBirth = $this->input->post("placeOfBirth");
				$candidateNationality = $this->input->post("nationality");
				$candidatePassportNo = $this->input->post("passportNo");
				$ppyear = $this->input->post("ppyear");
				$ppmonth = $this->input->post("ppmonth")+1;
				$ppdate = $this->input->post("ppdate")+1;
				if ($ppmonth < 9){
					$ppmonth = "0".$ppmonth;
				}
				if ($ppdate < 9){
					$ppdate = "0".$ppdate;
				}
				$candidatePassportExpiryDate = $ppyear."-".$ppmonth."-".$ppdate;
//                $candidatePassportExpiryDate = date('Y-m-d',strtotime($this->input->post("passportExpiryDate")));
				$ukyear = $this->input->post("ukyear");
				$ukmonth = $this->input->post("ukmonth")+1;
				$ukdate = $this->input->post("ukdate")+1;
				if ($ukmonth < 9){
					$ukmonth = "0".$ukmonth;
				}
				if ($ukdate < 9){
					$ukdate = "0".$ukdate;
				}

				$candidateUkEntryDate = $ukyear."-".$ukmonth."-".$ukdate;
//                $candidateUkEntryDate = date('Y-m-d',strtotime($this->input->post("UkEntryDate")));
				$candidateVisaType = $this->input->post("VisaType");

				$visayear = $this->input->post("visayear");
				$visamonth = $this->input->post("visamonth")+1;
				$visadate = $this->input->post("visadate")+1;
				if ($visamonth < 9){
					$visamonth = "0".$visamonth;
				}
				if ($visadate < 9){
					$visadate = "0".$visadate;
				}

				$candidateVisaExpiryDate = $visayear."-".$visamonth."-".$visadate;
//                $candidateVisaExpiryDate = date('Y-m-d',strtotime($this->input->post("visaExpiryDate")));
				$candidateCurrentAddress = $this->input->post("currentAddress");
				$candidateCurrentAddress2 = $this->input->post("currentAddress2");
				$candidateCurrentAddress3 = $this->input->post("currentAddress3");
				$candidateCurrentPostalCode = $this->input->post("currentAddressPo");
				$candidateCurrentAddressCity = $this->input->post("currentAddressCity");
				$candidateCurrentAddressState = $this->input->post("currentAddressState");
				$candidateCurrentAddressCountry = $this->input->post("currentAddressCountry");

				$candidatePermanentAddress = $this->input->post("permanentAddress");
				$candidatePermanentAddress2 = $this->input->post("permanentAddress2");
				$candidatePermanentAddress3 = $this->input->post("permanentAddress3");
				$candidatePermanentPostalCode = $this->input->post("overseasAddressPo");
				$candidatePermanentAddressCity = $this->input->post("permanentAddressCity");
				$candidatePermanentAddressState = $this->input->post("permanentAddressState");
				$candidatePermanentAddressCountry = $this->input->post("permanentAddressCountry");

				$candidateTelephone = $this->input->post("telephone");
				$candidateMobile = $this->input->post("mobile");
				$candidateEmail = $this->input->post("email");
				$candidateFax = $this->input->post("fax");
				$EmergencyContactTitle = $this->input->post("EmergencyContactTitle");
				$EmergencyContactName = $this->input->post("EmergencyContactName");
				$EmergencyContactRelation = $this->input->post("EmergencyContactRelation");

				$EmergencyContactAddress = $this->input->post("EmergencyContactAddress");
				$EmergencyContactAddress2 = $this->input->post("EmergencyContactAddress2");
				$EmergencyContactAddress3 = $this->input->post("EmergencyContactAddress3");
				$EmergencyPostalCode = $this->input->post("emergencyContactAddressPo");
				$EmergencyContactCity = $this->input->post("EmergencyContactCity");
				$EmergencyContactState = $this->input->post("EmergencyContactState");
				$EmergencyContactCountry = $this->input->post("emergencyContactCountry");

				$EmergencyContactMobile = $this->input->post("EmergencyContactMobile");
				$EmergencyContactEmail = $this->input->post("EmergencyContactEmail");
				$courseName = $this->input->post("courseName");
				$awardingBody = $this->input->post("awardingBody");
				$courseLevel = $this->input->post("courseLevel");
//                $courseStartDate = $this->input->post("courseStartDate");
//                $courseEndDate = $this->input->post("courseEndDate");
				$methodeOfStudy = $this->input->post("methodeOfStudy");

				//  $candidateCurrentAddressCountry = $this->input->post("currentAddressCountry");
				// $candidatePermanentAddressCountry = $this->input->post("permanentAddressCountry");
				// $EmergencyContactCountry = $this->input->post("emergencyContactCountry");

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
					'ganderChange'=>$candidateGenderChanged,
					'placeOfBirth'=>$candidatePlaceOfBirth,
					'nationality'=>$candidateNationality,
					'passportNo'=>$candidatePassportNo,
					'passportExpiryDate'=>$candidatePassportExpiryDate,
					'ukEntryDate'=>$candidateUkEntryDate,
					'visaType'=>$candidateVisaType,
					'visaExpiryDate'=>$candidateVisaExpiryDate,
					'currentAddress' => $candidateCurrentAddress,
					'currentAddress2' => $candidateCurrentAddress2,
					'currentAddress3' => $candidateCurrentAddress3,
					'currentAddressPo'=> $candidateCurrentPostalCode,
					'currentAddressCity' => $candidateCurrentAddressCity,
					'currentAddressState' => $candidateCurrentAddressState,
					'currentAddressCountry' => $candidateCurrentAddressCountry,
					'permanentAddress' => $candidatePermanentAddress,
					'permanentAddress2' => $candidatePermanentAddress2,
					'permanentAddress3' => $candidatePermanentAddress3,
					'overseasAddressPo' => $candidatePermanentPostalCode,
					'permanentAddressCity' => $candidatePermanentAddressCity,
					'permanentAddressState' => $candidatePermanentAddressState,
					'permanentAddressCountry' => $candidatePermanentAddressCountry,
					'telephoneNo'=>$candidateTelephone,
					'mobileNo'=>$candidateMobile,
					'email'=>$candidateEmail,
					'fax'=>$candidateFax,
					'emergencyContactName'=>$EmergencyContactName,
					'emergencyContactTitle'=>$EmergencyContactTitle,
					'emergencyContactRelation'=>$EmergencyContactRelation,

					'emergencyContactAddress' => $EmergencyContactAddress,
					'emergencyContactAddress2' => $EmergencyContactAddress2,
					'emergencyContactAddress3' => $EmergencyContactAddress3,
					'emergencyContactAddressPo' => $EmergencyPostalCode,
					'emergencyContactAddressCity' => $EmergencyContactCity,
					'emergencyContactAddressState' => $EmergencyContactState,
					'emergencyContactCountry' => $EmergencyContactCountry,

					'emergencyContactMobile'=>$EmergencyContactMobile,
					'emergencyContactEmail'=>$EmergencyContactEmail,

					//  'currentAddressCountry'=>$candidateCurrentAddressCountry,
					//  'permanentAddressCountry'=>$candidatePermanentAddressCountry,
					//  'emergencyContactCountry'=>$EmergencyContactCountry,
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


					$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
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
//                $candidateOtherNamee = $this->input->post("otherName");
				$dobyear = $this->input->post("dobyear");
				$dobmonth = $this->input->post("dobmonth")+1;
				$dobdate = $this->input->post("dobdate")+1;
				if ($dobmonth < 9){
					$dobmonth = "0".$dobmonth;
				}
				if ($dobdate < 9){
					$dobdate = "0".$dobdate;
				}
				$candidateDob = $dobyear."-".$dobmonth."-".$dobdate;
//                $candidateDob = date('Y-m-d',strtotime($this->input->post("dob")));
				$candidateGender = $this->input->post("gender");
				$candidateGenderChanged = $this->input->post("genderChange");
				$candidatePlaceOfBirth = $this->input->post("placeOfBirth");
				$candidateNationality = $this->input->post("nationality");
				$candidatePassportNo = $this->input->post("passportNo");
				$ppyear = $this->input->post("ppyear");
				$ppmonth = $this->input->post("ppmonth")+1;
				$ppdate = $this->input->post("ppdate")+1;
				if ($ppmonth < 9){
					$ppmonth = "0".$ppmonth;
				}
				if ($ppdate < 9){
					$ppdate = "0".$ppdate;
				}
				$candidatePassportExpiryDate = $ppyear."-".$ppmonth."-".$ppdate;
//                $candidatePassportExpiryDate = date('Y-m-d',strtotime($this->input->post("passportExpiryDate")));
				$ukyear = $this->input->post("ukyear");
				$ukmonth = $this->input->post("ukmonth")+1;
				$ukdate = $this->input->post("ukdate")+1;
				if ($ukmonth < 9){
					$ukmonth = "0".$ukmonth;
				}
				if ($ukdate < 9){
					$ukdate = "0".$ukdate;
				}

				$candidateUkEntryDate = $ukyear."-".$ukmonth."-".$ukdate;
//                $candidateUkEntryDate = date('Y-m-d',strtotime($this->input->post("UkEntryDate")));
				$candidateVisaType = $this->input->post("VisaType");
				$visayear = $this->input->post("visayear");
				$visamonth = $this->input->post("visamonth")+1;
				$visadate = $this->input->post("visadate")+1;
				if ($visamonth < 9){
					$visamonth = "0".$visamonth;
				}
				if ($visadate < 9){
					$visadate = "0".$visadate;
				}

				$candidateVisaExpiryDate = $visayear."-".$visamonth."-".$visadate;
//                $candidateVisaExpiryDate = date('Y-m-d',strtotime($this->input->post("visaExpiryDate")));
				$candidateCurrentAddress = $this->input->post("currentAddress");
				$candidateCurrentAddress2 = $this->input->post("currentAddress2");
				$candidateCurrentAddress3 = $this->input->post("currentAddress2");
				$candidateCurrentPostalCode = $this->input->post("currentAddressPo");
				$candidateCurrentAddressCity = $this->input->post("currentAddressCity");
				$candidateCurrentAddressState = $this->input->post("currentAddressState");
				$candidateCurrentAddressCountry = $this->input->post("currentAddressCountry");


				$candidatePermanentAddress = $this->input->post("permanentAddress");
				$candidatePermanentAddress2 = $this->input->post("permanentAddress2");
				$candidatePermanentAddress3 = $this->input->post("permanentAddress3");
				$candidatePermanentPostalCode = $this->input->post("overseasAddressPo");
				$candidatePermanentAddressCity = $this->input->post("permanentAddressCity");
				$candidatePermanentAddressState = $this->input->post("permanentAddressState");
				$candidatePermanentAddressCountry = $this->input->post("permanentAddressCountry");

				$candidateTelephone = $this->input->post("telephone");
				$candidateMobile = $this->input->post("mobile");
				$candidateEmail = $this->input->post("email");
				$candidateFax = $this->input->post("fax");
				$EmergencyContactTitle = $this->input->post("EmergencyContactTitle");
				$EmergencyContactName = $this->input->post("EmergencyContactName");
				$EmergencyContactRelation = $this->input->post("EmergencyContactRelation");
				$EmergencyContactAddress = $this->input->post("EmergencyContactAddress");
				$EmergencyContactAddress2 = $this->input->post("EmergencyContactAddress2");
				$EmergencyContactAddress3 = $this->input->post("EmergencyContactAddress3");
				$EmergencyPostalCode = $this->input->post("emergencyContactAddressPo");
				$EmergencyContactCity = $this->input->post("EmergencyContactCity");
				$EmergencyContactState = $this->input->post("EmergencyContactState");
				$EmergencyContactCountry = $this->input->post("emergencyContactCountry");
				$EmergencyContactMobile = $this->input->post("EmergencyContactMobile");
				$EmergencyContactEmail = $this->input->post("EmergencyContactEmail");
				$courseName = $this->input->post("courseName");
				$awardingBody = $this->input->post("awardingBody");
				$courseLevel = $this->input->post("courseLevel");
//                $courseStartDate = $this->input->post("courseStartDate");
//                $courseEndDate = $this->input->post("courseEndDate");
				$methodeOfStudy = $this->input->post("methodeOfStudy");

				//    $candidateCurrentAddressCountry = $this->input->post("currentAddressCountry");
				//   $candidatePermanentAddressCountry = $this->input->post("permanentAddressCountry");
				//   $EmergencyContactCountry = $this->input->post("emergencyContactCountry");

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
					'ganderChange'=>$candidateGenderChanged,
					'placeOfBirth'=>$candidatePlaceOfBirth,
					'nationality'=>$candidateNationality,
					'passportNo'=>$candidatePassportNo,
					'passportExpiryDate'=>$candidatePassportExpiryDate,
					'ukEntryDate'=>$candidateUkEntryDate,
					'visaType'=>$candidateVisaType,
					'visaExpiryDate'=>$candidateVisaExpiryDate,
					'currentAddress' => $candidateCurrentAddress,
					'currentAddress2' => $candidateCurrentAddress2,
					'currentAddress3' => $candidateCurrentAddress3,
					'currentAddressPo'=> $candidateCurrentPostalCode,
					'currentAddressCity' => $candidateCurrentAddressCity,
					'currentAddressState' => $candidateCurrentAddressState,
					'currentAddressCountry' => $candidateCurrentAddressCountry,
					'permanentAddress' => $candidatePermanentAddress,
					'permanentAddress2' => $candidatePermanentAddress2,
					'permanentAddress3' => $candidatePermanentAddress3,
					'overseasAddressPo' => $candidatePermanentPostalCode,
					'permanentAddressCity' => $candidatePermanentAddressCity,
					'permanentAddressState' => $candidatePermanentAddressState,
					'permanentAddressCountry' => $candidatePermanentAddressCountry,
					'telephoneNo'=>$candidateTelephone,
					'mobileNo'=>$candidateMobile,
					'email'=>$candidateEmail,
					'fax'=>$candidateFax,
					'emergencyContactName'=>$EmergencyContactName,
					'emergencyContactTitle'=>$EmergencyContactTitle,
					'emergencyContactRelation'=>$EmergencyContactRelation,

					'emergencyContactAddress' => $EmergencyContactAddress,
					'emergencyContactAddress2' => $EmergencyContactAddress2,
					'emergencyContactAddress3' => $EmergencyContactAddress3,
					'emergencyContactAddressPo' => $EmergencyPostalCode,
					'emergencyContactAddressCity' => $EmergencyContactCity,
					'emergencyContactAddressState' => $EmergencyContactState,
					'emergencyContactCountry' => $EmergencyContactCountry,

					'emergencyContactMobile'=>$EmergencyContactMobile,
					'emergencyContactEmail'=>$EmergencyContactEmail,

					//  'currentAddressCountry'=>$candidateCurrentAddressCountry,
					//  'permanentAddressCountry'=>$candidatePermanentAddressCountry,
					//  'emergencyContactCountry'=>$EmergencyContactCountry,
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

				if (empty($this->data['error'])) {


					$this->session->set_flashdata('successMessage', 'Your data save successfully ');
					redirect('ApplyForm2');

				} else {


					$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
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


	public function editApplicationForm1Save(){

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
				$dobyear = $this->input->post("dobyear");
				$dobmonth = $this->input->post("dobmonth")+1;
				$dobdate = $this->input->post("dobdate")+1;
				if ($dobmonth < 9){
					$dobmonth = "0".$dobmonth;
				}
				if ($dobdate < 9){
					$dobdate = "0".$dobdate;
				}
				$candidateDob = $dobyear."-".$dobmonth."-".$dobdate;
//                $candidateDob = date('Y-m-d',strtotime($this->input->post("dob")));
				$candidateGender = $this->input->post("gender");
				$candidateGenderChanged = $this->input->post("genderChange");
				$candidatePlaceOfBirth = $this->input->post("placeOfBirth");
				$candidateNationality = $this->input->post("nationality");
				$candidatePassportNo = $this->input->post("passportNo");
				$ppyear = $this->input->post("ppyear");
				$ppmonth = $this->input->post("ppmonth")+1;
				$ppdate = $this->input->post("ppdate")+1;
				if ($ppmonth < 9){
					$ppmonth = "0".$ppmonth;
				}
				if ($ppdate < 9){
					$ppdate = "0".$ppdate;
				}
				$candidatePassportExpiryDate = $ppyear."-".$ppmonth."-".$ppdate;
//                $candidatePassportExpiryDate = date('Y-m-d',strtotime($this->input->post("passportExpiryDate")));
				$ukyear = $this->input->post("ukyear");
				$ukmonth = $this->input->post("ukmonth")+1;
				$ukdate = $this->input->post("ukdate")+1;
				if ($ukmonth < 9){
					$ukmonth = "0".$ukmonth;
				}
				if ($ukdate < 9){
					$ukdate = "0".$ukdate;
				}

				$candidateUkEntryDate = $ukyear."-".$ukmonth."-".$ukdate;
//                $candidateUkEntryDate = date('Y-m-d',strtotime($this->input->post("UkEntryDate")));
				$candidateVisaType = $this->input->post("VisaType");
				$visayear = $this->input->post("visayear");
				$visamonth = $this->input->post("visamonth")+1;
				$visadate = $this->input->post("visadate")+1;
				if ($visamonth < 9){
					$visamonth = "0".$visamonth;
				}
				if ($visadate < 9){
					$visadate = "0".$visadate;
				}

				$candidateVisaExpiryDate = $visayear."-".$visamonth."-".$visadate;
//                $candidateVisaExpiryDate = date('Y-m-d',strtotime($this->input->post("visaExpiryDate")));
				$candidateCurrentAddress = $this->input->post("currentAddress");
				$candidateCurrentAddress2 = $this->input->post("currentAddress2");
				$candidateCurrentAddress3 = $this->input->post("currentAddress2");
				$candidateCurrentPostalCode = $this->input->post("currentAddressPo");
				$candidateCurrentAddressCity = $this->input->post("currentAddressCity");
				$candidateCurrentAddressState = $this->input->post("currentAddressState");
				$candidateCurrentAddressCountry = $this->input->post("currentAddressCountry");


				$candidatePermanentAddress = $this->input->post("permanentAddress");
				$candidatePermanentAddress2 = $this->input->post("permanentAddress2");
				$candidatePermanentAddress3 = $this->input->post("permanentAddress3");
				$candidatePermanentPostalCode = $this->input->post("overseasAddressPo");
				$candidatePermanentAddressCity = $this->input->post("permanentAddressCity");
				$candidatePermanentAddressState = $this->input->post("permanentAddressState");
				$candidatePermanentAddressCountry = $this->input->post("permanentAddressCountry");

				$candidateTelephone = $this->input->post("telephone");
				$candidateMobile = $this->input->post("mobile");
				$candidateEmail = $this->input->post("email");
				$candidateFax = $this->input->post("fax");
				$EmergencyContactTitle = $this->input->post("EmergencyContactTitle");
				$EmergencyContactName = $this->input->post("EmergencyContactName");
				$EmergencyContactRelation = $this->input->post("EmergencyContactRelation");
				$EmergencyContactAddress = $this->input->post("EmergencyContactAddress");
				$EmergencyContactAddress2 = $this->input->post("EmergencyContactAddress2");
				$EmergencyContactAddress3 = $this->input->post("EmergencyContactAddress3");
				$EmergencyPostalCode = $this->input->post("emergencyContactAddressPo");
				$EmergencyContactCity = $this->input->post("EmergencyContactCity");
				$EmergencyContactState = $this->input->post("EmergencyContactState");
				$EmergencyContactCountry = $this->input->post("emergencyContactCountry");
				$EmergencyContactMobile = $this->input->post("EmergencyContactMobile");
				$EmergencyContactEmail = $this->input->post("EmergencyContactEmail");
				$courseName = $this->input->post("courseName");
				$awardingBody = $this->input->post("awardingBody");
				$courseLevel = $this->input->post("courseLevel");
//                $courseStartDate = $this->input->post("courseStartDate");
//                $courseEndDate = $this->input->post("courseEndDate");
				$methodeOfStudy = $this->input->post("methodeOfStudy");

				//    $candidateCurrentAddressCountry = $this->input->post("currentAddressCountry");
				//   $candidatePermanentAddressCountry = $this->input->post("permanentAddressCountry");
				//   $EmergencyContactCountry = $this->input->post("emergencyContactCountry");

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
					'ganderChange'=>$candidateGenderChanged,
					'placeOfBirth'=>$candidatePlaceOfBirth,
					'nationality'=>$candidateNationality,
					'passportNo'=>$candidatePassportNo,
					'passportExpiryDate'=>$candidatePassportExpiryDate,
					'ukEntryDate'=>$candidateUkEntryDate,
					'visaType'=>$candidateVisaType,
					'visaExpiryDate'=>$candidateVisaExpiryDate,
					'currentAddress' => $candidateCurrentAddress,
					'currentAddress2' => $candidateCurrentAddress2,
					'currentAddress3' => $candidateCurrentAddress3,
					'currentAddressPo'=> $candidateCurrentPostalCode,
					'currentAddressCity' => $candidateCurrentAddressCity,
					'currentAddressState' => $candidateCurrentAddressState,
					'currentAddressCountry' => $candidateCurrentAddressCountry,
					'permanentAddress' => $candidatePermanentAddress,
					'permanentAddress2' => $candidatePermanentAddress2,
					'permanentAddress3' => $candidatePermanentAddress3,
					'overseasAddressPo' => $candidatePermanentPostalCode,
					'permanentAddressCity' => $candidatePermanentAddressCity,
					'permanentAddressState' => $candidatePermanentAddressState,
					'permanentAddressCountry' => $candidatePermanentAddressCountry,
					'telephoneNo'=>$candidateTelephone,
					'mobileNo'=>$candidateMobile,
					'email'=>$candidateEmail,
					'fax'=>$candidateFax,
					'emergencyContactName'=>$EmergencyContactName,
					'emergencyContactTitle'=>$EmergencyContactTitle,
					'emergencyContactRelation'=>$EmergencyContactRelation,

					'emergencyContactAddress' => $EmergencyContactAddress,
					'emergencyContactAddress2' => $EmergencyContactAddress2,
					'emergencyContactAddress3' => $EmergencyContactAddress3,
					'emergencyContactAddressPo' => $EmergencyPostalCode,
					'emergencyContactAddressCity' => $EmergencyContactCity,
					'emergencyContactAddressState' => $EmergencyContactState,
					'emergencyContactCountry' => $EmergencyContactCountry,

					'emergencyContactMobile'=>$EmergencyContactMobile,
					'emergencyContactEmail'=>$EmergencyContactEmail,

					//  'currentAddressCountry'=>$candidateCurrentAddressCountry,
					//  'permanentAddressCountry'=>$candidatePermanentAddressCountry,
					//  'emergencyContactCountry'=>$EmergencyContactCountry,
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

				if (empty($this->data['error'])) {


					$this->session->set_flashdata('successMessage', 'Your application has been saved successfully, please comeback later to complete your application');
					redirect('AllFormForStudents');

				} else {


					$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
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
					$this->session->set_flashdata('successMessage', 'Your application has been saved successfully, please comeback later to complete your application');
					redirect('AllFormForStudents');
//                    $this->session->set_flashdata('successMessage', 'Qualification Edited Successfully');
//                    redirect('Apply-Work-Experience');

				} else {

					$data2 = array(
						'fkApplicationId' => $this->session->userdata('studentApplicationId'),
					);
					$data = array_merge($data, $data2);
					$this->ApplyOnlinem->insertQualificationsDetailsFromEdit($data);
					$this->session->set_flashdata('successMessage', 'Your application has been saved successfully, please comeback later to complete your application');
					redirect('AllFormForStudents');
//                    $this->session->set_flashdata('successMessage', 'Qualification Added Successfully');
//                    redirect('Apply-Work-Experience');

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


				if ($finance == 'own' ) {
					$this->data['financeYes'] = 'own';
					$this->load->view('application-form4', $this->data);
				}if ($finance == 'slc' ) {
					$this->data['financeYes'] = 'slc';
					$this->load->view('application-form4', $this->data);
				} else {
					$this->data['financeYes'] = $finance;
					$this->data['Financer'] = $this->ApplyOnlinem->getFinancerDataFromOthers($applicationId);

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

			$firstLanguage = $this->input->post('firstLanguage');
			$otherTab = $this->input->post('otherTab');

			if ($firstLanguage=='0'){

				if ($otherTab != '1' ) {

					$this->load->library('form_validation');
					if (!$this->form_validation->run('applyfrom3')) {

						$this->menu();
						$this->data['coursedata'] = $this->Coursem->getCourseTitle();

						$applicationId = $this->session->userdata('studentApplicationId');

						$this->data['fLanguage'] = '0';

						$this->data['languagetest'] = $this->ApplyOnlinem->getlanguagetest($applicationId);
						$this->load->view('application-form3v', $this->data);
					} else {
						$this->data['error'] = $this->ApplyOnlinem->applyNow3update();
						if (empty($this->data['error'])) {


							$this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
							redirect('ApplyForm3');

						} else {


							$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
							redirect('ApplyForm3');

						}
					}
				}else{

					$this->data['error']=$this->ApplyOnlinem->applyNow3update();

					if (empty($this->data['error'])) {


						$this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
						redirect('ApplyForm3');

					} else {


						$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
						redirect('ApplyForm3');

					}

				}

			}
			else {
				$this->data['error']=$this->ApplyOnlinem->applyNow3update();

				if (empty($this->data['error'])) {


					$this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
					redirect('ApplyForm3');

				} else {


					$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
					redirect('ApplyForm3');

				}


			}

			////////////////////////
//            $this->load->library('form_validation');
//            if (!$this->form_validation->run('applyfrom3')) {
//                $this->menu();
//                $this->data['coursedata'] = $this->Coursem->getCourseTitle();
//
//                $applicationId = $this->session->userdata('studentApplicationId');
//
//                $this->data['languagetest'] = $this->ApplyOnlinem->getlanguagetest($applicationId);
//
//                if (empty($this->data['languagetest'])) {
//                    $this->load->view('application-form3', $this->data);
//                } else {
//                    $this->load->view('application-form3v', $this->data);
//                }
//            }
//            else {
//                $this->data['error']=$this->ApplyOnlinem->applyNow3update();
//
//                if (empty($this->data['error'])) {
//
//
//                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
//                    redirect('ApplyForm3');
//
//                } else {
//
//
//                    $this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
//                    redirect('ApplyForm3');
//
//                }
//
//
//            }
		}else{
			echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
		}
	}
	public function editORInsertApplicationForm3AndNext(){

		if ($this->session->userdata('loggedin') == "true") {


			$firstLanguage = $this->input->post('firstLanguage');
			if ($firstLanguage=='0'){

				$this->load->library('form_validation');
				if (!$this->form_validation->run('applyfrom3')) {

					$this->menu();
					$this->data['coursedata'] = $this->Coursem->getCourseTitle();

					$applicationId = $this->session->userdata('studentApplicationId');

					$this->data['fLanguage']='0';

					$this->data['languagetest'] = $this->ApplyOnlinem->getlanguagetest($applicationId);
					$this->load->view('StudentApplicationForms/application-form3v', $this->data);
				}

				else {
					$this->data['error']=$this->ApplyOnlinem->applyNow3update();

					if (empty($this->data['error'])) {


//                        $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
//                        redirect('ApplyForm5');
						$this->session->set_flashdata('successMessage', 'Your application has been saved successfully, please comeback later to complete your application');
						redirect('AllFormForStudents');


					} else {


						$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
						redirect('ApplyForm3');

					}


				}

			}else{

				$this->data['error']=$this->ApplyOnlinem->applyNow3update();

				if (empty($this->data['error'])) {


					$this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
					redirect('ApplyForm5');

				} else {


					$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
					redirect('ApplyForm3');

				}

			}


			///////

//            $this->load->library('form_validation');
//            if (!$this->form_validation->run('applyfrom3')) {
//                $this->menu();
//                $this->data['coursedata'] = $this->Coursem->getCourseTitle();
//
//                $applicationId = $this->session->userdata('studentApplicationId');
//
//                $this->data['languagetest'] = $this->ApplyOnlinem->getlanguagetest($applicationId);
//
//                if (empty($this->data['languagetest'])) {
//                    $this->load->view('application-form3', $this->data);
//                } else {
//                    $this->load->view('application-form3v', $this->data);
//                }
//            }
//            else {
//                $this->data['error']=$this->ApplyOnlinem->applyNow3update();
//
//                if (empty($this->data['error'])) {
//
//
//                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
//                    redirect('ApplyForm4');
//
//                } else {
//
//
//                    $this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
//                    redirect('ApplyForm4');
//
//                }
//
//
//            }
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

			if ($selfFinance != 'own' || $selfFinance != 'slc'){

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


//                        $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
//                        redirect('ApplyForm4');
				$this->session->set_flashdata('successMessage', 'Your application has been saved successfully, please comeback later to complete your application');
				redirect('AllFormForStudents');


			} else {


				$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
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
			if ($selfFinance != 'own' || $selfFinance != 'slc'){

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


//                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
//                    redirect('ApplyForm4');
				$this->session->set_flashdata('successMessage', 'Your application has been saved successfully, please comeback later to complete your application');
				redirect('AllFormForStudents');


			} else {

				$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
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

			if ($selfFinance != 'own' || $selfFinance != 'slc' ){

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
				redirect('ApplyForm6');


			} else {

				$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
				redirect('ApplyForm4');

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

			if ( count($this->data['PersonalStatementData'])>0) {

				$this->load->view('application-form5v', $this->data);

			}else {

				$this->load->view('application-form5');

			}
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

//                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
//                    redirect('ApplyForm5');
					$this->session->set_flashdata('successMessage', 'Your application has been saved successfully, please comeback later to complete your application');
					redirect('AllFormForStudents');


				} else {

					$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
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
					redirect('ApplyForm4');


				} else {

					$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
					redirect('ApplyForm5');

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

//            print_r($this->data['EqualOpportunity']);


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

			$disabilityAllowance = $this->input->post('disabilityAllowance');


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
						'disabilityAllowance' => $disabilityAllowance,

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


//                $this->session->set_flashdata('successMessage', 'Information was  Successfully save');
//                redirect('ApplyForm6');
				$this->session->set_flashdata('successMessage', 'Your application has been saved successfully, please comeback later to complete your application');
				redirect('AllFormForStudents');


			} else {

				$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
				redirect('ApplyForm6');

			}
		}else{
			echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
		}


	}
	public function insertApplicationForm6AndNext()
	{
		if ($this->session->userdata('loggedin') == "true") {

			$check_list = $this->input->post('check_list');
			$check_list1 = $this->input->post('check_list1');
			$check_list2 = $this->input->post('check_list2');
			$check_list3 = $this->input->post('check_list3');

			$disabilityAllowance = $this->input->post('disabilityAllowance');


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
						'disabilityAllowance' => $disabilityAllowance,

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


				$this->session->set_flashdata('successMessage', 'Information was  Successfully saved');
				redirect('ApplyForm8');


			} else {

				$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
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

			$disabilityAllowance = $this->input->post('disabilityAllowance');


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
						'disabilityAllowance' => $disabilityAllowance,


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


//                $this->session->set_flashdata('successMessage', 'Information was  Successfully save');
//                redirect('ApplyForm6');
				$this->session->set_flashdata('successMessage', 'Your application has been saved successfully, please comeback later to complete your application');
				redirect('AllFormForStudents');


			} else {

				$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
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

			$disabilityAllowance = $this->input->post('disabilityAllowance');


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
						'disabilityAllowance' => $disabilityAllowance,


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


				$this->session->set_flashdata('successMessage', 'Information was  Successfully saved');
				redirect('ApplyForm8');


			} else {

				$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
				redirect('ApplyForm6');

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
			$this->data['refereecount'] = $this->ApplyOnlinem->getAllRefences();
			$refreecount =  count($this->data['refereecount']);
			if ($refreecount < 2)
			{
				$this->session->set_flashdata('errorMessage', 'At least two Referees are Mandatory ');

				redirect('ApplyForm8');
			}

			$applicationId = $this->session->userdata('studentApplicationId');

			$this->data['document'] = $this->ApplyOnlinem->getDocument($applicationId);

			$this->load->view('application-form7', $this->data);


		}else{
			echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
		}

	}
	public function deleteStudentFile()
	{
//        $fileName = $this->input->post('fileName');
//        $applicationId = $this->session->userdata('studentApplicationId');
//        $filePath= 'AdminPanel/studentApplications/'.$applicationId.'/';
//
//        if (file_exists($filePath.$fileName)) {
//            unlink ($filePath.$fileName);
//            echo '1';
//        } else {
//            echo '0';
//        }
		// echo  $filePath.$fileName;
		$applicationId = $this->input->post("id");
		$data = $this->ApplyOnlinem->deleteDocument($applicationId);
		$this->session->set_flashdata('successMessage', 'File Deleted Successfully');

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

//
						$this->load->library('upload');

						$applicationId = $this->session->userdata('studentApplicationId');
						$dir =   "./AdminPanel/studentApplications/$applicationId/";

						$fcount = 0;
						$files = glob($dir . "*");
						if ($files){
							$fcount = count($files);
						}
						if($fcount > 9 ){
							$this->session->set_flashdata('errorMessage', 'cannot upload more then 10 files');
							redirect('ApplyForm7');
						}

						$this->upload->initialize($this->set_upload_options($applicationId));

						if (!$this->upload->do_upload('fileUpload')) {
							$error[$i] = $this->upload->display_errors();
							$data[$error[$i]];

						}
						$filename= $_FILES['fileUpload']['name'];
//// insert file name
						$this->data['error'] = $this->ApplyOnlinem->insertAllDocument($filename);
						$fileCount++;

						if($fileCount > 9 ){
							$this->session->set_flashdata('errorMessage', 'cannot upload more then 10 files');
							redirect('ApplyForm7');
						}


					} else {

						$this->session->set_flashdata('successMessage', $fileCount . ' file is uploaded Successfully');
						redirect('ApplyForm7');

					}
				}

				if (empty($data)) {

					//  print_r($applicationId);


					$this->session->set_flashdata('successMessage', $fileCount . ' file is uploaded Successfully');
					redirect('ApplyForm7');


				} else {

					$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
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
						$filename= $_FILES['fileUpload']['name'];
//// insert file name
						$this->data['error'] = $this->ApplyOnlinem->insertAllDocument($filename);
						$fileCount++;


					} else {

					}
				}

				if (empty($data)) {


//                    $this->session->set_flashdata('successMessage', $fileCount . ' are uploaded Successfully');
//                    redirect('ApplyForm9');
					$this->session->set_flashdata('successMessage', 'Your application has been saved successfully, please comeback later to complete your application');
					redirect('AllFormForStudents');


				} else {

					$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
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

	public function editApplicationForm7Save()
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
						$filename= $_FILES['fileUpload']['name'];
//// insert file name
						$this->data['error'] = $this->ApplyOnlinem->insertAllDocument($filename);

						$fileCount++;


					} else {

					}
				}

				if (empty($data)) {


//                    $this->session->set_flashdata('successMessage', $fileCount . ' are uploaded Successfully');
//                    redirect('ApplyForm9');
					$this->session->set_flashdata('successMessage', 'Your application has been saved successfully, please comeback later to complete your application');
					redirect('AllFormForStudents');


				} else {

					$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
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

	//upload an image options
	private function set_upload_options($applicationId)
	{
		if (!is_dir('AdminPanel/studentApplications/'.$applicationId)){
			mkdir('AdminPanel/studentApplications/'.$applicationId, 0777, TRUE);
		}

		$config = array();
		$config['upload_path'] = 'AdminPanel/studentApplications/'.$applicationId."/";
		$config['allowed_types'] = 'jpg|jpeg|gif|png|xlsx|pdf|doc|docx|xls|xlsx';

		$config['overwrite'] = true;

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

				$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
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


			$applicationId = $this->session->userdata('studentApplicationId');
            $this->data['error'] = $this->ApplyOnlinem->insertAllReferees();
            $this->data['refereecount'] = $this->ApplyOnlinem->getAllRefences();
			$refreecount =  count($this->data['refereecount']);
			if ($refreecount < 2)
			{ 	$this->session->set_flashdata('successMessage', 'Information was  Successfully save');
				$this->session->set_flashdata('errorMessage', 'At least two Referees are Mandatory ');

				redirect('ApplyForm8');
			}
		//	return ;
            if (empty($this->data['error'])) {


				$this->data['error'] = $this->ApplyOnlinem->insertAllReferees();

				$this->session->set_flashdata('successMessage', 'Information was  Successfully save');
				redirect('ApplyForm7');


			} else {

				$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
				redirect('ApplyForm8');

			}

		}else{

			echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";

		}

	}

	public function insertApplicationForm8Save() // go to the apply page of selected course
	{
		if ($this->session->userdata('loggedin') == "true") {


			$this->data['error'] = $this->ApplyOnlinem->insertAllReferees();

			if (empty($this->data['error'])) {


//                $this->session->set_flashdata('successMessage', 'Information was  Successfully save');
//                redirect('ApplyForm7');
				$this->session->set_flashdata('successMessage', 'Your application has been saved successfully, please comeback later to complete your application');
				redirect('AllFormForStudents');


			} else {

				$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
				redirect('ApplyForm8');

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
				$address2 = $this->input->post("address2");
				$address3 = $this->input->post("address3");
				$postCode = $this->input->post("postCode");
				$city = $this->input->post("city");
				$state = $this->input->post("state");
				$country = $this->input->post("country");


				$data = array(

					'name' => $name,
					'title' => $title,
					'workingCompany' => $company,
					'jobTitle' => $jobTitle,
					'address' => $address,
					'address2' => $address2,
					'address3' => $address3,
					'postCode' => $postCode,
					'city' => $city,
					'state' => $state,
					'contactNo' => $telephone,
					'email' => $email,
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
				$address2 = $this->input->post("address2");
				$address3 = $this->input->post("address3");
				$postCode = $this->input->post("postCode");
				$city = $this->input->post("city");
				$state = $this->input->post("state");
				$country = $this->input->post("country");


				$data = array(

					'name' => $name,
					'title' => $title,
					'workingCompany' => $company,
					'jobTitle' => $jobTitle,
					'address' => $address,
					'address2' => $address2,
					'address3' => $address3,
					'postCode' => $postCode,
					'city' => $city,
					'state' => $state,
					'contactNo' => $telephone,
					'email' => $email,
					'fkCountry' => $country,


				);

				if (!empty($refereesId)) {

					$this->ApplyOnlinem->editRefereesDetailsById($refereesId, $data);
					$this->session->set_flashdata('successMessage', 'Referees Edited Successfully');
					redirect('ApplyForm7');
				} else {

					$data2 = array(
						'fkApplicationId' => $this->session->userdata('studentApplicationId'),
					);
					$data = array_merge($data, $data2);
					$this->ApplyOnlinem->insertRefereesDetailsFromEdit($data);
					$this->session->set_flashdata('successMessage', 'Referees Added Successfully');
					redirect('ApplyForm7');

				}
			}
		}else{
			echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
		}

	}
	public function editApplicationForm8Save() // edit OR Insert Application Form8

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
				$address2 = $this->input->post("address2");
				$address3 = $this->input->post("address3");
				$postCode = $this->input->post("postCode");
				$city = $this->input->post("city");
				$state = $this->input->post("state");
				$country = $this->input->post("country");


				$data = array(

					'name' => $name,
					'title' => $title,
					'workingCompany' => $company,
					'jobTitle' => $jobTitle,
					'address' => $address,
					'address2' => $address2,
					'address3' => $address3,
					'postCode' => $postCode,
					'city' => $city,
					'state' => $state,
					'contactNo' => $telephone,
					'email' => $email,
					'fkCountry' => $country,


				);

				if (!empty($refereesId)) {

					$this->ApplyOnlinem->editRefereesDetailsById($refereesId, $data);
					$this->session->set_flashdata('successMessage', 'Referees Edited Successfully');
					redirect('ApplyForm7');
				} else {

					$data2 = array(
						'fkApplicationId' => $this->session->userdata('studentApplicationId'),
					);
					$data = array_merge($data, $data2);
					$this->ApplyOnlinem->insertRefereesDetailsFromEdit($data);
//                    $this->session->set_flashdata('successMessage', 'Referees Added Successfully');
//                    redirect('ApplyForm7');
					$this->session->set_flashdata('successMessage', 'Your application has been saved successfully, please comeback later to complete your application');
					redirect('AllFormForStudents');


				}
			}
		}else{
			echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
		}

	}

	public function deletePersonalReferees() // delete personal Referees
	{
		$refereesId = $this->input->post("id");

		$this->ApplyOnlinem->deleteRefereesDetailsById($refereesId);




	}
	public function applyNow9() // go to the apply page of selected course
	{
		if ($this->session->userdata('loggedin') == "true") {
			$this->menu();

			$this->data['coursedata'] = $this->Coursem->getCourseTitle();
			$this->data['courseInfo'] = $this->Coursem->getCourseInfo();
			$studentOrAgentId = $this->session->userdata('id');
			$this->data['applications'] = $this->ApplyOnlinem->getApplicationInfoForStudens($studentOrAgentId);
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
					redirect('AllFormForStudents');


				} else {

					$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
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


				$this->session->set_flashdata('successMessage', 'Work Experience Saved  Successfully');
				redirect('Apply-Work-Experience');


			} else {

				$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
				redirect('Apply-Work-Experience');

			}

		}else{
			echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
		}
	}
//    public function insertApplicationForm10AndNext(){
//
//        if ($this->session->userdata('loggedin') == "true") {
//
//
//            $this->data['error'] = $this->ApplyOnlinem->insertApplyForm10();
//
//            if (empty($this->data['error'])) {
//
//
//                $this->session->set_flashdata('successMessage', 'Work Experience Saved  Successfully');
//                redirect('ApplyForm3');
//
//
//            } else {
//
//                $this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
//                redirect('ApplyForm3');
//
//            }
//
//        }else{
//            echo "<script>
//                    alert('Your Session has Expired ,Please Login Again');
//                    window.location.href= '" . base_url() . "Login';
//                    </script>";
//        }
//    }
	public function insertApplicationForm10Save(){

		if ($this->session->userdata('loggedin') == "true") {


			$this->data['error'] = $this->ApplyOnlinem->insertApplyForm10();

			if (empty($this->data['error'])) {


				$this->session->set_flashdata('successMessage', 'Your application has been saved successfully, please comeback later to complete your application');
				redirect('AllFormForStudents');


			} else {

				$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
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
				 $this->session->set_flashdata('successMessage', 'Work Experience Saved  Successfully');
				redirect('Apply-Work-Experience');
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
				$this->session->set_flashdata('successMessage', 'Your application has been saved successfully, please comeback later to complete your application');
				redirect('AllFormForStudents');
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

	public function cancelApplication($applicationId) // for selected Application cancel
	{
		if ($this->session->userdata('loggedin') == "true")
		{
			$this->data['error']=$this->ApplyOnlinem->cancelApplication($applicationId);

			if (empty($this->data['error'])) {


				$this->session->set_flashdata('successMessage', 'Application Cancelled  Successfully');
				redirect('AllFormForStudents');


			} else {

				$this->session->set_flashdata('errorMessage', 'please fix the erorr(s) below and submit again.');
				redirect('AllFormForStudents');

			}

		}

		else{
			echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
		}
	}


	// show Pdf

	public function ApplicationDetails()
	{

		$applicationId = 4;

		$this->data['applicationDetails'] = $this->StudentApplicationPdfm->applicationDetails($applicationId);
		$this->data['personalDetails'] = $this->StudentApplicationPdfm->personalDetails($applicationId);
		$this->data['contactDetails'] = $this->StudentApplicationPdfm->contactDetails($applicationId);
		$this->data['emmergencyContact'] = $this->StudentApplicationPdfm->emmergancyContact($applicationId);
		$this->data['courseDetails'] = $this->StudentApplicationPdfm->courseDetails($applicationId);
		$this->data['qualifications'] = $this->StudentApplicationPdfm->qualifications($applicationId);
		$this->data['experience'] = $this->StudentApplicationPdfm->workExperience($applicationId);
		$this->data['languageProficiency'] = $this->StudentApplicationPdfm->languageProficiency($applicationId);
		$this->data['languageProficiencyTestScore'] = $this->StudentApplicationPdfm->languageProficiencyTestScore();
		$this->data['personalstatement'] = $this->StudentApplicationPdfm->personalStatement($applicationId);
		$this->data['finance'] = $this->StudentApplicationPdfm->finance($applicationId);
		$this->data['referees'] = $this->StudentApplicationPdfm->referees($applicationId);
		$this->data['equaloppurtunitiesgroup'] = $this->StudentApplicationPdfm->equalOppurtunitiesGroup();
		$this->data['equaloppurtunitiesgroupsubgroup'] = $this->StudentApplicationPdfm->equalOppurtunitiesSubGroup();
		$this->data['personequaloppurtunities'] = $this->StudentApplicationPdfm->personequalOppurtunities($applicationId);

		$this->data['personalstatement'] = $this->StudentApplicationPdfm->personalStatement($applicationId);

		$this->load->view('studentsApplicationPdf/detailsForms', $this->data);
	}

	public function showApplicationPdf($applicationId) // for selected Application view
	{
		if ($this->session->userdata('loggedin') == "true")
		{
			$this->load->library('pdfgenerator');



			$this->data['applicationDetails'] = $this->StudentApplicationPdfm->applicationDetails($applicationId);

			$this->data['personalDetails'] = $this->StudentApplicationPdfm->personalDetails($applicationId);
			$this->data['contactDetails'] = $this->StudentApplicationPdfm->contactDetails($applicationId);
			$this->data['emmergencyContact'] = $this->StudentApplicationPdfm->emmergancyContact($applicationId);
			$this->data['courseDetails'] = $this->StudentApplicationPdfm->courseDetails($applicationId);
			$this->data['qualifications'] = $this->StudentApplicationPdfm->qualifications($applicationId);
			$this->data['experience'] = $this->StudentApplicationPdfm->workExperience($applicationId);
			$this->data['languageProficiency'] = $this->StudentApplicationPdfm->languageProficiency($applicationId);
			$this->data['languageProficiencyTestScore'] = $this->StudentApplicationPdfm->languageProficiencyTestScore();
			$this->data['personalstatement'] = $this->StudentApplicationPdfm->personalStatement($applicationId);
			$this->data['finance'] = $this->StudentApplicationPdfm->finance($applicationId);
			$this->data['referees'] = $this->StudentApplicationPdfm->referees($applicationId);
			$this->data['equaloppurtunitiesgroup'] = $this->StudentApplicationPdfm->equalOppurtunitiesGroup();
			$this->data['equaloppurtunitiesgroupsubgroup'] = $this->StudentApplicationPdfm->equalOppurtunitiesSubGroup();
			$this->data['personequaloppurtunities'] = $this->StudentApplicationPdfm->personequalOppurtunities($applicationId);

			$this->data['personalstatement'] = $this->StudentApplicationPdfm->personalStatement($applicationId);

			$html=$this->load->view('studentsApplicationPdf/detailsForms', $this->data,true);

			$filename = 'ApplicationFormPDF';
			$this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');

		}

		else{
			echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
		}
	}



	public function showApplicationPdflast() // for last Application view
	{
		$applicationId = $this->session->userdata('studentApplicationId');
		if ($this->session->userdata('loggedin') == "true")
		{
			$this->load->library('pdfgenerator');



			$this->data['applicationDetails'] = $this->StudentApplicationPdfm->applicationDetails($applicationId);

			$this->data['personalDetails'] = $this->StudentApplicationPdfm->personalDetails($applicationId);
			$this->data['contactDetails'] = $this->StudentApplicationPdfm->contactDetails($applicationId);
			$this->data['emmergencyContact'] = $this->StudentApplicationPdfm->emmergancyContact($applicationId);
			$this->data['courseDetails'] = $this->StudentApplicationPdfm->courseDetails($applicationId);
			$this->data['qualifications'] = $this->StudentApplicationPdfm->qualifications($applicationId);
			$this->data['experience'] = $this->StudentApplicationPdfm->workExperience($applicationId);
			$this->data['languageProficiency'] = $this->StudentApplicationPdfm->languageProficiency($applicationId);
			$this->data['languageProficiencyTestScore'] = $this->StudentApplicationPdfm->languageProficiencyTestScore();
			$this->data['personalstatement'] = $this->StudentApplicationPdfm->personalStatement($applicationId);
			$this->data['finance'] = $this->StudentApplicationPdfm->finance($applicationId);
			$this->data['referees'] = $this->StudentApplicationPdfm->referees($applicationId);
			$this->data['equaloppurtunitiesgroup'] = $this->StudentApplicationPdfm->equalOppurtunitiesGroup();
			$this->data['equaloppurtunitiesgroupsubgroup'] = $this->StudentApplicationPdfm->equalOppurtunitiesSubGroup();
			$this->data['personequaloppurtunities'] = $this->StudentApplicationPdfm->personequalOppurtunities($applicationId);

			$this->data['personalstatement'] = $this->StudentApplicationPdfm->personalStatement($applicationId);

			$html=$this->load->view('studentsApplicationPdf/detailsForms', $this->data,true);

			$filename = 'ApplicationFormPDF';
			$this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');

		}

		else{
			echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
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
