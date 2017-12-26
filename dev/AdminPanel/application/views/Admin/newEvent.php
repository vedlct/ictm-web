<!DOCTYPE html>
<html lang="en">
<head>
    <!-- view head ----->
    <?php include('head.php') ?>
    <!-- view head  end----->
    <link href="<?php echo base_url()?>public/css/bootstrap-datetimepicker.css" rel="stylesheet" media="screen">

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
                    <h3 class="page-header"><i class="fa fa-files-o"></i> New &nbsp Event</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="icon_document_alt"></i>Event</li>
                        <li><i class="fa fa-files-o"></i>Create a New Event</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->

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
                            New Event
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" id="CreateNewEvent" method="POST" action="<?php echo base_url() ?>Admin/Event/createNewEvent" enctype="multipart/form-data" onsubmit="return onsumit()">
                                    <div class="form-group ">
                                        <label for="eventTitle" class="control-label col-lg-2">Event Title <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('eventTitle'); ?></font></p>
                                            <input class="form-control" id="eventTitle" name="eventTitle"  value="<?php echo set_value('eventTitle'); ?>" type="text" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="eventStartDateTime">Start Date & Time<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('eventStartDateTime'); ?></font></p>
                                            <div class='input-group date datetimepicker' id='datetimepicker1'>
                                                <input type='text' id="eventStartDateTime" name="eventStartDateTime" value="<?php echo set_value('eventStartDateTime'); ?>" class="form-control" required/>
                                                <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>

                                        <label class="control-label col-lg-2" for="eventEndDateTime">End Date & Time<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('eventEndDateTime'); ?></font></p>
                                            <div class='input-group date datetimepicker' id='datetimepicker2'>
                                                <input type='text' id="eventEndDateTime" name="eventEndDateTime" value="<?php echo set_value('eventEndDateTime'); ?>" class="form-control" required/>
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
                                            <input class="form-control" id="eventLocation" name="eventLocation" value="<?php echo set_value('eventLocation'); ?>"  type="text" required />

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="event_image">Event Photo</label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('event_image'); ?></font></p>
                                            <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control" type="file" name="event_image" id="event_image"/>
                                        </div>

                                        <label class="control-label col-lg-2" for="EventType">Event Type<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('EventType'); ?></font></p>
                                            <select class="form-control m-bot15" name="EventType" id="EventType" required>
                                                <option value="" selected><?php echo SELECT_EVENT_TYPE?></option>
                                                <?php for($i=0;$i<count(EventType);$i++){?>
                                                    <option value="<?php echo EventType[$i]?>" <?php echo set_select('EventType',  EventType[$i], False); ?>><?php echo EventType[$i]?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="eventStatus">Status<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('eventStatus'); ?></font></p>
                                            <select class="form-control m-bot15" name="eventStatus" id="eventStatus" required>
                                                <option value="" selected><?php echo SELECT_STATUS ?></option>
                                                <?php for ($i=0;$i<count(STATUS);$i++){?>
                                                    <option <?php echo set_select('eventStatus',  STATUS[$i], False); ?>><?php echo STATUS[$i]?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="eventContent" class="control-label col-lg-2">Event Content<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control ckeditor" name="eventContent"id="eventContent"required><?php echo set_value('eventContent'); ?></textarea>
                                        </div>
                                    </div>

                                    <div id="csrf">
                                        <input type="hidden"  name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                    </div>

                                    <div class="form-group "align="center">
                                        <div class="col-lg-10">
                                            <input class="btn btn-success" type="submit" style="margin-left: 180px">
                                            <input class="btn btn-close" type="reset" >
                                        </div>
                                    </div>

                            </div>
                            </form>
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
            format: 'DD-MM-YYYY H:m'
        });

    });

</script>

<script type="text/javascript">
    function onsumit(){
        var length =  document.getElementById("eventTitle").value;
        if (length.length >255){
            alert("Event Title Should not more than 255 Charecter Length");
            return false;
        }
        var length2 =  document.getElementById("eventLocation").value;
        if (length2.length >1000){
            alert("Event Location Should not more than 1000 Charecter Length");
            return false;
        }
        var messageLength = CKEDITOR.instances['eventContent'].getData().replace(/<[^>]*>/gi, '').length;
        if( !messageLength ) {
            alert( 'Please enter a Event Content' );
            return false;
        }
//        var eventStartDateTime =  document.getElementById("eventStartDateTime").value;
//        var eventEndDateTime =   document.getElementById("eventEndDateTime").value;
//        alert(eventStartDateTime);
//        alert(eventStartDateTime);
//
//        if (eventStartDateTime > eventEndDateTime) {
//            alert ("Event End Date Can not be before Event Start Date!!");
//            return false;
//        }

    }
</script>

<script>
$('#eventStartDateTime').keydown(function(e) {
e.preventDefault();
return false;
});

$('#eventEndDateTime').keydown(function(e) {
    e.preventDefault();
    return false;
});
</script>