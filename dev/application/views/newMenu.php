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
                    <h3 class="page-header"><i class="fa fa-files-o"></i> New &nbsp Menu</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
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
                            Menu
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" id="CreateNewMenu" method="POST" action="<?php echo base_url() ?>Admin_Menu/CreateNewMenu" onsubmit="submitform()">
                                    <div class="form-group ">
                                        <label for="menuTitle" class="control-label col-lg-2">Menu Name <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <input class="form-control" id="menuTitle" name="menuTitle"  type="text" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="menuType">Menu Type <span class="required">*</span></label>
                                        <div class="col-lg-10">

                                            <select class="form-control m-bot15" name="menuType" id="menuType" onchange="selectid(this)">
                                                <option selected>Select Menu Type</option>
                                                <option>Top</option>
                                                <option>MainMenu</option>
                                                <option>KeyInfo</option>
                                                <option>QuickLink</option>
                                                <option>ImportantLink</option>
                                                <option>Bottom</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="menuId">Level <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <select class="form-control m-bot15" name="menuId" id="menuId">
                                                <option selected>Select Menu</option>
<!--                                                <option>New Menu</option>-->
<!--                                                <option>About</option>-->
<!--                                                <option>Course</option>-->
<!--                                                <option>Addmission</option>-->
<!--                                                <option>College Life</option>-->
<!--                                                <option>News & Events</option>-->
                                            </select>


                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="pageId">Page</label>
                                        <div class="col-lg-10">
                                            <select class="form-control m-bot15" name="pageId" id="pageId">
                                                <option selected>Select Page </option>
                                                <?php foreach ($page as $page){?>

                                                    <option value="<?php echo $page->pageId?>"><?php echo $page->pageTitle?></option>
                                                <?php }?>
<!--                                                <option>page</option>-->
<!--                                                <option>About</option>-->
<!--                                                <option>Course</option>-->
<!--                                                <option>Addmission</option>-->
<!--                                                <option>College Life</option>-->
<!--                                                <option>News & Events</option>-->
                                            </select>


                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="menuStatus">Status</label>
                                        <div class="col-lg-10">
                                            <select class="form-control m-bot15" name="menuStatus" id="menuStatus">
                                                <option selected>Select Status</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">InActive</option>
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

                    document.getElementById("menuId").innerHTML = data;
                    //alert(data);


                }

            });
        }
    }
    function submitform() {

        var title=document.getElementById("menuTitle").value;
        var menuType=document.getElementById("menuType").value;
        var menuId =document.getElementById("menuId").value;
        var menuStatus=document.getElementById("menuStatus").value;

        if (title == null){
            alert("Please Insert a Title for Menu");
            return false;
        }
        if (menuType =="Select Menu Type"){
            alert("Please Select Menu Type");
            return false;
        }
        if (menuId =="Select Menu Name"){
            alert("Please Select Level");
            return false;
        }
        if (menuStatus =="Select Status"){
            alert("Please Select Status");
            return false;
        }

    }

</script>