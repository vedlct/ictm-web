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
    <?php include ('topNavigation.php') ?>
    <!--header end-->

    <!--sidebar start-->
    <?php include('leftNavigation.php') ?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-table"></i> Register&nbsp;&nbsp;Interest</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="fa fa-table"></i>Manage RegisterInterest</li>

                    </ol>
                </div>
            </div>
            <!-- page start-->

            <?php if ($this->session->flashdata('successMessage')!=null){?>
                <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
            <?php }?>

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Manage RegisterInterest

                        </header>
                        <div id="panel" class="panel-body">

                                <div class="form-group col-md-6">
                                    <label for="title">Search By First Name</label>
                                    <input type="text" class="form-control col-md-6" id="title" name="title">
                                </div>
                                <div class="form-group col-md-6">
                                    <button style="margin-top: 23px" type="submit" onclick="searchByFirstName()" class="btn btn-default">Submit</button>
                                </div>


                            <div class="table table-responsive">

                                <table class="table table-striped table-advance  table-bordered table-hover" id="myTable">
                                    <tbody>
                                    <tr>

                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left"width="5%" > Title</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left" onclick="sortTable(0)" > <span id="down"><i class="fa fa-sort-desc"></i> </span><span id="up" style="display: none"><i class="fa fa-sort-asc"></i> </span> First Name</th>

                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left" onclick="sortTable(1)"> Last Name</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left"; width="10%"> Phone</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left"; width="15%"> Appoinmet Date</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left"; width="15%"> Course</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left"; width="15%"> Email</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left" ; width="15%" onclick="sortTable(2)"> Apply Date</th>


                                        <th style="background-color: #394A59; color: whitesmoke; text-align: center"; width="10%"> Action</th>
                                    </tr>


                                    <?php if (!empty($RiData)){
                                        foreach ($RiData as $pd){?>

                                            <tr align="left">
                                                <td><?php echo $pd->title?></td>

                                                <td><?php echo $pd->firstName?></td>
                                                <td><?php echo $pd->surName?></td>
                                                <td><?php echo $pd->mobile?></td>

                                                <td><?php echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($pd->appointmentDate)),1); ?></td>
                                                <td><?php echo $pd->course?></td>

                                                <td><?php echo $pd->email?></td>
                                                <td><?php echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($pd->inserDate)),1); ?>
                                                </td>

                                                <td>
                                                    <div class="btn-group">

                                                        <a class="btn" href="<?php echo base_url()?>Admin/RegisterInterest/viewSelectedRI/<?php echo $pd->registerInterestId?>"><i class="icon_pencil-edit"></i></a>
                                                        <a class="btn " data-panel-id="<?php echo $pd->registerInterestId ?>"  onclick='return confirm("Are you sure to Delete This RegisterInterest?")' href="<?php echo base_url()?>Admin/RegisterInterest/deleteRegisterInterest/<?php echo $pd->registerInterestId?>"><i class="icon_trash"></i></a>

                                                    </div>
                                                </td>
                                            </tr>

                                        <?php }
                                    }?>
                                    </tbody>
                                </table>
                            </div>

                            <div id="pagi" class="pagination2" align="center">
                                <a href="#"><?php echo $links?></a>
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
<!-- javascripts -->

<?php include('js.php') ?>

</body>
</html>
<script>

    function searchByFirstName() {

            btn = document.getElementById('title').value;
            //alert(btn);

            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/RegisterInterest/searchByName")?>',
                data:{'name':btn},
                cache: false,
                success:function(data) {

                    $('#myTable').html(data);
                    document.getElementById("pagi").style.display="none";
                    //alert(data);
                }
            });

    }
var flag=true;

</script>

