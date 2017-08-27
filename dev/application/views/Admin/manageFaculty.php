<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>
</head>

<body>
<!-- container section start -->
<section id="container" class="">
    <!--header start-->
    <?php include ('topNavigation.php')?>
    <!--header end-->

    <!--sidebar start-->
    <?php include('leftNavigation.php') ?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-table"></i> Manage &nbsp Faculty</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li><i class="fa fa-table"></i>Faculty</li>
                        <li><i class="fa fa-th-list"></i>Manage Faculty</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <b>Manage Faculty</b>
                        </header>
                        <div class="panel-body table table-responsive ">
                            <table class="table table-striped table-advance  table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <th> Faculty Name</th>
                                    <th> Faculty Email</th>
                                    <th> Faculty Position</th>
                                    <th> Faculty Employee Type</th>
                                    <th> Faculty Degree</th>

                                    <th> Faculty Status</th>
                                    <th> Faculty Inserted By</th>
                                    <th> Last Modified By</th>
                                    <th> Last Modified Date(d-m-Y)</th>
                                    <th> Action</th>
                                </tr>


                                <?php foreach ($faculty as $faculty){?>
                                    <tr>
                                        <td>
                                            <?php echo $faculty->facultyFirstName?>&nbsp<?php echo $faculty->facultyLastName?>
                                        </td>

                                        <td>
                                            <?php echo $faculty->facultyEmail?>
                                        </td>

                                        <td>
                                            <?php
                                            echo str_replace(",","<br>",$faculty->facultyPosition);

                                            ?>

                                        </td>

                                        <td>
                                            <?php echo $faculty->facultyEmpType?>
                                        </td>

                                        <td>
                                            <?php
                                            echo str_replace(",","<br>",$faculty->facultyDegree);
                                            ?>

                                        </td>

                                        <td>
                                            <?php echo $faculty->facultyStatus?>
                                        </td>

                                        <td>
                                            <?php echo $faculty->insertedBy?>

                                        </td>

                                        <td>
                                            <?php if ($faculty->lastModifiedBy==""){echo"Never Modified";}else{echo $faculty->lastModifiedBy;} ?>
                                        </td>

                                        <td>
                                            <?php if ($faculty->lastModifiedDate==""){echo"Never Modified";}
                                            else
                                                {

                                                echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($faculty->lastModifiedDate)),1);
                                                }?>

                                        </td>

                                        <td>

                                            <div class="btn-group">
                                                <a class="btn" href="<?php echo base_url("Admin/Faculty/editFacultyView/")?><?php echo $faculty->facultyId ?>"><i class="icon_pencil-edit"></i></a>
                                                <a class="btn" data-panel-id="<?php echo $faculty->facultyId ?>"  onclick="selectid(this)" href="#"><i class="icon_trash"></i></a>
                                            </div>
                                        </td>

                                    </tr>
                                <?php } ?>



                                </tbody>
                            </table>
                        </div>
                        <div id="edit"></div>
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
        if (confirm("Are you sure you want to delete this Faculty? All of his Course will be deleted too")) {
            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/Faculty/deleteFaculty/")?>'+btn,
                data:{},
                cache: false,
                success:function(data) {
                    alert("Faculty Deleted Successfully!!");
                    location.reload();

                }
            });
        }
        else {
            location.reload();
        }
    }
</script>