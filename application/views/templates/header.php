<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
      <link href="<?php echo base_url('assets/css/incognitostyle.css') ?>" rel="stylesheet">

   <script  src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
   <script  src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

</head>
<body style="color:#ffffff; background-color:#000000">
<nav class="navbar navbar-inverse " role="navigation">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse"
data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="<?php echo base_url()?>" title="Incognito">
	<img class="navlogo" src="<?php echo base_url('assets/img/logo.png') ?>">
</a>
</div>
<div class="collapse navbar-collapse" >
<ul class="nav navbar-nav">
<li class=" Dagger <?php echo $acthome ?>"><a href="<?php echo base_url()?>">Home</a></li>
<li class="Dagger <?php echo $actleaderboard ?>"><a href="<?php echo base_url('leaderboard')?>">Leaderboard</a></li>
<li class="Dagger "><a href="<?php echo base_url('clues')?>" target="_blank">Clues</a></li>
<li class="Dagger <?php echo $actrules ?>"><a href="<?php echo base_url('rules')?>">Rules</a></li>
<?php
$this->load->library('session');
$user_id=$this->session->userdata('userid');
if($user_id!=FALSE) : ?>
<li class="Dagger <?php echo $actstory ?>"><a href="<?php echo base_url('story')?>">Story so far</a></li>
<li class="Dagger <?php echo $actprof ?>"><a href="<?php echo base_url('profile')?>">Profile</a></li>


</ul>
<ul class="nav navbar-nav navbar-right" >
<li class="Dagger "><a href="<?php echo base_url('index.php/logout')?>">Logout</a></li>
</ul>
<?php endif ?>
</div>
</nav>

