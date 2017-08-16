<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Newsm extends CI_Model
{
    /*---------for creating new News --------------------- */

    public function createNewNews() // creates new News in database
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


        $this->db->insert('ictmnews', $data);
    }
    /*---------for creating new News ---------end------------ */

    /*---------for Manage News -----------------------*/
    public function getAllforManageNews() // for manage News view
    {
        $query = $this->db->get('ictmnews');
        return $query->result();

    }

    public function getAllNewsbyId($newsId) // for edit  Selected News view
    {
        $query = $this->db->get_where('ictmnews', array('newsId' => $newsId));
        return $query->result();
    }

    public function editNewsbyId($id)        // for edit News by id from database
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
                print_r($error);
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
        $this->db->update('ictmnews',$data);
    }

    public function deleteNewsbyId($newsId)  // delete News from database
    {

        $this->db->where('newsId',$newsId);
        $this->db->delete('ictmnews');

    }

    /*---------for Manage News ---------end--------------*/
}