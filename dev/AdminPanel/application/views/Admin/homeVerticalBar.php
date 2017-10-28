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
                        <li><i class="icon_document_alt"></i><a href="<?php echo base_url()?>Admin/Home/verticalBar">Verticle Bar</a></li>

                    </ol>
                </div>
            </div>

            <?php if ($this->session->flashdata('errorMessage')!=null){?>
                <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
            <?php }
            elseif($this->session->flashdata('successMessage')!=null){?>
                <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
            <?php }
            if (!empty(validation_errors())){?>
                <div class="alert alert-danger" align="center"><strong><?php echo validation_errors();?></strong></div>
            <?php } ?>

            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Home Verticle Bar
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" id="verticleBar" name="verticleBar" method="POST"  action="<?php echo base_url()?>Admin/Home/insertVerticalBar" enctype="multipart/form-data" onsubmit="return submitform()">

                                    <div class="form-group col-sm-12">

                                        <label for="title1" class="control-label col-lg-2">Ttile 1<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('title[]'); ?></font></p>
                                            <input class="form-control" id="title[]" name="title[]"  value="<?php echo set_value('title[0]'); ?>" type="text" required/>
                                        </div>

                                        <label for="facultyImage" class="control-label col-sm-2">Image 1<span class="required">*</span></label>
                                        <div class="col-sm-4">

                                            <span>Image Allowed :&nbsp;&nbsp;<strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control" type="file" name="image[0]" id="image[0]"required>

                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">

                                        <label for="link1" class="control-label col-lg-2">Link 1<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('link[0]'); ?></font></p>
                                            <input class="form-control" id="title[0]" name="link[]"  value="<?php echo set_value('link[0]'); ?>" type="text" required />
                                        </div>

                                        <label for="photoDetails" class="control-label col-sm-2">text 1<span class="required">*</span></label>
                                        <div class="col-sm-4">
                                            <textarea class="form-control " name="text[]" id="text[0]" required><?php echo set_value('text[0]'); ?></textarea>
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="title2" class="control-label col-lg-2">Ttile 2<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('title[]'); ?></font></p>
                                            <input class="form-control" id="title[1]" name="title[]"  value="<?php echo set_value('title[1]'); ?>" type="text" required />
                                        </div>

                                        <label for="facultyImage" class="control-label col-sm-2">Image 2<span class="required">*</span></label>

                                        <div class="col-sm-4">

                                            <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control" type="file" name="image[]" id="image[]"required>

                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">

                                        <label for="link2" class="control-label col-lg-2">Link 2<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('link[1]'); ?></font></p>
                                            <input class="form-control" id="link[1]" name="link[]"  value="<?php echo set_value('link[1]'); ?>" type="text" required />
                                        </div>

                                        <label for="photoDetails" class="control-label col-sm-2">text 2<span class="required">*</span></label>
                                        <div class="col-sm-4">
                                            <textarea class="form-control " name="text[]" id="text[1]" required><?php echo set_value('text[1]'); ?></textarea>
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="title3" class="control-label col-lg-2">Ttile 3<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('title[2]'); ?></font></p>
                                            <input class="form-control" id="title[2]" name="title[]"  value="<?php echo set_value('title[2]'); ?>" type="text" required />
                                        </div>

                                        <label for="facultyImage" class="control-label col-sm-2">Image 3<span class="required">*</span></label>

                                        <div class="col-sm-4">

                                            <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control" type="file" name="image[]" id="image[]"required>

                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">

                                        <label for="link3" class="control-label col-lg-2">Link 3<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('link[2]'); ?></font></p>
                                            <input class="form-control" id="link[2]" name="link[]"  value="<?php echo set_value('link[2]'); ?>" type="text" required />
                                        </div>

                                        <label for="text3" class="control-label col-sm-2">text 3<span class="required">*</span></label>
                                        <div class="col-sm-4">
                                            <textarea class="form-control" name="text[]" id="text[2]" required><?php echo set_value('text[2]'); ?></textarea>
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="title4" class="control-label col-lg-2">Ttile 4<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('title[3]'); ?></font></p>
                                            <input class="form-control" id="title[3]" name="title[]"  value="<?php echo set_value('title[3]'); ?>" type="text" required />
                                        </div>

                                        <label for="facultyImage" class="control-label col-sm-2">Image 4<span class="required">*</span></label>

                                        <div class="col-sm-4">

                                            <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control" type="file" name="image[]" id="image[]"required>

                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">

                                        <label for="link4" class="control-label col-lg-2">Link 4<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('link[3]'); ?></font></p>
                                            <input class="form-control" id="link[3]" name="link[]"  value="<?php echo set_value('link[3]'); ?>" type="text" required />
                                        </div>

                                        <label for="text4" class="control-label col-sm-2">text 4<span class="required">*</span></label>
                                        <div class="col-sm-4">
                                            <textarea class="form-control " name="text[]" id="text[3]" required><?php echo set_value('text[3]'); ?></textarea>
                                        </div>

                                    </div>


                                    <div id="csrf">
                                        <input type="hidden"  name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                    </div>

                                    <div class="form-group "align="center">
                                        <div class="col-sm-10">
                                            <input class="btn btn-success" value="Submit" type="submit" style="margin-left: 180px">
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

<script type="text/javascript">

    function submitform(){

        var Title = document.verticleBar.elements["title[]"];
        var Image = document.verticleBar.elements["image[]"];
        var link = document.verticleBar.elements["link[]"];
        var Text = document.verticleBar.elements["text[]"];

        for (var i=0;i<Title.length;i++)
        {
            if (Title[i].value == '')
            {
                alert( 'Title'+(i+1)+'must be less than 255 charecter!!' );
                return false;
            }
            if (link[i].value == '')
            {
                alert( 'Link'+(i+1)+'must be less than 255 charecter!!' );
                return false;
            }
            if (Text[i].value == '')
            {
                alert( 'Text'+(i+1)+'must be less than 255 charecter!!' );
                return false;
            }
            if (Image[i].value == '')
            {
                alert( 'Please Select a Image in Image field Image'+(i+1));
                return false;
            }
        }



    }
</script>
