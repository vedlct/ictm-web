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
                    <h3 class="page-header"><i class="fa fa-table"></i> Manage &nbsp Department</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="fa fa-table"></i>Departments</li>
                        <li><i class="fa fa-th-list"></i>Manage Department</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <b>Manage Department</b>
                        </header>
                        <div class="panel-body table  ">
                            <table class="table table-striped table-advance  table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <th> Department Name</th>
                                    <th> Department Head</th>
                                    <th> Department Status</th>
                                    <th> Department Inserted By</th>
                                    <th> Last Modified By</th>
                                    <th> Last Modified Date(d-m-Y)</th>
                                    <th> Action</th>
                                </tr>


                                <?php foreach ($departments as $departments){?>
                                    <tr>
                                        <td>
                                            <?php echo $departments->departmentName?>
                                        </td>

                                        <td>
                                            <?php echo $departments->departmentHead?>

                                        </td>

                                        <td>
                                            <?php echo $departments->departmentStatus?>

                                        </td>

                                        <td>
                                            <?php echo $departments->insertedBy?>
                                        </td>

                                        <td>
                                            <?php if ($departments->lastModifiedBy==""){echo"Never Modified";}else{echo $departments->lastModifiedBy;} ?>

                                        </td>

                                        <td>

                                            <?php if ($departments->lastModifiedDate==""){echo NEVER_MODIFIED;}
                                            else
                                            {
                                                echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($departments->lastModifiedDate)),1);

                                            }
                                            ?>

                                        </td>


                                        <td>

                                            <div class="btn-group">
                                                <a class="btn" href="<?php echo base_url("Admin/Department/editDepartmentView/")?><?php echo $departments->departmentId?>"><i class="icon_pencil-edit"></i></a>
                                                <a class="btn" data-panel-id="<?php echo $departments->departmentId?>"  onclick="selectid(this)" href="#"><i class="icon_trash"></i></a>
                                            </div>
                                        </td>

                                    </tr>
                                <?php }?>



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
        if (confirm("Are you sure you want to delete this Department?")) {
            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/Department/deleteDepartment/")?>'+btn,
                data:{'departmentId':btn},
                cache: false,
                success:function(data) {

                    if(data=='0'){alert("Department Deleted Successfully!!");
                        location.reload();
                    }
                    else
                    {
                        alert('Please Delete Course- ( '+data+' )First !!');

                    }
                }
            });
        }
        else {
            window.location="<?php echo base_url()?>Admin/Menu/ManageMenu";
        }
    }
</script>