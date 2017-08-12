<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <?php include ('head.php') ?>
</head>

<body>
<!-- container section start -->
<section id="container" class="">
    <!--header start-->
    <?php include ('topNavigation.php') ?>
    <!--header end-->

    <!--sidebar start-->
    <?php include ('leftNavigation.php') ?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-table"></i> Course Section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-table"></i>Course Section</li>
                        <li><i class="fa fa-th-list"></i>Manage Course Section</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Manage Course Section
                        </header>
                        <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="inputSuccess">Course</label>
                            <div class="col-lg-10">
                                <select class="form-control m-bot15" name="level" onchange="showtable()">
                                    <option>BTEC Level 5 HND in Business </option>
                                    <option>BTEC HND in Health and Social Care</option>
                                    <option>BTEC HND in Computing and Systems Development</option>
                                    <option>BTEC HND in Electrical and Electronic Engineering</option>
                                    <option>BTEC Level 5 HND in Travel and Tourism Management</option>
                                    <option>BTEC Level 5 HND in Hospitality Management</option>
                                </select>
                            </div>
                        </div>
                            <div id="tableid" style="display: none">
                        <table class="table table-striped table-advance table-bordered table-hover ">
                            <tbody>
                            <tr>
                                <th> Course Section Title </th>
                                <th> Action</th>
                            </tr>
                            <tr>
                                <td>Angeline Mcclain</td>

                                <td>
                                    <div class="btn-group">
                                        <a class="btn" href="#"><i class="icon_pencil-edit"></i></a>
                                        <a class="btn " href="#"><i class="icon_trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Sung Carlson</td>



                                <td>
                                    <div class="btn-group">
                                        <a class="btn" href="#"><i class="icon_pencil-edit"></i></a>
                                        <a class="btn " href="#"><i class="icon_trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Bryon Osborne</td>



                                <td>
                                    <div class="btn-group">
                                        <a class="btn" href="#"><i class="icon_pencil-edit"></i></a>
                                        <a class="btn " href="#"><i class="icon_trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Dalia Marquez</td>



                                <td>
                                    <div class="btn-group">
                                        <a class="btn" href="#"><i class="icon_pencil-edit"></i></a>
                                        <a class="btn " href="#"><i class="icon_trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Selina Fitzgerald</td>



                                <td>
                                    <div class="btn-group">
                                        <a class="btn" href="#"><i class="icon_pencil-edit"></i></a>
                                        <a class="btn " href="#"><i class="icon_trash"></i></a>
                                    </div>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                            </div>
                    </section>
                </div>
            </div>
        </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <div class="text-right">
        <div class="credits">
            <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
            -->
            <a href="#">Icon College</a> by <a href="#">A2N</a>
        </div>
    </div>
</section>
<!-- container section end -->
<!-- javascripts -->
<?php include ('js.php')?>

<script>
    function showtable() {

document.getElementById("tableid").style.display ="block";
    }
</script>
</body>
</html>
