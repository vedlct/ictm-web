<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Facultym extends CI_Model
{
    /*---------for creating new Faculty --------------------- */
    public function createNewFaculty()  // creates new faculty in database
    {
        $facultyFirstName = $this->input->post("facultyFirstName");
        $facultyLastName = $this->input->post("facultyLastName");
        $facultyDegree = $this->input->post("facultyDegree");
        $facultyPosition = $this->input->post("facultyPosition");
        $facultyImage=$_FILES['facultyImage']['name'];
        $facultyEmpType = $this->input->post("facultyEmpType");
        $facultyEmail = $this->input->post("facultyEmail");
        $facultyPhone = $this->input->post("facultyPhone");
        $facultyTwitter = $this->input->post("facultyTwitter");
        $facultyLinkdin = $this->input->post("facultyLinkedin");
        $facultyStatus = $this->input->post("facultyStatus");
        $facultyCourse = $this->input->post("facultyCourses[]");
        $facultyIntro = $this->input->post("facultyIntro");

        if (!empty($_FILES['facultyImage']['name'])) {
            $this->load->library('upload');
            $config = array(
                'upload_path' => "images/facultyImages/",
                'allowed_types' => "jpg|png|jpeg|gif",
                'overwrite' => TRUE,
                //'max_size' => "2048000",
                'remove_spaces'=>FALSE,
                'mod_mime_fix'=>FALSE,

            );
            $this->upload->initialize($config);

            if($this->upload->do_upload('facultyImage')){
                $response   =array('upload_data' => $this->upload->data());
                //print_r($response);
            }
            else{

                $error =array('error'=>$this->upload->display_errors());
                $che=json_encode($error);
                echo "<script>
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Faculty/newFaculty';
                    </script>";
                return false;
            }
        }
        else
        {
            echo "<script>
                    alert('No Photo Selected!!');
                    window.location.href= '" . base_url() . "Admin/Faculty/newFaculty';
                    </script>";
            return false;
        }

        $data = array(
            'facultyFirstName' => $facultyFirstName,
            'facultyLastName' => $facultyLastName,
            'facultyDegree' => $facultyDegree,
            'facultyPosition' => $facultyPosition,
            'facultyEmpType' => $facultyEmpType,
            'facultyEmail'=>$facultyEmail,
            'faultyPhone'=>$facultyPhone,
            'facultyTwitter'=>$facultyTwitter,
            'facultyLinkedIn'=>$facultyLinkdin,
            'facultyIntro'=>$facultyIntro,
            'facultyImage'=>$facultyImage,
            'facultyStatus'=>$facultyStatus,
            'insertedBy'=>$this->session->userdata('userEmail'),
            'insertedDate'=>date("Y-m-d H:i:s"),

        );
        $this->security->xss_clean($data,true);
        $error=$this->db->insert('ictmfaculty', $data);
        if (empty($error))
        {
            return $this->db->error();
        }
        else {

            if(count($facultyCourse)>0 && $facultyCourse[0]!=null) {

                $this->db->select('facultyId');
                $this->db->from('ictmfaculty');
                $this->db->order_by('facultyId', 'DESC');
                $this->db->limit(1);
                $query = $this->db->get();

                foreach ($query->result() as $r) {

                    $facultyId = $r->facultyId;
                }
                for ($i = 0; $i < count($facultyCourse); $i++) {
                    $data1 = array(
                        'courseId' => $facultyCourse[$i],
                        'facultyId' => $facultyId
                    );
                    $this->security->xss_clean($data1);
                    $error = $this->db->insert('ictmfacultycourse', $data1);

                }
                if (empty($error)) {
                    return $this->db->error();
                } else {
                    return $error = null;
                }
            }

        }
    }
    /*---------for creating new Faculty ---------end------------ */


    /*---------for Manage Faculty -----------------------*/
    public function getAllforManageFaculty() // for manage Faculty view
    {


        $this->db->select('facultyId,facultyFirstName,facultyLastName,facultyEmail,facultyPosition,facultyEmpType,facultyDegree,facultyStatus,insertedBy,lastModifiedBy,lastModifiedDate');
        $this->db->from('ictmfaculty');
        $this->db->order_by("facultyId", "desc");
        $query = $this->db->get();
        return $query->result();

    }

    public function getAllFacultybyId($facultyId) // for edit  Selected Faculty view
    {
        $query = $this->db->get_where('ictmfaculty', array('facultyId' => $facultyId));
        return $query->result();
    }


    public function getImage($id)  // show the facultyImage for editFaculty
    {

        $this->db->select('facultyImage');
        $this->db->where('facultyId',$id);
        $query = $this->db->get('ictmfaculty');
        return $query->result();
    }

    public function editFacultybyId($id)        // for edit Faculty by id from database
    {
        $facultyFirstName = $this->input->post("faculty_first_name");
        $facultyLastName = $this->input->post("faculty_last_name");
        $facultyDegree = $this->input->post("faculty_degree");
        $facultyPosition = $this->input->post("faculty_position");
        $facultyImage=$_FILES['facultyImage']['name'];
        $facultyEmpType = $this->input->post("faculty_emp_type");
        $facultyEmail = $this->input->post("faculty_email");
        $facultyPhone = $this->input->post("faculty_phone");
        $facultyTwitter = $this->input->post("faculty_twitter");
        $facultyLinkdin = $this->input->post("faculty_linkedin");
        $facultyStatus = $this->input->post("faculty_status");

        $facultyIntro = $this->input->post("faculty_intro");


        if (!empty($_FILES['facultyImage']['name'])) {
            $this->load->library('upload');
            $config = array(
                'upload_path' => "images/facultyImages/",
                'allowed_types' => "jpg|png|jpeg",
                'overwrite' => TRUE,
//                'max_size' => "2048000",
                'remove_spaces'=>FALSE,
                'mod_mime_fix'=>FALSE,
                'file_name' => $id,

            );
            $this->upload->initialize($config);

            if($this->upload->do_upload('facultyImage')){
                $response   =array('upload_data' => $this->upload->data());
                //print_r($response);
            }else{
                $error =array('error'=>$this->upload->display_errors());
                $che=json_encode($error);
                echo "<script>
                    var x =<?php echo json_encode( $error )?>;
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Faculty/newFaculty';
                    </script>";

                return false;
            }
            $data = array(
                'facultyFirstName' => $facultyFirstName,
                'facultyLastName' => $facultyLastName,
                'facultyDegree' => $facultyDegree,
                'facultyPosition' => $facultyPosition,
                'facultyEmpType' => $facultyEmpType,
                'facultyEmail'=>$facultyEmail,
                'faultyPhone'=>$facultyPhone,
                'facultyTwitter'=>$facultyTwitter,
                'facultyLinkedIn'=>$facultyLinkdin,
                'facultyIntro'=>$facultyIntro,
                'facultyImage'=>$id.".".pathinfo($facultyImage, PATHINFO_EXTENSION),
                'facultyStatus'=>$facultyStatus,
                'lastModifiedBy'=>$this->session->userdata('userEmail'),
                'lastModifiedDate'=>date("Y-m-d H:i:s"),

            );

        }
        else
        {
            $data = array(
                'facultyFirstName' => $facultyFirstName,
                'facultyLastName' => $facultyLastName,
                'facultyDegree' => $facultyDegree,
                'facultyPosition' => $facultyPosition,
                'facultyEmpType' => $facultyEmpType,
                'facultyEmail'=>$facultyEmail,
                'faultyPhone'=>$facultyPhone,
                'facultyTwitter'=>$facultyTwitter,
                'facultyLinkedIn'=>$facultyLinkdin,
                'facultyIntro'=>$facultyIntro,
                'facultyStatus'=>$facultyStatus,
                'lastModifiedBy'=>$this->session->userdata('userEmail'),
                'lastModifiedDate'=>date("Y-m-d H:i:s"),

            );
        }


        $this->db->where('facultyId', $id);
        $error=$this->db->update('ictmfaculty',$data);
        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }
    }

    public function deleteFacultybyId($facultyId)  // delete Faculty and his teaching Course from database
    {

        $this->db->where('facultyId',$facultyId);
        $this->db->delete('ictmfacultycourse');

        $this->db->where('facultyId',$facultyId);
        $this->db->delete('ictmfaculty');

    }


// show the FacultyImage for editFaculty
    public function deleteFacultyImage($id)
    {
        $this->db->select('facultyImage');
        $this->db->where('facultyId',$id);
        $query = $this->db->get('ictmfaculty');
        foreach ($query->result() as $image){$facultyImage=$image->facultyImage;}

        unlink(FCPATH."images/facultyImages/".$facultyImage);

        $data = array(
            'facultyImage'=>null,
            'lastModifiedBy'=>$this->session->userdata('userEmail'),
            'lastModifiedDate'=>date("Y-m-d H:i:s"),

        );
        $this->db->where('facultyId',$id);
        $error=$this->db->update('ictmfaculty', $data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }


    }

}