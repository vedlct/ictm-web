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
                    <h3 class="page-header"><i class="fa fa-table"></i>Management Alumni</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li><i class="fa fa-table"></i>Student Applications</li>
                        <li><i class="fa fa-th-list"></i>Manage Alumni</li>
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
                            <b>Manage Alumni</b>
                            <!--                            <span align="">-->
                            <!--                                <a href="--><?php //echo base_url()?><!--Admin/Affiliation/newAffiliation"><button class="btn btn-sm"style="float: right; height: 26px; margin-top: 3px; background-color: #00A8FF;color: whitesmoke;"><b>New Affiliation</b></button></a>-->
                            <!--                            </span>-->
                        </header>
                        <div class="panel-body ">
							<div align="center" class="col-md-4 col-sm-4">
								<div style="position: absolute;left: 28%;top: 46px;width: 90%;" class="divcnter">
									<label style="text-align: right" for="menuType" class="control-label col-md-4 col-sm-4">Filter by Course:</label>
									<div class="m-bot15 col-md-6 col-sm-6">
										<select class="form-control m-bot15" name="courseComplete" id="courseTitle"  required>
											<option value="" selected><?php echo ALL_ALUMNICOURSE_TITLE?></option>
											<?php for ($i=0;$i<count(ALUMNICOURSE_TITLE);$i++){?>
												<option value="<?php echo ALUMNICOURSE_TITLE[$i]?>"><?php echo ALUMNICOURSE_TITLENAME[$i]?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div align="center"  class="col-md-4 col-sm-4" style="margin-left: -7%;">
								<div style="position: absolute;left: 28%;top: 46px;width: 90%;" class="divcnter">
									<label style="text-align: right" for="menuType" class="control-label col-md-4 col-sm-4">Course Start Year:</label>
									<div class="m-bot15 col-md-5 col-sm-5">
										<select class="form-control" name="courseStartYear" id="courseStartYear" required>
											<option value="" selected>Select Year</option>
											<?php foreach ($startYear as $yr) { ?>
												<option value="<?php echo $yr->courseStartYear?>"><?php echo $yr->courseStartYear?></option>
												<?php
											}
											?>
										</select>
									</div>
								</div>
							</div>

                            <div class="table table-responsive" style="overflow-x: inherit">
                                <table class="table  table-advance  table-bordered table-hover" id="myTable">
                                    <thead>

                                    <tr align="center" bgcolor="#D3D3D3">
                                        <!--                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 5%">No</th>-->
                                        <th style="background-color: #394A59; color: whitesmoke; width: 1%">select</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 15%">Student Id</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 15%">Name</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 15%">Email</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 10%">Mobile No</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 10%">Course Name</th>
										<th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 15%">Submit Date</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 10%"> Action </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <input type="checkbox" class="chk" id="selectall1" />Select All<br><br><br>
                            <button onclick="downloadexcel()" type="btn" class="btn btn-primary"><strong>Download CSV</strong></button>

                            <!--                            <a  onclick="downloadexcel()" download> <button class="btn btn-danger">Download Excel</button></a>-->
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
    $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });

    var table;
    $(document).ready(function() {
        //datatables
        table = $('#myTable').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url('Admin/StudentApplication/alamni_list')?>",
                "type": "POST",
                "data": function ( data ) {
                    data.courseTitle1 = $('#courseTitle').val();
                    data.courseStartYear = $('#courseStartYear').val();
                    // alert($('#courseStartYear').val())
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
                "sSearch": "<span>Search by:</span> " //search
            },
            "dom": '<"top"ifl>rt<"bottom"ip><"clear">'
        });
        $('#courseTitle').change(function(){ //button filter event click
            table.ajax.reload();  //just reload table
            table.search("").draw(); //just redraw myTableFilter
        });
        $('#courseStartYear').change(function(){ //button filter event click
            table.ajax.reload();  //just reload table
            table.search("").draw(); //just redraw myTableFilter
        });
//        $(".dataTables_filter input").attr("placeholder", "Search By Title");

    });

    $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });

    var selecteds = [];
    function selected_rows(x) {

        btn = $(x).data('panel-id');
        var index = selecteds.indexOf(btn.toString())
        if (index == "-1"){
            selecteds.push(btn);
        }else {

            selecteds.splice(index, 1);
        }


    }

    // add multiple select / deselect functionality111
    $("#selectall1").click(function () {

        if($('#selectall1').is(":checked")) {
            selecteds=[];
            checkboxes = document.getElementsByName('selected_rows[]');
            for(var i in checkboxes) {
                checkboxes[i].checked = 'TRUE';
            }

            /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
            $(".chk:checked").each(function () {
                btn = $(this).data('panel-id');
                selecteds.push(btn);
            });
            // alert(selecteds);


        }
        else {
            selecteds=[];
            $(':checkbox:checked').prop('checked',false);
        }

    });






