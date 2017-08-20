
<table class="table table-striped table-advance table-bordered table-hover ">
    <tbody>
    <tr>
        <th> Course Section Title </th>
        <th> Insert By </th>
        <th> Last Modified By </th>
        <th> Last Modified Date </th>
        <th> Action</th>
    </tr>

        <?php foreach ($coursedata as $cd) { ?>
    <tr>
            <td><?php echo $cd->courseSectionTitle ?></td>
            <td><?php echo $cd->insertedBy; ?></td>
            <td><?php echo $cd->lastModifiedBy;?></td>
            <td><?php echo $cd->lastModifiedDate ?></td>
            <td>
                <div class="btn-group">

                    <a class="btn" href="<?php echo base_url()?>Admin/Course/showEditCourseSec/<?php echo $cd->courseSectionId?>" ><i class="icon_pencil-edit"></i></a>
                    <a class="btn " href="<?php echo base_url()?>Admin/Course/deletePageSection/<?php echo $cd->courseSectionId?>" ><i class="icon_trash"></i></a>

                </div>
            </td>
        </tr>
            <?php
        }
        ?>



    </tbody>
</table>
