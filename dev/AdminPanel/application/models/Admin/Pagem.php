 <?php

class Pagem extends CI_Model
{
    //this will insert page
    public function insertPage() // creates a new page in database
    {
        $title = $this->input->post("title");
        $pagetype = $this->input->post("pagetype");

        if ($pagetype == PAGE_TYPE[4] || $pagetype== PAGE_TYPE[3]){
            $content = $this->input->post("content");
        }
        else{
            $content = $this->input->post("ckcontent");
        }


        $keywords = $this->input->post("keywords");
        $metadata = $this->input->post("metadata");
        if ($keywords == ""){
            $keywords = null;
        }
        if ($metadata == ""){
            $metadata = null;
        }

        $status = $this->input->post("status");
        $image=$_FILES['image']['name'];

        if ($image == ""){
            $image = null;
        }

        $data = array(
            'pageTitle' => $title,
            'pageKeywords' => $keywords,
            'pageMetaData' => $metadata,
            'pageContent' => $content,
            'pageType' => $pagetype,
            'pageStatus' => $status,
            'insertedBy'=>$this->session->userdata('userEmail'),
            'insertedDate'=>date("Y-m-d H:i:s"),

        );

        $this->security->xss_clean($data,true);
        $error=$this->db->insert('ictmpage', $data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            $pageId=$this->db->insert_id();

            if (!empty($_FILES['image']['name'])) {


                $this->load->library('upload');
                $config = array(
                    'upload_path' => "images/pageImages/",
                    'allowed_types' => "jpg|png|jpeg|gif",
                    'max_size' => "4096",
                    'overwrite' => TRUE,
                    'remove_spaces' => FALSE,
                    'mod_mime_fix' => FALSE,
                    'file_name' => $pageId,

                );
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {
                    // if something need after image upload
                } else {

                    $error = array('error' => $this->upload->display_errors());
                    $che = json_encode($error);
                    echo "<script>

                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Page/createPage';
                    </script>";
                }
                $data1 = array(
                    'pageImage' => $pageId.".".pathinfo($image, PATHINFO_EXTENSION),
                );
                $data1=$this->security->xss_clean($data1,true);
                $this->db->where('pageId', $pageId);
                $this->db->update('ictmpage', $data1);
            }

            return $error=null;
        }
    }


    //this will return pageID and pageTitle
    public function getPageIdName()
    {

        $this->db->select('pageId, pageTitle');
        $this->db->where('pageType !=',PAGE_TYPE[3]);
        $this->db->where('pageType !=',PAGE_TYPE[4]);
        $this->db->group_by('pageTitle');
        $query = $this->db->get('ictmpage');
        return $query->result();
    }
    //this will return pageID and pageTitle for menu
    public function getPageIdNameforMenu()
    {

        $this->db->select('pageId, pageTitle');
        $this->db->group_by('pageTitle');
        $query = $this->db->get('ictmpage');
        return $query->result();
    }


