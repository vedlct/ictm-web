
<table class="table  table-advance  table-bordered table-hover">
    <tbody>
    <tr align="center" bgcolor="#D3D3D3">
        <th> Course Section Title </th>
        <th> Status </th>
        <th> Inserted By </th>
        <th> Modified By </th>
        <th> Modified Date(d-m-Y)</th>
        <th> Action</th>
    </tr>

        <?php foreach ($coursedata as $cd) { ?>
    <tr align="center">
            <td><?php echo $cd->courseSectionTitle ?></td>
            <td><?php echo $cd->courseSectionStatus ?></td>
            <td><?php echo $cd->insertedBy; ?></td>
            <td>
                <?php if ($cd->lastModifiedBy==""){echo NEVER_MODIFIED;}else{echo $cd->lastModifiedBy;} ?>
            </td>
            <td>
                <?php if ($cd->lastModifiedDate==""){echo NEVER_MODIFIED;}
                else{

                    echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($cd->lastModifiedDate)),1);
                }
                ?>
            </td>
            <td>
                <div class="btn-group">

                    <a class="btn" href="<?php echo base_url()?>Admin/CourseSection/showEditCourseSec/<?php echo $cd->courseSectionId?>"><i class="icon_pencil-edit"></i></a>
                    <a class="btn " href="<?php echo base_url()?>Admin/CourseSection/deleteCourseSection/<?php echo $cd->courseSectionId?>" onclick='return confirm("Are you sure to Delete This Course Section?")'><i class="icon_trash"></i></a>

                </div>
            </td>
        </tr>
            <?php
        }
        ?>
    

    </tbody>
</table>
