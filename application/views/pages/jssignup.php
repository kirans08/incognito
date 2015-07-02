<h2 class="text-center" style="margin-top:30px; margin-bottom:60px">Please Fill In The Below Details</h2>
<?php echo validation_errors(); ?>
<?php echo form_open('pages/jscreate',array('class'=>'form-horizontal','role'=>'form')) ?>
	<div class="form-group">
		<div class="hidden">
			<input type="text" class="form-control" name="userid" value="<?php echo $userid ?>">
		</div>
	</div>
	<div class="form-group">
		<div class="hidden">
			<input type="text" class="form-control" name="name" value="<?php echo $name ?>">
		</div>
	</div>
	<div class="form-group">
		<div class="hidden">
			<input type="text" class="form-control" name="userprofile" value="<?php echo $userprofile ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="college" class="col-sm-2 col-sm-offset-2 control-label">College</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="college"
				placeholder="Enter College Name">
		</div>
	</div>
	<div class="form-group">
		<label for="emailid" class="col-sm-2 col-sm-offset-2 control-label">Email Id</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="emailid"
				placeholder="Enter Email Id">
		</div>
	</div>
	<div class="form-group">
		<label for="mobile" class="col-sm-2 col-sm-offset-2 control-label">Mobile No</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="mobileno"
				placeholder="Enter Moblie No">
		</div>
	</div>
	<div class="form-group" style="margin-top:30px">
		<div class="col-sm-offset-5 col-sm-4">
			<button type="submit" class="btn btn-success btn-lg">Sign Up</button>
		</div>
	</div>
<?php echo form_close(); ?>
