<div class="table table-responsive">
    <table class="table table-striped table-advance  table-bordered table-hover " id="myTable">
        <thead>
        <tr>
            <th style="background-color: #394A59; color: whitesmoke; text-align: left">  No</th>
            <th style="background-color: #394A59; color: whitesmoke; text-align: left">  Photo</th>
            <th style="background-color: #394A59; color: whitesmoke; text-align: left" >Photo Status</th>
            <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Photo Inserted By</th>
            <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Last Modified By</th>
            <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Last Modified Date (d-m-Y)</th>
            <th style="background-color: #394A59; color: whitesmoke; text-align: left"> Album Cover</th>
            <th style="background-color: #394A59; color: whitesmoke; text-align: left">  Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<?php //echo $id;?>


<script>

    var table;
    var id='<?php echo $id?>';

    $(document).ready(function() {

        //datatables
        table = $('#myTable').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "searching": false,  //Feature Search DataTables' off.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url('Admin/Photo/ajax_list/')?>"+id,
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [ 0,2,3,4,5,6,7,], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],



        });

    });


    function selectid(x) {
        if (confirm("Are you sure you want to delete this Photo?")) {
            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/Photo/deletePhoto/")?>'+btn,
                data:{},
                cache: false,
                success:function(data) {
                    location.reload();
                }
            });
        }
    }
    function albumCover(x) {
        if (confirm("Are you sure ?")) {
            btn = $(x).data('panel-id');
            //var albumId=$(x).data(btn);
           // alert(btn);
            var albumId = document.getElementById("albumCovers").value;
            //alert(albumId);
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/Photo/albumCover/")?>'+btn,
                data:{album:albumId},
                cache: false,
                success:function(data) {
                    if (data=='1'){
                        alert('Photo Added as a Album Cover Successfully');
                    }
                    else if(data=='0'){
                        alert('Photo as a Album Cover Removed Successfully');
                    }
                    else if(data=='3'){
                        alert('Allready 1 Photo in the Album Cover');
                    }
                    location.reload();
                }
            });
        }
        else {
            location.reload();
        }
    }
</script>