<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('head.php') ?>
</head>

<body>
<!-- container section start -->
<section id="container" class="">
    <!--header start-->
    <?php include ('topNavigation.php') ?>
    <!--header end-->

    <!--sidebar start-->
    <?php include ('leftNavigation.php') ?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-table"></i>Course</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="fa fa-table"></i>Course</li>
                        <li><i class="fa fa-th-list"></i>Manage Course</li>
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
                            Manage Course
                            <span >
                                 <a href="<?php echo base_url()?>Admin/Course/createCourse"> <button class="btn btn-sm" style="float: right; height: 26px; margin-top: 4px; background-color: #00A8FF;color: whitesmoke; ">New Course</button> </a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <table class="table table-striped table-advance  table-bordered table-hover ">
                            <tbody>
                            <tr bgcolor="#D3D3D3">
                                <th  style="background-color: #394A59; color: whitesmoke; text-align: center"> Course Name</th>
                                <th  style="background-color: #394A59; color: whitesmoke; text-align: center"> Department</th>
                                <th  style="background-color: #394A59; color: whitesmoke; text-align: center"> Course Code</th>
                                <th  style="background-color: #394A59; color: whitesmoke; text-align: center"> Award</th>
                                <th  style="background-color: #394A59; color: whitesmoke; text-align: center"> Course Status</th>
                                <th  style="background-color: #394A59; color: whitesmoke; text-align: center"> Insert By</th>
                                <th  style="background-color: #394A59; color: whitesmoke; text-align: center"> Modified By</th>
                                <th  style="background-color: #394A59; color: whitesmoke; text-align: center"> Modified Date(d-m-Y)</th>
                                <th  style="background-color: #394A59; color: whitesmoke; text-align: center"> Action</th>
                            </tr>
                            <?php if (!empty($coursedata)){
                                foreach ($coursedata as $cd) { ?>
                                    <tr align="center">
                                        <td><?php echo $cd->courseTitle ?></td>
                                        <td><?php echo $cd->departmentName ?></td>
                                        <td><?php echo $cd->courseCodeIcon ?></td>
                                        <td><?php echo $cd->awardingTitle ?></td>
                                        <td><?php echo $cd->courseStatus ?></td>
                                        <td><?php echo $cd->insertedBy ?></td>
                                        <td>
                                            <?php if ($cd->lastModifiedBy==""){echo NEVER_MODIFIED;}else{echo $cd->lastModifiedBy;} ?>
                                        </td>
                                        <td>
                                            <?php if ($cd->lastModifiedDate==""){echo NEVER_MODIFIED;}
                                            else
                                            {
                                                echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($cd->lastModifiedDate)),1);

                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn"
                                                   href="<?php echo base_url() ?>Admin/Course/showEditCourse/<?php echo $cd->courseId?>"><i
                                                            class="icon_pencil-edit"></i></a>
                                                <a class="btn " href="<?php echo base_url() ?>Admin/Course/deleteCourse/<?php echo $cd->courseId ?>" onclick='return confirm("Are you sure to Delete This Course?")'><i class="icon_trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }
                            ?>

                            </tbody>
                        </table>
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
