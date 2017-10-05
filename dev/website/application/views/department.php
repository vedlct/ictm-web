		
        <?php include("header.php"); ?>

        <div class="page-title full-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <?php foreach ($dDeteails as $dd) {?>
                            <h2 class="title"><?php echo $dd->departmentName?></h2>
                        <?php } ?>
                        </div>
                        <div class="breadcrumbs">
                            <ul>
                                <?php foreach ($dDeteails as $dd) {?>
                                <li class="home"><a href="#">Home </a></li>
                                <li>\ <?php echo $dd->departmentName?></li>
                                <?php } ?>
                            </ul>                   
                        </div>                  
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- /page-title -->

        <section class="flat-row padding-small-v1">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
	
                        	<div class="course-detail-section content-dropcap">
                             	<?php foreach ($dDeteails as $dd) {?>
                                    <?php echo $dd->departmentSummary?>
                                <?php } ?>
                            </div>
                            
<!--                            <div class="table-responsive course-detail-section">-->
<!--                            	<table class="table table-bordered">-->
<!--                                	<thead>-->
<!--                                    	<tr>-->
<!--                                        	<th>Course Title</th>-->
<!--                                            <th>Awarding Body</th>-->
<!--                                            <th>Duration</th>-->
<!--                                        </tr>-->
<!--                                    </thead>-->
<!--                                    <tbody>-->
<!--                                    	<tr>-->
<!--                                        	<td><a href="course-detail.php">BTEC Level 5 HND in Business</a></td>-->
<!--                                            <td>Pearson</td>-->
<!--                                            <td>2 Years</td>-->
<!--                                        </tr>-->
<!--                                    </tbody>-->
<!--                                </table>-->
<!--                            </div>-->

                    </div><!-- /col-md-9 -->

                    <div class="col-md-3">
                        <div class="sidebar">

                            <div class="widget widget-courses">
                                    <h2 class="widget-title">COURSES LIST</h2>
                                    <?php include("course-sidebar.php"); ?>
                                </div><!-- /widget-posts -->

                        </div><!-- sidebar -->
                    </div><!-- /col-md-3 -->
                </div>
            </div>
        </section>

		<?php include("footer.php"); ?>
                 
    </div>
</body>

</html>