<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>
<!--    <link href="--><?php //echo base_url('public/css/bootstrap/css/bootstrap.min.css')?><!--" rel="stylesheet">-->

</head>

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

                            <div align="center"  class="col-md-8 col-sm-8">
                                <div style="position: absolute;left: 28%;top: 46px;width: 90%;" class="divcnter">
                                    <label style="text-align: right" for="menuType" class="control-label col-md-4 col-sm-4"> Filter by Course: </label>
                                    <div class="m-bot15 col-md-5 col-sm-5">
                                        <select class="form-control" name="interestedCourse" id="interestedCourse" required>
                                            <option value="" selected><?php echo "All Course"?></option>
                                            <?php foreach ($courses as $course){?>
                                                <option value="<?php echo $course->courseTitle ?>"><?php echo $course->courseTitle ?></option>
                                            <?php }?>

                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="table table-responsive" style="overflow-x: inherit">
                                    <table class="table  table-striped table-advance  table-bordered table-hover" id="myTable">
                                    <thead>
                                    <tr>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left"; width="3%" > No</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left"; width="4%" > Title</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left"> FirstName</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left"> LastName</th>

                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left";> Phone</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left"; width="10%"> Appoinmet Date (d-m-Y)</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left";> Course</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left"; > Email</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left"; width="10%"> Apply Date (d-m-Y)</th>

                                        <th style="background-color: #394A59; color: whitesmoke; text-align: center"; width="8%"> Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

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



<script type="text/javascript">

    var table;

    $(document).ready(function() {

        //datatables
        table = $('#myTable').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url('Admin/RegisterInterest1/ajax_list')?>",
                "type": "POST",
                "data": function ( data ) {
                    data.interestedCourse = $('#interestedCourse').val();

                }
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [ 0,1,4,6,7,9 ], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],
            "oLanguage": {
                "sSearch": "<span>Search By Name:</span> " //search
            },
            "dom": '<"top"ifl>rt<"bottom"ip><"clear">',


        });
        $('#interestedCourse').change(function(){ //button filter event click
            table.search("").draw(); //just redraw myTableFilter
            table.ajax.reload();  //just reload table

        });
        $(".dataTables_filter input").attr("placeholder", "Search By Name");

    });

</script>

