<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Newsm');

    }

    public function index()
    {
    }

    /*---------for creating new News --------------------- */

    public function newNews() // for new News view
    {
        if ($this->session->userdata('type') == Admin) {

            $this->load->view('Admin/newNews');
        } else {
            redirect('Login');
        }
    }

    public function createNewNews() // creates new News in database
    {

        if ($this->session->userdata('type') == Admin) {

            try {
                $this->Newsm->createNewNews();
                echo "<script>
                    alert('News Created Successfully');
                    window.location.href= '" . base_url() . "Admin/News/newNews';
                    </script>";
            }
            catch (Exception $e){
                echo "<script>
                    alert('Something Went Wrong!! please try again');
                    window.location.href= '" . base_url() . "Admin/News/newNews';
                    </script>";
            }

        }
        else
        {
            redirect('Login');
        }
    }
    /*---------for creating new News  --------end---------------*/

    /*---------for Manage News -----------------------*/
    public function manageNews() // for manage News view
    {
        if ($this->session->userdata('type') == Admin) {
            $this->data['news'] = $this->Newsm->getAllforManageNews();
            //print_r($this->data['events']);
            $this->load->view('Admin/manageNews',$this->data);
        }
        else{
            redirect('Login');
        }
    }

    public function editNewsView($newsId) // for edit  Selected News view
    {
        if ($this->session->userdata('type') == Admin) {

            $this->data['editNews'] = $this->Newsm->getAllNewsbyId($newsId);

            $this->load->view('Admin/editNews', $this->data);
        }
        else{
            redirect('Login');
        }
    }

    public function editNewsbyId($id) // for edit News by id from database
    {
        if ($this->session->userdata('type') == Admin) {

            $this->Newsm->editNewsbyId($id);

            echo "<script>
                    alert('News Updated Successfully');
                    window.location.href= '" . base_url() . "Admin/News/ManageNews';
                    </script>";

        }
        else{
            redirect('Login');
        }
    }

    public function deleteNews($newsId) // delete Faculty and his teaching Course from database
    {
        if ($this->session->userdata('type') == Admin) {
            $this->Newsm->deleteNewsbyId($newsId);
        }

        else{
            redirect('Login');
        }
    }
    /*---------for Manage Faculty ----------end-------------*/
}