<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('head.php') ?>
</head>

<body>
<!-- container section start -->
<section id="container" class="">
    <!--header start-->
    <?php include ('header.php')?>
    <!--header end-->

    <!--sidebar start-->
    <?php include ('sidebar.php')?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-files-o"></i> NewPage</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
                        <li><i class="icon_document_alt"></i>Page</li>
                        <li><i class="fa fa-files-o"></i>Create a new Page</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Page
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" id="feedback_form" method="post" action="<?php echo base_url()?>Admin_Page/insertPageSection">
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">Page</label>
                                        <div class="col-lg-10">
                                            <select class="form-control m-bot15" name="pagetitle">
                                                <option>Select Page</option>
                                               <?php foreach ($pagename as $pg) { ?>
                                                   <option value="<?php echo $pg->pageId?>"><?php echo $pg->pageTitle?></option>
                                                   <?php
                                               }
                                                ?>
                                            </select>
                                        </div>
                                    </div>



                                    <div id='TextBoxesGroup' class="form-group">

                                        <div id="TextBoxDiv1" class="form-group">
                                            <label class="control-label col-lg-2">Title #1 : </label>
                                            <div class="col-lg-10 form-group">
                                            <input class="form-control" type='textbox' id='textbox1' name="textbox[]" >
                                            </div>
                                                <label class="control-label col-lg-2">Content #1 : </label>
                                            <div class="col-sm-10 form-group">
                                                <textarea class="form-control ckeditor" id="ckeditor" name="text[]" rows="6"></textarea>
                                            </div>
                                                <label class="control-label col-lg-2">Image #1 : </label>
                                            <div class="col-lg-10 form-group">
                                            <input class="form-control" type='file' id='textserial1' name="textimage[]">
                                            </div>
                                            </div>
                                    </div>

                                    <div id="add_remove_button" class="form-group">
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-10 form-group">
                                        <input class="btn btn-sm btn-login" type='button' value='Add Section' id='addButton'>
                                        <input class="btn btn-sm" type='button' value='Remove Section' id='removeButton'>
                                    </div>
                                    </div>

                                    <div class="form-group " align="center">
                                        <div class="col-lg-10">
                                            <input class="btn btn-success" type="submit" style="margin-left: 180px">
                                            <input class="btn btn-close" type="reset" >
                                        </div>
                                    </div>

                            </div>

                            </form>
                        </div>
                </div>
        </section>
        </div>


        <!-- page end-->
    </section>
</section>
<!--main content end-->
<div class="text-right">
    <div class="credits">
        <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
        -->
        <a href="#">Icon College</a> by <a href="#">A2N</a>
    </div>
</div>
</section>
<!-- container section end -->

<!-- javascripts -->
<?php include ('js.php') ?>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
<script type="text/javascript" src="<?php echo base_url()?>public/ckeditor/ckeditor.js"></script>


<script type="text/javascript">
    $(document).ready(function(){
        var counter = 2;
        $("#addButton").click(function () {
             if(counter>30){
                alert("Only 10 textboxes allow");
                return false;
            }

            var newTextBoxDiv = $(document.createElement('div'))
                .attr("id", 'TextBoxDiv' + counter);
            newTextBoxDiv.after().html('<label class="control-label col-lg-2">Title #'+ counter + ' : </label>' +
                '<div class="col-lg-10 form-group">'+'<input class="form-control" type="text" name="textbox[]' + counter +
                '" id="textbox' + counter + '" value="" >'+'</div>' + '<label class="control-label col-lg-2">Content #'+ counter + ' : </label>' +
                '<div class="col-lg-10 form-group">'+'<textarea id="replace_element_'+counter+'" class="form-control ckeditor" rows="6" name="text[]' + counter +
                 + counter + '" value="" ></textarea>'+'</div>' + '<label class="control-label col-lg-2">Image #'+ counter + ' : </label>' +
                '<div class="col-lg-10 form-group">'+'<input class="form-control" type="file" name="textimage[]' + counter +
                '" id="textimage' + counter + '" value="" >'+'</div>'+'<br>'
            );
            newTextBoxDiv.appendTo("#TextBoxesGroup");
            CKEDITOR.replace( 'replace_element_' + counter );

            counter++;
        });
        $("#removeButton").click(function () {
            if(counter==1){
                alert("No more textbox to remove");
                document.getElementById('Item_price').style.display = "block";
                document.getElementById('add_remove_button').style.display = "none";
                return false;
            }
            counter--;
            $("#TextBoxDiv" + counter).remove();
        });
        $("#getButtonValue").click(function () {
            var msg = '';
            for(i=1; i<counter; i++){
                msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val()+"\n Textimage #" + i + " : " + $('#textimage' + i).val();
            }
          //  alert(msg);
        });
    });
</script>


<script>
    function load() {

    }
</script>


</body>
</html>
