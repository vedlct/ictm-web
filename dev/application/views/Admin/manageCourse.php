<!DOCTYPE html>
<html lang="en">
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
                    <h3 class="page-header"><i class="fa fa-table"></i>Course</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-table"></i>Course</li>
                        <li><i class="fa fa-th-list"></i>Manage Course</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Manage Course
                        </header>

                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                <th> Course Name</th>
                                <th> Course Code</th>
                                <th> Action</th>
                            </tr>
                            <tr>
                                <td>Angeline Mcclain</td>
                                <td>0</td>

                                <td>
                                    <div class="btn-group">
                                        <a class="btn" href="#"><i class="icon_pencil-edit"></i></a>
                                        <a class="btn " href="#"><i class="icon_trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Sung Carlson</td>
                                <td>2</td>

                                <td>
                                    <div class="btn-group">
                                        <a class="btn" href="#"><i class="icon_pencil-edit"></i></a>
                                        <a class="btn " href="#"><i class="icon_trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Bryon Osborne</td>
                                <td>2</td>

                                <td>
                                    <div class="btn-group">
                                        <a class="btn" href="#"><i class="icon_pencil-edit"></i></a>
                                        <a class="btn " href="#"><i class="icon_trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Dalia Marquez</td>
                                <td>0</td>

                                <td>
                                    <div class="btn-group">
                                        <a class="btn" href="#"><i class="icon_pencil-edit"></i></a>
                                        <a class="btn " href="#"><i class="icon_trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Selina Fitzgerald</td>
                                <td>1</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn" href="#"><i class="icon_pencil-edit"></i></a>
                                        <a class="btn " href="#"><i class="icon_trash"></i></a>
                                    </div>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </section>
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
</body>
</html>
