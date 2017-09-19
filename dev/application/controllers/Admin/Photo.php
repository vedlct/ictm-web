<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Photo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Albumm');
        $this->load->model('Admin/Photom');

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

            if (!$this->form_validation->run('createPhoto')) {

                $this->data['album'] = $this->Albumm->getAlbum();
                $this->load->view('Admin/newPhoto',$this->data);
            }
            else
            {

                $this->data['error'] =$this->Photom->createNewPhoto();

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Photo added Successfully');
                    redirect('Admin/Menu/manageMenu');


                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Menu/newMenu');
                }

            }
        }
        else{
            redirect('Admin/Login');
        }
    }
    /*---------for creating new Photo ------end--------------- */

    /* -------------------------------Image validation-------------------------*/
    public function val_img_check()
    {
        $images = $_FILES['photoImage']['name'];
        $supported_image = array('gif','jpg','jpeg','png');

            for ($i = 0; $i < count($images); $i++) {

                if ($images[$i]!=null) {
                    $ext = strtolower(pathinfo($images[$i], PATHINFO_EXTENSION));
                    if (in_array($ext, $supported_image)) {

                    } else {


                        $this->form_validation->set_message('val_img_check', 'Image ' . ($i + 1) . ' Was not in Correct Formate!!');
                        return false;

                    }
                }
            }

    }

}