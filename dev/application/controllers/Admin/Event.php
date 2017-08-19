<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Eventm');

    }

    public function index()
    {
    }

    /*---------for creating new Event --------------------- */

    public function newEvent() // for new Event view
    {
        if ($this->session->userdata('type') == Admin) {

            $this->load->view('Admin/newEvent');
        } else {
            redirect('Login');
        }
    }

    public function createNewEvent() // creates new Event in database
    {
        //format: 'YYYY-MM-DDTHH:mm:ss' (for calender view)

        if ($this->session->userdata('type') == Admin) {

            try {
                $this->Eventm->createNewEvent();
                echo "<script>
                    alert('Event Created Successfully');
                    window.location.href= '" . base_url() . "Admin/Event/newEvent';
                    </script>";
            }
            catch (Exception $e){
                echo "<script>
                    alert('Something Went Wrong!! please try again');
                    window.location.href= '" . base_url() . "Admin/Faculty/newFaculty';
                    </script>";
            }

        }
        else
        {
            redirect('Login');
        }
    }
    /*---------for creating new Event  --------end---------------*/

    /*---------for Manage Event -----------------------*/
    public function manageEvent() // for manage Event view
    {
        if ($this->session->userdata('type') == Admin) {
            $this->data['events'] = $this->Eventm->getAllforManageEvent();
            //print_r($this->data['events']);
            $this->load->view('Admin/manageEvent',$this->data);
        }
        else{
            redirect('Login');
        }
    }

    public function editEventView($eventId) // for edit  Selected Event view
    {
        if ($this->session->userdata('type') == Admin) {

            $this->data['editEvent'] = $this->Eventm->getAllEventbyId($eventId);

            $this->load->view('Admin/editEvent', $this->data);
        }
        else{
            redirect('Login');
        }
    }

    public function editEventbyId($id) // for edit Event by id from database
    {
        if ($this->session->userdata('type') == Admin) {

            $this->Eventm->editEventbyId($id);

            echo "<script>
                    alert('Event Updated Successfully');
                    window.location.href= '" . base_url() . "Admin/Event/ManageEvent';
                    </script>";

        }
        else{
            redirect('Login');
        }
    }

    public function deleteEvent($eventId) // delete Event from database
    {
        if ($this->session->userdata('type') == Admin) {
            $this->Eventm->deleteEventbyId($eventId);
        }

        else{
            redirect('Login');
        }
    }
    /*---------for Manage Faculty ----------end-------------*/
}