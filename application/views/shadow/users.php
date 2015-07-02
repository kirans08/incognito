<div class="container">
	<div class="row">
		<div class="text-center">
			<h1 class="text-success" style="margin-top:30px; margin-bottom:20px">LIST OF ALL USERS</h1>
		</div>
	</div>
	<div class="row text-warning">
		<h3 class="text-center" style="margin-bottom:40px">Click A Users Name For Details</h3>
	</div>
<div class="col-md-10 col-md-offset-1 ">
<table class="table "> 
<thead>
<tr>
	<th>Rank </th>
	<th>Name</th>
	<th>Level</th>
	<th>College</th>
	<th>Facebook Profile</th>
	<th>Email ID</th>
	<th>Mobile No.</th>
	<th>Status</th>
</tr>
</thead>
<tbody>
<?php $rank=1?>
<?php foreach ($userlist as $user): ?>
<tr>
<td><?php 
if($user['status']!=2)
{
	echo $rank;
	$rank=$rank+1; 
}
else
{
	echo "#";
}?> </td>
<td><a href="<?php echo base_url('index.php/shadow/userdetails?userid='.$user['fb_userid'])?>" target="_blank" ><?php echo $user['name'] ?></a></td>
<td><?php echo $user['level'] ?></td>
<td><?php echo $user['college'] ?></td>
<td><a href="<?php echo $user['user_profile'] ?>" target="_blank"><?php echo $user['user_profile'] ?></a> </td>
<td><?php echo $user['emailid'] ?></td>
<td><?php echo $user['mobileno'] ?></td>
<td><?php 
if($user['status']==1)
{
	echo "<p class=\"text-warning\">Normal</p>";
}
else if($user['status']==2)
{
	echo "<p class=\"text-success\">Admin</p>";	
}
else if($user['status']==-1)
{
	echo "<p class=\"text-danger\">Banned</p>";	
}
?>
</tr>
<?php endforeach?>



</tbody>

</table>

</div>

</div>
