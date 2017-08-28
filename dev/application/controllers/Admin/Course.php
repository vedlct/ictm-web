<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Course extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin/Coursem');
    }

    public function index()
    {

    }

    /* this will show create course page*/
    public function createCourse()
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->load->model('Admin/Departmentm');
            $this->data['departmentName'] = $this->Departmentm->gellDepartmentName();
            $this->load->view('Admin/newCourse', $this->data);
        } else {
            redirect('Admin/Login');
        }
    }


    /* this insert course */
    public function insertCourse()
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('createCourse')) {

                $this->load->model('Admin/Departmentm');
                $this->data['departmentName'] = $this->Departmentm->gellDepartmentName();
                $this->load->view('Admin/newCourse', $this->data);

            }
            else {
            $this->data['error'] =$this->Coursem->insertCourse();
            if (empty($this->data['error'])) {
                echo "<script>
                    alert('Course Created Successfully');
                    window.location.href= '" . base_url() . "Admin/Course/manageCourse';
                    </script>";

            }
            else
            {
                echo "<script>
                    alert('Some thing Went Wrong !! Please Try Again!!');
                    window.location.href= '" . base_url() . "Admin/Course/createCourse';
                    </script>";
            }
            }
        } else {
            redirect('Admin/Login');
        }
    }

    //this will show manage course
    public function manageCourse()
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {
            $this->data['coursedata'] = $this->Coursem->getCourseData();
            $this->load->view('Admin/manageCourse', $this->data);
        } else {
            redirect('Admin/Login');
        }
    }

    //this will show edited data
    public function showEditCourse($id)
    {

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->load->model('Admin/Departmentm');
            $this->data['departmentName'] = $this->Departmentm->gellDepartmentName();
            $this->data['coursealldata'] = $this->Coursem->getCourseAllDataforEdit($id);
            $this->load->view('Admin/editCourse', $this->data);

        } else {
            redirect('Admin/Login');
        }

    }

    //this funtion will edit data
    public function editCourse($id)
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            if (!$this->form_validation->run('editCourse')) {

                $this->load->model('Admin/Departmentm');
                $this->data['departmentName'] = $this->Departmentm->gellDepartmentName();
                $this->data['coursealldata'] = $this->Coursem->getCourseAllDataforEdit($id);
                $this->load->view('Admin/editCourse', $this->data);

            }
            else {

                $this->data['error'] = $this->Coursem->updateCourseData($id);

                if (empty($this->data['error'])) {
                    echo "<script>
                    alert('Course Updated Successfully');
                    window.location.href= '" . base_url() . "Admin/Course/manageCourse';
                    </script>";

                }
                else
                {
                    echo "<script>
                    alert('Some thing Went Wrong !! Please Try Again!!');
                    window.location.href= '" . base_url() . "Admin/Course/manageCourse';
                    </script>";
                }
            }
        } else {
            redirect('Admin/Login');
        }
    }

    //this function will show the image in edit
    public function showImageForEdit($id){

        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['courseImage'] = $this->Coursem->getImage($id);
            $this->load->view('Admin/showImage', $this->data);

        }
        else{
            redirect('Admin/Login');
        }
    }

    //this will delete course
    public function deleteCourse($courseId)
    {
        if ($this->session->userdata('type') == USER_TYPE[0]) {

            $this->data['coursedata'] = $this->Coursem->checkParentId($courseId);


            $name = array();
            $coursedata = $this->data['coursedata'];
            if (empty($coursedata)) {
                $this->Coursem->deleteCoursebyId($courseId);
                echo "<script>
                    alert('Course Deleted Successfully');
                    window.location.href= '" . base_url() . "Admin/Course/manageCourse';
                    </script>";
            } else {


                for ($i = 0; $i < count($coursedata); $i++) {
                    array_push($name, $coursedata[$i]);
                }
                ?>
                <script type='text/javascript'>
                    var x =<?php echo json_encode($name) ?>;
                    alert('Please Delete ( ' + x + ' ) First');
                </script>

                <?php
                echo "<script>
                    
                    window.location.href= '" . base_url() . "Admin/Course/manageCourse';
                    </script>";
            }
        }

    }
/* --------- Course Title check from editCoruse -------------------*/
    public function CourseCheckFormEditCourse()
    {
        $courseTitle = $this->input->post("name");
        $department = $this->input->post("department");
        $id=$this->uri->segment(4);


        try
        {
            $this->data['checkCourseTitle'] = $this->Coursem->checkUniqueCourse($courseTitle,$department,$id);

            if (empty($this->data['checkCourseTitle'])){

                return true;
            }
            else{
                $this->form_validation->set_message('CourseCheckFormEditCourse', 'Course Allready Existed');
                return false;
            }
        }
        catch (Exception $e){

            $this->form_validation->set_message('CourseCheckFormEditCourse', 'Some thing Went Wrong !! Please Try Again!!');
            return false;
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
            $config['overwrite'] = TRUE;
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