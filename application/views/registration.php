<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/Custom.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->



    <title>Register</title>

    <script type="text/javascript">

        function validatefname(name) {
            console.log('ll');
            /*   var reg = /[A-Za-z -']$/;

             if(reg.test(document.getElementById(name).value)){
             document.getElementById(name).style.background ='#0DD160';
             document.getElementById('nameError').style.display = "none";
             return true;
             }else{

             document.getElementById(name).style.background ='#FA3535';
             document.getElementById('nameError').style.display = "block";
             return false;
             }*/
        }
    </script>
</head>
<body>
<div class="text-center" style="padding:50px 0">
    <div class="logo">register</div>
    <!-- Main Form -->
    <div class="login-form-1">
        <form id="register-form" class="text-left" action="<?php echo base_url('index.php/Register/setRegister') ?>" method = "post">
            <div class="login-form-main-message"></div>
            <div class="main-login-form">
                <div class="login-group">
                    <div class="form-group">
                        <label for="name" class="sr-only">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" onblur="validatefname(name)">

                    </div>
                    <div class="form-group">
                        <label for="username" class="sr-only">User Name</label>
                        <input type="text" class="form-control " id="username" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" class="form-control " id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirm" class="sr-only">Password Confirm</label>
                        <input type="password" class="form-control " id="password_confirm" name="password_confirm" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" class="form-control " id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group login-group-checkbox">
                        <input type="radio" name="reg_gender" id="male" value ="male">
                        <label for="male">male</label>

                        <input type="radio"  name="reg_gender" id="female" value = "female">
                        <label for="female">female</label>
                    </div>
                </div>
                <button type="submit" class="login-button" id="reg_btn"><i class="fa fa-chevron-right"></i></button>
            </div>
            <div class="etc-login-form">
                <p>already have an account? <a href="<?php echo base_url('index.php/Login') ; ?>">login here</a></p>
            </div>
        </form>
    </div>
</div>



</body>
</html>