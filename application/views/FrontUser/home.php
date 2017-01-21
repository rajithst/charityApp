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
	<a href="<?php echo base_url()?>index.php/home/profile"><button type="button" class="btn btn-primary btn-block">Profile</button><a/>
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
	<div class="form-group">
	  <label for="comment">Post:</label>
	  <textarea class="form-control" rows="5" id="comment"></textarea>
	</div>
</div>
</div>

</div>



