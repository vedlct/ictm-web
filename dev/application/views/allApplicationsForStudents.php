
<?php include("header.php"); ?>

<div class="page-title full-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h2 class="title">Application Form</h2>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li class="home"><a href="<?php echo base_url()?>Home">Home </a></li>
                        <li>\ Application Form</li>
                    </ul>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /page-title -->

<?php if ($this->session->flashdata('errorMessage')!=null){?>
    <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
<?php }
elseif($this->session->flashdata('successMessage')!=null){?>
    <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
<?php }?>

<section class="flat-row padding-small-v1">
    <div class="container">
        <div class="row">
            <div class="col-md-9">




                <div class="form-top">
                    <div class="form-top-left">
                        <h3>Application Details</h3>
                    </div>

                    <div class="form-top-right">
                        <p>Step 1 / 9</p>
                    </div>
                </div>


                <table class="table  table-bordered">
                    <tr>
                        <th>Applicant's Name</th>
                        <th>Applicant's Email</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                    <?php foreach ($applications as $application){?>
                        <tr>

                            <td><?php echo $application->title.' '.$application->firstName.' '.$application->surName ?></td>
                            <td><?php echo $application->email ?></td>
                            <td><?php if ($application->isSubmited=='0'){echo "Not Submitted";}elseif($application->isSubmited=='1'){echo "Submitted";}elseif($application->isSubmited=='2'){echo "Cancelled";} ?></td>

                            <td>
                                <?php if ($application->isSubmited=='0'){?>
                                    <a class="btn" href="<?php echo base_url()?>ApplyOnline/editApplyFromStudents/<?php echo $application->id ?>"><i class="fa fa-edit"></i></a>
                                <?php } elseif($application->isSubmited=='1'){?>

                                    <a class="btn" target="_blank" href="<?php echo base_url()?>ApplyOnline/showApplicationPdf/<?php echo $application->id ?>"><i class="fa fa-file-pdf-o"></i></a>
                                    <a class="btn" href="<?php echo base_url()?>ApplyOnline/cancelApplication/<?php echo $application->id ?>"><i class="fa fa-times-circle-o"></i></a>
                                <?php } elseif($application->isSubmited=='2') {}?>

                            </td>
                        </tr>
                    <?php } ?>
                </table>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-md-10">
                        <a href="<?php echo base_url()?>ApplyOnline/newApplyFromStudents" ><button type="button" class="btn btn-previous">New Application</button></a>
                    </div>
                </div>





            </div><!-- /col-md-9 -->

            <div class="col-md-3">
                <div class="sidebar">

                    <div class="widget widget-courses">
                        <h2 class="widget-title">COURSES LIST</h2>
                        <?php include("course-sidebar.php"); ?>
                    </div><!-- /widget-posts -->



                </div><!-- sidebar -->
            </div><!-- /col-md-3 -->
        </div>
    </div>
</section>

<?php include("footer.php"); ?>


</div>
</body>

</html>

<!-- for Application form -->
<script src="<?php echo base_url()?>public/javascript/jquery.backstretch.min.js"></script>
<script src="<?php echo base_url()?>public/javascript/scripts.js"></script>

