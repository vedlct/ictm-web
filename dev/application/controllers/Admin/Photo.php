<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Photo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Albumm');
        $this->load->model('Admin/Photom');
        $this->load->library("pagination");
        $this->load->library('form_validation');
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
                    redirect('Admin/Photo/managePhoto');

                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Photo/newPhoto');
                }

            }
        }
        else{
            redirect('Admin/Login');
        }
    }
    /*---------for creating new Photo ------end--------------- */

    /*---------for Manage Photo -----------------------*/
    public function managePhoto() // for manage menu view
    {

        if ($this->session->userdata('type') == USER_TYPE[0])
        {
            $this->data['album'] = $this->Albumm->getAlbum();
            $this->load->view('Admin/managePhoto', $this->data);
        }
        else{
            redirect('Admin/Login');
        }
    }

    //this is the ajax controller . this will show the Photo manage table
    public function showPhotoManageTable($id){

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data["photo"] = $this->Photom->getAllforManagePhoto($id);
            $this->load->view('Admin/showManagePhoto', $this->data);                        //view manage Photo

        } else{
            redirect('Admin/Login');
        }

    }

    // delete Photo
    public function deletePhoto($photoId)
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->Photom->deletePhotobyId($photoId);
            $this->session->set_flashdata('successMessage','Photo Deleted Successfully');

        }
        else{
            redirect('Admin/Login');
        }
    }

    // for edit menu view
    public function editPhotoView($PhotoId)
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['album'] = $this->Albumm->getAlbum();
            $this->data['Photo'] = $this->Photom->getPhotoInfobyId($PhotoId);

            $this->load->view('Admin/editPhoto', $this->data);

        }
        else{
            redirect('Admin/Login');
        }
    }

    public function showImageForEdit($id) // show Photo image in new tab
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['PhotoImage'] = $this->Photom->getImage($id);
            $this->load->view('Admin/showImage', $this->data);
        }
        else{
            redirect('Admin/Login');
        }
    }

    /* -------------------------------Image validation-------------------------*/
    public function val_img_check()
    {
        $images = $_FILES['photoImage']['name'];
        $supported_image = array('gif','jpg','jpeg','png');

        for ($i = 0; $i <= count($images); $i++) {
            if ($images[$i] != null) {
                $ext = strtolower(pathinfo($images[$i], PATHINFO_EXTENSION));
                //echo $ext;
                // Using strtolower to overcome case sensitive
                if (in_array($ext, $supported_image)) {
                    //echo "it's image";
                    return true;
                } else {
                    $this->form_validation->set_message('val_img_check', "Only JPEG/JPG/PNG/GIF Image is allowed!!");
                    return false;
                    //echo 'not image';

                }


            }
        }

    }

}