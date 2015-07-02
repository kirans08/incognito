<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 ">
			<table class="table ">
				<caption><h1 class="text-info" style="margin-top:40px; margin-bottom:40px">ANSWER LOG OF <?php echo "LEVEL ".$level?> </h1></caption>
				<thead>
					<tr>
						<th>No.</th>
						<th>Username</th>
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
						<td><?php echo $answer['name'] ?></td>
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