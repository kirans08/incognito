<div class="container">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<h3>
				We Checked Your Answer And It Seems Like You Are
			</h3>	
		</div>
	</div>
	<br>
	<div class="row" >
		<div class="col-xs-5 col-xs-offset-1">
			<?php if($result==TRUE): ?>
			<h1 class="text-success">
				Correct
			</h1>
			<?php else: ?>
			<h1 class="text-danger">
				Wrong
			</h1>
			<?php endif; ?>
		</div>
	</div>
	<br>
	<?php if($result==TRUE): ?>
	<div class="row">
		<img src="<?php echo base_url('index.php/shadow/shadowaccess/'.$img) ?>"
      	class="img-rounded col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 " style="border-style:solid; border-color:#0bffff; border-width:2px">
	</div>
	<?php endif; ?>
	<br>
	<div class="row" >
		<div class="text-center">
			<?php if($result==TRUE): ?>
			<a href="<?php echo base_url('index.php/shadow/test') ?>" class="btn btn-lg btn-success" role="button">Continue</a>
			<?php else: ?>
				<?php echo form_open('shadow/testlevel',array('class'=>'form-horizontal','role'=>'form')) ?>
				    <div class="form-group">
            			<div class="hidden">
             				 <input type="text" class="form-control" name="testlevel"  value="<?php echo $level ?>">
           				 </div>
         			 </div> 
					<div class="form-group" style="margin-top:30px">
						<div class="text-center">
							<button type="submit" class="btn btn-danger btn-lg">Try Again</button>
						</div>
					</div>
			<?php echo form_close(); ?>
			<?php endif; ?>
		</div>
	</div>

</div>