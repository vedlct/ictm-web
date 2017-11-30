<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loginm extends CI_Model {


    public function validate_user($data)
    {


        $useremail = $this->input->post('useremail');
        $password  = $this->input->post('password');

        $this->db->where('userEmail',$useremail);
        $res=$this->db->get('ictmusers')->row();

        if (!empty($res)) {

            $success=password_verify($password, $res->userPassword);
            if ($success) {
                return $res;
            }
            else{
                return null;
            }

        }
        else{
            return null;
        }
    }
    public function get_userole($id)
    {
        $this->db->where('roleId', $id);
        $this->db->where('roleStatus', 'Active');
        return $this->db->get('ictmrole')->row();
    }
    public function resetPass()
    {
        $userEmail = $this->input->post('email');
        $password  = $this->input->post('pass');
        $conPassword = $this->input->post('conPass');


        $this->db->where('userEmail',$userEmail);
        $query=$this->db->get('ictmusers');

        if (!empty($query->result())) {

            if ($password == $conPassword) {

                $data = array(
                    'userPassword' =>password_hash($conPassword,PASSWORD_BCRYPT),
                    'lastModifiedBy'=>$this->session->userdata('userEmail'),

                );

                $this->db->where('userEmail', $userEmail);
                $error = $this->db->update('ictmusers', $data);

                if (empty($error)) {
                    return $this->db->error();
                } else {
                    return $error = null;
                }
            }
        }
        else{
            $this->session->set_flashdata('errorMessage','Email does not match');
            redirect('Admin/Login/changePass');
        }
    }

}