<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Eventm extends CI_Model
{

    /////////datatable//////////
    var $table = 'ictmevent';
    var $column_order = array('eventId','eventTitle','eventStartDate','eventEndDate','eventLocation','eventType','eventStatus','insertedBy','lastModifiedBy','lastModifiedDate'); //set column field database for datatable orderable
    var $column_search = array('eventTitle','eventStartDate','eventEndDate' ); //set column field database for datatable searchable
    var $order = array('eventId' => 'desc'); // default order

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

    /*---------for creating new Event --------------------- */

    public function createNewEvent() // creates new Event in database
    {
//        date_default_timezone_set("Europe/London");
        $eventTitle = $this->input->post("eventTitle");
        $eventStartDateTime = date('Y-m-d H:i',strtotime($this->input->post("eventStartDateTime")));
        $eventEndDateTime = date('Y-m-d H:i',strtotime($this->input->post("eventEndDateTime")));
        $eventLocation = $this->input->post("eventLocation");
        $event_image = $_FILES['event_image']['name'];
        $EventType = $this->input->post("EventType");
        $eventStatus = $this->input->post("eventStatus");
        $eventContent = $this->input->post("eventContent");

        $data = array(
            'eventTitle' => $eventTitle,
            'eventStartDate' => $eventStartDateTime,
            'eventEndDate' => $eventEndDateTime,
            'eventLocation' =>$eventLocation,
            'eventType' => $EventType,
            'eventStatus' => $eventStatus,
            'eventContent' => $eventContent,
            'insertedBy' => $this->session->userdata('userEmail'),
            'insertedDate' => date("Y-m-d H:i:s"),
        );

        $this->security->xss_clean($data);
        $error=$this->db->insert('ictmevent', $data);

        if (empty($error)) {
            return $this->db->error();
        } else {

            $eventId = $this->db->insert_id();

            if (!empty($_FILES['event_image']['name'])) {


                $this->load->library('upload');
                $config = array(
                    'upload_path' => "images/eventImages/",
                    'allowed_types' => "jpg|png|jpeg|gif",
                    'max_size' => "4096",
                    'overwrite' => TRUE,
                    'remove_spaces' => FALSE,
                    'mod_mime_fix' => FALSE,
                    'file_name' => $eventId,

                );
                $this->upload->initialize($config);

                if ($this->upload->do_upload('event_image')) {
                    // if something need after image upload
                    thumb('images/eventImages/'.$eventId.'.'.pathinfo($event_image, PATHINFO_EXTENSION),'80','80');
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $che = json_encode($error);
                    echo "<script>
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Event/newEvent';
                    </script>";
                    return false;
                }

                $data2 = array(
                    'eventPhotoPath' => $eventId.".".pathinfo($event_image, PATHINFO_EXTENSION),
                );
                $data2=$this->security->xss_clean($data2,true);
                $this->db->where('eventId', $eventId);
                $this->db->update('ictmevent', $data2);
            }

            return $error = null;
        }
    }
    /*---------for creating new Event ---------end------------ */

    /*---------for Manage Event -----------------------*/

    public function getAllforManageEvent($limit, $start) {  // for manage Event view
        $this->db->select('eventId,eventTitle,eventStartDate,eventEndDate,eventLocation,eventType,eventStatus,homeStatus,insertedBy,lastModifiedBy,lastModifiedDate');
        $this->db->from('ictmevent');
        $this->db->limit($limit, $start);
        $this->db->order_by("eventId", "desc");
        $query = $this->db->get();


        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;


    }


    public function viewAllEventByName($name)  // search by Event title in manage Event page
    {
        $this->db->select('eventId,eventTitle,eventStartDate,eventEndDate,eventLocation,eventType,eventStatus,homeStatus,insertedBy,lastModifiedBy,lastModifiedDate');
        $this->db->from('ictmevent');

        $this->db->like('eventTitle',$name);
        $this->db->order_by("eventId", "desc");

        $query = $this->db->get();
        return $query->result();








    }

    public function getAllEventbyId($eventId) // for edit  Selected Event view
    {
        $query = $this->db->get_where('ictmevent', array('eventId' => $eventId));
        return $query->result();
    }

    public function editEventbyId($id)        // for edit Event by id from database
    {

        date_default_timezone_set("Europe/London");
        $sdate= date('Y-m-d H:i',strtotime($this->input->post("eventStartDateTime")));
        $edate = date('Y-m-d H:i',strtotime($this->input->post("eventEndDateTime")));

        $eventTitle = $this->input->post("eventTitle");
        $eventStartDateTime = $sdate ;
        $eventEndDateTime = $edate ;
        $eventLocation = $this->input->post("eventLocation");
        $event_image = $_FILES['event_image']['name'];
        $EventType = $this->input->post("EventType");
        $eventStatus = $this->input->post("eventStatus");
        $eventContent = $this->input->post("eventContent");

        if ($eventStatus==STATUS[1]){
            $homeStatus=null;
        }


        if (!empty($_FILES['event_image']['name'])) {
            $this->load->library('upload');
            $config = array(
                'upload_path' => "images/eventImages/",
                'allowed_types' => "jpg|png|jpeg|gif",
                'max_size' => "4096",
                'overwrite' => TRUE,
                'remove_spaces'=>FALSE,
                'mod_mime_fix'=>FALSE,
                'file_name' => $id,

            );
            $this->upload->initialize($config);

            if($this->upload->do_upload('event_image')){
                // if something need after image upload
                thumb('images/eventImages/'.$id.'.'.pathinfo($event_image, PATHINFO_EXTENSION),'80','80');
            }else{
                $error =array('error'=>$this->upload->display_errors());
                $che=json_encode($error);
                echo "<script>
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Event/ManageEvent';
                    </script>";
                return false;
            }
            $data = array(
                'eventTitle' => $eventTitle,
                'eventStartDate' => $eventStartDateTime,
                'eventEndDate' => $eventEndDateTime,
                'eventLocation' =>$eventLocation,
                'eventPhotoPath' => $id.".".pathinfo($event_image, PATHINFO_EXTENSION),
                'eventType' => $EventType,
                'eventStatus' => $eventStatus,
                'homeStatus' => $homeStatus,
                'eventContent' => $eventContent,
                'lastModifiedBy'=>$this->session->userdata('userEmail'),
                'lastModifiedDate'=>date("Y-m-d H:i:s"),
            );

        }
        else
        {
            $data = array(
                'eventTitle' => $eventTitle,
                'eventStartDate' => $eventStartDateTime,
                'eventEndDate' => $eventEndDateTime,
                'eventLocation' =>$eventLocation,
                'eventType' => $EventType,
                'eventStatus' => $eventStatus,
                'homeStatus' => $homeStatus,
                'eventContent' => $eventContent,
                'lastModifiedBy'=>$this->session->userdata('userEmail'),
                'lastModifiedDate'=>date("Y-m-d H:i:s"),
            );
        }

        $this->security->xss_clean($data,true);
        $this->db->where('eventId', $id);
        $error= $this->db->update('ictmevent',$data);

        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }
    }

    // delete the EventImage for editEvent
    public function deleteEventImage($id)
    {
        $this->db->select('eventPhotoPath');
        $this->db->where('eventId',$id);
        $query = $this->db->get('ictmevent');
        foreach ($query->result() as $image){$eventImage=$image->eventPhotoPath;}

        $info = pathinfo($eventImage);
        $name = $info['filename'];
        $format = $info['extension'];
        $pathanother   = $name."_80_80".".".$format;

        unlink(FCPATH."images/eventImages/".$pathanother);

        unlink(FCPATH."images/eventImages/".$eventImage);

        $data = array(
            'eventPhotoPath'=>null,
            'lastModifiedBy'=>$this->session->userdata('userEmail'),
            'lastModifiedDate'=>date("Y-m-d H:i:s"),

        );
        $this->db->where('eventId',$id);
        $error=$this->db->update('ictmevent', $data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }

    }

    public function deleteEventbyId($eventId)  // delete Event from database
    {

        $this->db->where('eventId',$eventId);
        $this->db->delete('ictmevent');

    }

    /*---------for Manage Event ---------end--------------*/

    public function getImage($id)  // show the facultyImage for editFaculty
    {

        $this->db->select('eventPhotoPath');
        $this->db->where('eventId',$id);
        $query = $this->db->get('ictmevent');
        return $query->result();
    }

    public function record_count() {
        return $this->db->count_all("ictmevent");
    }

    // appear in the Home page
    public function appearInHomePage($eventId)
    {
        $this->db->select('homeStatus');
        $this->db->where('eventId',$eventId);
        $query = $this->db->get('ictmevent');
        foreach ($query->result() as $status){$eventStatus=$status->homeStatus;}
        if ($eventStatus==null){

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

        $this->db->where('eventId',$eventId);
        $this->db->update('ictmevent', $data);
        //return $approve;

        $this->db->select('COUNT(eventId) as total');
        $this->db->from('ictmevent');
        $this->db->where('eventStatus',STATUS[0]);
        $this->db->where('homeStatus',SELECT_APPROVE[0]);
        $query10 = $this->db->get();
        foreach ($query10->result() as $totalCount){
            $Total=$totalCount->total;
        }
        if ($Total > "3"){

            $data = array(
                'homeStatus' => null,
            );
            $approve =3;
            $this->db->where('eventId',$eventId);
            $this->db->update('ictmevent', $data);

        }
        return $approve;

    }
}