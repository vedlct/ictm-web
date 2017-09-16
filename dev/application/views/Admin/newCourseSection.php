<!DOCTYPE html>
<html lang="en">
<head>
    <!-- view head ----->
    <?php include('head.php') ?>
    <!-- view head  end----->
</head>

<body>
<!-- container section start -->
<section id="container" class="">
    <!--header start-->
    <?php include ('topNavigation.php')?>
    <!--header end-->

    <!--sidebar start-->
    <?php include('leftNavigation.php') ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-files-o"></i> New Course Section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="icon_document_alt"></i>Course Section</li>
                        <li><i class="fa fa-files-o"></i>Create a New Course Section</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->

            <?php if ($this->session->flashdata('errorMessage')!=null){?>
                <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
            <?php }
            elseif($this->session->flashdata('successMessage')!=null){?>
                <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
            <?php }?>

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            New Course Section
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" id="feedback_form" method="post" action="<?php echo base_url()?>Admin/CourseSection/insertCourseSec" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">Course Title<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('coursetitle'); ?></font></p>
                                            <select class="form-control m-bot15" name="coursetitle" required>
                                                <option value=""><?php echo SELECT_COURSE?></option>
                                                <?php foreach ($coursetitle as $ct) { ?>
                                                    <option value="<?php echo $ct->courseId?>"><?php echo $ct->courseTitle?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div id='TextBoxesGroup' >
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">Title #1 : <span class="required">*</span></label>
                                            <div class="col-lg-10 ">
                                                <p><font color="red"> <?php echo form_error('textbox[]'); ?></font></p>
                                                <input class="form-control" type='textbox' id='textbox1' name="textbox[]" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">Content #1 : </label>
                                            <div class="col-lg-10 ">
                                                <p><font color="red"> <?php echo form_error('text[]'); ?></font></p>
                                                <textarea class="form-control ckeditor" id="ckeditor" name="text[]" rows="6"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-2" for="inputSuccess">Course Section Status<span class="required">*</span></label>
                                            <div class="col-lg-10 ">
                                                <p><font color="red"> <?php echo form_error('status[]'); ?></font></p>
                                                <select class="form-control m-bot15" id="status1" name="status[]" required>

                                                    <option value="" selected><?php echo SELECT_STATUS ?></option>
                                                    <?php for ($i=0;$i<count(STATUS);$i++){?>
                                                        <option><?php echo STATUS[$i]?></option>
                                                    <?php } ?>

                                                </select>
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
<div class="text-right wrapper">
    <div class="credits">
        <a href="#">Icon College</a> by <a href="#">A2N</a>
    </div>
</div>

</section>
<!-- container section end -->

<?php include ('js.php')?>


<script type="text/javascript" src="<?php echo base_url()?>public/ckeditor/ckeditor.js"></script>


<script type="text/javascript">
    $(document).ready(function(){
        var counter = 2;
        $("#addButton").click(function () {
            if(counter>10){
                alert("Only 10 Course Section allow per Time!!");
                return false;
            }
            if(counter == '2')
            {
                var title=document.getElementById("textbox1").value;
                var status=document.getElementById("status1").value;
                if(title==""){alert("Please Type Section Title First!!");
                    return false;
                }
                if (title.length > 255){
                    alert("Section Title Should not more than 255 Charecter Length");
                    return false;
                }
                if(status==""){alert("Please Select Section Status First!!");
                    return false;
                }
            }
            else
            {

                var title=document.getElementById("textbox"+(counter-1)).value;
                var status=document.getElementById("status"+(counter-1)).value;
                if(title==""){alert("Please Type Section Title First!!");
                    return false;
                }
                if (title.length > 255){
                    alert("Section Title Should not more than 255 Charecter Length");
                    return false;
                }
                if(status==""){alert("Please Select Section Status First!!");
                    return false;
                }
            }

            var newTextBoxDiv = $(document.createElement('div'))
                .attr("id", 'TextBoxDiv' + counter);
            newTextBoxDiv.after().html('<label class="control-label col-lg-2">Title #'+ counter + ' :<span class="required">*</span> </label>' +
                '<div class="col-lg-10 ">'+'<p><font color="red"> <?php echo form_error('textbox[]'); ?></font></p>'+'<input class="form-control" type="text" name="textbox[]' + counter +
                '" id="textbox' + counter + '" value="" required >'+'</div>' + '<label class="control-label col-lg-2">Content #'+ counter + ' : </label>' +
                '<div class="col-lg-10">'+'<p><font color="red"> <?php echo form_error('text[]'); ?></font></p>'+'<textarea id="replace_element_'+counter+'" class="form-control ckeditor" rows="6" name="text[]' + counter +
                + counter + '" value="" ></textarea>'+'</div>'
                +'<label class="control-label col-lg-2" for="inputSuccess">Course Section Status #'+counter+'<span class="required">*</span></label>'+
                '<div class="col-lg-10">'+'<p><font color="red"> '+'<?php echo form_error('status[]'); ?>'+'</font></p>'+'<select class="form-control m-bot15" id="status'+counter+'"name="status[]" required>' +
                '<option value="" selected><?php echo SELECT_STATUS ?></option>'+'<?php for ($i=0;$i<count(STATUS);$i++){?>'+
                '<option><?php echo STATUS[$i]?></option>'+
                '<?php } ?>'+'<br>'
            );
            newTextBoxDiv.appendTo("#TextBoxesGroup");
            CKEDITOR.replace( 'replace_element_' + counter );

            counter++;
        });
        $("#removeButton").click(function () {
            if(counter=='2'){
                alert("Atleast One Course Section is needed!!");
                return false;
            }
            counter--;
            $("#TextBoxDiv" + counter).remove();
        });

    });
</script>

</body>
</html>
