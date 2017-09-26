<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>
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
                    <h3 class="page-header"><i class="fa fa-files-o"></i> Edit Photo</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="icon_document_alt"></i>Photo</li>
                        <li><i class="fa fa-files-o"></i>Edit Photo</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->

            <?php if ($this->session->flashdata('errorMessage')!=null){?>
                <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
            <?php }
            elseif($this->session->flashdata('successMessage')!=null){?>
                <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
            <?php }?>

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Photo
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <?php foreach ($Photo as $Photo){?>
                                <form class="form-validate form-horizontal" id="editPhoto" method="POST" action="<?php echo base_url() ?>Admin/Photo/editPhoto/<?php echo $Photo->photoId?>" onsubmit="return checklength()" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="albumId">Album<span class="required">*</span></label>
                                        <div class="col-sm-4">
                                            <p><font color="red"> <?php echo form_error('albumId'); ?></font></p>
                                            <select class="form-control m-bot15" name="albumId" id="albumId" required>
                                                <option value="" selected><?php echo SELECT_ALBUM ?></option>
                                                <?php foreach ($album as $album){?>
                                                    <option value="<?php echo $album->albumId?>" <?php if (!empty($Photo->albumId) && $Photo->albumId == $album->albumId)  echo 'selected = "selected"'; ?>><?php echo $album->albumTitle?></option>
                                                <?php }?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="facultyImage" class="control-label col-sm-2">Photo</label>
                                        <div class="col-sm-4">
                                            <p><font color="red"> <?php echo form_error('photoImage'); ?></font></p>
                                            <span>Allowed Types:&nbsp;&nbsp;<strong>jpg/png/jpeg/gif </strong></span>
                                            <input class="form-control" type="file" name="photoImage" id="photoImage">
                                            <span>View Existing Image:</span><a href="<?php echo base_url()?>Admin/Photo/showImageForEdit/<?php echo $Photo->photoId?>" target="_blank"><span> <?php echo $Photo->photoName?></span></a>
                                            <?php if ($Photo->photoName!=null){?>
                                                <a href="<?php echo base_url() ?>Admin/Photo/deletePhotoImage/<?php echo $Photo->photoId ?>" onclick='return confirm("Are you sure to Delete This Image?")'><i class="icon_trash"></i></a>
                                            <?php }?>
                                        </div>

                                        <label class="control-label col-sm-2" for="photoStatus">Status<span class="required">*</span></label>
                                        <div class="col-sm-4">
                                            <p><font color="red"> <?php echo form_error('photoStatus'); ?></font></p>
                                            <select class="form-control m-bot15" name="photoStatus" id="photoStatus" required>
                                                <option value="" selected><?php echo SELECT_STATUS ?></option>
                                                <?php for ($i=0;$i<count(STATUS);$i++){?>
                                                    <option value="<?php echo STATUS[$i]?>" <?php if (!empty($Photo->photoStatus) && $Photo->photoStatus == STATUS[$i])  echo 'selected = "selected"'; ?>><?php echo STATUS[$i]?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="photoDetails" class="control-label col-sm-2">Photo Details<span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control ckeditor" name="photoDetails" id="photoDetails" required><?php echo $Photo->photoDetails ; ?></textarea>
                                        </div>

                                    </div>
                                    <div class="form-group "align="center">
                                        <div class="col-lg-10">
                                            <input class="btn btn-success" type="submit" style="margin-left: 180px">
                                            <input class="btn btn-close" type="reset" >
                                        </div>
                                    </div>

                            </form>
                            <?php } ?>
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

<?php include('js.php') ?>


</body>
</html>
<script type="text/javascript" src="<?php echo base_url()?>public/ckeditor/ckeditor.js"></script>
<script>

    function checklength() {
        var photoDetails = CKEDITOR.instances['photoDetails'].getData().replace(/<[^>]*>/gi, '').length;
        if( !photoDetails ) {
            alert( 'Please enter a photo Details' );
            return false;
        }
        else
        {
            return true;

        }
    }

</script>