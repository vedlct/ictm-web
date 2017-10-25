<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Homem');
    }

    public function index()
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {
            $this->load->view('Admin/home');
        }
        else{
            redirect('Admin/Login');
        }
    }
    public function slider() //Show Slider Info
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->load->view('Admin/homeSlider');

        }
        else{
            redirect('Admin/Login');
        }
    }
    public function verticalBar() //Show Verticle Bar
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->load->view('Admin/homeVerticalBar');

        }
        else{
            redirect('Admin/Login');
        }
    }
    public function middleBanner() //Show Middle Banner
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->load->view('Admin/homeMiddleBanner');

        }
        else{
            redirect('Admin/Login');
        }
    }
    public function squreBox() //Show Squre Box
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->load->view('Admin/homeSqureBox');

        }
        else{
            redirect('Admin/Login');
        }
    }

    public function bottomBanner() //Show Bottom Banner
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['bottomBannerdata'] = $this->Homem->getHomeId();
            if (empty($this->data['bottomBannerdata'])) {
                $this->load->view('Admin/homeBottomBanner');

            } else {

                $this->data['bottomBannerdata'] = $this->Homem->getHomeBottomBannerdata();
                $this->load->view('Admin/edithomeBottomBanner', $this->data);
            }


        }
        else{
            redirect('Admin/Login');
        }
    }

    public function insertBottomBanner() //insert Bottom Banner
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('BottomBanner')) {

                $this->load->view('Admin/homeBottomBanner');

            }
            else {

                $this->data['error']=$this->Homem->insertBottomBanner();

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Bottom Banner Created Successfully');
                    redirect('Admin/Home/bottomBanner');


                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Home/bottomBanner');

                }



            }
        }
        else{
            redirect('Admin/Login');
        }
    }

    public function showImageForEdit($image) // show image in new tab
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['homeImage'] = $image;
            $this->load->view('Admin/showImage', $this->data);

        }
        else{
            redirect('Admin/Login');
        }
    }


    public function editBottomBanner($id) //edit Bottom Banner
    {
        $this->load->library('form_validation');

        if ($this->session->userdata('type') == USER_TYPE[0]) {


            if (!$this->form_validation->run('BottomBanner')) {

                $this->data['bottomBannerdata'] = $this->Homem->getHomeBottomBannerdata();
                $this->load->view('Admin/edithomeBottomBanner', $this->data);

            }
            else {

                $this->data['error']=$this->Homem->updateBottomBanner($id);

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Bottom Banner Updated Successfully');
                    redirect('Admin/Home/bottomBanner');

                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Home/bottomBanner');
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
        $image = $_FILES['image']['name'];
        $imageSize = ($_FILES['image']['size']/1024);
        $supported_image = array('gif','jpg','jpeg','png');

        if ($image != null) {
            $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));

            if (in_array($ext, $supported_image)) {

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


            }
        }
    }

}