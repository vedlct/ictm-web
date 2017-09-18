<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>
</head>
<style>
    .pagination2 {
        letter-spacing: 15px;
    }


</style>

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
                    <h3 class="page-header"><i class="fa fa-table"></i> News</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li><i class="fa fa-table"></i>News</li>
                        <li><i class="fa fa-th-list"></i>Manage News</li>
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
                            <b>Manage News</b>
                        </header>
                        <div class="panel-body table  ">
                            <table class="table table-striped table-advance  table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center; width: 15%"> News Title</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center"> News Date</th>

                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center"> News Type</th>

                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Status</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Inserted By</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Last Modified By</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Last Modified Date</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Action</th>
                                </tr>

                                <?php foreach ($news as $newsdata){?>

                                    <tr align="center">
                                        <td>
                                            <?php echo $newsdata->newsTitle?>
                                        </td>

                                        <td>
                                            <?php echo date('d-m-Y',strtotime($newsdata->newsDate))?>

                                        </td>



                                        <td>
                                            <?php echo $newsdata->newsType?>

                                        </td>

                                        <td>
                                            <?php echo $newsdata->newsStatus?>
                                        </td>

                                        <td>
                                            <?php echo $newsdata->insertedBy?>

                                        </td>

                                        <td>
                                            <?php if ($newsdata->lastModifiedBy==""){echo"Never Modified";}else{echo $newsdata->lastModifiedBy;} ?>
                                        </td>

                                        <td>
                                            <?php if ($newsdata->lastModifiedDate==""){echo"Never Modified";}
                                            else
                                            {
                                                $timestamp = strtotime($newsdata->lastModifiedDate);
                                                $date = date('d-F-Y', $timestamp);
                                                echo $date ;
                                            }?>

                                        </td>

                                        <td>

                                            <div class="btn-group">
                                                <a class="btn" href="<?php echo base_url("Admin/News/editNewsView/")?><?php echo $newsdata->newsId ?>"><i class="icon_pencil-edit"></i></a>
                                                <a class="btn" data-panel-id="<?php echo $newsdata->newsId ?>"  onclick="selectid(this)" href="#"><i class="icon_trash"></i></a>
                                            </div>
                                        </td>

                                    </tr>
                                <?php } ?>



                                </tbody>
                            </table>
                            <div class="pagination2" align="center">
                                <a href="#"><?php echo $links?></a>
                            </div>
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
                   // alert("News Deleted Successfully!!");
                    location.reload();

                }
            });
        }
        else {
            location.reload();
        }
    }
</script>