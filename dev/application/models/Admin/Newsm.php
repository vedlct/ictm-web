<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Newsm extends CI_Model
{
    /*---------for creating new News --------------------- */

    // creates new News in database
    public function createNewNews()
    {
        $newsTitle = $this->input->post("newsTitle");
        $NewsDate = date('Y-m-d H:i:s', strtotime($this->input->post("newsDate")));
        $news_image = $_FILES['news_image']['name'];
        $newsType = $this->input->post("newsType");
        $newsStatus = $this->input->post("newsStatus");
        $newsContent = $this->input->post("newsContent");

        $data = array(
            'newsTitle' => $newsTitle,
            'newsDate' => $NewsDate,
            'newsType' => $newsType,
            'newsStatus' => $newsStatus,
            'newsContent' => $newsContent,
            'insertedBy' => $this->session->userdata('userEmail'),
            'insertedDate' => date("Y-m-d H:i:s"),
        );

        $data=$this->security->xss_clean($data);
       $error= $this->db->insert('ictmnews', $data);
        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            $newsId = $this->db->insert_id();

            if (!empty($_FILES['news_image']['name'])) {

                $this->load->library('upload');
                $config = array(
                'upload_path' => "images/newsImages/",
                'allowed_types' => "jpg|png|jpeg|gif",
                'overwrite' => TRUE,
                'remove_spaces' => FALSE,
                'mod_mime_fix' => FALSE,
                'file_name' => $newsId,

                );
            $this->upload->initialize($config);

            if ($this->upload->do_upload('news_image')) {
                // if something need after image upload
            } else {
                $error = array('error' => $this->upload->display_errors());
                $che = json_encode($error);
                echo "<script>
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/News/newNews';
                    </script>";
                return false;

            }

                $data2 = array(
                    'newsPhoto' => $newsId.".".pathinfo($news_image, PATHINFO_EXTENSION),
                );
                $data2=$this->security->xss_clean($data2,true);
                $this->db->where('newstId', $newsId);
                $this->db->update('ictmnews', $data2);

        }

            return $error=null;
        }
    }
    /*---------for creating new News ---------end------------ */

    /*---------for Manage News -----------------------*/
    // for manage News view


    public function getAllforManageNews($limit, $start) {
        $this->db->select('newsId,newsTitle,newsDate,newsType,newsStatus,insertedBy,lastModifiedBy,lastModifiedDate');
        $this->db->from('ictmnews');
        $this->db->limit($limit, $start);
        $this->db->order_by("newsId", "desc");
        $query = $this->db->get();


        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;


    }

    // for edit  Selected News view
    public function getAllNewsbyId($newsId)
    {
        $query = $this->db->get_where('ictmnews', array('newsId' => $newsId));
        return $query->result();
    }

    // for edit News by id from database
    public function editNewsbyId($id)
    {
        $newsTitle = $this->input->post("newsTitle");
        $NewsDate = date('Y-m-d H:i:s', strtotime($this->input->post("newsDate")));
        $news_image = $_FILES['news_image']['name'];
        $newsType = $this->input->post("newsType");
        $newsStatus = $this->input->post("newsStatus");
        $newsContent = $this->input->post("newsContent");


        if (!empty($_FILES['news_image']['name'])) {
            $this->load->library('upload');
            $config = array(
                'upload_path' => "images/newsImages/",
                'allowed_types' => "jpg|png|jpeg|gif",
                'overwrite' => TRUE,
                'remove_spaces'=>FALSE,
                'mod_mime_fix'=>FALSE,
                'file_name' => $id,

            );
            $this->upload->initialize($config);

            if($this->upload->do_upload('news_image')){
                // if something need after image upload
            }else{

                $error = array('error' => $this->upload->display_errors());
                $che = json_encode($error);
                echo "<script>
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/News/manageNews';
                    </script>";
                return false;

            }
            $data = array(
                'newsTitle' => $newsTitle,
                'newsDate' => $NewsDate,
                'newsPhoto' => $id.".".pathinfo($news_image, PATHINFO_EXTENSION),
                'newsType' => $newsType,
                'newsStatus' => $newsStatus,
                'newsContent' => $newsContent,
                'lastModifiedBy'=>$this->session->userdata('userEmail'),
                'lastModifiedDate'=>date("Y-m-d H:i:s"),
            );

        }
        else
        {
            $data = array(
                'newsTitle' => $newsTitle,
                'newsDate' => $NewsDate,
                'newsType' => $newsType,
                'newsStatus' => $newsStatus,
                'newsContent' => $newsContent,
                'lastModifiedBy'=>$this->session->userdata('userEmail'),
                'lastModifiedDate'=>date("Y-m-d H:i:s"),
            );
        }


        $this->db->where('newsId', $id);
       $error= $this->db->update('ictmnews',$data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }
    }

    // show the newsImage for editPage
    public function getImage($id){

        $this->db->select('newsPhoto');
        $this->db->where('newsId',$id);
        $query = $this->db->get('ictmnews');
        return $query->result();

    }

    // delete News from database
    public function deleteNewsbyId($newsId)
    {

        $this->db->where('newsId',$newsId);
        $this->db->delete('ictmnews');

    }

    //this function check the unique news name
    public function checkUniqueNews($newsTitle, $id){

        $this->db->select('newsTitle');

        $this->db->where('newsTitle',$newsTitle);
        $this->db->where('newsId !=', $id);
        $query = $this->db->get('ictmnews');
        return $query->result();
    }
    public function record_count() {
        return $this->db->count_all("ictmnews");
    }

    /*---------for Manage News ---------end--------------*/

    // delete the NewsImage for editNews
    public function deleteNewsImage($id)
    {
        $this->db->select('newsPhoto');
        $this->db->where('newsId',$id);
        $query = $this->db->get('ictmnews');
        foreach ($query->result() as $image){$newsImage=$image->newsPhoto;}

        unlink(FCPATH."images/newsImages/".$newsImage);

        $data = array(
            'newsPhoto'=>null,
            'lastModifiedBy'=>$this->session->userdata('userEmail'),
            'lastModifiedDate'=>date("Y-m-d H:i:s"),

        );
        $this->db->where('newsId',$id);
        $error=$this->db->update('ictmnews', $data);

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