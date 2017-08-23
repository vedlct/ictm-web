<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin/Pagem');



    }
 

    // this will show create page
    public function createPage()
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {
            $this->load->view('Admin/newPage');
        }
        else{
            redirect('Login');
        }
    }

    // this will insert page
    public function insertPage()
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('createPage')) {
                $this->load->view('Admin/newPage');
            }
            else
            {
                try {
                    $this->Pagem->insertPage();
                    echo "<script>
                    alert('Page Created Successfully');
                    window.location.href= '" . base_url() . "Admin/Page/createPage';
                    </script>";
                }
                catch (Exception $e)
                {
                    echo "<script>
                    alert('Some thing Went Wrong !! Please Try Again!!');
                    window.location.href= '" . base_url() . "Admin/Page/managePage';
                    </script>";
                }

            }
        }
        else{
            redirect('Login');
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
            redirect('Login');
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
            redirect('Login');
        }
    }
    //this will edit page
    public function editPage($id)
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('editPage')) {
                $this->data['editPageData'] = $this->Pagem->geteditPagaData($id);
                $this->load->view('Admin/editPage', $this->data);
            }
            else
            {
                try {
                    $this->Pagem->updatePagaData($id);
                    echo "<script>
                    alert('Page Updated Successfully');
                    window.location.href= '" . base_url() . "Admin/Page/managePage';
                    </script>";
                }
                catch (Exception $e)
                {
                    echo "<script>
                    alert('Some thing Went Wrong !! Please Try Again!!');
                    window.location.href= '" . base_url() . "Admin/Page/managePage';
                    </script>";
                }


            }
        }
        else{
            redirect('Login');
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
                echo "<script>
                    alert('Page Deleted Successfully');
                    window.location.href= '" . base_url() . "Admin/Page/managePage';
                    </script>";
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
            redirect('Login');
        }
    }
    //this function will show the image in edit
    public function showImageForEdit($id){

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['imagename'] = $this->Pagem->getImage($id);
            $this->load->view('Admin/showImage', $this->data);

        }
        else{
            redirect('Login');
        }
    }
/* -------------------------------Image validation-------------------------*/
    public function val_img_check()
    {
        $image = $_FILES["image"]["name"];
        if ($image != null) {
            $this->load->library('upload');
            $config['upload_path'] = "images/";
            $config['allowed_types'] = 'jpg|png|jpeg|gif';

//        $config['max_size']    = '2048000';
//        $config['overwrite'] = TRUE;
        $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                $this->form_validation->set_message('val_img_check', $this->upload->display_errors());
                return false;
            } else {
                return true;
            }
        }
    }


}
