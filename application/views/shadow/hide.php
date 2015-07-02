<script type="text/javascript">
$(document).ready(function(){ 
  $("#nop").change(function(){
  	
  if(document.getElementById('nop').value=='-1')
  {
  	document.getElementById('custom').disabled=false;
  	 document.getElementById('custom').value='';
  }
  else
  {
  	document.getElementById('custom').disabled=true;
    document.getElementById('custom').value=document.getElementById('nop').value;
   }
  });
});
</script>
<div class="container">
	<div class="row">
		<h1 class="text-info text-center" style="margin-bottom:40px">HIDE PLAYERS</h1>
	</div>
	<div class="row">
		<h3 class="text-warning" style="margin-bottom:40px">SELECTED NO OF PLAYERS DETAILS WILL BE HIDDEN</h3>
	</div>
	<?php echo form_open('shadow/hidelb',array('class'=>'form-horizontal','role'=>'form')) ?>
		<div class="form-group">
			<h3 class="col-sm-5 text-success" >Select The No Of Players</h3>
			<div class="col-sm-6 text-center">		
			<select name="nop" id="nop" class="form-control" >
					<option value='0' <?php if($nop=='0') echo "selected" ?>>0</option>
					<option value='10' <?php if($nop=='10') echo "selected" ?>>10</option>
					<option value='50' <?php if($nop=='50') echo "selected" ?>>50</option>
					<option value='100' <?php if($nop=='100') echo "selected" ?>>100</option>
					<option value='500' <?php if($nop=='500') echo "selected" ?>>500</option>
					<option value='-1' <?php if($nop!='0'&&$nop!='10'&&$nop!='50'&&$nop!='100'&&$nop!='500') echo "selected" ?>>Custom Value</option>
			</select>
			</div>
			
		</div>
		<div class="form-group">
			<div class="col-sm-6 col-sm-offset-5">
				<input type="text" class="form-control" name="custom" id="custom"
				placeholder="Enter Custom Value" <?php echo "value ='".$nop."'";
														if($nop=='0'||$nop=='10'||$nop=='50'||$nop=='100'||$nop=='500') 
															echo "disabled"; 	  ?>>
			</div>
		</div>	
	<div class="form-group" style="margin-top:30px">
		<div class="col-sm-offset-5 col-sm-4">
			<button type="submit" class="btn btn-primary btn-lg">HIDE</button>
		</div>
	</div>
	<?php echo form_close(); ?>
</div>