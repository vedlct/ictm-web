<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loginm extends CI_Model {


    public function validate_user($data)
    {

        $useremail = $this->input->post('useremail');
        $password  = $this->input->post('password');
        $this->db->where('userEmail', $useremail);
        $this->db->where('UserPassword', $password);

        return $this->db->get('ictmusers')->row();
    }
    public function get_userole($id)
    {
        $this->db->where('roleId', $id);
        $this->db->where('roleStatus', 'Active');
        return $this->db->get('ictmrole')->row();
    }

}