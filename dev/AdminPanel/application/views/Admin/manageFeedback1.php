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

                                <div align="center"  class="col-md-8 col-sm-8">
                                    <div style="position: absolute;left: 28%;top: 46px;width: 90%;" class="divcnter">
                                        <label style="text-align: right" for="menuType" class="control-label col-md-4 col-sm-4"> Filter by Source: </label>
                                        <div class="m-bot15 col-md-5 col-sm-5">
                                            <select class="form-control" name="feedbackSource" id="feedbackSource" required>
                                                <option value="" selected><?php echo "All Feedback Source"?></option>
                                                <?php for ($i=0;$i<count(FEEDBACK_SOURCE);$i++){?>
                                                    <option value="<?php echo FEEDBACK_SOURCE[$i]?>"><?php echo FEEDBACK_SOURCE[$i]?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <table class="table table-advance table-bordered table-hover" id="myTable">
                                    <thead>
                                    <tr align="center" bgcolor="#D3D3D3">
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 3%"> No.</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Name</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left" > Profession </th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Source </th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 5%">Status </th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 5%">Approve </th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left">ApprovedBy </th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 8%">Approved Date(d-m-Y)</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left">Inserted By </th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Last Modified By </th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 8%"> Last Modified Date(d-m-Y) </th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 8%"> Appear In Home</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 8%"> Action </th>
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
                "url": "<?php echo base_url('Admin/Feedback/ajax_list')?>",
                "type": "POST",
                "data": function ( data ) {
                    data.feedbackSource = $('#feedbackSource').val();

                }
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [0,4,5,6,7,8,9,10,11,12], //first column / numbering column
                    "orderable": false , //set not orderable
                },
            ],
            "oLanguage": {
                "sSearch": "<span>Search By Name:</span> " //search
            },
            "dom": '<"top"ifl>rt<"bottom"ip><"clear">'



        });

        $('#feedbackSource').change(function(){ //button filter event click
            table.search("").draw(); //just redraw myTableFilter
            table.ajax.reload();  //just reload table

        });
        $(".dataTables_filter input").attr("placeholder", "Search By Name");

    });



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
            //alert(btn);
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