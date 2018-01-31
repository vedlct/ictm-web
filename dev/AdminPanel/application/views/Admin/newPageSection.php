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
                    <h3 class="page-header"><i class="fa fa-files-o"></i> New Page Section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="Admin/home.php">Home</a></li>
                        <li><i class="icon_document_alt"></i>Page Section</li>
                        <li><i class="fa fa-files-o"></i>Create a New Page Section</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->
            <?php if ($this->session->flashdata('errorMessage')!=null){?>
                <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
            <?php }?>

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Page
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" id="feedback_form" name="feedback_form" method="post" action="<?php echo base_url()?>Admin/PageSection/insertPageSection" onsubmit="return validate()" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">Page</label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('pageId'); ?></font></p>
                                            <select class="form-control m-bot15" id="pageId" name="pageId" required>
                                                <option value=""><?php echo SELECT_PAGE ?></option>
                                               <?php foreach ($pagename as $pg) { ?>
                                                   <option value="<?php echo $pg->pageId?>" <?php echo set_select('pageId',  $pg->pageId, False); ?>><?php echo $pg->pageTitle?></option>
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
                                            <input class="form-control" type='textbox' id='textbox1' name="textbox[]" value="<?php echo set_value('textbox[]'); ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <label class="control-label col-lg-2">Content #1 : </label>
                                            <div class="col-lg-10 ">
                                                <p><font color="red"> <?php echo form_error('text[0]'); ?></font></p>
                                                <textarea class="form-control ckeditor" id="ckeditor" name="text[]" value="<?php echo set_value('text[]'); ?>" rows="6"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">Order Number #1 : <span class="required">*</span></label>
                                            <div class="col-lg-10 ">
                                                <p><font color="red"> <?php echo form_error('ordernumber[]'); ?></font></p>
                                                <input class="form-control cls" type='number' id='ordernumber[0]' name="ordernumber[]" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <label class="control-label col-lg-2" for="inputSuccess">Page Section Status<span class="required">*</span></label>
                                            <div class="col-lg-10 ">
                                                <p><font color="red"> <?php echo form_error('status[]'); ?></font></p>
                                                <select class="form-control m-bot15" id="status1" name="status[]" required>

                                                    <option value="" selected><?php echo SELECT_STATUS ?></option>
                                                    <?php for ($i=0;$i<count(STATUS);$i++){?>
                                                        <option <?php echo set_select('status[]',  STATUS[$i], False); ?> ><?php echo STATUS[$i]?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="add_remove_button" class="form-group">
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-10 ">
                                        <input class="btn btn-sm btn-login" type='button' value='Add Section' id='addButton'>
                                        <input class="btn btn-sm" type='button' value='Remove Section' id='removeButton'>
                                    </div>
                                    </div>

                                    <div class="form-group " align="center">
                                        <div class="col-lg-10">
                                            <input class="btn btn-success" id="submit" type="submit" style="margin-left: 180px">
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
<!-- javascripts -->
<?php include('js.php') ?>


<script type="text/javascript" src="<?php echo base_url()?>public/ckeditor/ckeditor.js"></script>


<script type="text/javascript">

    function validate() {

        var mutliPhoto = document.feedback_form.elements["ordernumber[]"];
        var pageId=document.getElementById("pageId").value;
        var isOk = ["jh"];


        for(i=0;i<mutliPhoto.length;i++)
        {
            var ordernumber = document.getElementById(mutliPhoto[i]).value;
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url("Admin/PageSection/chkorderForCreatePageSection/")?>'+pageId+"/"+ordernumber,
                data: {},
                cache: false,
                async: false,
                success: function (data) {

                    if (data=="2")
                    {

                       // document.getElementById('submit').disabled= true;
                        //  document.getElementById('duplicateCat').style.display='block';
                        isOk.push("value") ;

                    }


                }
            });

        }
              if (isOk.length>0){
                alert("order Number "+ ordernumber + " Allready given for this Page!!");
                return false;
            }



    }



