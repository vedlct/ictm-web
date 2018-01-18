<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>

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
                    <h3 class="page-header"><i class="fa fa-table"></i> Manage Page</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="fa fa-table"></i>Manage Page</li>

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
                            Manage Page

                        </header>
                        <div id="panel" class="panel-body">

                            <!---->
                            <!--                            <div class="panel panel-default">-->
                            <!--                                <div class="panel-heading">-->
                            <!--                                    <h3 class="panel-title" >Custom Filter : </h3>-->
                            <!--                                </div>-->
                            <!--                                <div class="panel-body">-->
                            <!--                                    <form id="form-filter" class="form-horizontal">-->
                            <!--                                        <div class="form-group">-->
                            <!--                                            <label for="country" class="col-sm-2 control-label">Menu Type</label>-->
                            <!--                                            <div class="col-sm-4">-->
                            <!--                                                <select class="form-control m-bot15" name="menuType" id="menuType" required>-->
                            <!--                                                    <option value="" selected>--><?php //echo SELECT_MENU_TYPE?><!--</option>-->
                            <!--                                                    --><?php //for ($i=0;$i<count(MENU_TYPE);$i++){?>
                            <!--                                                        <option value="--><?php //echo MENU_TYPE[$i]?><!--">--><?php //echo MENU_TYPE[$i]?><!--</option>-->
                            <!--                                                    --><?php //} ?>
                            <!--                                                </select>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!---->
                            <!--                                    </form>-->
                            <!--                                </div>-->
                            <!--                            </div>-->


                            <div class="table table-responsive" style="overflow-x: inherit">

                                <form class="row">
                                    <div class="form-group" id="spagetype">
                                        <label style="text-align: right" for="menuType" class="control-label col-md-4 col-sm-4"> Search by Menu Name: </label>
                                        <div class="m-bot15 col-md-4 col-sm-4">
                                            <select class="form-control m-bot15" name="pageType" id="pageType"  required>
                                                <option value="" selected><?php echo ALL_PAGE_TYPE?></option>
                                                <?php for ($i=0;$i<count(PAGE_TYPE);$i++){?>
                                                    <option value="<?php echo PAGE_TYPE[$i]?>"><?php echo PAGE_TYPE[$i]?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </form>

                                <table class="table  table-striped table-advance  table-bordered table-hover" id="myTable">

                                    <thead>
                                    <tr>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left; width: 3%"> No</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left;"> Page Title</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left"> Page Type</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left;width: 8%"> Status</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left"> Inserted By</th>
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
                "url": "<?php echo base_url('Admin/Page/ajax_list')?>",
                "type": "POST",
                "data": function ( data ) {
                    data.pageType1 = $('#pageType').val();

                }
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [0,3,4,5,6,7,], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],

            //for change search name
            "oLanguage": {
                "sSearch": "<span>Search By Page Title:</span> " //search
            },
            "dom": '<"top"ifl>rt<"bottom"ip><"clear">',



        });
        $(".dataTables_filter input").attr("placeholder", "Search By Page Title");
        $('#pageType').change(function(){ //button filter event click
            table.ajax.reload();  //just reload table
            table.search("").draw(); //just redraw myTableFilter
        });

    });




</script>

