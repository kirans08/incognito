<div class="container">
	<div class="row">
		<h1 class="text-info text-center" style="margin-bottom:40px">CHANGE USER STATUS TO</h1>
	</div>
	<?php
	$admin='';
	$normal='';
	$banned='';
	if($user['status']==-1)
	{
		$banned='disabled';
	}
	else if($user['status']==1)
	{
		$normal='disabled';
	}
	else if($user['status']==2)
	{
		$admin='disabled';
	}
	?>
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2">
			<div class="input-group input-group-lg">          
            <span class="input-group-btn">
            	<a href="<?php echo base_url('index.php/shadow/modify?userid='.$user['fb_userid'].'&status=2')?>" role="button" class="<?php echo $admin ?> btn btn-lg btn-block btn-success">Admin</a>
            </span>
            <span class="input-group-btn">
            	<a href="<?php echo base_url('index.php/shadow/modify?userid='.$user['fb_userid'].'&status=1')?>" role="button" class="<?php echo $normal ?> btn btn-lg btn-block btn-warning">Normal User</a>
            </span>
            <span class="input-group-btn">
            	<a href="<?php echo base_url('index.php/shadow/modify?userid='.$user['fb_userid'].'&status=-1')?>" role="button" class="<?php echo $banned ?> btn btn-lg btn-block btn-danger">Banned</a>
            </span>
          </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1 ">
			<table class="table ">
				<caption><h1 class="text-info" style="margin-top:40px; margin-bottom:40px">ANSWER LOG OF <?php echo strtoupper($user['name'])?> </h1></caption>
				<thead>
					<tr>
						<th>No.</th>
						<th>Level</th>
						<th>Answer</th>
						<th>Time</th>
					</tr>
				</thead>
				<tbody>
					<?php if($answerlog!=FALSE): ?>
					<?php $no=1?>
					<?php foreach ($answerlog as $answer): ?>
					<tr>
						<td><?php echo $no;
						$no=$no+1; ?> </td>
						<td><?php echo $answer['level'] ?></td>
						<td><?php echo $answer['answer'] ?></td>
						<td><?php echo $answer['time'] ?></td>
					</tr>
					<?php endforeach ?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>