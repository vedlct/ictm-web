<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Registrationm extends CI_Model
{

    public function newRegistaion($data)
    {
        $this->security->xss_clean($data);
        $error=$this->db->insert('studentregistration', $data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else {

            return $error = null;
        }
    }

}
