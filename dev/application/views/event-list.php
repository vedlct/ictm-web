		
		<?php include("header.php"); ?>

        <!-- for Event Calendar -->
        <link href='stylesheets/fullcalendar.min.css' rel='stylesheet' />
        <link href='stylesheets/fullcalendar.print.min.css' rel='stylesheet' media='print' />
        <!-- for Event Calendar End-->
        
        <script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listWeek'
			},
			defaultDate: '2017-08-3',
			navLinks: true, // can click day/week names to navigate views
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: [
				{
					title: 'All Day Event',
					start: '2017-08-03'
				},
				{
					title: 'Long Event',
					start: '2017-05-07',
					end: '2017-05-10'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2017-08-03'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2017-08-16T16:00:00'
				},
				{
					title: 'Conference',
					start: '2017-08-11',
					end: '2017-08-13'
				},
				{
					title: 'Meeting',
					start: '2017-08-12T10:30:00',
					end: '2017-08-12T12:30:00'
				},
				{
					title: 'Lunch',
					start: '2017-05-12T12:00:00'
				},
				{
					title: 'Meeting',
					start: '2017-05-12T14:30:00'
				},
				{
					title: 'Happy Hour',
					start: '2017-05-12T17:30:00'
				},
				{
					title: 'Dinner',
					start: '2017-05-12T20:00:00'
				},
				{
					title: 'Birthday Party',
					start: '2017-05-13T07:00:00'
				},
				{
					title: 'Click for Google',
					url: 'http://google.com/',
					start: '2017-05-28'
				}
			]
		});

	});

</script>

        <style>

            body {
                margin: 40px 10px;
                padding: 0;
                font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
                font-size: 14px;
            }

            #calendar {
                max-width: 900px;
                margin: 0 auto;
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
                                <li class="home"><a href="#">Home </a></li>
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



<!-- Mirrored from corpthemes.com/html/university/event-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 July 2017 06:01:27 GMT -->
</html>

        <!-- for Event Calendar -->
        <script src='javascript/jquery.min.js'></script>
        <script src='javascript/moment.min.js'></script>
        <script src='javascript/fullcalendar.min.js'></script>
        <!-- for Event Calendar End-->
