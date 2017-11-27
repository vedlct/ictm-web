<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Loginm');
    }
    public function index()
    {
        $this->load->view('Admin/login');
    }

    public  function check_user()
    {
        $this->load->library('form_validation');

        if(!$this->form_validation->run('signin'))
        {
            $this->load->view('Admin/login');
        }
        else{
            $result = $this->Loginm->validate_user($_POST);
            if(!empty($result)) {
                $id = $result->roleId;
                $role= $this->Loginm->get_userole($id);

                $data = [
                    'userEmail' => $result->userEmail,
                    'id'=>$result->userId,
                    'type'=>$role->roleName,
                    'loggedin'=>"true",
                ];
                $this->session->set_userdata($data);
                if ($this->session->userdata('type') == USER_TYPE[0]){

                    redirect('Admin/Home');
                }else {


                }
            }
            else
            {
                echo "<script>
                    alert(' Wrong UserEmail and Password !! ');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
            }
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('Admin/Login');
    }

    public function changePass()
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->load->view('Admin/passwordChange');
        } else {

            redirect('Admin/Login');
        }
    }


    public function resetPassword()
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('resetPassword')) {

                $this->load->view('Admin/passwordChange');
            }
        } else {

            redirect('Admin/Login');
        }
    }
}
