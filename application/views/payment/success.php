<div class="container-fluid">
<div id="fb-root"></div>

<script>


  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1050981661712135',
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));




	//add donation post to fb
function myFacePost() {

	 FB.getLoginStatus(function(response) {
          if (response.status === 'connected') {
            	  var body = 'Donated to helpme non profit organization';
				FB.api('/me/feed', 'post', { message: body }, function(response) {
				  if (!response || response.error) {
				    console.log(response.error);
				  } else {
				    alert('Post ID: ' + response.id);
				  }
				});
          }
          else {
            console.log('initiate FB login...');
            FB.login();
          }
        });



}


</script>

<h2>Thank you for your payment. </h2>
<p>Your transaction has been completed, and a receipt for your purchase has been emailed to you. You may log into your account at www.paypal.com to view details of this transaction.</p>



<button onclick="myFacePost()">Post to face book timeline</button>
<br/><br/><br/>

<a href="<?php echo base_url('Home'); ?>">return to Home</a>

</div>