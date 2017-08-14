<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Eventm');
//        $this->load->model('Admin/Facultym');
    }

    public function index()
    {
    }

    /*---------for creating new Event --------------------- */

    public function newEvent() // for new Faculty view
    {
        if ($this->session->userdata('type') == Admin) {

            $this->load->view('Admin/newEvent');
        } else {
            redirect('Login');
        }
    }

    public function createNewEvent() // creates new faculty in database
    {
        if ($this->session->userdata('type') == Admin) {

            $eventStartDateTime = $this->input->post("eventStartDateTime");
            $eventEndDateTime = $this->input->post("dtp_input2");
            print_r($eventStartDateTime);
            print_r($eventEndDateTime);

//            try {
//                $this->Eventm->createNewEvent();
//                echo "<script>
//                    alert('Event Created Successfully');
//                    window.location.href= '" . base_url() . "Admin/Event/newEvent';
//                    </script>";
//            }
//            catch (Exception $e){
//                echo "<script>
//                    alert('Something Went Wrong!! please try again');
//                    window.location.href= '" . base_url() . "Admin/Faculty/newFaculty';
//                    </script>";
//            }

        }
        else
        {
            redirect('Login');
        }
    }
    /*---------for creating new Faculty  --------end---------------*/
}