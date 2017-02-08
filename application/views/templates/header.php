
<!DOCTYPE html>
<html lang="en">
<head>
  <title>charity</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/loader.css') ?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/css/chat.css');?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/css/event.css'); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

  <!--mention tags-->

       <script src='//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js' type='text/javascript'></script>
         <script src="<?php echo base_url('assets/js/jquery.elastic.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.mentionsInput.js');?>"></script>

      <!--end of mention tags-->


</head>

<!-- Navbar -->

<body style="padding-top: 50px;">
  <div class="navbar padding navbar-fixed-top">
    <div class="navbar-header">
      <button class="navbar-toggle navbar-tog" type="button" data-toggle="collapse" data-target=".navbar-collapse" style="color : black;">
        <span class="sr-only">Toggle</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="<?php echo base_url()."Home"; ?>" class="navbar-brand logo"><b style="color: white;">Help Me</b></a>
    </div>
    <nav class="collapse navbar-collapse  container-fluid" role="navigation">
      <form class="navbar-form navbar-left">
        <div class="input-group input-group-sm" style="max-width:360px;">
          <input type="text" class="form-control" placeholder="Search" name="srch-term" id="search_profile">
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
          </div>
        </div>
        <ul id="srch_items" class="list-group"></ul>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <ul class="nav navbar-nav">

          <li>
            <a href="<?php echo base_url()."Home"; ?>"><i class="glyphicon glyphicon-home" ></i> Home</a>
          </li>

          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-user"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>

              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <li><!-- start message -->
                  <a href="#">
                    <h4>
                      Support Team
                      <small><i class="fa fa-clock-o"></i> 5 mins</small>
                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                  </a>
                </li>
                <!-- end message -->
              </ul>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>

 <!-- messages -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-danger" id="msg_num1"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <span id="msg_num2"></span> messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu msg_menu">
                
                  <!-- end task item -->
                
                  <li class="msg_after"></li>
                 
                  
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all messages</a>
              </li>
            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="" class="profilepic user-image" alt="User Image" width="160px" height="160px">
              <span class="hidden-xs"><?php echo $this->session->userdata('username').'<br>';?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="" class="profilepic img-circle" alt="User Image">
                <p>
                  <?php echo $this->session->userdata('username').'<br>';?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#" class="btn btn-info btn-flat">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#" class="btn btn-info btn-flat">Donations</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#" class="btn btn-info btn-flat">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url()."index.php/FrontUser/Home/profile/".$this->session->userdata('id') ?>" class="btn btn-success btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url()?>index.php/Login/logout" class="btn btn-success btn-flat">logout</a>
                </div>
              </li>
            </ul>
          </li>
      </ul>
    </ul>
    </nav>
  </div>

  <!--search for vendor-->
  <script>
    $(document).ready(function(){
      $("#search_profile").keyup(function(){
          var name=this.value;


          $.ajax({
              type: "POST",
              url: "searchProfile",
              data: {name:name},
              success: function( data, textStatus, jQxhr ){
               
                        $('#srch_items').html("");
                        var obj = data;
                        if(obj.length>0){
                         try{
                          var items=[];  
                          $.each(obj, function(i,val){           
                              items.push($('<li class="list-group-item"/>').text(val.name ));
                          }); 
                          $('#srch_items').append.apply($('#srch_items'), items);
                         }catch(e) {  
                          alert('Exception while request..');
                         }  
                        }else{
                         $('#finalResult').html($('<li/>').text("No Data Found"));  
                        }
                
                },
              error: function( jqXhr, textStatus, errorThrown ){
                
                }
              });


        
      });
    });

  </script>

  <!--end of search for vendor-->
  <!-- profile picture -->
  <script>
    loadProfPic();
    function loadProfPic(){
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/FrontUser/Home/getPicture/" + "<?php echo $this->session->userdata('id'); ?>",
            success: function (res) {
                $('.profilepic').attr('src','<?php echo base_url(); ?>'+res);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText);
            }
        });
    }
    
  </script>
  <!-- end of profile picture -->

<script>

$(document).ready(function(){
  //load all messages
  
  loadAllMessages();
  setInterval(loadAllMessages, 1000);


});

function loadAllMessages(){
  var count=0;
  
  $.ajax({
    type: "POST",
    url: "<?php echo base_url(); ?>" + "index.php/FrontUser/chatController/loadAll/",
    success: function( data, textStatus, jQxhr ){
      if(data.length>0){
      $('.msg_menu').empty();
      
      var e = $('<li></li>');
      $('.msg_menu').append(e);    
      e.attr('class', 'msg_after');

      //empty array to put names
      // var names=[];
      // for(var t=0;t<data.length;t++){
      //  names.push(data[t].sender);
      // }
      

      //unique names
      // var uniques=names.unique();

      

      //name append to header
      for(var i=(data.length-1);i>=0;i--){
        if (data[i].numofmessages>0){
          $("<li onclick='getvalue(this.id)' id='"+data[i].sender+"'><a href='#'><h3>"+data[i].sender+"("+data[i].numofmessages+")"+"</h3></a></li>").insertBefore('.msg_after');
          count+=parseInt(data[i].numofmessages);
        }
        else{
          // $("<li onclick='getvalue(this.id)' id='"+data[i].sender+"'><a href='#'><h3>"+data[i].sender+"</h3></a></li>").insertBefore('.msg_after');

        }
        
      }

      //set number of messages to head
      
    }
    $("#msg_num1,#msg_num2").text(count);
      
      },
    error: function( jqXhr, textStatus, errorThrown ){
		alert(jqXHR.responseText);
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
    url: "<?php echo base_url(); ?>" + "index.php/FrontUser/chatController/updateRead",
    data: {name:name},
    success: function( data, textStatus, jQxhr ){
      //alert("success");
      
      },
    error: function( jqXhr, textStatus, errorThrown ){
        alert(jqXHR.responseText);
      }
    });

}

</script>


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
    url: "<?php echo base_url(); ?>" + "index.php/FrontUser/chatController/saveMessage/",
    data: {message:msg,receiver:rec},
    success: function( data, textStatus, jQxhr ){
      //alert("success");
      
      },
    error: function( jqXhr, textStatus, errorThrown ){
        alert(jqXHR.responseText);
      }
    });
  }

  function loadMessage(rec){
    

    $(".msg_body").empty();

    $.ajax({
    type: "POST",
    url: "<?php echo base_url(); ?>" + "index.php/FrontUser/chatController/loadMessage/",
    data: {receiver:rec},
    success: function( data, textStatus, jQxhr ){
      if(data.length>0){
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
    }

      },
    error: function( jqXhr, textStatus, errorThrown ){
        alert(jqXHR.responseText);
      }
    });


  }



</script>

<!--chat window-->
<div class="chat_box" style="z-index:1">
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
<div class="msg_box" style="right:290px;display:none;z-index:1">
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
