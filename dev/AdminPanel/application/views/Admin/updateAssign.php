<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<div class="panel-body">
				<div class="form">

					<form class="form-validate form-horizontal" id="CreateNewUser" method="POST" action="<?php echo base_url() ?>Admin/User/EditAssignRole/<?php echo $userId; ?>" enctype="multipart/form-data" onsubmit="return checkvalidation()">
						<input type="hidden" name="userId" value="<?php echo $userId; ?>">

						<div class="form-group">
							<label class="control-label col-lg-2">Assign Role<span class="required">*</span></label>
							<div class="col-lg-4">

								<?php foreach ($menu as $menu){ ?>
									<input tabindex="8"  type="checkbox"  name="menuId[]" value="<?php echo $menu->id ?>"<?php foreach ($editUserRole as $role){ ?>{ <?php if($role->menuId=="$menu->id"){ echo "checked=checked";}?><?php } ?>>&nbsp;<?php echo $menu->menuName ?><br>

								<?php } ?>
							</div>
						</div>


						<div id="csrf">
							<input type="hidden"  name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
						</div>

						<div class="form-group "align="center">
							<div class="col-lg-10">
								<input class="btn btn-success" onclick="return ValidateEmail()" type="submit" value="Submit" style="margin-left: 180px">
							</div>
						</div>

				</div>
				</form>


			</div>

	</div>


<script>
    function ValidateEmail(){
        var userPassword = document.getElementById('userPassword').value;
        if (userPassword.length < 6) {
            alert('Please Enter at least 6 digit Password');
            return false; // keep form from submitting
        }

        var email=document.getElementById("userEmail").value;
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        if(email.match(mailformat))
        {
            return true;
        }
        else{
            alert("Email Address is in invalid format!");
            return false;
        }
    }
</script>



