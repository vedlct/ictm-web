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
        date_default_timezone_set("Europe/London");


        if (!empty($_FILES['news_image']['name'])) {
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

            if ($this->upload->do_upload('news_image')) {
                $response = array('upload_data' => $this->upload->data());
                //print_r($response);
            } else {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                return false;
            }

        }
        else
        {

            echo "<script>
                    alert('No Photo Selected!!');
                    window.location.href= '" . base_url() . "Admin/News/newNews';
                    </script>";
            return false;
        }
        $data = array(
            'newsTitle' => $newsTitle,
            'newsDate' => $NewsDate,
            'newsPhoto' => $news_image,
            'newsType' => $newsType,
            'newsStatus' => $newsStatus,
            'newsContent' => $newsContent,
            'insertedBy' => $this->session->userdata('userEmail'),
            'insertedDate' => date("Y-m-d H:i:s"),
        );


       $error= $this->db->insert('ictmnews', $data);
        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }
    }
    /*---------for creating new News ---------end------------ */

    /*---------for Manage News -----------------------*/
    // for manage News view
    public function getAllforManageNews()
    {
//        $query = $this->db->get('ictmnews');
//        return $query->result();
        $this->db->select('newsId,newsTitle,newsDate,newsType,newsStatus,insertedBy,lastModifiedBy,lastModifiedDate');
        $this->db->from('ictmnews');
        $query = $this->db->get();
        return $query->result();

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
        date_default_timezone_set("Europe/London");

        if (!empty($_FILES['news_image']['name'])) {
            $this->load->library('upload');
            $config = array(
                'upload_path' => "images/",
                'allowed_types' => "jpg|png|jpeg",
                'overwrite' => TRUE,
//                'max_size' => "2048000",
                'remove_spaces'=>FALSE,
                'mod_mime_fix'=>FALSE,

            );
            $this->upload->initialize($config);

            if($this->upload->do_upload('news_image')){
                $response   =array('upload_data' => $this->upload->data());
                //print_r($response);
            }else{
                $error =array('error'=>$this->upload->display_errors());
               // print_r($error);
                return false;
            }
            $data = array(
                'newsTitle' => $newsTitle,
                'newsDate' => $NewsDate,
                'newsPhoto' => $news_image,
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

    /*---------for Manage News ---------end--------------*/
}