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
                    <h3 class="page-header"><i class="fa fa-table"></i> Manage Menu</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="fa fa-table"></i>Manage Menu</li>

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
                            Manage Menu

                        </header>
                        <div id="panel" class="panel-body">


                                <div align="center"  class="col-md-12 col-sm-12">
                                    <div style="position: absolute;left: 0%;top: 38px;width: 94%;" class="divcnter">
                                        <label style="text-align: right" for="menuType" class="control-label col-md-5 col-sm-5"> Search by Menu Name: </label>
                                        <div class="m-bot15 col-md-3 col-sm-3">
                                            <select class="form-control" name="menuType" id="menuType" required>
                                                <option value="" selected><?php echo "All Menu Type"?></option>
                                                <?php for ($i=0;$i<count(MENU_TYPE);$i++){?>
                                                    <option value="<?php echo MENU_TYPE[$i]?>"><?php echo MENU_TYPE[$i]?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            <div class="table table-responsive" style="overflow-x: inherit">


                                
                                <table class="table  table-striped table-advance  table-bordered table-hover" style="position: relative;z-index: 1; margin-top: -50px" id="myTable">

                                    <thead>
                                    <tr>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left; width: 3%"> No</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left;"> Menu Name</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left; width: 4%"> O N</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left"> Menu Type</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left"> Parent Menu</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left"> Page Title</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left;width: 8%"> Menu Status</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left"> Inserted By</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align:left;"> Last Modified By</th>
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
                "url": "<?php echo base_url('Admin/Menu/ajax_list')?>",
                "type": "POST",
                "data": function ( data ) {
                    data.menuType = $('#menuType').val();

                }
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [ 0,3,4,5,6,7,8,9,10], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],

            //for change search name
            "oLanguage": {

                "sSearch": "<span>Search By Menu Name:</span> " //search

            },
            "dom": '<"top"i<"#typebar">fl>rt<"bottom"ip><"clear">'
        });
        $('#menuType').change(function(){ //button filter event click
            table.search("").draw(); //just redraw myTableFilter
            table.ajax.reload();  //just reload table

        });
        $(".dataTables_filter input").attr("placeholder", "Search By Menu Name");



    });


    function selectid(x) {
        if (confirm("Are you sure you want to delete this Menu?")) {
            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/Menu/deleteMenu/")?>'+btn,
                data:{'menuid':btn},
                cache: false,
                success:function(data) {
                    if(data==0){
                        location.reload();
                    }
                    else
                    {
                        alert('Please Delete Menu-( '+data+' ) First !!');
                        location.reload();
                    }
                }
            });
        }
        else {
            window.location="<?php echo base_url()?>Admin/Menu/ManageMenu";
        }
    }



</script>

