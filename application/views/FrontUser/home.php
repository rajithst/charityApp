<?php

$logedin = $this->session->userdata('loggedin');

if ($logedin != true){

    redirect('Login/logout');

}


?>
<div class="container-fluid">



<div class="container-fluid" style="margin-top:50px;">
<div class="row">

<!--left side bar-->
<div class="col-sm-3" style=" position:fixed">
  <div class="panel panel-default">
                                <div class="panel-thumbnail"><img src="http://www.bootply.com/assets/example/bg_5.jpg" class="img-responsive"></div>
                                <div class="panel-body">
                                  <p class="lead"><?php echo $this->session->userdata('name');?></p>
                                  <p>45 Followers, 13 Posts</p>
                                  
                                  <p>
                                    <img src="https://lh3.googleusercontent.com/uFp_tsTJboUY7kue5XAsGA=s28" width="28px" height="28px">
                                  </p>
                                </div>
                              </div>

</div>
<!--end of left side bar-->


<!--center scrolling area-->
<div class="col-sm-6 col-sm-offset-3" style="height:2400px;">
		   <div class="well"> 
             <form class="form-horizontal" role="form">
                <h4>What's New</h4>
                   <div class="form-group" style="padding:14px;">
                      <textarea class="form-control" placeholder="Update your status" id="post_txt"></textarea>
                        </div>
                         <button class="btn btn-primary pull-right" type="button">Post</button><ul class="list-inline"><li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li><li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
                 </form>
          </div>



                               <div class="panel panel-default">
                                 <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>post</h4></div>
                                  <div class="panel-body">
                                    <img src="//placehold.it/150x150" class="img-circle pull-right"> <a href="#">Keyword: Bootstrap</a>
                                    <div class="clearfix"></div>
                                    <hr>
                                    
                                    <p>If you're looking for help with Bootstrap code, the <code>twitter-bootstrap</code> tag at <a href="http://stackoverflow.com/questions/tagged/twitter-bootstrap">Stackoverflow</a> is a good place to find answers.</p>
                                    
                                    <hr>
                                    <form>
                                    <div class="input-group">
                                      <div class="input-group-btn">
                                      <button class="btn btn-default">+1</button><button class="btn btn-default"><i class="glyphicon glyphicon-share"></i></button>
                                      </div>
                                      <input type="text" class="form-control" placeholder="Add a comment..">
                                    </div>
                                    </form>
                                    
                                  </div>
                               </div>
   </div>

<!--end of center scrolling area-->

   	<!--right side bar-->
   <div class="col-sm-3" style="position:fixed;margin-left:72.66%">
   				   <div class="panel panel-default">
                                <div class="panel-thumbnail"><img src="http://www.bootply.com/assets/example/bg_4.jpg" class="img-responsive"></div>
                                <div class="panel-body">
                                  <p class="lead">Social Good</p>
                                  <p>1,200 Followers, 83 Posts</p>
                                  
                                  <p>
                                    <img src="https://lh6.googleusercontent.com/-5cTTMHjjnzs/AAAAAAAAAAI/AAAAAAAAAFk/vgza68M4p2s/s28-c-k-no/photo.jpg" width="28px" height="28px">
                                    <img src="https://lh4.googleusercontent.com/-6aFMDiaLg5M/AAAAAAAAAAI/AAAAAAAABdM/XjnG8z60Ug0/s28-c-k-no/photo.jpg" width="28px" height="28px">
                                    <img src="https://lh4.googleusercontent.com/-9Yw2jNffJlE/AAAAAAAAAAI/AAAAAAAAAAA/u3WcFXvK-g8/s28-c-k-no/photo.jpg" width="28px" height="28px">
                                  </p>
                                </div>
                              </div>
   </div>
   	<!--end of right side bar-->

</div>
</div>


<!--///////////////////////////////////////////////////////////////////-->

