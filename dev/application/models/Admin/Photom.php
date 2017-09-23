<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Photom extends CI_Model
{
    public function createNewPhoto() {
//        extract($_POST);
//
//
//
//        $this->db->select('albumTitle');
//        $this->db->where('albumId',$albumId);
//        $this->db->from('ictmalbum');
//        $query = $this->db->get();
//        if (!empty($query->result())) {
//
//            foreach ($query->result() as $album) {
//                $albumTitle = $album->albumTitle;
//            }
//        }
//        $files = $_FILES;
//        $data = array();
//        $images = $_FILES['photoImage']['name'];
//        for ($i = 0; $i < count($images); $i++) {
//            if ($images[$i] != null) {
//
//                $_FILES['photoImage']['name'] = $files['photoImage']['name'][$i];
//
//                $this->load->library('upload');
//                $this->upload->initialize($this->set_upload_options($albumTitle));
//                $this->upload->do_upload('photoImage');
//            } else {
//                $error[$i] = $this->upload->display_errors();
//                $this->session->set_flashdata('errorMessage', $error[$i]);
//                //$data[$error[$i]];
//            }
//        }



//                $data = array(
//                    'albumId' => $albumId,
//                    'photoDetails' => $photoDetails[$i],
//                    'photoStatus' => $photoStatus[$i],
//                    'insertedBy' => $this->session->userdata('userEmail'),
//                    'insertedDate' => date("Y-m-d H:i:s"),
//
//                );
//
//                $this->security->xss_clean($data,true);
//                $error = $this->db->insert('ictmphoto', $data);
//
//                $photoId = $this->db->insert_id();
//
//                $data1 = array(
//                    'photoName' => $photoId . "." . pathinfo($images[$i], PATHINFO_EXTENSION),
//                );
//                $data1 = $this->security->xss_clean($data1, true);
//                $this->db->where('photoId', $photoId);
//                $this->db->update('ictmphoto', $data1);
//            }
//        }

//        if (empty($error))
//        {
//            return $this->db->error();
//        }
//        else
//        {
//            return $error=null;
//        }

    }

    private function set_upload_options($albumTitle)
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = 'images/photoAlbum/'.$albumTitle;
        $config['allowed_types'] = 'jpg|png|jpeg|gif';

        $config['overwrite']     = FALSE;

        return $config;
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