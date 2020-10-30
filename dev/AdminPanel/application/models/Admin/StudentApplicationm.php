<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class StudentApplicationm extends CI_Model
{
	/////////applicant datatable//////////
	var $applicanttable = 'candidateinfo';
	var $applicantselect =array('candidateinfo.id','candidateinfo.applicationId','studentapplicationform.studentApplicationFormId','candidateinfo.title','candidateinfo.firstName','candidateinfo.surName','candidateinfo.applydate','candidateinfo.email','candidateinfo.mobileNo','coursedetails.courseName','ictmcourse.courseTitle','studentregistration.type','studentapplicationform.isSubmited');
	var $applicantcolumn_order = array(null,null,null,'studentapplicationform.studentApplicationFormId','candidateinfo.title','candidateinfo.firstName','candidateinfo.surName','coursedetails.courseName','candidateinfo.applydate'); //set column field database for datatable orderable
	var $applicantcolumn_search = array('candidateinfo.email','candidateinfo.mobileNo','coursedetails.courseName','studentapplicationform.studentApplicationFormId','candidateinfo.title','candidateinfo.firstName','candidateinfo.surName','candidateinfo.applydate'); //set column field database for datatable searchable
	var $applicantorder = array('id' => 'desc'); // default order

    ////alamni datatable//
    var $alumnitable = 'alumniregistration';
    var $alumniselect =array('personId','studentId','title','firstName','lastName','email','mobileNo','courseComplete','applydate','courseStartYear');
    var $alumnicolumn_order = array(null,null,null,'studentId','title','firstName','lastName','email','mobileNo'); //set column field database for datatable orderable
    var $alumnicolumn_search = array('studentId','title','firstName','lastName','email','mobileNo','courseStartYear','courseComplete'); //set column field database for datatable searchable
    var $alumniorder = array('applydate' => 'desc');
    ///end
    /////////datatable//////////
    var $table = 'candidateinfo';
    var $select =array('candidateinfo.id','candidateinfo.applicationId','studentapplicationform.studentApplicationFormId','candidateinfo.title','candidateinfo.firstName','candidateinfo.surName','candidateinfo.applydate','candidateinfo.email','candidateinfo.mobileNo','coursedetails.courseName','ictmcourse.courseTitle','studentapplicationform.isSubmited');
    var $column_order = array(null,null,null,'studentapplicationform.studentApplicationFormId','candidateinfo.title','candidateinfo.firstName','candidateinfo.surName','coursedetails.courseName','candidateinfo.applydate'); //set column field database for datatable orderable
    var $column_search = array('candidateinfo.email','candidateinfo.mobileNo','coursedetails.courseName','studentapplicationform.studentApplicationFormId','candidateinfo.title','candidateinfo.firstName','candidateinfo.surName','candidateinfo.applydate','ictmcourse.courseTitle','ictmcourse.academicYear','coursedetails.courseYear'); //set column field database for datatable searchable
    var $order = array('applydate' => 'desc'); // default order
    private function _get_datatables_query()
    {
        if($this->input->post('courseTitle1'))
        {
            $this->db->where('courseTitle', $this->input->post('courseTitle1'));
        }
        elseif ($this->input->post('userTitle1'))
        {
            $this->db->where('type', $this->input->post('userTitle1'));
        }
        elseif ($this->input->post('userStatus1'))
        {
            $this->db->where('isSubmited',$this->input->post('userStatus1'));
        }
        $this->db->select($this->select);
        $this->db->join('studentapplicationform', 'studentapplicationform.id = candidateinfo.applicationId','left');
        $this->db->join('coursedetails', 'coursedetails.fkApplicationId = candidateinfo.applicationId','left');
        $this->db->join('ictmcourse', 'ictmcourse.courseId = coursedetails.courseName','left');
        $this->db->join('studentregistration', 'studentregistration.id = studentapplicationform.studentOrAgentId','left');
//        $this->db->where('studentapplicationform.isSubmited','1');
        $this->db->where('studentapplicationform.isSubmited != ',2,FALSE);
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
    //Applicants
	private function _get_applicantdatatables_query()
	{
		if ($this->input->post('userTitle1'))
		{
			$this->db->where('type', $this->input->post('userTitle1'));
		}

		$this->db->select($this->applicantselect);
		$this->db->join('studentapplicationform', 'studentapplicationform.id = candidateinfo.applicationId','left');
		$this->db->join('coursedetails', 'coursedetails.fkApplicationId = candidateinfo.applicationId','left');
		$this->db->join('ictmcourse', 'ictmcourse.courseId = coursedetails.courseName','left');
		$this->db->join('studentregistration', 'studentregistration.id = studentapplicationform.studentOrAgentId','left');
//        $this->db->where('studentapplicationform.isSubmited','1');
		$this->db->where('studentapplicationform.isSubmited != ',2,FALSE);
		$this->db->from($this->applicanttable);
		$i = 0;
		foreach ($this->applicantcolumn_search as $item) // loop column
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
				if(count($this->applicantcolumn_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->applicantcolumn_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->applicantorder))
		{
			$order = $this->applicantorder;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	function get_applicantdatatables()
	{
		$this->_get_applicantdatatables_query();
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

    ///Alamni
    private function _get_alamnidatatables_query()
    {

		if($this->input->post('courseTitle1'))
		{
			$this->db->where('courseComplete', $this->input->post('courseTitle1'));
		}
		elseif ($this->input->post('courseStartYear')){
			$this->db->where('courseStartYear',$this->input->post('courseStartYear'));
		}
        $this->db->select($this->alumniselect);
        $this->db->from($this->alumnitable);
        $i = 0;
        foreach ($this->alumnicolumn_search as $item) // loop column
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
                if(count($this->alumnicolumn_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->alumnicolumn_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->alumniorder))
        {
            $order = $this->alumniorder;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_alamnidatatables(){
        $this->_get_alamnidatatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();

    }
    ///end
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
	//Applicant
	function applicant_count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function applicant_count_all()
	{
		$this->db->from($this->applicanttable);
		return $this->db->count_all_results();
	}
	///alamni

    function alumni_count_filtered()
    {
        $this->_get_alamnidatatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function alumni_count_all()
    {
        $this->db->from($this->alumnitable);
        return $this->db->count_all_results();
    }
    ///end
    ////////////////////excel//////////////
//    function candidateinfoDetails(){
//
//        $response = array();
//
//        // Select record
//        $this->db->select('currentAddress,currentAddress2,currentAddress3,currentAddressCity');
//        $q = $this->db->get('candidateinfo');
//        $response = $q->result_array();
//
//        return $response;
//    }
    ///////////////////////////////////
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
    ///////////csv/////////
//    public function allDetails($applicationId){
//        $this->db->select('candidateinfo.title,candidateinfo.courseChoiceStatement,candidateinfo.collegeChoiceStatement,firstName,surName,otherNames,dateOfBirth,ganderChange,gender,placeOfBirth,nationality,passportNo,passportExpiryDate,ukEntryDate,visaExpiryDate,visaType,currentAddress,currentAddress2,currentAddress3,currentAddressCity,currentAddressState,currentAddressPo,currentAddressCountry,telephoneNo,mobileNo,candidateinfo.email,candidateinfo.fax,permanentAddress,permanentAddress2,permanentAddress3,permanentAddressCity,permanentAddressState,overseasAddressPo,permanentAddressCountry,applydate,emergencyContactName,emergencyContactTitle,emergencyContactRelation,emergencyContactAddress,emergencyContactAddress2,emergencyContactAddress3,emergencyContactAddressCity,emergencyContactAddressState,emergencyContactAddressPo,emergencyContactCountry,emergencyContactMobile,emergencyContactEmail,courseName,coursedetails.awardingBody,courseSession,courseYear,ulnNo,ucasCourseCode,courseLevel,courseStartDate, courseEndDate, methodOfStudy, timeOfStudy,qualification, institution,qualificationLevel,subject,completionYear,personqualifications.startDate,personqualifications.endDate,obtainResult,organization,positionHeld,personexperience.startDate,personexperience.endDate,courseChoiceStatement,collegeChoiceStatement,financer.*,candidateinfo.sourceOfFinance,candidatereferees.*,courseChoiceStatement,collegeChoiceStatement');
//        $this->db->join('coursedetails', 'coursedetails.fkApplicationId = candidateinfo.applicationId','left');
//        $this->db->join('personqualifications', 'personqualifications.fkApplicationId = candidateinfo.applicationId','left');
//        $this->db->join('personexperience', 'personexperience.fkApplicationId = candidateinfo.applicationId','left');
//        $this->db->join('financer','financer.fkApplicationId = candidateinfo.applicationId','left');
//        $this->db->join('candidatereferees','candidatereferees.fkApplicationId = candidateinfo.applicationId','left');
//        // $this->db->join('personequalopportunity','candidateinfo.applicationId = personequalopportunity.fkApplicationId');
//        // $this->db->join('equalopportunitysubgroup', 'equalopportunitysubgroup.id=personequalopportunity.fkEqualOpportunitySubGroupId', 'left');
//        // $this->db->join('equalopportunitygroup', 'equalopportunitygroup.id=equalopportunitysubgroup.fkGroupId', 'left');
//        $this->db->where('applicationId =', $applicationId);
//        $query = $this->db->get('candidateinfo');
//        return $query->result();
//    }
    public function allDetails($applicationId){
        $this->db->select('candidateinfo.title,candidateinfo.courseChoiceStatement,candidateinfo.collegeChoiceStatement,firstName,surName,otherNames,dateOfBirth,ganderChange,gender,placeOfBirth,nationality,passportNo,passportExpiryDate,ukEntryDate,visaExpiryDate,visaType,currentAddress,currentAddress2,currentAddress3,currentAddressCity,currentAddressState,currentAddressPo,currentAddressCountry,telephoneNo,mobileNo,candidateinfo.email,candidateinfo.fax,permanentAddress,permanentAddress2,permanentAddress3,permanentAddressCity,permanentAddressState,overseasAddressPo,permanentAddressCountry,applydate,emergencyContactName,emergencyContactTitle,emergencyContactRelation,emergencyContactAddress,emergencyContactAddress2,emergencyContactAddress3,emergencyContactAddressCity,emergencyContactAddressState,emergencyContactAddressPo,emergencyContactCountry,emergencyContactMobile,emergencyContactEmail,courseName,coursedetails.awardingBody,courseSession,courseYear,ulnNo,ucasCourseCode,courseLevel,courseStartDate, courseEndDate, methodOfStudy, timeOfStudy,GROUP_CONCAT(qualification SEPARATOR ",\n") as qualification,GROUP_CONCAT(institution SEPARATOR ",\n") as institution,GROUP_CONCAT(qualificationLevel SEPARATOR ",\n") as qualificationLevel,GROUP_CONCAT(subject SEPARATOR ",\n") as subject,GROUP_CONCAT(completionYear SEPARATOR ",\n") as completionYear,GROUP_CONCAT(obtainResult SEPARATOR ",\n") as obtainResult,organization,positionHeld,personexperience.startDate,personexperience.endDate,courseChoiceStatement,collegeChoiceStatement,financer.*,candidateinfo.sourceOfFinance,candidatereferees.*,courseChoiceStatement,collegeChoiceStatement');
        $this->db->join('coursedetails', 'coursedetails.fkApplicationId = candidateinfo.applicationId','left');
        $this->db->join('personqualifications', 'personqualifications.fkApplicationId = candidateinfo.applicationId','left');
        $this->db->join('personexperience', 'personexperience.fkApplicationId = candidateinfo.applicationId','left');
        $this->db->join('financer','financer.fkApplicationId = candidateinfo.applicationId','left');
        $this->db->join('candidatereferees','candidatereferees.fkApplicationId = candidateinfo.applicationId','left');
        // $this->db->join('personequalopportunity','candidateinfo.applicationId = personequalopportunity.fkApplicationId');
        // $this->db->join('equalopportunitysubgroup', 'equalopportunitysubgroup.id=personequalopportunity.fkEqualOpportunitySubGroupId', 'left');
        // $this->db->join('equalopportunitygroup', 'equalopportunitygroup.id=equalopportunitysubgroup.fkGroupId', 'left');
        $this->db->where('applicationId =', $applicationId);
        $query = $this->db->get('candidateinfo');
        return $query->result();
    }
    public function equalopportunity($applicationId){
        $this->db->select('subGroupTitle');
        $this->db->join('equalopportunitysubgroup', 'equalopportunitysubgroup.id=personequalopportunity.fkEqualOpportunitySubGroupId', 'left');
        $this->db->join('equalopportunitygroup', 'equalopportunitygroup.id=equalopportunitysubgroup.fkGroupId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $this->db->where('opportunityTitle =', 'Ethnicity');
        $query = $this->db->get('personequalopportunity');
        return $query->result();
    }
    public function disability($applicationId){
        $this->db->select('subGroupTitle');
        $this->db->join('equalopportunitysubgroup', 'equalopportunitysubgroup.id=personequalopportunity.fkEqualOpportunitySubGroupId', 'left');
        $this->db->join('equalopportunitygroup', 'equalopportunitygroup.id=equalopportunitysubgroup.fkGroupId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $this->db->where('opportunityTitle =', 'disability');
        $query = $this->db->get('personequalopportunity');
        return $query->result();
    }
    public function religionbelief($applicationId){
        $this->db->select('subGroupTitle');
        $this->db->join('equalopportunitysubgroup', 'equalopportunitysubgroup.id=personequalopportunity.fkEqualOpportunitySubGroupId', 'left');
        $this->db->join('equalopportunitygroup', 'equalopportunitygroup.id=equalopportunitysubgroup.fkGroupId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $this->db->where('opportunityTitle =', 'Religion Belief');
        $query = $this->db->get('personequalopportunity');
        return $query->result();
    }
    public function orientation($applicationId){
        $this->db->select('subGroupTitle');
        $this->db->join('equalopportunitysubgroup', 'equalopportunitysubgroup.id=personequalopportunity.fkEqualOpportunitySubGroupId', 'left');
        $this->db->join('equalopportunitygroup', 'equalopportunitygroup.id=equalopportunitysubgroup.fkGroupId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $this->db->where('opportunityTitle =', 'Sexual Orientation');
        $query = $this->db->get('personequalopportunity');
        return $query->result();
    }
    public function listening($applicationId){
        $this->db->select('score');
        $this->db->join('candidatelanguagetest', 'candidatelanguagetest.id=cadidatelanguagetestscores.fkCandidateTestId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $this->db->where('fkTestHeadId =', 1);
        $query = $this->db->get('cadidatelanguagetestscores');
        return $query->result();
    }
    public function reading($applicationId){
        $this->db->select('score');
        $this->db->join('candidatelanguagetest', 'candidatelanguagetest.id=cadidatelanguagetestscores.fkCandidateTestId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $this->db->where('fkTestHeadId =', 2);
        $query = $this->db->get('cadidatelanguagetestscores');
        return $query->result();
    }
    public function writing($applicationId){
        $this->db->select('score');
        $this->db->join('candidatelanguagetest', 'candidatelanguagetest.id=cadidatelanguagetestscores.fkCandidateTestId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $this->db->where('fkTestHeadId =', 3);
        $query = $this->db->get('cadidatelanguagetestscores');
        return $query->result();
    }
    public function speaking($applicationId){
        $this->db->select('score');
        $this->db->join('candidatelanguagetest', 'candidatelanguagetest.id=cadidatelanguagetestscores.fkCandidateTestId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $this->db->where('fkTestHeadId =', 4);
        $query = $this->db->get('cadidatelanguagetestscores');
        return $query->result();
    }
    public function overallScore($applicationId){
        $this->db->select('overallScore');
        $this->db->join('cadidatelanguagetestscores', 'candidatelanguagetest.id=cadidatelanguagetestscores.fkCandidateTestId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $query = $this->db->get('candidatelanguagetest');
        return $query->result();
    }
    public function test($applicationId){
        $this->db->select('fkTestId');
        $this->db->join('cadidatelanguagetestscores', 'candidatelanguagetest.id=cadidatelanguagetestscores.fkCandidateTestId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $query = $this->db->get('candidatelanguagetest');
        return $query->result();
    }
    public function language($applicationId){
        $this->db->select('firstLanguageEnglish');
//        $this->db->join('candidatelanguagetest', 'candidatelanguagetest.fkApplicationId=candidateinfo.applicationId', 'left');
        $this->db->where('applicationId =', $applicationId);
        $query = $this->db->get('candidateinfo');
        return $query->result();
    }
    public function expireDate($applicationId){
        $this->db->select('expireDate');
        $this->db->join('cadidatelanguagetestscores', 'candidatelanguagetest.id=cadidatelanguagetestscores.fkCandidateTestId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $query = $this->db->get('candidatelanguagetest');
        return $query->result();
    }
    public function other($applicationId){
        $this->db->select('other');
        $this->db->join('cadidatelanguagetestscores', 'candidatelanguagetest.id=cadidatelanguagetestscores.fkCandidateTestId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $query = $this->db->get('candidatelanguagetest');
        return $query->result();
    }

    ////multi user ////
    public function allDetails1($applicationId){
        $this->db->select('candidateinfo.title,candidateinfo.courseChoiceStatement,candidateinfo.collegeChoiceStatement,firstName,surName,otherNames,dateOfBirth,ganderChange,gender,placeOfBirth,nationality,passportNo,passportExpiryDate,ukEntryDate,visaExpiryDate,visaType,currentAddress,currentAddress2,currentAddress3,currentAddressCity,currentAddressState,currentAddressPo,currentAddressCountry,telephoneNo,mobileNo,candidateinfo.email,candidateinfo.fax,permanentAddress,permanentAddress2,permanentAddress3,permanentAddressCity,permanentAddressState,overseasAddressPo,permanentAddressCountry,applydate,emergencyContactName,emergencyContactTitle,emergencyContactRelation,emergencyContactAddress,emergencyContactAddress2,emergencyContactAddress3,emergencyContactAddressCity,emergencyContactAddressState,emergencyContactAddressPo,emergencyContactCountry,emergencyContactMobile,emergencyContactEmail,courseName,coursedetails.awardingBody,courseSession,courseYear,ulnNo,ucasCourseCode,courseLevel,courseStartDate, courseEndDate, methodOfStudy, timeOfStudy,GROUP_CONCAT(qualification SEPARATOR ",\n") as qualification,GROUP_CONCAT(institution SEPARATOR ",\n") as institution,GROUP_CONCAT(qualificationLevel SEPARATOR ",\n") as qualificationLevel,GROUP_CONCAT(subject SEPARATOR ",\n") as subject,GROUP_CONCAT(completionYear SEPARATOR ",\n") as completionYear,GROUP_CONCAT(obtainResult SEPARATOR ",\n") as obtainResult,organization,positionHeld,personexperience.startDate,personexperience.endDate,courseChoiceStatement,collegeChoiceStatement,financer.*,candidateinfo.sourceOfFinance,candidatereferees.*,courseChoiceStatement,collegeChoiceStatement');
        $this->db->join('coursedetails', 'coursedetails.fkApplicationId = candidateinfo.applicationId','left');
        $this->db->join('personqualifications', 'personqualifications.fkApplicationId = candidateinfo.applicationId','left');
        $this->db->join('personexperience', 'personexperience.fkApplicationId = candidateinfo.applicationId','left');
        $this->db->join('financer','financer.fkApplicationId = candidateinfo.applicationId','left');
        $this->db->join('candidatereferees','candidatereferees.fkApplicationId = candidateinfo.applicationId','left');
        // $this->db->join('personequalopportunity','candidateinfo.applicationId = personequalopportunity.fkApplicationId');
        // $this->db->join('equalopportunitysubgroup', 'equalopportunitysubgroup.id=personequalopportunity.fkEqualOpportunitySubGroupId', 'left');
        // $this->db->join('equalopportunitygroup', 'equalopportunitygroup.id=equalopportunitysubgroup.fkGroupId', 'left');
        $this->db->where('applicationId =', $applicationId);
        $query = $this->db->get('candidateinfo');
        return $query->row();
    }

    public function language1($applicationId){
        $this->db->select('firstLanguageEnglish','studentapplicationform.isSubmited','studentapplicationform.id');
        //$this->db->join('studentapplicationform', 'studentapplicationform.id=candidateinfo.applicationId', 'left');
		//$this->db->where('studentapplicationform.isSubmited != ',2,FALSE);
        $this->db->where('applicationId =', $applicationId);
        $query = $this->db->get('candidateinfo');
        return $query->row();
    }
//isSubmited
//	public function issubmit($applicationId){
//		$this->db->select('isSubmited');
//        $this->db->join('candidateinfo', 'candidateinfo.applicationId=studentapplicationform.id', 'left');
//		$this->db->where('id =', $applicationId);
//		$this->db->where('studentapplicationform.isSubmited != ',2,FALSE);
//		$query = $this->db->get('studentapplicationform');
//		return $query->row();
//	}
    public function equalopportunity1($applicationId){
        $this->db->select('subGroupTitle');
        $this->db->join('equalopportunitysubgroup', 'equalopportunitysubgroup.id=personequalopportunity.fkEqualOpportunitySubGroupId', 'left');
        $this->db->join('equalopportunitygroup', 'equalopportunitygroup.id=equalopportunitysubgroup.fkGroupId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $this->db->where('opportunityTitle =', 'Ethnicity');
        $query = $this->db->get('personequalopportunity');
        return $query->row();
    }
    public function disability1($applicationId){
        $this->db->select('subGroupTitle');
        $this->db->join('equalopportunitysubgroup', 'equalopportunitysubgroup.id=personequalopportunity.fkEqualOpportunitySubGroupId', 'left');
        $this->db->join('equalopportunitygroup', 'equalopportunitygroup.id=equalopportunitysubgroup.fkGroupId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $this->db->where('opportunityTitle =', 'disability');
        $query = $this->db->get('personequalopportunity');
        return $query->row();
    }
    public function religionbelief1($applicationId){
        $this->db->select('subGroupTitle');
        $this->db->join('equalopportunitysubgroup', 'equalopportunitysubgroup.id=personequalopportunity.fkEqualOpportunitySubGroupId', 'left');
        $this->db->join('equalopportunitygroup', 'equalopportunitygroup.id=equalopportunitysubgroup.fkGroupId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $this->db->where('opportunityTitle =', 'Religion Belief');
        $query = $this->db->get('personequalopportunity');
        return $query->row();
    }
    public function orientation1($applicationId){
        $this->db->select('subGroupTitle');
        $this->db->join('equalopportunitysubgroup', 'equalopportunitysubgroup.id=personequalopportunity.fkEqualOpportunitySubGroupId', 'left');
        $this->db->join('equalopportunitygroup', 'equalopportunitygroup.id=equalopportunitysubgroup.fkGroupId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $this->db->where('opportunityTitle =', 'Sexual Orientation');
        $query = $this->db->get('personequalopportunity');
        return $query->row();
    }
    public function listening1($applicationId){
        $this->db->select('score');
        $this->db->join('candidatelanguagetest', 'candidatelanguagetest.id=cadidatelanguagetestscores.fkCandidateTestId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $this->db->where('fkTestHeadId =', 1);
        $query = $this->db->get('cadidatelanguagetestscores');
        return $query->row();
    }
    public function reading1($applicationId){
        $this->db->select('score');
        $this->db->join('candidatelanguagetest', 'candidatelanguagetest.id=cadidatelanguagetestscores.fkCandidateTestId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $this->db->where('fkTestHeadId =', 2);
        $query = $this->db->get('cadidatelanguagetestscores');
        return $query->row();
    }
    public function writing1($applicationId){
        $this->db->select('score');
        $this->db->join('candidatelanguagetest', 'candidatelanguagetest.id=cadidatelanguagetestscores.fkCandidateTestId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $this->db->where('fkTestHeadId =', 3);
        $query = $this->db->get('cadidatelanguagetestscores');
        return $query->row();
    }
    public function speaking1($applicationId){
        $this->db->select('score');
        $this->db->join('candidatelanguagetest', 'candidatelanguagetest.id=cadidatelanguagetestscores.fkCandidateTestId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $this->db->where('fkTestHeadId =', 4);
        $query = $this->db->get('cadidatelanguagetestscores');
        return $query->row();
    }
    public function overallScore1($applicationId){
        $this->db->select('overallScore');
        $this->db->join('cadidatelanguagetestscores', 'candidatelanguagetest.id=cadidatelanguagetestscores.fkCandidateTestId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $query = $this->db->get('candidatelanguagetest');
        return $query->row();
    }
    public function test1($applicationId){
        $this->db->select('fkTestId');
        $this->db->join('cadidatelanguagetestscores', 'candidatelanguagetest.id=cadidatelanguagetestscores.fkCandidateTestId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $query = $this->db->get('candidatelanguagetest');
        return $query->row();
    }

    public function expireDate1($applicationId){
        $this->db->select('expireDate');
        $this->db->join('cadidatelanguagetestscores', 'candidatelanguagetest.id=cadidatelanguagetestscores.fkCandidateTestId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $query = $this->db->get('candidatelanguagetest');
        return $query->row();
    }
    public function other1($applicationId){
        $this->db->select('other');
        $this->db->join('cadidatelanguagetestscores', 'candidatelanguagetest.id=cadidatelanguagetestscores.fkCandidateTestId', 'left');
        $this->db->where('fkApplicationId =', $applicationId);
        $query = $this->db->get('candidatelanguagetest');
        return $query->row();
    }




    ////end/////////

    ////Alumni CSV
    public function getAlumniInfo($studentAlumniId){
        $this->db->select('*');
        $this->db->where('personId =', $studentAlumniId);
        $this->db->from('alumniregistration');
        $query=$this->db->get();
        return $query->result();
    }

     public function studentId($personId)
     {
         $this->db->select('studentId');
        $this->db->where('personId =', $personId);
        $query = $this->db->get('alumniregistration');
        return $query->row();

     }
    public function title($personId)
    {
        $this->db->select('title');
        $this->db->where('personId =', $personId);
        $query = $this->db->get('alumniregistration');
        return $query->row();

    }
    public function firstName($personId)
    {
        $this->db->select('firstName');
        $this->db->where('personId =', $personId);
        $query = $this->db->get('alumniregistration');
        return $query->row();

    }
    public function lastName($personId)
    {
        $this->db->select('lastName');
        $this->db->where('personId =', $personId);
        $query = $this->db->get('alumniregistration');
        return $query->row();

    }
    public function gender($personId)
    {
        $this->db->select('gender');
        $this->db->where('personId =', $personId);
        $query = $this->db->get('alumniregistration');
        return $query->row();

    }
    public function dateOfBirth($personId)
    {
        $this->db->select('dateOfBirth');
        $this->db->where('personId =', $personId);
        $query = $this->db->get('alumniregistration');
        return $query->row();

    }
    public function nationality($personId)
    {
        $this->db->select('nationality');
        $this->db->where('personId =', $personId);
        $query = $this->db->get('alumniregistration');
        return $query->row();

    }
    public function address($personId)
    {
        $this->db->select('address');
        $this->db->where('personId =', $personId);
        $query = $this->db->get('alumniregistration');
        return $query->row();

    }
    public function postcode($personId)
    {
        $this->db->select('postcode');
        $this->db->where('personId =', $personId);
        $query = $this->db->get('alumniregistration');
        return $query->row();

    }
    public function mobileNo($personId)
    {
        $this->db->select('mobileNo');
        $this->db->where('personId =', $personId);
        $query = $this->db->get('alumniregistration');
        return $query->row();

    }
    public function email($personId)
    {
        $this->db->select('email');
        $this->db->where('personId =', $personId);
        $query = $this->db->get('alumniregistration');
        return $query->row();

    }
    public function courseComplete($personId)
    {
        $this->db->select('courseComplete');
        $this->db->where('personId =', $personId);
        $query = $this->db->get('alumniregistration');
        return $query->row();

    }
    public function courseStartYear($personId)
    {
        $this->db->select('courseStartYear');
        $this->db->where('personId =', $personId);
        $query = $this->db->get('alumniregistration');
        return $query->row();

    }
    public function courseCompleteYear($personId)
    {
        $this->db->select('courseCompleteYear');
        $this->db->where('personId =', $personId);
        $query = $this->db->get('alumniregistration');
        return $query->row();

    }
    public function currentStatus($personId)
    {
        $this->db->select('currentStatus');
        $this->db->where('personId =', $personId);
        $query = $this->db->get('alumniregistration');
        return $query->row();

    }
    public function currentOther($personId)
    {
        $this->db->select('currentOther');
        $this->db->where('personId =', $personId);
        $query = $this->db->get('alumniregistration');
        return $query->row();

    }
    public function organisation($personId)
    {
        $this->db->select('organisation');
        $this->db->where('personId =', $personId);
        $query = $this->db->get('alumniregistration');
        return $query->row();

    }
    public function emAddress($personId)
    {
        $this->db->select('emAddress');
        $this->db->where('personId =', $personId);
        $query = $this->db->get('alumniregistration');
        return $query->row();

    }
    public function jobTitle($personId)
    {
        $this->db->select('jobTitle');
        $this->db->where('personId =', $personId);
        $query = $this->db->get('alumniregistration');
        return $query->row();

    }
    public function startCourse($personId)
    {
        $this->db->select('startCourse');
        $this->db->where('personId =', $personId);
        $query = $this->db->get('alumniregistration');
        return $query->row();

    }
    public function receiveInfo($personId)
    {
        $this->db->select('receiveInfo');
        $this->db->where('personId =', $personId);
        $query = $this->db->get('alumniregistration');
        return $query->row();

    }

    ///end

    ///////////////////////
    /* for student Application edit */
//    public function getCandidateInfo($studentApplicationId)
//    {
//
//        $this->db->select('title,firstName,surName,otherNames,dateOfBirth,currentAddressCity,currentAddressState,currentAddressCountry,permanentAddressCountry,emergencyContactCountry,gender,ganderChange,
//        placeOfBirth,nationality,passportNo,passportExpiryDate,ukEntryDate,visaType,visaExpiryDate,currentAddress,currentAddress2,currentAddress3,currentAddressPo,overseasAddress,permanentAddress,
//        overseasAddressPo,permanentAddress2,permanentAddress3,permanentAddressCity,permanentAddressState,telephoneNo,mobileNo,email,fax,emergencyContactName,emergencyContactTitle,emergencyContactRelation,emergencyContactAddress,
//        emergencyContactAddressPo,emergencyContactAddress2,emergencyContactAddress3,emergencyContactAddressCity,emergencyContactAddressState,emergencyContactMobile,emergencyContactEmail,courseName, awardingBody, courseLevel,courseStartDate,courseEndDate,
//        methodOfStudy,courseSession,courseYear,timeOfStudy,ulnNo,ucasCourseCode');
//        $this->db->join('coursedetails', 'coursedetails.fkApplicationId = candidateinfo.applicationId','left');
//        $this->db->where('applicationId',$studentApplicationId);
//        $this->db->from('candidateinfo');
//        $query=$this->db->get();
//        return $query->result();
//
//
//    }
    public function getCandidateInfo($studentApplicationId)
    {
        $this->db->select('title,firstName,surName,otherNames,dateOfBirth,currentAddressCity,currentAddressState,currentAddressCountry,permanentAddressCountry,emergencyContactCountry,gender,ganderChange,
        placeOfBirth,nationality,passportNo,passportExpiryDate,ukEntryDate,visaType,visaExpiryDate,currentAddress,currentAddress2,currentAddress3,currentAddressPo,permanentAddress,permanentAddress2,permanentAddress3,permanentAddressCity,permanentAddressState,
        overseasAddressPo,emergencyContactAddress2,emergencyContactAddress3,telephoneNo,mobileNo,email,fax,emergencyContactName,emergencyContactTitle,emergencyContactRelation,emergencyContactAddress,
        emergencyContactAddressPo,emergencyContactAddressCity,emergencyContactAddressState,emergencyContactMobile,emergencyContactEmail,courseName, awardingBody, courseLevel,courseStartDate,courseEndDate,
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
    public function editAlumniForm($data){
        $id = $this->session->userdata('studentAlumniId');
        $data=$this->security->xss_clean($data);
        $this->db->where('personId', $id);
        $error=$this->db->update('alumniregistration', $data);
        if (empty($error)) {
            return $this->db->error();
        } else {

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
        else{
            $this->db->where('id', $experienceid);
            $error=$this->db->update('personexperience', $data);
        }
    }
    public function applyNow3Insert()
    {
        $firstLanguage = $this->input->post('firstLanguage');
        if ($firstLanguage == '1'){
            $dataCandidate=array('firstLanguageEnglish'=>$firstLanguage);
            $this->db->where('applicationId',$this->session->userdata('studentApplicationId'));
            $error = $this->db->update('candidateinfo', $dataCandidate);
        }
        else{
            $dataCandidate=array('firstLanguageEnglish'=>$firstLanguage);
            $this->db->where('applicationId',$this->session->userdata('studentApplicationId'));
            $error = $this->db->update('candidateinfo', $dataCandidate);
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
            }
        }
        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }
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
        if ($firstLanguage == '1'){
            $dataCandidate=array('firstLanguageEnglish'=>$firstLanguage);
            $this->db->where('applicationId',$this->session->userdata('studentApplicationId'));
            $error = $this->db->update('candidateinfo', $dataCandidate);
            $this->db->where('fkApplicationId',$this->session->userdata('studentApplicationId'));
            $this->db->delete('candidatelanguagetest');
        }
        else {
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
                if (empty($languagetestid)){
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
        $this->db->select('id,name,title,relation,address,address2,address3,city,state,addressPo,mobile,telephone,email,country');
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
                'address2' => $address2,
                'address3' => $address3,
                'city' => $city,
                'state' => $state,
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
                'address2' => $address2,
                'address3' => $address3,
                'city' => $city,
                'state' => $state,
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
                'address2' => $address2,
                'address3' => $address3,
                'city' => $city,
                'state' => $state,
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
        $this->db->select('personequalopportunity.id as personalOpportunityId,equalopportunitysubgroup.subGroupTitle,personequalopportunity.disabilityAllowance as personalDisabilityAllowance,equalopportunitysubgroup.id,equalopportunitygroup.opportunityTitle,equalopportunitygroup.id as groupId');
        $this->db->join('equalopportunitysubgroup', 'equalopportunitysubgroup.id=personequalopportunity.fkEqualOpportunitySubGroupId', 'left');
        $this->db->join('equalopportunitygroup', 'equalopportunitygroup.id=equalopportunitysubgroup.fkGroupId', 'left');
        $this->db->where('personequalopportunity.fkApplicationId=',$applicationId);
        $this->db->from('personequalopportunity');
        $query=$this->db->get();
        return $query->result();
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
        $this->db->select('id, name,title,workingCompany,jobTitle,address,address2,address3,city,state,postCode,fkCountry,contactNo,email');
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
        $this->db->select('id,name,title,workingCompany,jobTitle,address,address2,address3,city,state,postCode,fkCountry,contactNo,email');
        $this->db->where('id',$refereesId);
        $this->db->from('candidatereferees');
        $query=$this->db->get();
        return $query->result();
    }
    public function deleteRefereesDetailsById($refereesId){
        $this->db->where('id', $refereesId);
        $this->db->delete('candidatereferees');
    }

    public function insertAllDocument($filename)
    {
        $title = $this->input->post('description');
		$doc_type = $this->input->post('doc_type');
//        $filename='filename';


        //$addressPo = $this->input->post('addressPo[]');



		for ($i = 0; $i < count($title); $i++) {
			$data = array(
				'fkApplicationId' => $this->session->userdata('studentApplicationId'),
				'description' => $title[$i],
				'doc_type' => $doc_type,
				'filename' => $filename,
			);

			$error = $this->db->insert('filedocument', $data);
		}

        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }
    }

    public function getDocument($applicationId){
		$this->db->select('id,description,filename, doc_type');
		$this->db->limit(9);
		$this->db->where('fkApplicationId',$applicationId);
		$this->db->from('filedocument');
		$query=$this->db->get();
		return $query->result();
//		if($query == 1) {
//			$results = $query->result();
//			return  $results;
//		}
//		else{
//			return false;
//		}

//        $this->db->select('id,description,filename');
//        $this->db->limit(9);
//        $this->db->where('fkapplication',$applicationId);
//        $this->db->from('filedocument');
//        $query=$this->db->get();
//        return $query->result();


    }

    public function deleteDocument($applicationId)
    {

        $this->db->where('id', $applicationId);
        $this->db->delete('filedocument');


    }

    public function deletePersonId($personId)
    {

        $this->db->where('personId',$personId);
        $this->db->delete('alumniregistration');

    }
	/*---Course Start Year---*/
	public function getCourseStartYear()
	{

		$this->db->select('courseStartYear,personId');
		$this->db->group_by('courseStartYear');
		$query = $this->db->get('alumniregistration');
		return $query->result();
	}


    /* for student Application edit end */
}
?>
