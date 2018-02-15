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
                    <h3 class="page-header"><i class="fa fa-table"></i>Course Section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-table"></i>Course Section</li>
                        <li><i class="fa fa-th-list"></i>Manage Course Section</li>
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
                            Manage Course Section
                            <span >
                                 <a href="<?php echo base_url()?>Admin/CourseSection/createCourseSec"> <button class="btn btn-sm" style="float: right; height: 26px; margin-top: 4px; background-color: #00A8FF;color: whitesmoke; ">New Course Section</button> </a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <form class="row">
                            <div class="form-group">
                                <label style="text-align: right" class="control-label col-md-4 col-lg-4" for="coursename">Course Title</label>
                                <div class="col-md-4 col-lg-4">
                                    <select class="form-control m-bot15" id="coursename" name="coursetitle" onchange="showtable()">
                                        <option><?php echo SELECT_COURSE ?></option>
                                        <?php foreach ($coursetitle as $ct) { ?>
                                            <option value="<?php echo $ct->courseId?>"><?php echo $ct->courseTitle?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            </form>
                            <div id="tableid" style="display: none">

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

<script>
    function showtable() {
        var x = document.getElementById('coursename').value;


        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Admin/CourseSection/showCourseSecManageTable/")?>'+x,
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
