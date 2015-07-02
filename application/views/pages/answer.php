<div class="container">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
            <?php if($result==TRUE): ?>
			<h1 class="text-success Dagger text-center">
				 Keep Up The Good Work Continue Cracking...
			</h1>
			<?php else: ?>
			<h1 class="text colred Dagger text-center">
				Decryption Failed !!!
			</h1>
			<?php endif; ?>
		</div>
	</div>
	<br>
	<!--<div class="row" >
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
	</div>-->
	<br>
	<?php if($result==TRUE): ?>
	<div class="row">
		<img src="<?php echo base_url('levels/'.$img) ?>"
      	class="img-rounded col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 " style="border-style:solid; border-color:#0bffff; border-width:2px">
	</div>
	<?php endif; ?>
	<br>
	<div class="row" >
		<div class="text-center">
			<?php if($result==TRUE): ?>
			<a href="<?php echo base_url('pages/viewstory') ?>" class="btn btn-lg btn-success" role="button">Continue</a>
			<?php else: ?>
			<a href="<?php echo base_url() ?>" class="btn btn-lg btn-danger" role="button">Try Again</a>
			<?php endif; ?>
		</div>
	</div>

</div>