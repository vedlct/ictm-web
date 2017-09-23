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

//            $images = $_FILES['photoImage']['name'];
//            print_r($images);
//            print_r('<br>');
//            for ($i = 0; $i < count($images); $i++) {
//                if ($images[$i]!=null) {
//
//                    print_r($i);
//                    print_r(count($images));
//                    print_r($images[$i]);
//                    print_r('<br>');
//                }
//            }

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
//    public function val_img_check()
//    {
//        $images = $_FILES['photoImage']['name'];
//        //$supported_image = array('gif','jpg','jpeg','png');
//
//        $this->load->library('upload');
//            for ($i = 0; $i <= count($images); $i++) {
//
//                if ($_FILES['photoImage']['name'][$i]!=null) {
//
//                    $config['upload_path'] = "images/validation_Image(dump)/";
//                    $config['allowed_types'] = 'jpg|png|jpeg|gif';
//                    $config['overwrite'] = TRUE;
//                    $this->upload->initialize($config);
//
//                    if (!$this->upload->do_upload($_FILES['photoImage']['name'][$i])) {
//
//                        $this->form_validation->set_message('val_img_check', $this->upload->display_errors());
//                        return false;
//                    } else {
//
//                        //unlink(FCPATH . "images/validation_Image(dump)/" . $images[$i]);
//                        return true;
//                    }
//                }
//            }
//
//    }

    public function val_img_check()
    {
        $image = $_FILES["photoImage"]["name"];

        for ($i = 0; $i < count($image); $i++) {
            if ($image != null) {

                $this->load->library('upload');
                $config['upload_path'] = "images/validation_Image(dump)/";
                $config['allowed_types'] = 'jpg|png|jpeg|gif';

                $config['overwrite'] = TRUE;
                $this->upload->initialize($config);

                if (!$this->upload->do_upload($image[$i])) {
                    $this->form_validation->set_message('val_img_check', $this->upload->display_errors());
                    //return false;
                } else {
                   // unlink(FCPATH . "images/validation_Image(dump)/" . $image);
                    //return true;
                }
            }
        }
    }
}