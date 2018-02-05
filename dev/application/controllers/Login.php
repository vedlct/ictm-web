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

    public  function check_user()
    {
        $this->load->library('form_validation');

            $result = $this->Loginm->validate_user($_POST);
            if(!empty($result)) {
                $data = [
                    'email' => $result->email,
                    'id'=>$result->id,
                    'type'=>$result->type,
                    'title'=>$result->title,
                    'loggedin'=>"true",
                ];
                $this->session->set_userdata($data);

                    redirect('Home');
                }

            else
            {
                echo "<script>
                    alert(' Wrong UserEmail and Password !! ');
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
        redirect('Login');
    }





}
