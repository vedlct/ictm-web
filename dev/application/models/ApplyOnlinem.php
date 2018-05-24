<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class ApplyOnlinem extends CI_Model
{
    public function insertStudentApplicationForm($data3){

        $this->security->xss_clean($data3);
        $error=$this->db->insert('studentapplicationform', $data3);

        $insert_id = $this->db->insert_id();
        return  $insert_id;


    }

    public function insertApplyForm1($data,$data1)
    {

        $data=$this->security->xss_clean($data);
        $error=$this->db->insert('candidateinfo', $data);

        if (empty($error)) {
            return $this->db->error();
        } else {

            $data2 = array(
                'fkApplicationId' => $this->session->userdata('studentApplicationId'),
            );
            $newdata1 = array_merge($data1, $data2);
            $newdata1 = $this->security->xss_clean($newdata1);
            $error=$this->db->insert('coursedetails', $newdata1);

            if (empty($error)) {
                return $this->db->error();
            } else {
                return $error = null;
            }

        }

    }

    public function editApplyform1($data,$data1){

        $id = $this->session->userdata('studentApplicationId');

        $data=$this->security->xss_clean($data);
        $this->db->where('applicationId', $id);
        $error=$this->db->update('candidateinfo', $data);
        if (empty($error)) {
            return $this->db->error();
        } else {

            $data1 = $this->security->xss_clean($data1);

            $this->db->where('fkApplicationId', $id);
            $error=$this->db->update('coursedetails', $data1);
            if (empty($error)) {
                return $this->db->error();
            } else {
                return $error = null;
            }

        }
    }
    public function getQualifications($applicationId){

        $this->db->select('id,qualification,institution,qualificationLevel,awardingBody,subject,completionYear,obtainResult');
        $this->db->where('fkApplicationId',$applicationId);
        $this->db->from('personqualifications');
        $query=$this->db->get();
        return $query->result();


    }
    public function getlanguagetest($applicationId)
    {

        $this->db->select('*');
        $this->db->where('fkApplicationId', $applicationId);
        $this->db->from('candidatelanguagetest');
        $query = $this->db->get();
        return $query->result();

    }


        public function getFinancerData($applicationId){

        $this->db->select('selfFinance');
        $this->db->where('applicationId',$applicationId);
        $this->db->from('candidateinfo');
        $query=$this->db->get();
        foreach ($query->result() as $selfFinance){
            $finance=$selfFinance->selfFinance;
        }
        if (!empty($finance)) {
            if ($finance == 'y') {
                return $finance;
            } elseif ($finance == 'n') {

                $this->db->select('id,name,title,relation,address,addressPo,mobile,telephone,email,fax');
                $this->db->where('fkApplicationId', $applicationId);
                $this->db->from('financer');
                $query = $this->db->get();
                return $query->result();


            }
        }else{
            return null;
        }

    }

    public function updatApplynow4()
    {

        $selfFinance=$this->input->post('selfFinance');

        $applicationId=$this->session->userdata('studentApplicationId');

        if ($selfFinance =='y'){

            $data1 = array(
                'selfFinance' => 'y',

            );

            $this->db->where('fkApplicationId',$applicationId);
            $this->db->delete('financer');

            $this->db->where('applicationId',$applicationId);
            $error = $this->db->update('candidateinfo', $data1);



        }else{

            $title = $this->input->post('title');
            $name = $this->input->post('name');
            $relation = $this->input->post('relation');
            $address = $this->input->post('address');
            $mobilee = $this->input->post('mobile');
            $telephone = $this->input->post('telephone');
            $email = $this->input->post('email');
            $fax = $this->input->post('fax');
            $AddressPO = $this->input->post('AddressPO');

            $data1 = array(
                'selfFinance' => 'n',

            );

            $data = array(

                'title' => $title,
                'name' => $name,
                'relation' => $relation,
                'address' => $address,
                'mobile' => $mobilee,
                'telephone' => $telephone,
                'email' => $email,
                'fax' => $fax,
                'addressPo'=>$AddressPO,
                'fkApplicationId'=>$applicationId

            );

            $this->db->where('applicationId',$applicationId);
            $this->db->update('candidateinfo', $data1);

            $this->db->where('fkApplicationId',$applicationId);
            $error = $this->db->update('financer',$data);


        }




        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }
    }
    public function editORInsertApplicationForm4()
    {

        $selfFinance=$this->input->post('selfFinance');

        $applicationId=$this->session->userdata('studentApplicationId');

        if ($selfFinance =='y'){

            $data1 = array(
                'selfFinance' => 'y',

            );


            $this->db->where('applicationId',$applicationId);
            $error = $this->db->update('candidateinfo', $data1);



        }else{

            $title = $this->input->post('title');
            $name = $this->input->post('name');
            $relation = $this->input->post('relation');
            $address = $this->input->post('address');
            $mobilee = $this->input->post('mobile');
            $telephone = $this->input->post('telephone');
            $email = $this->input->post('email');
            $fax = $this->input->post('fax');
            $AddressPO = $this->input->post('AddressPO');

            $data1 = array(
                'selfFinance' => 'n',

            );

            $data = array(

                'title' => $title,
                'name' => $name,
                'relation' => $relation,
                'address' => $address,
                'mobile' => $mobilee,
                'telephone' => $telephone,
                'email' => $email,
                'fax' => $fax,
                'addressPo'=>$AddressPO,
                'fkApplicationId'=>$applicationId

            );

            $this->db->where('applicationId',$applicationId);
            $this->db->update('candidateinfo', $data1);


            $error = $this->db->insert('financer',$data);


        }




        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }
    }

    public function getQualificationsDetails($qualificationId)
    {

//        $this->db->select('id,qualification,institution,startDate,endDate,obtainResult');
        $this->db->select('id,qualification,institution,qualificationLevel,awardingBody,subject,completionYear,obtainResult');
        $this->db->where('id',$qualificationId);
        $this->db->from('personqualifications');
        $query=$this->db->get();
        return $query->result();


    }
    public function getApplicationId($studentOrAgentId)
    {

        $this->db->select('id,studentApplicationFormId,isSubmited');
        $this->db->where('studentOrAgentId',$studentOrAgentId);
        $this->db->from('studentapplicationform');
        $query=$this->db->get();
        return $query->result();


    }
    public function getApplicationInfoForAgent($studentOrAgentId)
    {

        $this->db->select('studentapplicationform.id,studentapplicationform.isSubmited,candidateinfo.title,candidateinfo.firstName,candidateinfo.surName,candidateinfo.email');
        $this->db->join('candidateinfo', 'candidateinfo.applicationId = studentapplicationform.id','left');
        $this->db->where('studentapplicationform.studentOrAgentId',$studentOrAgentId);
        $this->db->from('studentapplicationform');
        $query=$this->db->get();
        return $query->result();


    }

    public function deleteQualifications($qualificationId)
    {

        $this->db->where('id', $qualificationId);
        $this->db->delete('personqualifications');


    }
    public function getCandidateInfo($studentApplicationId)
    {

        $this->db->select('title,firstName,surName,otherNames,dateOfBirth,currentAddressCountry,permanentAddressCountry,emergencyContactCountry,gender,
        placeOfBirth,nationality,passportNo,passportExpiryDate,ukEntryDate,visaType,visaExpiryDate,currentAddress,currentAddressPo,overseasAddress,
        overseasAddressPo,telephoneNo,mobileNo,email,fax,emergencyContactName,emergencyContactTitle,emergencyContactRelation,emergencyContactAddress,
        emergencyContactAddressPo,emergencyContactMobile,emergencyContactEmail,courseName, awardingBody, courseLevel,courseStartDate,courseEndDate,
        methodOfStudy,courseSession,courseYear,timeOfStudy,ulnNo,ucasCourseCode');
        $this->db->join('coursedetails', 'coursedetails.fkApplicationId = candidateinfo.applicationId','left');
        $this->db->where('applicationId',$studentApplicationId);
        $this->db->from('candidateinfo');
        $query=$this->db->get();
        return $query->result();


    }

    public function applyNow2Insert()
    {
        $qualification = $this->input->post('qualification[]');
        $institution = $this->input->post('institution[]');
//        $startdate = $this->input->post('startdate[]');
//        $enddate = $this->input->post('enddate[]');
        $grade = $this->input->post('grade[]');

        $qualificationLevel = $this->input->post('qualificationLevel[]');
        $awardingBody = $this->input->post('awardingBody[]');
        $subject = $this->input->post('subject[]');
        $completionYear = $this->input->post('completionYear[]');


        for ($i = 0; $i < count($qualification); $i++) {
            $data = array(
                'fkApplicationId' => $this->session->userdata('studentApplicationId'),
                'qualification' => $qualification[$i],
                'institution' => $institution[$i],
//                'startDate' => $startdate[$i],
//                'endDate' => $enddate[$i],
                'obtainResult' => $grade[$i],

                'qualificationLevel' => $qualificationLevel[$i],
                'awardingBody' => $awardingBody[$i],
                'subject' => $subject[$i],
                'completionYear' => $completionYear[$i],


            );


            $error = $this->db->insert('personqualifications', $data);
        }

        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }
    }


    public function applyNow3Insert()
    {
        $test = $this->input->post('test[]');
        $listening = $this->input->post('listening[]');
        $reading = $this->input->post('reading[]');
        $writing = $this->input->post('writing[]');
        $speaking = $this->input->post('speaking[]');
        $overall = $this->input->post('overall[]');
        $exirydate = $this->input->post('expirydate[]');
        $other = $this->input->post('other');




        for ($i = 0; $i < count($test); $i++) {
            $data = array(
                'fkApplicationId' => $this->session->userdata('studentApplicationId'),
                'fkTestId' => $test[$i],
                'overallScore' => $overall[$i],
                'expireDate' => $exirydate[$i],

            );

            $error = $this->db->insert('candidatelanguagetest', $data);
            $insert_id = $this->db->insert_id();


            $data1 = array(
                'fkCandidateTestId' => $insert_id,
                'fkTestHeadId' => languageTest['Lisiting'],
                'score' => $listening[$i],
            );
            $data2 = array(
                'fkCandidateTestId' => $insert_id,
                'fkTestHeadId' => languageTest['Reading'],
                'score' => $reading[$i],
            );
            $data3 = array(
                'fkCandidateTestId' => $insert_id,
                'fkTestHeadId' => languageTest['Speaking'],
                'score' => $writing[$i],
            );
            $data4 = array(
                'fkCandidateTestId' => $insert_id,
                'fkTestHeadId' => languageTest['Writing'],
                'score' => $speaking[$i],
            );

            $error = $this->db->insert('cadidatelanguagetestscores', $data1);
            $error = $this->db->insert('cadidatelanguagetestscores', $data2);
            $error = $this->db->insert('cadidatelanguagetestscores', $data3);
            $error = $this->db->insert('cadidatelanguagetestscores', $data4);

        }

        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }
    }
    public function insertnewfrom4()
    {
        $selfFinance=$this->input->post('selfFinance');

        $applicationId=$this->session->userdata('studentApplicationId');

        if ($selfFinance =='y'){

            $data1 = array(
                'selfFinance' => 'y',

            );

            $this->db->where('applicationId',$applicationId);
            $error = $this->db->update('candidateinfo', $data1);

        }else{
            $title = $this->input->post('title');
            $name = $this->input->post('name');
            $relation = $this->input->post('relation');
            $address = $this->input->post('address');
            $mobilee = $this->input->post('mobile');
            $telephone = $this->input->post('telephone');
            $email = $this->input->post('email');
            $fax = $this->input->post('fax');
            $AddressPO = $this->input->post('AddressPO');

            $data1 = array(
                'selfFinance' => 'n',

            );

            $data = array(

                'title' => $title,
                'name' => $name,
                'relation' => $relation,
                'address' => $address,
                'mobile' => $mobilee,
                'telephone' => $telephone,
                'email' => $email,
                'fax' => $fax,
                'addressPo'=>$AddressPO,
                'fkApplicationId'=>$applicationId

            );

            $this->db->where('applicationId',$applicationId);
            $this->db->update('candidateinfo', $data1);


            $error = $this->db->insert('financer', $data);

        }

        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }

    }

    public function editQualificationsDetailsById($qualificationId,$data)
    {

        $this->db->where('id',$qualificationId);
        $error = $this->db->update('personqualifications',$data);

        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }
    }
    public function updateApplyNow6personal($id,$data1)
    {

        $this->db->where('id',$id);
        $error = $this->db->update('personequalopportunity',$data1);

        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }
    }


    public function insertQualificationsDetailsFromEdit($data)
    {

        $this->security->xss_clean($data);
        $error = $this->db->insert('personqualifications',$data);

        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }
    }

    public function getPersonalStatementData($applicationId){

        $this->db->select('courseChoiceStatement,collegeChoiceStatement');
        $this->db->where('applicationId',$applicationId);
        $this->db->from('candidateinfo');
        $query=$this->db->get();
        return $query->result();


    }

    public function updatApplynow5()
    {
        $applicationId=$this->session->userdata('studentApplicationId');

        $courseChoiceStatement = $this->input->post('courseChoiceStatement');
        $collegeChoiceStatement = $this->input->post('collegeChoiceStatement');

        $data = array(
            'courseChoiceStatement' => $courseChoiceStatement,
            'collegeChoiceStatement' => $collegeChoiceStatement

        );

        $error=$this->db->where('applicationId',$applicationId)->update('candidateinfo',$data);
        if (empty($error))
        {
            return $this->db->error();
        }
        else {

            return $error = null;
        }
    }

    public  function checkopportunityTitle()
    {
        $this->db->select('id,opportunityTitle');
        $this->db->from('equalopportunitygroup');
        $query=$this->db->get();
        return $query->result();
    }
    public  function getOpportunitySubGroupId()
    {
        $this->db->select('id,fkGroupId,subGroupTitle');
        //$this->db->join('equalopportunitygroup', 'equalopportunitygroup.id=equalopportunitysubgroup.fkGroupId', 'left');
        $this->db->from('equalopportunitysubgroup');
        $query=$this->db->get();
        return $query->result();
    }

    public function getAllEqualOpportunity()

    {
        $applicationId=$this->session->userdata('studentApplicationId');

        $this->db->select('personequalopportunity.id as personalOpportunityId,equalopportunitysubgroup.subGroupTitle,equalopportunitysubgroup.id,equalopportunitygroup.opportunityTitle,equalopportunitygroup.id as groupId');
        $this->db->join('equalopportunitysubgroup', 'equalopportunitysubgroup.id=personequalopportunity.fkEqualOpportunitySubGroupId', 'left');
        $this->db->join('equalopportunitygroup', 'equalopportunitygroup.id=equalopportunitysubgroup.fkGroupId', 'left');
        $this->db->where('personequalopportunity.fkApplicationId=',$applicationId);
        $this->db->from('personequalopportunity');
        $query=$this->db->get();
        return $query->result();


    }
    public function getAllRefences()

    {
        $applicationId=$this->session->userdata('studentApplicationId');

        $this->db->select('id, name,title,workingCompany,jobTitle,address,postCode,fkCountry,contactNo,email');
        $this->db->where('fkApplicationId',$applicationId);
        $this->db->from('candidatereferees');
        $query=$this->db->get();
        return $query->result();


    }

    public function insertApplyNow6($data)
    {
        $this->security->xss_clean($data);
        $this->db->insert('equalopportunitysubgroup', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;

    }

    public function insertapplyNow6personal($data1)
    {

        $error=$this->db->insert('personequalopportunity', $data1);
        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }

    }

    public function insertAllReferees()
    {
        $title = $this->input->post('title[]');
        $name = $this->input->post('name[]');
        $company = $this->input->post('company[]');
        $jobTitle = $this->input->post('jobTitle[]');
        $address = $this->input->post('address[]');
        $telephone = $this->input->post('telephone[]');
        $email = $this->input->post('email[]');
        $country = $this->input->post('country[]');
        $addressPo = $this->input->post('addressPo[]');



        for ($i = 0; $i < count($title); $i++) {
            $data = array(
                'fkApplicationId' => $this->session->userdata('studentApplicationId'),
                'name' => $name[$i],
                'title' => $title[$i],
                'workingCompany' => $company[$i],
                'jobTitle' => $jobTitle[$i],
                'address' => $address[$i],
                'postCode' => $addressPo[$i],
                'contactNo' => $telephone[$i],
                'email' => $email[$i],
                'fkCountry' => $country[$i],

            );


            $error = $this->db->insert('candidatereferees', $data);
        }

        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }
    }

    public function getRefereesDetails($refereesId)
    {

        $this->db->select('id,name,title,workingCompany,jobTitle,address,postCode,fkCountry,contactNo,email');
        $this->db->where('id',$refereesId);
        $this->db->from('candidatereferees');
        $query=$this->db->get();
        return $query->result();


    }

    public function editRefereesDetailsById($refereesId,$data)
    {

        $this->db->where('id',$refereesId);
        $error = $this->db->update('candidatereferees',$data);

        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }
    }

    public function insertRefereesDetailsFromEdit($data)
    {

        $this->security->xss_clean($data);
        $error = $this->db->insert('candidatereferees',$data);

        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }
    }

    public function insertApplyForm9()
    {
        $applicationId=$this->session->userdata('studentApplicationId');
        $data1=array(
            'applydate'=>date('Y-m-d H:i:s'),
        );

        $this->db->where('id',$applicationId);
        $error = $this->db->update('candidateinfo',$data1);

        $data = array(
            'isSubmited' => '1',

        );

        $this->db->where('id',$applicationId);
        $error = $this->db->update('studentapplicationform',$data);

        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }
    }

}