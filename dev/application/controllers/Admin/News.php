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

            $config = array();
            $config["base_url"] = base_url() . "Admin/News/manageNews";
            $config["total_rows"] = $this->Newsm->record_count();
            $config["per_page"] = 10;
            $config["uri_segment"] = 4;
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = round($choice);
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $this->data["news"] = $this->Newsm->getAllforManageNews($config["per_page"], $page);
            $this->data["links"] = $this->pagination->create_links();

            $this->load->view('Admin/manageNews',$this->data);
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

    // delete Faculty and his teaching Course from database
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

    /*---------for Manage Faculty ----------end-------------*/

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
        $image = $_FILES["news_image"]["name"];
        if ($image != null) {
            $this->load->library('upload');
            $config['upload_path'] = "images/validation_Image(dump)/";
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['overwrite'] = TRUE;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('news_image')) {
                $this->form_validation->set_message('val_img_check', $this->upload->display_errors());
                return false;
            } else {
                unlink(FCPATH."images/validation_Image(dump)/".$image);
                return true;
            }
        }
    }
}