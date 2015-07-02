
<div class="container">
  <div class="row">
    <h1 class="Dagger text-center"> STORY SO FAR. . .</h1>
  </div>

  <?php $id=0;
  if($storydata!=NULL): 
  foreach ($storydata as $story):
    $id=$story['id'];?>
  <div class="row" style="margin-top:30px" >
      <img src="<?php echo base_url('pages/storyimg/'.$story['id']) ?>"
      class="img-rounded col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 " style="border-style:solid; border-color:#0bffff; border-width:2px">
  </div>
  <br>
  <?php endforeach;
  endif;?>
   <div id="pagination" >
                    <ul class="tsc_pagination text-center" >
                        
                        <!-- Show pagination links -->
                        <?php
                         foreach ($links as $link) {
                            echo "<li>". $link."</li>";
                         } 
                         //echo $links
                         ?>
    </div>
    <?php if($total==$id): ?>
    <div class="row">
        <div class="text-center" style="margin-top:30px">
          <a href="<?php echo base_url() ?>" class="btn btn-lg btn-success Dagger " role="button">continue</a>
        </div>
    </div>
  <?php endif;?>
            
</div>
