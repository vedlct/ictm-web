<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Userm');
        $this->load->library("pagination");

    }

    public function index()
    {

    }

    /* this will show  create Feedback page*/
    public function newUser()
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {
            $this->data['page'] = $this->Userm->getRole();
            $this->load->view('Admin/newUser',$this->data);


        } else {

            redirect('Admin/Login');
        }
    }

    public function createNewUser() // for insert new Feedback into database
    {
        $this->load->library('form_validation');

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('createUser')) {

                $this->load->view('Admin/newUser');
            }
            else
            {

                $this->data['error'] =$this->Userm->createNewUser();

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','User Created Successfully');
                    redirect('Admin/User/manageUser');


                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/User/newUser');
                }

            }
        }
        else{
            redirect('Admin/Login');
        }
    }

    public function manageUser()
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

//            $config = array();
//            $config["base_url"] = base_url() . "Admin/Page/managePage";
//            $config["total_rows"] = $this->Pagem->record_count();
//            $config["per_page"] = 10;
//            $config["uri_segment"] = 4;
//            $choice = $config["total_rows"] / $config["per_page"];
//            $config["num_links"] = round($choice);
//            $this->pagination->initialize($config);
//            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
//            $this->data["pageData"] = $this->Pagem->getPagaData($config["per_page"], $page);
//            $this->data["links"] = $this->pagination->create_links();

            $this->load->view('Admin/manageUser');

        }
        else{
            redirect('Admin/Login');
        }
    }

    public function ajax_list()
    {
        $list = $this->Userm->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $user->firstName.' '.$user->surName;
            $row[] = $user->userEmail;
            $row[] = $user->roleName;

            $row[] = '<a class="btn" href="'.base_url().'Admin/User/editPageShow/'.$user->userId.'"><i class="icon_pencil-edit"></i></a>
             <a class="btn" href="'. base_url().'Admin/User/deleteUser/'.$user->userId.'"><i class="icon_trash"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Userm->count_all(),
            "recordsFiltered" => $this->Userm->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function deleteUser($userId) // delete Faculty and his teaching Course from database
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->Userm->deleteUser($userId);
            $this->session->set_flashdata('successMessage','User Deleted Successfully');
            redirect('Admin/User/manageUser');
        }

        else{
            redirect('Admin/Login');
        }
    }
}
