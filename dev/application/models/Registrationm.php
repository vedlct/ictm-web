<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Registrationm extends CI_Model
{

    public function newRegistaion($data)
    {
        $this->security->xss_clean($data);
        $error=$this->db->insert('studentregistration', $data);

        $insert_id = $this->db->insert_id();

        return  $insert_id;

//        if (empty($error))
//        {
//
//            return $this->db->error();
//        }
//        else {
//
//            return $error = null;
//        }
    }

    public function checkUserForActive($id,$token)
    {


        $this->db->where('id',$id);
        $this->db->where('accountActivation','0');
        $this->db->where('activationToken',$token);
        $query = $this->db->get('studentregistration');
        return $query->result();

    }
    public function makeUserActive($id)
    {
        $data = array(
            'accountActivation' => '1',

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


}
