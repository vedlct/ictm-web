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
                <div class="alert alert-danger" align="center"><strong><?php echo form_error('image[]');?></strong></div>
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
                                            <p><font color="red"> <?php echo form_error('title1'); ?></font></p>
                                            <input class="form-control" id="title1" name="title1" maxlength="255" value="<?php echo set_value('title1'); ?>" type="text" required/>
                                        </div>

                                        <label for="facultyImage" class="control-label col-sm-2">Image 1<span class="required">*</span></label>
                                        <div class="col-sm-4">

                                            <span>Image Allowed :&nbsp;&nbsp;<strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control" type="file" name="image[]" id="image[0]"required>

                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">

                                        <label for="link1" class="control-label col-lg-2">Link 1<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('link1'); ?></font></p>
                                            <input class="form-control" id="link1" name="link1"  maxlength="500" value="<?php echo set_value('link1'); ?>" type="text" required />
                                        </div>

                                        <label for="photoDetails" class="control-label col-sm-2">text 1<span class="required">*</span></label>
                                        <div class="col-sm-4">
                                            <textarea class="form-control " name="text1" id="text1" maxlength="255" required><?php echo set_value('text1'); ?></textarea>
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="title2" class="control-label col-lg-2">Ttile 2<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('title2'); ?></font></p>
                                            <input class="form-control" id="title2" name="title2" maxlength="255" value="<?php echo set_value('title2'); ?>" type="text" required />
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
                                            <p><font color="red"> <?php echo form_error('link2'); ?></font></p>
                                            <input class="form-control" id="link2" name="link2" maxlength="500" value="<?php echo set_value('link2'); ?>" type="text" required />
                                        </div>

                                        <label for="text2" class="control-label col-sm-2">text 2<span class="required">*</span></label>
                                        <div class="col-sm-4">
                                            <textarea class="form-control " name="text2" id="text2" maxlength="255" required><?php echo set_value('text2'); ?></textarea>
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="title3" class="control-label col-lg-2">Ttile 3<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('title3'); ?></font></p>
                                            <input class="form-control" id="title3" name="title3" maxlength="255" value="<?php echo set_value('title3'); ?>" type="text" required />
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
                                            <p><font color="red"> <?php echo form_error('link3'); ?></font></p>
                                            <input class="form-control" id="link3" name="link3" maxlength="500" value="<?php echo set_value('link3'); ?>" type="text" required />
                                        </div>

                                        <label for="text3" class="control-label col-sm-2">text 3<span class="required">*</span></label>
                                        <div class="col-sm-4">
                                            <textarea class="form-control" name="text3" id="text3" maxlength="255" required><?php echo set_value('text3'); ?></textarea>
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="title4" class="control-label col-lg-2">Ttile 4<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('title4'); ?></font></p>
                                            <input class="form-control" id="title4" name="title4" maxlength="255" value="<?php echo set_value('title4'); ?>" type="text" required />
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
                                            <p><font color="red"> <?php echo form_error('link4'); ?></font></p>
                                            <input class="form-control" id="link4" name="link4"maxlength="500"  value="<?php echo set_value('link4'); ?>" type="text" required />
                                        </div>

                                        <label for="text4" class="control-label col-sm-2">text 4<span class="required">*</span></label>
                                        <div class="col-sm-4">
                                            <textarea class="form-control " name="text4" id="text4" maxlength="255" required><?php echo set_value('text4'); ?></textarea>
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


        var Image = document.verticleBar.elements["image[]"];

        var Title1=document.getElementById("title1").value;
        var Title2=document.getElementById("title2").value;
        var Title3=document.getElementById("title3").value;
        var Title4=document.getElementById("title4").value;
        var Link1=document.getElementById("link1").value;
        var Link2=document.getElementById("link2").value;
        var Link3=document.getElementById("link3").value;
        var Link4=document.getElementById("link4").value;
        var Text1=document.getElementById("text1").value;
        var Text2=document.getElementById("text2").value;
        var Text3=document.getElementById("text3").value;
        var Text4=document.getElementById("text4").value;

        if(Title1.length >255) {
            alert( 'Title1 must be less than 255 charecter!!' );
            return false;
        }
        if(Title2.length >255) {
            alert( 'Title2 must be less than 255 charecter!!' );
            return false;
        }
        if(Title3.length >255) {
            alert( 'Title3 must be less than 255 charecter!!' );
            return false;
        }
        if(Title4.length >255) {
            alert( 'Title4 must be less than 255 charecter!!' );
            return false;
        }
        if(Link1.length >500) {
            alert( 'Link1 must be less than 500 charecter!!' );
            return false;
        }
        if(Link2.length >500) {
            alert( 'Link2 must be less than 500 charecter!!' );
            return false;
        }
        if(Link3.length >500) {
            alert( 'Link3 must be less than 500 charecter!!' );
            return false;
        }
        if(Link4.length >500) {
            alert( 'Link4 must be less than 500 charecter!!' );
            return false;
        }
        if(Text1.length >255) {
            alert( 'Text1 must be less than 255 charecter!!' );
            return false;
        }
        if(Text2.length >255) {
            alert( 'Text2 must be less than 255 charecter!!' );
            return false;
        }
        if(Text3.length >255) {
            alert( 'Text3 must be less than 255 charecter!!' );
            return false;
        }
        if(Text4.length >255) {
            alert( 'Text4 must be less than 255 charecter!!' );
            return false;
        }

        for (var i=0;i<Title.length;i++)
        {
            if (Image[i].value == '')
            {
                alert( 'Please Select a Image in Image field Image'+(i+1));
                return false;
            }
        }



    }
</script>