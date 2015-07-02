<div class="container">
	<div class="row">
		<h1 class="text-info text-center" style="margin-bottom:40px">SWAP LEVELS</h1>
	</div>
	<div class="row">
		<h3 class="text-warning" style="margin-bottom:40px">ONLY DEACTIVATED LEVELS CAN BE SWAPPED</h3>
	</div>
	<?php echo form_open('shadow/swaplevels',array('class'=>'form-horizontal','role'=>'form')) ?>
	<div class="row">
		<div class="col-sm-5 form-group">
			<div class="text-success" style="font-size:25px">
				SOURCE LEVEL
			</div>			
			<select name="sourcelevel" class="form-control">
					<?php foreach ($leveldata as $level): ?>
					<?php if($level['active']==0): ?>
					 <option value="<?php echo $level['level'] ?>"><?php echo 'Level '.$level['level'] ?></option>
					 <?php endif; ?>
					 <?php endforeach ?>
			</select>





		</div>
		<div class="col-sm-2">

		</div>
		<div class="col-sm-5 form-group">		
			<div class="text-success" style="font-size:25px">
				TARGET LEVEL
			</div>			
			<select name="targetlevel" class="form-control">
					<?php foreach ($leveldata as $level): ?>
					<?php if($level['active']==0): ?>
					 <option value="<?php echo $level['level'] ?>"><?php echo 'Level '.$level['level'] ?></option>
					 <?php endif; ?>
					 <?php endforeach ?>
			</select>
			
		</div>
	</div>
	<div class="form-group" style="margin-top:30px">
		<div class="col-sm-offset-5 col-sm-4">
			<button type="submit" class="btn btn-primary btn-lg">SWAP</button>
		</div>
	</div>
	<?php echo form_close(); ?>
</div>