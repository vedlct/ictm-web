<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Departmentm extends CI_Model
{
    /*---------for creating new Department --------------------- */

    // creates new Department in database
    public function createNewDepartment()
    {
        $departmentName = $this->input->post("departmentName");
        $departmentHead = $this->input->post("departmentHead");
        $departmentStatus = $this->input->post("departmentStatus");
        $departmentSummary = $this->input->post("departmentSummary");

        $image = $_FILES["image"]["name"];


        if (!empty($_FILES['image']['name'])) {
            $this->load->library('upload');
            $config = array(
                'upload_path' => "images/",
                'allowed_types' => "jpg|png|jpeg|gif",
                'overwrite' => TRUE,
                //'max_size' => "2048000",
                'remove_spaces' => FALSE,
                'mod_mime_fix' => FALSE,

            );
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                //$response   =array('upload_data' => $this->upload->data());
                //print_r($response);
            } else {

                $error = array('error' => $this->upload->display_errors());
                $che = json_encode($error);
                echo "<script>
                    
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Department/newDepartment';
                    </script>";
            }

            $data = array(
                'departmentName' => $departmentName,
                'departmentHead' => $departmentHead,
                'departmentSummary' => $departmentSummary,
                'departmentImage' => $image,
                'departmentStatus' => $departmentStatus,

                'insertedBy' => $this->session->userdata('userEmail'),
                'insertedDate' => date("Y-m-d H:i:s"),
            );
        }else{
            $data = array(
                'departmentName' => $departmentName,
                'departmentHead' => $departmentHead,
                'departmentSummary' => $departmentSummary,

                'departmentStatus' => $departmentStatus,

                'insertedBy' => $this->session->userdata('userEmail'),
                'insertedDate' => date("Y-m-d H:i:s"),
            );

        }

            $this->security->xss_clean($data,true);
            $error = $this->db->insert('ictmdepartment', $data);
            if (empty($error))
            {
                return $this->db->error();
            }
            else
            {
                return $error=null;
            }

    }
    /*---------for creating new Department ---------end------------ */

    /*---------for Manage Department -----------------------*/

    // for manage Department view
    public function getAllforManageDepartment()
    {

        $this->db->select('d.departmentId,d.departmentName,d.departmentHead,d.departmentStatus,d.insertedBy,d.lastModifiedBy,d.lastModifiedDate,f.facultyFirstName,f.facultyLastName');
        $this->db->from('ictmdepartment d');
        $this->db->join('ictmfaculty f', 'f.facultyId = d.departmentHead','left');
        $this->db->order_by("d.departmentId", "desc");
        $query = $this->db->get();
        return $query->result();

    }

    // for edit  Selected Department view
    public function getAllDepartmentbyId($departmentId)
    {
        $query = $this->db->get_where('ictmdepartment', array('departmentId' => $departmentId));
        return $query->result();
    }
    public function gellDepartmentName(){

        $this->db->select('departmentId,departmentName');
        $this->db->from('ictmdepartment');
        $query = $this->db->get();
        return $query->result();

    }

    // for edit Department by id from database
    public function editDepartmentbyId($departmentId)
    {
        $departmentName = $this->input->post("departmentName");
        $departmentHead = $this->input->post("departmentHead");
        $departmentStatus = $this->input->post("departmentStatus");
        $departmentSummary = $this->input->post("departmentSummary");

        $image = $_FILES["image"]["name"];
        if (!empty($_FILES['image']['name'])) {

            $this->load->library('upload');
            $config = array(
                'upload_path' => "images/",
                'allowed_types' => "jpg|png|jpeg",
                'overwrite' => TRUE,
                //'max_size' => "2048000",
                'remove_spaces'=>FALSE,
                'mod_mime_fix'=>FALSE,

            );
            $this->upload->initialize($config);

            if($this->upload->do_upload('image')){
                //$response   =array('upload_data' => $this->upload->data());
                //print_r($response);
            }else{

                $error =array('error'=>$this->upload->display_errors());
                $che=json_encode($error);
                echo "<script>
                var x =<?php echo json_encode( $error )?>;
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Page/managePage';
                    </script>";
                return false;
            }
            $data = array(
                'departmentName' => $departmentName,
                'departmentHead' => $departmentHead,
                'departmentSummary' => $departmentSummary,
                'departmentStatus' =>$departmentStatus,
                'departmentImage' => $image,
                'lastModifiedBy'=>$this->session->userdata('userEmail'),
                'lastModifiedDate'=>date("Y-m-d H:i:s"),
            );

        }else {


            $data = array(
                'departmentName' => $departmentName,
                'departmentHead' => $departmentHead,
                'departmentSummary' => $departmentSummary,
                'departmentStatus' => $departmentStatus,
                'lastModifiedBy' => $this->session->userdata('userEmail'),
                'lastModifiedDate' => date("Y-m-d H:i:s"),
            );
        }
        $this->security->xss_clean($data,true);
        $this->db->where('departmentId', $departmentId);
       $error = $this->db->update('ictmdepartment',$data);
        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }
    }

    /*---------delete Department if no Course-----------------*/
    //delete Department if no Course
    public function deleteDepartmentId($departmentId)
    {

//        $query = $this->db->get_where('ictmcourse', array('departmentId' => $departmentId));
        $this->db->select('courseId,departmentId,courseTitle');
        $this->db->where('departmentId',$departmentId);
        $this->db->from('ictmcourse');
        $query = $this->db->get();

        if (empty($query->result())){

            $this->db->where('departmentId',$departmentId);
            $this->db->delete('ictmdepartment');
            return 0;
        }
        else{
            return $query->result();
        }



    }

    // show the pageImage for editPage
    public function getImage($id){

        $this->db->select('departmentImage');
        $this->db->where('departmentId',$id);
        $query = $this->db->get('ictmdepartment');
        return $query->result();

    }


    public function checkUniqueDepartment($departmentName,$id)
    {

        $this->db->select('departmentName');

        $this->db->where('departmentName',$departmentName);
        $this->db->where('departmentId !=', $id);
        $query = $this->db->get('ictmdepartment');
        return $query->result();

    }

}