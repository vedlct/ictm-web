<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Eventm extends CI_Model
{
    /*---------for creating new Faculty --------------------- */
    public function createNewEvent() // creates new faculty in database
    {

        $eventTitle = $this->input->post("eventTitle");
        $eventStartDateTime = $this->input->post("eventStartDateTime");
        $eventEndDateTime = $this->input->post("eventEndDateTime");
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
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                return false;
            }
            $data = array(
                'eventTitle' => $eventTitle,
                'eventStartDate' => date($eventStartDateTime),
                'eventEndDate' => date($eventEndDateTime),
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
                    'eventStartDate' => date($eventStartDateTime),
                    'eventEndDate' => date($eventEndDateTime),
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
}