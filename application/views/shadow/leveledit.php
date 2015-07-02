<div class="container">
	<div class="row">
		<h1 class="text-primary text-center" style="margin-bottom:40px">DETAILS OF LEVEL <?php echo $leveldata['level'] ?></h1>
	</div>
	<?php if($leveldata['answer']==NULL): ?>
	<div class="row">
		<h1 class="text-danger" style="margin-bottom:40px; font-size:40px">WARNING !</h1>
	</div>
	<div class="row">
		<h2 class="text-danger" style="margin-bottom:40px">PLEASE ENTER AN ANSWER FOR THIS LEVEL</h2>
	</div>
	<?php endif; ?>
	<div class="row">
		<h2 class="text-warning" style="margin-bottom:30px">CURRENT DETAILS</h2>
	</div>
	<div class="row">
		<h3 class="text-success col-sm-5">TITLE CLUE</h3><h3 class="col-sm-7"> : <?php echo $leveldata['title_clue'] ?></h3>
	</div>
	<div class="row">
		<h3 class="text-success col-sm-5">HTML CLUE</h3><h3 class="col-sm-7"> : <?php echo $leveldata['html_clue'] ?></h3>
	</div>	
	<div class="row">	
		<h3 class="text-success col-sm-5">TEXTBOX CLUE</h3><h3 class="col-sm-7"> : <?php echo $leveldata['textbox_clue'] ?></h3>
	</div>	
	<div class="row">	
		<h3 class="text-success col-sm-5">COOKIE CLUE</h3><h3 class="col-sm-7"> : <?php echo $leveldata['cookie_clue'] ?></h3>
	</div>	
	<div class="row">	
		<h3 class="text-success col-sm-5">DIFFICULTY</h3><h3 class="col-sm-7"> : <?php 
			if($leveldata['difficulty']==3)
			{
				echo 'HARD';
			}
			else if($leveldata['difficulty']==2)
			{
				echo 'MEDIUM';
			}
			else if($leveldata['difficulty']==1)
			{
				echo 'EASY';
			}
			else
			{
				echo '';
			}

		 ?></h3>
	</div>
	<div class="row">
		<h3 class="text-success col-sm-5">CLUE 1</h3><h3 class="col-sm-7"> : <?php echo $cluedata['clue1'] ?></h3>
	</div>
	<div class="row">
		<h3 class="text-success col-sm-5">CLUE 2</h3><h3 class="col-sm-7"> : <?php echo $cluedata['clue2'] ?></h3>
	</div>	
	<div class="row">	
		<h3 class="text-success col-sm-5">CLUE 3</h3><h3 class="col-sm-7"> : <?php echo $cluedata['clue3'] ?></h3>
	</div>	
	<div class="row">	
		<h3 class="text-success col-sm-5">GIVEAWAY CLUE</h3><h3 class="col-sm-7"> : <?php echo $cluedata['clue4'] ?></h3>
	</div>	
	<div class="row">
		<h3 class="text-success col-sm-5">NO OF CLUES ENABLED</h3><h3 class="col-sm-7"> : <?php echo $cluedata['clue_status'] ?></h3>
	</div>
	<div class="row">
		<h2 class="text-warning" style="margin-top:30px;margin-bottom:30px">ENTER NEW DETAILS</h2>
	</div>
	<div class="row">
		<h3 class="text-info" style="margin-top:30px">ENTER DATA ONLY IN FIELDS WHICH NEED UPDATION</h3>
	</div>
	<div class="row">
		<h3 class="text-info" >ENTER A SPACE TO CLEAR A FIELD</h3>
	</div>
	<div class="row">
		<h3 class="text-info" style="margin-bottom:40px">ANSWERS OF ACTIVE LEVELS CANNOT BE UPDATED</h3>
	</div>
	<?php echo validation_errors(); ?>
	<?php echo form_open('shadow/updatelevel',array('class'=>'form-horizontal','role'=>'form')) ?>
	<div class="form-group">
		<div class="hidden">
			<input type="text" class="form-control" name="level"  value="<?php echo $leveldata['level'] ?>">
		</div>
	</div>
	<div class="form-group">
		<h3 class="col-sm-5 text-success">ANSWER</h3>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="answer"
				placeholder="Enter Answer" 
				<?php if($leveldata['active']==1)
					echo "disabled"; ?> >
		</div>
	</div>
	<div class="form-group">
		<h3 class="col-sm-5 text-success">TITLE CLUE</h3>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="title_clue"
				placeholder="Enter Level Title">
		</div>
	</div>
	<div class="form-group">
		<h3 class="col-sm-5 text-success">HTML CLUE</h3>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="html_clue"
				placeholder="Enter HTML Clue">
		</div>
	</div>
	<div class="form-group ">
		<h3 class="col-sm-5 text-success">TEXTBOX CLUE</h3>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="textbox_clue"
				placeholder="Enter Textbox Clue">
		</div>
	</div>
	<div class="form-group">
		<h3 class="col-sm-5 text-success">COOKIE CLUE</h3>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="cookie_clue"
				placeholder="Enter Cookie Clue">
		</div>
	</div>
	<div class= "form-group">
		<h3 class="col-sm-5 text-success">DIFFICULTY</h3>	
		<div class="col-sm-6">	
			<select  name="difficulty" class="form-control">
				<option value="">&nbsp</option>
				<option value="1">EASY</option>
				<option value="2">MEDIUM</option>
				<option value="3">HARD</option>
			</select>
		</div>	

	</div>
	<div class="form-group">
		<h3 class="col-sm-5 text-success">CLUE 1</h3>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="clue1"
				placeholder="Enter Clue 1">
		</div>
	</div>
	<div class="form-group ">
		<h3 class="col-sm-5 text-success">CLUE 2</h3>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="clue2"
				placeholder="Enter Clue 2">
		</div>
	</div>
	<div class="form-group">
		<h3 class="col-sm-5 text-success">CLUE 3</h3>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="clue3"
				placeholder="Enter Clue 3">
		</div>
	</div>
	<div class="form-group ">
		<h3 class="col-sm-5 text-success">GIVEAWAY CLUE</h3>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="clue4"
				placeholder="Enter Giveaway Clue">
		</div>
	</div>
	<div class="form-group ">
		<h3 class="col-sm-5 text-success">NO OF CLUES TO BE ENABLED</h3>
		<div class="col-sm-6">
			<select  name="clue_status" class="form-control">
				<option value="">&nbsp</option>
				<option value="0">&nbsp0</option>
				<option value="1">&nbsp1</option>
				<option value="2">&nbsp2</option>
				<option value="3">&nbsp3</option>
				<option value="4">&nbsp4</option>
			</select>
		</div>
	</div>
	<div class="form-group" style="margin-top:30px">
		<div class="col-sm-offset-5 col-sm-4">
			<button type="submit" class="btn btn-primary btn-lg">UPDATE</button>
		</div>
	</div>
	<?php echo form_close(); ?>

</div>