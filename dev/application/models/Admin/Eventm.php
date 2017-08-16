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
        date_default_timezone_set("Europe/London");



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
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
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

                $this->db->insert('ictmevent', $data);
    }
    /*---------for creating new Event ---------end------------ */

    /*---------for Manage Event -----------------------*/
    public function getAllforManageEvent() // for manage Event view
    {
        $query = $this->db->get('ictmevent');
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
        date_default_timezone_set("Europe/London");

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
                print_r($error);
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


        $this->db->where('eventId', $id);
        $this->db->update('ictmevent',$data);
    }

    public function deleteEventbyId($eventId)  // delete Event from database
    {

        $this->db->where('eventId',$eventId);
        $this->db->delete('ictmevent');

    }

    /*---------for Manage Event ---------end--------------*/
}