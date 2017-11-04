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
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-files-o"></i> Regisrter &nbsp Interest</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="icon_document_alt"></i><a href="<?php echo base_url()?>Admin/RegisterInterest/viewRI">RegisrterInterest</a></li>

                    </ol>
                </div>
            </div>

            <!-- Form validations -->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Regisrter Interest
                            <span align="">
                                 <a href="<?php echo base_url()?>Admin/RegisterInterest/viewRI"> <button class="btn btn-sm" style="float: right; height: 26px; margin-top: 4px; background-color: #00A8FF;color: whitesmoke; ">Manage RegisrterInterest</button> </a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <?php foreach ($allDataForRI as $RI){?>
                            <div class="form form-horizontal">

                                    <div class="form-group">
                                        <label for="cname" class="control-label col-lg-2">Name :</label>
                                        <div class="col-lg-4">
                                            <?php echo $RI->title?> &nbsp <?php echo $RI->firstName." ". $RI->surName ?>
                                        </div>

                                        <label for="cname" class="control-label col-lg-2">Email :</label>
                                        <div class="col-lg-4">
                                            <?php echo $RI->email?>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="control-label col-lg-2">Phone :</label>
                                        <div class="col-lg-4">
                                            <?php echo $RI->mobile?>
                                        </div>

                                        <label for="phone" class="control-label col-lg-2">Appoinment Date(d-m-Y):</label>
                                        <div class="col-lg-4">
                                            <?php echo  preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($RI->appointmentDate)),1);?>
                                        </div>

                                    </div>

                                     <div class="form-group">
                                         <label for="phone" class="control-label col-lg-2">House :</label>
                                         <div class="col-lg-4">
                                            <?php echo $RI->House?>
                                         </div>
                                        <label for="phone" class="control-label col-lg-2">Street :</label>
                                        <div class="col-lg-4">
                                            <?php echo $RI->street?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone" class="control-label col-lg-2">Postal Code :</label>
                                        <div class="col-lg-4">
                                            <?php echo $RI->postalCode?>
                                        </div>
                                        <label for="phone" class="control-label col-lg-2">Country :</label>
                                        <div class="col-lg-4">
                                            <?php echo $RI->country?>
                                        </div>
                                    </div>


                                    <div id="keywords" class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Course :</label>
                                        <div class="col-lg-4">
                                            <?php echo $RI->course?>
                                        </div>
                                        <label for="cname" class="control-label col-lg-2">Hear About Us :</label>
                                        <div class="col-lg-4">
                                            <?php echo $RI->hearAboutUs?>
                                        </div>
                                    </div>

                                    <div id="keywords" class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">other :</label>
                                        <div class="col-lg-4">
                                            <?php echo $RI->other?>
                                        </div>
                                        <label for="cname" class="control-label col-lg-2">Disability :</label>
                                        <div class="col-lg-4">
                                            <?php echo $RI->disabilityRequire?>
                                        </div>
                                    </div>
                                    <div id="keywords" class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Comments :</label>
                                        <div class="col-lg-10">
                                            <?php echo $RI->comments?>
                                        </div>

                                    </div>

                                <div id="keywords" class="form-group ">

                                    <label for="cname" class="control-label col-lg-2">apply date</label>
                                    <div class="col-lg-4">
                                        <?php echo $RI->inserDate?>
                                    </div>
                                </div>

                            </div>
                            <?php } ?>


                        </div>
                </div>
        </section>
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



