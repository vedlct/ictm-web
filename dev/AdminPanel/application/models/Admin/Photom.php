<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Photom extends CI_Model
{
    public function createNewPhoto()
    {

        $albumId = $this->input->post("albumId");
        $images = $_FILES['photoImage']['name'];
        $photoStatus = $this->input->post("photoStatus");
        $photoDetails = $this->input->post("photoDetails");

        $files = $_FILES;
        $data = array();

        $this->db->select('albumTitle');
        $this->db->where('albumId', $albumId);
        $this->db->from('ictmalbum');
        $query = $this->db->get();
        if (!empty($query->result())) {

            foreach ($query->result() as $album) {
                $albumTitle = $album->albumTitle;
            }
        }

        for ($i = 0; $i < count($images); $i++) {

            if ($images[$i] != null) {

                $data = array(
                    'albumId' => $albumId,
                    'photoDetails' => $photoDetails[$i],
                    'photoStatus' => $photoStatus[$i],
                    'insertedBy' => $this->session->userdata('userEmail'),
                    'insertedDate' => date("Y-m-d H:i:s"),

                );
                $this->security->xss_clean($data);
                $error =$this->db->insert('ictmphoto', $data);

                $photoId = $this->db->insert_id();

                $data1 = array(
                    'photoName' => $photoId . "." . pathinfo($images[$i], PATHINFO_EXTENSION),
                );

                $data1 = $this->security->xss_clean($data1, true);
                $this->db->where('photoId', $photoId);
                $this->db->update('ictmphoto', $data1);

                $_FILES['photoImage']['name'] = $files['photoImage']['name'][$i];
                $_FILES['photoImage']['type'] = $files['photoImage']['type'][$i];
                $_FILES['photoImage']['tmp_name'] = $files['photoImage']['tmp_name'][$i];
                $_FILES['photoImage']['error'] = $files['photoImage']['error'][$i];
                $_FILES['photoImage']['size'] = $files['photoImage']['size'][$i];

                $this->load->library('upload');
                $this->upload->initialize($this->set_upload_options($photoId,$albumTitle));

                if (!$this->upload->do_upload('photoImage')){

                    $error[$i]=$this->upload->display_errors();
                    $data[$error[$i]];
                }


            }
        }
        if(!empty($data)){
            echo "<script>
                    alert('Some thing Went Wrong !! Please Try Again!!');
                    window.location.href= '" . base_url() . "Admin/Photo/newPhoto';
                    </script>";
            return false;
        }
    }

    //upload an image options
    private function set_upload_options($photoId,$albumTitle)
    {

        $config = array();
        $config['upload_path'] = 'images/photoAlbum/'.$albumTitle."/";
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['overwrite'] = FALSE;
        $config['file_name'] = $photoId;

        return $config;
    }

    //    for pagination of manage Photo
    public function record_count() {
        return $this->db->count_all("ictmphoto");
    }

    /*---------for Manage Photo -----------------------*/
    // for manage Photo view

    public function getAllforManagePhoto($id) {

        $this->db->select('p.photoId,p.albumId,p.photoName,p.photoStatus,p.insertedBy,p.lastModifiedBy,p.lastModifiedDate,a.albumTitle');
        $this->db->from('ictmphoto p');
        $this->db->where('p.albumId',$id);
        $this->db->join('ictmalbum a', 'a.albumId = p.albumId','left');

        $this->db->order_by("p.photoId", "desc");
        $query = $this->db->get();

        return $query->result();

    }

    /*-------- edit Photo by id  in database--------------*/
    public function editPhotobyId($photoId)
    {
        $image = $_FILES['photoImage']['name'];
        $albumId = $this->input->post("albumId");
        $photoStatus = $this->input->post("photoStatus");
        $photoDetails = $this->input->post("photoDetails");

        $this->db->select('p.albumId,a.albumTitle,p.photoName');
        $this->db->where('p.photoId',$photoId);
        $this->db->from('ictmphoto p');
        $this->db->join('ictmalbum a', 'a.albumId = p.albumId','left');
        $query = $this->db->get();

        if (!empty($query->result())) {
            foreach ($query->result() as $album) {
                $oldAlbumId = $album->albumId;
                $oldAlbumTitle = $album->albumTitle;
                $oldimage = $album->photoName;
            }
        }
        $this->load->library('upload');
        if ($oldAlbumId==$albumId) {


            if ($image != null) {

                $config = array(
                    'upload_path' => "images/photoAlbum/" . $oldAlbumTitle . "/",
                    'allowed_types' => "jpg|png|jpeg|gif",
                    'overwrite' => TRUE,
                    'remove_spaces' => FALSE,
                    'mod_mime_fix' => FALSE,
                    'file_name' => $photoId,
                );
                $this->upload->initialize($config);
                if($this->upload->do_upload('photoImage')){
                    // if something need after image upload
                }else{
                    $error =array('error'=>$this->upload->display_errors());
                    $che=json_encode($error);
                    echo "<script>
                    var x =<?php echo json_encode( $error )?>;
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Photo/editPhoto/'.$photoId;
                    </script>";

                    return false;
                }


                $data = array(

                    'photoName' => $photoId . "." . pathinfo($image, PATHINFO_EXTENSION),
                    'photoDetails' => $photoDetails,
                    'photoStatus' => $photoStatus,
                    'lastModifiedDate' => date("Y-m-d H:i:s"),
                    'lastModifiedBy' => $this->session->userdata('userEmail')

                );
            }
            else {
                $data = array(
                    'photoDetails' => $photoDetails,
                    'photoStatus' => $photoStatus,
                    'lastModifiedDate' => date("Y-m-d H:i:s"),
                    'lastModifiedBy' => $this->session->userdata('userEmail')

                );
            }
        }
        else {

            $path='images/photoAlbum/';


            $this->db->select('albumTitle');
            $this->db->where('albumId',$albumId);
            $this->db->from('ictmalbum');
            $query1 = $this->db->get();
                if (!empty($query1->result())) {

                    foreach ($query1->result() as $newalbum) {
                        $newalbumTitle = $newalbum->albumTitle;
                    }
                }
            if ($image != null) {

                $config = array(
                    'upload_path' => "images/photoAlbum/" . $newalbumTitle . "/",
                    'allowed_types' => "jpg|png|jpeg|gif",
                    'overwrite' => TRUE,
                    'remove_spaces' => FALSE,
                    'mod_mime_fix' => FALSE,
                    'file_name' => $photoId,
                );

                $this->upload->initialize($config);
                if($this->upload->do_upload('photoImage')){
                    // if something need after image upload
                }else{
                    $error =array('error'=>$this->upload->display_errors());
                    $che=json_encode($error);
                    echo "<script>
                    var x =<?php echo json_encode( $error )?>;
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Photo/editPhoto/'.$photoId;
                    </script>";

                    return false;
                }
                $data = array(
                    'albumId'=>$albumId,
                    'photoName' => $photoId . "." . pathinfo($image, PATHINFO_EXTENSION),
                    'photoDetails' => $photoDetails,
                    'photoStatus' => $photoStatus,
                    'lastModifiedDate' => date("Y-m-d H:i:s"),
                    'lastModifiedBy' => $this->session->userdata('userEmail')

                );
            }
            else {

                if(file_exists($path.$oldAlbumTitle."/".$oldimage))
                {
                    rename($path.$oldAlbumTitle."/".$oldimage , $path.$newalbumTitle."/".$oldimage);

                }
                $data = array(
                    'albumId'=>$albumId,

                    'photoDetails' => $photoDetails,
                    'photoStatus' => $photoStatus,
                    'lastModifiedDate' => date("Y-m-d H:i:s"),
                    'lastModifiedBy' => $this->session->userdata('userEmail')

                );
            }
        }

        $this->security->xss_clean($data,true);

        $this->db->where('photoId', $photoId);
        $error=$this->db->update('ictmphoto', $data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }
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
        $this->db->select('p.albumId,a.albumTitle,p.photoName');
        $this->db->where('photoId',$id);
        $this->db->from('ictmphoto p');
        $this->db->join('ictmalbum a', 'a.albumId = p.albumId','left');
        $query = $this->db->get();
        return $query->result();
    }

    /*---------delete Photo -----------------*/
    public function deletePhotobyId($photoId) //delete Photo
    {
            $this->db->where('photoId',$photoId);
            $this->db->delete('ictmphoto');
    }


    // show the PhotoImage for editPhoto
//    public function deletePhotoImage($id)
//    {
//        $this->db->select('p.albumId,a.albumTitle,p.photoName');
//        $this->db->where('photoId',$id);
//        $this->db->from('ictmphoto p');
//        $this->db->join('ictmalbum a', 'a.albumId = p.albumId','left');
//        $query = $this->db->get();
//        foreach ($query->result() as $image)
//        {
//            $photoImage=$image->photoName;
//            $photoAlbumTitle=$image->albumTitle;
//        }
//
//        unlink(FCPATH."images/photoAlbum/".$photoAlbumTitle."/".$photoImage);
//
//        $data = array(
//            'photoName'=>null,
//            'lastModifiedBy'=>$this->session->userdata('userEmail'),
//            'lastModifiedDate'=>date("Y-m-d H:i:s"),
//
//        );
//        $this->db->where('photoId',$id);
//        $error=$this->db->update('ictmphoto', $data);
//
//        if (empty($error))
//        {
//            return $this->db->error();
//        }
//        else
//        {
//            return $error=null;
//        }
//
//
//    }

}