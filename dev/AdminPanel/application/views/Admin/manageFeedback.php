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
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="fa fa-table"></i>Feedback</li>
                        <li><i class="fa fa-th-list"></i><a href="<?php echo base_url()?>Admin/Feedback/manageFeedback">Manage Feedback</a></li>
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
                            <div class="table table-responsive">
                            <table class="table  table-advance  table-bordered table-hover" id="myTable">
                                <tbody>

                                <tr align="center" bgcolor="#D3D3D3">
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left" onclick="sortTable(0)">Name</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left" onclick="sortTable(1)">Profession </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left" onclick="sortTable(2)">Source </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left">Status </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left">Approve </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left">ApprovedBy </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left">ApprovedDate(d-m-Y)</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left">Inserted By </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Last Modified By </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left; width: 15%"> Last Modified Date(d-m-Y) </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Appear In Home</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 10%"> Action </th>
                                </tr>


                                <?php if (!empty($feedback)){
                                    foreach ($feedback as $feedback){?>
                                        <tr align="left">
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
                                                <?php if($feedback->feedbackApprovedDate==""){echo"Pending !!";}
                                                else{
                                                    echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($feedback->feedbackApprovedDate)),1);
                                                }?>

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
                                            <td>
                                                <?php if ($feedback->feedbackApprove == SELECT_APPROVE[0]){?>
                                                    <input type="checkbox" data-panel-id="<?php echo $feedback->feedbackId ?>" onclick="selectHome(this)" <?php if ($feedback->homeStatus == SELECT_APPROVE[0])echo 'checked="checked"';?>
                                                           id="appearInHome" name="appearInHome">Yes
                                                <?php }else{ echo "Need Approval First !!";}?>

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

    $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });

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
    function selectHome(x) {
        if (confirm("Are you sure ?")) {
            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/Feedback/appearInHomePage/")?>'+btn,
                data:{},
                cache: false,
                success:function(data) {
                    if (data=='1'){
                        alert('Feedback Added Successfully To Home Page');
                    }
                    else if(data=='0'){
                        alert('Feedback Removed Successfully From Home Page');
                    }

                }
            });
        }
        else {
            location.reload();
        }
    }
</script>