<div class="container">
	<div class="row text-center">
		<h1>
			<b><i>Clues For <?php echo "Level ".$clue_data['level']?></i></b>
		</h1>
	</div>
	<ul>
		<div class="row" style="margin-top:30px">			
			<?php if($clue_data['clue_status']>0):?>
				<h1 class="col-sm-3">Clue 1 </h1>
				<h1 class="col-sm-9 " >: <?php echo $clue_data['clue1']?></h1>
			<?php else: ?>
				<h1 class="text-center" style="margin-top:40px">Clues Will Be Updated Soon</h1>
			<?php endif; ?>
		</div> 
		<div class="row" >	
			<?php if($clue_data['clue_status']>1):?>
				<h1 class="col-sm-3">Clue 2 </h1>
				<h1 class="col-sm-9">: <?php echo $clue_data['clue2']?></h1>
			<?php endif; ?>
		</div>
		<div class="row" >
			<?php if($clue_data['clue_status']>2):?>
				<h1 class="col-sm-3">Clue 3 </h1>
				<h1 class="col-sm-9">: <?php echo $clue_data['clue3']?></h1>
			<?php endif; ?>
		</div>
		<div class="row" >
			<?php if($clue_data['clue_status']>3):?>
				<h1 class="col-sm-3">Giveaway Clue</h1>
				<h1 class="col-sm-9">: <?php echo $clue_data['clue4']?></h1>
			<?php endif; ?>
		</div>
	</ul>
</div>
