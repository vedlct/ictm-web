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
                            <span align="">
                                <a href="<?php echo base_url()?>Admin/News/newNews"><button class="btn btn-sm" style="float: right; height: 26px; margin-top: 3px; background-color: #00A8FF;color: whitesmoke;"><b>New News</b></button></a>
                            </span>
                        </header>
                        <div class="panel-body">

                            <div class="form-group col-md-6">
                                <label for="title">Search By News Title</label>
                                <input type="text" class="form-control col-md-6" id="title" name="title">
                            </div>
                            <div class="form-group col-md-6">
                                <button style="margin-top: 23px" type="submit" onclick="searchByNewsTitle()" class="btn btn-default">Submit</button>
                            </div>

                            <div class="table table-responsive">
                            <table class="table table-striped table-advance  table-bordered table-hover" id="myTable">
                                <tbody>
                                <tr>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center; width: 15%" onclick="sortTable(0)"> News Title</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center" onclick="sortTable(1)"> News Date</th>

                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center" onclick="sortTable(2)"> News Type</th>

                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Status</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Inserted By</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Last Modified By</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Last Modified Date</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Appear In Home</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Action</th>
                                </tr>

                                <?php if (!empty($news)){
                                    foreach ($news as $newsdata){?>

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
                                                <?php if ($newsdata->newsStatus == STATUS[0]){?>
                                                <input type="checkbox" data-panel-id="<?php echo $newsdata->newsId ?>" onclick="selectHome(this)" <?php if ($newsdata->homeStatus == SELECT_APPROVE[0])echo 'checked="checked"';?>
                                                       id="appearInHome" name="appearInHome">Yes
                                            <?php }else{ echo "Status Should be Active First !!";}?>

                                            </td>

                                            <td>

                                                <div class="btn-group">
                                                    <a class="btn" href="<?php echo base_url("Admin/News/editNewsView/")?><?php echo $newsdata->newsId ?>"><i class="icon_pencil-edit"></i></a>
                                                    <a class="btn" data-panel-id="<?php echo $newsdata->newsId ?>"  onclick="selectid(this)"><i class="icon_trash"></i></a>
                                                </div>
                                            </td>

                                        </tr>
                                    <?php }
                                } ?>



                                </tbody>
                            </table>
                            </div>
                            <div id="pagi" class="pagination2" align="center">
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

    $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });

    function selectid(x) {
        if (confirm("Are you sure you want to delete this News?")) {
            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/News/deleteNews/")?>'+btn,
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
    function selectHome(x) {
        if (confirm("Are you sure ?")) {
            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/News/appearInHomePage/")?>'+btn,
                data:{},
                cache: false,
                success:function(data) {
                    if (data=='1'){
                        alert('News Added Successfully To Home Page');
                    }
                    else if(data=='0'){
                        alert('News Removed Successfully From Home Page');
                    }

                }
            });
        }
        else {
            location.reload();
        }
    }

    function searchByNewsTitle() {

        btn = document.getElementById('title').value;
        //alert(btn);

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Admin/News/searchByNewsTitle")?>',
            data:{'name':btn},
            cache: false,
            success:function(data) {

                $('#myTable').html(data);
                document.getElementById("pagi").style.display="none";
                //alert(data);
            }
        });

    }


</script>