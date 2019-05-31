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
        $this->load->model('Searchm');
    }
    public function index()
    {
        $this->menu();
        $this->data['coursedata']=$this->Coursem->getCourseTitle();
        //$this->data['candiddata']=$this->OnlineFormsm->getCandidateinfo();
        $this->load->view('application-form2', $this->data);
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


            //$this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
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
                $message .= "Last Name: $sname \r\n\n";
                $message .= "House: $house \r\n\n";
                $message .= "Street: $street \r\n\n";
                $message .= "Zip: $postcode \r\n\n";
                $message .= "City: $city \r\n\n";
                $message .= "Country: $country \r\n\n";
                $message .= "Phone: $phone \r\n\n";
                $message .= "Email: $email \r\n\n";
                $message .= "Course: $course \r\n\n";
                $message .= "Hear: $hear \r\n\n";
                $message .= "Other: $other \r\n\n";
                $message .= "Disability: $disability \r\n\n";
                $message .= "Appoinment Date: $appoinment \r\n\n";
                $message .= "Comments: $comments \r\n\n";

//            include APPPATH . 'controllers/Email.php';
//            $Email = new Email();
//            $Email->RegisterInsertEmail($subject, $email, $message);
//            $this->email->RegisterInsertEmail();


               // $admin_email = "md.sakibrahman@gmail.com";
                $headers = 'From: <'.$email.'>' . "\r\n";
                mail(ADMIN_EMAIL, $subject, $message, $headers);


                if (empty($this->data['error'])) {
                    $this->session->set_flashdata('successMessage', 'We have received your message and we will reply you as soon as possible. However, if your inquiry is urgent, please telephone us to talk to one of our staff members.');
                    redirect('OnlineForms/registerInterest');
                } else {
                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');

                    $this->menu();
//                    $this->session->set_flashdata('errorMessage', 'Please select the recaptcha!!');

                    $this->data['title']=$this->input->post('title');
                    $this->data['fname']=$this->input->post('fname');
                    $this->data['sname']=$this->input->post('sname');
                    $this->data['house']=$this->input->post('house');
                    $this->data['street']=$this->input->post('street');
                    $this->data['postcode']=$this->input->post('postcode');
                    $this->data['city']=$this->input->post('city');
                    $this->data['country']=$this->input->post('country');
                    $this->data['phone']=$this->input->post('phone');
                    $this->data['email']=$this->input->post('email');
                    $this->data['course']=$this->input->post('course');
                    $this->data['hear']=$this->input->post('hear');
                    $this->data['other']=$this->input->post('other');
                    $this->data['disability']=$this->input->post('disability');
                    $this->data['appoinment']=$this->input->post('appoinment');
                    $this->data['comments']=$this->input->post('comments');


                    $this->data['course']=$this->Coursem->getCourseTitle();
                    $this->load->view('register-ineterest', $this->data);

//                    redirect('OnlineForms/registerInterest');
                }
            }else {
//                echo "<script>alert('Please select the recaptcha');
//                    window.location = 'RegisterInterest';
//                    </script>";

                $this->menu();
                $this->session->set_flashdata('errorMessage', 'Please select the recaptcha!!');

                $this->data['title']=$this->input->post('title');
                $this->data['fname']=$this->input->post('fname');
                $this->data['sname']=$this->input->post('sname');
                $this->data['house']=$this->input->post('house');
                $this->data['street']=$this->input->post('street');
                $this->data['postcode']=$this->input->post('postcode');
                $this->data['city']=$this->input->post('city');
                $this->data['country']=$this->input->post('country');
                $this->data['phone']=$this->input->post('phone');
                $this->data['email']=$this->input->post('email');
                $this->data['course']=$this->input->post('course');
                $this->data['hear']=$this->input->post('hear');
                $this->data['other']=$this->input->post('other');
                $this->data['disability']=$this->input->post('disability');
                $this->data['appoinment']=$this->input->post('appoinment');
                $this->data['comments']=$this->input->post('comments');


                $this->data['course']=$this->Coursem->getCourseTitle();
                $this->load->view('register-ineterest', $this->data);

            }
        }
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

        else
        {
            redirect("Home");
        }

    }


    public function insertapplyNow4($id)

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
                    redirect("OnlineForms/applyNow5/".$id  );

                } else {


                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect("OnlineForms/applyNow4/".$id);

                }

            }
        }

    }






    public function applyNow5($id) // go to the apply page of selected course
    {
        if ($this->session->userdata('loggedin') == "true") {
            $id=1;

            $this->menu();
            $this->data['coursedata'] = $this->Coursem->getCourseTitle();
            //$this->data['candiddata']=$this->OnlineFormsm->getCandidateinfo();
            $this->data['apllyfrom5'] = $this->OnlineFormsm->getAllapplynow5($id);

                $this->load->view('application-form5v', $this->data);


        }

    }

