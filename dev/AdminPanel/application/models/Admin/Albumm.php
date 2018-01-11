<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Albumm extends CI_Model
{

    /////////datatable//////////
    var $table = 'ictmalbum';
    var $column_order = array('albumId','albumTitle','albumCategoryName','albumStatus','homeStatus','insertedBy','lastModifiedBy','lastModifiedDate'); //set column field database for datatable orderable
    var $column_search = array('albumTitle'); //set column field database for datatable searchable
    var $order = array('albumId' =>'desc'); // default order

    private function _get_datatables_query()
    {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    ///////////////////end of datatable/////////////////////////////


    public function getAlbum() {
        $this->db->select('albumId,albumTitle');
        $query = $this->db->get('ictmalbum');
        return $query->result();

    }

    public function createNewAlbum() {

        $albumCategory = $this->input->post("albumCategory");
        $albumDescription = $this->input->post("albumDetails");
        $albumTitle = $this->input->post("albumTitle");
        $albumStatus = $this->input->post("albumStatus");



        $path   = 'images/photoAlbum/'.$albumTitle;

        if (!is_dir($path)) {
            mkdir($path, 0777, TRUE);

            $data = array(
                'albumCategoryName' => $albumCategory,
                'albumTitle' => $albumTitle,
                'albumStatus'=>$albumStatus,
                'albumDescription'=>$albumDescription,
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

//    public function checkAlbumAppearInHomePage() {
//        $this->db->select('COUNT(albumId) as total');
//        $this->db->from('ictmalbum');
//        $this->db->where('albumStatus',STATUS[0]);
//        $this->db->where('homeStatus',SELECT_APPROVE[0]);
//        $query = $this->db->get();
//        return $query->result();
//    }

    /*---------for Manage Faculty -----------------------*/
    public function getAllforManageAlbum($limit, $start) {
        $this->db->select('albumId,albumTitle,albumCategoryName,albumStatus,homeStatus,insertedBy,lastModifiedBy,lastModifiedDate');
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

        $this->db->select('albumId,albumTitle,albumCategoryName,albumStatus,albumDescription');
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

        $albumDescription = $this->input->post("albumDetails");

        if ($albumStatus==STATUS[1]){
            $homeStatus=null;
        }

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
            'homeStatus' => $homeStatus,
            'albumDescription'=>$albumDescription,
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

    // appear in the Home page
    public function appearInHomePage($albumId)
    {
        $this->db->select('homeStatus');
        $this->db->where('albumId',$albumId);
        $query = $this->db->get('ictmalbum');
        foreach ($query->result() as $status){$albumStatus=$status->homeStatus;}
        if ($albumStatus==null){

            $data = array(
                'homeStatus' => SELECT_APPROVE[0],
            );
            $approve=1;
        }
        else{
            $data = array(
                'homeStatus' => null,
            );
            $approve=0;
        }

        $this->db->where('albumId',$albumId);
        $this->db->update('ictmalbum', $data);
        //return $approve;

        $this->db->select('COUNT(albumId) as total');
        $this->db->from('ictmalbum');
        $this->db->where('albumStatus',STATUS[0]);
        $this->db->where('homeStatus',SELECT_APPROVE[0]);
        $query10 = $this->db->get();
        foreach ($query10->result() as $totalCount){
            $Total=$totalCount->total;
        }
        if ($Total > "6"){

            $data = array(
                'homeStatus' => null,
            );
            $approve =3;
            $this->db->where('albumId',$albumId);
            $this->db->update('ictmalbum', $data);


        }
        return $approve;

    }

}