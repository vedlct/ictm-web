<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin/Pagem');
        $this->load->library('user_agent');
    }

    public function index(){


    }

    // this will show create page
    public function createPage()
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {
            $this->load->view('Admin/newPage');
        }
        else{
            redirect('Admin/Login');
        }
    }

    // this will insert page
    public function insertPage()
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('createPage')) {
                $this->load->view('Admin/newPage');
            }
            else
            {

                $this->data['error'] = $this->Pagem->insertPage();
                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Page Created Successfully');
                    redirect('Admin/Page/managePage');
                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Page/createPage');
                }

            }
        }
        else{
            redirect('Admin/Login');
        }
    }

    //this will show manage page section
    public function managePage()
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['pageData'] = $this->Pagem->getPagaData();

             $this->load->view('Admin/managePage', $this->data);

        }
        else{
            redirect('Admin/Login');
        }
    }

    //this will show edit page with data
    public function editPageShow($id)
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {
            $this->data['editPageData'] = $this->Pagem->geteditPagaData($id);
            $this->load->view('Admin/editPage', $this->data);

        }
        else{
            redirect('Admin/Login');
        }
    }
    //this will edit page
    public function editPage($id)
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('editPage')) {
                $this->data['editPageData'] = $this->Pagem->geteditPagaData($id);
                $this->load->view('Admin/editPage', $this->data);
            }
            else
            {

                $this->data['error'] = $this->Pagem->updatePagaData($id);

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Page Updated Successfully');
                    redirect('Admin/Page/managePage');

                }
                else
                {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Page/editPage/'.$id);

                }
            }
        }
        else{
            redirect('Admin/Login');
        }
    }

    //this function will delete the image in edit
    public function deletePageImage($id){

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['error'] = $this->Pagem->deletePageImage($id);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage','Page Image Deleted Successfully');
                redirect('Admin/Page/editPage/'.$id);
            }
            else
            {
                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/Page/editPage/'.$id);
            }
        }
        else{
            redirect('Admin/Login');
        }
    }

    //this will delete page
    public function deletePage($pageId)
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['pagedata'] =$this->Pagem->checkParentId($pageId);

            $name=array();
            $y=$this->data['pagedata'];
            if (empty($y)){

                $this->Pagem->deletePagebyId($pageId);
                $this->session->set_flashdata('successMessage','Page Deleted Successfully');
                redirect('Admin/Page/managePage');
//                echo "<script>
//                    alert('Page Deleted Successfully');
//                    window.location.href= '" . base_url() . "Admin/Page/managePage';
//                    </script>";
            }else{


                for ($i=0;$i<count($y);$i++){
                    array_push($name, $y[$i]);
                }
                ?>
                <script type='text/javascript'>
                    var x =<?php echo json_encode( $name ) ?>;
                    alert('Please Delete ( '+x+' ) First');
                </script>

                <?php
                echo "<script>
                    
                    window.location.href= '" . base_url() . "Admin/Page/managePage';
                    </script>";
            }
        }
        else{
            redirect('Admin/Login');
        }
    }
    //this function will show the image in edit
    public function showImageForEdit($id){

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['pageImageName'] = $this->Pagem->getImage($id);
            $this->load->view('Admin/showImage', $this->data);

        }
        else{
            redirect('Admin/Login');
        }
    }

    public function pageCheckFormEditPage()
    {
        $pageTitle = $this->input->post("title");
        $pagetype = $this->input->post("pagetype");
        $id=$this->uri->segment(4);


        try
        {
            $this->data['checkPage'] = $this->Pagem->checkUniquePage($pageTitle,$pagetype,$id);

            if (empty($this->data['checkPage'])){

                return true;
            }
            else{
                $this->form_validation->set_message('pageCheckFormEditPage', 'Page Allready Existed');
                return false;
            }
        }
        catch (Exception $e){

            $this->form_validation->set_message('pageCheckFormEditPage', 'Some thing Went Wrong !! Please Try Again!!');
            return false;
        }


    }

/* -------------------------------Image validation-------------------------*/
    public function val_img_check()
    {
        $image = $_FILES["image"]["name"];
        if ($image != null) {
            $this->load->library('upload');
            $config['upload_path'] = "images/validation_Image(dump)/";
            $config['allowed_types'] = 'jpg|png|jpeg|gif';

//          $config['max_size']    = '2048000';
            $config['overwrite'] = TRUE;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                $this->form_validation->set_message('val_img_check', $this->upload->display_errors());
                return false;
            } else {
                unlink(FCPATH."images/validation_Image(dump)/".$image);
                return true;
            }
        }
    }


}
