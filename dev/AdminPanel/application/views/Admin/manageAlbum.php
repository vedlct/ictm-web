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
                        <div class="panel-body ">
                            <table class="table table-striped table-advance  table-bordered table-hover ">
                                <tbody>
                                <tr>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Album Title</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center" > Category Name</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Album Status</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Inserted By</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Last Modified By</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center"> Last Modified Date (d-m-Y)</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: center">  Action</th>
                                </tr>
                                <?php if (!empty($Albums)){
                                    foreach ($Albums as $Album){?>


                                        <tr align="center">
                                            <td><?php echo $Album->albumTitle?></td>
                                            <td><?php echo $Album->albumCategoryName?></td>

                                            <td>
                                                <?php echo $Album->albumStatus?>
                                            </td>

                                            <td>
                                                <?php echo $Album->insertedBy?>
                                            </td>

                                            <td>
                                                <?php if ($Album->lastModifiedBy==""){echo NEVER_MODIFIED;}else{echo $Album->lastModifiedBy;} ?>
                                            </td>

                                            <td><?php if ($Album->lastModifiedDate==""){echo NEVER_MODIFIED;}
                                                else
                                                {
                                                    echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($Album->lastModifiedDate)),1);

                                                }
                                                ?>

                                            </td>
                                            <td>

                                                <div class="btn-group">
                                                    <a class="btn" href="<?php echo base_url("Admin/Album/editAlbumView/")?><?php echo $Album->albumId ?>"><i class="icon_pencil-edit"></i></a>
                                                    <a class="btn" data-panel-id="<?php echo $Album->albumId ?>"  onclick="selectid(this)"><i class="icon_trash"></i></a>
                                                </div>
                                            </td>

                                        </tr>


                                    <?php }
                                }?>

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
</script>