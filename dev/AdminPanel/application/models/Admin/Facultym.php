<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Facultym extends CI_Model
{
    /*---------for creating new Faculty --------------------- */
    public function createNewFaculty()  // creates new faculty in database
    {
        $facultyFirstName = $this->input->post("facultyFirstName");
        $facultyLastName = $this->input->post("facultyLastName");
        $facultyTitle = $this->input->post("facultyTitle");
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

        $data = array(
            'facultyTitle' => $facultyTitle,
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
            'insertedBy'=>$this->session->userdata('userEmail'),
            'insertedDate'=>date("Y-m-d H:i:s"),

        );


        $this->security->xss_clean($data);
        $error=$this->db->insert('ictmfaculty', $data);
        if (empty($error))
        {
            return $this->db->error();
        }
        else {

            $facultyId=$this->db->insert_id();

           if (!empty($_FILES['facultyImage']['name'])) {

            $this->load->library('upload');
            $config = array(
                'upload_path' => "images/facultyImages/",
                'allowed_types' => "jpg|png|jpeg|gif",
                'max_size' => "4096",
                'overwrite' => TRUE,
                'remove_spaces'=>FALSE,
                'mod_mime_fix'=>FALSE,
                'file_name' => $facultyId,

            );
            $this->upload->initialize($config);

            if($this->upload->do_upload('facultyImage')){
                // if something need after image upload
                thumb('images/facultyImages/'.$facultyId.'.'.pathinfo($facultyImage, PATHINFO_EXTENSION),'360','360');
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

               $data2 = array(
                   'facultyImage' => $facultyId.".".pathinfo($facultyImage, PATHINFO_EXTENSION),
               );
               $data2=$this->security->xss_clean($data2,true);
               $this->db->where('facultyId', $facultyId);
               $this->db->update('ictmfaculty', $data2);
        }
            if(count($facultyCourse)>0 && $facultyCourse[0]!=null) {

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
    public function getAllforManageFaculty($limit, $start) {
        $this->db->select('facultyId,facultyTitle,facultyFirstName,facultyLastName,facultyEmail,facultyPosition,facultyEmpType,facultyStatus,insertedBy,lastModifiedBy,lastModifiedDate');
        $this->db->from('ictmfaculty');
        $this->db->order_by("facultyId", "desc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function getAllforManageFacultySearchByTitle($title) {

        $this->db->select('facultyId,facultyTitle,facultyFirstName,facultyLastName,facultyEmail,facultyPosition,facultyEmpType,facultyDegree,facultyStatus,insertedBy,lastModifiedBy,lastModifiedDate');
        $this->db->from('ictmfaculty');

        $this->db->like('facultyFirstName',$title);


        $this->db->order_by("facultyId", "desc");

        $query = $this->db->get();
        return $query->result() ;

    }

    // for edit  Selected Faculty view
    public function getAllFacultybyId($facultyId)
    {
        $query = $this->db->get_where('ictmfaculty', array('facultyId' => $facultyId));
        return $query->result();
    }

    // show the facultyImage for editFaculty
    public function getImage($id)
    {

        $this->db->select('facultyImage');
        $this->db->where('facultyId',$id);
        $query = $this->db->get('ictmfaculty');
        return $query->result();
    }

    // for edit Faculty by id from database
    public function editFacultybyId($id)
    {
        $facultyTitle = $this->input->post("facultyTitle");
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
                'allowed_types' => "jpg|png|jpeg|gif",
                'max_size' => "4096",
                'overwrite' => TRUE,
                'remove_spaces'=>FALSE,
                'mod_mime_fix'=>FALSE,
                'file_name' => $id,

            );
            $this->upload->initialize($config);

            if($this->upload->do_upload('facultyImage')){
                // if something need after image upload
                thumb('images/facultyImages/'.$id.'.'.pathinfo($facultyImage, PATHINFO_EXTENSION),'360','360');
            }else{
                $error =array('error'=>$this->upload->display_errors());
                $che=json_encode($error);
                echo "<script>
                    var x =<?php echo json_encode( $error )?>;
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Faculty/editFacultybyId/'.$id;
                    </script>";

                return false;
            }
            $data = array(
                'facultyTitle' => $facultyTitle,
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
                'facultyTitle' => $facultyTitle,
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
    // delete Faculty and his teaching Course from database
    public function deleteFacultybyId($facultyId)
    {

        $this->db->where('facultyId',$facultyId);
        $this->db->delete('ictmfacultycourse');

        $this->db->where('facultyId',$facultyId);
        $this->db->delete('ictmfaculty');

    }

//    for pagination in manage faculty
    public function record_count() {
        return $this->db->count_all("ictmfaculty");
    }

    // for unique faculty check in editFaculty
    public function checkUniqueEmail($email,$id)
    {

        $this->db->select('facultyEmail');
        $this->db->where('facultyEmail',$email);
        $this->db->where('facultyId !=', $id);
        $query = $this->db->get('ictmfaculty');
        return $query->result();

    }

    /*---------for Manage Faculty ---------end--------------*/



    // show the FacultyImage for editFaculty
    public function deleteFacultyImage($id)
    {
        $this->db->select('facultyImage');
        $this->db->where('facultyId',$id);
        $query = $this->db->get('ictmfaculty');
        foreach ($query->result() as $image){$facultyImage=$image->facultyImage;}

        $info = pathinfo($facultyImage);
        $name = $info['filename'];
        $format = $info['extension'];
        $pathanother   = $name."_360_360".".".$format;

        unlink(FCPATH."images/facultyImages/".$pathanother);

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