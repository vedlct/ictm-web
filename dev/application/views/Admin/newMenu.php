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
                    <h3 class="page-header"><i class="fa fa-files-o"></i> New &nbsp Menu</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="icon_document_alt"></i>Menu</li>
                        <li><i class="fa fa-files-o"></i>Create a new Menu</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            New Menu
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" id="CreateNewMenu" method="POST" action="<?php echo base_url() ?>Admin/Menu/createNewMenu">
                                    <div class="form-group ">
                                        <label for="menuTitle" class="control-label col-lg-2">Menu Name <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('menuTitle'); ?></font></p>
                                            <input class="form-control" id="menuTitle" name="menuTitle"  type="text" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="menuType">Menu Type <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('menuType'); ?></font></p>
                                            <select class="form-control m-bot15" name="menuType" id="menuType" onchange="selectid(this)" required>
                                                <option value="" selected><?php echo SelectMenuType ?></option>
                                                <option value="<?php echo top?>"><?php echo top?></option>
                                                <option><?php echo mainmenu?></option>
                                                <option><?php echo key?></option>
                                                <option><?php echo quickLink?></option>
                                                <option><?php echo important?></option>
                                                <option><?php echo bottom?></option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="menuId">New Menu/Sub Menu of</label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('menuId'); ?></font></p>
                                            <select class="form-control m-bot15" name="menuId" id="menuId">
                                                <option value="" selected>Select Parent Menu</option>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="pageId">Page</label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('pageId'); ?></font></p>
                                            <select class="form-control m-bot15" name="pageId" id="pageId">
                                                <option value="" selected><?php echo SelectPage ?></option>
                                                <?php foreach ($page as $page){?>

                                                    <option value="<?php echo $page->pageId?>"><?php echo $page->pageTitle?></option>
                                                <?php }?>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="menuStatus">Menu Status<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('menuStatus'); ?></font></p>
                                            <select class="form-control m-bot15" name="menuStatus" id="menuStatus" required>
                                                <option value="" selected><?php echo SelectStatus?></option>
                                                <option value="<?php echo Active?>"><?php echo Active?></option>
                                                <option value="<?php echo InActive?>"><?php echo InActive?></option>
                                            </select>


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
<script>
    function selectid(x) {
        var btn =  document.getElementById("menuType").value;

        if (btn == ""){
            alert("Select a valid Menu Type");
        }
        else
        {
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/Menu/getMenuLevel/")?>'+btn,
                data:{'type': btn},
                cache: false,
                success:function(data) {
                    document.getElementById("menuId").innerHTML = data;

                }
            });
        }
    }
</script>