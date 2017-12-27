<table class="table table-striped table-advance  table-bordered table-hover " id="myTable2">
    <tbody>
    <tr>
        <th style="background-color: #394A59; color: whitesmoke; text-align: center" onclick="sortTableAjax(0)"> <span id="down"><i class="fa fa-sort-desc"></i> </span><span id="up" style="display: none"><i class="fa fa-sort-asc"></i> </span> Menu Title</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: center; cursor: pointer" onclick="sortTableAjax(1)"> <span id="down"><i class="fa fa-sort-desc"></i> </span><span id="up" style="display: none"><i class="fa fa-sort-asc"></i> </span> O N</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: center" onclick="sortTableAjax(2)" ><span id="down"><i class="fa fa-sort-desc"></i> </span><span id="up" style="display: none"><i class="fa fa-sort-asc"></i> </span> Menu Type</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Parent Menu</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Page Title</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Menu Status</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Menu Inserted By</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Last Modified By</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Last Modified Date (d-m-Y)</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: center">  Action</th>
    </tr>

    <?php if (!empty($menu)){
        foreach ($menu as $menu){?>


            <tr align="center">
                <td><?php echo $menu->menuName ?></td>
                <td><?php echo $menu->orderNumber?></td>
                <td><?php echo $menu->menuType?></td>
                <td>
                    <?php if ($menu->submenu == "")
                    {echo NONE;}
                    else{echo $menu->submenu;}?>
                </td>
                <td>
                    <?php if ($menu->pageTitle==""){echo NONE;}else{echo $menu->pageTitle;}?>
                </td>
                <td>
                    <?php echo $menu->menuStatus?>
                </td>

                <td>
                    <?php echo $menu->insertedBy?>
                </td>

                <td>
                    <?php if ($menu->lastModifiedBy==""){echo NEVER_MODIFIED;}else{echo $menu->lastModifiedBy;} ?>

                </td>

                <td><?php if ($menu->lastModifiedDate==""){echo NEVER_MODIFIED;}
                    else
                    {
                        echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($menu->lastModifiedDate)),1);

                    }
                    ?>

                </td>
                <td>

                    <div class="btn-group">
                        <a class="btn" href="<?php echo base_url("Admin/Menu/editMenuView/")?><?php echo $menu->menuId ?>"><i class="icon_pencil-edit"></i></a>
                        <a class="btn" data-panel-id="<?php echo $menu->menuId ?>"  onclick="selectid(this)"><i class="icon_trash"></i></a>
                    </div>
                </td>

            </tr>


        <?php }}?>

    </tbody>
</table>

<script>
    var flag = true ;
    function sortTableAjax(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("myTable2");
        switching = true;
        //Set the sorting direction to ascending:
        dir = "asce";
        /*Make a loop that will continue until
         no switching has been done:*/
        while (switching) {
            //start by saying: no switching is done:
            switching = false;
            rows = table.getElementsByTagName("TR");
            /*Loop through all table rows (except the
             first, which contains table headers):*/
            for (i = 1; i < (rows.length - 1); i++) {
                //start by saying there should be no switching:
                shouldSwitch = false;
                /*Get the two elements you want to compare,
                 one from current row and one from the next:*/
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                /*check if the two rows should switch place,
                 based on the direction, asc or desc:*/
                if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch= true;
                        break;
                    }
                } else if (dir == "asce") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch= true;
                        break;
                    }
                }

            }
            if (shouldSwitch) {
                /*If a switch has been marked, make the switch
                 and mark that a switch has been done:*/
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                //Each time a switch is done, increase this count by 1:
                switchcount ++;
            } else {
                /*If no switching has been done AND the direction is "asc",
                 set the direction to "desc" and run the while loop again.*/
                if (switchcount == 0 && dir == "asce") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
        var up = n+"up";
        var down = n+"down";
        if (flag == true) {
            document.getElementById(up).style.display = "block";
            document.getElementById(down).style.display = "none";
            flag = false;
        }else {
            document.getElementById(up).style.display = "none";
            document.getElementById(down).style.display = "block";
            flag = true;
        }
    }
</script>