     //this will return all page data for manage page
    public function getPagaData($limit, $start) {
        $this->db->select('pageId,pageTitle,pageType,pageStatus,insertedBy,lastModifiedBy,lastModifiedDate');
        $this->db->limit($limit, $start);
        $this->db->from('ictmpage');
        $this->db->order_by("pageId", "desc");
        $query = $this->db->get();


        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;


    }
    public function getPagaDataSearchBytitle($title){

        $this->db->select('pageId,pageTitle,pageType,pageStatus,insertedBy,lastModifiedBy,lastModifiedDate');
        $this->db->from('ictmpage');
        $this->db->like('pageTitle',$title);
        //$this->db->where();
        $this->db->order_by("pageId", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function getPagaDataSearchBytype($type){

        $this->db->select('pageId,pageTitle,pageType,pageStatus,insertedBy,lastModifiedBy,lastModifiedDate');
        $this->db->from('ictmpage');
        $this->db->like('pageType',$type);
        //$this->db->where();
        $this->db->order_by("pageId", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    //this will return will page data for edit view
    public function geteditPagaData($id)
    {

        $this->db->where('pageId', $id);
        $query = $this->db->get('ictmpage');
        return $query->result();
    }

    // show the CourseImage for editCourse
    public function deletePageImage($id)
    {
        $this->db->select('pageImage');
        $this->db->where('pageId',$id);
        $query = $this->db->get('ictmpage');
         foreach ($query->result() as $image){$pageImage=$image->pageImage;}

        unlink(FCPATH."images/pageImages/".$pageImage);

        $data = array(
            'pageImage'=>null,
            'lastModifiedBy'=>$this->session->userdata('userEmail'),
            'lastModifiedDate'=>date("Y-m-d H:i:s"),

        );
        $this->db->where('pageId',$id);
        $error=$this->db->update('ictmpage', $data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }


    }

    //this will update the page data
    public function updatePagaData($id)
    {

        $title = $this->input->post("title");
        $keywords = $this->input->post("keywords");
        $metadata = $this->input->post("metadata");

        $pagetype = $this->input->post("pagetype");

        if ($pagetype == PAGE_TYPE[4] || $pagetype== PAGE_TYPE[3]){
            $content = $this->input->post("content");
        }
        else{
            $content = $this->input->post("ckContent");
        }
        if ($keywords == ""){
            $keywords = null;
        }
        if ($metadata == ""){
            $metadata = null;
        }
        $status = $this->input->post("status");
        $image = $_FILES["image"]["name"];

        if ($image == ""){
            $image = null;
        }


        if (!empty($_FILES['image']['name'])) {
            $this->load->library('upload');
            $config = array(
                'upload_path' => "images/pageImages/",
                'allowed_types' => "jpg|png|jpeg|gif",
                'max_size' => "4096",
                'overwrite' => TRUE,
                'remove_spaces'=>FALSE,
                'mod_mime_fix'=>FALSE,
                'file_name' => $id,

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
                    window.location.href= '" . base_url() . "Admin/Page/managePage';
                    </script>";
                return false;
            }

            $data = array(
                'pageTitle' => $title,
                'pageKeywords' => $keywords,
                'pageMetaData' => $metadata,
                'pageContent' => $content,
                'pageImage' => $id.".".pathinfo($image, PATHINFO_EXTENSION),
                'pageType' => $pagetype,
                'pageStatus' => $status,
                'lastModifiedBy'=>$this->session->userdata('userEmail'),
                'lastModifiedDate'=>date("Y-m-d H:i:s"),

            );

        } else {
            $data = array(
                'pageTitle' => $title,
                'pageKeywords' => $keywords,
                'pageMetaData' => $metadata,
                'pageContent' => $content,
                'pageType' => $pagetype,
                'pageStatus' => $status,
                'lastModifiedBy'=>$this->session->userdata('userEmail'),
                'lastModifiedDate'=>date("Y-m-d H:i:s"),

            );

        }
        $this->security->xss_clean($data,true);
        $this->db->where('pageId', $id);

        $error=$this->db->update('ictmpage', $data);
        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }

    }

    //this function will check the parent id for deleteing page.
    //this will only check not deleteing anything.
    //after check the data it will push in a array then finally return the whole array to controller
    public  function checkParentId($pageId){



        $this->db->select('pageSectionId');
        $this->db->where('pageId',$pageId);
        $query = $this->db->get('ictmpagesection');

        if (!empty($query->result())){
            return 1;
        }
        else{
            return 0;
        }



    }

    //this will delete page
    public function deletePagebyId($pageId)
    {
       $this->db->where('pageId',$pageId);
       $this->db->delete('ictmpagesection');

       $this->db->where('pageId',$pageId);
       $this->db->delete('ictmmenu');

       $this->db->where('pageId',$pageId);
       $this->db->delete('ictmpage');
    }
     // show the pageImage for editPage
    public function getImage($id){

        $this->db->select('pageImage');
        $this->db->where('pageId',$id);
        $query = $this->db->get('ictmpage');
        return $query->result();

    }
    /*----------- check Page Uniqueness ---- editPage------------*/
    public function checkUniquePage($pageTitle,$id)
    {

        $this->db->select('pageTitle');

        $this->db->where('pageTitle',$pageTitle);
        $this->db->where('pageId !=', $id);
        $query = $this->db->get('ictmpage');
        return $query->result();

    }

    public function record_count() {
        return $this->db->count_all("ictmpage");
    }

}

