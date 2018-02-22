<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Affiliationm extends CI_Model
{

    /////////datatable//////////
    var $table = 'ictmaffiliations';

    var $select =array('affiliationsId','affiliationsTitle','affiliationsStatus','homeStatus','insertedBy','lastModifiedBy','lastModifiedDate');
    var $column_order = array(null,'affiliationsTitle'); //set column field database for datatable orderable
    var $column_search = array('affiliationsTitle' ); //set column field database for datatable searchable
    var $order = array('affiliationsId' => 'desc'); // default order

    private function _get_datatables_query()
    {


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


    ///////////////////end of datatable/////////////////////////////

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
                    'max_size' => "4096",
                    'overwrite' => TRUE,
                    'remove_spaces' => FALSE,
                    'mod_mime_fix' => FALSE,
                    'file_name' => $affiliationId,

                );
                $this->upload->initialize($config);

                if ($this->upload->do_upload('affiliationImage')) {
                    // if something need after image upload
                    thumb('images/affiliationImages/'.$affiliationId.'.'.pathinfo($affiliationImage, PATHINFO_EXTENSION),'226','94');
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
        $this->db->select('affiliationsId,affiliationsTitle,affiliationsStatus,homeStatus,insertedBy,lastModifiedBy,lastModifiedDate');
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

        if ($affiliationStatus==STATUS[1]){
            $homeStatus=null;
        }

        if (!empty($_FILES['affiliationImage']['name'])) {
            $this->load->library('upload');
            $config = array(
                'upload_path' => "images/affiliationImages/",
                'allowed_types' => "jpg|png|jpeg|gif",
                'max_size' => "4096",
                'overwrite' => TRUE,
                'remove_spaces'=>FALSE,
                'mod_mime_fix'=>FALSE,
                'file_name' => $affiliationId,

            );
            $this->upload->initialize($config);

            if($this->upload->do_upload('affiliationImage')){
                // if something need after image upload
                thumb('images/affiliationImages/'.$affiliationId.'.'.pathinfo($affiliationImage, PATHINFO_EXTENSION),'226','94');
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
                'homeStatus' => $homeStatus,
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
                'homeStatus' => $homeStatus,
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


        $info = pathinfo($AffiliationImage);
        $name = $info['filename'];
        $format = $info['extension'];

        $pathanother   = $name."_94_226".".".$format;


        unlink(FCPATH."images/affiliationImages/".$pathanother);

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

    // appear in the Home page
    public function appearInHomePage($affiliationId)
    {
        $this->db->select('homeStatus');
        $this->db->where('affiliationsId',$affiliationId);
        $query = $this->db->get('ictmaffiliations');
        foreach ($query->result() as $status){$affiliationStatus=$status->homeStatus;}
        if ($affiliationStatus==null){

            $data = array(
                'homeStatus' => SELECT_APPROVE[0],
            );
            $approve=1;
        }
        else{
            $data = array(
                'homeStatus' => null,
            );
            $approve=0;
        }

        $this->db->where('affiliationsId',$affiliationId);
        $this->db->update('ictmaffiliations', $data);
        return $approve;

    }

}