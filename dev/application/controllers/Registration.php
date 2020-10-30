<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
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
        $this->load->view('student-registration',$this->data);
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
    public function activateUser()
    {
        $id=$this->input->post('userId');
        $token=$this->input->post('userToken');
//        $id=9;
//        $token='001317772eb8460a204df4200aef7ac5';
        $userValidation=$this->Registrationm->checkUserForActive($id,$token);
        if (!empty($userValidation)){
            $userActivate=$this->Registrationm->makeUserActive($id);
            if (empty($userActivate)){

                $this->session->set_flashdata('successMessage','User Activated Successfully');
                redirect('Login/loginAfterRegistration/'.$id);


            }else{

                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Home');

            }
        }else{

            $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Contact us!!');
            redirect('Registration');

        }







    }

    public function newRegistaion()
    {
        $this->load->library('form_validation');

            if (!$this->form_validation->run('studentRegistation')) {

                $this->menu();
                $this->load->view('student-registration',$this->data);
            }
            else
            {

            $type=$this->input->post('type');
            $title = $this->input->post('title');
            $firstname = $this->input->post('firstname');
            $surname = $this->input->post('surname');
            $email = $this->input->post('email');
//            $gender = $this->input->post('gender');
            $password = $this->input->post('password');
            $confirmpassword = $this->input->post('confirmpassword');

            if($password==$confirmpassword ) {



                $activationToken=md5(uniqid(rand(), true));




                $data = array(
                    'type'=>$type,
                    'title' => $title,
                    'firstname' => $firstname,
                    'surname' => $surname,
                    'email' => $email,
//                    'gender' => $gender,
                    'password' => $password,
                    'accountActivation'=>'0',
                    'activationToken'=>$activationToken


                );

                $this->data['userId']=$this->Registrationm->newRegistaion($data);



                if (!empty($this->data['userId'])) {

                    $this->data['info']=array('email'=>$email,'token'=>$activationToken ,'userId'=>$this->data['userId'],
						'title'=>$title,'firstname'=>$firstname,'surname'=>$surname,);

                    $this->load->helper(array('email'));
                    $this->load->library(array('email'));

                    $this->email->set_mailtype("html");
                    $this->email->from('noreply@iconcollege.ac.uk','Icon College');
                    $this->email->to($email);
                    $this->email->subject('Activate your ICON College online application');
                    $message = $this->load->view('AccountActivationReqeust', $this->data,true);
                    $this->email->message($message);
                    $this->email->send();

//                    if($this->email->send()){
//
//                        $this->session->set_flashdata('successMessage','Registration completed Successfully Please Activate Your Acount via email');
//                        redirect('Login');
//
//                    }
//                    else
//                    {
//                        $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
//                        redirect('Registration');
//                    }



                    $this->session->set_flashdata('successMessage','Your Account Registration has been completed, now you need to activate your account before login.

					<br>Please check your email and Activate Your Account to get started. if you have any problem , please contact us.');
                    redirect('Login');


                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Registration');

                }

            }

            else
            {
                echo "<script>
                            alert('password and confirm password does not match please try again!');
                            window.location.href='".base_url()."Registration';
                            </script>";
            }

        }





    }
}
