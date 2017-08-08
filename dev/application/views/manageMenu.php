<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('head.php') ?>
</head>

<body>
<!-- container section start -->
<section id="container" class="">
    <!--header start-->
    <?php include ('header.php') ?>
    <!--header end-->

    <!--sidebar start-->
    <?php include ('sidebar.php') ?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-table"></i> Manage &nbsp Menu</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li><i class="fa fa-table"></i>Menu</li>
                        <li><i class="fa fa-th-list"></i>Manage Menu</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading" align="center">
                            <b>Manage Menu</b>
                        </header>
                        <div class="panel-body table table-responsive">
                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                <tr>
                                    <th> Menu Title</th>
                                    <th> Menu Type</th>
                                    <th> Menu/Sub Menu</th>
                                    <th> Page Title</th>
                                    <th> Page Status</th>
                                    <th> Last Modified By</th>
                                    <th> Last Modified Date</th>
                                    <th> Action</th>
                                </tr>
                                <?php foreach ($menu as $menu){?>


                                    <tr>
                                        <td><?php echo $menu->menuName?></td>
                                        <td><?php echo $menu->menuType?></td>
                                        <td>
                                            <?php if ($menu->parentId=="")
                                            {
                                                echo "Menu";
                                            }else{
                                                $p_id=$menu->parentId;
                                                $query=$this->db->query("select menuName from ictmmenu WHERE `menuId`= '$p_id'");
                                                foreach ($query->result() as $r ){$mName=$r->menuName;}
                                                echo "SubMenu of- $mName";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php if ($menu->pageId=="")
                                            {
                                                echo "None";
                                            }else{
                                                $pa_id=$menu->pageId;
                                                $query=$this->db->query("select pageTitle from ictmpage WHERE `pageId`= '$pa_id'");
                                                foreach ($query->result() as $p ){$paTitle=$p->pageTitle;}
                                                echo "$paTitle";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $menu->menuStatus?>
                                        </td>

                                        <td>
                                            <?php if ($menu->lastModifiedBy==""){
                                            }?>
                                            <?php $lastmodified =$menu->lastModifiedBy;
                                            $query=$this->db->query("select userTitle from ictmusers WHERE `userId`= '$lastmodified'");
                                            foreach ($query->result() as $tytle ){$name=$tytle->userTitle;} echo $name;?>

                                        </td>

                                        <td><?php $timestamp = strtotime($menu->lastModifiedDate);
                                            $date = date('F-d-Y', $timestamp);
                                            echo $date ;
                                            ?>
                                        </td>
                                        <td>

                                            <div class="btn-group">
                                                <a class="btn" href="<?php echo base_url("Admin_Menu/editMenuView/")?><?php echo $menu->menuId ?>"><i class="icon_pencil-edit"></i></a>
                                                <a class="btn" data-panel-id="<?php echo $menu->menuId ?>"  onclick="selectid(this)" href="#"><i class="icon_trash"></i></a>
                                            </div>
                                        </td>

                                    </tr>


                                <?php }?>

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

<?php include ('js.php')?>
</body>
</html>
<script>
    function selectid(x) {
        if (confirm('Are you sure you want to delete this Menu ?')) {
            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin_Menu/deleteMenu/")?>'+btn,
                data:{'menuid':btn},
                cache: false,
                success:function(data) {
                    alert("Menu Deleted Successfully!!");
                    location.reload();
                }
            });
        }
        else {
            window.location="<?php echo base_url()?>Admin_Menu/ManageMenu";
        }
    }
</script>