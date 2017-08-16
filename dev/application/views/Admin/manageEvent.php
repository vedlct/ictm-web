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
                    <h3 class="page-header"><i class="fa fa-table"></i> Manage &nbsp Event</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li><i class="fa fa-table"></i>Event</li>
                        <li><i class="fa fa-th-list"></i>Manage Event</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <b>Manage Event</b>
                        </header>
                        <div class="panel-body table table-responsive ">
                            <table class="table table-striped table-advance  table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <th> Event Title</th>
                                    <th> Event Start</th>
                                    <th> Event End</th>
                                    <th> Event Location</th>
                                    <th> Event Type</th>

                                    <th> Event Status</th>
                                    <th> Event Inserted By</th>
                                    <th> Last Modified By</th>
                                    <th> Last Modified Date</th>
                                    <th> Action</th>
                                </tr>

                                <?php foreach ($events as $events){?>

                                    <tr>
                                        <td>
                                            <?php echo $events->eventTitle?>
                                        </td>

                                        <td>
                                            <?php

                                            echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($events->eventStartDate)),1);
                                            ?>

                                        </td>

                                        <td>
                                            <?php
                                            echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($events->eventEndDate)),1);
                                            ?>


                                        </td>

                                        <td>
                                            <?php echo $events->eventLocation?>
                                        </td>

                                        <td>
                                            <?php echo $events->eventType?>

                                        </td>

                                        <td>
                                            <?php echo $events->eventStatus?>
                                        </td>

                                        <td>
                                            <?php echo $events->insertedBy?>

                                        </td>

                                        <td>
                                            <?php if ($events->lastModifiedBy==""){echo"Never Modified";}else{echo $events->lastModifiedBy;} ?>
                                        </td>

                                        <td>
                                            <?php if ($events->lastModifiedDate==""){echo"Never Modified";}
                                            else
                                            {
                                                $timestamp = strtotime($events->lastModifiedDate);
                                                $date = date('d-F-Y', $timestamp);
                                                echo $date ;
                                            }?>

                                        </td>

                                        <td>

                                            <div class="btn-group">
                                                <a class="btn" href="<?php echo base_url("Admin/Event/editEventView/")?><?php echo $events->eventId ?>"><i class="icon_pencil-edit"></i></a>
                                                <a class="btn" data-panel-id="<?php echo $events->eventId ?>"  onclick="selectid(this)" href="#"><i class="icon_trash"></i></a>
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
        if (confirm("Are you sure you want to delete this Event?")) {
            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/Event/deleteEvent/")?>'+btn,
                data:{},
                cache: false,
                success:function(data) {
                    alert("Event Deleted Successfully!!");
                    location.reload();

                }
            });
        }
        else {
            location.reload();
        }
    }
</script>