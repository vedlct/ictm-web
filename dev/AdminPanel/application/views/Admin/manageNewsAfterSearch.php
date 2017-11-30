<table class="table table-striped table-advance  table-bordered table-hover" id="myTable">
    <tbody>
    <tr>
        <th style="background-color: #394A59; color: whitesmoke; text-align: center; width: 15%" onclick="sortTable(0)"> News Title</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: center" onclick="sortTable(1)"> News Date</th>

        <th style="background-color: #394A59; color: whitesmoke; text-align: center" onclick="sortTable(2)"> News Type</th>

        <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Status</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Inserted By</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Last Modified By</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Last Modified Date</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Appear In Home</th>
        <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Action</th>
    </tr>

    <?php if (!empty($news)){
        foreach ($news as $newsdata){?>

            <tr align="center">
                <td>
                    <?php echo $newsdata->newsTitle?>
                </td>

                <td>
                    <?php echo date('d-m-Y',strtotime($newsdata->newsDate))?>

                </td>

                <td>
                    <?php echo $newsdata->newsType?>

                </td>

                <td>
                    <?php echo $newsdata->newsStatus?>
                </td>

                <td>
                    <?php echo $newsdata->insertedBy?>

                </td>

                <td>
                    <?php if ($newsdata->lastModifiedBy==""){echo"Never Modified";}else{echo $newsdata->lastModifiedBy;} ?>
                </td>

                <td>
                    <?php if ($newsdata->lastModifiedDate==""){echo"Never Modified";}
                    else
                    {
                        $timestamp = strtotime($newsdata->lastModifiedDate);
                        $date = date('d-F-Y', $timestamp);
                        echo $date ;
                    }?>

                </td>
                <td>
                    <?php if ($newsdata->newsStatus == STATUS[0]){?>
                        <input type="checkbox" data-panel-id="<?php echo $newsdata->newsId ?>" onclick="selectHome(this)" <?php if ($newsdata->homeStatus == SELECT_APPROVE[0])echo 'checked="checked"';?>
                               id="appearInHome" name="appearInHome">Yes
                    <?php }else{ echo "Status Should be Active First !!";}?>

                </td>

                <td>

                    <div class="btn-group">
                        <a class="btn" href="<?php echo base_url("Admin/News/editNewsView/")?><?php echo $newsdata->newsId ?>"><i class="icon_pencil-edit"></i></a>
                        <a class="btn" data-panel-id="<?php echo $newsdata->newsId ?>"  onclick="selectid(this)"><i class="icon_trash"></i></a>
                    </div>
                </td>

            </tr>
        <?php }
    } ?>



    </tbody>
</table>