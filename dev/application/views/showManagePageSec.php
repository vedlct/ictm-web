
<table class="table table-striped table-advance table-bordered table-hover ">
    <tbody>
    <tr>
        <th> Page Section Title </th>
        <th> Action</th>
    </tr>

        <?php foreach ($pagedata as $pg) { ?>
    <tr>
            <td><?php echo $pg->pageSectionTitle ?></td>
            <td>
                <div class="btn-group">
                    <a class="btn" href="#"><i class="icon_pencil-edit"></i></a>
                    <a class="btn "data-panel-id="<?php echo $pg->pageSectionId ?>"onclick="selectid(this)" href="#"><i class="icon_trash"></i></a>
                </div>
            </td>
        </tr>
            <?php
        }
        ?>
    

    </tbody>
</table>
<script>
    function selectid(x) {
        if (confirm('Are you sure you want to delete this Page Section !! ?')) {
            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin_Page/deletePageSection/")?>'+btn,
                data:{'pageId':btn},
                cache: false,
                success:function(data) {
                    alert("Page Section Deleted Successfully!!");
                    location.reload();
                }
            });
        }
        else {

            location.reload();
        }
    }
</script>