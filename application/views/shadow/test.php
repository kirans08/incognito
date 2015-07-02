<div class="container">
	<div class="row">
		<h1 class="text-info text-center" style="margin-bottom:40px">TEST LEVEL</h1>
	</div>
	<div class="row">
		<h3 class="text-warning text-center" >SELECT A LEVEL FROM BELOW AND CLICK TEST TO CHECK ITS ANSWER AND CLUES</h3>
	</div>

	<?php echo form_open('shadow/testlevel',array('class'=>'form-horizontal','role'=>'form')) ?>
	<div class="row">
		<div class="text-primary text-center" style="font-size:30px;margin-top:40px;margin-bottom:30px">
			SELECT THE REQUIRED LEVEL
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
		</div>
		<div class="col-sm-4 form-group">
			<select name="testlevel" class="form-control">
				<option value="0">&nbsp</option>
				<?php foreach ($leveldata as $level): ?>
					 <option value="<?php echo $level['level'] ?>"><?php echo 'Level '.$level['level'] ?></option>
				 <?php endforeach ?>
			</select>
		</div>	
	</div>
	<div class="form-group" style="margin-top:30px">
		<div class="text-center">
			<button type="submit" class="btn btn-success btn-lg">TEST</button>
		</div>
	</div>
	<?php echo form_close(); ?>
</div>
