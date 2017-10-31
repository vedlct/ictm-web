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

            $this->data['sliderdata'] = $this->Homem->getHomeId();

            if (empty($this->data['sliderdata'])) {

                $this->load->view('Admin/homeSlider');
            }
            else{

                $this->data['sliderdata'] = $this->Homem->getHomeSliderdata();
                $this->load->view('Admin/edithomeSlider', $this->data);

            }



        }
        else{
            redirect('Admin/Login');
        }
    }
    public function insertHomeSlider() //insert Slider
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('Slider')) {

                $this->load->view('Admin/homeSlider');

            }
            else {

                $this->data['error']=$this->Homem->insertSlider();

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Slider Created Successfully');
                    redirect('Admin/Home/slider');


                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Home/slider');

                }



            }
        }
        else{
            redirect('Admin/Login');
        }
    }

    public function verticalBar() //Show Verticle Bar
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['verticalBardata'] = $this->Homem->getHomeId();
            if (empty($this->data['verticalBardata'])) {
                $this->load->view('Admin/homeVerticalBar');

            }
            else{

                $this->data['verticalBardata'] = $this->Homem->getHomeVerticalBardata();
                $this->load->view('Admin/edithomeVerticalBar', $this->data);

            }

        }
        else{
            redirect('Admin/Login');
        }
    }

    public function insertVerticalBar() //insert Vertcal Bar
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('VerticalBar')) {

                $this->load->view('Admin/homeVerticalBar');

            }
            else {

                $this->data['error']=$this->Homem->insertVerticalBar();

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Vertcal Bar Created Successfully');
                    redirect('Admin/Home/verticalBar');


                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Home/verticalBar');

                }

            }
        }
        else{
            redirect('Admin/Login');
        }
    }

    public function editVerticalBar($id) //edit Vertical Bar
    {
        $this->load->library('form_validation');

        if ($this->session->userdata('type') == USER_TYPE[0]) {


            if (!$this->form_validation->run('VerticalBar')) {

                $this->data['verticalBardata'] = $this->Homem->getHomeVerticalBardata();
                $this->load->view('Admin/edithomeVerticalBar', $this->data);

            }
            else {

                $this->data['error']=$this->Homem->updateVerticalBardata($id);

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Vertical Bar Updated Successfully');
                    redirect('Admin/Home/verticalBar');

                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Home/verticalBar');
                }

            }
        }
        else{
            redirect('Admin/Login');
        }
    }

    public function middleBanner() //Show Middle Banner
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['middleBannerdata'] = $this->Homem->getHomeId();
            if (empty($this->data['middleBannerdata'])) {
                $this->load->view('Admin/homeMiddleBanner');

            }
            else {

                $this->data['middleBannerdata'] = $this->Homem->getHomeMiddleBannerdata();
                $this->load->view('Admin/edithomeMiddleBanner', $this->data);
            }



        }
        else{
            redirect('Admin/Login');
        }
    }
    public function insertMiddleBanner() //insert Middle Banner
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('MiddleBanner')) {

                $this->load->view('Admin/homeMiddleBanner');

            }
            else {

               $this->data['error']=$this->Homem->insertMiddleBanner();

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Middle Banner Created Successfully');
                    redirect('Admin/Home/middleBanner');


                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Home/middleBanner');

                }




            }
        }
        else{
            redirect('Admin/Login');
        }
    }

    public function editMiddleBanner($id) //edit Middle Banner
    {
        $this->load->library('form_validation');

        if ($this->session->userdata('type') == USER_TYPE[0]) {


            if (!$this->form_validation->run('MiddleBanner')) {

                $this->data['middleBannerdata'] = $this->Homem->getHomeMiddleBannerdata();
                $this->load->view('Admin/edithomeMiddleBanner', $this->data);

            }
            else {

                $this->data['error']=$this->Homem->updateMiddleBannerdata($id);

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Middle Banner Updated Successfully');
                    redirect('Admin/Home/middleBanner');

                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Home/middleBanner');
                }

            }
        }
        else{
            redirect('Admin/Login');
        }
    }

    public function squreBox() //Show Squre Box
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['bottomBannerdata'] = $this->Homem->getHomeId();
            if (empty($this->data['bottomBannerdata'])) {
                $this->load->view('Admin/homeSqureBox');

            }
            else {

                $this->data['squreBoxdata'] = $this->Homem->getHomeSqureBoxdata();
                $this->load->view('Admin/edithomeSqureBox', $this->data);
            }



        }
        else{
            redirect('Admin/Login');
        }
    }

    public function insertSqureBox() //insert Squre Box
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('SqureBox')) {

                $this->load->view('Admin/homeSqureBox');

            }
            else {

               $this->data['error']=$this->Homem->insertSqureBox();

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Bottom Banner Created Successfully');
                    redirect('Admin/Home/squreBox');


                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Home/squreBox');

                }




            }
        }
        else{
            redirect('Admin/Login');
        }
    }

    public function editSqureBox($id) //edit Bottom Banner
    {

        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('SqureBox')) {

                $this->data['squreBoxdata'] = $this->Homem->getHomeSqureBoxdata();
                $this->load->view('Admin/edithomeSqureBox', $this->data);

            }
            else {

                $this->data['error']=$this->Homem->updateSqureBox($id);

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Bottom Banner Created Successfully');
                    redirect('Admin/Home/squreBox');

                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Home/squreBox');

                }

            }
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

    public function val_img_checkSqureBox()
    {
        $images = $_FILES['image']['name'];
        $supported_image = array('gif','jpg','jpeg','png');

        for ($i = 0; $i < count($images); $i++) {
            if ($images[$i] != null) {
                $ext = strtolower(pathinfo($images[$i], PATHINFO_EXTENSION));

                if (in_array($ext, $supported_image)) {

                    $imageSize = ($_FILES['image']['size'][$i] / 1024);

                    if ($imageSize < 4096) {

                    } else {
                        $error[$i] = 'Image ' . ($i + 1) . ' Maximum Size 4MB is allowed!!';

                    }

                } else {

                    $error[$i] = 'Image ' . ($i + 1) . ' Was not in Correct Formate!!';

                }
            }

            if (!empty($error)) {

                $json_out = json_encode(array_values($error));
                $this->form_validation->set_message('val_img_checkSqureBox', $json_out);
                return false;
            }
        }
    }


}