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
    public function validate_userForForgetPass($data)
    {

        $useremail = $this->input->post('useremail');
//        $password = $this->input->post('password');

        $q=$this->db->where(['email'=>$useremail])
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
    public function findUserForPasswordChange($email,$token)
    {


        $q=$this->db->where(['email'=>$email,'activationToken'=>$token])
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

    public function changeToken_userForForgetPass($id,$userToken)
    {
        $data = array(
            'activationToken' => $userToken,

        );
        $this->db->where('id', $id);
        $error=$this->db->update('studentregistration', $data);
        if (empty($error))
        {

            return $this->db->error();
        }
        else {

            return $error = null;
        }



    }
    public function PasswordChangeForUser($id,$data)
    {

        $this->db->where('id', $id);
        $error=$this->db->update('studentregistration', $data);
        if (empty($error))
        {

            return $this->db->error();
        }
        else {

            return $error = null;
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