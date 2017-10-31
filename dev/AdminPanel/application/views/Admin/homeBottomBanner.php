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
                        <li><i class="icon_document_alt"></i><a href="<?php echo base_url()?>Admin/Home/bottomBanner">Bottom Banner</a></li>

                    </ol>
                </div>
            </div>
            <!-- page start-->

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
                            Home Bottom Banner
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" id="newBottomBanner" name="newBottomBanner" method="POST"  action="<?php echo base_url()?>Admin/Home/insertBottomBanner" enctype="multipart/form-data" onsubmit="return submitform()">

                                    <div class="form-group col-sm-12">

                                        <label for="title" class="control-label col-sm-2">Title<span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <p><font color="red"> <?php echo form_error('title'); ?></font></p>
                                            <input class="form-control" id="title" name="title"  value="<?php echo set_value('title'); ?>" type="text" required />
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="subTitle" class="control-label col-lg-2">Sub Ttile<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('subTitle'); ?></font></p>
                                            <input class="form-control" id="subTitle" name="subTitle"  value="<?php echo set_value('subTitle'); ?>" type="text" required />
                                        </div>


                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="Image" class="control-label col-sm-2">Image<span class="required">*</span></label>

                                        <div class="col-sm-4">
                                         <p><font color="red"> <?php echo form_error('image'); ?></font></p>
                                        <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                        <input class="form-control" type="file" name="image" id="image" required>

                                        </div>
                                    </div>


                                    <div id="csrf">
                                        <input type="hidden"  name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                    </div>

                                    <div class="form-group "align="center">
                                        <div class="col-sm-10">
                                            <input class="btn btn-success" type="submit" value="Submit" style="margin-left: 180px">
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
        var Title=document.getElementById("title").value;
        var subTitle=document.getElementById("subTitle").value;
        //var image=document.getElementById("image");

        if(Title.length >255) {
            alert( 'Title must be less than 255 charecter!!' );
            return false;
        }

        if(subTitle.length >255) {
            alert( 'Sub Title must be less than 255 charecter!!' );
            return false;
        }

//        if (typeof (Image.files) != "undefined") {
//            var size = parseFloat(Image.files[0].size / 1024).toFixed(2);
//            alert(size + " KB.");
//        }

    }
</script>
