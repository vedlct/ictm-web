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

    public function assignUser()
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {
            $this->data['user'] = $this->Userm->getUser();
            $this->data['menu'] = $this->Userm->getMenu();
            $this->load->view('Admin/assignUser',$this->data);


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

    public function createUserRole() // for insert new Feedback into database
    {
        $this->load->library('form_validation');

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('createRole')) {

                $this->load->view('Admin/assignUser');
            }
            else
            {

                $this->data['error'] =$this->Userm->createNewRole();

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Role Created Successfully');
                    redirect('Admin/User/manageUser');


                }
                else
                {
                    $this->session->set_flashdata('errorMessage','You Cannot Access duplicate same Role!!');
                    redirect('Admin/User/assignUser');
                }

            }
        }
        else{
            redirect('Admin/Login');
        }
    }

    public function EditUserAssign($userId) // for insert new Feedback into database
    {
        $this->load->library('form_validation');

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('createRole')) {

                $this->load->view('Admin/editRole');
            }
            else
            {

                $this->data['error'] =$this->Userm->editRole();

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Role Created Successfully');
                    redirect('Admin/User/manageUser');


                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/User/editUserRole/'.$userId);
                }

            }
        }
        else{
            redirect('Admin/Login');
        }
    }

//    public function check_email()
//    {
//        $email = $this->input->post('userEmail');
//        $result = $this->db->where('userEmail',$email)->get('ictmusers')->row()->userEmail;
//        if($result == ""){
//            echo $email;
//        }else
//        {
//            echo "Email Address Already Exists";
//        }
//    }


//    function check_email_avalibility()
//    {
//        if(!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL))
//        {
//            echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Invalid Email</span></label>';
//        }
//        else
//        {
//            $this->load->model("Userm");
//            if($this->Userm->is_email_available($_POST["userEmail"]))
//            {
//                echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Email Already register</label>';
//            }
//            else
//            {
//                echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Email Available</label>';
//            }
//        }
//    }

//    public function ajax_signup()
//    {
//
//        $this->form_validation->set_rules('userEmail', 'Email',
//            'required|is_unique[ictmusers.userEmail]');
//        $this->form_validation->set_message('is_unique', 'The %s is already taken');
//        if ($this->form_validation->run() == FALSE):
//            echo 'The email is already taken.';
//        else :
//            unset($_POST);
//            echo 'Available';
//        endif;
//    }

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
            $row[] = $user->usersStatus;

            $row[] = '<a class="btn" href="'.base_url().'Admin/User/editUserShow/'.$user->userId.'"><i class="icon_pencil-edit"></i></a>
              <a class="btn" title="Manage Role" href="'.base_url().'Admin/User/editUserRole/'.$user->userId.'"><i class="icon_comment"></i></a>
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

    public function editUserShow($userId)
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {
            $this->data['editUserData'] = $this->Userm->geteditUserData($userId);
            $this->data['page'] = $this->Userm->getRole();
            $this->load->view('Admin/editUser', $this->data);

        }
        else{
            redirect('Admin/Login');
        }
    }

    public function editUserRole($userId)
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {
            $this->data['editUserRole'] = $this->Userm->geteditUserRole($userId);
            $this->data['menu'] = $this->Userm->getMenu();
            $this->data['userId']=$userId;
//			$this->data['page'] = $this->Userm->getUser();
            $this->load->view('Admin/editRole', $this->data);

        }
        else{
            redirect('Admin/Login');
        }
    }

    public function editUser($userId) // for edit Event by id from database
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('editUser')) {

                $this->data['editUserData'] = $this->Userm->geteditUserData($userId);
                $this->load->view('Admin/editUser', $this->data);
            }

            else
            {

                $this->data['error'] = $this->Userm->editUserbyId($userId);


                if (empty($this->data['error'])) {
                    $this->session->set_flashdata('successMessage','User Update Successfully');
                    redirect('Admin/User/manageUser');
                }
                else
                {

                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/User/editUserShow/'.$userId);
                }


            }
        }
        else{
            redirect('Admin/Login');
        }
    }
}
