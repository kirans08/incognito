<div class="container">
	<div class="row">
		<h1 class="text-info text-center" style="margin-bottom:40px">FORCE RESET</h1>
	</div>
	<div class="row">
		<h1 class="text-danger" style="margin-bottom:40px; font-size:60px">WARNING !</h1>
	</div>
	<div class="row">
		<h2 class="text-warning" >CURRENT LEVEL OF ALL THE USERS ABOVE THE SPECIFIED LEVEL WILL BE RESET TO SPECIFIED LEVEL </h2>
	</div>
	<div class="row">
		<h2 class="text-warning" >THE SPECIFIED LEVEL WILL BE SET TO A DEACTIVATED STATE </h2>
	</div>
	<?php echo form_open('shadow/resetlevels',array('class'=>'form-horizontal','role'=>'form')) ?>
	<div class="row">
		<div class="text-primary text-center" style="font-size:30px;margin-top:40px;margin-bottom:30px">
			SELECT THE REQUIRED LEVEL
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">
		</div>
		<div class="col-sm-4 form-group">
			<select name="resetlevel" class="form-control">
				<option value="0">&nbsp</option>
				<?php foreach ($leveldata as $level): ?>
				<?php if($level['level']<$top): ?>
					 <option value="<?php echo $level['level'] ?>"><?php echo 'Level '.$level['level'] ?></option>
				 <?php endif; ?>
				 <?php endforeach ?>
			</select>
		</div>	
	</div>

	<div class="form-group" style="margin-top:30px">
		<div class="text-center">
			<button type="submit" class="btn btn-primary btn-lg">RESET</button>
		</div>
	</div>
	<?php echo form_close(); ?>
</div>
