<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Loginm');
    }
    public function index()
    {
        $this->load->view('login');
    }
    public  function check_user()
    {
        if(!$this->form_validation->run('signin'))
        {
            $this->load->view('login');
        }
        else{
            $result = $this->Loginm->validate_user($_POST);
            if(!empty($result)) {
                $id = $result->roleId;
                echo $id;
                $role= $this->Loginm->get_userole($id);

                $data = [
                    'username' => $result->userTitle,
                    'id'=>$result->userId,
                    'type'=>$role->roleName,
                    'loggedin'=>"true",
                ];
                $this->session->set_userdata($data);
                if ($this->session->userdata('type') == "Admin"){

                    redirect('Welcome');
                }else {

                }
            }
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('Login');
    }
}
