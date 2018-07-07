<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loginm extends CI_Model {


    public function validate_user($data)
    {

        $useremail = $this->input->post('useremail');
        $password = $this->input->post('password');

        $q=$this->db->where(['email'=>$useremail,'password'=>$password,'accountActivation'])
            ->get('studentregistration');

        if($q->num_rows())
        {
            return $q->row();
        }


        else
        {
            return false;
        }
    }
    public function validate_userAfterActivatation($id)
    {



        $q=$this->db->where(['id'=>$id])
            ->get('studentregistration');

        if($q->num_rows())
        {
            return $q->row();
        }


        else
        {
            return false;
        }
    }



}