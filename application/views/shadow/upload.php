<div class="container">
	<div class="row">
		<h1 class="text-info text-center" style="margin-bottom:40px">UPLOAD FILES</h1>
	</div>
	<div class="row">
		<h3 class="text-warning" >UPLOAD QUESTION AND FINISH IMAGES FOR A NEW LEVEL OR OVERWRITE AN EXISTING ONE</h3>
	</div>
	<div class="row">
		<h3 class="text-warning" >IF SPECIFIED FILE EXISTS IT WILL BE OVERWRITTEN</h3>
	</div>
	<div class="row">
		<h3 class="text-warning" style="margin-bottom:40px">LEVEL MUST BE DEACTIVATED FOR UPLOAD</h3>
	</div>
	<?php echo form_open_multipart('shadow/do_upload',array('class'=>'form-horizontal','role'=>'form')) ?>
	<div class= "form-group">
		<h3 class="col-sm-5 text-success">UPLOAD TYPE</h3>	
		<div class="col-sm-6">	
				<label class="text-warning checkbox-inline" style="font-size:25px">
					<input type="radio" name="uploadtype" id="new" value="1" checked>&nbspLEVEL IMAGE</label>

				<label class="text-info checkbox-inline" style="font-size:25px">
					<input type="radio" name="uploadtype" id="overwrite" value="2">&nbspFINISH IMAGE</label>
		</div>	
	</div>
	<div class="form-group">
		<h3 class="col-sm-5 text-success">LEVEL</h3>
		<div class="col-sm-6">
			<select  name="level" class="form-control" >
					<?php foreach ($leveldata as $level): ?>
					<?php if($level['active']==0): ?>
					<option value="<?php echo $level['level'] ?>"><?php echo 'Level '.$level['level'] ?></option>
					<?php endif; ?>
					<?php endforeach ?>

			</select>
		</div>
	</div>
	<div class="form-group">
		<h3 class="col-sm-5 text-success">IMAGE</h3>
		<input class="col-sm-6" type="file" name="userfile">
	</div>
	<div class="form-group" style="margin-top:30px">
		<div class="col-sm-offset-5 col-sm-4">
			<button type="submit" class="btn btn-primary btn-lg">UPLOAD</button>
		</div>
	</div>
	<?php echo form_close(); ?> 
</div>