<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>
    <!--    <link href="--><?php //echo base_url('public/css/bootstrap/css/bootstrap.min.css')?><!--" rel="stylesheet">-->
    <link href="<?php echo base_url('public/css/datatables/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">
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
                    <h3 class="page-header"><i class="fa fa-table"></i> Manage News</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="fa fa-table"></i>Manage News</li>

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
                            Manage News

                        </header>
                        <div id="panel" class="panel-body">



                            <div class="table table-responsive" style="overflow-x: inherit">


                                <table class="table  table-striped table-advance  table-bordered table-hover"   id="myTable">
                                    <thead>
                                    <tr>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left;"> No</th>

                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left; width: 15%"> News Title</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left"> News Date</th>

                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left" > News Type</th>

                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left"> Status</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left"> Inserted By</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left"> Last Modified By</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left"> Last Modified Date (Y-m-d T)</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left"> Appear In Home</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left"> Action</th>
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

<script src="<?php echo base_url('public/js/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('public/js/datatables/js/dataTables.bootstrap.min.js')?>"></script>

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
                "url": "<?php echo base_url('Admin/News/ajax_list')?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [ 0,3,4,5,6,7,8,9], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],


        });

    });

    function selectHome(x) {
        if (confirm("Are you sure ?")) {
            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/News/appearInHomePage/")?>'+btn,
                data:{},
                cache: false,
                success:function(data) {
                    if (data=='1'){
                        alert('News Added Successfully To Home Page');
                    }
                    else if(data=='0'){
                        alert('News Removed Successfully From Home Page');
                    }
                    else if(data=='3'){
                        alert('Allready 3 News in the Home Page');
                    }
                    location.reload();

                }
            });
        }
        else {
            location.reload();
        }
    }
</script>

