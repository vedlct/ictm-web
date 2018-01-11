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
            //print_r($this->data["photo"]);

        } else{
            redirect('Admin/Login');
        }

    }

    // delete Photo
    public function deletePhoto($photoId)
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $error=$this->Photom->deletePhotobyId($photoId);
            if ($error =='0'){
                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
            }
            else{
                $this->session->set_flashdata('successMessage','Photo Deleted Successfully');

            }
        }
        else{
            redirect('Admin/Login');
        }
    }

    public function albumCover($photoId)
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $albumId=$this->input->post('album');
            $approve=$this->Photom->makePhotoAlbumCoverbyId($albumId,$photoId);
            $this->session->set_flashdata('alCover',$albumId);
            echo $approve;
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

    // for edit Photo in database
    public function editPhoto($photoId)
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('editPhoto')) {

                $this->data['album'] = $this->Albumm->getAlbum();
                $this->data['Photo'] = $this->Photom->getPhotoInfobyId($photoId);

                $this->load->view('Admin/editPhoto', $this->data);
            }
            else
            {

                $this->data['error'] = $this->Photom->editPhotobyId($photoId);
                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Photo Updated Successfully');
                    redirect('Admin/Photo/managePhoto');


                } else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Photo/editPhoto/'.$photoId);

                }
            }
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

        for ($i = 0; $i < count($images); $i++) {
            if ($images[$i] != null) {
                $ext = strtolower(pathinfo($images[$i], PATHINFO_EXTENSION));

                if (in_array($ext, $supported_image)) {

                    $imageSize = ($_FILES['photoImage']['size'][$i]/1024);

                    if ($imageSize <4096){

                    }
                    else{
                        $error[$i]='Image ' . ($i + 1) . ' Maximum Size 4MB is allowed!!';

                    }

                } else {

                    $error[$i]='Image ' . ($i + 1) . ' Was not in Correct Formate!!';

                }
            }
             if(!empty($error))
             {

                 $json_out = json_encode(array_values($error));
                $this->form_validation->set_message('val_img_check',$json_out);
                return false;
             }

        }

    }


    public function val_img_check_fromEdit() //validation check for image
    {
        $image = $_FILES['photoImage']['name'];
        $imageSize = ($_FILES['photoImage']['size']/1024);
        $supported_image = array('gif','jpg','jpeg','png');

        if ($image!= null) {
            $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));

            if (in_array($ext, $supported_image)) {

                if ($imageSize <4096){
                    return true;
                }
                else{
                    $this->form_validation->set_message('val_img_check_fromEdit', "Maximum Image Size 4MB is allowed!!");
                    return false;
                }
            } else {
                $this->form_validation->set_message('val_img_check_fromEdit', "Only JPEG/JPG/PNG/GIF Image is allowed!!");
                return false;


            }
        }
    }

}