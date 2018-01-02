<table class="table table-striped table-advance  table-bordered table-hover" id="myTable">
    <tbody>
    <tr>
        <th style="background-color: #394A59; color: whitesmoke; text-align:left; width: 15%" onclick="sortTable(0)" > <span id="0down"><i class="fa fa-sort-desc"></i> </span><span id="0up" style="display: none"><i class="fa fa-sort-asc"></i> </span> Event Title</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align:left" onclick="sortTable(1)"> <span id="1down"><i class="fa fa-sort-desc"></i> </span><span id="1up" style="display: none"><i class="fa fa-sort-asc"></i> </span>Event Start</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align:left" onclick="sortTable(2)"><span id="2down" ><i class="fa fa-sort-desc"></i> </span><span id="2up" style="display: none"><i class="fa fa-sort-asc"></i> </span> Event End</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Event Location</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Event Type</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Status</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Inserted By</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Last Modified By</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Last Modified Date(d-m-Y)</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Appear In Home</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Action</th>
    </tr>

    <?php if (!empty($events)){
        foreach ($events as $events){?>

            <tr align="left">
                <td>
                    <?php echo $events->eventTitle?>
                </td>

                <td>
                    <?php

                    echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($events->eventStartDate)),1);
                    ?>

                </td>

                <td>
                    <?php
                    echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($events->eventEndDate)),1);
                    ?>


                </td>

                <td>
                    <?php echo $events->eventLocation?>
                </td>

                <td>
                    <?php echo $events->eventType?>

                </td>

                <td>
                    <?php echo $events->eventStatus?>
                </td>

                <td>
                    <?php echo $events->insertedBy?>

                </td>

                <td>
                    <?php if ($events->lastModifiedBy==""){echo"Never Modified";}else{echo $events->lastModifiedBy;} ?>
                </td>

                <td>
                    <?php if ($events->lastModifiedDate==""){echo NEVER_MODIFIED;}
                    else
                    {
                        echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($events->lastModifiedDate)),1);

                    }
                    ?>

                </td>

                <td>
                    <?php if ($events->eventStatus == STATUS[0]){?>
                        <input type="checkbox" data-panel-id="<?php echo $events->eventId ?>" onclick="selectHome(this)" <?php if ($events->homeStatus == SELECT_APPROVE[0])echo 'checked="checked"';?>name="appearInHome">Yes
                    <?php }else{ echo "Status Should be Active First !!";}?>

                </td>

                <td>

                    <div class="btn-group">
                        <a class="btn" href="<?php echo base_url("Admin/Event/editEventView/")?><?php echo $events->eventId ?>"><i class="icon_pencil-edit"></i></a>
                        <a class="btn" data-panel-id="<?php echo $events->eventId ?>"  onclick="selectid(this)"><i class="icon_trash"></i></a>
                    </div>
                </td>

            </tr>
        <?php }
    } ?>



    </tbody>
</table>

    <script>
    var flag=true;
    </script>