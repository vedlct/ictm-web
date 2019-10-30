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
                    <h3 class="page-header"><i class="fa fa-table"></i> Student Applications</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li><i class="fa fa-table"></i>Student Applications</li>
                        <li><i class="fa fa-th-list"></i>Manage Applications</li>
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
                            <b>Manage Affiliations</b>
<!--                            <span align="">-->
<!--                                <a href="--><?php //echo base_url()?><!--Admin/Affiliation/newAffiliation"><button class="btn btn-sm"style="float: right; height: 26px; margin-top: 3px; background-color: #00A8FF;color: whitesmoke;"><b>New Affiliation</b></button></a>-->
<!--                            </span>-->
                        </header>
                        <div class="panel-body ">

                            <div align="center" class="col-md-4 col-sm-4">
                                <div style="position: absolute;left: 28%;top: 46px;width: 90%;" class="divcnter">
                                    <label style="text-align: right" for="menuType" class="control-label col-md-4 col-sm-4"> Search Course:</label>
                                    <div class="m-bot15 col-md-5 col-sm-5">
                                        <select class="form-control m-bot15" name="courseTitle" id="courseTitle"  required>
                                            <option value="" selected><?php echo ALL_COURSE_TITLE?></option>
                                            <?php for ($i=0;$i<count(COURSE_TITLE);$i++){?>
                                                <option value="<?php echo COURSE_TITLE[$i]?>"><?php echo COURSE_TITLE[$i]?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div align="center" class="col-md-4 col-sm-4">
                                <div style="position: absolute;left: 28%;top: 46px;width: 90%;" class="divcnter">
                                    <label style="text-align: right" for="menuType" class="control-label col-md-4 col-sm-4"> Search User:</label>
                                    <div class="m-bot15 col-md-5 col-sm-5">
                                        <select class="form-control m-bot15" name="type" id="userTitle"  required>
                                            <option value="" selected><?php echo ALL_USER_TITLE?></option>
                                            <?php for ($i=0;$i<count(USER_TITLE);$i++){?>
                                                <option value="<?php echo USER_TITLE[$i]?>"><?php echo USER_TITLE[$i]?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="table table-responsive" style="overflow-x: inherit">
                                <table class="table  table-advance  table-bordered table-hover" id="myTable">
                                    <thead>

                                    <tr align="center" bgcolor="#D3D3D3">
<!--                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 5%">No</th>-->
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 15%">Application Id</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 15%">Name</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 15%">Email</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 10%">Mobile No</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 15%">Course Name</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 15%">Submit Date(d-m-Y)</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 15%"> Action </th>
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
                "url": "<?php echo base_url('Admin/StudentApplication/ajax_list')?>",
                "type": "POST",
                "data": function ( data ) {
                    data.courseTitle1 = $('#courseTitle').val();
                    data.userTitle1 = $('#userTitle').val();
                }

            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [6], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],
            //for change search name
            "oLanguage": {
                "sSearch": "<span>Search By Affiliation Title:</span> " //search
            },
            "dom": '<"top"ifl>rt<"bottom"ip><"clear">'


        });
//        $(".dataTables_filter input").attr("placeholder", "Search By Title");
        $('#courseTitle').change(function(){ //button filter event click
            table.ajax.reload();  //just reload table
            table.search("").draw(); //just redraw myTableFilter
        });
        $('#userTitle').change(function(){ //button filter event click
            table.ajax.reload();  //just reload table
            table.search("").draw(); //just redraw myTableFilter
        });


    });


    $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });





</script>