<!DOCTYPE html>
<html lang="en">
<head>
    <!-- view head ----->
    <?php include('head.php') ?>
    <!-- view head  end----->
    <link href="<?php echo base_url()?>public/css/bootstrap-datetimepicker.css" rel="stylesheet" media="screen">
    <!--    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet" media="screen">-->
</head>

<body>
<!-- container section start -->
<section id="container" class="">
    <!--top Navigation start-->
    <?php include ('topNavigation.php')?>
    <!--top Navigation end-->
    <!--sidebar start-->
    <?php include('leftNavigation.php') ?>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-files-o"></i> Edit &nbsp Event</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li><i class="icon_document_alt"></i>Events</li>
                        <li><i class="fa fa-files-o"></i>Edit Event</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Event
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <?php foreach ($editEvent as $editEvent){?>
                                <form class="form-validate form-horizontal" id="CreateNewEvent" method="POST" action="<?php echo base_url() ?>Admin/Event/editEventbyId/<?php echo $editEvent->eventId?>" enctype="multipart/form-data" onsubmit="return onsumit()">
                                    <div class="form-group ">
                                        <label for="eventTitle" class="control-label col-lg-2">Event Title <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('eventTitle'); ?></font></p>
                                            <input class="form-control" id="eventTitle" name="eventTitle"  type="text" value="<?php echo $editEvent->eventTitle?>" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="eventStartDateTime">Event Start Date Time<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('eventStartDateTime'); ?></font></p>
                                            <div class='input-group date datetimepicker' id='datetimepicker1'>
                                                <input type='text'name="eventStartDateTime" value="<?php echo date('d-m-Y H:i A',strtotime($editEvent->eventStartDate))?>" class="form-control"/>
                                                <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>

                                        <label class="control-label col-lg-2" for="eventEndDateTime">Event End Date Time<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('eventEndDateTime'); ?></font></p>
                                            <div class='input-group date datetimepicker' id='datetimepicker2'>
                                                <input type='text' name="eventEndDateTime" value="<?php echo date('d-m-Y T H:i A',strtotime($editEvent->eventEndDate))?>" class="form-control"/>
                                                <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="menuId">Event Location<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('eventLocation'); ?></font></p>
                                            <input class="form-control" id="eventLocation" name="eventLocation"  type="text" value="<?php echo $editEvent->eventLocation ?>" required />

                                            </select>


                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="event_image">Event Photo</label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('event_image'); ?></font></p>
                                            <input class="form-control" type="file" name="event_image" id="event_image"/>
                                            <span><?php echo $editEvent->eventPhotoPath?></span>
                                        </div>

                                        <label class="control-label col-lg-2" for="EventType">Event Type<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('EventType'); ?></font></p>
<!--                                            <input class="form-control" type="text" name="EventType" id="EventType" value="--><?php //echo $editEvent->eventType ?><!--" required/>-->
                                            <select class="form-control m-bot15" name="EventType" id="EventType" required>
                                                <option value="" selected><?php echo SelectType?></option>
                                                <?php for($i=0;$i<count(EventType);$i++){?>
                                                    <option value="<?php echo EventType[$i]?>" <?php if (!empty($editEvent->eventType) && $editEvent->eventType ==  EventType[$i])  echo 'selected = "selected"'; ?>><?php echo EventType[$i]?></option>
                                                <?php } ?>

                                            </select>
                                        </div>



                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="eventStatus">Event Status<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('eventStatus'); ?></font></p>
                                            <select class="form-control m-bot15" name="eventStatus" id="eventStatus" required>
                                                <option value="" selected><?php echo SelectStatus?></option>
<!--                                                <option value="--><?php //echo Active?><!--">--><?php //echo Active?><!--</option>-->
<!--                                                <option value="--><?php //echo InActive?><!--">--><?php //echo InActive?><!--</option>-->
                                                <option value="<?php echo Active ?>" <?php if (!empty($editEvent->eventStatus) && $editEvent->eventStatus == Active)  echo 'selected = "selected"'; ?>><?php echo Active?></option>
                                                <option value="<?php echo InActive ?>" <?php if (!empty($editEvent->eventStatus) && $editEvent->eventStatus == InActive)  echo 'selected = "selected"'; ?>><?php echo InActive?></option>

                                            </select>


                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="eventContent" class="control-label col-lg-2">Event Content<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control ckeditor" name="eventContent" id="eventContent" required><?php echo $editEvent->eventContent ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group "align="center">
                                        <div class="col-lg-10">
                                            <input class="btn btn-success" type="submit" style="margin-left: 180px">
                                            <input class="btn btn-close" type="reset" >
                                        </div>
                                    </div>

                            </div>
                            </form>
                            <?php } ?>
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

<?php include ('js.php')?>
</body>
</html>
<script type="text/javascript" src="<?php echo base_url()?>public/ckeditor/ckeditor.js"></script>


<script type="text/javascript" src="<?php echo base_url()?>public/js/moment.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/js/datepicker.min.js"></script>

<script type="text/javascript">

    $(function () {

        $('.datetimepicker').datetimepicker({
            format: 'DD-MM-YYYY h:m A'
        });
        //$('#datetimepicker2').datetimepicker();
    });
</script>

<script type="text/javascript">
    function onsumit(){
        var messageLength = CKEDITOR.instances['eventContent'].getData().replace(/<[^>]*>/gi, '').length;
        if( !messageLength ) {
            alert( 'Please enter a Event Content' );
            return false;
        }

    }
</script>