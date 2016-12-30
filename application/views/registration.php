<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url() ?>vendor/bootstrap/css/bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>CSS/Custom.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <title>Login</title>
    <script>

    </script>
</head>
<body>
<div class="text-center" style="padding:50px 0">
    <div class="logo">register</div>
    <!-- Main Form -->
    <div class="login-form-1">
        <form id="register-form" class="text-left">
            <div class="login-form-main-message"></div>
            <div class="main-login-form">
                <div class="login-group">
                    <div class="form-group">
                        <label for="name" class="sr-only">Name</label>
                        <input type="text" class="form-control" id="name" name="reg_username" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <label for="username" class="sr-only">User Name</label>
                        <input type="text" class="form-control" id="username" name="reg_username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" class="form-control" id="password" name="reg_password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirm" class="sr-only">Password Confirm</label>
                        <input type="password" class="form-control" id="password_confirm" name="reg_password_confirm" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <label for="email" class="sr-only">Email</label>
                        <input type="text" class="form-control" id="email" name="reg_email" placeholder="Email">
                    </div>
                    <div class="form-group login-group-checkbox">
                        <input type="radio" class="" name="reg_gender" id="male">
                        <label for="male">male</label>

                        <input type="radio" class="" name="reg_gender" id="female">
                        <label for="female">female</label>
                    </div>
                </div>
                <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
            </div>
            <div class="etc-login-form">
                <p>already have an account? <a href="<?php echo base_url() ; ?>">login here</a></p>
            </div>
        </form>
    </div>
</div>
</body>
</html>