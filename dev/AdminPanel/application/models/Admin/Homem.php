<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Homem extends CI_Model
{
    public function insertBottomBanner() //insert Bottom Banner
    {

            $title = $this->input->post("title");
            $subTitle = $this->input->post("subTitle");
            $bannerImage = $_FILES['image']['name'];


            $this->load->library('upload');
            $config = array(
                'upload_path' => "images/homeImage/",
                'allowed_types' => "jpg|png|jpeg|gif",
                'max_size' => "1024*4",
                'overwrite' => TRUE,
                'remove_spaces' => FALSE,
                'mod_mime_fix' => FALSE,
                'file_name' => "bottomBanner".".".pathinfo($bannerImage, PATHINFO_EXTENSION),

            );
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                // if something need after image upload
            } else {
                $error = array('error' => $this->upload->display_errors());
                $che = json_encode($error);
                echo "<script>
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Home/bottomBanner';
                    </script>";
                return false;
            }

            $data = array(
                'bottomBannerTitle' => $title,
                'bottomBannerSubTitle' => $subTitle,
                'bottomBannerImage' => "bottomBanner".".".pathinfo($bannerImage, PATHINFO_EXTENSION),

            );

            $data = $this->security->xss_clean($data,true);
            $error=$this->db->insert('ictmhome', $data);
            if (empty($error))
            {
                return $this->db->error();
            }
            else
            {
                return $error = null;
            }
    }
    public function getHomeId() //get home id
    {
        $this->db->select('homeId');
        $query = $this->db->get('ictmhome');
        return $query->result();

    }

    public function getHomeBottomBannerdata() //get home Bottom Banner Data
    {
        $this->db->select('homeId,bottomBannerTitle,bottomBannerSubTitle,bottomBannerImage');
        $query = $this->db->get('ictmhome');
        return $query->result();

    }

    public function updateBottomBanner($id) //Update home Bottom Banner Data
    {

        $title = $this->input->post("title");
        $subTitle = $this->input->post("subTitle");
        $bannerImage = $_FILES['image']['name'];

        if (!empty($_FILES['image']['name'])) {
            $this->load->library('upload');
            $config = array(
                'upload_path' => "images/homeImage/",
                'allowed_types' => "jpg|png|jpeg|gif",
                'max_size' => "1024*4",
                'overwrite' => TRUE,
                'remove_spaces'=>FALSE,
                'mod_mime_fix'=>FALSE,
                'file_name' => "bottomBanner".".".pathinfo($bannerImage, PATHINFO_EXTENSION),

            );
            $this->upload->initialize($config);

            if($this->upload->do_upload('image')){
                // if something need after image upload
            }else{
                $error =array('error'=>$this->upload->display_errors());
                $che=json_encode($error);
                echo "<script>
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Home/editBottomBanner/'.$id;
                    </script>";
                return false;
            }
            $data = array(
                'bottomBannerTitle' => $title,
                'bottomBannerSubTitle' => $subTitle,
                'bottomBannerImage' => "bottomBanner".".".pathinfo($bannerImage, PATHINFO_EXTENSION),

            );

        }
        else
        {
            $data = array(
                'bottomBannerTitle' => $title,
                'bottomBannerSubTitle' => $subTitle,

            );
        }

        $data = $this->security->xss_clean($data,true);
        $this->db->where('homeId', $id);
        $error=$this->db->update('ictmhome', $data);

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