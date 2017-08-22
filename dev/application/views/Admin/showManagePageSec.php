<table class="table table-striped table-advance table-bordered table-hover ">
    <tbody>
    <tr>
        <th> Page Section Title </th>
        <th> Insert By </th>
        <th> Last Modified By </th>
        <th> Last Modified Date (d-m-Y) </th>
        <th> Status </th>
        <th> Action</th>
    </tr>

        <?php foreach ($pagedata as $pg) { ?>
    <tr>
            <td><?php echo $pg->pageSectionTitle ?></td>
            <td><?php echo $pg->insertedBy?></td>
            <td>
                <?php if ($pg->lastModifiedBy==""){echo NEVER_MODIFIED;}else{echo $pg->lastModifiedBy;} ?>
            </td>
            <td>
                <?php if ($pg->lastModifiedDate==""){echo NEVER_MODIFIED;}
                else{

                    echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($pg->lastModifiedDate)),1);
                }
                ?>
                </td>
            <td><?php echo $pg->pageSectionStatus ?></td>
            <td>
                <div class="btn-group">

                    <a class="btn" href="<?php echo base_url()?>Admin/Page/editPageSectionShow/<?php echo $pg->pageSectionId?>"><i class="icon_pencil-edit"></i></a>
                    <a class="btn " href="<?php echo base_url()?>Admin/Page/deletePageSection/<?php echo $pg->pageSectionId?>" onclick='return confirm("Are you sure?")'><i class="icon_trash"></i></a>

                </div>
            </td>
        </tr>
            <?php
        }
        ?>
    

    </tbody>
</table>
