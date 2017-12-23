<table class="table table-striped table-advance  table-bordered table-hover " id="myTable">
    <tbody>
    <tr>
        <th style="background-color: #394A59; color: whitesmoke; text-align: center" onclick="sortTable(3)"> Menu Title</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: center; cursor: pointer" onclick="sortTable(4)">O N</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: center" onclick="sortTable(5)" > Menu Type</th>
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