//    $(".cls").focusout( function(){
//
//        var pageId=document.getElementById("pageId").value;
//        var ordernumber = document.getElementById("ordernumber[" +(counter - 2)+ "]").value;
//
//
//        $.ajax({
//            type: 'GET',
//            url: '<?php //echo base_url("Admin/PageSection/chkorderForCreatePageSection/")?>//'+pageId+"/"+ordernumber,
//            data: {},
//            cache: false,
//            async: false,
//            success: function (data) {
//
//                if (data=="2")
//                {
//
//                   // document.getElementById('submit').disabled= true;
//                  //  document.getElementById('duplicateCat').style.display='block';
//                    isOk = true;
//
//                }
//                else {
//                   // document.getElementById('duplicateCat').style.display='none';
//                    document.getElementById('submit').disabled= false;
//                }
//
//
//            }
//        });
//        if (isOk){
//            alert("order Number "+ ordernumber + " Allready given for this Page!!");
//            return false;
//        }
//    });

    $(document).ready(function(){


        var counter = 2;
        $("#addButton").click(function () {
             if(counter>10){
                alert("Only 10 Page Section is allowed per Time!");
                return false;
            }

            if(counter == '2')
            {
                var title=document.getElementById("textbox1").value;
                var pageId=document.getElementById("pageId").value;
                var status=document.getElementById("status1").value;
                var isOk = false;
                if(pageId==""){alert("Please Select a Page First!!");
                    return false;
                }
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
                var ordernumber = document.getElementById("ordernumber[" +(counter - 2)+ "]").value;

                if(ordernumber==""){alert("Please Type Order Number First!!");
                    return false;
                }


                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url("Admin/PageSection/chkorderForCreatePageSection/")?>'+pageId+"/"+ordernumber,
                    data: {},
                    cache: false,
                    async: false,
                    success: function (data) {
                        if (data == "2"){

                            isOk = true;


                        }
                    }

                });
                if (isOk){
                    alert("order Number "+ ordernumber + " Allready given for this Page!!");
                    return false;
                }
            }
            else
            {

                var title=document.getElementById("textbox"+(counter-1)).value;
                var status=document.getElementById("status"+(counter-1)).value;
                var pageId=document.getElementById("pageId").value;
                if(pageId==""){alert("Please Select a Page First!!");
                    return false;
                }
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

                var ordernumber = document.getElementById("ordernumber[" +(counter - 1)+ "]").value;

                if(ordernumber==""){alert("Please Type Order Number First!!");
                    return false;
                }


                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url("Admin/PageSection/chkorderForCreatePageSection/")?>'+pageId+"/"+ordernumber,
                    data: {},
                    cache: false,
                    async: false,
                    success: function (data) {
                        if (data == "2"){

                            isOk = true;


                        }
                    }

                });
                if (isOk){
                    alert("order Number "+ ordernumber + " Allready given for this Page!!");
                    return false;
                }
            }

            var newTextBoxDiv = $(document.createElement('div'))
                .attr("id", 'TextBoxDiv' + counter);
            newTextBoxDiv.after().html('<label class="control-label col-lg-2">Title #'+ counter + ' :<span class="required">*</span> </label>' +
                '<div class="col-lg-10 ">'+'<p><font color="red"> <?php echo form_error('textbox[]'); ?></font></p>'+'<input class="form-control" type="text" name="textbox[]' + counter +
                '" id="textbox' + counter + '" value="" required >'+'</div>' + '<label class="control-label col-lg-2">Content #'+ counter + ' : </label>' +
                '<div class="col-lg-10">'+'<p><font color="red"> <?php echo form_error('text[]'); ?></font></p>'+'<textarea id="replace_element_'+counter+'" class="form-control ckeditor" rows="6" name="text[]' + counter +
                 + counter + '" value="" ></textarea>'+'</div>'+
                '<label class="control-label col-lg-2">Order Number #'+counter+' : <span class="required">*</span></label>'+
                '<div class="col-lg-10 ">'+
                '<p><font color="red"> <?php echo form_error('ordernumber[]'); ?></font></p>'+
                '<input class="form-control" type="number" id="ordernumber['+counter+']" name="ordernumber[]" required>'+
                '</div>'+
                '<label class="control-label col-lg-2" for="inputSuccess">Page Section Status #'+counter+'<span class="required">*</span></label>'+
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
                alert("Atleast One Page Section is needed!!");
                return false;
            }
            counter--;
            $("#TextBoxDiv" + counter).remove();
        });

    });
</script>

</body>
</html>
