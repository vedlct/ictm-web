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
                    <h3 class="page-header"><i class="fa fa-table"></i>Album</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="fa fa-table"></i>Album</li>
                        <li><i class="fa fa-th-list"></i>Manage Album</li>
                    </ol>
                </div>
            </div>
            <!-- Menu start-->

            <?php if ($this->session->flashdata('errorMessage')!=null){?>
                <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
            <?php }
            elseif($this->session->flashdata('successMessage')!=null){?>
                <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
            <?php }?>

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading" >
                            <b>Manage Album</b>
                            <span align="">
                                 <a href="<?php echo base_url()?>Admin/Album/newAlbum"> <button class="btn btn-sm" style="float: right; height: 26px; margin-top: 4px; background-color: #00A8FF;color: whitesmoke; ">New Album</button> </a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <div class="table table-responsive" style="overflow-x: inherit">
                                <table class="table table-bordered table-hover table-striped table-advance" id="myTable">
                                    <thead>
                                    <tr>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 3%">No</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;">  Album Title</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Category Name</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 7%"> Album Status</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Inserted By</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Last Modified By</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 8%"> Last Modified Date (d-m-Y)</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 10%"> Appear In Home</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 8%">  Action</th>
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


<script>

    var table;

    $(document).ready(function() {

        //datatables
        table = $('#myTable').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url('Admin/Album/ajax_list')?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [0,2,3,4,5,6,7,8], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],
            //for change search name
            "oLanguage": {
                "sSearch": "<span>Search By Album Title:</span> " //search
            },
            "dom": '<"top"ifl>rt<"bottom"ip><"clear">'


        });

    });


    $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });
    function selectid(x) {
        if (confirm("Are you sure you want to delete this Album?")) {
            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/Album/deleteAlbum/")?>'+btn,
                data:{},
                cache: false,
                success:function(data) {
                    location.reload();
                }
            });
        }
        else {
            window.location="<?php echo base_url()?>Admin/Album/manageAlbum";
        }
    }
    function selectHome(x) {
        if (confirm("Are you sure ?")) {
            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/Album/appearInHomePage/")?>'+btn,
                data:{},
                cache: false,
                success:function(data) {
                    if (data=='1'){
                        alert('Album Added Successfully To Home Page');
                    }
                    else if(data=='0'){
                        alert('Album Removed Successfully From Home Page');
                    }
                    else if(data=='3'){
                        alert('Allready 6 Album in the Home Page');
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