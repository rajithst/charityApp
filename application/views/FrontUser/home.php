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

	<a href="<?php echo base_url()?>index.php/FrontUser/Home/profile"><button type="button" class="btn btn-primary btn-block">Profile</button><a/>


<div class="row">
<div class="col-sm-6 col-sm-offset-3">
	<div class="form-group">
	  <label for="comment">Post:</label>
	  <textarea class="form-control" rows="5" id="comment"></textarea>
	</div>
</div>
</div>


<!--chat window-->
<div class="chat_box">
	<div class="chat_head">chat box</div>
	<div class="chat_body">
		<?php foreach($users as $user):?>
			<div class="user">
			<?= $user->username; ?>
			</div>
		<?php endforeach; ?>
		
	</div>
</div>
<!--end of chat window-->

<!--msg box-->
<div class="msg_box" style="right:290px;display:none">
	<div class="msg_head"><span class="name"></span>
	<div class="close">x</div>
	</div>

	<div class="msg_wrap">
		<div class="msg_body">
			<!-- <div class="msg_a"></div>
			<div class="msg_b"></div> -->
			<div class="msg_insert"></div>
		</div>
		<div class="msg_footer"><textarea class="msg_input"></textarea></div>
	</div>

</div>
<!--end of msg box-->
<input type="hidden" name="userdata" value="<?php echo $this->session->userdata('username'); ?>" id="ses_name">

</div>


<script>

/** message loading and save **/
	
	$(document).ready(function(){

		var rec_name;


		$('.chat_head').click(function(){
			$('.chat_body').slideToggle('slow');

		});

		$('.msg_head').click(function(){
			$('.msg_wrap').slideToggle('slow');

		});

		$('.close').click(function(){
			$('.msg_box').hide();
		});

		$('.user').click(function(){
			rec_name=$(this).text();
			rec_name=rec_name.replace(" ","");

			loadMessage(rec_name);
			
			//alert(username);
			$('.name').text(rec_name);
			$('.msg_wrap').show();
			$('.msg_box').show();
		});


		$('textarea').keypress(
			function(e){
				if(e.keyCode==13){
					var msg=$(this).val();
					$(this).val("");

					//insert message to db
					saveMessage(msg,rec_name);

					$("<div class='msg_b'>"+msg+"</div>").insertBefore('.msg_insert');
					$('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
				}

			});
	});



	function saveMessage(msg,rec) {
		///alert(msg);
	$.ajax({
		type: "POST",
		url: "messageSave",
		data: {message:msg,receiver:rec},
		success: function( data, textStatus, jQxhr ){
			alert("success");
			
			},
		error: function( jqXhr, textStatus, errorThrown ){
			
			}
		});
	}

	function loadMessage(rec){

		$(".msg_body").empty();

		$.ajax({
		type: "POST",
		url: "messageLoad",
		data: {receiver:rec},
		success: function( data, textStatus, jQxhr ){
			var ses_name=$('#ses_name').val();
			
			var e = $('<div></div>');
			$('.msg_body').append(e);    
			e.attr('class', 'msg_insert');
			for(var i=0;i<data.length;i++){
				
				if(data[i].sender==ses_name){
					$("<div class='msg_b'>"+data[i].message+"</div>").insertBefore('.msg_insert');

				}

				else{
					$("<div class='msg_a'>"+data[i].message+"</div>").insertBefore('.msg_insert');

				}

			}

			},
		error: function( jqXhr, textStatus, errorThrown ){
			
			}
		});


	}



</script>