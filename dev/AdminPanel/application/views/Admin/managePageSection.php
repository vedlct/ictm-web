<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>
</head>

<body>
<!-- container section start -->
<section id="container" class="">
    <!--header start-->
    <?php include ('topNavigation.php') ?>
    <!--header end-->

    <!--sidebar start-->
    <?php include('leftNavigation.php') ?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-table"></i> Page Section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="fa fa-table"></i>Page Section</li>
                        <li><i class="fa fa-th-list"></i>Manage Page Section</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->

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
                            Manage Page Section
                            <span >
                                 <a href="<?php echo base_url()?>Admin/PageSection/createPageSection"> <button class="btn btn-sm" style="float: right; height: 26px; margin-top: 4px; background-color: #00A8FF;color: whitesmoke; ">New Page Section</button> </a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <form class="row">
                            <div class="form-group">
                                <label style="text-align: right" class="control-label col-lg-4 col-md-4" for="pagename">Page Title<span class="required">*</span></label>
                                <div  class="col-lg-4 col-md-4">
                                    <select class="form-control m-bot15" id="pagename" name="pagetitle" required onchange="showtable()">
                                        <option value=""><?php echo SELECT_PAGE?></option>
                                       <?php foreach ($pagename as $pn) { ?>
                                           <option value="<?php echo $pn->pageId?>"><?php echo $pn->pageTitle?></option>
                                           <?php
                                       }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            </form>
                            <div id="tableid" style="display: none">

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

<script>
    function showtable() {
      var x = document.getElementById('pagename').value;

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Admin/PageSection/showPageSecManageTable/")?>'+x,
            data:{},
            cache: false,
            success:function(data)
            {
                $('#tableid').html(data);
            }
        });

        document.getElementById("tableid").style.display ="block";
    }
</script>
</body>
</html>
