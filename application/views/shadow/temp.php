<div class="container">
	<div class="row">
		<h1 class="text-center text-info" style="margin-top:40px; margin-bottom:50px">MANAGE STORY</h1>
	</div>
	<div class="text-center">
		<h1 class="text-success ">CREATE STORY</h1>
	</div>
	<?php echo form_open('shadow/createstory',array('class'=>'form-horizontal','role'=>'form')) ?>
	<div class="row">
		<div class="text-center col-md-4 col-md-offset-4">		
			<select name="sourcelevel" class="form-control" style="margin-top:20px">
					<?php foreach ($nextstory as $story):
					 if($story['storyid']>0):?>
					 <option value="<?php echo  $story['storyid'].$story['imgid']  ?>"><?php echo 'Story '.$story['storyid'].' Image '.$story['imgid'] ?></option>
					 <?php endif;
 					  endforeach ?>
			</select>
		</div>
	</div>
	<div class="row">
	<div class="form-group" style="margin-top:30px">
		<div class="text-center">
			<button type="submit" class="btn btn-primary btn-lg">CREATE</button>
		</div>
	</div>
	</div>
	<?php echo form_close(); ?>
	<div class="text-center">
		<h1 class="text-danger ">DELETE STORY</h1>
	</div>
	<?php echo form_open('shadow/deletestory',array('class'=>'form-horizontal','role'=>'form')) ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">		
			<select name="sourcelevel" class="form-control" style="margin-top:20px">
					<?php foreach ($storydata as $story): ?>
					 <option value="<?php echo $story['storyid'].$story['imgid'] ?>"><?php echo 'Story '.$story['storyid'].' Image '.$story['imgid'] ?></option>
					 <?php endforeach ?>
			</select>
		</div>
	</div>
	<div class="row">
	<div class="form-group" style="margin-top:30px">
		<div class="text-center">
			<button type="submit" class="btn btn-primary btn-lg">DELETE</button>
		</div>
	</div>
	</div>
	<?php echo form_close(); ?>
	
</div>