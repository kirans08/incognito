<div class="container">
	<div class="row">
		<h1 class="col-sm-3 col-sm-offset-2 Dagger">NAME </h1>
		<h1 class="col-sm-7 Dagger">: <?php echo $userdata['name']?></h1>
	</div>
	<div class="row">
		<h1 class="col-sm-3 col-sm-offset-2 Dagger">COLLEGE </h1>
		<h1 class="col-sm-7 Dagger">: <?php echo $userdata['college']?></h1>
	</div>
	<div class="row">
		<h1 class="col-sm-3 col-sm-offset-2 Dagger">RANK </h1>
		<h1 class="col-sm-7 Dagger">: <?php echo $rank?></h1>
	</div>
	<div class="row">
		<h1 class="col-sm-3 col-sm-offset-2 Dagger">LEVEL </h1>
		<h1 class="col-sm-7 Dagger">: <?php echo $userdata['level']?></h1>
	</div>
	<div class="row">
		<h1 class="col-sm-3 col-sm-offset-2 Dagger">Email ID </h1>
		<h1 class="col-sm-7 Dagger">: <?php echo $userdata['emailid']?></h1>
	</div>
	<div class="row">
		<h1 class="col-sm-3 col-sm-offset-2 Dagger">MOBILE NO</h1>
		<h1 class="col-sm-7 Dagger">: <?php echo $userdata['mobileno']?></h1>
	</div>  
	<div class="row">
		<?php if($userdata['status']==2) :?>
			<div class="text-center mt40" >
				<a href="<?php echo base_url('index.php/shadow/status')?>" class="btn btn-lg btn-success" role="button">ADMIN LOGIN</a>
			</div>
		<?php endif; ?>
	</div>
</div>