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
                    <h3 class="page-header"><i class="fa fa-table"></i> Feedback</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li><i class="fa fa-table"></i>Feedback</li>
                        <li><i class="fa fa-th-list"></i>Manage Feedback</li>
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
                            <b>Manage Feedback</b>
                            <span align="">
                                <a href="<?php echo base_url()?>Admin/Feedback/newFeedback"><button class="btn btn-sm"style="float: right; height: 26px; margin-top: 3px; background-color: #00A8FF;color: whitesmoke;"><b>New Feedback</b></button></a>
                            </span>
                        </header>
                        <div class="panel-body ">
                            <table class="table  table-advance  table-bordered table-hover">
                                <tbody>

                                <tr align="center" bgcolor="#D3D3D3">
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center">Name</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center">Profession </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center">Source </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center">Status </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center">Approve </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center">ApprovedBy </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center">ApprovedDate(d-m-Y)</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center">Inserted By </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Last Modified By </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center; width: 15%"> Last Modified Date(d-m-Y) </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center;width: 10%"> Action </th>
                                </tr>


                                <?php if (!empty($feedback)){
                                    foreach ($feedback as $feedback){?>
                                        <tr align="center">
                                            <td>
                                                <?php echo $feedback->feedbackByName?>
                                            </td>

                                            <td >
                                                <?php echo $feedback->feedbackByProfession?>
                                            </td>

                                            <td >
                                                <?php echo $feedback->feedbackSource ?>

                                            </td>

                                            <td >
                                                <?php echo $feedback->feedbackStatus?>
                                            </td>

                                            <td >
                                                <?php echo $feedback->feedbackApprove ?>

                                            </td>

                                            <td >
                                                <?php echo $feedback->feedbackApprovedBy?>
                                            </td>

                                            <td >
                                                <?php echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($feedback->feedbackApprovedDate)),1)?>

                                            </td>

                                            <td >
                                                <?php echo $feedback->insertedBy?>

                                            </td>

                                            <td >
                                                <?php if ($feedback->lastModifiedBy==""){echo"Never Modified";}else{echo $feedback->lastModifiedBy;} ?>
                                            </td>

                                            <td >
                                                <?php if ($feedback->lastModifiedDate==""){echo"Never Modified";}
                                                else
                                                {

                                                    echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($feedback->lastModifiedDate)),1);
                                                }?>

                                            </td>

                                            <td >

                                                <div class="btn-group">
                                                    <a class="btn" href="<?php echo base_url("Admin/Feedback/editFeedbackView/")?><?php echo $feedback->feedbackId ?>"><i class="icon_pencil-edit"></i></a>
                                                    <a class="btn" data-panel-id="<?php echo $feedback->feedbackId ?>"  onclick="selectid(this)"><i class="icon_trash"></i></a>
                                                </div>
                                            </td>

                                        </tr>
                                    <?php }
                                } ?>



                                </tbody>
                            </table>
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
        if (confirm("Are you sure you want to delete this Feedback?")) {
            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/Feedback/deleteFeedback/")?>'+btn,
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
</script>