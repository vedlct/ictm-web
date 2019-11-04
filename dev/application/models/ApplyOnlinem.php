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
    public function getfirstLanguage($applicationId)
    {

        $this->db->select('firstLanguageEnglish');
        $this->db->where('applicationId', $applicationId);
        $this->db->from('candidateinfo');
        $query = $this->db->get();
        return $query->result();

    }
    public function getFinancerDataFromOthers($applicationId)
    {

        $this->db->select('id,name,title,relation,address,address2,address3,addressPo,city,state,country,mobile,telephone,email');
        $this->db->where('fkApplicationId', $applicationId);
        $this->db->from('financer');
        $query = $this->db->get();
        return $query->result();

    }

    public function getLanguageTestDetails($languagetestId){

        $this->db->select('id,fkTestId,overallScore,expireDate,other');
        $this->db->where('id',$languagetestId);
        $this->db->from('candidatelanguagetest');
        $query=$this->db->get();
        return $query->result();

    }
    public function getLanguageTestHeadDetails($languagetestId){

        $this->db->select('*');
        $this->db->where('fkCandidateTestId',$languagetestId);
        $this->db->from('cadidatelanguagetestscores');
        $query=$this->db->get();
        return $query->result();

    }

    public function getFinancerData($applicationId){

//        $this->db->select('selfFinance');
        $this->db->select('sourceOfFinance');
        $this->db->where('applicationId',$applicationId);
        $this->db->from('candidateinfo');
        $query=$this->db->get();
        return $query->result();

    }

    public function updatApplynow4()
    {

        $selfFinance=$this->input->post('selfFinance');

        $applicationId=$this->session->userdata('studentApplicationId');

        if ($selfFinance =='own'){

            $data1 = array(
                'sourceOfFinance' => 'own',

            );

            $this->db->where('fkApplicationId',$applicationId);
            $this->db->delete('financer');

            $this->db->where('applicationId',$applicationId);
            $error = $this->db->update('candidateinfo', $data1);



        }else if ($selfFinance =='slc'){

            $data2 = array(
                'sourceOfFinance' => 'slc',

            );

            $this->db->where('applicationId',$applicationId);
            $error = $this->db->update('candidateinfo', $data2);

        }
        else{

            $title = $this->input->post('title');
            $name = $this->input->post('name');
            $relation = $this->input->post('relation');
            $address = $this->input->post('address');
            $address2 = $this->input->post('address2');
            $address3 = $this->input->post('address3');
            $addressPo = $this->input->post('addressPo');
            $city = $this->input->post('city');
            $state = $this->input->post('state');
            $mobilee = $this->input->post('mobile');
            $telephone = $this->input->post('telephone');
            $email = $this->input->post('email');
//            $fax = $this->input->post('fax');
//            $AddressPO = $this->input->post('AddressPO');
            $country  = $this->input->post('country');
            $data1 = array(
                'sourceOfFinance' => $selfFinance,

            );

            $data = array(

                'title' => $title,
                'name' => $name,
                'relation' => $relation,
                'address' => $address,
                'address2' => $address2,
                'address3' => $address3,
                'addressPo' => $addressPo,
                'city' => $city,
                'state' => $state,
                'country' => $country,
                'mobile' => $mobilee,
                'telephone' => $telephone,
                'email' => $email,
//                'fax' => $fax,
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

        if ($selfFinance =='own'){

            $data1 = array(
                'sourceOfFinance' => 'own',

            );


            $this->db->where('applicationId',$applicationId);
            $error = $this->db->update('candidateinfo', $data1);



        }else if ($selfFinance =='slc'){

            $data2 = array(
                'sourceOfFinance' => 'slc',

            );

            $this->db->where('applicationId',$applicationId);
            $error = $this->db->update('candidateinfo', $data2);

        }

        else{

            $title = $this->input->post('title');
            $name = $this->input->post('name');
            $relation = $this->input->post('relation');
            $address = $this->input->post('address');
            $address2 = $this->input->post('address2');
            $address3 = $this->input->post('address3');
            $addressPo = $this->input->post('addressPo');
            $city = $this->input->post('city');
            $state = $this->input->post('state');
            $mobilee = $this->input->post('mobile');
            $telephone = $this->input->post('telephone');
            $email = $this->input->post('email');
//            $fax = $this->input->post('fax');
            // $AddressPO = $this->input->post('AddressPO');

            $data1 = array(
                'sourceOfFinance' => $selfFinance,

            );

            $data = array(

                'title' => $title,
                'name' => $name,
                'relation' => $relation,
                'address' => $address,
                'address' => $address,
                'address2' => $address2,
                'address3' => $address3,
                'addressPo' => $addressPo,
                'city' => $city,
                'state' => $state,
                'mobile' => $mobilee,
                'telephone' => $telephone,
                'email' => $email,
//                'fax' => $fax,
                //'addressPo'=>$AddressPO,
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

        $this->db->select('studentapplicationform.id,studentapplicationform.studentApplicationFormId,studentapplicationform.isSubmited,studentregistration.type,');
        $this->db->join('studentregistration', 'studentregistration.id = studentapplicationform.studentOrAgentId','left');
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
    public function getApplicationInfoForStudens($studentOrAgentId)
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

        $this->db->select('title,firstName,surName,otherNames,dateOfBirth,currentAddressCountry,permanentAddressCountry,emergencyContactCountry,gender,ganderChange,
        placeOfBirth,nationality,passportNo,passportExpiryDate,ukEntryDate,visaType,visaExpiryDate,currentAddress,currentAddress2,currentAddress3,currentAddressPo,currentAddressCity,currentAddressState,
        ,overseasAddress,overseasAddressPo,permanentAddress,permanentAddress2,permanentAddress3,permanentAddressCity,permanentAddressState,permanentAddressCountry,telephoneNo,mobileNo,email,fax,emergencyContactName,emergencyContactTitle,emergencyContactRelation,emergencyContactAddress,
        emergencyContactAddress2,emergencyContactAddress3,emergencyContactAddressCity,emergencyContactAddressState,emergencyContactAddressPo,emergencyContactMobile,emergencyContactEmail,courseName, awardingBody, courseLevel,courseStartDate,courseEndDate,
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

        $firstLanguage = $this->input->post('firstLanguage');
        $dataCandidate=array('firstLanguageEnglish'=>$firstLanguage);

        $this->db->where('applicationId',$this->session->userdata('studentApplicationId'));
        $error = $this->db->update('candidateinfo', $dataCandidate);

        if ($firstLanguage == '0') {


            $test = $this->input->post('test[]');
            $listening = $this->input->post('listening[]');
            $reading = $this->input->post('reading[]');
            $writing = $this->input->post('writing[]');
            $speaking = $this->input->post('speaking[]');
            $overall = $this->input->post('overall[]');
            $exirydate = $this->input->post('expirydate[]');
            $other = $this->input->post('other');


            for ($i = 0; $i < count($test); $i++) {

                if ($test[$i] == '4') {
                    $data = array(
                        'fkApplicationId' => $this->session->userdata('studentApplicationId'),
                        'fkTestId' => $test[$i],
                        'other' => $other

                    );
                    $error = $this->db->insert('candidatelanguagetest', $data);
                    // $insert_id = $this->db->insert_id();

                } else {
                    $data = array(
                        'fkApplicationId' => $this->session->userdata('studentApplicationId'),
                        'fkTestId' => $test[$i],
                        'overallScore' => $overall[$i],
                        'expireDate' => date('Y-m-d', strtotime($exirydate[$i])),
                        'other' => $other

                    );

                    //  $error = $this->db->insert('candidatelanguagetest', $data);
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
            }
        }

        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }
    }


    public function applyNow3update(){

        $firstLanguage = $this->input->post('firstLanguage');
        if ($firstLanguage == '1'){

            $dataCandidate=array('firstLanguageEnglish'=>$firstLanguage);

            $this->db->where('applicationId',$this->session->userdata('studentApplicationId'));
            $error = $this->db->update('candidateinfo', $dataCandidate);

            $this->db->where('fkApplicationId',$this->session->userdata('studentApplicationId'));
            $this->db->delete('candidatelanguagetest');

        }else {

            $firstLanguage = $this->input->post('firstLanguage');
            $dataCandidate = array('firstLanguageEnglish' => $firstLanguage);

            $this->db->where('applicationId', $this->session->userdata('studentApplicationId'));
            $error = $this->db->update('candidateinfo', $dataCandidate);


            $test = $this->input->post('test');
            $listening = $this->input->post('listening');
            $reading = $this->input->post('reading');
            $writing = $this->input->post('writing');
            $speaking = $this->input->post('speaking');
            $overall = $this->input->post('overall');
            $exirydate = date('Y-m-d', strtotime($this->input->post('expirydate')));
            $languagetestid = $this->input->post('languagetestid');

            $listeningid = $this->input->post('listeningid');
            $readingid = $this->input->post('readingid');
            $writingid = $this->input->post('writingid');
            $speakingid = $this->input->post('speakingid');

            $other = $this->input->post('other');

            if ($test == '4') {

                $data = array(

                    'fkApplicationId' => $this->session->userdata('studentApplicationId'),
                    'fkTestId' => $test,
                    'other' => $other

                );

                if (empty($languagetestid)) {

                    $error = $this->db->insert('candidatelanguagetest', $data);

                }else{
                    $this->db->where('id', $languagetestid);
                    $error = $this->db->update('candidatelanguagetest', $data);
                }



            } else {

                $data = array(

                    'fkApplicationId' => $this->session->userdata('studentApplicationId'),
                    'fkTestId' => $test,
                    'overallScore' => $overall,
                    'expireDate' => $exirydate,
                    'other' => $other

                );


                if (empty($languagetestid)) {

                    $error = $this->db->insert('candidatelanguagetest', $data);
                    $insert_id = $this->db->insert_id();
                    $data1 = array(
                        'fkCandidateTestId' => $insert_id,
                        'fkTestHeadId' => languageTest['Lisiting'],
                        'score' => $listening,
                    );
                    $data2 = array(
                        'fkCandidateTestId' => $insert_id,
                        'fkTestHeadId' => languageTest['Reading'],
                        'score' => $reading,
                    );
                    $data3 = array(
                        'fkCandidateTestId' => $insert_id,
                        'fkTestHeadId' => languageTest['Speaking'],
                        'score' => $writing,
                    );
                    $data4 = array(
                        'fkCandidateTestId' => $insert_id,
                        'fkTestHeadId' => languageTest['Writing'],
                        'score' => $speaking,
                    );
                    $error = $this->db->insert('cadidatelanguagetestscores', $data1);
                    $error = $this->db->insert('cadidatelanguagetestscores', $data2);
                    $error = $this->db->insert('cadidatelanguagetestscores', $data3);
                    $error = $this->db->insert('cadidatelanguagetestscores', $data4);
                }


                $this->db->where('id', $languagetestid);
                $error = $this->db->update('candidatelanguagetest', $data);
                $data1 = array(

                    'score' => $listening,
                );
                $this->db->where('fkCandidateTestId', $languagetestid);
                $this->db->where('fkTestHeadId', $listeningid);
                $error = $this->db->update('cadidatelanguagetestscores', $data1);


                $data2 = array(
                    'score' => $reading,
                );
                $this->db->where('fkCandidateTestId', $languagetestid);
                $this->db->where('fkTestHeadId', $readingid);
                $error = $this->db->update('cadidatelanguagetestscores', $data2);

                $data3 = array(
                    'score' => $writing,
                );
                $this->db->where('fkCandidateTestId', $languagetestid);
                $this->db->where('fkTestHeadId', $writingid);
                $error = $this->db->update('cadidatelanguagetestscores', $data3);

                $data4 = array(
                    'score' => $speaking,
                );
                $this->db->where('fkCandidateTestId', $languagetestid);
                $this->db->where('fkTestHeadId', $speakingid);
                $error = $this->db->update('cadidatelanguagetestscores', $data4);

            }


        }



//        $error = $this->db->insert('cadidatelanguagetestscores', $data1);
//            $error = $this->db->insert('cadidatelanguagetestscores', $data2);
//            $error = $this->db->insert('cadidatelanguagetestscores', $data3);
//            $error = $this->db->insert('cadidatelanguagetestscores', $data4);



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

        if ($selfFinance =='own'){

            $data1 = array(
                'sourceOfFinance' => 'own',

            );

            $this->db->where('applicationId',$applicationId);
            $error = $this->db->update('candidateinfo', $data1);

        }else if ($selfFinance =='slc'){

            $data2 = array(
                'sourceOfFinance' => 'slc',

            );

            $this->db->where('applicationId',$applicationId);
            $error = $this->db->update('candidateinfo', $data2);

        }

        else{
            $title = $this->input->post('title');
            $name = $this->input->post('name');
            $relation = $this->input->post('relation');
            $address = $this->input->post('address');
            $address2 = $this->input->post('address2');
            $address3 = $this->input->post('address3');
            $city = $this->input->post('city');
            $state = $this->input->post('state');
            $postcode = $this->input->post('addressPo');
            $country = $this->input->post('country');
            $mobilee = $this->input->post('mobile');
            $telephone = $this->input->post('telephone');
            $email = $this->input->post('email');
//            $fax = $this->input->post('fax');
            //    $AddressPO = $this->input->post('AddressPO');

            $data1 = array(
                'sourceOfFinance' => $selfFinance,

            );

            $data = array(

                'title' => $title,
                'name' => $name,
                'relation' => $relation,
                'address' => $address,
                'address2' => $address2,
                'address3' => $address3,
                'city' => $city,
                'state' => $state,
                'addressPo' => $postcode,
                'country' => $country,
                'mobile' => $mobilee,
                'telephone' => $telephone,
                'email' => $email,
//                'fax' => $fax,
                //    'addressPo'=>$AddressPO,
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

        $this->db->select('personequalopportunity.id as personalOpportunityId,personequalopportunity.disabilityAllowance as personalDisabilityAllowance,equalopportunitysubgroup.subGroupTitle,equalopportunitysubgroup.id,equalopportunitygroup.opportunityTitle,equalopportunitygroup.id as groupId');
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

    public function deleteRefereesDetailsById($refereesId){

        $this->db->where('id', $refereesId);
        $this->db->delete('candidatereferees');
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
        $address2 = $this->input->post('address2[]');
        $address3 = $this->input->post('address3[]');
        $postCode = $this->input->post('postCode[]');
        $city = $this->input->post('city[]');
        $state = $this->input->post('state[]');
        $country = $this->input->post('country[]');
        $telephone = $this->input->post('telephone[]');
        $email = $this->input->post('email[]');
        //$addressPo = $this->input->post('addressPo[]');



        for ($i = 0; $i < count($title); $i++) {
            $data = array(
                'fkApplicationId' => $this->session->userdata('studentApplicationId'),
                'name' => $name[$i],
                'title' => $title[$i],
                'workingCompany' => $company[$i],
                'jobTitle' => $jobTitle[$i],
                'postCode' => $postCode[$i],
                'address' => $address[$i],
                'address2' => $address2[$i],
                'address3' => $address3[$i],
                'city' => $city[$i],
                'state' => $state[$i],
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

        $this->db->select('id,name,title,workingCompany,jobTitle,address,address2,address3,city,state,postCode,fkCountry,contactNo,email');
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
            'applydate'=> date('Y-m-d H:i:s'),
        );

        $this->db->where('applicationId',$applicationId);
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

    public function insertApplyForm10(){

        $organisation = $this->input->post('organisation[]');
        $positionHeld = $this->input->post('positionHeld[]');
        $workstryear = $this->input->post("workstryear");
        $workstrmonth = $this->input->post("workstrmonth")+1;
        $workstrdate = $this->input->post("workstrdate")+1;
        if ($workstrmonth < 9){
            $workstrmonth = "0".$workstrmonth;
        }
        if ($workstrdate < 9){
            $workstrdate = "0".$workstrdate;
        }
        $startdate = $workstryear."-".$workstrmonth."-".$workstrdate;

//        $startdate = $this->input->post('startdate[]');

        $workendyear = $this->input->post("workendyear");
        $workendmonth = $this->input->post("workendmonth")+1;
        $workenddate = $this->input->post("workenddate")+1;
        if ($workendmonth < 9){
            $workendmonth = "0".$workendmonth;
        }
        if ($workenddate < 9){
            $workenddate = "0".$workenddate;
        }
        $enddate = $workendyear."-".$workendmonth."-".$workenddate;
//        $enddate = $this->input->post('enddate[]');



        for ($i = 0; $i < count($organisation); $i++) {
            $data = array(
                'fkApplicationId' => $this->session->userdata('studentApplicationId'),
                'organization' => $organisation[$i],
                'positionHeld' => $positionHeld[$i],
                'startDate' => $startdate,
                'endDate' => $enddate,


            );

            $error = $this->db->insert('personexperience', $data);
        }

        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }

    }

    public function getExprerience($applicationId){
        $this->db->select('id,organization,positionHeld,startDate,endDate');
        $this->db->where('fkApplicationId',$applicationId);
        $this->db->from('personexperience');
        $query=$this->db->get();
        return $query->result();

    }


    public function getExprerienceDetails($experienceId){
        $this->db->select('*');
        $this->db->where('id',$experienceId);
        $this->db->from('personexperience');
        $query=$this->db->get();
        return $query->result();

    }
    public function getUserInfo($studentOrAgentId){
        $this->db->select('*');
        $this->db->where('id',$studentOrAgentId);
        $this->db->from('studentregistration');
        $query=$this->db->get();
        return $query->result();

    }

    public function updateUserInfo($data,$id){


        $this->db->where('id', $id);
        $error=$this->db->update('studentregistration', $data);

        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }



    }

    public function applyNow10update(){

        $organisation = $this->input->post('organisation');
        $positionHeld = $this->input->post('positionHeld');
        $workstryear = $this->input->post("workstryear");
        $workstrmonth = $this->input->post("workstrmonth")+1;
        $workstrdate = $this->input->post("workstrdate")+1;
        if ($workstrmonth < 9){
            $workstrmonth = "0".$workstrmonth;
        }
        if ($workstrdate < 9){
            $workstrdate = "0".$workstrdate;
        }
        $startdate = $workstryear."-".$workstrmonth."-".$workstrdate;

//        $startdate = $this->input->post('startdate[]');

        $workendyear = $this->input->post("workendyear");
        $workendmonth = $this->input->post("workendmonth")+1;
        $workenddate = $this->input->post("workenddate")+1;
        if ($workendmonth < 9){
            $workendmonth = "0".$workendmonth;
        }
        if ($workenddate < 9){
            $workenddate = "0".$workenddate;
        }
        $enddate = $workendyear."-".$workendmonth."-".$workenddate;


        //  $startdate = date('Y-m-d',strtotime($this->input->post('startdate')));
        //  $enddate = date('Y-m-d',strtotime($this->input->post('enddate')));
        $experienceid = $this->input->post('experience');

        $data = array(

            'organization' => $organisation,
            'positionHeld' => $positionHeld,
            'startDate' => $startdate,
            'endDate' => $enddate,


        );
        $data1 = array(

            'fkApplicationId' => $this->session->userdata('studentApplicationId'),
            'organization' => $organisation,
            'positionHeld' => $positionHeld,
            'startDate' => $startdate,
            'endDate' => $enddate,

        );
        if (empty($experienceid)){

            $error = $this->db->insert('personexperience', $data1);

        }else{

            //  $error = $this->db->insert('personexperience', $data);

            $this->db->where('id', $experienceid);
            $error=$this->db->update('personexperience', $data);

        }


    }
    public function cancelApplication($applicationId){


        $data1 = array(

            'isSubmited' => '2',

        );

        $this->db->where('id', $applicationId);
        $error=$this->db->update('studentapplicationform', $data1);




    }

    public function deleteExperience($experienceId){

        $this->db->where('id', $experienceId);
        $this->db->delete('personexperience');
    }

    public function deleteLanguageProficiency($LanguageProficiencyId){

        $this->db->where('id', $LanguageProficiencyId);
        $this->db->delete('candidatelanguagetest');

        $this->db->where('fkCandidateTestId', $LanguageProficiencyId);
        $this->db->delete('cadidatelanguagetestscores');


    }
}