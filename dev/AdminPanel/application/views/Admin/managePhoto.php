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
                    <h3 class="page-header"><i class="fa fa-table"></i>Photo</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-table"></i>Photo</li>
                        <li><i class="fa fa-th-list"></i>Manage Photo</li>
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

            <?php $alCov = $this->session->flashdata('alCover');?>

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Manage Photo
                            <span >
                                 <a href="<?php echo base_url()?>Admin/Photo/newPhoto"> <button class="btn btn-sm" style="float: right; height: 26px; margin-top: 4px; background-color: #00A8FF;color: whitesmoke; ">New Photo</button> </a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <form class="row">
                            <div class="form-group">
                                <label class="control-label col-lg-2" for="albumId">Album Title</label>
                                <div class="col-lg-10">

                                    <select class="form-control m-bot15" id="albumId" name="albumId" onchange="showtable()">
                                        <option><?php echo SELECT_ALBUM ?></option>
                                        <?php foreach ($album as $album){?>
                                        <?php if ($alCov != ""){?>
                                        <option <?php if (!empty($alCov) && $alCov == $album->albumId)  echo 'selected = "selected"'; ?> value="<?php echo $album->albumId?>"><?php echo $album->albumTitle?></option>
                                        <?php }else{?>
                                            <option value="<?php echo $album->albumId?>"><?php echo $album->albumTitle?></option>
                                        <?php }}?>
                                    </select>
                                </div>
                            </div>
                            </form>

                            <div id="tableid" style="display: none">

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

<?php include ('js.php')?>

<script>

    $(document).ready(function(){

        var alcover= '<?php echo $alCov?>';

        if (alcover != ''){
            showtable2(alcover);
        }else {

        }


    });

    $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });

    function showtable() {
        var x = document.getElementById('albumId').value;
        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Admin/Photo/showPhotoManageTable/")?>'+x,
            data:{},
            cache: false,
            success:function(data)
            {
                $('#tableid').html(data);

            }
        });
        document.getElementById("tableid").style.display ="block";
    }

    function showtable2(alcover)
    {
        //var x = document.getElementById('albumId').value;
        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Admin/Photo/showPhotoManageTable/")?>'+alcover,
            data:{},
            cache: false,
            success:function(data)
            {
                $('#tableid').html(data);

            }
        });
        document.getElementById("tableid").style.display ="block";
    }
</script>
</body>
</html>
