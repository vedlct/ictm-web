
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
                    <a class="btn" href="<?php echo base_url()?>Admin_page/editPageSectionShow/<?php echo $pg->pageSectionId?>"><i class="icon_pencil-edit"></i></a>
                    <a class="btn " href="<?php echo base_url()?>"><i class="icon_trash"></i></a>
                </div>
            </td>
        </tr>
            <?php
        }
        ?>
    

    </tbody>
</table>