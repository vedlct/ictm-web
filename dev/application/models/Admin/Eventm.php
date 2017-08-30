<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Eventm extends CI_Model
{
    /*---------for creating new Event --------------------- */

    public function createNewEvent() // creates new Event in database
    {
        $eventTitle = $this->input->post("eventTitle");
        $eventStartDateTime = date('Y-m-d H:i:s',strtotime($this->input->post("eventStartDateTime")));
        $eventEndDateTime = date('Y-m-d H:i:s',strtotime($this->input->post("eventEndDateTime")));
        $eventLocation = $this->input->post("eventLocation");
        $event_image = $_FILES['event_image']['name'];
        $EventType = $this->input->post("EventType");
        $eventStatus = $this->input->post("eventStatus");
        $eventContent = $this->input->post("eventContent");




        if (!empty($_FILES['event_image']['name'])) {
            $this->load->library('upload');
            $config = array(
                'upload_path' => "images/",
                'allowed_types' => "jpg|png|jpeg",
                'overwrite' => TRUE,
                //'max_size' => "2048000",
                'remove_spaces' => FALSE,
                'mod_mime_fix' => FALSE,

            );
            $this->upload->initialize($config);

            if ($this->upload->do_upload('event_image')) {
                $response = array('upload_data' => $this->upload->data());
                //print_r($response);
            } else {
                $error =array('error'=>$this->upload->display_errors());
                $che=json_encode($error);
                echo "<script>
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Event/newEvent';
                    </script>";
                return false;
            }
            $data = array(
                'eventTitle' => $eventTitle,
                'eventStartDate' => $eventStartDateTime,
                'eventEndDate' => $eventEndDateTime,
                'eventLocation' =>$eventLocation,
                'eventPhotoPath' => $event_image,
                'eventType' => $EventType,
                'eventStatus' => $eventStatus,
                'eventContent' => $eventContent,
                'insertedBy' => $this->session->userdata('userEmail'),
                'insertedDate' => date("Y-m-d H:i:s"),
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
                    'eventContent' => $eventContent,
                    'insertedBy' => $this->session->userdata('userEmail'),
                    'insertedDate' => date("Y-m-d H:i:s"),
                );
        }
        $this->security->xss_clean($data,true);
        $error=$this->db->insert('ictmevent', $data);

        if (empty($error)) {
            return $this->db->error();
        } else {
            return $error = null;
        }
    }
    /*---------for creating new Event ---------end------------ */

    /*---------for Manage Event -----------------------*/
    public function getAllforManageEvent() // for manage Event view
    {
        $this->db->select('eventId,eventTitle,eventStartDate,eventEndDate,eventLocation,eventType,eventStatus,insertedBy,lastModifiedBy,lastModifiedDate');
        $this->db->from('ictmevent');
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
        $eventTitle = $this->input->post("eventTitle");
        $eventStartDateTime = date('Y-m-d H:i:s',strtotime($this->input->post("eventStartDateTime")));
        $eventEndDateTime = date('Y-m-d H:i:s',strtotime($this->input->post("eventEndDateTime")));
        $eventLocation = $this->input->post("eventLocation");
        $event_image = $_FILES['event_image']['name'];
        $EventType = $this->input->post("EventType");
        $eventStatus = $this->input->post("eventStatus");
        $eventContent = $this->input->post("eventContent");


        if (!empty($_FILES['event_image']['name'])) {
            $this->load->library('upload');
            $config = array(
                'upload_path' => "images/",
                'allowed_types' => "jpg|png|jpeg",
                'overwrite' => TRUE,
//                'max_size' => "2048000",
                'remove_spaces'=>FALSE,
                'mod_mime_fix'=>FALSE,

            );
            $this->upload->initialize($config);

            if($this->upload->do_upload('event_image')){
                $response   =array('upload_data' => $this->upload->data());
                //print_r($response);
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
                'eventPhotoPath' => $event_image,
                'eventType' => $EventType,
                'eventStatus' => $eventStatus,
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
}