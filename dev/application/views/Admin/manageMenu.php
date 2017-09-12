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
                    <h3 class="page-header"><i class="fa fa-table"></i> Manage &nbsp Menu</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="fa fa-table"></i>Menu</li>
                        <li><i class="fa fa-th-list"></i>Manage Menu</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <b>Manage Menu</b>
                        </header>
                        <div class="panel-body ">
                            <table class="table table-striped table-advance  table-bordered table-hover ">
                                <tbody>
                                <tr>
                                    <th> Menu Title</th>
                                    <th> Menu Type</th>
                                    <th> Parent Menu</th>
                                    <th> Page Title</th>
                                    <th> Menu Status</th>
                                    <th> Menu Inserted By</th>
                                    <th> Last Modified By</th>
                                    <th> Last Modified Date (d-m-Y)</th>
                                    <th> Action</th>
                                </tr>
                                <?php foreach ($menu as $menu){?>


                                    <tr>
                                        <td><?php echo $menu->menuName?></td>
                                        <td><?php echo $menu->menuType?></td>
                                        <td>
                                            <?php if ($menu->submenu == "")
                                            {echo NONE;}
                                            else{echo $menu->submenu;}?>
                                        </td>
                                        <td>
                                            <?php if ($menu->pageTitle==""){echo NONE;}else{echo $menu->pageTitle;}?>
                                        </td>
                                        <td>
                                            <?php echo $menu->menuStatus?>
                                        </td>

                                        <td>
                                            <?php echo $menu->insertedBy?>
                                        </td>

                                        <td>
                                            <?php if ($menu->lastModifiedBy==""){echo NEVER_MODIFIED;}else{echo $menu->lastModifiedBy;} ?>

                                        </td>

                                        <td><?php if ($menu->lastModifiedDate==""){echo NEVER_MODIFIED;}
                                            else
                                            {
                                                echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($menu->lastModifiedDate)),1);

                                            }
                                            ?>

                                        </td>
                                        <td>

                                            <div class="btn-group">
                                                <a class="btn" href="<?php echo base_url("Admin/Menu/editMenuView/")?><?php echo $menu->menuId ?>"><i class="icon_pencil-edit"></i></a>
                                                <a class="btn" data-panel-id="<?php echo $menu->menuId ?>"  onclick="selectid(this)" href="#"><i class="icon_trash"></i></a>
                                            </div>
                                        </td>

                                    </tr>


                                <?php }?>

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
        if (confirm("Are you sure you want to delete this Menu?")) {
            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/Menu/deleteMenu/")?>'+btn,
                data:{'menuid':btn},
                cache: false,
                success:function(data) {
                    if(data=='0'){alert("Menu Deleted Successfully!!");
                        location.reload();
                    }
                    else
                    {
                        alert('Please Delete Menu-( '+data+' ) First !!');
                    }
                }
            });
        }
        else {
            window.location="<?php echo base_url()?>Admin/Menu/ManageMenu";
        }
    }
</script>