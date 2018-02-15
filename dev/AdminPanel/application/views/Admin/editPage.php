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
                    <h3 class="page-header"><i class="fa fa-files-o"></i> Edit Page</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="icon_document_alt"></i>Page</li>
                        <li><i class="fa fa-files-o"></i>Edit &nbsp Page</li>
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
                            Edit Page
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <?php foreach ($editPageData as $epd) {?>
                                <form class="form-validate form-horizontal" id="feedback_form" method="post"  action="<?php echo base_url()?>Admin/Page/editPage/<?php echo $epd->pageId?>"  enctype="multipart/form-data" onsubmit="return formsubmit()">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Title <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('title'); ?></font></p>
                                            <input class="form-control" id="title" name="title"  type="text" value="<?php echo $epd->pageTitle;?>" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">Page Type<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('pagetype'); ?></font></p>
                                            <select class="form-control m-bot15" id="pagetype" name="pagetype" onchange="checkPageType()" required>

                                                <option value=""><?php echo SELECT_PAGE_TYPE?></option>
                                                <?php for ($i=0;$i<count(PAGE_TYPE);$i++){?>
                                                    <option value="<?php echo PAGE_TYPE[$i]?>" <?php if (!empty($epd->pageType) && $epd->pageType == PAGE_TYPE[$i])  echo 'selected = "selected"'; ?>><?php echo PAGE_TYPE[$i]?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div id="keywords" class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Page Keywords</label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('keywords'); ?></font></p>
                                            <input class="form-control" id="keywords" name="keywords"  value="<?php echo $epd->pageKeywords;?>" type="text" placeholder="Write Page Meta Keywords(multiple separate by comma)" />
                                        </div>
                                    </div>
                                    <div id="metadata" class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Page MetaData</label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('metadata'); ?></font></p>
                                            <input class="form-control" id="metadata" name="metadata"  value="<?php echo $epd->pageMetaData?>" type="text" placeholder="Write Page Meta Description" />
                                        </div>
                                    </div>

                                    <div class="form-group " id="ckeditorContent">
                                        <label class="control-label col-sm-2">Content</label>
                                        <div class="col-sm-10">
                                            <p><font color="red"> <?php echo form_error('content'); ?></font></p>
                                            <textarea class="form-control ckeditor" name="ckContent" rows="6" ><?php echo $epd->pageContent; ?></textarea>
                                        </div>

                                    </div>

                                    <div class="form-group " id="normalContent" style="display: none">
                                        <label class="control-label col-sm-2">Content</label>
                                        <div class="col-sm-10">
                                            <p><font color="red"> <?php echo form_error('content'); ?></font></p>
                                            <textarea class="form-control" name="content" rows="6" ><?php echo $epd->pageContent; ?></textarea>
                                        </div>

                                    </div>

                                    <div id="image" class="form-group ">
                                        <label for="curl" class="control-label col-lg-2">Image</label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('image'); ?></font></p>
                                            <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control"  id="images" type="file" name="image" />
                                            <span>View Existing Image:</span><a href="<?php echo base_url()?>Admin/Page/showImageForEdit/<?php echo $epd->pageId?>" target="_blank"><span> <?php echo $epd->pageImage?></span></a>
                                            <?php if ($epd->pageImage!=null){?>
                                                <a href="<?php echo base_url() ?>Admin/Page/deletePageImage/<?php echo $epd->pageId ?>" onclick='return confirm("Are you sure to Delete This Page Image?")'><i class="icon_trash"></i></a>
                                            <?php }?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">Page Status<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('status'); ?></font></p>
                                            <select class="form-control m-bot15" name="status" required>

                                                <option value=""><?php echo SELECT_STATUS?></option>
                                                <?php for ($i=0;$i<count(STATUS);$i++){?>
                                                    <option value="<?php echo STATUS[$i]?>"<?php if (!empty($epd->pageStatus) && $epd->pageStatus == STATUS[$i])  echo 'selected = "selected"'; ?>><?php echo STATUS[$i]?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group " align="center">
                                        <div class="col-lg-10">
                                            <input class="btn btn-success" type="submit" style="margin-left: 180px">
                                            <input class="btn btn-close" type="reset" >
                                        </div>
                                    </div>

                            </div>

                            </form>
                            <?php } ?>
                        </div>
                </div>
        </section>
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
<!-- javascripts -->

<?php include('js.php') ?>

</body>
</html>

<script type="text/javascript" src="<?php echo base_url()?>public/ckeditor/ckeditor.js"></script>
<script>

    $(document).ready(function(){

        var pagetype = document.getElementById("pagetype").value;

        if (pagetype == "Static Type" || pagetype == "Link Type"){
            document.getElementById("ckeditorContent").style.display = "none";
            document.getElementById("keywords").style.display = "none";
            document.getElementById("metadata").style.display = "none";
            document.getElementById("image").style.display = "none";
            document.getElementById("normalContent").style.display = "block";
        }else {
            document.getElementById("ckeditorContent").style.display = "block";
            document.getElementById("normalContent").style.display = "none";
        }

    });

    function checkPageType() {
        var pagetype = document.getElementById("pagetype").value;

        if (pagetype == "Static Type" || pagetype == "Link Type"){
            document.getElementById("ckeditorContent").style.display = "none";
            document.getElementById("keywords").style.display = "none";
            document.getElementById("metadata").style.display = "none";
            document.getElementById("image").style.display = "none";
            document.getElementById("normalContent").style.display = "block";
        }else {
            document.getElementById("ckeditorContent").style.display = "block";
            document.getElementById("keywords").style.display = "block";
            document.getElementById("metadata").style.display = "block";
            document.getElementById("image").style.display = "block";
            document.getElementById("normalContent").style.display = "none";
        }
    }

    function formsubmit() {

        var image =document.getElementById("images").value;

        if(image!='')
        {

            var ext = image.substring(image.lastIndexOf('.') + 1);
            //alert(ext);
            if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "png" || ext == "PNG")
            {

            }
            else {
                alert("Upload images of correct format!!");
                return false;
            }

            var img = document.getElementById("images");
            //alert((img.files[0].size/1024));
            if((img.files[0].size/1024) >  4096)  // validation according to file size
            {
                //document.getElementById("imageerror").innerHTML="Image size too big";
                alert('Image size too big');
                return false;
            }

            //return true;
        }

        var title =  document.getElementById("title").value;
        var keywords =  document.getElementById("keywords").value;
        var metadata =  document.getElementById("title").value;

        if (title.length >255){
            alert("Page Title Should not more than 255 Charecter Length");
            return false;
        }
        if (keywords.length >255){
            alert("Page keywords Title Should not more than 255 Charecter Length");
            return false;
        }
        if (metadata.length >255){
            alert("Page metadata Should not more than 255 Charecter Length");
            return false;
        }
        else
        {
            return true;

        }
    }

</script>
