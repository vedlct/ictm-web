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
                        <li><i class="fa fa-files-o"></i>Create a New Menu</li>
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
                            New Menu
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" id="CreateNewMenu" method="POST" action="<?php echo base_url() ?>Admin/Menu/createNewMenu" onsubmit="return formvalidate()">
                                    <div class="form-group ">
                                        <label for="menuTitle" class="control-label col-lg-2">Menu Name <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('menuTitle'); ?></font></p>
                                            <input class="form-control" id="menuTitle" name="menuTitle"  value="<?php echo set_value('menuTitle'); ?>" type="text" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="menuType">Menu Type <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('menuType'); ?></font></p>
                                            <select class="form-control m-bot15" name="menuType" id="menuType" onchange="selectid(this)" required>
                                                <option value="" selected><?php echo SELECT_MENU_TYPE?></option>
                                                <?php for ($i=0;$i<count(MENU_TYPE);$i++){?>
                                                    <option value="<?php echo MENU_TYPE[$i]?>"><?php echo MENU_TYPE[$i]?></option>
                                                <?php } ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div id="parentMenuDiv" class="form-group">
                                        <label class="control-label col-lg-2" for="parentId">Parent Menu</label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('parentId'); ?></font></p>
                                            <select class="form-control m-bot15" name="parentId" id="parentId">
                                                <option  value="" selected><?php echo SELECT_PARENT_MENU?></option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="pageId">Page</label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('pageId'); ?></font></p>
                                            <select class="form-control m-bot15" name="pageId" id="pageId">
                                                <option value="" selected><?php echo SELECT_PAGE ?></option>
                                                <?php foreach ($page as $page){?>
                                                    <option value="<?php echo $page->pageId?>" <?php echo set_select('pageId',  $page->pageId, False); ?>><?php echo $page->pageTitle?></option>
                                                <?php }?>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="menuTitle" class="control-label col-lg-2">Order Number<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('orderNumber'); ?></font></p>
                                            <input class="form-control" id="orderNumber" name="orderNumber"  value="<?php echo set_value('orderNumber'); ?>" type="text" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="menuStatus">Menu Status<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('menuStatus'); ?></font></p>
                                            <select class="form-control m-bot15" name="menuStatus" id="menuStatus" required>
                                                <option value="" selected><?php echo SELECT_STATUS ?></option>
                                                <?php for ($i=0;$i<count(STATUS);$i++){?>
                                                <option <?php echo set_select('menuStatus',  STATUS[$i], False); ?>><?php echo STATUS[$i]?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>



                                    <div id="csrf">
                                        <input type="hidden"  name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
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

    $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });

    function selectid(x) {

        var btn =  document.getElementById("menuType").value;

        if (btn == ""){
            alert("Select a valid Menu Type");

        }
        else
        {
            if (btn != '<?php echo MENU_TYPE[1]?>'){
                document.getElementById("parentMenuDiv").style.display = "none";
            }
            else{
                document.getElementById("parentMenuDiv").style.display = "block";
            }
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/Menu/getMenuLevel/")?>'+btn,
                data:{'type': btn},
                cache: false,
                success:function(data) {

                    document.getElementById("parentId").innerHTML = data;
                    $('#csrf').load(document.URL +  ' #csrf');

                }
            });
        }
    }
    function formvalidate() {
        var length =  document.getElementById("menuTitle").value;

        if (length.length >100){
            alert("Menu Name Should not more than 100 Charecter Length");
            return false;
        }
        else
        {
            return true;
        }
    }

</script>