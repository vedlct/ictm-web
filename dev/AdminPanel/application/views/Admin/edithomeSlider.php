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
                        <li><i class="icon_document_alt"></i><a href="<?php echo base_url()?>Admin/Home/verticalBar">Slider</a></li>
                    </ol>
                </div>
            </div>

            <?php if ($this->session->flashdata('errorMessage')!=null){?>
                <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
            <?php }
            elseif($this->session->flashdata('successMessage')!=null){?>
                <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
            <?php }
            if (!empty(form_error('image[]'))){?>
                <div class="alert alert-danger" align="center"><strong><?php echo form_error('image[]');?></strong></div>
            <?php } ?>
            <!-- page start-->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Home Slider
                        </header>
                        <div class="panel-body">
                            <div class="form">
                            <?php foreach ($sliderdata as $sliderdata){?>
                                <form class="form-validate form-horizontal" id="homeSlider" name="homeSlider" method="POST"  action="<?php echo base_url()?>Admin/Home/editHomeSlider/<?php echo $sliderdata->homeId ?>" enctype="multipart/form-data" onsubmit="return submitform()">

                                    <div class="form-group col-sm-12">

                                        <label for="sliderImage" class="control-label col-sm-2">Slider Image 1</label>
                                        <div class="col-sm-4">

                                            <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control"id="image[0]" type="file" name="image[]">
                                            <span>View Existing Image:</span><a href="<?php echo base_url()?>Admin/Home/showImageForEdit/<?php echo $sliderdata->slideImage1 ;?>" target="_blank"><span> <?php echo $sliderdata->slideImage1 ;?> </span></a>

                                        </div>


                                    </div>
                                    <div class="form-group col-sm-12">

                                        <label for="text1" class="control-label col-sm-2">Slider Text 1<span class="required">*</span></label>
                                        <div class="col-sm-10">

                                            <textarea class="form-control " name="text1" id="text1" placeholder="maximum 255 charecter" maxlength="255" required><?php echo $sliderdata->slideText1; ?></textarea>


                                        </div>

                                    </div>


                                    <div class="form-group col-sm-12">

                                        <label for="sliderImage" class="control-label col-sm-2">Slider Image 2</label>
                                        <div class="col-sm-4">

                                            <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control" type="file" id="image[1]"name="image[]">
                                            <span>View Existing Image:</span><a href="<?php echo base_url()?>Admin/Home/showImageForEdit/<?php echo $sliderdata->slideImage2 ;?>" target="_blank"><span> <?php echo $sliderdata->slideImage2 ;?> </span></a>
                                        </div>


                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="text2" class="control-label col-sm-2">Slider Text 2<span class="required">*</span></label>
                                        <div class="col-sm-10">

                                            <textarea class="form-control " name="text2" placeholder="maximum 255 charecter" maxlength="255" id="text2" required><?php echo $sliderdata->slideText2; ?></textarea>


                                        </div>

                                    </div>


                                    <div class="form-group col-sm-12">

                                        <label for="sliderImage" class="control-label col-sm-2">Slider Image 3</label>
                                        <div class="col-sm-4">

                                            <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control" type="file" name="image[]" id="image[2]">
                                            <span>View Existing Image:</span><a href="<?php echo base_url()?>Admin/Home/showImageForEdit/<?php echo $sliderdata->slideImage3;?>" target="_blank"><span> <?php echo $sliderdata->slideImage3;?> </span></a>
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="text3" class="control-label col-sm-2">Slider Text 3<span class="required">*</span></label>
                                        <div class="col-sm-10">

                                            <textarea class="form-control " name="text3" placeholder="maximum 255 charecter" required maxlength="255" id="text3"><?php echo $sliderdata->slideText3; ?></textarea>


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
                             <?php }?>
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

        var Text1=document.getElementById("text1").value;
        var Text2=document.getElementById("text2").value;
        var Text3=document.getElementById("text3").value;

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
        var Image = document.homeSlider.elements["image[]"];
        for (i=0;i<Image.length;i++){

            var imagess =document.getElementById("image["+i+"]").value;

            if(imagess!='')
            {

                var ext = imagess.substring(imagess.lastIndexOf('.') + 1);
                //alert(ext);
                if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "png" || ext == "PNG")
                {

                }
                else {
                    alert("Upload images of correct format!! in image field"+(i+1));
                    return false;
                }

                var img = document.getElementById("image["+i+"]");
                //alert((img.files[0].size/1024));
                if((img.files[0].size/1024) >  4096)  // validation according to file size
                {
                    //document.getElementById("imageerror").innerHTML="Image size too big";
                    alert('Image size too big in image'+(i+1));
                    return false;
                }

                //return true;
            }
        }

    }
</script>
