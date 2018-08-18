<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class studentApplicationPdfm extends CI_Model
{
    public function personalDetails($applicationId){

        $this->db->select('title,firstName,surName,otherNames,dateOfBirth,ganderChange,gender,placeOfBirth,nationality,passportNo,passportExpiryDate,ukEntryDate,visaExpiryDate,visaType');
        $this->db->where('applicationId =', $applicationId);
        $query = $this->db->get('candidateinfo');
        return $query->result();

    }
    public function applicationDetails($applicationId){

        $this->db->select('applyDate');
        $this->db->where('applicationId =', $applicationId);
        $query = $this->db->get('candidateinfo');
        return $query->result();

    }

    public function contactDetails($applicationId){

        $this->db->select('currentAddress,currentAddressPo,currentAddressCountry,telephoneNo,mobileNo,email,fax,overseasAddress,overseasAddressPo,permanentAddressCountry, firstLanguageEnglish');
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

    public function courseDetails($applicationId){

        $this->db->select('courseTitle, courseName,courseSession,courseYear,ulnNo,ucasCourseCode,coursedetails.awardingBody as awardbody,courseLevel,courseStartDate, courseEndDate, methodOfStudy, timeOfStudy');
        $this->db->join('ictmcourse', 'ictmcourse.courseId = coursedetails.courseName', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $query = $this->db->get('coursedetails');
        return $query->result();

    }

    public function qualifications($applicationId){

        $this->db->select('qualification, institution,qualificationLevel,awardingBody,subject,completionYear,startDate,endDate,obtainResult');
        $this->db->where('fkApplicationId =', $applicationId);
        $query = $this->db->get('personqualifications');
        return $query->result();

    }

    public function workExperience($applicationId){

        $this->db->select('fkApplicationId,organization,positionHeld,startDate,endDate');
        $this->db->where('fkApplicationId =', $applicationId);
        $query = $this->db->get('personexperience');
        return $query->result();
    }

    public function  languageProficiency($applicationId){

        $this->db->select('* , languagetests.id as ltId, candidatelanguagetest.id as ctestid ');
        $this->db->where('fkApplicationId =', $applicationId);
        $this->db->join('languagetests', 'languagetests.id = candidatelanguagetest.fkTestId', 'left');
        $query = $this->db->get('candidatelanguagetest');
        return $query->result();
    }
    public function  languageProficiencyTestScore(){

        $this->db->select('*');
        $query = $this->db->get('cadidatelanguagetestscores');
        return $query->result();
    }

    public function  personalStatement($applicationId){

        $this->db->select('courseChoiceStatement,collegeChoiceStatement');
        $this->db->where('applicationId =', $applicationId);
        $query = $this->db->get('candidateinfo');
        return $query->result();
    }

    public function  finance($applicationId){

        $this->db->select('financer.*,candidateinfo.sourceOfFinance ');
        $this->db->where('applicationId =', $applicationId);
        $this->db->join('financer', 'financer.fkApplicationId = candidateinfo.applicationId', 'left');
        $query = $this->db->get('candidateinfo');
        return $query->result();
    }

    public function  equalOppurtunitiesGroup(){

        $this->db->select('*');
        $query = $this->db->get('equalopportunitygroup');
        return $query->result();
    }

    public function  equalOppurtunitiesSubGroup(){

        $this->db->select('*');
        $query = $this->db->get('equalopportunitysubgroup');
        return $query->result();
    }
    public function  personequalOppurtunities($applicationId){

        $this->db->select('*');
        $this->db->join('equalopportunitysubgroup', 'equalopportunitysubgroup.id=personequalopportunity.fkEqualOpportunitySubGroupId', 'left');
        $this->db->join('equalopportunitygroup', 'equalopportunitygroup.id=equalopportunitysubgroup.fkGroupId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $query = $this->db->get('personequalopportunity');
        return $query->result();

    }

    public function  referees($applicationId){

        $this->db->select('*');
        $this->db->where('fkApplicationId =', $applicationId);
        $query = $this->db->get('candidatereferees');
        return $query->result();
    }

}