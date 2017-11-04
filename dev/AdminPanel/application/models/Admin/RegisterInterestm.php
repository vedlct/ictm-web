<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class RegisterInterestm extends CI_Model
{

    public function showAllRegisterInterest($limit,$start){
        $this->db->select('registerInterestId,title,firstName,surName,mobile,email,inserDate');
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

    public function viewAllForSelectedRI($riId)
    {
        $this->db->select('registerInterestId,title,firstName,surName,House,street,city,postalCode,country,course,hearAboutUs,other,disabilityRequire,appointmentDate,comments,mobile,email,inserDate');
        $this->db->from('ictmregisterinterest');
        $this->db->where('registerInterestId',$riId);
        $query = $this->db->get();
        return $query->result();

    }

}
