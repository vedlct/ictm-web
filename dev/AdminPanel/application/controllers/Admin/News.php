<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Newsm');
        $this->load->library("pagination");
    }
    public function index()
    {
    }
    /*---------for creating new News --------------------- */
    public function ajax_list()
    {
        $list = $this->Newsm->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $news) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $news->newsTitle;
            $row[] = $news->newsDate;
            $row[] = $news->newsType;
            $row[] = $news->newsStatus;
            $row[] = $news->insertedBy;
            $row[] = $news->lastModifiedBy;
            $row[] = $news->lastModifiedDate;
            if ($news->homeStatus == SELECT_APPROVE[0]){
                $row[] = '<input type="checkbox" checked data-panel-id="'. $news->newsId .'" onclick=\'selectHome(this)\' id="appearInHome" name="appearInHome">Yes';
            }else{
                $row[] = '<input type="checkbox" data-panel-id="'. $news->newsId .'" id="appearInHome" onclick=\'selectHome(this)\' name="appearInHome">Yes';
            }
            $row[] = '<a class="btn" href="'.base_url().'Admin/News/editNewsView/'.$news->newsId.'"><i class="icon_pencil-edit"></i></a>
            <a class="btn " data-panel-id="'.$news->newsId.'"onclick=\'return confirm("Are you sure to Delete This RegisterInterest?")\' href="'.base_url().'Admin/RegisterInterest/deleteRegisterInterest/'. $news->newsId.'"><i class="icon_trash"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Newsm->count_all(),
            "recordsFiltered" => $this->Newsm->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
    // for new News view
    public function newNews()
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {
            $this->load->view('Admin/newNews');
        } else {
            redirect('Admin/Login');
        }
    }
    // creates new News in database
    public function createNewNews()
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {
            if (!$this->form_validation->run('createNews')) {
                $this->load->view('Admin/newNews');
            } else {
                $this->data['error'] = $this->Newsm->createNewNews();
                if (empty($this->data['error'])) {
                    $this->session->set_flashdata('successMessage','News Created Successfully');
                    redirect('Admin/News/manageNews');
                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/News/createNewNews');
                }
            }
        }
        else
        {
            redirect('Admin/Login');
        }
    }
    /*---------for creating new News  --------end---------------*/
    /*---------for Manage News -----------------------*/
    // for manage News view
    public function manageNews()
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {
//            $config = array();
//            $config["base_url"] = base_url() . "Admin/News/manageNews";
//            $config["total_rows"] = $this->Newsm->record_count();
//            $config["per_page"] = 10;
//            $config["uri_segment"] = 4;
//            $choice = $config["total_rows"] / $config["per_page"];
//            $config["num_links"] = round($choice);
//            $this->pagination->initialize($config);
//            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
//            $this->data["news"] = $this->Newsm->getAllforManageNews($config["per_page"], $page);
//            $this->data["links"] = $this->pagination->create_links();
            $this->load->view('Admin/manageNews1');
        }
        else{
            redirect('Admin/Login');
        }
    }
    // for edit  Selected News view
    public function editNewsView($newsId)
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {
            $this->data['editNews'] = $this->Newsm->getAllNewsbyId($newsId);
            $this->load->view('Admin/editNews', $this->data);
        }
        else{
            redirect('Admin/Login');
        }
    }
    // for edit News by id from database
    public function editNewsbyId($id)
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {
            if (!$this->form_validation->run('editNews')) {
                $this->data['editNews'] = $this->Newsm->getAllNewsbyId($id);
                $this->load->view('Admin/editNews', $this->data);
            } else {
                $this->data['error'] = $this->Newsm->editNewsbyId($id);
                if (empty($this->data['error'])) {
                    $this->session->set_flashdata('successMessage','News Updated Successfully');
                    redirect('Admin/News/manageNews');
                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/News/editNewsbyId/'.$id);
                }
            }
        }
        else{
            redirect('Admin/Login');
        }
    }
    //this function will show image in edit
    public function showImageForEdit($id){
        if ($this->session->userdata('type') == USER_TYPE[0]) {
            $this->data['newsimage'] = $this->Newsm->getImage($id);
            $this->load->view('Admin/showImage', $this->data);
        }
        else{
            redirect('Admin/Login');
        }
    }
    // delete News from database
    public function deleteNews($newsId)
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {
            $this->Newsm->deleteNewsbyId($newsId);
            $this->session->set_flashdata('successMessage','News Deleted Successfully');
        }
        else{
            redirect('Admin/Login');
        }
    }
    // appear in the Home page
    public function appearInHomePage($newsId)
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {
            $approve=$this->Newsm->appearInHomePage($newsId);
            echo $approve;
        }
        else{
            redirect('Admin/Login');
        }
    }
    /*---------for Manage Faculty ----------end-------------*/
    // search by news title in manage news
    public function searchByNewsTitle()
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {
            $name=$this->input->post('name');
            $this->data['news'] =$this->Newsm->viewAllNewsByName($name);
            $this->load->view('Admin/manageNewsAfterSearch', $this->data);
        } else {
            redirect('Admin/Login');
        }
    }
    //this function will delete the image in edit
    public function deleteNewsImage($id){
        if ($this->session->userdata('type') == USER_TYPE[0]) {
            $this->data['error'] = $this->Newsm->deleteNewsImage($id);
            if (empty($this->data['error'])) {
                $this->session->set_flashdata('successMessage','News Image Deleted Successfully');
                redirect('Admin/News/editNewsView/'.$id);
            }
            else
            {
                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/News/editNewsView/'.$id);
            }
        }
        else{
            redirect('Admin/Login');
        }
    }
    //validation check in edit for unique
    public function NewseditUniqueCheck()
    {
        $newsTitle = $this->input->post("newsTitle");
        $id=$this->uri->segment(4);
        try
        {
            $this->data['checknews'] = $this->Newsm->checkUniqueNews($newsTitle,$id);
            if (empty($this->data['checknews'])){
                return true;
            }
            else{
                $this->form_validation->set_message('NewseditUniqueCheck', 'News Allready Existed');
                return false;
            }
        }
        catch (Exception $e){
            $this->form_validation->set_message('NewseditUniqueCheck', 'Some thing Went Wrong !! Please Try Again!!');
            return false;
        }
    }
    /*---------Image Validation check-------------*/
    public function val_img_check()
    {
        $image = $_FILES['news_image']['name'];
        $imageSize = ($_FILES['news_image']['size']/1024);
        $supported_image = array('gif','jpg','jpeg','png');
        if ($image != null) {
            $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            if (in_array($ext, $supported_image)) {
                //echo "it's image";
                //return true;
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
                //echo 'not image';
            }
        }
    }
}