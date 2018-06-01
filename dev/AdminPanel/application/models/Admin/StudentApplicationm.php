<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class StudentApplicationm extends CI_Model
{
    public function personalDetails($applicationId){

        $this->db->select('title,firstName,surName,otherNames,dateOfBirth,gender,placeOfBirth,nationality,passportNo,passportExpiryDate,ukEntryDate,visaExpiryDate,visaType');
        $this->db->where('applicationId =', $applicationId);
        $query = $this->db->get('candidateinfo');
        return $query->result();

    }

    public function contactDetails(){


    }

    public function emmergancyContact(){


    }

    public function courseDetails(){


    }

    public function qualifications(){


    }

    public function workExperience(){


    }

    public function  languageProficiency(){

    }

    public function  personalStatement(){


    }

     public function  finance(){


    }

     public function  equalOppurtunities(){


    }

     public function  referees(){


    }


}
?>