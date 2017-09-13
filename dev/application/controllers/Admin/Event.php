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
        if ($this->session->userdata('type') == USER_TYPE[0]) {
            $this->load->view('Admin/newEvent');
        } else {
            redirect('Admin/Login');
        }
    }

    public function createNewEvent() // creates new Event in database
    {
        //format: 'YYYY-MM-DDTHH:mm:ss' (for calender view)
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('createEvent')) {
                $this->load->view('Admin/newEvent');
            }
            else {



                $this->data['error']=$this->Eventm->createNewEvent();

                if (empty($this->data['error'])) {
                    echo "<script>
                    alert('Event Created Successfully');
                    window.location.href= '" . base_url() . "Admin/Event/manageEvent';
                    </script>";
                }
                else
                {

                    echo "<script>
                        alert('Some thing Went Wrong !! Please Try Again!!');
                        window.location.href= '" . base_url() . "Admin/Event/newEvent';
                        </script>";
                }

            }
        }
        else
        {
            redirect('Admin/Login');
        }
    }
    /*---------for creating new Event  --------end---------------*/

    /*---------for Manage Event -----------------------*/
    public function manageEvent() // for manage Event view
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['events'] = $this->Eventm->getAllforManageEvent();
            $this->load->view('Admin/manageEvent',$this->data);
        }
        else{
            redirect('Admin/Login');
        }
    }

    public function editEventView($eventId) // for edit  Selected Event view
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['editEvent'] = $this->Eventm->getAllEventbyId($eventId);
            $this->load->view('Admin/editEvent', $this->data);
        }
        else{
            redirect('Admin/Login');
        }
    }

    public function editEventbyId($id) // for edit Event by id from database
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('editEvent')) {

                $this->data['editEvent'] = $this->Eventm->getAllEventbyId($id);
                $this->load->view('Admin/editEvent', $this->data);
            }

            else
            {

                $this->data['error'] = $this->Eventm->editEventbyId($id);

                if (empty($this->data['error'])) {
                    echo "<script>
                    alert('Event Updated Successfully');
                    window.location.href= '" . base_url() . "Admin/Event/ManageEvent';
                    </script>";
                } else {
                    echo "<script>
                        alert('Some thing Went Wrong !! Please Try Again!!');
                        window.location.href= '" . base_url() . "Admin/Event/ManageEvent';
                        </script>";
                }


            }
        }
        else{
            redirect('Admin/Login');
        }
    }

    public function deleteEvent($eventId) // delete Event from database
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->Eventm->deleteEventbyId($eventId);
        }

        else{
            redirect('Admin/Login');
        }
    }
    /*---------for Manage Faculty ----------end-------------*/

    // show Event image in new tab
    public function showImageForEdit($id)
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['eventImage'] = $this->Eventm->getImage($id);
            $this->load->view('Admin/showImage', $this->data);
        }
        else{
            redirect('Admin/Login');
        }
    }

    /* -------------------------------Image validation-------------------------*/
    public function val_img_check()
    {
        $image = $_FILES['event_image']['name'];
        if ($image != null) {
            $this->load->library('upload');
            $config['upload_path'] = "images/";
            $config['allowed_types'] = 'jpg|png|jpeg|gif';

//        $config['max_size']    = '2048000';
            $config['overwrite'] = TRUE;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('event_image')) {
                $this->form_validation->set_message('val_img_check', $this->upload->display_errors());
                return false;
            } else {
                return true;
            }
        }
    }
}