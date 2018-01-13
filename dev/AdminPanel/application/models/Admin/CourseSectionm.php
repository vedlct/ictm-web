<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class CourseSectionm extends CI_Model
{

    /////////datatable//////////
    var $table = 'ictmcoursesection';
    var $select = array('courseSectionId','courseId','orderNumber','courseSectionTitle','courseSectionStatus','insertedBy','lastModifiedBy','lastModifiedDate'); //specify the columns you want to fetch from table
   var $column_order = array(null,'courseSectionTitle','orderNumber'); //set column field database for datatable orderable
    var $column_search = array('courseSectionTitle'); //set column field database for datatable searchable
    var $order = array('courseSectionId' => 'desc'); // default order

    private function _get_datatables_query($id)
    {

        $this->db->select($this->select);
        $this->db->from($this->table);
        $this->db->where('courseId', $id);

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

    function get_datatables($id)
    {
        $this->_get_datatables_query($id);
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);

        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($id)
    {
        $this->_get_datatables_query($id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($id)
    {
        $this->db->from($this->table);
        $this->db->where('courseId', $id);
        return $this->db->count_all_results();
    }
    ///////////////////end of datatable/////////////////////////////




    //this will insert course section
    public function insertCourseSec()
    {

        $coursetitle = $this->input->post("coursetitle");
        extract($_POST);

        for ($i = 0; $i < count($textbox); $i++) {

            $data = array(

                'courseId' => $coursetitle,
                'courseSectionTitle' => $textbox[$i],
                'courseSectionContent' => $text[$i],
                'orderNumber' => $ordernumber[$i],
                'courseSectionStatus'=>$status[$i],
                'insertedBy'=>$this->session->userdata('userEmail'),
                'insertedDate'=>date("Y-m-d H:i:s"),

            );
            $this->security->xss_clean($data,true);
            $error=$this->db->insert('ictmcoursesection', $data);
        }
        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }
    }
    //this will return some course section data and search by courseid.
    public function getCourseSecData($id){
        $this->db->select('courseSectionId,courseId,orderNumber, courseSectionTitle,courseSectionStatus, insertedBy,lastModifiedBy,lastModifiedDate');
        $this->db->where('courseId', $id);
        $this->db->from('ictmcoursesection');
        $this->db->order_by("courseSectionId","desc");
        $query = $this->db->get();
        return $query->result();
    }

    //this will return all course section data and search by coursesectionid.
    public function getCourseSecAllData($id){
        $this->db->where('courseSectionId', $id);
        $query = $this->db->get('ictmcoursesection');
        return $query->result();
    }

    //this will update course section data
    public function updateCourseSectionData($id){

        $title = $this->input->post("textbox");
        $content = $this->input->post("text");
        $status = $this->input->post("status");
        $ordernumber = $this->input->post("ordernumber");


        $data = array(
            'courseSectionTitle' => $title,
            'courseSectionContent' => $content,
            'orderNumber' => $ordernumber,
            'courseSectionStatus'=>$status,
            'lastModifiedBy'=>$this->session->userdata('userEmail'),
            'lastModifiedDate'=>date("Y-m-d H:i:s")
        );

        $this->db->where('courseSectionId', $id);
        $error=$this->db->update('ictmcoursesection', $data);
        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }
    }

    //this will delete Course section data
    public function deleteCourseSectionbyId($courseSectionId)
    {
        $this->db->where('courseSectionId',$courseSectionId);
        $this->db->delete('ictmcoursesection');

    }

    public function checkCourseSectionOrderNumberUnique($ordernumber,$id){

        $this->db->select('courseId');
        $this->db->where('courseSectionId', $id);
        $query = $this->db->get('ictmcoursesection');
        //return $query->result();
        foreach ($query->result() as $corSec) {
            $corId = $corSec->courseId;
        }
        $this->db->select('courseSectionId');
        $this->db->where('courseSectionId !=', $id);
        $this->db->where('courseId', $corId);
        $this->db->where('orderNumber', $ordernumber);
        $query1 = $this->db->get('ictmcoursesection');
        return $query1->result();
    }

    public function checkCourseSectionOrderNumberUniqueFromCreateCourseSection($courseId,$ordernumber)
    {

        $this->db->select('courseId');
        $this->db->where('courseId',$courseId);

        $this->db->where('orderNumber', $ordernumber);

        $query1 = $this->db->get('ictmcoursesection');
        return $query1->result();
    }

    public function chkOrderNumber($courseId,$number)
    {

        $this->db->select('courseId');
        $this->db->where('courseId',$courseId);

        $this->db->where('orderNumber', $number);
        $query1 = $this->db->get('ictmcoursesection');
        return $query1->result();
    }


}