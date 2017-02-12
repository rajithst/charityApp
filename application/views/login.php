<?php echo base_url('assets/css/stylenew.css') ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
		<!-- BASICS -->
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Charity Application</title>
        <meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/isotope.css')?>" media="screen" />	
		<link rel="stylesheet" href="<?php echo base_url('assets/js/fancybox/jquery.fancybox.css') ?>"  type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css')?>" >
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-theme.css')?>">
		<link href="<?php echo base_url('assets/css/responsive-slider.css')?>" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css')?>" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css')?>">
		<!-- skin -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/stylenew.css') ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/default.css') ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/loader.css') ?>">
        <!-- =======================================================
            Theme Name: Green
            Theme URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
            Author: BootstrapMade
            Author URL: https://bootstrapmade.com
        ======================================================= -->
    </head>
	 
    <body>
    <!--face book sdk-->

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
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
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
    appId      : '1050981661712135',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.8' // use graph api version 2.8
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

  // FB.getLoginStatus(function(response) {
  //   statusChangeCallback(response);
  // });

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
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture',scope: 'publish_actions'},
    	function(response) {
    		var fname=response.first_name;
    		var lname=response.last_name;
    		var email=response.email;
    		var picture=response.picture;
    		var gender=response.gender; 
    		var id=response.id;
    		//console.log(picture);

    		$.ajax({
    			url:"<?php echo base_url(); ?>"+"index.php/Login/facebook",
    			type:"POST",
    			data:{fname:fname,lname:lname,email:email,picture:picture,gender:gender,id:id},
    			success:function(data, textStatus, jQxhr){
    				window.top.location = "Home";

    			},
    			error:function(xhr, textStatus, errorThrown){
    				var err = eval("(" + xhr.responseText + ")");
  					console.log(err.Message);

    			}


    			});         
      
    });
  }
</script>

	
	<!--end of face book sdk-->
	<div class="header">
	<section id="header" class="appear">
		
		<div class="navbar navbar-fixed-top" role="navigation" data-0="line-height:100px; height:100px; background-color:#2ecc71;" data-300="line-height:60px; height:60px; background-color:#2ecc71;">
			
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="fa fa-bars color-white"></span>
					</button>
					<h1><a class="navbar-brand" href="index.html" data-0="line-height:90px;" data-300="line-height:50px;">Help Me
					</a></h1>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav" data-0="margin-top:20px;" data-300="margin-top:5px;">
						<li class="active"><a href="#header">Home</a></li>
						<li><a href="#section-about">About</a></li>
						<li><a href="#services">Service</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle navbar-left" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
        <ul id="login-dp" class="dropdown-menu dropdown-menu-right">
                <li>
           
                     <div class="row">
                            <div class="col-md-12">
                                Login via
                                <div class="social-buttons">
                                   	<!--face book login button-->
                                    <fb:login-button class="fb-login-button btn-fb btn" scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>
                                    <!--end of face book login button-->
                                    <a href="#" class="btn"><i class="g-signin2" data-onsuccess="onSignIn"></i></a>
                                    <!-- google login starts here -->
                                    <script src="https://apis.google.com/js/platform.js" async defer></script>
                                    <meta name="google-signin-client_id" content="760126013179-gafn70enmd5f2ejfb4if83akv2422phk.apps.googleusercontent.com">
                  
                                    <script>
                                        function onSignIn(googleUser) {
                                            var profile = googleUser.getBasicProfile();
                                            var obj = {id: profile.getId(), name: profile.getName(), username: profile.getEmail(), password: '', email: profile.getEmail(), reg_gender: '', picture: profile.getImageUrl(),type: 'google'};
                                            gsign(obj);
                                        }
                                        function gsign(obj) {
                                            jQuery.ajax({
                                                type: "POST",
                                                url: "<?php echo base_url(); ?>" + "index.php/Login/googleLogin",
                                                dataType: 'json',
                                                data: obj,
                                                success: function (res) {
                                                    window.location = "<?php echo base_url(); ?>"+"Home";
                                                },
                                                error: function (jqXHR, textStatus, errorThrown) {
                                                    alert(jqXHR.responseText);
                                                }
                                            });
                                        }
                                    </script>
                                    <!-- google login ends here -->
                                    
                                </div>
                                or

                                 <?php echo validation_errors();?>
                                     <?php $attributes = array('id' => 'login-form'); ?>
                                    <?php echo form_open('Login/login',$attributes)?>
                                 <form class="form" role="form" method="post" action="" accept-charset="UTF-8" id="login-nav">
                                        <div class="form-group">
                                             <label class="sr-only" for="lg_username" >User Name</label>
                                             <input type="text" class="form-control" id="lg_username" name="username"  data-errormessage-value-missing="Email is required!" placeholder="username">
                                        </div>
                                        <div class="form-group">
                                             <label class="sr-only"  for="lg_password">Password</label>
                                             <input type="password" class="form-control validate[required]"  id="lg_password" name="password" data-errormessage-value-missing="password is required!" placeholder="password">
                                             <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                                        </div>
                                        <div class="form-group">
                                             <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                        </div>
                                        <div class="checkbox">
                                             <label>
                                             <input type="checkbox" id="lg_remember" name="lg_remember"> keep me logged-in
                                             </label>
                                        </div>
                                 </form>
                 <?php echo form_close()?>
                            </div>
                            <div class="bottom text-center">
                                <h7 style="color: black">New here ? </h7> <button data-toggle="modal" data-target="#myModal" class="btn btn-success">Join Us</button>
                            </div>
                     </div>
                </li>
            </ul>
        </li>
					</ul>
				</div><!--/.navbar-collapse -->
			</div>
		
		
	</section>
	</div>
	
