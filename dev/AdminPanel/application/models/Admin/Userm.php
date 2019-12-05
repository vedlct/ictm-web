<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Userm extends CI_Model
{
    var $table = 'ictmusers';

    var $select =array('ictmusers.userId','ictmusers.roleId','ictmusers.userEmail','ictmusers.firstName','ictmusers.surName','ictmusers.usersStatus','ictmrole.roleName');
    var $column_order = array(null,'userEmail'); //set column field database for datatable orderable
    var $column_search = array('userEmail','firstName','surName' ); //set column field database for datatable searchable
    var $order = array('userId' => 'desc'); // default order

    private function _get_datatables_query()
    {
//        if($this->input->post('pageType1'))
//        {
//            $this->db->where('pageType', $this->input->post('pageType1'));
//        }


        $this->db->select($this->select);
        $this->db->from($this->table);
        $this->db->join('ictmrole','ictmrole.roleId = ictmusers.roleId','left');
//        $this->db->join('ictmmenu menu', 'm.parentId = menu.menuId','left');
//        $this->db->join('ictmpage p', 'm.pageId = p.pageId','left');



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

    public function createNewUser()             // for insert new menu into database
    {
        $firstName = $this->input->post("firstName");
        $surName = $this->input->post("surName");
        $userEmail = $this->input->post("userEmail");
//        $userPassword= $this->input->post("userPassword");
        $userPassword = password_hash($this->input->post("userPassword"),PASSWORD_DEFAULT);
        $roleId= $this->input->post("roleId");
        $usersStatus= $this->input->post("usersStatus");
        $data = array(
            'firstName' => $firstName,
            'surName' => $surName,
            'userEmail' => $userEmail,
            'userPassword' => $userPassword,
            'roleId' => $roleId,
            'usersStatus' => $usersStatus,
//            'insertedBy'=>$this->session->userdata('userEmail'),
            'insertedDate'=>date("Y-m-d H:i:s"),

        );
        $this->security->xss_clean($data);
        $error=$this->db->insert('ictmusers', $data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }

    }

    public function createNewRole()             // for insert new menu into database
    {
        $userId = $this->input->post("userId");
        $menuId = $this->input->post("menuId");
        $data = array(
            'userId' => $userId,
            'menuId' => $menuId

        );
        $this->security->xss_clean($data);
        $error=$this->db->insert('adminmenurole', $data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }

    }

    public function getRole()
    {

        $this->db->select('roleId, roleName');
        $query = $this->db->get('ictmrole');
        return $query->result();
    }

    public function getUser()
    {

        $this->db->select('userId, userEmail');
        $query = $this->db->get('ictmusers');
        return $query->result();
    }

    public function getMenu()
    {

        $this->db->select('id, menuName');
        $query = $this->db->get('adminmenu');
        return $query->result();
    }

    public function deleteUser($userId)
    {

        $this->db->where('userId',$userId);
        $this->db->delete('ictmusers');

    }

    public function geteditUserData($userId)
    {

//        $this->db->where('userId', $userId);
        $this->db->select('ictmusers.*,ictmrole.roleId','ictmrole.roleName');
        $this->db->where('ictmusers.userId', $userId);
        $this->db->from('ictmusers');
        $this->db->join('ictmrole', 'ictmusers.roleId = ictmrole.roleId','left');
        $query = $this->db->get();
        return $query->result();
    }

    public function editUserbyId($userId)
    {
        $firstName = $this->input->post("firstName");
        $surName = $this->input->post("surName");
        $userEmail = $this->input->post("userEmail");
//        $userPassword= $this->input->post("userPassword");
        $roleId= $this->input->post("roleId");
        $usersStatus= $this->input->post("usersStatus");


        $data = array(
            'firstName' => $firstName,
            'surName' => $surName,
            'userEmail' => $userEmail,
            'usersStatus' => $usersStatus,
//            'userPassword' => $userPassword,
            'roleId' => $roleId,
//            'insertedBy'=>$this->session->userdata('userEmail'),
            'insertedDate'=>date("Y-m-d H:i:s")

        );

        $this->security->xss_clean($data);

        $this->db->where('userId', $userId);
        $error=$this->db->update('ictmusers', $data);
        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }
    }

//    function is_email_available($userEmail)
//    {
//        $this->db->where('userEmail', $userEmail);
//        $query = $this->db->get("ictmusers");
//        if($query->num_rows() > 0)
//        {
//            return true;
//        }
//        else
//        {
//            return false;
//        }
//    }





}