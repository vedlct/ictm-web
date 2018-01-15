<div class="table table-responsive" style="overflow-x: inherit">

    <table class="table table-striped table-advance table-bordered table-hover " id="myTable">
        <thead>
        <tr>
            <th style="background-color: #394A59; color: whitesmoke; text-align:left; width: 3%">  No </th>
            <th style="background-color: #394A59; color: whitesmoke; text-align:left;">  Page Section Title </th>
            <th style="background-color: #394A59; color: whitesmoke; text-align:left;width: 4%" > O N</th>
            <th style="background-color: #394A59; color: whitesmoke; text-align:left;width: 8%"> Status </th>
            <th style="background-color: #394A59; color: whitesmoke; text-align:left; "> Inserted By </th>
            <th style="background-color: #394A59; color: whitesmoke; text-align:left; "> Last Modified By </th>
            <th style="background-color: #394A59; color: whitesmoke; text-align:left; width: 8%"> Last Modified Date (d-m-Y) </th>
            <th style="background-color: #394A59; color: whitesmoke; text-align: center;width: 8%"> Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>

    </table>

</div>

<script>

    var table;
    var id='<?php echo $id?>';

    $(document).ready(function() {

        //datatables
        table = $('#myTable').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
//            "searching": false,  //Feature Search DataTables' off.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url('Admin/PageSection/ajax_list/')?>"+id,
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [ 0,3,4,5,6,7], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],
            //for change search name
            "oLanguage": {

                "sSearch": "<span>Search By Page Section Title:</span> " //search

            }



        });

    });
</script>