<div id="postModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
      </div>
      <div class="modal-body">


            <form role="form">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <h3>Step 1</h3>
                      <div class="row padding">
                      <div class="form-group">
        <span class="col-xs-2 ">
              <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRbezqZpEuwGSvitKy3wrwnth5kysKdRqBW54cAszm_wiutku3R" name="aboutme" width="70" height="70" class="img-circle"></a>
        <h4 class="text-center">Joe Sixpack</h4>
        </span>
        
        <span class="col-xs-2">
             <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRbezqZpEuwGSvitKy3wrwnth5kysKdRqBW54cAszm_wiutku3R" name="aboutme" width="70" height="70" class="img-circle"></a>
        <h4 class="text-center" >Joe Sixpack</h4>
        </span>
        
        <span class="col-xs-2">
             <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRbezqZpEuwGSvitKy3wrwnth5kysKdRqBW54cAszm_wiutku3R" name="aboutme" width="70" height="70" class="img-circle"></a>
        <h4 class="text-center">Joe Sixpack</h4>
        </span>
        
                <span class="col-xs-2">
             <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRbezqZpEuwGSvitKy3wrwnth5kysKdRqBW54cAszm_wiutku3R" name="aboutme" width="70" height="70" class="img-circle"></a>
        <h4 class="text-center">Joe Sixpack</h4>
        </span>
            <span class="col-xs-2 padding">
         <a href="#aboutModal" style="margin-top: 25px"><h4 class="text-center"> Create New</h4></a>
    </span>
       </div> 
    </div>          
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <div class="tab-pane active" role="tabpanel" id="step1">
                        <div class="step1">
                            <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">What they Need</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="What they Need">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Why they asking your help</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Why they asking your help">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Amount</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Confirm Ammount</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">How can you help</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                            </div>
                            <div class="col-md-6">
                            <label for="exampleInputEmail1">Tags</label>
                                <div class="row">
                                    <div class="col-md-9 col-xs-9">
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <h3>Step 3</h3>
                        <div class="row">
                        <div class="col">
                        <a class="btn btn-social-icon btn-facebook" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-facebook']);"><span class="fa fa-facebook"></span></a>
                        </div>
                        <div class="col">
                        <a class="btn btn-social-icon btn-google" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-google']);"><span class="fa fa-google"></span></a>

                        </div>
                        <div class="col">
                        </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <h3>Complete</h3>
                        <p>You have successfully completed all steps.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>






<!--//////////////////////////////////////////////////////////////////////-->


<!--chat window-->
<div class="chat_box">
	<div class="chat_head">chat box</div>
	<div class="chat_body">
		<?php foreach($users as $user):?>

			<?php if($user->username!=$this->session->userdata('username')): ?>
				<div class="user-chat">
				<?= $user->username; ?>
				</div>
			<?php endif; ?>		

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
		$('.chat_body').slideToggle('slow');

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

		$('.user-chat').click(function(){
			rec_name=$(this).text();
			rec_name=rec_name.replace(" ","");

			loadMessage(rec_name);
			readingStatus(rec_name);
			
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
			//alert("success");
			
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


<script>

$(document).ready(function(){
	//load all messages
	
	loadAllMessages();
	setInterval(loadAllMessages, 1000);


})


function loadAllMessages(){
	var count=0;
	
	$.ajax({
		type: "POST",
		url: "loadallmessages",
		success: function( data, textStatus, jQxhr ){
			$('.msg_menu').empty();
			
			var e = $('<li></li>');
			$('.msg_menu').append(e);    
			e.attr('class', 'msg_after');

			//empty array to put names
			// var names=[];
			// for(var t=0;t<data.length;t++){
			// 	names.push(data[t].sender);
			// }
			

			//unique names
			// var uniques=names.unique();

			

			//name append to header
			for(var i=(data.length-1);i>=0;i--){
				if (data[i].numofmessages>0){
					$("<li onclick='getvalue(this.id)' id='"+data[i].sender+"'><a href='#'><h3>"+data[i].sender+"("+data[i].numofmessages+")"+"</h3></a></li>").insertBefore('.msg_after');
				}
				else{
					$("<li onclick='getvalue(this.id)' id='"+data[i].sender+"'><a href='#'><h3>"+data[i].sender+"</h3></a></li>").insertBefore('.msg_after');

				}
				count+=parseInt(data[i].numofmessages);
			}

			//set number of messages to head
			$("#msg_num1,#msg_num2").text(count);
			
			},
		error: function( jqXhr, textStatus, errorThrown ){
			//alert("eror");
			}
		});

}



//algorithm to find unique values of a array
// Array.prototype.unique = function() {
//     var o = {}, i, l = this.length, r = [];
//     for(i=0; i<l;i+=1) o[this[i]] = this[i];
//     for(i in o) r.push(o[i]);
//     return r;
// };



//open chat box using header messages
function getvalue(str) {
  loadMessage(str);
			
			//alert(username);
			$('.name').text(str);
			$('.msg_wrap').show();
			$('.msg_box').show();
			readingStatus(str);
}

//reading status update
function readingStatus(name){
	$.ajax({
		type: "POST",
		url: "updateReadStatus",
		data: {name:name},
		success: function( data, textStatus, jQxhr ){
			//alert("success");
			
			},
		error: function( jqXhr, textStatus, errorThrown ){
			
			}
		});

}

</script>


<script >
<!--/////////////////////////script of posts////////////////////////////////-->
$(document).ready(function(){
	$("#post_txt").click(function(){
		$('#postModal').modal('show');

	});



});

<!--//////////////////////////////end of post script//////////////////////-->
</script>

