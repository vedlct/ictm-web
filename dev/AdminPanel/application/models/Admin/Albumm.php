<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Albumm extends CI_Model
{
    public function getAlbum() {
        $this->db->select('albumId,albumTitle');
        $query = $this->db->get('ictmalbum');
        return $query->result();

    }

    public function createNewAlbum() {

        $albumCategory = $this->input->post("albumCategory");
        $albumTitle = $this->input->post("albumTitle");
        $albumStatus = $this->input->post("albumStatus");



        $path   = 'images/photoAlbum/'.$albumTitle;

        if (!is_dir($path)) {
            mkdir($path, 0777, TRUE);

            $data = array(
                'albumCategoryName' => $albumCategory,
                'albumTitle' => $albumTitle,
                'albumStatus'=>$albumStatus,
                'insertedBy'=>$this->session->userdata('userEmail'),
                'insertedDate'=>date("Y-m-d H:i:s"),
            );


            $this->security->xss_clean($data);
            $error=$this->db->insert('ictmalbum', $data);

            if (empty($error))
            {
                return $this->db->error();
            }
            else {
                return $error = null;
            }

        }
        else{
            $this->session->set_flashdata('errorMessage','Already have an album of this Name!! Please Write a Different Album Title');
            redirect('Admin/Album/newAlbum');
        }


    }

    //    for pagination in manage Album
    public function record_count() {
        return $this->db->count_all("ictmalbum");
    }

    /*---------for Manage Faculty -----------------------*/
    public function getAllforManageAlbum($limit, $start) {
        $this->db->select('albumId,albumTitle,albumCategoryName,albumStatus,insertedBy,lastModifiedBy,lastModifiedDate');
        $this->db->from('ictmalbum');
        $this->db->order_by("albumId", "desc");
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

    /*-- get all information of the selected Album ---*/
    public function getAllAlbumInfobyId($albumId)
    {

        $this->db->select('albumId,albumTitle,albumCategoryName,albumStatus');
        $this->db->where('albumId', $albumId);
        $this->db->from('ictmalbum');

        $query = $this->db->get();
        return $query->result();

    }

    /*---------delete Album if no photo-----------------*/
    public function deleteAlbumbyId($albumId) //delete Album if no Photo
    {

        $this->db->select('albumTitle');
        $this->db->where('albumId',$albumId);
        $this->db->from('ictmalbum');
        $query = $this->db->get();

        if (!empty($query->result())) {

            foreach ($query->result() as $album){$albumTitle=$album->albumTitle;}

            $files_in_directory = scandir('images/photoAlbum/'.$albumTitle.'/');
            $items_count = count($files_in_directory);
            if ($items_count <= 2)
            {

                $this->db->where('albumId',$albumId);
                $this->db->delete('ictmalbum');

                $path='images/photoAlbum/'.$albumTitle;
                rmdir($path);
                return 0;
            }
            else {

                return 1;
            }

        }

    }

    /*-------- edit Album by id  in database--------------*/
    public function editAlbumbyId($albumId)
    {
        $albumCategory = $this->input->post("albumCategory");
        $albumTitle = $this->input->post("albumTitle");
        $albumStatus = $this->input->post("albumStatus");

        $this->db->select('albumTitle');
        $this->db->where('albumId',$albumId);
        $this->db->from('ictmalbum');
        $query = $this->db->get();
        if (!empty($query->result())) {

            foreach ($query->result() as $oldalbum) {
                $oldalbumTitle = $oldalbum->albumTitle;
            }
            $path='images/photoAlbum/';
            rename($path.$oldalbumTitle,$path.$albumTitle);
        }


        $data = array(
            'albumCategoryName' => $albumCategory,
            'albumTitle' => $albumTitle,
            'albumStatus'=>$albumStatus,
            'lastModifiedDate'=>date("Y-m-d H:i:s"),
            'lastModifiedBy'=>$this->session->userdata('userEmail')

        );

        $this->security->xss_clean($data);

        $this->db->where('albumId', $albumId);
        $error=$this->db->update('ictmalbum', $data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }
    }

    /*----------- check Album Title Uniqueness ---- editAlbum------------*/
    public function checkUniqueAlbumTitle($albumTitle,$id)
    {

        $this->db->select('albumTitle');
        $this->db->where('albumTitle', $albumTitle);
        $this->db->where('albumId !=', $id);
        $query = $this->db->get('ictmalbum');
        return $query->result();

    }

}