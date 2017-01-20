<?php

$logedin = $this->session->userdata('loggedin');

if ($logedin != true){

    redirect('Login/logout');

}


?>

<div class="container-fluid">


username = <?php echo $this->session->userdata('username').'<br>';?>
name = <?php echo $this->session->userdata('name').'<br>';?>
email = <?php echo $this->session->userdata('email').'<br>';?>

<a href='Login/logout'>logout</a>

<hr/>

this is a temporary ui
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
	<div class="form-group">
	  <label for="comment">Post:</label>
	  <textarea class="form-control" rows="5" id="comment"></textarea>
	</div>
</div>
</div>

</div>



