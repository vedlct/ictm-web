<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Loginm');
        $this->load->model('Homem');
        $this->load->model('Menum');
        $this->load->model('CollegeInfom');
        $this->load->model('Photom');
        $this->load->model('Registrationm');
        $this->load->model('Searchm');
    }
    public function index()
    {
        $this->menu();
        $this->load->view('login',$this->data);
    }
    public function ViewForgetPass()
    {
        $this->menu();
        $this->load->view('forget-pass',$this->data);
    }

    public  function check_user()
    {
        $this->load->library('form_validation');

            $result = $this->Loginm->validate_user($_POST);
            if(!empty($result)) {
                if ($result->accountActivation=='0'){

                    echo "<script>
                    alert(' Please Activate Your Account First !! ');
                    window.location.href= '" . base_url() . "Login';
                    </script>";

                }else {


                    $data = [
                        'email' => $result->email,
                        'id' => $result->id,
                        'type' => $result->type,
                        'title' => $result->title,
                        'loggedin' => "true",
                    ];

                    $this->session->set_userdata($data);

                    $studentOrAgentId = $result->id;


                    if ($result->type == 'Student') {

//                        redirect('Apply');
                        redirect('AllFormForStudents');

                    } elseif ($result->type == 'Agent') {

                        redirect('AllFormForAgents');


                    }
                }
            }
            else
            {
                echo "<script>
                    alert(' Wrong UserEmail and Password !! ');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
            }

    }
    public  function changeForgetPassword()
    {


            $result = $this->Loginm->validate_userForForgetPass($_POST);
            if(!empty($result)) {
                if ($result->accountActivation=='0'){

                    echo "<script>
                    alert(' Please Activate Your Account First !! ');
                    window.location.href= '" . base_url() . "ForgetPass';
                    </script>";

                }else {
                    $this->load->helper('string');
                    $userToken=random_string('alnum',64);

                    $this->Loginm->changeToken_userForForgetPass($result->id,$userToken);


                    $this->data['mailData']= array(
                        'email' => $result->email,
                        'password' => $this->input->post('password'),
                        'Token' => $userToken,
                    );

                    $this->load->helper(array('email'));
                    $this->load->library(array('email'));

                    $this->email->set_mailtype("html");
                    $this->email->from('noreply@techcloudltd.com','Icon College');
                    $this->email->to($result->email);
                    $this->email->subject('Forget Password Reqeust');
                    $message = $this->load->view('ForgetPasswordReqeust', $this->data,true);
                    $this->email->message($message);
                    $this->email->send();

                    $this->session->set_flashdata('successMessage','A Password Change varification is send via email');
                    redirect('ForgetPass');


                }
            }
            else
            {
                $this->session->set_flashdata('errorMessage','Please Type Your Mail Correctly or Register First');
                redirect('ForgetPass');
            }

    }
    public  function ChangedPass($email,$pas,$token)
    {


            $result = $this->Loginm->findUserForPasswordChange($email,$token);
            if(!empty($result)) {

                $data=array(
                    'password'=>$pas,
                    'activationToken'=>null,
                );
                $result = $this->Loginm->PasswordChangeForUser($result->id,$data);

                $this->session->set_flashdata('successMessage','Password Changed SuccessFully');

                redirect('Login');

            }

    }
    public  function loginAfterRegistration($id)
    {


            $result = $this->Loginm->validate_userAfterActivatation($id);
            if(!empty($result)) {



                    $data = [
                        'email' => $result->email,
                        'id' => $result->id,
                        'type' => $result->type,
                        'title' => $result->title,
                        'loggedin' => "true",
                    ];

                    $this->session->set_userdata($data);

                    $studentOrAgentId = $result->id;


                    if ($result->type == 'Student') {

//                        redirect('Apply');
                        redirect('AllFormForStudents');

                    } elseif ($result->type == 'Agent') {

                        redirect('AllFormForAgents');


                    }

            }
            else
            {
                echo "<script>
                    alert(' Some thing Went Wrong !! Please Contact us !! ');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
            }

    }
    public function menu() //  get all the menu+ footer
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

    public function logout(){
        $this->session->sess_destroy();
        redirect('Home');
    }





}
