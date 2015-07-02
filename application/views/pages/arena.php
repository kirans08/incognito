

<?php echo validation_errors(); ?>

<div class="container">

  <div class="row">
 <div class="text-center">
      <img src="<?php echo base_url('levels/'.$level['question']) ?>"

      class="img-rounded col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 " style="border-style:solid; border-color:#0bffff; border-width:2px">
 </div>
 <div class="col-sm-offset-10">
        <button  id="hint" class="btn btn-lg btn-info Dagger " type="button" data-toggle="modal" data-target="#myModal">CREDITS</button>
  </div>
  </div>

  <br>

  <!--<?php  echo $level['html_clue'] ?> -->

  <div class="row">

      <div class="col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

        <?php echo form_open('pages/answer',array('role'=>'form')) ?>        

          <div class="input-group input-group-lg">

            <input type="text" name="answer" value="" class="form-control" placeholder="<?php echo $level['textbox_clue']?> "  />           

            <span class="input-group-btn">

              <button class="btn Dagger colblack" type="submit">Submit</button>

            </span>

          </div>

        </form>       

      </div>

    </div>
     <?php if($phase!=1):?>
     <div class="row">
       <div class="text-center" style="margin-top:75px">
          <a href="<?php echo base_url('jumptonext')?>" class="btn Dagger btn-lg btn-success" role="button">JUMP TO NEXT PHASE</a>
        </div>
     </div>
     <?php endif;?> 
         <div class="row">
      <div class="modal fade" id="myModal">
  <div class="modal-dialog Dagger">
    <div class="modal-content"  style="background-color:#415e9b">
      <div class="modal-header">
        
        <h2 class="modal-title text-center Dagger">INCOGNITO TEAM</h2>
      </div>
      <div class="modal-body"> 
        <div class="container">
          <div class="row">
            <h4 class="Dagger">EVENT COORDINATOR</h4>
          </div>
            <div class="row">
   <a href="https://www.facebook.com/ramanand.nk?fref=ts"><img class="img-rounded" src="<?php echo base_url('assets/img/img1.jpg')?>"></a>
          </div>
                    <div class="row">
             <p class="Dagger">Ramanand N.K</p>
           </div>
            <div class="row">
            <h4 class="Dagger">INCOGNITO ADMINS</h4>
          </div>
          <div class="row">
 <a href="https://www.facebook.com/ramanand.nk?fref=ts"><img class="img-rounded" src="<?php echo base_url('assets/img/img1.jpg')?>"></a>
             <a href="https://www.facebook.com/pranav.liveon?fref=ts"><img class="img-rounded" src="<?php echo base_url('assets/img/img2.jpg')?>"></a>
             <a href="https://www.facebook.com/08Kiran.S"><img class="img-rounded" src="<?php echo base_url('assets/img/img4.jpg')?>"></a>
          </div>
          <div class="row">
             <p class="Dagger">Ramanand N.K&nbsp&nbsp&nbsp&nbspPranav T.S &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Kiran S</p>
          </div>
          <div class="row">
            <h4 class="Dagger">QUESTIONS</h4>
          </div>
          <div class="row">
             <a href="https://www.facebook.com/pranav.liveon?fref=ts"><img class="img-rounded" src="<?php echo base_url('assets/img/img2.jpg')?>"></a>
              <a href="https://www.facebook.com/ramanand.nk?fref=ts"><img class="img-rounded" src="<?php echo base_url('assets/img/img1.jpg')?>"></a>
             <a href="https://www.facebook.com/08Kiran.S"><img class="img-rounded" src="<?php echo base_url('assets/img/img4.jpg')?>"></a>
          </div>
                   <div class="row">
             <p class="Dagger">Pranav T.S&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspRamanand N.K &nbsp&nbsp&nbspKiran S</p>
          </div>
           <div class="row">
            <h4 class="Dagger">WEBSITE</h4>
          </div>
          <div class="row">
             <a href="https://www.facebook.com/08Kiran.S"><img class="img-rounded" src="<?php echo base_url('assets/img/img4.jpg')?>"></a>
          </div>
                             <div class="row">
             <p class="Dagger">Kiran S</p>
           </div>
          <div class="row">
            <h4 class="Dagger">FRONT END DESIGN</h4>
          </div>
          <div class="row">
            <a href="https://www.facebook.com/salz.silent.love?fref=ts"><img class="img-rounded" src="<?php echo base_url('assets/img/img5.jpg')?>"></a>
          </div>
                                      <div class="row">
             <p class="Dagger">Salman</p>
           </div>
          <div class="row">
            <h4 class="Dagger">ILLUSTRATIONS</h4>
          </div>
          <div class="row">
           <img class="img-rounded" src="<?php echo base_url('assets/img/img3.jpg')?>">
          </div>
                                                <div class="row">
             <p class="Dagger">Ashwin R Krishnan</p>
           </div>
          <div class="row">
            <h4 class="Dagger">STORYBOARD</h4>
          </div>
          <div class="row">
            <a href="https://www.facebook.com/ramanand.nk?fref=ts"><img class="img-rounded" src="<?php echo base_url('assets/img/img1.jpg')?>"></a>
          </div>
                           <div class="row">
             <p class="Dagger">Ramanand N.K</p>
           </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger Dagger" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    </div> 
 
</div>

