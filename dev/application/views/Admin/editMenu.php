<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>
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
                    <h3 class="page-header"><i class="fa fa-files-o"></i> Edit &nbsp Menu</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="icon_document_alt"></i>Menu</li>
                        <li><i class="fa fa-files-o"></i>Manage Menu</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Menu
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <?php foreach ($edit_menu as $menu){?>
                                <form class="form-validate form-horizontal" id="editMenu" method="POST" action="<?php echo base_url() ?>Admin/Menu/editMenu/<?php echo $menu->menuId?>">

                                    <div class="form-group ">
                                        <label for="menuTitle" class="control-label col-lg-2">Menu Name <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('menuTitle'); ?></font></p>
                                            <input class="form-control" id="menuTitle" name="menuTitle"  type="text" value="<?php echo $menu->menuName?>" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="menuType">Menu Type <span class="required">*</span></label>

                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('menuType'); ?></font></p>
                                            <select class="form-control m-bot15" name="menuType" id="menuType" onchange="selectid(this)"required>
                                                <option value="" selected><?php echo SELECT_MENU_TYPE?></option>
                                                <?php for ($i=0;$i<count(MENU_TYPE);$i++){?>
                                                    <option value="<?php echo MENU_TYPE[$i]?>" <?php if (!empty($menu->menuType) && $menu->menuType == MENU_TYPE[$i])  echo 'selected = "selected"'; ?>><?php echo MENU_TYPE[$i]?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="menuId">New/Sub Menu </label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('menuId'); ?></font></p>
                                            <select class="form-control m-bot15" name="menuId" id="menuId" onchange="chkown()">
                                                <?php if ($menu->submenu=="")
                                                {
                                                    echo "<option  value='' selected>".MENU."</option>";
                                                }
												else
												    {?>
													<option value="<?php echo $menu->parentId?>" selected><?php echo $menu->submenu?></option>
                                                <?php }?>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="pageId">Page</label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('pageId'); ?></font></p>
                                            <select class="form-control m-bot15" name="pageId" id="pageId">

                                                <?php if ($menu->pageId=="")
                                                {
                                                    echo "<option value='' selected>".NONE."</option>";

                                                ?>
                                                <?php foreach ($page as $page){?>

                                                 <option value="<?php echo $page->pageId?>"><?php echo $page->pageTitle?></option>

                                                <?php }
                                                }
                                                else{?>
                                                    <option value=""><?php echo NONE?></option>
                                                <?php foreach ($page as $page){?>

                                                    <option value="<?php echo $page->pageId?>" <?php if (!empty($page->pageId) && $page->pageId == $menu->pageId)  echo 'selected = "selected"'; ?>><?php echo $page->pageTitle?></option>
                                                <?php }
                                                }?>
                                            </select>


                                        </div>



                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="menuStatus">Menu Status<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('menuStatus'); ?></font></p>
                                            <select class="form-control m-bot15" name="menuStatus" id="menuStatus" required>
                                                <option value=""><?php echo SELECT_STATUS?></option>
                                                <?php for ($i=0;$i<count(STATUS);$i++){?>
                                                    <option value="<?php echo STATUS[$i]?>"<?php if (!empty($menu->menuStatus) && $menu->menuStatus == STATUS[$i])  echo 'selected = "selected"'; ?>><?php echo STATUS[$i]?></option>
                                                <?php } ?>

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
    function chkown() {

        var menuId=document.getElementById("menuId").value;
        if (menuId == <?php echo $menu->menuId?>){
            alert("!!Can't Make OWN's Sub Menu!!");
            document.getElementById("menuId").selectedIndex=0;
            return false;
        }
    }

</script>