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

<div class="container">
	<div class="row">
		<h1 class="text-center text-info" style="margin-top:40px; margin-bottom:50px">MANAGE LEVELS</h1>
	</div>
	<div class="text-center">
		<a href="<?php echo base_url('index.php/shadow/createlevel')?>" class="btn btn-lg btn-success ">CREATE LEVEL <?php echo $nextlevel ?></a>
	</div>
	<?php if($state==0):?>
	<div class="row">
		<h1 class="text-danger" style="margin-top:50px; margin-bottom:20px">ACTIVATE SITE TO ACTIVATE LEVELS</h1>
	</div>

   <?php endif;?>
   	<div class="row">
		<h2 class="text-center text-info" style="margin-top:50px; margin-bottom:20px">LEVEL DETAILS</h2>
	</div>
	<div class="row">
		<h3 class="text-warning" style="margin-bottom:10px">CRACKED LEVELS CANNOT BE DEACTIVATED INDIVIDUALLY</h3>
	</div>
	<?php foreach ($leveldata as $level): ?>
	<?php 
		$clsact='';
		$clsdeact='';
		if($level['level']<$top)
		{
			$clsdeact='disabled';
			$clsact='disabled';
		}
		else if($level['active']==1)
		{
			$clsact='disabled';
		}
		else if($level['active']==0)
		{
			$clsdeact='disabled';
		}
		if($state==0)
		{
			$clsact='disabled';
		}
		?>
		<div class="row">
			<h2 class="text-success" style="margin-top:20px; margin-bottom:20px">Level <?php echo $level['level'] ?></h2>
		</div>

		<div class="row">
			<img src="<?php echo base_url('index.php/shadow/shadowaccess/'.$level['question']) ?>"
      		class="img-rounded col-xs-8 col-sm-4 col-sm-offset-1 " style="border-style:solid; border-color:#0bffff; border-width:2px">
      		<div class="col-xs-4 col-sm-2 col-md-2 col-lg-4">
      			<div class="container">
      			<div><a href="<?php echo base_url('index.php/shadow/leveledit?level='.$level['level'])?>" class="btn btn-lg btn-primary">EDIT LEVEL&nbsp</a></div>
      			<div><a href="<?php echo base_url('index.php/shadow/levelact?level='.$level['level'].'&active=1')?>" class="<?php echo $clsact ?> btn btn-lg btn-success" style="margin-top:10px">&nbsp ACTIVATE &nbsp</a></div>
      			<div><a href="<?php echo base_url('index.php/shadow/levelact?level='.$level['level'].'&active=0')?>" class="<?php echo $clsdeact ?> btn btn-lg btn-danger" style="margin-top:10px">DEACTIVATE</a></div>      			
				</div>
      		</div>
		</div>
		<div class="row">
		</div>
	<?php endforeach ?>
</div>