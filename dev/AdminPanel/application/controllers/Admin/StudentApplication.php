<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class StudentApplication extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin/StudentApplicationm');
    }

    public function index()
    {

    }




    /*---------for Manage Affiliation -----------------------*/

    public function manageAffiliation() // for manage Affiliation view
    {
        if ($this->session->userdata('type') == USER_TYPE[0])
        {
//            $config = array();
//            $config["base_url"] = base_url() . "Admin/Affiliation/manageAffiliation";
//            $config["total_rows"] = $this->Affiliationm->record_count();
//            $config["per_page"] = 10;
//            $config["uri_segment"] = 4;
//            $choice = $config["total_rows"] / $config["per_page"];
//            $config["num_links"] = round($choice);
//            $this->pagination->initialize($config);
//            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
//            $this->data["affiliations"] = $this->Affiliationm->getAllforManageAffiliation($config["per_page"], $page);
//            $this->data["links"] = $this->pagination->create_links();

//            $this->load->view('Admin/manageAffiliation',$this->data);
            $this->load->view('Admin/manageStudentApplication');

        }
        else{
            redirect('Admin/Login');
        }
    }

    /*---------datatable code --------------------- */
    public function ajax_list()
    {
        $list = $this->Affiliationm->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $Affiliations) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $Affiliations->affiliationsTitle;
            $row[] = $Affiliations->affiliationsStatus;

            $row[] = $Affiliations->insertedBy;

            if ($Affiliations->lastModifiedBy==""){
                $row[]='Never Modified';
            }else{
                $row[] = $Affiliations->lastModifiedBy;
            }
            if ($Affiliations->lastModifiedDate==""){
                $row[]='Never Modified';
            }else{
                $row[] = preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($Affiliations->lastModifiedDate)),1);
            }

            if ($Affiliations->affiliationsStatus == STATUS[0]){
                if ($Affiliations->homeStatus == SELECT_APPROVE[0]){

                    $row[] = '<input type="checkbox" data-panel-id="'.$Affiliations->affiliationsId .'" onclick="selectHome(this)" checked="checked"
                                                           id="appearInHome" name="appearInHome">Yes';

                }else{
                    $row[] = '<input type="checkbox" data-panel-id="'.$Affiliations->affiliationsId .'" onclick="selectHome(this)"
                                                           id="appearInHome" name="appearInHome">Yes';
                }

            }else{
                $row[] ='Status Should be Active First !!';
            }


            $html = '<a class="btn" href="'. base_url().'Admin/Affiliation/editAffiliationView/'.$Affiliations->affiliationsId.'"><i class="icon_pencil-edit"></i></a>
                                                    <a class="btn" data-panel-id="'.$Affiliations->affiliationsId .'"  onclick="selectid(this)"><i class="icon_trash"></i></a>';

            $row[] = $html;

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Affiliationm->count_all(),
            "recordsFiltered" => $this->Affiliationm->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function editAffiliationView($affiliationId) // for edit  Selected Affiliation view
    {
        if ($this->session->userdata('type') == USER_TYPE[0])
        {

            $this->data['editAffiliation'] = $this->Affiliationm->getAllAffiliationbyId($affiliationId);
            $this->load->view('Admin/editAffiliation', $this->data);
        }

        else{
            redirect('Admin/Login');
        }
    }

    public function editAffiliation($affiliationId) // for edit Affiliation by id from database
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('editAffiliation')) {

                $this->data['editAffiliation'] = $this->Affiliationm->getAllAffiliationbyId($affiliationId);
                $this->load->view('Admin/editAffiliation', $this->data);
            }

            else
            {

                $this->data['error'] = $this->Affiliationm->editAffiliationbyId($affiliationId);


                if (empty($this->data['error'])) {
                    $this->session->set_flashdata('successMessage','Affiliation Update Successfully');
                    redirect('Admin/Affiliation/manageAffiliation');
                }
                else
                {

                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Affiliation/editAffiliation/'.$affiliationId);
                }


            }
        }
        else{
            redirect('Admin/Login');
        }
    }

    public function deleteAffiliation($AffiliationId) // delete Affiliation from database
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->Affiliationm->deleteAffiliationbyId($AffiliationId);
            $this->session->set_flashdata('successMessage','Affiliation Deleted Successfully');

        }

        else{
            redirect('Admin/Login');
        }
    }


    public function showImageForEdit($AffiliationId) // show Affiliation image in new tab
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['affiliationIdImage'] = $this->Affiliationm->getImage($AffiliationId);
            $this->load->view('Admin/showImage', $this->data);
        }
        else{
            redirect('Admin/Login');
        }
    }


    public function deleteAffiliationImage($AffiliationId) //this function will delete the image in edit
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['error'] = $this->Affiliationm->deleteAffiliationImage($AffiliationId);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage','Affiliation Image Deleted Successfully');
                redirect('Admin/Affiliation/editAffiliationView/'.$AffiliationId);
            }
            else
            {
                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/Affiliation/editAffiliationView/'.$AffiliationId);
            }
        }
        else{
            redirect('Admin/Login');
        }
    }

    // appear in the Home page
    public function appearInHomePage($affiliationId)
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $approve=$this->Affiliationm->appearInHomePage($affiliationId);
            echo $approve;

        }

        else{
            redirect('Admin/Login');
        }
    }

    /*------------ for callback AffiliationTitleUniqueCheck ------------*/
    public function AffiliationTitleUniqueCheck()
    {
        $affiliationTitle = $this->input->post("affiliationTitle");
        $id=$this->uri->segment(4);

        try
        {
            $this->data['checkAffiliationTitle'] = $this->Affiliationm->checkAffiliationTitleUnique($affiliationTitle,$id);

            if (empty($this->data['checkAffiliationTitle'])){

                return true;
            }
            else{
                $this->form_validation->set_message('AffiliationTitleUniqueCheck', 'Affiliation Title Allready Existed');
                return false;
            }
        }
        catch (Exception $e){

            $this->form_validation->set_message('AffiliationTitleUniqueCheck', 'Some thing Went Wrong !! Please Try Again!!');
            return false;
        }
    }

    /* image validation---------------*/
    public function val_img_check()
    {
        $image = $_FILES['affiliationImage']['name'];
        $imageSize = ($_FILES['affiliationImage']['size']/1024);
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



    ///////////////////////////////sakib//////////////////

    public function ApplicationDetails(){

        //$applicationId = $this->input->post();
        $applicationId = 9;

        $this->data['personalDetails'] = $this->StudentApplicationm->personalDetails($applicationId);
        $this->data['contactDetails'] = $this->StudentApplicationm->contactDetails($applicationId);
        $this->data['emmergencyContact'] = $this->StudentApplicationm->emmergancyContact($applicationId);
      //  $this->data['contactDetails'] = $this->StudentApplicationm->contactDetails($applicationId);
      //  $this->data['contactDetails'] = $this->StudentApplicationm->contactDetails($applicationId);
      //  $this->data['contactDetails'] = $this->StudentApplicationm->contactDetails($applicationId);
      //  $this->data['contactDetails'] = $this->StudentApplicationm->contactDetails($applicationId);
      //  $this->data['contactDetails'] = $this->StudentApplicationm->contactDetails($applicationId);
        $this->load->view('Admin/detailsForms', $this->data);
    }
    /////////////////////////////////////////////////////
}