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

//            $this->data["photo"] = $this->Photom->getAllforManagePhoto($id);
            $this->data["id"] = $id;

            $this->load->view('Admin/showManagePhoto1',$this->data);                        //view manage Photo


        } else{
            redirect('Admin/Login');
        }

    }

    public function ajax_list($id)
    {
        $list = $this->Photom->get_datatables($id);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $photo) {
            $no++;
            $row = array();
            $row[] = $no;

            $row[] = '<img style="height: 80px;width: 80px" src = "'. base_url().'images/photoAlbum/'.$photo->albumTitle.'/'. $photo->photoName.'">';
            $row[] = $photo->photoStatus;

            $row[] = $photo->insertedBy;
            if ($photo->lastModifiedBy==""){
                $row[]='Never Modified';
            }else{
                $row[] = $photo->lastModifiedBy;
            }
            if ($photo->lastModifiedDate==""){
                $row[]='Never Modified';
            }else{
                $row[] = $photo->lastModifiedDate;
            }

            if ($photo->photoStatus == STATUS[0])
            {
                if ($photo->albumCover == SELECT_APPROVE[0]){
                    $row[] = '<input type="checkbox" data-panel-id="'. $photo->photoId .'" onclick="albumCover(this)" checked="checked"
                                   id="albumCovers" value="'. $photo->albumId.'" name="appearInHome">Yes';
                }else{
                    $row[] = '<input type="checkbox" data-panel-id="'. $photo->photoId .'" onclick="albumCover(this)"
                                   id="albumCovers" value="'. $photo->albumId.'" name="appearInHome">Yes';
                }

            }else{
                $row[] = ' Status Should be Active First !! ';
            }

            $row[] = '<a class="btn" href="'.base_url().'Admin/Photo/editPhotoView/'. $photo->photoId.'"><i class="icon_pencil-edit"></i></a>
                            <a class="btn" data-panel-id="'. $photo->photoId.'"  onclick="selectid(this)"><i class="icon_trash"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Photom->count_all($id),
            "recordsFiltered" => $this->Photom->count_filtered($id),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);

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