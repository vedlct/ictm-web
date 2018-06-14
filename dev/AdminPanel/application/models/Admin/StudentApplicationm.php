<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class StudentApplicationm extends CI_Model
{
    /////////datatable//////////
    var $table = 'candidateinfo';

    var $select =array('candidateinfo.id','studentapplicationform.studentApplicationFormId','candidateinfo.title','candidateinfo.firstName','candidateinfo.surName','candidateinfo.applydate','candidateinfo.email','candidateinfo.mobileNo','coursedetails.courseName');
    var $column_order = array(null,null,null,'studentapplicationform.studentApplicationFormId','candidateinfo.title','candidateinfo.firstName','candidateinfo.surName','coursedetails.courseName','candidateinfo.applydate'); //set column field database for datatable orderable
    var $column_search = array('candidateinfo.email','candidateinfo.mobileNo','coursedetails.courseName','studentapplicationform.studentApplicationFormId','candidateinfo.title','candidateinfo.firstName','candidateinfo.surName','candidateinfo.applydate'); //set column field database for datatable searchable
    var $order = array('id' => 'desc'); // default order

    private function _get_datatables_query()
    {


        $this->db->select($this->select);
        $this->db->join('studentapplicationform', 'studentapplicationform.id = candidateinfo.applicationId','left');
        $this->db->join('coursedetails', 'coursedetails.fkApplicationId = candidateinfo.applicationId','left');
        $this->db->where('studentapplicationform.isSubmited','1');
        $this->db->from($this->table);



        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {

        $this->_get_datatables_query();

        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


    ///////////////////end of datatable/////////////////////////////



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

         $this->db->select('financer.*,sourceOfFinance ');
         $this->db->where('fkApplicationId =', $applicationId);
         $this->db->join('candidateinfo', 'candidateinfo.applicationId = financer.fkApplicationId', 'left');
         $query = $this->db->get('financer');
         return $query->result();
    }

     public function  equalOppurtunitiesgroup(){


    }

    public function  equalOppurtunities(){


    }

     public function  referees($applicationId){

         $this->db->select('*');
         $this->db->where('fkApplicationId =', $applicationId);
         $query = $this->db->get('candidatereferees');
         return $query->result();
    }

    /* for student Application edit */

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
    public function getCourseInfo() //get the course information for online
    {
        $this->db->select('courseId,courseTitle');
        $this->db->where('courseStatus =', STATUS[0]);
        $query = $this->db->get('ictmcourse');
        return $query->result();
    }

    public function getCourseAwardBody($courseId) //get the course AwardBody for online
    {
        $this->db->select('awardingBody');
        $this->db->where('courseStatus =', STATUS[0]);
        $this->db->where('courseId =', $courseId);
        $query = $this->db->get('ictmcourse');
        return $query->result();
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

    public function getQualificationsDetails($qualificationId)
    {

//        $this->db->select('id,qualification,institution,startDate,endDate,obtainResult');
        $this->db->select('id,qualification,institution,qualificationLevel,awardingBody,subject,completionYear,obtainResult');
        $this->db->where('id',$qualificationId);
        $this->db->from('personqualifications');
        $query=$this->db->get();
        return $query->result();


    }

    public function deleteQualifications($qualificationId)
    {

        $this->db->where('id', $qualificationId);
        $this->db->delete('personqualifications');


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

    public function getExprerience($applicationId){
        $this->db->select('id,organization,positionHeld,startDate,endDate');
        $this->db->where('fkApplicationId',$applicationId);
        $this->db->from('personexperience');
        $query=$this->db->get();
        return $query->result();

    }

    public function applyNow10update(){

        $organisation = $this->input->post('organisation');
        $positionHeld = $this->input->post('positionHeld');
        $startdate = date('Y-m-d',strtotime($this->input->post('startdate')));
        $enddate = date('Y-m-d',strtotime($this->input->post('enddate')));
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

        }

        //  $error = $this->db->insert('personexperience', $data);

        $this->db->where('id', $experienceid);
        $error=$this->db->update('personexperience', $data);
    }

    public function getfirstLanguage($applicationId)
    {

        $this->db->select('firstLanguageEnglish');
        $this->db->where('applicationId', $applicationId);
        $this->db->from('candidateinfo');
        $query = $this->db->get();
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
    public function getExprerienceDetails($experienceId){
        $this->db->select('*');
        $this->db->where('id',$experienceId);
        $this->db->from('personexperience');
        $query=$this->db->get();
        return $query->result();

    }
    public function deleteExperience($experienceId){

        $this->db->where('id', $experienceId);
        $this->db->delete('personexperience');
    }
    public function applyNow3update(){

        $firstLanguage = $this->input->post('firstLanguage');
        $dataCandidate=array('firstLanguageEnglish'=>$firstLanguage);

        $this->db->where('applicationId',$this->session->userdata('studentApplicationId'));
        $error = $this->db->update('candidateinfo', $dataCandidate);



        $test = $this->input->post('test');
        $listening = $this->input->post('listening');
        $reading = $this->input->post('reading');
        $writing = $this->input->post('writing');
        $speaking = $this->input->post('speaking');
        $overall = $this->input->post('overall');
        $exirydate = date('Y-m-d',strtotime($this->input->post('expirydate')));
        $languagetestid = $this->input->post('languagetestid');

        $listeningid = $this->input->post('listeningid');
        $readingid = $this->input->post('readingid');
        $writingid = $this->input->post('writingid');
        $speakingid = $this->input->post('speakingid');

        $other = $this->input->post('other');


        $data = array(

            'fkApplicationId' => $this->session->userdata('studentApplicationId'),
            'fkTestId' => $test,
            'overallScore' => $overall,
            'expireDate' => $exirydate,
            'other'=>$other

        );



        if (empty($languagetestid)){

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


        $this->db->where('id',$languagetestid);
        $error = $this->db->update('candidatelanguagetest', $data);
        $data1 = array(

            'score' => $listening,
        );
        $this->db->where('fkCandidateTestId',$languagetestid);
        $this->db->where('fkTestHeadId',$listeningid);
        $error = $this->db->update('cadidatelanguagetestscores', $data1);


        $data2 = array(
            'score' => $reading,
        );
        $this->db->where('fkCandidateTestId',$languagetestid);
        $this->db->where('fkTestHeadId',$readingid);
        $error = $this->db->update('cadidatelanguagetestscores', $data2);

        $data3 = array(
            'score' => $writing,
        );
        $this->db->where('fkCandidateTestId',$languagetestid);
        $this->db->where('fkTestHeadId',$writingid);
        $error = $this->db->update('cadidatelanguagetestscores', $data3);

        $data4 = array(
            'score' => $speaking,
        );
        $this->db->where('fkCandidateTestId',$languagetestid);
        $this->db->where('fkTestHeadId',$speakingid);
        $error = $this->db->update('cadidatelanguagetestscores', $data4);





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

    public function getFinancerData($applicationId){

//        $this->db->select('selfFinance');
        $this->db->select('sourceOfFinance');
        $this->db->where('applicationId',$applicationId);
        $this->db->from('candidateinfo');
        $query=$this->db->get();
        return $query->result();

    }

    public function getFinancerDataFromOthers($applicationId)
    {

        $this->db->select('id,name,title,relation,address,addressPo,mobile,telephone,email');
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

    public function deleteLanguageProficiency($LanguageProficiencyId){

        $this->db->where('id', $LanguageProficiencyId);
        $this->db->delete('candidatelanguagetest');

        $this->db->where('fkCandidateTestId', $LanguageProficiencyId);
        $this->db->delete('cadidatelanguagetestscores');


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



        }else{

            $title = $this->input->post('title');
            $name = $this->input->post('name');
            $relation = $this->input->post('relation');
            $address = $this->input->post('address');
            $mobilee = $this->input->post('mobile');
            $telephone = $this->input->post('telephone');
            $email = $this->input->post('email');
//            $fax = $this->input->post('fax');
            $AddressPO = $this->input->post('AddressPO');

            $data1 = array(
                'sourceOfFinance' => $selfFinance,

            );

            $data = array(

                'title' => $title,
                'name' => $name,
                'relation' => $relation,
                'address' => $address,
                'mobile' => $mobilee,
                'telephone' => $telephone,
                'email' => $email,
//                'fax' => $fax,
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



        }else{

            $title = $this->input->post('title');
            $name = $this->input->post('name');
            $relation = $this->input->post('relation');
            $address = $this->input->post('address');
            $mobilee = $this->input->post('mobile');
            $telephone = $this->input->post('telephone');
            $email = $this->input->post('email');
//            $fax = $this->input->post('fax');
            $AddressPO = $this->input->post('AddressPO');

            $data1 = array(
                'sourceOfFinance' => $selfFinance,

            );

            $data = array(

                'title' => $title,
                'name' => $name,
                'relation' => $relation,
                'address' => $address,
                'mobile' => $mobilee,
                'telephone' => $telephone,
                'email' => $email,
//                'fax' => $fax,
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

        }else{
            $title = $this->input->post('title');
            $name = $this->input->post('name');
            $relation = $this->input->post('relation');
            $address = $this->input->post('address');
            $mobilee = $this->input->post('mobile');
            $telephone = $this->input->post('telephone');
            $email = $this->input->post('email');
//            $fax = $this->input->post('fax');
            $AddressPO = $this->input->post('AddressPO');

            $data1 = array(
                'sourceOfFinance' => $selfFinance,

            );

            $data = array(

                'title' => $title,
                'name' => $name,
                'relation' => $relation,
                'address' => $address,
                'mobile' => $mobilee,
                'telephone' => $telephone,
                'email' => $email,
//                'fax' => $fax,
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

    public function getAllRefences()

    {
        $applicationId=$this->session->userdata('studentApplicationId');

        $this->db->select('id, name,title,workingCompany,jobTitle,address,postCode,fkCountry,contactNo,email');
        $this->db->where('fkApplicationId',$applicationId);
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

    public function getRefereesDetails($refereesId)
    {

        $this->db->select('id,name,title,workingCompany,jobTitle,address,postCode,fkCountry,contactNo,email');
        $this->db->where('id',$refereesId);
        $this->db->from('candidatereferees');
        $query=$this->db->get();
        return $query->result();


    }

    public function deleteRefereesDetailsById($refereesId){

        $this->db->where('id', $refereesId);
        $this->db->delete('candidatereferees');
    }

//    public function insertApplyForm9()
//    {
//        $applicationId=$this->session->userdata('studentApplicationId');
//        $data1=array(
//            'applydate'=>date('Y-m-d H:i:s'),
//        );
//
//        $this->db->where('id',$applicationId);
//        $error = $this->db->update('candidateinfo',$data1);
//
//        $data = array(
//            'isSubmited' => '1',
//
//        );
//
//        $this->db->where('id',$applicationId);
//        $error = $this->db->update('studentapplicationform',$data);
//
//        if (empty($error)) {
//            return $this->db->error();
//        } else {
//            return $error = null;
//        }
//    }



    /* for student Application edit end */




}
?>