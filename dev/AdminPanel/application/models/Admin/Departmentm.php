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

        $data = array(
            'departmentName' => $departmentName,
            'departmentHead' => $departmentHead,
            'departmentSummary' => $departmentSummary,
            'departmentStatus' => $departmentStatus,
            'insertedBy' => $this->session->userdata('userEmail'),
            'insertedDate' => date("Y-m-d H:i:s"),
        );

            $this->security->xss_clean($data,true);
            $error = $this->db->insert('ictmdepartment', $data);
            if (empty($error))
            {
                return $this->db->error();
            }
            else
            {
                $departmentId=$this->db->insert_id();
                if (!empty($_FILES['image']['name'])) {

                    $image=$_FILES['image']['name'];

                    $this->load->library('upload');

                    $config = array(
                        'upload_path' => "images/departmentImages/",
                        'allowed_types' => "jpg|png|jpeg|gif",
                        'overwrite' => TRUE,
                        'max_size' => "1024*4",
                        'remove_spaces' => FALSE,
                        'mod_mime_fix' => FALSE,
                        'file_name' => $departmentId,

                    );
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('image')) {
                        // if something need after image upload
                    } else {

                        $error = array('error' => $this->upload->display_errors());
                        $che = json_encode($error);
                        echo "<script>
                    
                            alert($che.error);
                            window.location.href= '" . base_url() . "Admin/Department/newDepartment';
                        </script>";
                    }
                    $data1 = array(
                        'departmentImage' => $departmentId.".".pathinfo($image, PATHINFO_EXTENSION),
                    );
                    $data1=$this->security->xss_clean($data1,true);
                    $this->db->where('departmentId', $departmentId);
                    $this->db->update('ictmdepartment', $data1);
                }

                return $error=null;
            }

    }
    /*---------for creating new Department ---------end------------ */

    /*---------for Manage Department -----------------------*/

    // for manage Department view
    public function getAllforManageDepartment()
    {

        $this->db->select('d.departmentId,d.departmentName,d.departmentHead,d.departmentStatus,d.insertedBy,d.lastModifiedBy,d.lastModifiedDate');
        $this->db->from('ictmdepartment d');
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
                'upload_path' => "images/departmentImages/",
                'allowed_types' => "jpg|png|jpeg|gif",
                'overwrite' => TRUE,
                'max_size' => "1024*4",
                'remove_spaces'=>FALSE,
                'mod_mime_fix'=>FALSE,
                'file_name' => $departmentId,

            );
            $this->upload->initialize($config);

            if($this->upload->do_upload('image')){
                // if something need after image upload
            }else{

                $error =array('error'=>$this->upload->display_errors());
                $che=json_encode($error);
                echo "<script>
                var x =<?php echo json_encode( $error )?>;
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Department/editDepartmentbyId/'.$departmentId;
                    </script>";
                return false;
            }
            $data = array(
                'departmentName' => $departmentName,
                'departmentHead' => $departmentHead,
                'departmentSummary' => $departmentSummary,
                'departmentStatus' =>$departmentStatus,
                'departmentImage' => $departmentId.".".pathinfo($image, PATHINFO_EXTENSION),
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

    // delete the DepartmentImage for editDepartment
    public function deleteDepartmentImage($id)
    {
        $this->db->select('departmentImage');
        $this->db->where('departmentId',$id);
        $query = $this->db->get('ictmdepartment');

        foreach ($query->result() as $image){$departmentImage=$image->departmentImage;}

        unlink(FCPATH."images/departmentImages/".$departmentImage);

        $data = array(
            'departmentImage'=>null,
            'lastModifiedBy'=>$this->session->userdata('userEmail'),
            'lastModifiedDate'=>date("Y-m-d H:i:s"),

        );
        $this->db->where('departmentId',$id);
        $error=$this->db->update('ictmdepartment', $data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }


    }

    // validation Unique check Department from edit
    public function checkUniqueDepartment($departmentName,$id)
    {

        $this->db->select('departmentName');
        $this->db->where('departmentName',$departmentName);
        $this->db->where('departmentId !=', $id);
        $query = $this->db->get('ictmdepartment');
        return $query->result();

    }

}