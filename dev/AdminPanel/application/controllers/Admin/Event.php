<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Eventm');
        $this->load->library("pagination");
    }

    public function index()
    {
    }

    /*---------datatable code --------------------- */
    public function ajax_list()
    {
        $list = $this->Eventm->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $event) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $event->eventTitle;
            $row[] = preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($event->eventStartDate)),1);
            $row[] = preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($event->eventEndDate)),1);
            $row[] = $event->eventLocation;
            $row[] = $event->eventType;
            $row[] = $event->eventStatus;
            $row[] = $event->insertedBy;

            if ($event->lastModifiedBy==""){
                $row[]='Never Modified';
            }else{
                $row[] = $event->lastModifiedBy;
            }
            if ($event->lastModifiedDate==""){
                $row[]='Never Modified';
            }else{

                $row[] = preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($event->lastModifiedDate)),1);

            }

            if ($event->homeStatus == SELECT_APPROVE[0]){
                $row[] = '<input type="checkbox" checked data-panel-id="'. $event->eventId .'" onclick=\'selectHome(this)\' id="appearInHome" name="appearInHome">Yes';
            }else{
                $row[] = '<input type="checkbox" data-panel-id="'. $event->eventId .'" id="appearInHome" onclick=\'selectHome(this)\' name="appearInHome">Yes';
            }
            $row[] = '<a class="btn" href="'.base_url().'Admin/Event/editEventView/'.$event->eventId.'"><i class="icon_pencil-edit"></i></a>
            <a class="btn " data-panel-id="'.$event->eventId.'"onclick=\'return confirm("Are you sure to Delete This Event?")\' href="'.base_url().'Admin/Event/deleteEvent/'. $event->eventId.'"><i class="icon_trash"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Eventm->count_all(),
            "recordsFiltered" => $this->Eventm->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
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

        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('createEvent')) {
                $this->load->view('Admin/newEvent');
            }
            else {

                $this->data['error']=$this->Eventm->createNewEvent();

                if (empty($this->data['error'])) {
                    $this->session->set_flashdata('successMessage','Event Created Successfully');
                    redirect('Admin/Event/manageEvent');
                }
                else
                {

                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Event/createNewEvent');
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

//            $config = array();
//            $config["base_url"] = base_url() . "Admin/Event/manageEvent";
//            $config["total_rows"] = $this->Eventm->record_count();
//            $config["per_page"] = 10;
//            $config["uri_segment"] = 4;
//            $choice = $config["total_rows"] / $config["per_page"];
//            $config["num_links"] = round($choice);
//            $this->pagination->initialize($config);
//            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
//            $this->data["events"] = $this->Eventm->getAllforManageEvent($config["per_page"], $page);
//            $this->data["links"] = $this->pagination->create_links();

            //$this->data['events'] = $this->Eventm->getAllforManageEvent();
            $this->load->view('Admin/manageEvent1');
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
                    $this->session->set_flashdata('successMessage','Event Update Successfully');
                    redirect('Admin/Event/manageEvent');
                }
                else
                {

                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Event/editEventbyId/'.$id);
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
            $this->session->set_flashdata('successMessage','Event Deleted Successfully');

        }

        else{
            redirect('Admin/Login');
        }
    }

    // appear in the Home page
    public function appearInHomePage($eventId)
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $approve=$this->Eventm->appearInHomePage($eventId);
            echo $approve;

        }

        else{
            redirect('Admin/Login');
        }
    }
    /*---------for Manage Faculty ----------end-------------*/

    // search by Event title in manage Event page
    public function searchByEventTitle()
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $name=$this->input->post('name');

            $this->data['events'] =$this->Eventm->viewAllEventByName($name);
            $this->load->view('Admin/manageEventAfterSearch', $this->data);


        } else {
            redirect('Admin/Login');
        }
    }

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

    //this function will delete the image in edit
    public function deleteEventImage($id){

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['error'] = $this->Eventm->deleteEventImage($id);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage','Event Image Deleted Successfully');
                redirect('Admin/Event/editEventView/'.$id);
            }
            else
            {
                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/Event/editEventView/'.$id);
            }
        }
        else{
            redirect('Admin/Login');
        }
    }


    /* -------------------------------Image validation-------------------------*/
    public function val_img_check()
    {
        $image = $_FILES['event_image']['name'];
        $imageSize = ($_FILES['event_image']['size']/1024);
        $supported_image = array('gif','jpg','jpeg','png');

        if ($image != null) {
            $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));

            if (in_array($ext, $supported_image)) {

                if ($imageSize <4096){
                    return true;
                }
                else{
                    $this->form_validation->set_message('val_img_check', "Maximum Image Size 4MB is allowed!!");
                    return false;
                }
            } else {
                $this->form_validation->set_message('val_img_check', "Only JPEG/JPG/PNG/GIF Image is allowed!!");
                return false;


            }
        }
    }

    function check_EventDate() // validation check for event Start date and end date
    {
        $eventStartDateTime = date('Y-m-d H:i:s',strtotime($this->input->post("eventStartDateTime")));
        $eventEndDateTime = date('Y-m-d H:i:s',strtotime($this->input->post("eventEndDateTime")));

        if ($eventStartDateTime > $eventEndDateTime)
        {
            $this->form_validation->set_message('check_EventDate', 'Event End Date Can not be after Event Start Date!!');
            return false;
        }
        else
        {
            return true;
        }
    }
}