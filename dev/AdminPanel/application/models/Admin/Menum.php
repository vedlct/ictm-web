<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Menum extends CI_Model
{
    /////////datatable//////////
    var $table = 'ictmmenu m';

    var $select =array('m.parentId','m.menuId','m.menuName','m.menuType','m.menuStatus','m.orderNumber','m.insertedBy','m.lastModifiedBy','m.lastModifiedDate','menu.menuName as submenu','p.pageTitle');
    var $column_order = array(null,'m.menuName','m.orderNumber'); //set column field database for datatable orderable
    var $column_search = array('m.menuName' ); //set column field database for datatable searchable
    var $order = array('m.orderNumber' => 'asc'); // default order

    private function _get_datatables_query()
    {
        if($this->input->post('menuType'))
        {
            $this->db->where('m.menuType', $this->input->post('menuType'));
        }
        elseif ($this->input->post('parentId'))
		{
			$this->db->where('m.parentId',$this->input->post('parentId'));
		}


        $this->db->select($this->select);
        $this->db->from($this->table);
        $this->db->join('ictmmenu menu', 'm.parentId = menu.menuId','left');
        $this->db->join('ictmpage p', 'm.pageId = p.pageId','left');



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

    /*----------- this creates a new Menu in database------------*/
    public function createNewMenu()             // for insert new menu into database
    {
        $menuTitle = $this->input->post("menuTitle");
        $menuType = $this->input->post("menuType");
        $parentId = $this->input->post("parentId");
        $pageId = $this->input->post("pageId");
        $orderNumber = $this->input->post("orderNumber");
        $menuStatus = $this->input->post("menuStatus");
        if ($parentId =="")
        {
            $parentId =null;
        }
        if ($pageId == "")
        {
            $pageId =null;
        }

        $data = array(
            'menuName' => $menuTitle,
            'menuType' => $menuType,
            'parentId' => $parentId,
            'pageId' => $pageId,
            'orderNumber' => $orderNumber,
            'menuStatus' => $menuStatus,
            'insertedBy'=>$this->session->userdata('userEmail'),
            'insertedDate'=>date("Y-m-d H:i:s"),

        );
        $this->security->xss_clean($data);
        $error=$this->db->insert('ictmmenu', $data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }

    }

    /*-----get Menu Name and id----------*/
    public function getMenuName($menuType)
    {
        $this->db->select('menuId, menuName');
        $this->db->where('menuType', $menuType);
        $query = $this->db->get('ictmmenu');
        return $query->result();
    }
    /*-----get Menu Name and id---that has no parent menu-------*/
    public function getMenuNameHasNoParent($menuType)
    {
        $this->db->select('menuId, menuName');
        $this->db->where('parentId =', null);
        $this->db->where('menuType', $menuType);
        $query = $this->db->get('ictmmenu');
        return $query->result();
    }

    /*---Parent Menu---*/
	public function getMenuIdName()
	{

		$this->db->select('menuId, menuName');
		$this->db->where('parentId =', null);
		$this->db->where('pageId =', null);
		$this->db->group_by('menuName');
		$query = $this->db->get('ictmmenu');
		return $query->result();
	}

     /*----------- check MenuTitle Uniqueness Per MenuType ----------------*/
    public function checkMenuTitleUniquePerMenuType($menuTitle,$menuType)
    {
        $this->db->select('menuName,menuType');
        $this->db->where('menuType',$menuType);
        $this->db->where('menuName',$menuTitle);
        $query = $this->db->get('ictmmenu');
        return $query->result();
    }
    /*----------- check MenuTitle Uniqueness Per MenuType ---- editMenu------------*/
    public function checkUniqueMenuTitle($menuTitle,$menuType,$id)
    {

        $this->db->select('menuName,menuType');
        $this->db->where('menuType',$menuType);
        $this->db->where('menuName',$menuTitle);
        $this->db->where('menuId !=', $id);
        $query = $this->db->get('ictmmenu');
        return $query->result();

    }

    public function menuOrderCheckFormNewMenu($menuType,$orderNumber)
    {

        $this->db->select('menuId');
        $this->db->where('menuType',$menuType);
        $this->db->where('orderNumber',$orderNumber);

        $query = $this->db->get('ictmmenu');
        return $query->result();

    }
    public function menuOrderCheckFormeditMenu($id,$menuType,$orderNumber)
    {

        $this->db->select('menuId');
        $this->db->where('menuType',$menuType);
        $this->db->where('orderNumber',$orderNumber);
        $this->db->where('menuId !=',$id);

        $query = $this->db->get('ictmmenu');
        return $query->result();

    }


    /*---- get all menu for mangeMenuView -----*/

    public function getAllforManageMenu($limit, $start) {

        $this->db->select('m.menuId,m.menuName,m.menuType,m.menuStatus,m.orderNumber,m.insertedBy,m.lastModifiedBy,m.lastModifiedDate,menu.menuName as submenu,p.pageTitle');
        $this->db->from('ictmmenu m');
        $this->db->join('ictmmenu menu', 'm.parentId = menu.menuId','left');
        $this->db->join('ictmpage p', 'm.pageId = p.pageId','left');
        $this->db->limit($limit, $start);
        $this->db->order_by("m.menuId", "desc");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function getAllforManageMenuSearchByMenuType($menutype){
        $this->db->select('m.menuId,m.menuName,m.menuType,m.orderNumber,m.menuStatus,m.insertedBy,m.lastModifiedBy,m.lastModifiedDate,menu.menuName as submenu,p.pageTitle');
        $this->db->from('ictmmenu m');
        $this->db->join('ictmmenu menu', 'm.parentId = menu.menuId','left');
        $this->db->join('ictmpage p', 'm.pageId = p.pageId','left');
        $this->db->order_by("m.menuId", "desc");
        $this->db->like('m.menuType', $menutype);
        $query = $this->db->get();
        return $query->result();

    }
    public function getAllforManageMenuSearchByTitle($title) {

        $this->db->select('m.menuId,m.menuName,m.menuType,m.menuStatus,m.orderNumber,m.insertedBy,m.lastModifiedBy,m.lastModifiedDate,menu.menuName as submenu,p.pageTitle');
        $this->db->from('ictmmenu m');
        $this->db->join('ictmmenu menu', 'm.parentId = menu.menuId','left');
        $this->db->join('ictmpage p', 'm.pageId = p.pageId','left');
        $this->db->order_by("m.menuId", "desc");
        $this->db->like('m.menuName', $title);
        $query = $this->db->get();
        return $query->result();
    }

        /*-- get all information of the selected Menu ---*/
    public function getAllMenubyId($menuId)
    {

        $this->db->select('m.*,menu.menuName as submenu');
        $this->db->where('m.menuId', $menuId);
        $this->db->from('ictmmenu m');
        $this->db->join('ictmmenu menu', 'm.parentId = menu.menuId','left');

        $query = $this->db->get();
        return $query->result();

    }

        /*-------- edit menu by id  in database--------------*/
    public function editMenubyId($id)
    {
        $menuTitle = $this->input->post("menuTitle");
        $menuType = $this->input->post("menuType");
        $parentId = $this->input->post("parentId");
        $pageId = $this->input->post("pageId");
        $orderNumber = $this->input->post("orderNumber");
        $menuStatus = $this->input->post("menuStatus");

        if ($parentId == "")
        {
            $parentId =null;
        }
        if ($pageId == "")
        {
            $pageId =null;
        }


        $data = array(
            'menuName' => $menuTitle,
            'menuType' => $menuType,
            'parentId' => $parentId,
            'pageId' => $pageId,
            'menuStatus' => $menuStatus,
            'orderNumber' => $orderNumber,
            'lastModifiedDate'=>date("Y-m-d H:i:s"),
            'lastModifiedBy'=>$this->session->userdata('userEmail')

        );

            $this->security->xss_clean($data);

                $this->db->where('menuId', $id);
                $error=$this->db->update('ictmmenu', $data);
                if (empty($error))
                {
                    return $this->db->error();
                }
                else
                {
                    return $error=null;
                }
    }

    /*---------delete menu if no Submenu-----------------*/
    public function deleteMenubyId($menuId) //delete menu if no Submenu
    {
        $this->db->select('menuName');
        $this->db->where('parentId',$menuId);
        $this->db->from('ictmmenu');
        $query = $this->db->get();

        if (empty($query->result())){
            $this->db->where('menuId',$menuId);
            $this->db->delete('ictmmenu');
            return 0;
        }
        else{
            return $query->result();
        }
    }

//    for pagination of manage Department
    public function record_count() {
        return $this->db->count_all("ictmmenu");
    }


}
