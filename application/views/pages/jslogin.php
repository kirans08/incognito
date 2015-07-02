<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please Log ' +
        'Into Decepto Facebook App And Try Again';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please Log ' +
        'Into Facebook And Try Again';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '1486917554927507',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.1' // use version 2.1
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {


      console.log('Successful login for: ' + response.name);
          document.getElementById('userid').value=response.id;
          document.getElementById('name').value=response.name;
          document.getElementById('userprofile').value=response.link;   
          $("#login").click();
        
    });
  }



</script>



<div class="container">
	<div class="row" style="margin-top:75px">
		<div class="text-info" id="status">
			<h3>You Will Be Redirected Automatically</h3>
		</div>
	</div>
	<div class="text-center" style="margin-top:75px">
		<div class="text-center">
			<button class="btn btn-primary btn-lg" id="sub" style="display:none"></button>
		</div>
	</div>
	<?php echo form_open('pages/jslogin',array('class'=>'form-horizontal','role'=>'form')) ?>
	<div class="form-group">
		<div class="hidden">
			<input type="text" class="form-control" name="userid" id="userid" value="123456789">
		</div>
	</div>
	<div class="form-group">
		<div class="hidden">
			<input type="text" class="form-control" name="name" id="name">
		</div>
	</div>
	<div class="form-group">
		<div class="hidden">
			<input type="text" class="form-control" name="userprofile" id="userprofile">
		</div>
	</div>
	<div class="form-group">
		<div class="hidden">
			<button type="submit" id="login" class="btn btn-primary btn-lg">Login With Facebook</button>
		</div>
	</div>
	<?php echo form_close(); ?>
</div>
