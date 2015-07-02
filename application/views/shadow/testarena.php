<?php echo validation_errors(); ?>
<div class="container">
  <div class="row">
      <img src="<?php echo base_url('index.php/shadow/shadowaccess/'.$level['question']) ?>"
      class="img-rounded col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 " style="border-style:solid; border-color:#0bffff; border-width:2px">
  </div>
  <br>
  <!--<?php  echo $level['html_clue'] ?> -->
  <div class="row">
      <div class="col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
        <?php echo form_open('shadow/testanswer',array('role'=>'form')) ?>      
          <div class="form-group">
            <div class="hidden">
              <input type="text" class="form-control" name="testlevel"  value="<?php echo $level['level'] ?>">
            </div>
          </div>  
          <div class="input-group input-group-lg">
            <input type="text" name="answer" value="" class="form-control" placeholder="<?php echo $level['textbox_clue']?> "  />           
            <span class="input-group-btn">
              <button class="btn btn-warning" type="submit">Submit</button>
            </span>
          </div>
        </form>       
      </div>
    </div> 
</div>
