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
                    <h3 class="page-header"><i class="fa fa-table"></i> Manage &nbsp News</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li><i class="fa fa-table"></i>News</li>
                        <li><i class="fa fa-th-list"></i>Manage News</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <b>Manage News</b>
                        </header>
                        <div class="panel-body table table-responsive ">
                            <table class="table table-striped table-advance  table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <th> News Title</th>
                                    <th> News Date</th>

                                    <th> News Type</th>

                                    <th> News Status</th>
                                    <th> News Inserted By</th>
                                    <th> Last Modified By</th>
                                    <th> Last Modified Date</th>
                                    <th> Action</th>
                                </tr>

                                <?php foreach ($news as $news){?>

                                    <tr>
                                        <td>
                                            <?php echo $news->newsTitle?>
                                        </td>

                                        <td>
                                            <?php echo date('d-m-Y',strtotime($news->newsDate))?>

                                        </td>



                                        <td>
                                            <?php echo $news->newsType?>

                                        </td>

                                        <td>
                                            <?php echo $news->newsStatus?>
                                        </td>

                                        <td>
                                            <?php echo $news->insertedBy?>

                                        </td>

                                        <td>
                                            <?php if ($news->lastModifiedBy==""){echo"Never Modified";}else{echo $news->lastModifiedBy;} ?>
                                        </td>

                                        <td>
                                            <?php if ($news->lastModifiedDate==""){echo"Never Modified";}
                                            else
                                            {
                                                $timestamp = strtotime($news->lastModifiedDate);
                                                $date = date('d-F-Y', $timestamp);
                                                echo $date ;
                                            }?>

                                        </td>

                                        <td>

                                            <div class="btn-group">
                                                <a class="btn" href="<?php echo base_url("Admin/News/editNewsView/")?><?php echo $news->newsId ?>"><i class="icon_pencil-edit"></i></a>
                                                <a class="btn" data-panel-id="<?php echo $news->newsId ?>"  onclick="selectid(this)" href="#"><i class="icon_trash"></i></a>
                                            </div>
                                        </td>

                                    </tr>
                                <?php } ?>



                                </tbody>
                            </table>
                        </div>
                        <div id="edit"></div>
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
    function selectid(x) {
        if (confirm("Are you sure you want to delete this News?")) {
            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/News/deleteNews/")?>'+btn,
                data:{},
                cache: false,
                success:function(data) {
                    alert("News Deleted Successfully!!");
                    location.reload();

                }
            });
        }
        else {
            location.reload();
        }
    }
</script>