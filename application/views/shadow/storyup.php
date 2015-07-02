<div class="container">
	<div class="row">
		<h1 class="text-info text-center" style="margin-bottom:40px">UPLOAD STORY</h1>
	</div>
	<div class="row">
		<h3 class="text-warning" >UPLOAD STORY IMAGES FOR A NEW STORY OR OVERWRITE AN EXISTING ONE</h3>
	</div>
	<div class="row">
		<h3 class="text-warning" >IF SPECIFIED FILE EXISTS IT WILL BE OVERWRITTEN</h3>
	</div>

	<?php echo form_open_multipart('shadow/story_upload',array('class'=>'form-horizontal','role'=>'form')) ?>
	<div class="form-group">
		<h3 class="col-sm-5 text-success">STORY</h3>
		<div class="col-sm-6">
			<select  name="story" class="form-control" >
					<?php foreach ($storydata as $story): ?>
					<?php if($level['active']==0): ?>
					<option value="<?php echo $story['storyid'].$story['imgid'] ?>"><?php echo 'Story '.$story['storyid'].' Image '.$story['imgid'] ?></option>
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