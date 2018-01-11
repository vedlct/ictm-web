<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Feedbackm extends CI_Model
{
    /////////datatable//////////
    var $table = 'ictmfeedback';
//    var $column_order = array('feedbackId,feedbackByName,feedbackByProfession,feedbackSource,feedbackApprove,feedbackApprovedBy,feedbackApprovedDate,feedbackStatus,homeStatus,insertedBy,lastModifiedBy,lastModifiedDate'); //set column field database for datatable orderable
    var $column_order = array('feedbackId','feedbackByName','feedbackByProfession','feedbackSource','feedbackApprove','feedbackApprovedBy','feedbackApprovedDate','feedbackStatus','homeStatus','insertedBy','lastModifiedBy','lastModifiedDate'); //set column field database for datatable orderable
    var $column_search = array('feedbackByName','feedbackByProfession','feedbackSource'); //set column field database for datatable searchable
    var $order = array('feedbackId' =>'desc'); // default order

    private function _get_datatables_query()
    {

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


    /*----------- this creates a new Feedback in database------------*/
    public function createNewFeedback()             // for insert new Feedback into database
    {
        $feedbackByName = $this->input->post("feedbackByName");
        $feedbackByProfession = $this->input->post("feedbackByProfession");
        $feedbackStatus = $this->input->post("feedbackStatus");
        $feedbackSource = $this->input->post("feedbackSource");
        $feedbackDetails = $this->input->post("feedbackDetails");


        $data = array(
            'feedbackByName' => $feedbackByName,
            'feedbackByProfession' => $feedbackByProfession,
            'feedbackDetails' => $feedbackDetails,
            'feedbackStatus' => $feedbackStatus,
            'feedbackApprovedBy'=>$this->session->userdata('userEmail'),
            'feedbackApprovedDate'=>date("Y-m-d H:i:s"),
            'feedbackApprove'=>SELECT_APPROVE[0],
            'feedbackSource'=>$feedbackSource,
            'insertedBy'=>$this->session->userdata('userEmail'),
            'insertedDate'=>date("Y-m-d H:i:s"),
        );
        $this->security->xss_clean($data);
        $error=$this->db->insert('ictmfeedback', $data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            $feedbackId=$this->db->insert_id();
            $feedbackByImage=$_FILES['feedbackByImage']['name'];

            if (!empty($_FILES['feedbackByImage']['name'])) {

                $this->load->library('upload');
                $config = array(
                    'upload_path' => "images/feedbackImages/",
                    'allowed_types' => "jpg|png|jpeg|gif",
                    'max_size' => "4096",
                    'overwrite' => TRUE,
                    'remove_spaces'=>FALSE,
                    'mod_mime_fix'=>FALSE,
                    'file_name' => $feedbackId,

                );
                $this->upload->initialize($config);

                if($this->upload->do_upload('feedbackByImage')){
                    // if something need after image upload
                    thumb('images/feedbackImages/'.$feedbackId.'.'.pathinfo($feedbackByImage, PATHINFO_EXTENSION),'50','65');
                }
                else{

                    $error =array('error'=>$this->upload->display_errors());
                    $che=json_encode($error);
                    echo "<script>
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Feedback/newFeedback';
                    </script>";
                    return false;
                }

                $data2 = array(
                    'feedbackByPhoto' => $feedbackId.".".pathinfo($feedbackByImage, PATHINFO_EXTENSION),
                );
                $data2=$this->security->xss_clean($data2,true);
                $this->db->where('feedbackId', $feedbackId);
                $this->db->update('ictmfeedback', $data2);
            }

            return $error=null;
        }

    }

    //    for pagination in manage Feedback
    public function record_count() {
        return $this->db->count_all("ictmfeedback");
    }

    /*---------for Manage Feedback -----------------------*/
    public function getAllforManageFeedback($limit, $start) {
        $this->db->select('feedbackId,feedbackByName,feedbackByProfession,feedbackSource,feedbackApprove,feedbackApprovedBy,feedbackApprovedDate,feedbackStatus,homeStatus,insertedBy,lastModifiedBy,lastModifiedDate');
        $this->db->from('ictmfeedback');
        $this->db->order_by("feedbackId", "desc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function deleteFeedbackbyId($feedbackId)  // delete Feedback from database
    {

        $this->db->where('feedbackId',$feedbackId);
        $this->db->delete('ictmfeedback');

    }

    // for edit  Selected Feedback view
    public function getAllFeedbackbyId($feedbackId)
    {
        $this->db->select('feedbackId,feedbackByName,feedbackByProfession,feedbackDetails,feedbackByPhoto,feedbackSource,feedbackApprove,feedbackApprovedBy,feedbackApprovedDate,feedbackStatus');
        $this->db->from('ictmfeedback');
        $this->db->where('feedbackId',$feedbackId);
        $query = $this->db->get();
        return $query->result();
    }

    public function editFeedbackbyId($feedbackId)        // for edit Feedback by id from database
    {
        $feedbackByName = $this->input->post("feedbackByName");
        $feedbackByProfession = $this->input->post("feedbackByProfession");
        $feedbackStatus = $this->input->post("feedbackStatus");
        $feedbackDetails = $this->input->post("feedbackDetails");
        $feedbackSource = $this->input->post("feedbackSource");
        $feedbackApprove = $this->input->post("feedbackApprove");
        $feedbackByImage=$_FILES['feedbackByImage']['name'];

        if ($feedbackApprove ==SELECT_APPROVE[0])
        {
            $feedbackApproveBy=$this->session->userdata('userEmail');
            $feedbackApprovedDate=date("Y-m-d H:i:s");

        }
        else if ($feedbackApprove ==SELECT_APPROVE[1])
        {
            $feedbackApproveBy=null;
            $feedbackApprovedDate=null;
            $homeStatus=null;
        }




        if (!empty($_FILES['feedbackByImage']['name'])) {
            $this->load->library('upload');
            $config = array(
                'upload_path' => "images/feedbackImages/",
                'allowed_types' => "jpg|png|jpeg|gif",
                'max_size' => "4096",
                'overwrite' => TRUE,
                'remove_spaces'=>FALSE,
                'mod_mime_fix'=>FALSE,
                'file_name' => $feedbackId,

            );
            $this->upload->initialize($config);

            if($this->upload->do_upload('feedbackByImage')){
                // if something need after image upload
                thumb('images/feedbackImages/'.$feedbackId.'.'.pathinfo($feedbackByImage, PATHINFO_EXTENSION),'50','65');
            }else{
                $error =array('error'=>$this->upload->display_errors());
                $che=json_encode($error);
                echo "<script>
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Feedback/editFeedbackbyId/'.$feedbackId;
                    </script>";
                return false;
            }
            $data = array(
                'feedbackByName' => $feedbackByName,
                'feedbackByProfession' => $feedbackByProfession,
                'feedbackDetails' => $feedbackDetails,
                'feedbackSource' =>$feedbackSource,
                'feedbackByPhoto' => $feedbackId.".".pathinfo($feedbackByImage, PATHINFO_EXTENSION),
                'feedbackApprove' => $feedbackApprove,
                'feedbackStatus' => $feedbackStatus,
                'feedbackApprovedBy' =>$feedbackApproveBy,
                'feedbackApprovedDate' =>$feedbackApprovedDate,
                'homeStatus' => $homeStatus,
                'lastModifiedBy'=>$this->session->userdata('userEmail'),
                'lastModifiedDate'=>date("Y-m-d H:i:s"),
            );

        }
        else
        {
            $data = array(
                'feedbackByName' => $feedbackByName,
                'feedbackByProfession' => $feedbackByProfession,
                'feedbackDetails' => $feedbackDetails,
                'feedbackSource' =>$feedbackSource,
                'feedbackApprove' => $feedbackApprove,
                'feedbackStatus' => $feedbackStatus,
                'feedbackApprovedBy' => $feedbackApproveBy,
                'feedbackApprovedDate' => $feedbackApprovedDate,
                'homeStatus' => $homeStatus,
                'lastModifiedBy'=>$this->session->userdata('userEmail'),
                'lastModifiedDate'=>date("Y-m-d H:i:s"),
            );
        }

        $this->security->xss_clean($data,true);
        $this->db->where('feedbackId', $feedbackId);
        $error= $this->db->update('ictmfeedback',$data);

        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }
    }

    public function getImage($feedbackId)  // show the feedback for editFeedback
    {

        $this->db->select('feedbackByPhoto');
        $this->db->where('feedbackId',$feedbackId);
        $query = $this->db->get('ictmfeedback');
        return $query->result();
    }

    // delete the FeedbackImage for editFeedback
    public function deleteFeedbackImage($feedbackId)
    {
        $this->db->select('feedbackByPhoto');
        $this->db->where('feedbackId',$feedbackId);
        $query = $this->db->get('ictmfeedback');
        foreach ($query->result() as $image){$feedbackImage=$image->feedbackByPhoto;}



        $info = pathinfo($feedbackImage);
        $name = $info['filename'];
        $format = $info['extension'];

        $pathanother   = $name."_65_50".".".$format;

        unlink(FCPATH."images/feedbackImages/".$pathanother);
        unlink(FCPATH."images/feedbackImages/".$feedbackImage);

        $data = array(
            'feedbackByPhoto'=>null,
            'lastModifiedBy'=>$this->session->userdata('userEmail'),
            'lastModifiedDate'=>date("Y-m-d H:i:s"),

        );
        $this->db->where('feedbackId',$feedbackId);
        $error=$this->db->update('ictmfeedback', $data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }

    }

    // appear in the Home page
    public function appearInHomePage($feedbackId)
    {
        $this->db->select('homeStatus');
        $this->db->where('feedbackId',$feedbackId);
        $query = $this->db->get('ictmfeedback');
        foreach ($query->result() as $status){$feedbackStatus=$status->homeStatus;}
        if ($feedbackStatus==null){

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

        $this->db->where('feedbackId',$feedbackId);
        $this->db->update('ictmfeedback', $data);
        return $approve;

    }

}