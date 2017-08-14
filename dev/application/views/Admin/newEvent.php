<!DOCTYPE html>
<html lang="en">
<head>
    <!-- view head ----->
    <?php include('head.php') ?>
    <!-- view head  end----->
    <link href="<?php echo base_url()?>public/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
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
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li><i class="icon_document_alt"></i>Event</li>
                        <li><i class="fa fa-files-o"></i>Create a new Event</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            New Event
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" id="CreateNewEvent" method="POST" action="<?php echo base_url() ?>Admin/Event/createNewEvent" enctype="multipart/form-data">
                                    <div class="form-group ">
                                        <label for="eventTitle" class="control-label col-lg-2">Event Title <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('eventTitle'); ?></font></p>
                                            <input class="form-control" id="eventTitle" name="eventTitle"  type="text" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="eventStartDateTime">Event Start Date Time<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('eventStartDateTime'); ?></font></p>
                                            <div class="input-group date form_datetime " data-date="<?php date("Y-m-d H:i:s") ?>" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                                <input class="form-control" id="eventStartDateTime" size="16" type="text"  readonly >
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                            </div>
                                            <input type="hidden" id="dtp_input1" /><br/>
                                        </div>

                                        <label class="control-label col-lg-2" for="eventEndDateTime">Event End Date Time<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('eventEndDateTime'); ?></font></p>
                                            <div class="input-group date form_datetime " data-date="<?php date("Y-m-d H:i:s") ?>" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input2">
                                                <input class="form-control" id="eventEndDateTime" size="16" type="text" readonly >
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                            </div>
                                            <input type="hidden" id="dtp_input2" /><br/>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="menuId">Event Location<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('eventLocation'); ?></font></p>
                                            <input class="form-control" id="eventLocation" name="eventLocation"  type="text" required />

                                            </select>


                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="event_image">Event Photo</label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('event_image'); ?></font></p>
                                            <input class="form-control" type="file" name="event_image" id="event_image"/>
                                        </div>

                                        <label class="control-label col-lg-2" for="EventType">Event Type<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('EventType'); ?></font></p>
                                            <input class="form-control" type="text" name="EventType" id="EventType" required/>
                                        </div>



                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="eventStatus">Event Status<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('eventStatus'); ?></font></p>
                                            <select class="form-control m-bot15" name="eventStatus" id="eventStatus" required>
                                                <option value="" selected><?php echo SelectStatus?></option>
                                                <option value="<?php echo Active?>"><?php echo Active?></option>
                                                <option value="<?php echo InActive?>"><?php echo InActive?></option>
                                            </select>


                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="eventContent" class="control-label col-lg-2">Event Content<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control ckeditor" name="eventContent" id="eventContent" required></textarea>
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
<script>
    function selectid(x) {
        var btn =  document.getElementById("menuType").value;
        //alert(btn);
        if (btn == "Select Menu Type"){
            alert("Select a valid Menu Type");
        }
        else
        {
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/Menu/getMenuLevel/")?>'+btn,
                data:{'type': btn},
                cache: false,
                success:function(data) {
                    document.getElementById("menuId").innerHTML = data;
                    //alert(data);
                }
            });
        }
    }
    function submitform() {
        var title=document.getElementById("menuTitle").value;
        var menuType=document.getElementById("menuType").value;
        var menuStatus=document.getElementById("menuStatus").value;
        if (title == null){
            alert("Please Insert a Title for Menu");
            return false;
        }
        if (menuType =="Select Menu Type"){
            alert("Please Select Menu Type");
            return false;
        }
        if (menuStatus =="Select Status"){
            alert("Please Select Menu Status");
            return false;
        }
    }
</script>

<script type="text/javascript" src="<?php echo base_url()?>public/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/js/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>

<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });
</script>