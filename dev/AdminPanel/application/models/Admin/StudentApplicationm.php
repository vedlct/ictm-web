<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class StudentApplicationm extends CI_Model
{
    public function personalDetails($applicationId){

        $this->db->select('title,firstName,surName,otherNames,dateOfBirth,gender,placeOfBirth,nationality,passportNo,passportExpiryDate,ukEntryDate,visaExpiryDate,visaType');
        $this->db->where('applicationId =', $applicationId);
        $query = $this->db->get('candidateinfo');
        return $query->result();

    }

    public function contactDetails($applicationId){

        $this->db->select('currentAddress,currentAddressPo,currentAddressCountry,telephoneNo,mobileNo,email,fax,overseasAddress,overseasAddressPo,permanentAddressCountry');
        $this->db->where('applicationId =', $applicationId);
        $query = $this->db->get('candidateinfo');
        return $query->result();

    }

    public function emmergancyContact($applicationId){

        $this->db->select('emergencyContactName,emergencyContactTitle,emergencyContactRelation,emergencyContactAddress,emergencyContactAddressPo,emergencyContactCountry,emergencyContactMobile,emergencyContactEmail');
        $this->db->where('applicationId =', $applicationId);
        $query = $this->db->get('candidateinfo');
        return $query->result();

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