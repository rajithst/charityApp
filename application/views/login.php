<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


 <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>



    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/stylenew.css') ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/validationEngine.jquery.css')?>" type="text/css"/>

    <script src="<?php echo base_url('assets/js/jquery.validationEngine-en.js') ?>" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo base_url('assets/js/jquery.validationEngine.js') ?>" type="text/javascript" charset="utf-8"></script>
    <title>Login</title>
    <script>

    </script>
</head>
<body>

<nav class="navbar navbar-green navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand text-center" href="#" >Help ME</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <ul class="nav navbar-nav navbar-right">
        <li><p class="navbar-text">Already have an account?</p></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle navbar-left" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
        <ul id="login-dp" class="dropdown-menu dropdown-menu-right">
                <li>
           
                     <div class="row">
                            <div class="col-md-12">
                                Login via
                                <div class="social-buttons">
                                    <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                    <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
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
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<section>
  <div class="carousel slide carousel-fade" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
        </div>
        <div class="item">
        </div>
        <div class="item">
        </div>
    </div>
</div>

<!-- Remeber to put all the content you want on top of the slider below the slider code -->

<div class="title">

</div>
</section>




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
                        <label for="name" class="sr-only">Name</label>
                        <input type="text" class="form-control validate[required]" id="name" name="name" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <label for="username" class="sr-only">User Name</label>
                        <input type="text" class="form-control validate[required]" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" class="form-control validate[required]" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirm" class="sr-only">Password Confirm</label>
                        <input type="password" class="form-control validate[required,equals[password]]" id="password_confirm" name="password_confirm" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" class="form-control validate[required,custom[email]]" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group login-group-checkbox">
                        <input type="radio" class="validate[required] css-checkbox" name="reg_gender" id="male" value ="male">
                        <label for="male">male</label>

                        <input type="radio" class="validate[required] css-checkbox" name="reg_gender" id="female" value = "female">
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