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
                            Home Verticle Bar
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" id="newPhoto" name="newPhoto" method="POST"  action="" enctype="multipart/form-data" onsubmit="">

                                    <div class="form-group col-sm-12">

                                        <label for="title1" class="control-label col-lg-2">Ttile 1<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('title1'); ?></font></p>
                                            <input class="form-control" id="title1" name="title1"  value="<?php echo set_value('title1'); ?>" type="text" required />
                                        </div>

                                        <label for="image1" class="control-label col-sm-2">Image 1<span class="required">*</span></label>

                                        <div class="col-sm-4">

                                            <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control" type="file" name="image1" id="image1"required>

                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">

                                        <label for="link1" class="control-label col-sm-2">link 1<span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <p><font color="red"> <?php echo form_error('link1'); ?></font></p>
                                            <input class="form-control" id="link1" name="link1"  value="<?php echo set_value('link1'); ?>" type="text" required />
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="title2" class="control-label col-lg-2">Ttile 2<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('title2'); ?></font></p>
                                            <input class="form-control" id="title1" name="title2"  value="<?php echo set_value('title2'); ?>" type="text" required />
                                        </div>

                                        <label for="image2" class="control-label col-sm-2">Image 2<span class="required">*</span></label>

                                        <div class="col-sm-4">

                                            <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control" type="file" name="image2" id="image2"required>

                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">

                                        <label for="link2" class="control-label col-sm-2">link 2<span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <p><font color="red"> <?php echo form_error('link2'); ?></font></p>
                                            <input class="form-control" id="link2" name="link2"  value="<?php echo set_value('link2'); ?>" type="text" required />
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="title3" class="control-label col-lg-2">Ttile 3<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('title3'); ?></font></p>
                                            <input class="form-control" id="title1" name="title3"  value="<?php echo set_value('title3'); ?>" type="text" required />
                                        </div>

                                        <label for="image3" class="control-label col-sm-2">Image 3<span class="required">*</span></label>

                                        <div class="col-sm-4">

                                            <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control" type="file" name="image3" id="image3"required>

                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">

                                        <label for="link3" class="control-label col-sm-2">link 3<span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <p><font color="red"> <?php echo form_error('link3'); ?></font></p>
                                            <input class="form-control" id="link3" name="link3"  value="<?php echo set_value('link2'); ?>" type="text" required />
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="title4" class="control-label col-lg-2">Ttile 4<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('title4'); ?></font></p>
                                            <input class="form-control" id="title4" name="title4"  value="<?php echo set_value('title4'); ?>" type="text" required />
                                        </div>

                                        <label for="image4" class="control-label col-sm-2">Image 4<span class="required">*</span></label>

                                        <div class="col-sm-4">

                                            <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control" type="file" name="image4" id="image4"required>

                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">

                                        <label for="link4" class="control-label col-sm-2">link 4<span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <p><font color="red"> <?php echo form_error('link4'); ?></font></p>
                                            <input class="form-control" id="link4" name="link4"  value="<?php echo set_value('link4'); ?>" type="text" required />
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="title5" class="control-label col-lg-2">Ttile 5<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('title5'); ?></font></p>
                                            <input class="form-control" id="title5" name="title5"  value="<?php echo set_value('title5'); ?>" type="text" required />
                                        </div>

                                        <label for="image5" class="control-label col-sm-2">Image 5<span class="required">*</span></label>

                                        <div class="col-sm-4">

                                            <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control" type="file" name="image5" id="image5"required>

                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">

                                        <label for="link5" class="control-label col-sm-2">link 5<span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <p><font color="red"> <?php echo form_error('link5'); ?></font></p>
                                            <input class="form-control" id="link3" name="link5"  value="<?php echo set_value('link5'); ?>" type="text" required />
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="title6" class="control-label col-lg-2">Ttile 6<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('title6'); ?></font></p>
                                            <input class="form-control" id="title6" name="title6"  value="<?php echo set_value('title6'); ?>" type="text" required />
                                        </div>

                                        <label for="image6" class="control-label col-sm-2">Image 6<span class="required">*</span></label>

                                        <div class="col-sm-4">

                                            <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control" type="file" name="image6" id="image6"required>

                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">

                                        <label for="link6" class="control-label col-sm-2">link 6<span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <p><font color="red"> <?php echo form_error('link6'); ?></font></p>
                                            <input class="form-control" id="link6" name="link6"  value="<?php echo set_value('link6'); ?>" type="text" required />
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="title7" class="control-label col-lg-2">Ttile 7<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('title7'); ?></font></p>
                                            <input class="form-control" id="title7" name="title7"  value="<?php echo set_value('title7'); ?>" type="text" required />
                                        </div>

                                        <label for="image7" class="control-label col-sm-2">Image 7<span class="required">*</span></label>

                                        <div class="col-sm-4">

                                            <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control" type="file" name="image7" id="image7"required>

                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">

                                        <label for="link7" class="control-label col-sm-2">link 7<span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <p><font color="red"> <?php echo form_error('link7'); ?></font></p>
                                            <input class="form-control" id="link6" name="link7"  value="<?php echo set_value('link7'); ?>" type="text" required />
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="title8" class="control-label col-lg-2">Ttile 8<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('title8'); ?></font></p>
                                            <input class="form-control" id="title8" name="title8"  value="<?php echo set_value('title8'); ?>" type="text" required />
                                        </div>

                                        <label for="image8" class="control-label col-sm-2">Image 8<span class="required">*</span></label>

                                        <div class="col-sm-4">

                                            <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control" type="file" name="image8" id="image8"required>

                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">

                                        <label for="link8" class="control-label col-sm-2">link 8<span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <p><font color="red"> <?php echo form_error('link8'); ?></font></p>
                                            <input class="form-control" id="link8" name="link8"  value="<?php echo set_value('link8'); ?>" type="text" required />
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
