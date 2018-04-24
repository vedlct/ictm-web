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
            $gender = $this->input->post('gender');
            $password = $this->input->post('password');
            $confirmpassword = $this->input->post('confirmpassword');

            if($password==$confirmpassword ) {

                $data = array(
                    'type'=>$type,
                    'title' => $title,
                    'firstname' => $firstname,
                    'surname' => $surname,
                    'email' => $email,
                    'gender' => $gender,
                    'password' => $password,


                );

                $this->data['error']=$this->Registrationm->newRegistaion($data);

                if (empty($this->data['error'])) {


                    $this->menu();
                    $this->load->view("login",$this->data);


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