<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin/Pagem');
        $this->load->library("pagination");
    }

    public function index(){


    }
    /*---------for creating new News --------------------- */
    public function ajax_list()
    {
        $list = $this->Pagem->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $page) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $page->pageTitle;
            $row[] = $page->pageType;
            $row[] = $page->pageStatus;
            $row[] = $page->insertedBy;

            if ($page->lastModifiedBy==""){
                $row[]='Never Modified';
            }else{
                $row[] = $page->lastModifiedBy;
            }
            if ($page->lastModifiedDate==""){
                $row[]='Never Modified';
            }else{

                $row[] = preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($page->lastModifiedDate)),1);

            }
            $row[] = '<a class="btn" href="'.base_url().'Admin/Page/editPageShow/'.$page->pageId.'"><i class="icon_pencil-edit"></i></a>
            <a class="btn " data-panel-id="'.$page->pageId.'"onclick=\'return confirm("Are you sure to Delete This Page?")\' href="'.base_url().'Admin/Page/deletePage/'. $page->pageId.'"><i class="icon_trash"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Pagem->count_all(),
            "recordsFiltered" => $this->Pagem->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
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

//            $config = array();
//            $config["base_url"] = base_url() . "Admin/Page/managePage";
//            $config["total_rows"] = $this->Pagem->record_count();
//            $config["per_page"] = 10;
//            $config["uri_segment"] = 4;
//            $choice = $config["total_rows"] / $config["per_page"];
//            $config["num_links"] = round($choice);
//            $this->pagination->initialize($config);
//            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
//            $this->data["pageData"] = $this->Pagem->getPagaData($config["per_page"], $page);
//            $this->data["links"] = $this->pagination->create_links();
			$this->data['menuname'] = $this->Pagem->getMenuIdName();
             $this->load->view('Admin/managePage1',$this->data);

        }
        else{
            redirect('Admin/Login');
        }
    }

//    public function searchByPage(){
//        if ($this->session->userdata('type') == USER_TYPE[0])
//        {
//            $type = $this->input->post('pageType');
//            //$this->data["links"] = null;
//            $this->data["menu"] = $this->Page->getPagaDataSearchBytype($type);
//
//            $this->load->view('Admin/searchByPageType',$this->data);
//        }
//        else{
//            redirect('Admin/Login');
//        }
//    }

    public function searchByTitlPage()
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {
            $title = $this->input->post('title');
            $this->data["links"] = null;
            $this->data["pageData"] = $this->Pagem->getPagaDataSearchBytitle($title);
            $this->load->view('Admin/managePage', $this->data);
        }
        else{
            redirect('Admin/Login');
        }
    }

    public function searchBypagetype()
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $pageType = $this->input->post('pageType');
            $this->data["links"] = null;
            $this->data["pageData"] = $this->Pagem->getPagaDataSearchBytype($pageType);
            $this->load->view('Admin/searchByPageType', $this->data);

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

            if ($this->data['pagedata']==1){
                echo "<script>
                            alert('This Page cannot be deleted as there are Page section(s) attached to it. please delete  all the related Page section(s) first');
                            window.location.href= '" . base_url() . "Admin/Page/managePage';
                        </script>";
            }
            else{
                $this->Pagem->deletePagebyId($pageId);

                $this->session->set_flashdata('successMessage','Page Deleted Successfully');
                redirect('Admin/Page/managePage');
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

        $id=$this->uri->segment(4);


        try
        {
            $this->data['checkPage'] = $this->Pagem->checkUniquePage($pageTitle,$id);

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
