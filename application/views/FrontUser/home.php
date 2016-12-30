<?php

$logedin = $this->session->userdata('loggedin');

if ($logedin != true){

    redirect('Login/logout');

}


?>

<html>
<head>
<title>Welcome</title>
</head>
<body>

<h2>charity</h2>


username = <?php echo $this->session->userdata('username').'<br>';?>
name = <?php echo $this->session->userdata('name').'<br>';?>
email = <?php echo $this->session->userdata('email').'<br>';?>

<a href='Login/logout'>logout</a>


</body>
</html>