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
                    <h3 class="page-header"><i class="fa fa-table"></i> Department</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="fa fa-table"></i>Departments</li>
                        <li><i class="fa fa-th-list"></i>Manage Department</li>
                    </ol>
                </div>
            </div>
            <!-- Department start-->

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
                            <b>Manage Department</b>
                            <span >
                                 <a href="<?php echo base_url()?>Admin/Department/newDepartment"> <button class="btn btn-sm" style="float: right; height: 26px; margin-top: 4px; background-color: #00A8FF;color: whitesmoke; ">New Department</button> </a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <div class="table table-responsive">
                            <table class="table table-advance  table-bordered table-hover" id="myTable">
                                <tbody>
                                <tr style="text-align: left" bgcolor="#D3D3D3">
                                    <th  style="background-color: #394A59; color: whitesmoke; text-align: left" onclick="sortTable(0)" > Department Name</th>
                                    <th  style="background-color: #394A59; color: whitesmoke; text-align: left" onclick="sortTable(1)"> Department Head</th>
                                    <th  style="background-color: #394A59; color: whitesmoke; text-align: left"> Status</th>
                                    <th  style="background-color: #394A59; color: whitesmoke; text-align: left"> Inserted By</th>
                                    <th   style="background-color: #394A59; color: whitesmoke; text-align: left">Last Modified By</th>
                                    <th  style="background-color: #394A59; color: whitesmoke; text-align: left"> Last Modified Date(d-m-Y)</th>
                                    <th   style="background-color: #394A59; color: whitesmoke; text-align: left"> Action</th>
                                </tr>


                                <?php if (!empty($departments)){
                                    foreach ($departments as $departments){?>
                                        <tr align="left">
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
                                                    <a class="btn" data-panel-id="<?php echo $departments->departmentId?>"  onclick="selectid(this)"><i class="icon_trash"></i></a>
                                                </div>
                                            </td>

                                        </tr>
                                    <?php }
                                }?>



                                </tbody>
                            </table>
                            </div>
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

                    if(data==0){

                        location.reload();
                    }
                    else
                    {
                        alert('This Department cannot be deleted as there are course(s) attached to it. please delete  all the related course first');

                    }
                }
            });
        }
    }
</script>