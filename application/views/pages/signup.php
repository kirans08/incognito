<h2 class="text-center  Dagger" style="margin-top:30px; margin-bottom:60px">Please Fill In The Below Details</h2>
<?php echo validation_errors(); ?>
<?php echo form_open('pages/create',array('class'=>'form-horizontal','role'=>'form')) ?>
	<div class="form-group">
		<label for="college" class="col-sm-2 col-sm-offset-2 control-label Dagger">College</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="college"
				placeholder="Enter College Name">
		</div>
	</div>
	<div class="form-group">
		<label for="emailid  Dagger" class="col-sm-2 col-sm-offset-2 control-label">Email Id</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="emailid"
				placeholder="Enter Email Id">
		</div>
	</div>
	<div class="form-group">
		<label for="mobile Dagger" class="col-sm-2 col-sm-offset-2 control-label">Mobile No</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="mobileno"
				placeholder="Enter Moblie No">
		</div>
	</div>
	<div class="form-group" style="margin-top:30px">
		<div class="col-sm-offset-5 col-sm-4 Dagger">
			<button type="submit" class="btn btn-success btn-lg">Sign Up</button>
		</div>
	</div>
<?php echo form_close(); ?>
<div class="container">
	<div class="row mt40" >
		<h3 class="text-center colred  Dagger">College Field Is Mandatory&nbsp&nbsp&nbsp</h3>
	</div>
</div>
