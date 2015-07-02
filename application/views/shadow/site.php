<div class="container">
	<div class="row">
		<h1 class="text-info text-center" style="margin-bottom:40px">MANAGE SITE</h1>
	</div>
	<?php 
	$state='0';
	foreach($leveldata as $level)
	{
		if($level['active']==1)
		{
			$state='1';
			break;
		}
	} ?>
	<?php if($state=='1'): ?>
	<div class="row">
		<h2 class="text-success text-center" style="margin-bottom:40px">SITE IS CURRENTLY IN ACTIVATED STATE</h2>
	</div> 
	<div class="row">
		<h3 class="text-warning text-center" style="margin-bottom:40px">CLICK BELOW TO DEACTIVATE ALL THE QUESTIONS</h3>
	</div>
	<div class="row">
		<div class="text-center">
			<a href="<?php echo base_url('index.php/shadow/deact') ?>" class="btn btn-lg btn-danger text-center">DEACTIVATE</a>
		</div>
	</div>
	<?php elseif ($state=='0'): ?>
	<div class="row">
		<h2 class="text-danger text-center" style="margin-bottom:40px">SITE IS CURRENTLY IN DEACTIVATED STATE</h2>
	</div> 
	<div class="row">
		<h3 class="text-warning text-center" style="margin-bottom:40px">CLICK BELOW TO ACTIVATE ALL THE QUESTIONS</h3>
	</div>
	<div class="row">
		<div class="text-center">
			<a href="<?php echo base_url('index.php/shadow/act') ?>" class="btn btn-lg btn-success">ACTIVATE</a>
		</div>
	</div>
	<?php endif; ?>

</div>