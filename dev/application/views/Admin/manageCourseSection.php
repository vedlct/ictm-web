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
                    <h3 class="page-header"><i class="fa fa-table"></i> Course Section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-table"></i>Course Section</li>
                        <li><i class="fa fa-th-list"></i>Manage Course Section</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Manage Course Section
                        </header>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label col-lg-1" for="inputSuccess">Course Title</label>
                                <div class="col-lg-10">
                                    <select class="form-control m-bot15" id="coursename" name="coursetitle" onchange="showtable()">
                                        <option>Select Page</option>
                                        <?php foreach ($coursetitle as $ct) { ?>
                                            <option value="<?php echo $ct->courseId?>"><?php echo $ct->courseTitle?></option>
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
    <div class="text-right">
        <div class="credits">
            <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
            -->
            <a href="#">Icon College</a> by <a href="#">A2N</a>
        </div>
    </div>
</section>
<!-- container section end -->
<!-- javascripts -->
<?php include('js.php') ?>

<script>
    function showtable() {
        var x = document.getElementById('coursename').value;


        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Admin/Course/showCourseSecManageTable")?>',
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
