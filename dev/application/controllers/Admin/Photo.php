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

            //$id = $this->input->post("id");
//            $config = array();
//            $config["base_url"] = base_url() . "Admin/Photo/showPhotoManageTable/".$id;
//            $config["total_rows"] = $this->Photom->record_count();
//            $config["per_page"] = 1;
//            $config["uri_segment"] = 5;
//            $choice = $config["total_rows"] / $config["per_page"];
//            $config["num_links"] = round($choice);
//            $this->pagination->initialize($config);
//            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
//            $this->data["photo"] = $this->Photom->getAllforManagePhoto($config["per_page"],$page,$id);
//            $this->data["photo"] = $this->Photom->getAllforManagePhoto($id);
//            $this->data["links"] = $this->pagination->create_links();

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

            for ($i = 0; $i < count($images); $i++) {

//                if ($images[$i]!=null) {
//                    $ext = strtolower(pathinfo($images[$i], PATHINFO_EXTENSION));
//                    if (in_array($ext, $supported_image)) {
//
//                    } else {
//
//                        $this->form_validation->set_message('val_img_check', 'Image ' . ($i + 1) . ' Was not in Correct Formate!!');
//                        return false;
//
//                    }
//                }

                if ($images[$i]!=null) {
                    $this->load->library('upload');
                    $config['upload_path'] = "images/validation_Image(dump)/";
                    $config['allowed_types'] = 'jpg|png|jpeg|gif';
                    $config['overwrite'] = TRUE;
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('facultyImage')) {
                        $this->form_validation->set_message('val_img_check', $this->upload->display_errors());
                        return false;
                    } else {
                        unlink(FCPATH . "images/validation_Image(dump)/" . $image);
                        return true;
                    }
                }
            }

    }

}