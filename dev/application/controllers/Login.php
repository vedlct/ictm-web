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
                    'id' => $result->id,
                    'type' => $result->type,
                    'title' => $result->title,
                    'loggedin' => "true",
                ];
                $this->session->set_userdata($data);

                $studentOrAgentId = $result->id;


                if ($result->type == 'Student') {

                    redirect('Apply');

                }
                elseif ($result->type == 'Agent') {

                    redirect('AllFormForAgents');


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

    public function logout(){
        $this->session->sess_destroy();
        redirect('Login');
    }





}
