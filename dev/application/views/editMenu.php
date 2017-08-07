<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('head.php') ?>
</head>

<body>
<!-- container section start -->
<section id="container" class="">
    <!--header start-->
    <?php include ('header.php')?>
    <!--header end-->

    <!--sidebar start-->
    <?php include ('sidebar.php')?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-files-o"></i> Edit &nbsp Menu</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
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
                            Menu
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <?php foreach ($edit_menu as $menu){?>
                                <form class="form-validate form-horizontal" id="editMenu" method="POST" action="<?php echo base_url() ?>Admin_Menu/editMenu/<?php echo $menu->menuId?>" onsubmit="return submitform()">

                                    <div class="form-group ">
                                        <label for="menuTitle" class="control-label col-lg-2">Menu Name <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <input class="form-control" id="menuTitle" name="menuTitle"  type="text" value="<?php echo $menu->menuName?>" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="menuType">Menu Type <span class="required">*</span></label>
<!--                                        <div class="col-lg-10">-->
<!---->
<!--                                            <select class="form-control m-bot15" name="menuType" id="menuType" onchange="selectid(this)" required>-->
<!--                                                <option selected>--><?php //echo $menu->menuType?><!--</option>-->
<!--                                                <option>Select Menu Type</option>-->
<!--                                                <option>Top</option>-->
<!--                                                <option>MainMenu</option>-->
<!--                                                <option>KeyInfo</option>-->
<!--                                                <option>QuickLink</option>-->
<!--                                                <option>ImportantLink</option>-->
<!--                                                <option>Bottom</option>-->
<!--                                            </select>-->
<!---->
<!--                                        </div>-->
                                        <div class="col-lg-10">
                                            <select class="form-control m-bot15" name="menuType" id="menuType" onclick="selectid(this)"required>
                                                <option>Select Menu Type</option>
                                                <option value="Top" <?php if (!empty($menu->menuType) && $menu->menuType == 'Top')  echo 'selected = "selected"'; ?>>Top</option>
                                                <option value="MainMenu" <?php if (!empty($menu->menuType) && $menu->menuType == 'MainMenu')  echo 'selected = "selected"'; ?>>MainMenu</option>
                                                <option value="KeyInfo" <?php if (!empty($menu->menuType) && $menu->menuType == 'KeyInfo')  echo 'selected = "selected"'; ?>>KeyInfo</option>
                                                <option value="QuickLink" <?php if (!empty($menu->menuType) && $menu->menuType == 'QuickLink')  echo 'selected = "selected"'; ?>>QuickLink</option>
                                                <option value="ImportantLink" <?php if (!empty($menu->menuType) && $menu->menuType == 'ImportantLink')  echo 'selected = "selected"'; ?>>ImportantLink</option>
                                                <option value="Bottom" <?php if (!empty($menu->menuType) && $menu->menuType == 'Bottom')  echo 'selected = "selected"'; ?>>Bottom</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="menuId">New/Sub Menu <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <select class="form-control m-bot15" name="menuId" id="menuId" required>
                                                <?php if ($menu->parentId=="")
                                                {
                                                    echo "<option  selected>Menu</option>";
                                                }
												else{
                                                    $p_id=$menu->parentId;
                                                    $query=$this->db->query("select menuName from ictmmenu WHERE `menuId`= '$p_id'");
                                                    foreach ($query->result() as $r ){$mName=$r->menuName;}?>
                                                    
													<option value="<?php echo $menu->parentId?>" <?php if (!empty($menu->parentId) && $menu->parentId == $p_id)  echo 'selected = "selected"'; ?>><?php echo $mName?></option>       
													
                                                <?php }?>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="pageId">Page</label>
                                        <div class="col-lg-10">
                                            <select class="form-control m-bot15" name="pageId" id="pageId">

                                                <?php if ($menu->pageId=="")
                                                {
                                                    echo "<option selected>None</option>";

                                                ?>
                                                <?php foreach ($page as $page){?>

                                                 <option value="<?php echo $page->pageId?>"><?php echo $page->pageTitle?></option>

                                                <?php }} else{
                                                    $pa_id=$menu->pageId;
//                                                    $query=$this->db->query("select pageTitle from ictmpage WHERE `pageId`= '$pa_id'");
//                                                    foreach ($query->result() as $p ){$paTitle=$p->pageTitle;}
                                                    //echo "<option value='$pa_id' selected>$paTitle</option>";

                                                ?>
                                                    <option>None</option>
                                                <?php foreach ($page as $page){?>

                                                    <option value="<?php echo $page->pageId?>" <?php if (!empty($page->pageId) && $page->pageId == $pa_id)  echo 'selected = "selected"'; ?>><?php echo $page->pageTitle?></option>
                                                <?php }}?>
                                            </select>


                                        </div>



                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="menuStatus">Menu Status<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <select class="form-control m-bot15" name="menuStatus" id="menuStatus" required>
<!--                                                <option selected>--><?php //echo $menu->menuStatus?><!--</option>-->
                                                <option >Select Status</option>
<!--                                                <option >Active</option>-->
<!--                                                <option >InActive</option>-->
                                                <option value="Active" <?php if (!empty($menu->menuStatus) && $menu->menuStatus == 'Active')  echo 'selected = "selected"'; ?>>Active</option>
                                                <option value="InActive" <?php if (!empty($menu->menuStatus) && $menu->menuStatus == 'InActive')  echo 'selected = "selected"'; ?>>InActive</option>

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

<?php include ('js.php')?>


</body>
</html>
<script>


    function selectid(x) {

        var btn =  document.getElementById("menuType").value;
        //alert(btn);
        if (btn == "Select Menu Type"){

            alert("Select a valid Menu Type");
        }
        else
        {

            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin_Menu/getMenuLevel/")?>'+btn,
                data:{'type': btn},
                cache: false,
                success:function(data) {

                    //document.getElementById("menuId").innerHTML = data;
                    //alert(data);
					$('#menuId').append(data);


                }

            });
        }
    }
    function submitform() {

        var title=document.getElementById("menuTitle").value;
        var menuType=document.getElementById("menuType").value;
        var menuStatus=document.getElementById("menuStatus").value;
        if (title == null){
            alert("Please Insert a Title for Menu");
            return false;
        }
        if (menuType =="Select Menu Type"){
            alert("Please Select Menu Type");
            return false;
        }
        if (menuStatus =="Select Status"){
            alert("Please Select Menu Status");
            return false;
        }

    }

</script>