<div class="se-pre-con"><div class="blobs">
	<div class="blob"></div>
	<div class="blob"></div>
</div>

<svg version="1.1" xmlns="http://www.w3.org/2000/svg">
	<defs>
		<filter id="goo">
			<feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10" />
			<feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
			<feBlend in2="goo" in="SourceGraphic" result="mix" />
		</filter>
	</defs>
</svg></div>


<div class="slider">		
		<div id="about-slider">
			<div id="carousel-slider" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators visible-xs">
					<li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-slider" data-slide-to="1"></li>
					<li data-target="#carousel-slider" data-slide-to="2"></li>
				</ol>

				<div class="carousel-inner">
					<div class="item active">						
						<img src="http://temmybalogun.com.ng/wp-content/uploads/2017/01/african-kids.jpg" class="img-responsive" alt=""> 
						<div class="carousel-caption">
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">								
								<h2><span>By Finding Children</span></h2>
							</div>
							<div class="col-md-10 col-md-offset-1">
								<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">								
									<p>Find poor inocent children who need special sponsoring from others</p>
								</div>
							</div>
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.9s">								

							</div>
						</div>
				    </div>
			
				    <div class="item">
						<img src="https://expertbeacon.com/sites/default/files/supporting_your_adopted_children_as_they_try_to_fit_in_at_school.jpg" class="img-responsive" alt=""> 
						<div class="carousel-caption">
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.0s">								
								<h2>Sponsoring Children</h2>
							</div>
							<div class="col-md-10 col-md-offset-1">
								<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">								
									<p>Check what they want purchase them and you will make them smile</p>
								</div>
							</div>
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.6s">								
							</div>
						</div>
				    </div> 

				
				    <div class="item">
						<img src="http://images.huffingtonpost.com/2016-02-15-1455556220-2029438-X10B9267.jpg" class="img-responsive" alt=""> 
						<div class="carousel-caption">
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.0s">								
								<h2>By Deliverying Goods</h2>
							</div>
							<div class="col-md-10 col-md-offset-1">
								<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">								
									<p>Deliver the items that belongs to them</p>
								</div>
							</div>
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.6s">								
							</div>
						</div>
				    </div> 
				</div>
				</div>
				<a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
					<i class="fa fa-angle-left"></i> 
				</a>
				
				<a class=" right carousel-control hidden-xs"href="#carousel-slider" data-slide="next">
					<i class="fa fa-angle-right"></i> 
				</a>
			</div> <!--/#carousel-slider-->
		</div><!--/#about-slider-->
	</div><!--/#slider-->
		
	<!--about-->
	<section id="section-about">
		<div class="container">
			<div class="about">
				<div class="row mar-bot40">
					<div class="col-md-offset-3 col-md-6">
						<div class="title">
							<div class="wow bounceIn">
						
							<h2 class="section-heading animated" data-animation="bounceInUp">Our Vision</h2>
							
						
							</div>
						</div>
					</div>
				</div>
				<div class="row">
			
					<div class="row-slider">
						<div class="col-lg-6 mar-bot30">
							<div class="responsive-slider" data-spy="responsive-slider" data-autoplay="true">
								<div class="slides" data-group="slides">
									<ul>
  	    		
										<div class="slide-body" data-group="slide">
											<li><img alt="" class="img-responsive" src="http://www.guilfordchildren.org/wp-content/uploads/2014/06/boy-hands.png" width="100%" height="350"/></li>
											<li><img alt="" class="img-responsive" src="https://www.tunidito.org/wp-content/uploads/2014/12/banner-photo.png" width="100%" height="350"/></li>
											<li><img alt="" class="img-responsive" src="http://3rdlevelconsulting.com/wp-content/uploads/2014/11/kids-thumbs-up.png" width="100%" height="350"/></li>
							
										</div>
									</ul>
										<a class="slider-control left" href="#" data-jump="prev"><i class="fa fa-angle-left fa-2x"></i></a>
										<a class="slider-control right" href="#" data-jump="next"><i class="fa fa-angle-right fa-2x"></i></a>
								
								</div>
							</div>
						</div>
					
						<div class="col-lg-6 ">
							<div class="company mar-left10">
								<h4>Our Community has created 1928  <span>vestibulum </span> at eros.</h4>
								<p>Nullam id dolor id nibh ultricies vehicula ut id elit. Donec sed odio dui. Fusce dapibus, tellus ac cursus etiam porta sem malesuada magna mollis euismod. commodo, Faccibus mollis interdum. Morbi leo risus, porta ac, vestibulum at eros.
								  Nullam id dolor id nibh ultricies vehicula ut id elit. Donec sed odio dui. Fusce dapibus, tellus ac.</p>
							</div>
							<div class="list-style">
								<div class="row">
									<div class="col-lg-6 col-sm-6 col-xs-12">
										<ul>
											<li>Sollicitudin Vestibulum</li>
											<li>Fermentum Pellentesque</li>
											<li>Sollicitudin Vestibulum</li>
											<li>Nullam id dolor id nibh</li>
										</ul>
									</div>
									<div class="col-lg-6 col-sm-6 col-xs-12">
										<ul>
											<li>Sollicitudin Vestibulum</li>
											<li>Fermentum Pellentesque</li>
											<li>Sollicitudin Vestibulum</li>
											<li>Nullam id dolor id nibh</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					
					</div>	
				</div>
					
			</div>
			
		</div>
	</section>
	<!--/about-->
		
	<!-- spacer section:testimonial -->
		<!-- services -->
		<section id="services" class="section pad-bot5 bg-white">
		<div class="container"> 
				<div class="row mar-bot5">
					<div class="col-md-offset-3 col-md-6">
						<div class="section-header">
						<div class="wow bounceIn"data-animation-delay="7.8s">
						
							<h2 class="section-heading animated"  >Our Service</h2>
							<h4>We can do no great things, only small things with great love</h4>
						
						</div>
						</div>
					</div>
				</div>
			<div class="row mar-bot40">
				<div class="col-lg-4" >
					<div class="wow bounceIn">
						<div class="align-center">
					
							<div class="wow rotateIn">
								<div class="service-col">
									<div class="service-icon">
										<figure><i class="fa fa-copyright"></i></figure>
									</div>
										<h2><a href="#">Organization</a></h2>
										<p>"Be a part of our journy ,be our strength,you can become the hope of innocent children"</p>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-lg-4" >
					<div class="align-center">
						<div class="wow bounceIn">
					   
							<div class="wow rotateIn">
								<div class="service-col">	
									<div class="service-icon">
										<figure><i class="fa fa-handshake-o"></i></figure>
									</div>
										<h2><a href="#">One to One</a></h2>
										<p>"You can make a child smile by fully or partially sponsoring them"</p>
								</div>
							</div>	
						</div>
					</div>
				</div>
			
				<div class="col-lg-4" >
					<div class="align-center">
						<div class="wow bounceIn">
							<div class="service-col">
								<div class="service-icon">
									<figure><i class="fa fa-dropbox"></i></figure>
								</div>
									<h2><a href="#">Logistics</a></h2>
									<p>"You can make everyone proud by taking the items to the children"</p>
							</div>
						</div>
					</div>
				</div>
			
			</div>	

		</div>
		</section>
		<!--/services-->
		
		<!-- spacer section:testimonial -->
		<!-- team -->
		<!-- /team -->
		
		<!-- spacer section:stats -->
	
		<!-- section works -->

		
		<!-- map -->
	<section id="footer" class="section footer">
		<div class="container">
			<div class="row animated opacity mar-bot0" data-andown="fadeIn" data-animation="animation">
				<div class="col-sm-12 align-center">
                    <ul class="social-network social-circle">
                        <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>				
				</div>
			</div>

			<div class="row align-center copyright">
					<div class="col-sm-12">
					    <p>&copy; Help ME</p>
                        <div class="credits">
                            <!-- 
                                All the links in the footer should remain intact. 
                                You can delete the links only if you purchased the pro version.
                                Licensing information: https://bootstrapmade.com/license/
                                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Green
                            -->
                            <a href="https://bootstrapmade.com/">Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>
                    </div>
			</div>
		</div>

	</section>
	<a href="#header" class="scrollup"><i class="fa fa-chevron-up"></i></a>	

	<script src="<?php echo base_url('assets/js/modernizr-2.6.2-respond-1.1.0.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.js')?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.easing.1.3.js')?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.isotope.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/nicescroll.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/fancybox/jquery.fancybox.pack.js')?>"></script>
	<script src="<?php echo base_url('assets/js/skrollr.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.scrollTo-1.4.3.1-min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.localscroll-1.2.7-min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/stellar.js')?>"></script>
	<script src="<?php echo base_url('assets/js/responsive-slider.js')?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.appear.js')?>"></script>
	<script src="<?php echo base_url('assets/js/grid.js')?>"></script>
	<script src="<?php echo base_url('assets/js/main.js')?>"></script>
	<script src="<?php echo base_url('assets/js/wow.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.js')?>"></script>

	<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
	<script>wow = new WOW({}).init();</script>
    

