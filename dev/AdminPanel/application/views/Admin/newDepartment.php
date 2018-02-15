<!DOCTYPE html>
<html lang="en">
<head>
    <!-- view head ----->
    <?php include('head.php') ?>
    <!-- view head  end----->
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
                    <h3 class="page-header"><i class="fa fa-files-o"></i> New &nbsp Department</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="icon_document_alt"></i>Departments</li>
                        <li><i class="fa fa-files-o"></i>Create a New Department</li>
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
                            New Department
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" id="CreateNewDepartment" method="POST" action="<?php echo base_url() ?>Admin/Department/createNewDepartment" onsubmit="return submitform()" enctype="multipart/form-data">
                                    <div class="form-group ">
                                        <label for="departmentName" class="control-label col-lg-2">Department Name <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('departmentName'); ?></font></p>
                                            <input class="form-control" id="departmentName" name="departmentName" value="<?php echo set_value('departmentName'); ?>" type="text" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="departmentHead">Department Head <span class="required">*</span></label>
                                        <div class="col-lg-4">

                                            <p><font color="red"> <?php echo form_error('departmentHead'); ?></font></p>
                                            <input class="form-control" id="departmentHead" name="departmentHead" value="<?php echo set_value('departmentHead'); ?>" type="text" required />

                                        </div>

                                        <label class="control-label col-lg-2" for="departmentStatus">Department Status<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('departmentStatus'); ?></font></p>
                                            <select class="form-control m-bot15" name="departmentStatus" id="departmentStatus" required>
                                                <option value="" selected><?php echo SELECT_STATUS ?></option>
                                                <?php for ($i=0;$i<count(STATUS);$i++){?>
                                                    <option <?php echo set_select('departmentStatus',  STATUS[$i], False); ?>><?php echo STATUS[$i]?></option>
                                                <?php } ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="departmentSummary">Department Summary</label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control ckeditor" name="departmentSummary" id="departmentSummary" ><?php echo set_value('departmentSummary'); ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-2">Image</label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('image'); ?></font></p>
                                            <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control " id="image" type="file" name="image"/>
                                        </div>
                                    </div>

                                    <div class="form-group "align="center">
                                        <div class="col-lg-10">
                                            <input class="btn btn-success" type="submit" style="margin-left: 180px">
                                            <input class="btn btn-close" type="reset" >
                                        </div>
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

<?php include ('js.php')?>
</body>
</html>
<script type="text/javascript" src="<?php echo base_url()?>public/ckeditor/ckeditor.js"></script>

<script>
    function submitform() {

        var image =document.getElementById("image").value;

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

            var img = document.getElementById("image");
            //alert((img.files[0].size/1024));
            if((img.files[0].size/1024) >  4096)  // validation according to file size
            {
                //document.getElementById("imageerror").innerHTML="Image size too big";
                alert('Image size too big');
                return false;
            }

            //return true;
        }

        var departmentName =  document.getElementById("departmentName").value;
        if (departmentName.length >255){
            alert("Department Name Should not more than 255 Charecter Length");
            return false;
        }
        var departmentHead =  document.getElementById("departmentHead").value;
        if (departmentHead.length >100){
            alert("Department Head Should not more than 100 Charecter Length");
            return false;
        }





    }
</script>

