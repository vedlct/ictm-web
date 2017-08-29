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

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Manage Page Section
                        </header>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label col-lg-1" for="inputSuccess">Page Title<span class="required">*</span></label>
                                <div class="col-lg-10">
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
            url:'<?php echo base_url("Admin/PageSection/showPageSecManageTable")?>',
            data:{id:x},
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
