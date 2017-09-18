<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Photo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Albumm');

    }

    public function index()
    {

    }

    /* this will show  create Photo page*/
    public function newPhoto()
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['album'] = $this->Albumm->getAlbum();
            $this->load->view('Admin/newPhoto',$this->data);

        }
        else {

            redirect('Admin/Login');
        }
    }

    public function createNewPhoto() // for insert new menu into database
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

//            $images = $_FILES['photoImage1']['name'];
//            print_r($images);

            if (!$this->form_validation->run('createPhoto')) {

                $this->data['album'] = $this->Albumm->getAlbum();
                $this->load->view('Admin/newPhoto',$this->data);
            }
            else
            {

//                $this->data['error'] =$this->Menum->createNewMenu();
//
//                if (empty($this->data['error'])) {
//
//                    $this->session->set_flashdata('successMessage','Menu Created Successfully');
//                    redirect('Admin/Menu/manageMenu');
//
//
//                }
//                else
//                {
//                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
//                    redirect('Admin/Menu/newMenu');
//                }

            }
        }
        else{
            redirect('Admin/Login');
        }
    }
    /*---------for creating new Photo ------end--------------- */

    /* -------------------------------Image validation-------------------------*/
    public function val_img_check($images)
    {
        //$images = $_FILES['photoImage1']['name'];
        $supported_image = array('gif','jpg','jpeg','png');

            $ext = strtolower(pathinfo($images, PATHINFO_EXTENSION));
            if (in_array($ext, $supported_image))

            {

            }

            else

            {

                $this->form_validation->set_message('val_img_check',$images);
                return false;

            }




    }

}