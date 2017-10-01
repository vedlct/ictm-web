<?php
//
//foreach ($mainmenu as $mn) {
//    echo $mn->menuName."<br>";
//
//        foreach ($parentmenu as $pm) {
//            if ($pm->parentId != "") {
//            echo $pm->menuName . "<br>";
//        }
//
//    }
//}
//?>

<?php
foreach ($mainmenu as $mn) {
    echo $id = $mn->menuId;
    echo $mn->menuName."<br>";

    $this->db->select('menuId, menuName, parentId ');
    $this->db->where('menuType', MENU_TYPE[1]);
    $this->db->where('menuStatus', STATUS[0]);
    $this->db->where('parentId =', $id);
    $query = $this->db->get('ictmmenu');
    foreach ($query->result() as $q) {
        //echo $q->menuName."<br>";
    }

}
?>
