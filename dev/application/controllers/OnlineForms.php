<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class OnlineForms extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menum');
        $this->load->model('CollegeInfom');
        $this->load->model('Photom');
        $this->load->model('Eventm');
        $this->load->model('Newsm');
        $this->load->model('Coursem');
        $this->load->model('OnlineFormsm');
        $this->load->helper('cookie');
    }
    public function index()
    {
    }
    public function contactUs() //go to the contact us page
    {
        $this->menu();
        $this->load->view('contact', $this->data);
    }
    public function registerInterest() //go to the register Interest page
    {
        $this->menu();
        $this->data['course']=$this->Coursem->getCourseTitle();
        $this->load->view('register-ineterest', $this->data);
    }
    public function insertRegisterInterest()
    {

        $this->load->library('form_validation');

        if (!$this->form_validation->run('RegisterInterest')) {


            $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
            $this->registerInterest();

        } else {

            $this->load->library('recaptcha');
            $recaptcha = $this->input->post('g-recaptcha-response');
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) and $response['success'] === true) {

                $title = $this->input->post('title');
                $fname = $this->input->post('fname');
                $sname = $this->input->post('sname');
                $house = $this->input->post('house');
                $street = $this->input->post('street');
                $postcode = $this->input->post('postcode');
                $city = $this->input->post('city');
                $country = $this->input->post('country');
                $phone = $this->input->post('phone');
                $email = $this->input->post('email');
                $course = $this->input->post('course');
                $hear = $this->input->post('hear');
                $other = $this->input->post('other');
                $disability = $this->input->post('disability');
                $appoinment = date('Y-m-d H:i:s', strtotime($this->input->post('appoinment')));
                $comments = $this->input->post('comments');

                $this->data['error'] = $this->OnlineFormsm->insertRegisterInterest($title, $fname, $sname, $house, $street, $postcode, $city, $country, $phone, $email, $course, $hear, $other, $disability, $appoinment, $comments);

                $subject = "Register Interest";
                $email = $this->input->post('email');

                $message = "Title: $title \r\n\n";
                $message .= "First Name: $fname \r\n\n";
                $message .= "Name: $sname \r\n\n";
                $message .= "Name: $house \r\n\n";
                $message .= "Name: $street \r\n\n";
                $message .= "Name: $postcode \r\n\n";
                $message .= "Name: $city \r\n\n";
                $message .= "Name: $country \r\n\n";
                $message .= "Name: $phone \r\n\n";
                $message .= "Name: $email \r\n\n";
                $message .= "Name: $course \r\n\n";
                $message .= "Name: $hear \r\n\n";
                $message .= "Name: $other \r\n\n";
                $message .= "Name: $disability \r\n\n";
                $message .= "Name: $appoinment \r\n\n";
                $message .= "Name: $comments \r\n\n";

//            include APPPATH . 'controllers/Email.php';
//            $Email = new Email();
//            $Email->RegisterInsertEmail($subject, $email, $message);
//            $this->email->RegisterInsertEmail();


                $admin_email = "md.sakibrahman@gmail.com";

                mail(ADMIN_EMAIL, $subject, $message, $email);


                if (empty($this->data['error'])) {
                    $this->session->set_flashdata('successMessage', 'Your Form Submit Successfully');
                    redirect('OnlineForms/registerInterest');
                } else {
                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('OnlineForms/registerInterest');
                }
            }else {
                echo "<script>alert('Please select the recaptcha');
                    window.location = 'RegisterInterest';
                    </script>";

            }
        }
    }
    public function applyNow() // go to the apply page of selected course
    {
        $this->menu();
        $this->data['coursedata']=$this->Coursem->getCourseTitle();
        $this->data['courseInfo']=$this->Coursem->getCourseInfo();
       // $this->data['candiddata']=$this->OnlineFormsm->getCandidateinfo();
        $this->load->view('application-form', $this->data);
    }
    public function getCourseAwardBody() // get Award body of selected course
    {

        $courseId=$this->input->post('courseId');
        $this->data['courseAwardBody']=$this->Coursem->getCourseAwardBody($courseId);
        foreach ($this->data['courseAwardBody'] as $awardBody){

            $body=$awardBody->awardingBody;
        }

        echo $body;
    }
    public function applyNow2() // go to the apply page of selected course
    {
        $this->menu();
        $this->data['coursedata'] = $this->Coursem->getCourseTitle();
        //$this->OnlineFormsm->applyNow2();
        $this->data['qualification'] = $this->OnlineFormsm->getQualifications();
        if (empty($this->data['qualification'])) {
            $this->load->view('application-form2', $this->data);
        } else {
            $this->load->view('application-form2v', $this->data);
        }
    }
    public function applyNow2insert() // go to the apply page of selected course
    {

        $this->OnlineFormsm->applyNow2();
        redirect('OnlineForms/applyNow2');
    }
    public function applyNow3() // go to the apply page of selected course
    {
        $this->menu();
        $this->data['coursedata']=$this->Coursem->getCourseTitle();
        //$this->data['candiddata']=$this->OnlineFormsm->getCandidateinfo();
        $this->load->view('application-form3', $this->data);
    }


    public function applyNow4() // go to the apply page of selected course
    {
        if ($this->session->userdata('loggedin') == "true") {

            //$this->data['candiddata']=$this->OnlineFormsm->getCandidateinfo();
            $this->data['apllyfrom4'] = $this->OnlineFormsm->getAllapplynow4();

            $this->menu();
            $this->data['coursedata'] = $this->Coursem->getCourseTitle();




            if (empty($this->data['apllyfrom4'])) {

                 $this->load->view('application-form4', $this->data);
                }

            else {

                $this->load->view('application-form4v', $this->data);
            }


        }

    }


    public function insertapplyNow4()

    {

        if ($this->session->userdata('loggedin') == "true") {
            //$userId = $this->session->userdata('fkCandidateId');
            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfrom4')) {
                $this->menu();
                $this->data['apllyfrom4'] = $this->OnlineFormsm->getAllapplynow4();
                $this->data['coursedata'] = $this->Coursem->getCourseTitle();
                $this->load->view('application-form4', $this->data);

            } else {

                $title = $this->input->post('title');
                $name = $this->input->post('name');
                $relation = $this->input->post('relation');
                $address = $this->input->post('address');
                $mobilee = $this->input->post('mobile');
                $telephone = $this->input->post('telephone');
                $email = $this->input->post('email');
                $fax = $this->input->post('fax');

                $data = array(
                    'fkCandidateId' => 1,
                    'title' => $title,
                    'name' => $name,
                    'relation' => $relation,
                    'address' => $address,
                    'mobile' => $mobilee,
                    'telephone' => $telephone,
                    'email' => $email,
                    'fax' => $fax

                );


                $this->data['error'] = $this->OnlineFormsm->insertnewfrom4($data);;

                if (empty($this->data['error'])) {


                    $this->session->set_flashdata('successMessage', 'Information was  Successfully save');
                    redirect("OnlineForms/applyNow4"  );

                } else {


                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect("OnlineForms/applyNow4");

                }

            }
        }

    }


    public function updateInfoApply4($id)
    {

        if ($this->session->userdata('loggedin') == "true") {


            //$userId = $this->session->userdata('fkCandidateId');
            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfrom4')) {
                $this->menu();
                $this->data['apllyfrom4'] = $this->OnlineFormsm->getAllapplynow4($id);
                $this->data['coursedata'] = $this->Coursem->getCourseTitle();
                $this->load->view('application-form4v', $this->data);

            }

            else {

                $title = $this->input->post('title');
                $name = $this->input->post('name');
                $relation = $this->input->post('relation');
                $address = $this->input->post('address');
                $mobilee = $this->input->post('mobile');
                $telephone = $this->input->post('telephone');
                $email = $this->input->post('email');
                $fax = $this->input->post('fax');

                $data = array(
                    'fkCandidateId' => 1,
                    'title' => $title,
                    'name' => $name,
                    'relation' => $relation,
                    'address' => $address,
                    'mobile' => $mobilee,
                    'telephone' => $telephone,
                    'email' => $email,
                    'fax' => $fax

                );

                $this->data['error'] = $this->OnlineFormsm->updatApplynow4($id, $data);
                if (empty($this->data['error'])) {


                    $this->session->set_flashdata('successMessage', 'Information was  Successfully save');
                    redirect("OnlineForms/applyNow4");


                } else {

                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect("OnlineForms/applyNow4");

                }

            }
        }
    }



    public function applyNow5() // go to the apply page of selected course
    {
        $this->menu();
        $this->data['coursedata']=$this->Coursem->getCourseTitle();
        //$this->data['candiddata']=$this->OnlineFormsm->getCandidateinfo();
        $this->load->view('application-form5', $this->data);
    }
    public function applyNow6() // go to the apply page of selected course
    {
        $this->menu();
        $this->data['coursedata']=$this->Coursem->getCourseTitle();
        //$this->data['candiddata']=$this->OnlineFormsm->getCandidateinfo();
        $this->load->view('application-form6', $this->data);
    }
    public function applyNow7() // go to the apply page of selected course
    {
        $this->menu();
        $this->data['coursedata']=$this->Coursem->getCourseTitle();
        //$this->data['candiddata']=$this->OnlineFormsm->getCandidateinfo();
        $this->load->view('application-form7', $this->data);
    }
    public function applyNow8() // go to the apply page of selected course
    {
        $this->menu();
        $this->data['coursedata']=$this->Coursem->getCourseTitle();
        //$this->data['candiddata']=$this->OnlineFormsm->getCandidateinfo();
        $this->load->view('application-form8', $this->data);
    }
    public function applyNow9() // go to the apply page of selected course
    {
        $this->menu();
        $this->data['coursedata']=$this->Coursem->getCourseTitle();
        //$this->data['candiddata']=$this->OnlineFormsm->getCandidateinfo();
        $this->load->view('application-form9', $this->data);
    }
    public function feedback() // go to the feedback page
    {
        $this->menu();
        $this->load->view('feedback-form', $this->data);
    }
    public function SubmitFeedback() // Submit the feedback
    {
        $this->load->model('OnlineFormsm');
        $this->load->library('form_validation');
        if (!$this->form_validation->run('feedbacks')) {
            $this->menu();
            $this->load->view('feedback-form', $this->data);
        }
        else{
            $this->data['error'] = $this->OnlineFormsm->sendFeedback();
            if (empty($this->data['error'])) {
                $this->session->set_flashdata('successMessage','Feedback given Successfully.Thak You For Your Feedback');
                redirect('Feedback');
            }
            else
            {
                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Feedback');
            }
        }
    }
    public function menu() // get all the menu + footer
    {
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

    public function insertApplicationForm1()
    {
//        if ($this->session->userdata('loggedin') == "true") {

//            $this->load->library('form_validation');
//            if (!$this->form_validation->run('checkApplicationForm1')) {
//
//                $this->menu();
//                $this->data['coursedata']=$this->Coursem->getCourseTitle();
//                $this->data['courseInfo']=$this->Coursem->getCourseInfo();
//
//                $this->load->view('application-form', $this->data);
//            }
//            else{
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
                $candidateVisaExpiryDate = $this->input->post("visaExpiryDate");
                $candidateCurrentAddress = $this->input->post("currentAddress");
                $candidateOverseasHomeAddress = $this->input->post("overseasHomeAddress");
                $candidateTelephone = $this->input->post("telephone");
                $candidateMobile = $this->input->post("mobile");
                $candidateEmail = $this->input->post("email");
                $candidateFax = $this->input->post("fax");
                $EmergencyContactTitle = $this->input->post("EmergencyContactTitle");
                $EmergencyContactName = $this->input->post("EmergencyContactName");
                $EmergencyContactRelation = $this->input->post("EmergencyContactRelation");
                $EmergencyContactAddress = $this->input->post("EmergencyContactAddress");
                $EmergencyContactMobile = $this->input->post("EmergencyContactMobile");
                $EmergencyContactEmail = $this->input->post("EmergencyContactEmail");
                $courseName = $this->input->post("courseName");
                $awardingBody = $this->input->post("awardingBody");
                $courseLevel = $this->input->post("courseLevel");
                $courseStartDate = $this->input->post("courseStartDate");
                $courseEndDate = $this->input->post("courseEndDate");
                $methodeOfStudy = $this->input->post("methodeOfStudy");

                $data=array(
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
                    'visaExpiryDate'=>$candidateVisaExpiryDate,

                    'currentAddress'=>$candidateCurrentAddress,
                    'overseasAddress'=>$candidateOverseasHomeAddress,
                    'telephoneNo'=>$candidateTelephone,
                    'mobileNo'=>$candidateMobile,
                    'email'=>$candidateEmail,
                    'fax'=>$candidateFax,
                    'emergencyContactName'=>$EmergencyContactName,
                    'emergencyContactTitle'=>$EmergencyContactTitle,
                    'emergencyContactRelation'=>$EmergencyContactRelation,
                    'emergencyContactAddress'=>$EmergencyContactAddress,
                    'emergencyContactMobile'=>$EmergencyContactMobile,
                    'emergencyContactEmail'=>$EmergencyContactEmail,
//                    'selfFinance'=>,
                    'applydate'=>date('Y-m-d h:i:s A'),
                );

                $data1=array(
                    'courseName'=>$courseName,
                    'awardingBody'=>$awardingBody,
                    'courseLevel'=>$courseLevel,
                    'courseStartDate'=>$courseStartDate,
                    'courseEndDate'=>$courseEndDate,
                    'methodOfStudy'=>$methodeOfStudy,
                );

                $this->data['insertForm'] = $this->OnlineFormsm->insertApplyForm1($data,$data1);




//            }

//        } else {
//            redirect('Admin/Login');
//        }
    }
    /* -------------------------------Image validation-------------------------*/
    public function val_img_check()
    {
        $image = $_FILES['image']['name'];
        $imageSize = ($_FILES['image']['size']/1024);
        $supported_image = array('gif','jpg','jpeg','png');
        if ($image != null) {
            $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            if (in_array($ext, $supported_image)) {
                if ($imageSize <4096){
                    return true;
                }
                else{
                    $this->form_validation->set_message('val_img_check', "Maximum Image Size 4MB is allowed!!");
                    return false;
                }
            } else {
                $this->form_validation->set_message('val_img_check', "Only JPEG/JPG/PNG/GIF Image is allowed!!");
                return false;
            }
        }
    }

}