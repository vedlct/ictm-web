<table class="table table-striped table-advance  table-bordered table-hover" id="myTable">
    <tbody>
    <tr>

        <th style="background-color: #394A59; color: whitesmoke; text-align: left"width="5%" > Title</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: left" onclick="sortTable(0)" > <span id="down"><i class="fa fa-sort-desc"></i> </span><span id="up" style="display: none"><i class="fa fa-sort-asc"></i> </span> First Name</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: left" onclick="sortTable(1)"> Last Name</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: left"; width="10%"> Phone</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: left"; width="15%"> Appoinmet Date</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: left"; width="15%"> Course</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: left"; width="15%"> Email</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: left" ; width="15%" onclick="sortTable(2)"> Apply Date</th>


        <th style="background-color: #394A59; color: whitesmoke; text-align: left"; width="10%"> Action</th>
    </tr>


    <?php if (!empty($RiData)){
        foreach ($RiData as $pd){?>

            <tr align="left">
                <td><?php echo $pd->title?></td>

                <td><?php echo $pd->firstName?></td>
                <td><?php echo $pd->surName?></td>
                <td><?php echo $pd->mobile?></td>

                <td><?php echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($pd->appointmentDate)),1); ?></td>
                <td><?php echo $pd->course?></td>

                <td><?php echo $pd->email?></td>
                <td><?php echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($pd->inserDate)),1); ?>
                </td>

                <td>
                    <div class="btn-group">

                        <a class="btn" href="<?php echo base_url()?>Admin/RegisterInterest/viewSelectedRI/<?php echo $pd->registerInterestId?>"><i class="icon_pencil-edit"></i></a>
                        <a class="btn " data-panel-id="<?php echo $pd->registerInterestId ?>"  onclick='return confirm("Are you sure to Delete This RegisterInterest?")' href="<?php echo base_url()?>Admin/RegisterInterest/deleteRegisterInterest/<?php echo $pd->registerInterestId?>"><i class="icon_trash"></i></a>
                    </div>
                </td>
            </tr>

        <?php }
    }?>
    </tbody>
</table>
   <script>
       var flag=true;

    </script>