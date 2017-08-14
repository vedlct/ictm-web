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

            $eventStartDateTime = strtotime("08/10/2017 4:49 PM");


            $eventEndDateTime = $this->input->post("eventEndDateTime");
            print_r(date('Y-m-d',$eventStartDateTime));
            //print_r($this->input->post("eventStartDateTime"));

            //print_r($eventEndDateTime);


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