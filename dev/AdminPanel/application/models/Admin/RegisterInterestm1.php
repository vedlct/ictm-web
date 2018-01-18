<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class RegisterInterestm1 extends CI_Model
{
    var $table = 'ictmregisterinterest';
    var $select = array('registerInterestId','title','firstName','surName','appointmentDate','course','mobile','email','inserDate'); //set column field database for datatable orderable
    var $column_order = array('registerInterestId','title','firstName','surName','mobile','appointmentDate','course','email','inserDate'); //set column field database for datatable orderable
    var $column_search = array('firstName','surName'); //set column field database for datatable searchable
    var $order = array('registerInterestId' => 'desc'); // default order

    private function _get_datatables_query()
    {
        if($this->input->post('interestedCourse'))
        {
            $this->db->where('course', $this->input->post('interestedCourse'));
        }

        $this->db->select($this->select);
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

    /*---------end data table -------------*/


    public function showAllRegisterInterest($limit,$start){
        $this->db->select('registerInterestId,title,firstName,surName,appointmentDate,course,mobile,email,inserDate');
        $this->db->limit($limit, $start);
        $this->db->from('ictmregisterinterest');
        $this->db->order_by("registerInterestId", "desc");
        $query = $this->db->get();


        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function record_count() {
        return $this->db->count_all("ictmregisterinterest");
    }

    /* this function return course name and id for  manage register Interest */
    public function getCourseIdNameforManageRI(){

        $this->db->select('courseId, courseTitle');
        $query = $this->db->get('ictmcourse');
        return $query->result();

    }

    public function viewAllForSelectedRI($riId)
    {
        $this->db->select('registerInterestId,title,firstName,surName,House,street,city,postalCode,country,course,hearAboutUs,other,disabilityRequire,appointmentDate,comments,mobile,email,inserDate');
        $this->db->from('ictmregisterinterest');
        $this->db->where('registerInterestId',$riId);
        $query = $this->db->get();
        return $query->result();

    }
// search by Firs Name in manage Register Interest
    public function viewAllRIByName($name)
    {
        $this->db->select('registerInterestId,title,firstName,surName,House,street,city,postalCode,country,course,hearAboutUs,other,disabilityRequire,appointmentDate,comments,mobile,email,inserDate');
        $this->db->from('ictmregisterinterest');

        $this->db->like('firstName',$name);
        $this->db->order_by("registerInterestId", "desc");
        $query = $this->db->get();
        return $query->result();

    }

    //this will delete RegisterInterest
    public function deleteRI($RiId)
    {
        $this->db->where('registerInterestId',$RiId);
        $this->db->delete('ictmregisterinterest');

    }

}
