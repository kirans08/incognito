<div class="container">
	<div class="col-xs-12">

<table class="table table-bordered">
<caption><h1 class="text-info" style="margin-top:30px; margin-bottom:20px">LEVEL STATUS</h1></caption>
<thead>
<tr>
	<th><h2>Level</h2></th>
	<th><h2>Difficulty</h2></th>
	<th><h2>Status</h2></th>
	<th><h2>Arena</h2></th>
</tr>
</thead>
<tbody>
<?php foreach ($leveldata as $level): ?>
<tr>
<td><h3><?php echo $level['level'] ?></h3></td>
<?php 
if($level['difficulty']==3)
{
	$diff_cls='text-danger';
	$diff_val='Hard';
}
else if($level['difficulty']==2)
{
	$diff_cls='text-warning';
	$diff_val='Medium';
}
else if($level['difficulty']==1)
{
	$diff_cls='text-success';
	$diff_val='Easy';
}
else
{
	$diff_cls='';
	$diff_val='';
}
if($level['active']==1)
{
	$status_cls='text-success';
	$status_val='Active';
}
else
{
	$status_cls="text-danger";
	$status_val='Inactive';
}
if($level['level']<$top)
{
	$arena_cls='text-danger';
	$arena_val='Cracked';
}
else if(($level['level']==$top)&&($level['active']==1))
{
	$arena_cls='text-warning';
	$arena_val='Playing';
}
else
{
	$arena_cls='text-success';
	$arena_val='Not Reached';
}
?>
<td ><h3 class="<?php echo $diff_cls ?>"><?php echo $diff_val ?></h3></td>
<td ><h3 class="<?php echo $status_cls ?>"><?php echo $status_val ?></h3></td>
<td ><h3 class="<?php echo $arena_cls ?>"><?php echo $arena_val ?></h3></td>
</tr>
<?php endforeach ?>
</tbody>
</table>
<div class="row">
	<div class="text-center">
		<h1 class="text-info" style="margin-top:30px; margin-bottom:30px">ANSWER LOG BY LEVEL</h1>
	</div>
</div>
<?php echo form_open('shadow/levellog',array('class'=>'form-horizontal','role'=>'form')) ?>
	<div class="form-group">
		<h3 class="col-sm-5 text-success" >Select Required Level</h3>
		<div class="col-sm-6 text-center">		
			<select name="loglevel" class="form-control" >
				<?php foreach ($leveldata as $level): ?>
				<?php if($level['level']<=$top): ?>
				<option value="<?php echo $level['level'] ?>"><?php echo 'Level '.$level['level'] ?></option>
				<?php endif; ?>
				<?php endforeach ?>
			</select>
		</div>			
	</div>
	<div class="form-group" style="margin-top:20px">
		<div class="col-sm-offset-5 col-sm-4">
			<button type="submit" class="btn btn-success btn-lg">VIEW</button>
		</div>
	</div>
<?php echo form_close(); ?>
<div class="row">
	<div class="text-center">
		<h1 class="text-info" style="margin-top:30px; margin-bottom:20px">USER STATUS</h1>
	</div>
</div>
<div class="row">
	<h3 class="col-md-offset-2 col-sm-6">
		Total No Of Registered Users
	</h3>
	<h3 >
		<?php echo " : ".$userno['total'] ?>
	</h3>	
</div>
<div class="row text-warning">
	<h3 class="col-md-offset-2 col-sm-6">
		Total No Of Normal Users
	</h3>	
	<h3>
		<?php echo " : ".$userno['normal'] ?>
	</h3>
</div>
<div class="row text-danger">
	<h3 class="col-md-offset-2 col-sm-6">
		Total No Of Banned Users
	</h3>
	<h3>
		<?php echo " : ".$userno['banned'] ?>
	</h3>	
</div>
<div class="row text-success">
	<h3 class="col-md-offset-2 col-sm-6">
		Total No Of Admin Users
	</h3>	
	<h3>
		<?php echo " : ".$userno['admin'] ?>
	</h3>
</div>
<div class="row text-primary">
	<h3 class="col-md-offset-2 col-sm-6">
		Currrent Leaderboard Topper
	</h3>
	<h3> 
		: <a href="<?php echo base_url('index.php/shadow/userdetails?userid='.$topper['fb_userid'])?>" target="_blank"> <?php echo $topper['name']?></a>
	</h3>
</div>
</div>
</div>