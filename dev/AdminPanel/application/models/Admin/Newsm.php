<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Newsm extends CI_Model
{
    /////////datatable//////////
    var $table = 'ictmnews';
//    var $column_order = array(null,'registerInterestId','title','firstName','surName','mobile','appointmentDate','course','email','inserDate'); //set column field database for datatable orderable
    var $column_order = array(null,'newsTitle','newsDate',null,null,null,null,null); //set column field database for datatable orderable
    var $column_search = array('newsTitle','newsDate'); //set column field database for datatable searchable
    var $order = array('newsId' => 'desc'); // default order

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


    /*---------for creating new News --------------------- */

    // creates new News in database
    public function createNewNews()
    {
        date_default_timezone_set("Europe/London");
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
                'max_size' => "4096",
                'overwrite' => TRUE,
                'remove_spaces' => FALSE,
                'mod_mime_fix' => FALSE,
                'file_name' => $newsId,

                );
            $this->upload->initialize($config);

            if ($this->upload->do_upload('news_image')) {
                // if something need after image upload
                thumb('images/newsImages/'.$newsId.'.'.pathinfo($news_image, PATHINFO_EXTENSION),'409','258');
                thumb('images/newsImages/'.$newsId.'.'.pathinfo($news_image, PATHINFO_EXTENSION),'80','80');
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
                $this->db->where('newsId', $newsId);
                $this->db->update('ictmnews', $data2);

        }

            return $error=null;
        }
    }
    /*---------for creating new News ---------end------------ */

    /*---------for Manage News -----------------------*/
    // for manage News view


    public function getAllforManageNews($limit, $start) {
        $this->db->select('newsId,newsTitle,newsDate,newsType,newsStatus,homeStatus,insertedBy,lastModifiedBy,lastModifiedDate');
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

    public function viewAllNewsByName($name)
    {
        $this->db->select('newsId,newsTitle,newsDate,newsType,newsStatus,homeStatus,insertedBy,lastModifiedBy,lastModifiedDate');
        $this->db->from('ictmnews');

        $this->db->like('newsTitle',$name);
        $this->db->order_by("newsId", "desc");
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
        date_default_timezone_set("Europe/London");
        $newsTitle = $this->input->post("newsTitle");
        $NewsDate = date('Y-m-d H:i:s', strtotime($this->input->post("newsDate")));
        $news_image = $_FILES['news_image']['name'];
        $newsType = $this->input->post("newsType");
        $newsStatus = $this->input->post("newsStatus");
        $newsContent = $this->input->post("newsContent");

        if ($newsStatus==STATUS[1]){
            $homeStatus=null;
        }



        if (!empty($_FILES['news_image']['name'])) {
            $this->load->library('upload');
            $config = array(
                'upload_path' => "images/newsImages/",
                'allowed_types' => "jpg|png|jpeg|gif",
                'max_size' => "4096",
                'overwrite' => TRUE,
                'remove_spaces'=>FALSE,
                'mod_mime_fix'=>FALSE,
                'file_name' => $id,

            );
            $this->upload->initialize($config);

            if($this->upload->do_upload('news_image')){
                // if something need after image upload
                thumb('images/newsImages/'.$id.'.'.pathinfo($news_image, PATHINFO_EXTENSION),'409','258');
                thumb('images/newsImages/'.$id.'.'.pathinfo($news_image, PATHINFO_EXTENSION),'80','80');
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
                'homeStatus' => $homeStatus,
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
                'homeStatus' => $homeStatus,
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

        $info = pathinfo($newsImage);
        $name = $info['filename'];
        $format = $info['extension'];
        $pathanother   = $name."_258_409".".".$format;
        $pathanother1   = $name."_80_80".".".$format;


        unlink(FCPATH."images/newsImages/".$pathanother);

        unlink(FCPATH."images/newsImages/".$pathanother1);

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

    // appear in the Home page
    public function appearInHomePage($newsId)
    {
        $this->db->select('homeStatus');
        $this->db->where('newsId',$newsId);
        $query = $this->db->get('ictmnews');
        foreach ($query->result() as $status){$newsStatus=$status->homeStatus;}
        if ($newsStatus==null){

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

        $this->db->where('newsId',$newsId);
        $this->db->update('ictmnews', $data);
        //return $approve;

        $this->db->select('COUNT(newsId) as total');
        $this->db->from('ictmnews');
        $this->db->where('newsStatus',STATUS[0]);
        $this->db->where('homeStatus',SELECT_APPROVE[0]);
        $query10 = $this->db->get();
        foreach ($query10->result() as $totalCount){
            $Total=$totalCount->total;
        }
        if ($Total > "3"){

            $data = array(
                'homeStatus' => null,
            );
            $approve =3;
            $this->db->where('newsId',$newsId);
            $this->db->update('ictmnews', $data);


        }
        return $approve;

    }
}