//    public function insertapplyNow5()
//    {        if ($this->session->userdata('loggedin') == "true") {
//           $courseChoiceStatement = $this->input->post('courseChoiceStatement');
//            $collegeChoiceStatement=$this->input->post('collegeChoiceStatement');
//
//             $data=array(
//              'courseChoiceStatement'=>$courseChoiceStatement,
//              'collegeChoiceStatement'=>$collegeChoiceStatement
//
//               );
//
//          $this->data['error'] = $this->OnlineFormsm->insertnewfrom5($data);;
//
//            if (empty($this->data['error'])) {
//
//
//               $this->session->set_flashdata('successMessage', 'Information was  Successfully save');
//               redirect("OnlineForms/applyNow5"  );
//
//             }      else {
//
//
//               $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
//                redirect("OnlineForms/applyNow5");
//
//              }
//
//
//
//            }
//
//
//    }










     public function updatefrom6($id)
     {

         if ($this->session->userdata('loggedin') == "true") {

             $this->data['apllyfrom6'] = $this->OnlineFormsm->getAllapplynow6();


            // print_r($this->data['apllyfrom6']);
//             $check_list = $this->input->post('check_list');
//             $check_list1 = $this->input->post('check_list1');
//             $check_list2 = $this->input->post('check_list2');
//             $check_list3 = $this->input->post('check_list3');
//
//             $checkcheckopportunityTitle['id'] = $this->OnlineFormsm->checkopportunityTitle();
//             foreach ($checkcheckopportunityTitle['id'] as $title) {
//
//                 if ($title->opportunityTitle == 'Ethnicity')
//
//                     $data = array
//                     (
//                         "fkGroupId" => $title->id,
//                         'subGroupTitle' => $check_list
//                     );
//
//                 if ($title->opportunityTitle == 'Disability')
//
//                     $data = array
//                     (
//                         "fkGroupId" => $title->id,
//                         'subGroupTitle' => $check_list1
//                     );
//
//                 if ($title->opportunityTitle == 'Religion Belief')
//
//                     $data = array
//                     (
//                         "fkGroupId" => $title->id,
//                         'subGroupTitle' => $check_list2
//                     );
//                 if ($title->opportunityTitle == 'Sexual Orientation')
//
//                     $data = array
//                     (
//                         "fkGroupId" => $title->id,
//                         'subGroupTitle' => $check_list3
//                     );
//
//                 $id = $this->OnlineFormsm->insertapplyNow6($data);
//                 $data1 = array(
//                     'fkEqualOpportunitySubGroupId' => $id,
//                     'fkCandidateId' => 1,
//
//                 );
//
//
//                 $this->data['error'] = $this->OnlineFormsm->insertapplyNow6personal($data1);
//                 if (empty($this->data['error'])) {
//
//
//                     $this->session->set_flashdata('successMessage', 'Information was  Successfully save');
//                     redirect("OnlineForms/applyNow6/" . $id);
//
//
//                 } else {
//
//                     $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
//                     redirect("OnlineForms/applyNow5" . $id);
//
//                 }
//
//
//             }
//
//         }

         }
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
        $this->load->library('recaptcha');
        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($recaptcha);
        if (isset($response['success']) and $response['success'] === true) {
            $this->load->model('OnlineFormsm');
            $this->load->library('form_validation');
            if (!$this->form_validation->run('feedbacks')) {
                $this->menu();
                $this->load->view('feedback-form', $this->data);
            } else {
                $this->data['error'] = $this->OnlineFormsm->sendFeedback();
                if (empty($this->data['error'])) {
                    $this->session->set_flashdata('successMessage', 'Feedback given Successfully.Thak You For Your Feedback');
                    redirect('Feedback');
                } else {
                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');

                    $this->menu();

                    $this->data['name']=$this->input->post('name');
                    $this->data['profession']=$this->input->post('profession');
                    $this->data['email']=$this->input->post('email');
                    $this->data['mobile']=$this->input->post('mobile');
                    $this->data['details']=$this->input->post('details');
                    $this->load->view('feedback-form', $this->data);

//                    redirect('Feedback');
                }

            }
        }else{
//            echo "<script>alert('Please select the recaptcha');
//                    window.location.href='".site_url('Contact')."';
//
//                    </script>";


            $this->session->set_flashdata('errorMessage', 'Please select the recaptcha!!');

            $this->menu();

            $this->data['name']=$this->input->post('name');
            $this->data['profession']=$this->input->post('profession');
            $this->data['email']=$this->input->post('email');
            $this->data['mobile']=$this->input->post('mobile');
            $this->data['details']=$this->input->post('details');
            $this->load->view('feedback-form', $this->data);

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

        $this->data['searchpage'] = $this->Searchm->getpage();
        $this->data['searchnews'] = $this->Searchm->getNews();
        $this->data['searchevents'] = $this->Searchm->getEvents();
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