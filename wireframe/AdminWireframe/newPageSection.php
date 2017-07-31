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
                                <form class="form-validate form-horizontal" id="feedback_form" method="get" action="">
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">Page</label>
                                        <div class="col-lg-10">
                                            <select class="form-control m-bot15" name="level">
                                                <option>About </option>
                                                <option>College Life</option>
                                                <option>Health</option>
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
                                                <textarea class="form-control summernote"  rows="6"></textarea>
                                            </div>
                                                <label class="control-label col-lg-2">Image #1 : </label>
                                            <div class="col-lg-10 form-group">
                                            <input class="form-control" type='file' id='textserial1' name="textserial[]">
                                            </div>
                                            </div>
                                    </div>

                                    <div id="add_remove_button" class="form-group">
                                        <input type='button' value='Add Button' id='addButton'>
                                        <input type='button' value='Remove Button' id='removeButton'>
                                    </div>
<!--                                    <div class="form-group ">-->
<!--                                        <label for="cname" class="control-label col-lg-2">Title <span class="required">*</span></label>-->
<!--                                        <div class="col-lg-10">-->
<!--                                            <input class="form-control" id="cname" name="fullname"  type="text" required />-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="form-group ">-->
<!---->
<!--                                        <div class="form-group">-->
<!--                                            <label class="control-label col-sm-2">Content</label>-->
<!--                                            <div class="col-sm-10">-->
<!--                                                <textarea class="form-control summernote" name="editor1" rows="6"></textarea>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="form-group ">-->
<!--                                        <label for="curl" class="control-label col-lg-2">Image</label>-->
<!--                                        <div class="col-lg-10">-->
<!--                                            <input class="form-control " id="curl" type="file" name="url" />-->
<!--                                        </div>-->
<!--                                    </div>-->
<!---->
<!--                                    <div class="form-group">-->
<!--                                        <label class="control-label col-lg-2" for="inputSuccess">Page Status</label>-->
<!--                                        <div class="col-lg-10">-->
<!--                                            <select class="form-control m-bot15" name="level">-->
<!--                                                <option>Active</option>-->
<!--                                                <option>InActive</option>-->
<!--                                            </select>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!---->
<!---->
                                    <div class="form-group ">
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
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<!-- jquery validate js -->
<script type="text/javascript" src="js/jquery.validate.min.js"></script>

<!-- custom form validation script for this page-->
<script src="js/form-validation-script.js"></script>
<!--custome script for all page-->
<script src="js/scripts.js"></script>

<!--<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>-->
<!--<script src="http://cdn.ckeditor.com/4.7.1/standard-all/ckeditor.js"></script>-->
<!--<script>-->
<!--    CKEDITOR.replace( 'editor1', {-->
<!--        height: 300,-->
<!---->
<!--        // Configure your file manager integration. This example uses CKFinder 3 for PHP.-->
<!--        filebrowserBrowseUrl: '/ckfinder/ckfinder.html',-->
<!--        filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',-->
<!--        filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',-->
<!--        filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'-->
<!--    } );-->
<!--</script>-->
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
                '<div class="col-lg-10 form-group">'+'<textarea class="form-control summernote" rows="6" name="textimage[]' + counter +
                 + counter + '" value="" ></textarea>'+'</div>' + '<label class="control-label col-lg-2">Image #'+ counter + ' : </label>' +
                '<div class="col-lg-10 form-group">'+'<input class="form-control" type="file" name="textserial[]' + counter +
                '" id="textimage' + counter + '" value="" >'+'</div>'+'<br>'
            );
            newTextBoxDiv.appendTo("#TextBoxesGroup");
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

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>

</body>
</html>