<script>
$(document).ready(function(){
    $("#login-form").validationEngine('attach', {promptPosition : "centerRight", scroll: false});
   });
</script>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #27ae60; color: white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Register</h4>
      </div>
      <div class="modal-body">
        <form id="register-form" class="text-left" action="http://localhost/charityApp/index.php/Register/setRegister" method = "post">
            <div class="login-form-main-message"></div>
            <div class="main-login-form">
                <div class="login-group">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control validate[required]" id="name" name="name" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" class="form-control validate[required]" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control validate[required]" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirm">Password Confirm</label>
                        <input type="password" class="form-control validate[required,equals[password]]" id="password_confirm" name="password_confirm" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control validate[required,custom[email]]" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group login-group-checkbox">
                        <input type="radio" class="validate[required]" name="reg_gender" id="male" value ="male">
                        <label for="male">male</label>

                        <input type="radio" class="validate[required]" name="reg_gender" id="female" value = "female">
                        <label for="female">female</label>
                    </div>
                </div>
                
            </div>
            <div class="etc-login-form">
                <p>already have an account? <a href="http://localhost/charityApp/index.php/Login">login here</a></p>
            </div>


      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" id="reg_btn">Sign In </button>
              </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</body>
</html>
<script>
$(document).ready(function(){
    $("#register-form").validationEngine('attach', {promptPosition : "centerRight", scroll: false});
   });
</script>
<script>
$(document).ready(function(){
    $("#login-form").validationEngine('attach', {promptPosition : "Top", scroll: false});
   });
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script type="text/javascript">
//paste this code under the head tag or in a separate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>


</body>
</html>