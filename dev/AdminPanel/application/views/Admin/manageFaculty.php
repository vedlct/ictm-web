<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>
</head>
<style>
    .pagination2 {
        letter-spacing: 15px;
    }
</style>
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
                    <h3 class="page-header"><i class="fa fa-table"></i> Faculty</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li><i class="fa fa-table"></i>Faculty</li>
                        <li><i class="fa fa-th-list"></i>Manage Faculty</li>
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
                            <b>Manage Faculty</b>
                            <span align="">
                                <a href="<?php echo base_url()?>Admin/Faculty/newFaculty"><button class="btn btn-sm"style="float: right; height: 26px; margin-top: 3px; background-color: #00A8FF;color: whitesmoke;"><b>New Faculty</b></button></a>
                            </span>
                        </header>
                        <div class="panel-body ">
                            <div class="table table-responsive">
                                <form method="post" action="<?php echo base_url()?>Admin/Faculty/manageFacultySearchByTitle">
                                    <div class="form-group col-md-6">
                                        <label for="email">Search By Title</label>
                                        <input type="text" class="form-control col-md-6" id="title" name="title">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <button style="margin-top: 23px" type="submit" class="btn btn-default">Submit</button>
                                    </div>

                                </form>
                            <table class="table  table-advance  table-bordered table-hover" id="myTable">
                                <tbody>

                                <tr align="center" bgcolor="#D3D3D3">
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left" onclick="sortTable(0)" > <span id="down"><i class="fa fa-sort-desc"></i> </span><span id="up" style="display: none"><i class="fa fa-sort-asc"></i> </span>Name</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left" onclick="sortTable(1)">Email </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left">Position </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left" onclick="sortTable(2)"<span id="down"><i class="fa fa-sort-desc"></i> </span><span id="up" style="display: none"><i class="fa fa-sort-asc"></i> </span>Employee Type </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left">Degree </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left">Status </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left">Inserted By </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Last Modified By </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left; width: 15%"> Last Modified Date(d-m-Y) </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 10%"> Action </th>
                                </tr>


                                <?php if (!empty($faculty)){
                                    foreach ($faculty as $faculty){?>
                                        <tr align="left">
                                            <td>
                                                <?php echo $faculty->facultyTitle?>&nbsp<?php echo $faculty->facultyFirstName?>&nbsp<?php echo $faculty->facultyLastName?>
                                            </td>

                                            <td >
                                                <?php echo $faculty->facultyEmail?>
                                            </td>

                                            <td >
                                                <?php
                                                echo str_replace(",","<br>",$faculty->facultyPosition);

                                                ?>

                                            </td>

                                            <td >
                                                <?php echo $faculty->facultyEmpType?>
                                            </td>

                                            <td >
                                                <?php
                                                echo str_replace(",","<br>",$faculty->facultyDegree);
                                                ?>

                                            </td>

                                            <td >
                                                <?php echo $faculty->facultyStatus?>
                                            </td>

                                            <td >
                                                <?php echo $faculty->insertedBy?>

                                            </td>

                                            <td >
                                                <?php if ($faculty->lastModifiedBy==""){echo"Never Modified";}else{echo $faculty->lastModifiedBy;} ?>
                                            </td>

                                            <td >
                                                <?php if ($faculty->lastModifiedDate==""){echo"Never Modified";}
                                                else
                                                {

                                                    echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($faculty->lastModifiedDate)),1);
                                                }?>

                                            </td>

                                            <td >

                                                <div class="btn-group">
                                                    <a class="btn" href="<?php echo base_url("Admin/Faculty/editFacultyView/")?><?php echo $faculty->facultyId ?>"><i class="icon_pencil-edit"></i></a>
                                                    <a class="btn" data-panel-id="<?php echo $faculty->facultyId ?>"  onclick="selectid(this)"><i class="icon_trash"></i></a>
                                                </div>
                                            </td>

                                        </tr>
                                    <?php }
                                } ?>



                                </tbody>
                            </table>
                            </div>
                            <div class="pagination2" align="center">
                                <a href="#"><?php echo $links?></a>
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
        if (confirm("Are you sure you want to delete this Faculty? All of his Course will be deleted too")) {
            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/Faculty/deleteFaculty/")?>'+btn,
                data:{},
                cache: false,
                success:function(data) {

                    location.reload();

                }
            });
        }
        else {
            location.reload();
        }
    }

    var flag=true;

</script>