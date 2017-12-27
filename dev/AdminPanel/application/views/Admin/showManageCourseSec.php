<div class="table table-responsive">
<table class="table  table-advance  table-bordered table-hover" id="myTable">
    <tbody>
    <tr align="left" >
        <th style="background-color: #394A59; color: whitesmoke; text-align:left" onclick="sortTable(0)" > <span id="down"><i class="fa fa-sort-desc"></i> </span><span id="up" style="display: none"><i class="fa fa-sort-asc"></i> </span> Course Section Title </th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: left" > Order Number </th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: left" > Status </th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: left; width: 15%"> Inserted By </th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: left; width: 15%"> Last Modified By </th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: left; width: 15%"> Last Modified Date(d-m-Y)</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: left ; width: 10%"> Action</th>
    </tr>

        <?php if (!empty($coursedata)){
            foreach ($coursedata as $cd) { ?>
                <tr align="left">
                    <td><?php echo $cd->courseSectionTitle ?></td>
                    <td><?php echo $cd->orderNumber ?></td>
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
        }
        ?>
    

    </tbody>
</table>
</div>
   <script>
       var flag=true;

    </script>