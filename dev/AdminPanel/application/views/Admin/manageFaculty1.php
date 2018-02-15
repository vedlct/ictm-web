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
                    <h3 class="page-header"><i class="fa fa-table"></i> Manage Faculty</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="fa fa-table"></i>Manage Faculty</li>

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
                            Manage Faculty

                        </header>
                        <div id="panel" class="panel-body">



                            <div class="table table-responsive" style="overflow-x: inherit">
                                <table class="table  table-striped table-advance  table-bordered table-hover" id="myTable">
                                    <thead>
                                    <tr>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left;width: 3%"> No</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left;width: 4% "> Title</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left"> First Name</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left"> Last Name</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left"> Email</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left;width: 8%"> Employee Type</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left"> Position</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left;width: 7%"> Status</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left">Inserted By </th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left"> Last Modified By</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left;width: 8%"> Last Modified Date (d-m-Y)</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left;width: 8%"> Action</th>
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
                "url": "<?php echo base_url('Admin/Faculty/ajax_list')?>",
                "type": "POST"
            },
            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [0,1,4,5,6,7,8,9,10,11], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],
            //for change search name
            "oLanguage": {
                "sSearch": "<span>Search By Faculty Name:</span> " //search

            },
            "dom": '<"top"ifl>rt<"bottom"ip><"clear">',


        });
        $(".dataTables_filter input").attr("placeholder", "Faculty Name");

    });
    function selectid(x) {
        if (confirm("Are you sure you want to delete this Faculty? All of his Course will be deleted too")) {
            btn = $(x).data('panel-id');
            //alert(btn);
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/Faculty/deleteFaculty/")?>'+btn,
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
