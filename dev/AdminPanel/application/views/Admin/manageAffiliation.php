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
                    <h3 class="page-header"><i class="fa fa-table"></i> Affiliations</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li><i class="fa fa-table"></i>Affiliations</li>
                        <li><i class="fa fa-th-list"></i>Manage Affiliations</li>
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
                            <span align="">
                                <a href="<?php echo base_url()?>Admin/Affiliation/newAffiliation"><button class="btn btn-sm"style="float: right; height: 26px; margin-top: 3px; background-color: #00A8FF;color: whitesmoke;"><b>New Affiliation</b></button></a>
                            </span>
                        </header>
                        <div class="panel-body ">
                            <div class="table table-responsive">
                            <table class="table  table-advance  table-bordered table-hover" id="myTable">
                                <tbody>

                                <tr align="center" bgcolor="#D3D3D3">
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left" onclick="sortTable(0)" <span id="down"><i class="fa fa-sort-desc"></i> </span><span id="up" style="display: none"><i class="fa fa-sort-asc"></i> </span>  Title</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Status</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Inserted By</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Last Modified By </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left; width: 15%"> Last Modified Date(d-m-Y) </th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Appear In Home</th>
                                    <th style="background-color: #394A59; color: whitesmoke; text-align: left;width: 10%"> Action </th>
                                </tr>


                                <?php if (!empty($affiliations)){
                                    foreach ($affiliations as $affiliation){?>
                                        <tr align="left">
                                            <td>
                                                <?php echo $affiliation->affiliationsTitle?>
                                            </td>
                                            <td>
                                                <?php echo $affiliation->affiliationsStatus?>
                                            </td>

                                            <td >
                                                <?php echo $affiliation->insertedBy?>

                                            </td>

                                            <td >
                                                <?php if ($affiliation->lastModifiedBy==""){echo"Never Modified";}else{echo $affiliation->lastModifiedBy;} ?>
                                            </td>

                                            <td >
                                                <?php if ($affiliation->lastModifiedDate==""){echo"Never Modified";}
                                                else
                                                {

                                                    echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($affiliation->lastModifiedDate)),1);
                                                }?>

                                            </td>

                                            <td>
                                                <?php if ($affiliation->affiliationsStatus == STATUS[0]){?>
                                                    <input type="checkbox" data-panel-id="<?php echo $affiliation->affiliationsId ?>" onclick="selectHome(this)" <?php if ($affiliation->homeStatus == SELECT_APPROVE[0])echo 'checked="checked"';?>
                                                           id="appearInHome" name="appearInHome">Yes
                                                <?php }else{ echo "Status Should be Active First !!";}?>

                                            </td>

                                            <td >

                                                <div class="btn-group">
                                                    <a class="btn" href="<?php echo base_url("Admin/Affiliation/editAffiliationView/")?><?php echo $affiliation->affiliationsId ?>"><i class="icon_pencil-edit"></i></a>
                                                    <a class="btn" data-panel-id="<?php echo $affiliation->affiliationsId ?>"  onclick="selectid(this)"><i class="icon_trash"></i></a>
                                                </div>
                                            </td>

                                        </tr>
                                    <?php }
                                } ?>



                                </tbody>
                            </table>
                            </div>
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
        if (confirm("Are you sure you want to delete this Affiliation?")) {
            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/Affiliation/deleteAffiliation/")?>'+btn,
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
                url:'<?php echo base_url("Admin/Affiliation/appearInHomePage/")?>'+btn,
                data:{},
                cache: false,
                success:function(data) {
                    if (data=='1'){
                        alert('Affiliation Added Successfully To Home Page');
                    }
                    else if(data=='0'){
                        alert('Affiliation Removed Successfully From Home Page');
                    }

                }
            });
        }
        else {
            location.reload();
        }
    }
</script>