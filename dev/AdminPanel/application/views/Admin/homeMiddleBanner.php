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
                            Home Middle Banner
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

                                        <label for="link1" class="control-label col-sm-2">Link 1<span class="required">*</span></label>

                                        <div class="col-sm-4">

                                            <p><font color="red"> <?php echo form_error('link1'); ?></font></p>
                                            <input class="form-control" id="link1" name="link1"  value="<?php echo set_value('link1'); ?>" type="text" required />

                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">

                                        <label for="text1" class="control-label col-sm-2">text 1<span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control " name="text1" id="text1" required><?php echo set_value('text1'); ?></textarea>
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="title2" class="control-label col-lg-2">Ttile 2<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('title2'); ?></font></p>
                                            <input class="form-control" id="title2" name="title2"  value="<?php echo set_value('title1'); ?>" type="text" required />
                                        </div>

                                        <label for="link2" class="control-label col-sm-2">Link 2<span class="required">*</span></label>

                                        <div class="col-sm-4">

                                            <p><font color="red"> <?php echo form_error('link2'); ?></font></p>
                                            <input class="form-control" id="link2" name="link2"  value="<?php echo set_value('link2'); ?>" type="text" required />

                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">

                                        <label for="text2" class="control-label col-sm-2">text 2<span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control " name="text2" id="text2" required><?php echo set_value('text2'); ?></textarea>
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="title3" class="control-label col-lg-2">Ttile 3<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('title3'); ?></font></p>
                                            <input class="form-control" id="title3" name="title3"  value="<?php echo set_value('title1'); ?>" type="text" required />
                                        </div>

                                        <label for="link3" class="control-label col-sm-2">Link 3<span class="required">*</span></label>

                                        <div class="col-sm-4">

                                            <p><font color="red"> <?php echo form_error('link3'); ?></font></p>
                                            <input class="form-control" id="link3" name="link3"  value="<?php echo set_value('link3'); ?>" type="text" required />

                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">

                                        <label for="text3" class="control-label col-sm-2">text 3<span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control " name="text3" id="text3" required><?php echo set_value('text3'); ?></textarea>
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
