		
		<?php include("header.php"); ?>

        <!-- for Event Calendar -->
        <link href='<?php echo base_url()?>/public/stylesheets/fullcalendar.min.css' rel='stylesheet' />
        <link href='<?php echo base_url()?>/public/stylesheets/fullcalendar.print.min.css' rel='stylesheet' media='print' />
        <!-- for Event Calendar End-->
        
        <script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listWeek'
			},
			defaultDate: '<?php echo date('Y-m-d')?>',
			navLinks: true, // can click day/week names to navigate views
			editable: false,
			eventLimit: true, // allow "more" link when too many events

			events: [
                <?php foreach ($allEvents as $events){?>
				{
				    id:'<?php echo $events->eventId;?>',
					title: '<?php echo $events->eventTitle;?>',
                    url: '<?php echo base_url()?>/Event-Details/<?php echo $events->eventId;?>',
					start: '<?php echo preg_replace("/ /","T",date('Y-m-d H:i:s',strtotime($events->eventStartDate)),1);?>',
                    end: '<?php echo preg_replace("/ /","T",date('Y-m-d H:i:s',strtotime($events->eventEndDate)),1);?>',
				},

                <?php }?>
			]

		});

	});

</script>

        <style>

            body {


                font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
                font-size: 14px;
            }


        </style>

        <div class="page-title full-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2 class="title">ICON Events</h2>
                        </div>
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home"><a href="<?php echo base_url()?>Home">Home </a></li>
                                <li>\ News & Events</li>
                            </ul>                   
                        </div>                  
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- /page-title -->

        <section class="flat-row padding-v1">
            <div class="container">
                <div class="row">
                <div id='calendar'></div>
                    <div id='calendar'></div>
                </div>
            </div>
        </section>

		<?php include("footer.php"); ?>
        
    </div>
</body>

</html>

        <!-- for Event Calendar -->
        <script src='<?php echo base_url()?>/public/javascript/jquery.min.js'></script>
        <script src='<?php echo base_url()?>/public/javascript/moment.min.js'></script>
        <script src='<?php echo base_url()?>/public/javascript/fullcalendar.min.js'></script>
        <!-- for Event Calendar End-->
