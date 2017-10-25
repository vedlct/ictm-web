<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>
</head>

<body>
<!-- container section start -->
<section id="container" class="">
    <!--header start-->
    <?php include ('topNavigation.php')?>
    <!--header end-->

    <!--sidebar start-->
    <?php include('leftNavigation.php') ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa fa-bars"></i> Home</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>

                    </ol>
                </div>
            </div>
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Home Slider
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" id="newPhoto" name="newPhoto" method="POST"  action="" enctype="multipart/form-data" onsubmit="">

                                    <div class="form-group col-sm-12">

                                        <label for="facultyImage" class="control-label col-sm-2">Slider Image 1<span class="required">*</span></label>
                                        <div class="col-sm-4">

                                            <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control" type="file" name="photoImage[]" id="photoImage[]"required>

                                        </div>

                                        <label class="control-label col-sm-2" for="photoStatus">Slider Status 1<span class="required">*</span></label>
                                        <div class="col-sm-4">
                                            <p><font color="red"> <?php echo form_error('photoStatus[]'); ?></font></p>
                                            <select class="form-control m-bot15" name="photoStatus[]" id="photoStatus[]" required>
                                                <option value="" selected><?php echo SELECT_STATUS ?></option>
                                                <?php for ($i=0;$i<count(STATUS);$i++){?>
                                                    <option <?php echo set_select('photoStatus[0]',  STATUS[$i], False); ?>><?php echo STATUS[$i]?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">

                                        <label for="photoDetails" class="control-label col-sm-2">Slider Text 1<span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control " name="photoDetails[]" id="photoDetails[]" required><?php echo set_value('photoDetails[0]'); ?></textarea>
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="facultyImage" class="control-label col-sm-2">Slider Image 2</label>
                                        <div class="col-sm-4">

                                            <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control" type="file" name="photoImage[]" id="photoImage[]">
                                        </div>

                                        <label class="control-label col-sm-2" for="photoStatus">Slider Status 2</label>
                                        <div class="col-sm-4">
                                            <p><font color="red"> <?php echo form_error('photoStatus[]'); ?></font></p>
                                            <select class="form-control m-bot15" name="photoStatus[]" id="photoStatus[]">
                                                <option value="" selected><?php echo SELECT_STATUS ?></option>
                                                <?php for ($i=0;$i<count(STATUS);$i++){?>
                                                    <option <?php echo set_select('photoStatus[1]',  STATUS[$i], False); ?>><?php echo STATUS[$i]?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="photoDetails" class="control-label col-sm-2">Slider Text 2</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control " name="photoDetails[]" id="photoDetails[]" ><?php echo set_value('photoDetails[1]'); ?></textarea>
                                        </div>

                                    </div>


                                    <div class="form-group col-sm-12">

                                        <label for="facultyImage" class="control-label col-sm-2">Slider Image 3</label>
                                        <div class="col-sm-4">

                                            <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control" type="file" name="photoImage[]" id="photoImage[]">
                                        </div>

                                        <label class="control-label col-sm-2" for="photoStatus">Slider Status 3</label>
                                        <div class="col-sm-4">
                                            <p><font color="red"> <?php echo form_error('photoStatus[]'); ?></font></p>
                                            <select class="form-control m-bot15" name="photoStatus[]" id="photoStatus[]">
                                                <option value="" selected><?php echo SELECT_STATUS ?></option>
                                                <?php for ($i=0;$i<count(STATUS);$i++){?>
                                                    <option <?php echo set_select('photoStatus[2]',  STATUS[$i], False); ?>><?php echo STATUS[$i]?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="photoDetails" class="control-label col-sm-2">Slider Text 3</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control " name="photoDetails[]" id="photoDetails[]"><?php echo set_value('photoDetails[2]'); ?></textarea>
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
<?php include('js.php') ?>

</body>
</html>
