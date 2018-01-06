<div class="table table-responsive">
    <table class="table table-striped table-advance  table-bordered table-hover ">
        <tbody>
        <tr>
            <th style="background-color: #394A59; color: whitesmoke; text-align: left">  Photo</th>
            <th style="background-color: #394A59; color: whitesmoke; text-align: left" >Photo Status</th>
            <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Photo Inserted By</th>
            <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Last Modified By</th>
            <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Last Modified Date (d-m-Y)</th>
            <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Album Cover</th>
            <th style="background-color: #394A59; color: whitesmoke; text-align: left">  Action</th>
        </tr>


        <?php if (!empty($photo)){
            foreach ($photo as $photo){?>


                <tr align="left">
                    <td>
                        <img height="100px" width="100px" src = "<?php echo base_url()?>images/photoAlbum/<?php echo $photo->albumTitle?>/<?php echo $photo->photoName?>">
                    </td>


                    <td>
                        <?php echo $photo->photoStatus?>
                    </td>

                    <td>
                        <?php echo $photo->insertedBy?>
                    </td>

                    <td>
                        <?php if ($photo->lastModifiedBy==""){echo NEVER_MODIFIED;}else{echo $photo->lastModifiedBy;} ?>

                    </td>

                    <td><?php if ($photo->lastModifiedDate==""){echo NEVER_MODIFIED;}
                        else
                        {
                            echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($photo->lastModifiedDate)),1);
                        }
                        ?>

                    </td>
                    <td>
                        <?php if ($photo->photoStatus == STATUS[0]){?>
                            <input type="checkbox" data-panel-id="<?php echo $photo->photoId ?>" onclick="albumCover(this)" <?php if ($photo->albumCover == SELECT_APPROVE[0])echo 'checked="checked"';?>
                                   id="albumCovers" value="<?php echo $photo->albumId?>" name="appearInHome">Yes
                        <?php }else{?>
                            Status Should be Active First !!
                        <?php } ?>
                    </td>
                    <td>

                        <div class="btn-group">
                            <a class="btn" href="<?php echo base_url("Admin/Photo/editPhotoView/")?><?php echo $photo->photoId ?>"><i class="icon_pencil-edit"></i></a>
                            <a class="btn" data-panel-id="<?php echo $photo->photoId ?>"  onclick="selectid(this)"><i class="icon_trash"></i></a>
                        </div>
                    </td>

                </tr>


            <?php }
        }?>

        </tbody>
    </table>
</div>

<script>
    function selectid(x) {
        if (confirm("Are you sure you want to delete this Photo?")) {
            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/Photo/deletePhoto/")?>'+btn,
                data:{},
                cache: false,
                success:function(data) {
                    location.reload();
                }
            });
        }
    }
    function albumCover(x) {
        if (confirm("Are you sure ?")) {
            btn = $(x).data('panel-id');
            //var albumId=$(x).data(btn);
            var albumId = document.getElementById("albumCovers").value;
            //alert(albumId);
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/Photo/albumCover/")?>'+btn,
                data:{album:albumId},
                cache: false,
                success:function(data) {
                    if (data=='1'){
                        alert('Photo Added as a Album Cover Successfully');
                    }
                    else if(data=='0'){
                        alert('Photo as a Album Cover Removed Successfully');
                    }
                    else if(data=='3'){
                        alert('Allready 1 Photo in the Album Cover');
                    }
                    location.reload();
                }
            });
        }
        else {
            location.reload();
        }
    }
</script>