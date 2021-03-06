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
                        <li><i class="icon_document_alt"></i><a href="<?php echo base_url()?>Admin/Home/squreBox">Squre Box</a></li>
                    </ol>
                </div>
            </div>
            <!-- page start-->

            <?php if ($this->session->flashdata('errorMessage')!=null){?>
                <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
            <?php }
            elseif($this->session->flashdata('successMessage')!=null){?>
                <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
            <?php }
            if (!empty(form_error('image[]'))){?>
                <div class="alert alert-danger" align="center"><strong><?php echo form_error('image[]');?></strong></div>
            <?php } ?>

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Home Squre Box
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <?php foreach ($squreBoxdata as $squreBoxdata) { ?>
                                    <form class="form-validate form-horizontal" id="squreBoxes" name="squreBoxes" method="POST"  action="<?php echo base_url()?>Admin/Home/editSqureBox/<?php echo $squreBoxdata->homeId?>" enctype="multipart/form-data" onsubmit="return submitform()">

                                        <div class="form-group col-sm-12">

                                            <label for="title1" class="control-label col-lg-2">Ttile 1<span class="required">*</span></label>
                                            <div class="col-lg-4">
                                                <p><font color="red"> <?php echo form_error('title1'); ?></font></p>
                                                <input class="form-control" id="title1" name="title1" maxlength="255" value="<?php echo $squreBoxdata->squareBoxTitle1?>" type="text" required />
                                            </div>

                                        </div>
                                        <div class="form-group col-sm-12">

                                            <label for="link1" class="control-label col-sm-2">link 1<span class="required">*</span></label>
                                            <div class="col-sm-10">
                                                <p><font color="red"> <?php echo form_error('link1'); ?></font></p>
                                                <input class="form-control" id="link1" name="link1" maxlength="500" value="<?php echo $squreBoxdata->squareBoxLink1?>" type="text" required />
                                            </div>

                                        </div>

                                        <div class="form-group col-sm-12">

                                            <label for="title2" class="control-label col-lg-2">Ttile 2<span class="required">*</span></label>
                                            <div class="col-lg-4">
                                                <p><font color="red"> <?php echo form_error('title2'); ?></font></p>
                                                <input class="form-control titlechk" id="title2" maxlength="255" name="title2"  value="<?php echo $squreBoxdata->squareBoxTitle2?>" type="text" required />
                                            </div>

                                            <label for="image2" class="control-label col-sm-2">Image 2</label>

                                            <div class="col-sm-4">

                                                <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                                <input class="form-control" type="file" name="image[]" id="image[0]">
                                                <span>View Existing Image:</span><a href="<?php echo base_url()?>Admin/Home/showImageForEdit/<?php echo $squreBoxdata->squareBoxImage2;?>" target="_blank"><span> <?php echo $squreBoxdata->squareBoxImage2;?> </span></a>

                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">

                                            <label for="link2" class="control-label col-sm-2">link 2<span class="required">*</span></label>
                                            <div class="col-sm-10">
                                                <p><font color="red"> <?php echo form_error('link2'); ?></font></p>
                                                <input class="form-control" id="link2" name="link2" maxlength="500" value="<?php echo $squreBoxdata->squareBoxLink2?>" type="text" required />
                                            </div>

                                        </div>

                                        <div class="form-group col-sm-12">

                                            <label for="title3" class="control-label col-lg-2">Ttile 3<span class="required">*</span></label>
                                            <div class="col-lg-4">
                                                <p><font color="red"> <?php echo form_error('title3'); ?></font></p>
                                                <input class="form-control titlechk" id="title3" maxlength="255" name="title3"  value="<?php echo $squreBoxdata->squareBoxTitle3?>" type="text" required />
                                            </div>

                                            <label for="image3" class="control-label col-sm-2">Image 3</label>

                                            <div class="col-sm-4">

                                                <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                                <input class="form-control" type="file" name="image[]" id="image[1]"">
                                                <span>View Existing Image:</span><a href="<?php echo base_url()?>Admin/Home/showImageForEdit/<?php echo $squreBoxdata->squareBoxImage3;?>" target="_blank"><span> <?php echo $squreBoxdata->squareBoxImage3;?> </span></a>

                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">

                                            <label for="link3" class="control-label col-sm-2">link 3<span class="required">*</span></label>
                                            <div class="col-sm-10">
                                                <p><font color="red"> <?php echo form_error('link3'); ?></font></p>
                                                <input class="form-control" id="link3" name="link3" maxlength="500" value="<?php echo $squreBoxdata->squareBoxLink3?>v" type="text" required />
                                            </div>

                                        </div>

                                        <div class="form-group col-sm-12">

                                            <label for="title4" class="control-label col-lg-2">Ttile 4<span class="required">*</span></label>
                                            <div class="col-lg-4">
                                                <p><font color="red"> <?php echo form_error('title4'); ?></font></p>
                                                <input class="form-control titlechk" id="title4" maxlength="255" name="title4"  value="<?php echo $squreBoxdata->squareBoxTitle4?>" type="text" required />
                                            </div>

                                            <label for="image4" class="control-label col-sm-2">Image 4</label>

                                            <div class="col-sm-4">

                                                <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                                <input class="form-control" type="file" name="image[]" id="image[2]">
                                                <span>View Existing Image:</span><a href="<?php echo base_url()?>Admin/Home/showImageForEdit/<?php echo $squreBoxdata->squareBoxImage4;?>" target="_blank"><span> <?php echo $squreBoxdata->squareBoxImage4;?> </span></a>

                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">

                                            <label for="link4" class="control-label col-sm-2">link 4<span class="required">*</span></label>
                                            <div class="col-sm-10">
                                                <p><font color="red"> <?php echo form_error('link4'); ?></font></p>
                                                <input class="form-control" id="link4" name="link4" maxlength="500"  value="<?php echo $squreBoxdata->squareBoxLink4?>" type="text" required />
                                            </div>

                                        </div>

                                        <div class="form-group col-sm-12">

                                            <label for="title5" class="control-label col-lg-2">Ttile 5<span class="required">*</span></label>
                                            <div class="col-lg-4">
                                                <p><font color="red"> <?php echo form_error('title5'); ?></font></p>
                                                <input class="form-control titlechk" id="title5" maxlength="255" name="title5"  value="<?php echo $squreBoxdata->squareBoxTitle5?>" type="text" required/>
                                            </div>

                                            <label for="image5" class="control-label col-sm-2">Image 5</label>

                                            <div class="col-sm-4">

                                                <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                                <input class="form-control" type="file" name="image[]" id="image[3]">
                                                <span>View Existing Image:</span><a href="<?php echo base_url()?>Admin/Home/showImageForEdit/<?php echo $squreBoxdata->squareBoxImage5;?>" target="_blank"><span> <?php echo $squreBoxdata->squareBoxImage5;?> </span></a>

                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">

                                            <label for="link5" class="control-label col-sm-2">link 5<span class="required">*</span></label>
                                            <div class="col-sm-10">
                                                <p><font color="red"> <?php echo form_error('link5'); ?></font></p>
                                                <input class="form-control" id="link5" name="link5" maxlength="500"  value="<?php echo $squreBoxdata->squareBoxLink5?>" type="text" required />
                                            </div>

                                        </div>

                                        <div class="form-group col-sm-12">

                                            <label for="title6" class="control-label col-lg-2">Ttile 6<span class="required">*</span></label>
                                            <div class="col-lg-4">
                                                <p><font color="red"> <?php echo form_error('title6'); ?></font></p>
                                                <input class="form-control titlechk" id="title6" maxlength="255" name="title6"  value="<?php echo $squreBoxdata->squareBoxTitle6?>" type="text" required />
                                            </div>

                                            <label for="image6" class="control-label col-sm-2">Image 6</label>

                                            <div class="col-sm-4">

                                                <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                                <input class="form-control" type="file" name="image[]" id="image[4]">
                                                <span>View Existing Image:</span><a href="<?php echo base_url()?>Admin/Home/showImageForEdit/<?php echo $squreBoxdata->squareBoxImage6;?>" target="_blank"><span> <?php echo $squreBoxdata->squareBoxImage6;?> </span></a>

                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">

                                            <label for="link6" class="control-label col-sm-2">link 6<span class="required">*</span></label>
                                            <div class="col-sm-10">
                                                <p><font color="red"> <?php echo form_error('link6'); ?></font></p>
                                                <input class="form-control" id="link6" name="link6" maxlength="500" value="<?php echo $squreBoxdata->squareBoxLink6?>" type="text" required />
                                            </div>

                                        </div>

                                        <div class="form-group col-sm-12">

                                            <label for="title7" class="control-label col-lg-2">Ttile 7<span class="required">*</span></label>
                                            <div class="col-lg-4">
                                                <p><font color="red"> <?php echo form_error('title7'); ?></font></p>
                                                <input class="form-control titlechk" id="title7" maxlength="255" name="title7"  value="<?php echo $squreBoxdata->squareBoxTitle7?>" type="text" required />
                                            </div>

                                            <label for="image7" class="control-label col-sm-2">Image 7</label>

                                            <div class="col-sm-4">

                                                <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                                <input class="form-control" type="file" name="image[]" id="image[5]">
                                                <span>View Existing Image:</span><a href="<?php echo base_url()?>Admin/Home/showImageForEdit/<?php echo $squreBoxdata->squareBoxImage7;?>" target="_blank"><span> <?php echo $squreBoxdata->squareBoxImage7;?> </span></a>

                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">

                                            <label for="link7" class="control-label col-sm-2">link 7<span class="required">*</span></label>
                                            <div class="col-sm-10">
                                                <p><font color="red"> <?php echo form_error('link7'); ?></font></p>
                                                <input class="form-control" id="link7" name="link7" maxlength="500"  value="<?php echo $squreBoxdata->squareBoxLink7?>" type="text" required />
                                            </div>

                                        </div>

                                        <div class="form-group col-sm-12">

                                            <label for="title8" class="control-label col-lg-2">Ttile 8<span class="required">*</span></label>
                                            <div class="col-lg-4">
                                                <p><font color="red"> <?php echo form_error('title8'); ?></font></p>
                                                <input class="form-control titlechk" id="title8" name="title8" maxlength="255"  value="<?php echo $squreBoxdata->squareBoxTitle8?>" type="text" required />
                                            </div>

                                            <label for="image8" class="control-label col-sm-2">Image 8</label>

                                            <div class="col-sm-4">

                                                <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                                <input class="form-control" type="file" name="image[]" id="image[6]">
                                                <span>View Existing Image:</span><a href="<?php echo base_url()?>Admin/Home/showImageForEdit/<?php echo $squreBoxdata->squareBoxImage8;?>" target="_blank"><span> <?php echo $squreBoxdata->squareBoxImage8;?> </span></a>

                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">

                                            <label for="link8" class="control-label col-sm-2">link 8<span class="required">*</span></label>
                                            <div class="col-sm-10">
                                                <p><font color="red"> <?php echo form_error('link8'); ?></font></p>
                                                <input class="form-control" id="link8" name="link8" maxlength="500"  value="<?php echo $squreBoxdata->squareBoxLink8?>" type="text" required />
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

<script type="text/javascript">

    function submitform(){

        for (var i=1;i<=8;i++){

            var Title=document.getElementById("title"+i).value;

            if(i==1 && Title.length >15) {
                alert( 'Title'+i+' must be less than 15 charecter!!' );
                return false;
            }
            if (i!=1 && Title.length > 255) {
                alert('Title' + i + ' must be less than 255 charecter!!');
                return false;
            }
        }

        var Link1=document.getElementById("link1").value;
        var Link2=document.getElementById("link2").value;
        var Link3=document.getElementById("link3").value;
        var Link4=document.getElementById("link4").value;
        var Link5=document.getElementById("link5").value;
        var Link6=document.getElementById("link6").value;
        var Link7=document.getElementById("link7").value;
        var Link8=document.getElementById("link8").value;

        if (Link1.length > 500){
            alert( 'Link1 must be less than 500 charecter!!' );
            return false;
        }
        if (Link2.length > 500){
            alert( 'Link2 must be less than 500 charecter!!' );
            return false;
        }
        if (Link3.length > 500){
            alert( 'Link3 must be less than 500 charecter!!' );
            return false;
        }
        if (Link4.length > 500){
            alert( 'Link4 must be less than 500 charecter!!' );
            return false;
        }
        if (Link5.length > 500){
            alert( 'Link5 must be less than 500 charecter!!' );
            return false;
        }
        if (Link6.length > 500){
            alert( 'Link6 must be less than 500 charecter!!' );
            return false;
        }
        if (Link7.length > 500){
            alert( 'Link7 must be less than 500 charecter!!' );
            return false;
        }
        if (Link8.length > 500){
            alert( 'Link8 must be less than 500 charecter!!' );
            return false;
        }
        var Image = document.squreBoxes.elements["image[]"];

        for (var i=0;i<Image.length;i++)
        {
//            if (Image[i].value == '')
//            {
//                alert( 'Please Select a Image in Image field Image'+(i+2));
//                return false;
//            }
            var imagess =document.getElementById("image["+i+"]").value;
            if(imagess!='')
            {

                var ext = imagess.substring(imagess.lastIndexOf('.') + 1);
                //alert(ext);
                if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "png" || ext == "PNG")
                {

                }
                else {
                    alert("Upload images of correct format!! in image field"+(i+2));
                    return false;
                }

                var img = document.getElementById("image["+i+"]");
                //alert((img.files[0].size/1024));
                if((img.files[0].size/1024) >  4096)  // validation according to file size
                {
                    //document.getElementById("imageerror").innerHTML="Image size too big";
                    alert('Image size too big in image'+(i+2));
                    return false;
                }

                //return true;
            }
        }

    }
</script>