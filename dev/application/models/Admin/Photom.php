<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Photom extends CI_Model
{
    public function createNewPhoto() {
        extract($_POST);
        $images = $_FILES['photoImage']['name'];

        for ($i = 0; $i < count( $images ); $i++) {

            if ($images[$i] != null) {
                $data = array(
                    'albumId' => $albumId,
                    'photoDetails' => $photoDetails[$i],
                    'photoStatus' => $photoStatus[$i],
                    'insertedBy' => $this->session->userdata('userEmail'),
                    'insertedDate' => date("Y-m-d H:i:s"),

                );

                $this->security->xss_clean($data);
                $error = $this->db->insert('ictmphoto', $data);

                $photoId = $this->db->insert_id();

                $this->load->library('upload');
                $config = array(
                    'upload_path' => "images/photoAlbum/" . $albumId . "/",
                    'allowed_types' => "jpg|png|jpeg|gif",
                    'overwrite' => TRUE,
                    'remove_spaces' => FALSE,
                    'mod_mime_fix' => FALSE,
                    'file_name' => $photoId,

                );
                $this->upload->initialize($config);

                if ($this->upload->do_upload('photoImage')) {
                    // if something need after image upload
                } else {

                    $error = array('error' => $this->upload->display_errors());
                    $che = json_encode($error);
                    echo "<script>

                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Photo/newPhoto';
                    </script>";
                }
                $data1 = array(
                    'photoName' => $photoId . "." . pathinfo($images[$i], PATHINFO_EXTENSION),
                );
                $data1 = $this->security->xss_clean($data1, true);
                $this->db->where('photoId', $photoId);
                $this->db->update('ictmphoto', $data1);
            }
        }

        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }

    }

    //    for pagination of manage Photo
    public function record_count() {
        return $this->db->count_all("ictmphoto");
    }

    /*---------for Manage Photo -----------------------*/
    // for manage Photo view

//    public function getAllforManagePhoto($limit, $start ,$id) {
//
//        $this->db->select('p.photoId,p.albumId,p.photoName,p.photoStatus,p.insertedBy,p.lastModifiedBy,p.lastModifiedDate,a.albumTitle');
//        $this->db->from('ictmphoto p');
//        $this->db->where('p.albumId',$id);
//        $this->db->join('ictmalbum a', 'a.albumId = p.albumId','left');
//        $this->db->limit($limit, $start);
//        $this->db->order_by("p.photoId", "desc");
//        $query = $this->db->get();
//
//        if ($query->num_rows() > 0) {
//            foreach ($query->result() as $row) {
//                $data[] = $row;
//            }
//            return $data;
//        }
//        return false;
//
//    }

    public function getAllforManagePhoto($id) {

        $this->db->select('p.photoId,p.albumId,p.photoName,p.photoStatus,p.insertedBy,p.lastModifiedBy,p.lastModifiedDate,a.albumTitle');
        $this->db->from('ictmphoto p');
        $this->db->where('p.albumId',$id);
        $this->db->join('ictmalbum a', 'a.albumId = p.albumId','left');

        $this->db->order_by("p.photoId", "desc");
        $query = $this->db->get();

        return $query->result();

    }
    // show All Photo info for Edit Photo
    public function getPhotoInfobyId($PhotoId) {

        $this->db->select('p.photoId,p.albumId,p.photoDetails,p.photoName,p.photoStatus');
        $this->db->from('ictmphoto p');
        $this->db->where('p.photoId',$PhotoId);
        $query = $this->db->get();
        return $query->result();

    }

    public function getImage($id)
    {

        $this->db->select('photoName');
        $this->db->where('photoId',$id);
        $query = $this->db->get('ictmphoto');
        return $query->result();
    }

    /*---------delete Photo -----------------*/
    public function deletePhotobyId($photoId) //delete Photo
    {

            $this->db->where('photoId',$photoId);
            $this->db->delete('ictmphoto');


    }

}