//    function selectAll(source) {
//        for(var i=0; i <= selecteds.length; i++) {
//            selecteds.pop(i);
//        }
//        alert(selecteds);
//
////            $(':checkbox:checked').prop('checked',false);
//        checkboxes = document.getElementsByName('selected_rows[]');
//        for(var i in checkboxes) {
//            checkboxes[i].checked = source.checked;
//        }
//
//        /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
//        $(".chk:checked").each(function () {
//            selecteds.push($(this).val());
//        });
//    }

    //    function downloadexcel() {
    //
    //
    ////            var i;
    ////            /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
    ////            $(".chk:checked").each(function () {
    ////                selecteds.push($(this).val());
    ////            });
    //
    //
    //        var products=selecteds;
    //
    ////        alert(products);
    //
    //        if (products.length >0) {
    //
    //            $.ajax({
    //                type: 'POST',
    //                url: "<?php //echo base_url('Admin/StudentApplication/csvFile') ?>//",
    //                cache: false,
    //                data: {'products': products},
    //                success: function (data) {
    //
    //                    $('#SessionMessage').load(document.URL +  ' #SessionMessage');
    //                    table.ajax.reload();  //just reload table
    //
    //                    selecteds=[];
    //
    //                    $(':checkbox:checked').prop('checked',false);
    //                    alert(data);
    //
    //                    if (data.success=='1'){
    //
    //                        $.alert({
    //                            title: 'Success!',
    //                            type: 'green',
    //                            content: data.message,
    //                            buttons: {
    //                                tryAgain: {
    //                                    text: 'Ok',
    //                                    btnClass: 'btn-blue',
    //                                    action: function () {
    //
    //
    //                                    }
    //                                }
    //
    //                            }
    //                        });
    //
    //
    //                    }else if(data.success=='0'){
    //
    //                        $.alert({
    //                            title: 'Alert!',
    //                            type: 'Red',
    //                            content: data.message,
    //                            buttons: {
    //                                tryAgain: {
    //                                    text: 'Ok',
    //                                    btnClass: 'btn-red',
    //                                    action: function () {
    //
    //
    //                                    }
    //                                }
    //
    //                            }
    //                        });
    //
    //
    //                    }
    //
    //
    //                }
    //
    //            });
    //        }
    //        else {
    //            // alert("Please Select a product first");
    //
    //            $.alert({
    //                title: 'Alert!',
    //                type: 'Red',
    //                content: 'Please select your Product(s) for exporting into the Product and Offer file',
    //                buttons: {
    //                    tryAgain: {
    //                        text: 'Ok',
    //                        btnClass: 'btn-red',
    //                        action: function () {
    //
    //
    //                        }
    //                    }
    //
    //                }
    //            });
    //        }
    //    }

    function downloadexcel() {
        var products=selecteds;
//        alert(products);
        if (products.length >0) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('Admin/StudentApplication/alumniFile')?>",
                cache: false,
                data: {'products': products},
                success: function (data) {
//                    var link = document.createElement("a");
//                    link.download = data.fileName+".csv";
//                    var uri = '<?php //echo base_url()?>//public/csv'+"/"+data.fileName+".csv";
////                    alert(uri);
//                    link.href = uri;
//                    document.body.appendChild(link);
//                    link.click();
//                    document.body.removeChild(link);
//                    delete link;
                    var downloadLink = document.createElement("a");
                    var fileData = ['\ufeff'+data];

                    var blobObject = new Blob(fileData,{
                        type: "text/csv;charset=utf-8;"
                    });

                    var url = URL.createObjectURL(blobObject);
                    downloadLink.href = url;
                    downloadLink.download = "AlumniForm.csv";

                    /*
                     * Actually download CSV
                     */
                    document.body.appendChild(downloadLink);
                    downloadLink.click();
                    document.body.removeChild(downloadLink);

                    selecteds=[];
                    $(':checkbox:checked').prop('checked',false);
                }
            });

        }
        else {
            //  alert("Please Select a product first");
            $.alert({
                title: 'Alert!',
                type: 'Red',
                content: 'Please select your Product(s) for downloading the Product(s) details',
                buttons: {
                    tryAgain: {
                        text: 'Ok',
                        btnClass: 'btn-red',
                        action: function () {
                        }
                    }
                }
            });
        }
    }




</script>


<!--<script>-->
<!--    function selectAll(source) {-->
<!--        var products=selecteds;-->
<!--        checkboxes = document.getElementsByName('selected_rows[]');-->
<!--        for(var i in checkboxes)-->
<!--            checkboxes[i].checked = source.checked;-->
<!--    }-->
<!--</script>-->


