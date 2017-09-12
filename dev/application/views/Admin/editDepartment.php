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
                    <h3 class="page-header"><i class="fa fa-files-o"></i> Edit &nbsp Department</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="icon_document_alt"></i>Departments</li>
                        <li><i class="fa fa-files-o"></i>Edit Department</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Department
                        </header>
                        <div class="panel-body">
                            <div class="form">
                             <?php foreach ($editDepartment as $editDepartment ){?>
                                <form class="form-validate form-horizontal" id="CreateNewDepartment" method="POST" action="<?php echo base_url() ?>Admin/Department/editDepartmentbyId/<?php echo $editDepartment->departmentId?>" onsubmit="return submitform()" enctype="multipart/form-data">
                                    <div class="form-group ">
                                        <label for="departmentName" class="control-label col-lg-2">Department Name <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('departmentName'); ?></font></p>
                                            <input class="form-control" id="departmentName" name="departmentName" value="<?php echo $editDepartment->departmentName?>" type="text" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="departmentHead">Department Head <span class="required">*</span></label>
                                        <div class="col-lg-4">

                                            <p><font color="red"> <?php echo form_error('departmentHead'); ?></font></p>
                                            <input class="form-control" id="departmentHead" name="departmentHead"  value="<?php echo $editDepartment->departmentHead?>" type="text" required />


                                            </select>

                                        </div>

                                        <label class="control-label col-lg-2" for="departmentStatus">Department Status<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('departmentStatus'); ?></font></p>
                                            <select class="form-control m-bot15" name="departmentStatus" id="departmentStatus" required>
                                                <option value=""><?php echo SELECT_STATUS?></option>
                                                <?php for ($i=0;$i<count(STATUS);$i++){?>
                                                    <option value="<?php echo STATUS[$i]?>"<?php if (!empty($editDepartment->departmentStatus) && $editDepartment->departmentStatus == STATUS[$i])  echo 'selected = "selected"'; ?>><?php echo STATUS[$i]?></option>
                                                <?php } ?>

                                            </select>


                                        </div>


                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="departmentSummary">DepartmentHead Summary</label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control ckeditor" name="departmentSummary" id="departmentSummary"><?php echo $editDepartment->departmentSummary ?></textarea>


                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-2">Image</label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('image'); ?></font></p>
                                            <span>Image Allowed Types:&nbsp;&nbsp;<strong>jpg/png/jpeg/gif </strong></span>
                                            <input class="form-control " id="image" type="file" name="image"/>
                                            <span>View Existing Image:</span><a href="<?php echo base_url()?>Admin/Department/showImageForEdit/<?php echo $editDepartment->departmentId?>" target="_blank"><span> <?php echo $editDepartment->departmentImage?></span></a>
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

<?php include ('js.php')?>
</body>
</html>
<script type="text/javascript" src="<?php echo base_url()?>public/ckeditor/ckeditor.js"></script>
