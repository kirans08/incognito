<div class="container">

	

		<h1 class=" text-center text-info" >CREATE STORY</h1>

		<div class="text-center" style="margin-top:30px">

			<?php if($cur!=NULL):?>

		<a href="<?php echo base_url('index.php/shadow/createcur') ?>" class="btn btn-primary btn-lg "   >Create Story <?php echo $cur['storyid']?> Image <?php echo $cur['imgid'] ?></a>

		<?php endif;?>

	

		</div>

<h2 class=" text-center text-info" style="margin-top:50px">SELECT LEVEL BEFORE WHICH STORY WILL APPEAR</h1>

	<?php echo form_open('shadow/createnext',array('class'=>'form-horizontal','role'=>'form')) ?>

    <div class="form-group">

		<select  name="level" class="form-control center-block" style="margin-top:30px;max-width:500px">

					<?php $rev=array_reverse($leveldata);

					 foreach ($rev as $level): ?>

					<?php if($level['level']>$cur['level']): ?>

					<option value="<?php echo $level['level'] ?>"><?php echo 'Level '.$level['level'] ?></option>

					<?php endif; ?>

					<?php endforeach ?>

			</select>

	</div>

	<button type="submit" class=" btn btn-primary btn-lg center-block ">Create Story <?php echo $next['storyid']?> Image <?php echo $next['imgid'] ?></button>

	<?php echo form_close(); ?>

</div>





	

