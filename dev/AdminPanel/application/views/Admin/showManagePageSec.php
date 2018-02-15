<div class="table table-responsive">

<table class="table table-striped table-advance table-bordered table-hover " id="myTable">
    <tbody>
    <tr>
        <th style="background-color: #394A59; color: whitesmoke; text-align:left; width: 15%" onclick="sortTable(0)" > <span id="0down"><i class="fa fa-sort-desc"></i> </span><span id="0up" style="display: none"><i class="fa fa-sort-asc"></i> </span> Page Section Title </th>
        <th style="background-color: #394A59; color: whitesmoke; text-align:left; width: 5%" onclick="sortTable(1)"> <span id="1down"><i class="fa fa-sort-desc"></i> </span><span id="1up" style="display: none"><i class="fa fa-sort-asc"></i> </span> O N</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align:left; width: 5%"> Status </th>
        <th style="background-color: #394A59; color: whitesmoke; text-align:left; width: 10%"> Inserted By </th>
        <th style="background-color: #394A59; color: whitesmoke; text-align:left; width: 10%"> Last Modified By </th>
        <th style="background-color: #394A59; color: whitesmoke; text-align:left; width: 10%"> Last Modified Date (d-m-Y) </th>

        <th style="background-color: #394A59; color: whitesmoke; text-align: center; width: 5%"> Action</th>
    </tr>

        <?php if (!empty($pagedata)){
            foreach ($pagedata as $pg) { ?>
                <tr align="left">
                    <td><?php echo $pg->pageSectionTitle ?></td>
                    <td><?php echo $pg->orderNumber ?></td>
                    <td><?php echo $pg->pageSectionStatus ?></td>
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

                    <td>
                        <div class="btn-group">

                            <a class="btn" href="<?php echo base_url()?>Admin/PageSection/editPageSectionShow/<?php echo $pg->pageSectionId?>"><i class="icon_pencil-edit"></i></a>
                            <a class="btn " href="<?php echo base_url()?>Admin/PageSection/deletePageSection/<?php echo $pg->pageSectionId?>" onclick='return confirm("Are you sure to Delete This Page Section?")'><i class="icon_trash"></i></a>

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