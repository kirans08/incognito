<?php if($userdata['status']>=2) : ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

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
<a class="navbar-brand" href="<?php echo base_url()?>">Incognito</a>
</div>
<div class="collapse navbar-collapse" >
<ul class="nav navbar-nav">
<li class="<?php echo $actstatus ?>"><a href="<?php echo base_url('index.php/shadow/status')?>">Status</a></li>
<li class="<?php echo $actupload ?>"><a href="<?php echo base_url('index.php/shadow/upload')?>">Upload Files</a></li>
<li class="<?php echo $actmanage ?>"><a href="<?php echo base_url('index.php/shadow/manage')?>">Manage Levels</a></li>
<li class="<?php echo $actsto ?>"><a href="<?php echo base_url('index.php/shadow/storyman')?>">Create Story</a></li>
<li class="<?php echo $actstoup ?>"><a href="<?php echo base_url('index.php/shadow/storyup')?>">Upload Story</a></li>
<li class="<?php echo $actswap ?>"><a href="<?php echo base_url('index.php/shadow/swap')?>">Swap Levels</a></li>
<li class="<?php echo $actusers ?>"><a href="<?php echo base_url('index.php/shadow/users')?>">User List</a></li>
<li class="<?php echo $acttest ?>"><a href="<?php echo base_url('index.php/shadow/test')?>">Test Levels</a></li>
<li class="<?php echo $actsite ?>"><a href="<?php echo base_url('index.php/shadow/site')?>">Manage Site</a></li>
<li class="<?php echo $acthide ?>"><a href="<?php echo base_url('index.php/shadow/hide')?>">Hide Players</a></li>
<li class="<?php echo $actforcereset ?>"><a href="<?php echo base_url('index.php/shadow/forcereset')?>">Force Reset</a></li>
<li class="<?php echo $actforceset ?>"><a href="<?php echo base_url('index.php/shadow/forceset')?>">Force Set</a></li>
</ul>
</div>
</nav>
<?php endif; ?>
