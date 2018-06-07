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

     public function  equalOppurtunities(){


    }

     public function  referees($applicationId){

         $this->db->select('*');
         $this->db->where('fkApplicationId =', $applicationId);
         $query = $this->db->get('candidatereferees');
         return $query->result();
    }


}
?>