<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Affiliationm extends CI_Model
{
    public function createNewAffiliation(){

        $affiliationStatus = $this->input->post("affiliationStatus");
        $affiliationDetails = $this->input->post("affiliationDetails");
        $affiliationTitle = $this->input->post("affiliationTitle");
        $affiliationImage = $_FILES['affiliationImage']['name'];

        $data = array(
            'affiliationsTitle'=>$affiliationTitle,
            'affiliationsDetails' => $affiliationDetails,
            'affiliationsStatus' => $affiliationStatus,
            'InsertedBy'=>$this->session->userdata('userEmail'),
            'InsertedDate'=>date("Y-m-d H:i:s"),
        );

        $data=$this->security->xss_clean($data);
        $error= $this->db->insert('ictmaffiliations', $data);
        if (empty($error))
        {
            return $this->db->error();
        }
        else{
            $affiliationId = $this->db->insert_id();

            if ($affiliationImage != null) {

                $this->load->library('upload');
                $config = array(
                    'upload_path' => "images/affiliationImages/",
                    'allowed_types' => "jpg|png|jpeg|gif",
                    'max_size' => "1024*4",
                    'overwrite' => TRUE,
                    'remove_spaces' => FALSE,
                    'mod_mime_fix' => FALSE,
                    'file_name' => $affiliationId,

                );
                $this->upload->initialize($config);

                if ($this->upload->do_upload('affiliationImage')) {
                    // if something need after image upload
                } else {

                    $error = array('error' => $this->upload->display_errors());
                    $che = json_encode($error);
                    echo "<script>
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Affiliation/createNewAffiliation';
                    </script>";
                    return false;

                }

                $data2 = array(
                    'affiliationsPhotoPath' => $affiliationId.".".pathinfo($affiliationImage, PATHINFO_EXTENSION),
                );
                $data2=$this->security->xss_clean($data2,true);
                $this->db->where('affiliationsId', $affiliationId);
                $this->db->update('ictmaffiliations', $data2);
            }
            return $error=null;
        }
    }
    /*---------for creating new Affiliation ---------end------------ */

    /*---------for Manage Affiliation -----------------------*/

    // for manage News Affiliation
    public function getAllforManageAffiliation($limit, $start) {
        $this->db->select('affiliationsId,affiliationsTitle,affiliationsStatus,insertedBy,lastModifiedBy,lastModifiedDate');
        $this->db->from('ictmaffiliations');
        $this->db->limit($limit, $start);
        $this->db->order_by("affiliationsId", "desc");
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
        return $this->db->count_all("ictmaffiliations");
    }

    // for edit  Selected Affiliation view
    public function getAllAffiliationbyId($affiliationId)
    {
        $this->db->select('affiliationsId,affiliationsTitle,affiliationsDetails,affiliationsPhotoPath,affiliationsStatus');
        $this->db->from('ictmaffiliations');
        $this->db->where('affiliationsId',$affiliationId);
        $query = $this->db->get();
        return $query->result();
    }

    public function editAffiliationbyId($affiliationId)        // for edit Affiliation by id from database
    {
        $affiliationStatus = $this->input->post("affiliationStatus");
        $affiliationDetails = $this->input->post("affiliationDetails");
        $affiliationTitle = $this->input->post("affiliationTitle");
        $affiliationImage = $_FILES['affiliationImage']['name'];

        if (!empty($_FILES['affiliationImage']['name'])) {
            $this->load->library('upload');
            $config = array(
                'upload_path' => "images/affiliationImages/",
                'allowed_types' => "jpg|png|jpeg|gif",
                'max_size' => "1024*4",
                'overwrite' => TRUE,
                'remove_spaces'=>FALSE,
                'mod_mime_fix'=>FALSE,
                'file_name' => $affiliationId,

            );
            $this->upload->initialize($config);

            if($this->upload->do_upload('affiliationImage')){
                // if something need after image upload
            }else{
                $error =array('error'=>$this->upload->display_errors());
                $che=json_encode($error);
                echo "<script>
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Affiliation/editAffiliation/'.$affiliationId;
                    </script>";
                return false;
            }
            $data = array(
                'affiliationsTitle'=>$affiliationTitle,
                'affiliationsDetails' => $affiliationDetails,
                'affiliationsStatus' => $affiliationStatus,
                'affiliationsPhotoPath' => $affiliationId.".".pathinfo($affiliationImage, PATHINFO_EXTENSION),
                'lastModifiedBy'=>$this->session->userdata('userEmail'),
                'lastModifiedDate'=>date("Y-m-d H:i:s"),
            );

        }
        else
        {
            $data = array(
                'affiliationsTitle'=>$affiliationTitle,
                'affiliationsDetails' => $affiliationDetails,
                'affiliationsStatus' => $affiliationStatus,
                'lastModifiedBy'=>$this->session->userdata('userEmail'),
                'lastModifiedDate'=>date("Y-m-d H:i:s"),
            );
        }

        $this->security->xss_clean($data,true);
        $this->db->where('affiliationsId', $affiliationId);
        $error= $this->db->update('ictmaffiliations',$data);

        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }
    }

    public function deleteAffiliationbyId($AffiliationId)  // delete Affiliation from database
    {

        $this->db->where('affiliationsId',$AffiliationId);
        $this->db->delete('ictmaffiliations');

    }

    public function getImage($AffiliationId)  // show the Affiliation for editAffiliation
    {

        $this->db->select('affiliationsPhotoPath');
        $this->db->where('affiliationsId',$AffiliationId);
        $query = $this->db->get('ictmaffiliations');
        return $query->result();
    }

    // delete the AffiliationImage for editAffiliation
    public function deleteAffiliationImage($AffiliationId)
    {
        $this->db->select('affiliationsPhotoPath');
        $this->db->where('affiliationsId',$AffiliationId);
        $query = $this->db->get('ictmaffiliations');
        foreach ($query->result() as $image){$AffiliationImage=$image->affiliationsPhotoPath;}

        unlink(FCPATH."images/affiliationImages/".$AffiliationImage);

        $data = array(
            'affiliationsPhotoPath'=>null,
            'lastModifiedBy'=>$this->session->userdata('userEmail'),
            'lastModifiedDate'=>date("Y-m-d H:i:s"),

        );
        $this->db->where('affiliationsId',$AffiliationId);
        $error=$this->db->update('ictmaffiliations', $data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }

    }

    /*----------- check AffiliationTitle Uniqueness ---- editAffiliation------------*/
    public function checkAffiliationTitleUnique($affiliationTitle,$id)
    {

        $this->db->select('affiliationsTitle');
        $this->db->where('affiliationsTitle',$affiliationTitle);
        $this->db->where('affiliationsId !=', $id);
        $query = $this->db->get('ictmaffiliations');
        return $query->result();

    }

}