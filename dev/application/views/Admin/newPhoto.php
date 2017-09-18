<!DOCTYPE html>
<html lang="en">
<head>
    <!-- view head ----->
    <?php include('head.php') ?>
    <!-- view head  end----->
</head>

<body>
<!-- container section start -->
<section id="container" class="">
    <!--top Navigation start-->
    <?php include ('topNavigation.php')?>
    <!--top Navigation end-->
    <!--sidebar start-->
    <?php include('leftNavigation.php') ?>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-files-o"></i> New &nbsp Photo</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="icon_document_alt"></i>Photo</li>
                        <li><i class="fa fa-files-o"></i>Create a New Photo</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->

            <?php if ($this->session->flashdata('errorMessage')!=null){?>
                <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
            <?php }
            elseif($this->session->flashdata('successMessage')!=null){?>
                <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
            <?php }
            if (!empty(validation_errors())){?>
            <div class="alert alert-danger" align="center"><strong><?php echo validation_errors();?></strong></div>

            <?php } ?>

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            New Photo
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" id="newPhoto" name="newPhoto" enctype="multipart/form-data" method="POST" action="<?php echo base_url() ?>Admin/Photo/createNewPhoto" onsubmit="return formvalidate()">

                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="albumId">Album<span class="required">*</span></label>
                                        <div class="col-sm-4">
                                            <p><font color="red"> <?php echo form_error('albumId'); ?></font></p>
                                            <select class="form-control m-bot15" name="albumId" id="albumId" required>
                                                <option value="" selected><?php echo SELECT_ALBUM ?></option>
                                                <?php foreach ($album as $album){?>
                                                    <option value="<?php echo $album->albumId?>" <?php echo set_select('albumId',  $album->albumId, False); ?>><?php echo $album->albumTitle?></option>
                                                <?php }?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="facultyImage" class="control-label col-sm-1">Image 1<span class="required">*</span></label>
                                        <div class="col-sm-4">

                                            <span>Allowed Types:&nbsp;&nbsp;<strong>jpg/png/jpeg/gif </strong></span>
                                            <input class="form-control" type="file" name="photoImage[]" id="photoImage[]" required>
                                        </div>

                                        <label for="photoDetails" class="control-label col-sm-2">Photo Details <span class="required">*</span></label>
                                        <div class="col-sm-5">

                                            <textarea class="form-control" name="photoDetails[]" id="photoDetails[]" required><?php echo set_value('photoDetails[0]'); ?></textarea>
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="facultyImage" class="control-label col-sm-1">Image 2</label>
                                        <div class="col-sm-4">

                                            <span>Allowed Types:&nbsp;&nbsp;<strong>jpg/png/jpeg/gif </strong></span>
                                            <input class="form-control" type="file" name="photoImage[]" id="photoImage[]">
                                        </div>

                                        <label for="photoDetails" class="control-label col-sm-2">Photo Details</label>
                                        <div class="col-sm-5">

                                            <textarea class="form-control" name="photoDetails[]" id="photoDetails[]"><?php echo set_value('photoDetails[1]'); ?></textarea>
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="facultyImage" class="control-label col-sm-1">Image 3</label>
                                        <div class="col-sm-4">

                                            <span>Allowed Types:&nbsp;&nbsp;<strong>jpg/png/jpeg/gif </strong></span>
                                            <input class="form-control" type="file" name="photoImage[]" id="photoImage[]">
                                        </div>

                                        <label for="photoDetails" class="control-label col-sm-2">Photo Details</label>
                                        <div class="col-sm-5">

                                            <textarea class="form-control" name="photoDetails[]" id="photoDetails[]"><?php echo set_value('photoDetails[2]'); ?></textarea>
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="facultyImage" class="control-label col-sm-1">Image 4</label>
                                        <div class="col-sm-4">

                                            <span>Allowed Types:&nbsp;&nbsp;<strong>jpg/png/jpeg/gif </strong></span>
                                            <input class="form-control" type="file" name="photoImage[]" id="photoImage[]" >
                                        </div>

                                        <label for="photoDetails" class="control-label col-sm-2">Photo Details</label>
                                        <div class="col-sm-5">

                                            <textarea class="form-control" name="photoDetails[]" id="photoDetails[]"><?php echo set_value('photoDetails[3]'); ?></textarea>
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="facultyImage" class="control-label col-sm-1">Image 5</label>
                                        <div class="col-sm-4">

                                            <span>Allowed Types:&nbsp;&nbsp;<strong>jpg/png/jpeg/gif </strong></span>
                                            <input class="form-control" type="file" name="photoImage[]" id="photoImage[]">
                                        </div>

                                        <label for="photoDetails" class="control-label col-sm-2">Photo Details</label>
                                        <div class="col-sm-5">

                                            <textarea class="form-control" name="photoDetails[]" id="photoDetails[]"><?php echo set_value('photoDetails[4]'); ?></textarea>
                                        </div>

                                    </div>


                                    <div id="csrf">
                                        <input type="hidden"  name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                    </div>

                                    <div class="form-group "align="center">
                                        <div class="col-sm-10">
                                            <input class="btn btn-success" type="submit" style="margin-left: 180px">
                                            <input class="btn btn-close" type="reset" >
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        <!-- page end-->
        </section>
    </section>
<!--main content end-->
<div class="text-right wrapper">
    <div class="credits">
        <a href="#">Icon College</a> by <a href="#">A2N</a>
    </div>
</div>

</section>
<!-- container section end -->
<?php include ('js.php')?>
</body>
</html>

<script type="text/javascript" src="<?php echo base_url()?>public/ckeditor/ckeditor.js"></script>

<script>


    function formvalidate() {

        var mutliPhoto = document.newPhoto.elements["photoImage[]"];
        var mutliPhotoDetails = document.newPhoto.elements["photoDetails[]"];

        if (mutliPhoto[2].value != '' && mutliPhoto[1].value == '' ) {
            alert('Please Select a Image in Image field' + 2);
            return false;
        }
        if (mutliPhoto[3].value != '' && mutliPhoto[2].value == '' ) {
            alert('Please Select a Image in Image field' + 3);
            return false;
        }
        if (mutliPhoto[4].value != '' && mutliPhoto[3].value == '' ) {
            alert('Please Select a Image in Image field' + 4);
            return false;
        }

        for(i=0;i<mutliPhoto.length;i++)
        {
            if (mutliPhoto[i].value != '' && mutliPhotoDetails[i].value == '') {
                alert('Please Write a description of Image ' + (i + 1));
                return false;
            }

        }

    }


</script>