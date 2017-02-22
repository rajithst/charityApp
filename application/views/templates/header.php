<!DOCTYPE html>
<html lang="en">
        
<head>
  <title>charity</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/loader.css') ?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/css/chat.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/hover.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/childcard.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/css/event.css'); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/slim.css');?>">
    <script type="text/javascript" src="<?php echo base_url('assets/js/moment.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/daterangepicker.js');?>"></script>
            
    <script src="<?php echo base_url('assets/js/slim.jquery.js');?>"></script>
    <script src="<?php echo base_url('assets/js/slim.kickstart.js');?>"></script>  

  <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap-confirmation.js');?>"></script>

  <script src="<?php echo base_url('assets/js/jquery.bootstrap-growl.js');?>"></script>
  <!--mention tags-->
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
       <script src='//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js' type='text/javascript'></script>
         <script src="<?php echo base_url('assets/js/jquery.elastic.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.mentionsInput.js');?>"></script>

      <!--end of mention tags-->


</head>

<!-- Navbar -->

<body style="padding-top: 50px;">

<script>

          window.fbAsyncInit = function() {
          FB.init({
            appId      : '1050981661712135',
            xfbml      : true,
            version    : 'v2.8'
          });
          FB.AppEvents.logPageView();
        };

        (function(d, s, id){
           var js, fjs = d.getElementsByTagName(s)[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement(s); js.id = id;
           js.src = '//connect.facebook.net/en_US/sdk.js';
           fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));

         

          function fbLogoutUser() {
           FB.getLoginStatus(function(response) {
              if (response && response.status === 'connected') {
                    FB.logout(function(response) {
                      document.location.reload();
                });
            }
      });
  }

        </script>

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
     <!--  <form class="navbar-form navbar-left">
        <div class="input-group input-group-sm" style="max-width:360px;">
          <input type="text" class="form-control" placeholder="Search" name="srch-term" id="search_profile">
          <div class="input-group-btn">
              <button class="btn btn-default" id="searchbtn" type="button"><i class="glyphicon glyphicon-search"></i></button>
          </div>
        </div>
        <ul id="srch_items" class="list-group"></ul>
      </form> -->

  <div class="container navbar-form navbar-left">
    <div class="row">    
        <div class="col-xs-10 col-xs-offset-1">
        <div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      <span id="search_concept">Filter by</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#filter_donor">Donor</a></li>
                      <li><a href="#filter_child">Child</a></li>
                      <li><a href="#filter_all">Anything</a></li>
                    </ul>
                </div>
                <input type="hidden" name="search_param" value="filter_all" id="search_param">         
                <input type="text" class="form-control" name="x" placeholder="Search term..." id="search_profile">
                <span class="input-group-btn">
                    <button class="btn btn-default" id="searchbtn" type="button"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </div>
  </div>
  <ul id="srch_items" class="list-group" style="max-height:200px;overflow-y:scroll"></ul>
</div>


      <ul class="nav navbar-nav navbar-right">
        <ul class="nav navbar-nav">

          <li>
            <a href="<?php echo base_url()."Home"; ?>"><i class="glyphicon glyphicon-home" ></i> Home</a>
          </li>

          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning notificationcount"></span>
            </a>
            <ul class="dropdown-menu">
                <li class="header">You have <l class="notificationcount"></l> notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu" id="notifications">
                </ul>  
                </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- notification script starts here-->
          <script>
          showNotifications();
          setInterval(showNotifications, 10000);
          $('#notifications').click(function (e){
              var id = e.target.id;
              if(id!="notifications"){
                  setViewNotfy(id);
              }
          });
          function showNotifications(){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/FrontUser/Home/getNotifications/<?php echo $this->session->userdata('id'); ?>",
                dataType: 'json',
                success: function( data, textStatus, jQxhr ){
                    $('.notificationcount').html(data.length);
                    $('#notifications').html("");
                    for(var i=0;i<data.length;i++){
                        var x = data[i].notification;
                        var x = x.split("<aba>");
                        $('#notifications').append('<li>\
                                                    <a href="<?php echo base_url(); ?>index.php/FrontUser/Home/profile/'+x[0]+'" style="cursor:pointer;" id="'+data[i].id+'">\
                                                      <i class="fa fa-users text-aqua"></i>'+x[1]+'</a>\
                                                  </li>');
                    }
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    //alert(jqXhr.responseText);
                  }
                });        
          }
          function setViewNotfy(id){
              $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/FrontUser/Home/setViewNotifications/"+id,
                dataType: 'json',
                success: function( data, textStatus, jQxhr ){
                    showNotifications();
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    //alert(jqXhr.responseText);
                  }
                });
          }
          </script>
          <!-- notification script ends here-->

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
              <img src="<?php 
                if($this->session->userdata('google')){
                    echo $this->session->userdata('picture');
                }
                else if($this->session->userdata('fb')){
                    echo 'http://graph.facebook.com/' . $this->session->userdata('username') . '/picture?type=normal';
                }
                else{
                    echo base_url().$this->session->userdata('picture');
                }
                 ?>" class="profilepic user-image" alt="User Image" width="160px" height="160px">
              <span class="hidden-xs"><?php echo $this->session->userdata('username').'<br>';?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php 
                if($this->session->userdata('google')){
                    echo $this->session->userdata('picture');
                }else if($this->session->userdata('fb')){
                    echo 'http://graph.facebook.com/' . $this->session->userdata('username') . '/picture?type=normal';
                }
                else{
                    echo base_url().$this->session->userdata('picture');
                }
                 ?>" class="profilepic img-circle" alt="User Image">
                <p>
                  <?php echo $this->session->userdata('username').'<br>';?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url()."index.php/FrontUser/Home/profile/".$this->session->userdata('id') ?>" class="btn btn-success btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <!-- google sign in -->
                  <script src="https://apis.google.com/js/platform.js" async defer></script>
                  <meta name="google-signin-client_id" content="760126013179-gafn70enmd5f2ejfb4if83akv2422phk.apps.googleusercontent.com">
                                    
                  <a onclick="signOut();" class="btn btn-success btn-flat">logout</a>
                  <script>
                    function signOut() {
                        if("<?php echo $this->session->userdata('google'); ?>"){
                            var auth2 = gapi.auth2.getAuthInstance();
                            auth2.signOut().then(function () {
                                
                            });
                        }
                        window.location = "<?php echo base_url()?>index.php/Login/logout";
                    }
                    function onLoad() {
                        gapi.load('auth2', function() {
                          gapi.auth2.init();
                        });
                      }
					  
                  </script>
                  <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
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


  $(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
    e.preventDefault();
    var param = $(this).attr("href").replace("#","");
    var concept = $(this).text();
    $('.search-panel span#search_concept').text(concept);
    $('.input-group #search_param').val(param);

     var filter_type=$('.input-group #search_param').val();
          var name=$("#search_profile").val();
          $('#srch_items').html("");
          if(name!=""){
              showResults(name,filter_type);
          }
  });
});

    $(document).ready(function(){
      $("#search_profile").keyup(function(){
        var filter_type=$('.input-group #search_param').val();
        // console.log(filter_type=="filter_all");

          var name=this.value;
          $('#srch_items').html("");
          if(name!=""){
              showResults(name,filter_type);
          }
      });
      $("#searchbtn").click(function(){
     
          var filter_type=$('.input-group #search_param').val();
          var name=$("#search_profile").val();
          $('#srch_items').html("");
          if(name!=""){
              showResults(name,filter_type);
          }
      });
      $('#srch_items').click(function(e){
          var id = e.target.id;
          var x = id.split("$");
          if(x[0] == "child"){
              window.location = "<?php echo base_url(); ?>index.php/Child/Children_c/viewChild/"+x[1];
          }else if(x[0] == "user"){
              window.location = "<?php echo base_url(); ?>index.php/FrontUser/Home/profile/"+x[1];
          }
      });
    });
    function showResults(name,filter_type){
          $.ajax({
              type: "POST",
              url: "<?php echo base_url(); ?>index.php/FrontUser/searchController/searchProf",
              data: {name:name},
              success: function( data, textStatus, jQxhr ){
                  				var obj = data;
                        if((obj.users.length>0)||(obj.children.length>0)){
                         try{
                          var items=[]; 
                          //filter all 
                          if(filter_type=="filter_all"){
                          $.each(obj.users, function(i,val){  
                              var pic = '<?php echo base_url();?>'+val.picture;
                              if(val.type=='google'){
                                  var pic = val.picture;
                              }
                              else if(val.type=='facebook'){
                                  var pic="http://graph.facebook.com/"+val.username+"/picture?type=normal";
                              }
                              items.push($('<a class="list-group-item" href="<?php echo base_url();?>FrontUser/Home/profile/'+val.id+'"><li class="list-group-item"/></a>').html('<img src="'+pic+'" width="15px" height="15px"/>'+' '+val.name));
                          });
                        $.each(obj.children, function(i,val){           
                              items.push($('<a class="list-group-item" href="<?php echo base_url();?>index.php/Child/Children_c/viewChild/'+val.id+'"><li class="list-group-item"/></a>').html('<img src="<?php echo base_url();?>'+val.picture+'" width="15px" height="15px"/>'+' '+val.name));
                          });
                      }

                      //filter child

                      else if(filter_type=="filter_child"){
                         $.each(obj.children, function(i,val){           
                              items.push($('<a class="list-group-item" href="<?php echo base_url();?>index.php/Child/Children_c/viewChild/'+val.id+'"><li class="list-group-item"/></a>').html('<img src="<?php echo base_url();?>'+val.picture+'" width="15px" height="15px"/>'+' '+val.name));
                          });

                      }

                      else if(filter_type=="filter_donor"){

                         $.each(obj.users, function(i,val){  
                              var pic = '<?php echo base_url();?>'+val.picture;
                              if(val.type=='google'){
                                  var pic = val.picture;
                              }
                              else if(val.type=='facebook'){
                                  var pic="http://graph.facebook.com/"+val.username+"/picture?type=normal";
                              }
                              items.push($('<a class="list-group-item" href="<?php echo base_url();?>FrontUser/Home/profile/'+val.id+'"><li class="list-group-item"/></a>').html('<img src="'+pic+'" width="15px" height="15px"/>'+' '+val.name));
                          });

                      }

                          $('#srch_items').append.apply($('#srch_items'), items);
                         }catch(e) {  
                          alert('Exception while request..');
                         }  
                        }else{
                         $('#srch_items').html($('<a class="list-group-item"><li class="list-group-item"/></a>').html('No data found'));  
                        }
                
                },
              error: function( jqXhr, textStatus, errorThrown ){
                  //alert(jqXhr.responseText);
                }
              });        
    };

  </script>

  <!--end of search for vendor-->
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

<!-- post modal-->
<div id="post_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close postclose" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Donations</h4>
            </div>
            <div class="modal-body" id="postModal_body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default postclose" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>



<div id="donation_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Donations</h4>
            </div>
            <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-6">
                        <input type="date" id="donationstrtdate" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <input type="date" id="donationenddate" class="form-control">
                    </div>
                </div>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Payment Status</th>
                      </tr>
                    </thead>
                    <tbody id="donationtable">

                    </tbody>
                  </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div id="follow_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Followers</h4>
            </div>
            <div class="modal-body">
                 <ul id="follow_items" class="list-group"></ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<script>
    
    $('#donationstrtdate,#donationenddate').change(function (){
        var strtDate = $('#donationstrtdate').val();
        var endDate = $('#donationenddate').val();
        if((strtDate !== "") && (endDate !== "")){
             getDonations("<?php echo $this->session->userdata('id'); ?>",strtDate,endDate);
        }
    });
    
    var year = new Date().getFullYear();
    getDonations("<?php echo $this->session->userdata('id'); ?>",year+"-01-01",year+"-12-31");
    function getDonations(id,startdate,endDate){
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/Donation_c/getDonations/"+id+"/"+startdate+"/"+endDate,
            dataType: 'json',
            success: function (res) {
                $('#donationtable').html('');
                if(res.length==0){
                    $('#donationtable').html('No donations to show up');
                    return;
                }
                var k = Object.keys(res);
                for(var i=0;i<k.length;i++){
                    $('#donationtable').append('<tr id='+res[k[i]].postID+'>\
                            <td>'+res[k[i]].date+'</td>\
                            <td>$'+res[k[i]].amount+'</td>\\n\
                            <td>'+res[k[i]].payment_status+'</td>\
                          </tr>');
                }
                            
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText);
            }
        });
    }
    $('#donationtable').click(function (e){
        var id = $(event.target).parent().attr('id');
        if((id!='donationtable')||(id!='')){
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "index.php/FrontUser/postController/loadCurrentPost/"+id,
                dataType: 'json',
                success: function (data) {
                    var amountprogress = (parseFloat(data.received_amount)/parseFloat(data.amount))*100;
                    var pic="";
                    if(data.type=='google'){
                      pic=data.picture;
                    }
                    else if(data.type=='facebook'){
                      pic="http://graph.facebook.com/"+ data.username+ "/picture?type=normal";
                    }
                    else{
                      pic="<?php echo base_url(); ?>"+data.picture;

                    }
      
                    var children = data.children;
                    var childrenstr = '';
                    for(var j=0;j<children.length;j++){
                        childrenstr += '<a href="<?php echo base_url(); ?>index.php/Child/Children_c/viewChild/'+children[j].id+'">'+children[j].name+' '+children[j].lastname+'</a>'
                    }
                    $('#postModal_body').html('<div class="panel panel-default" style="width:565px; margin-bottom:14px;">\
                        <div class="panel-heading">\
                            <div class="row">\
                                <div class="col-sm-6 pull-right" style="background-color: #f5f5f5;margin-top:10px;padding:2px; border-color: #ddd;">\
                                    <div class="col-sm-6">$'+data.amount+' needed<br/>$'+data.received_amount+' received</div>\
                                    <div class="col-sm-6">\
                                    56 days left<br/> 5 donations\
                                    </div>\
                                </div>\
                                <div class="col-sm-6 pull-left">\
                                    <img src="'+pic+'" width="35px" height="35px"/>\
                                    <span><a href="<?php echo base_url(); ?>FrontUser/Home/profile/'+data.ids+'">'+data.username+'</a></span>\
                                </div>\
                            </div>\
                            <div>Children : '+childrenstr+'</div>\
                        </div>\
                        <div class="panel-body">\
                            <div class="row" style="width: 565px; min-width:auto; position: absolute;">\
                               <div class="col-sm-3 col-xs-3 overimage resize animated fadeIn "><h4 class="text-center" style="font-size: 1em;">What</h4>\
                               <h6 class="text-center" >'+data.needs+'</h6></div>\
                               <div class="col-sm-3 col-xs-3 overimage resize  animated fadeIn "><h4 class="text-center" style="font-size: 1em;">why</h4>\
                               <h6 class="text-center" >'+data.why_help+'</h6></div>\
                               <div class="col-sm-4 col-xs-4 overimage resize animated fadeIn "><h4 class="text-center" style="font-size: 1em;">How</h4>\
                               <h6 class="text-center" >'+data.how_help+'</h6></div>\
                            </div>\
                            <img src="<?php echo base_url(); ?>'+data.imagepaths+'" alt="" class="img-responsive center-block" />\
                        </div>\
                        <div class="panel-footer">\
                            <div class="row">\
                                <div class="col-sm-12">\
                                    <div class="progress">\
                                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="'+amountprogress+'" aria-valuemin="0" aria-valuemax="100" style="width:'+amountprogress+'%">'+amountprogress+'% Complete (success)\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                            <div class="row">\
                                <div class="col-sm-12" style="margin-bottom: 5px">\
                                    <div class="input-group">\
                                        <span class="input-group-addon">$</span>\
                                        <input id="" type="text" value="'+data.amount+'" class="form-control" name="" placeholder="Amount">\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    </div>');
                    $('#donation_modal').modal('hide');
                    $('#post_modal').modal('show');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(jqXHR.responseText);
                }
            });
        }
    });
    $('.postclose').on('click',function (){
        $('#donation_modal').modal('show');
    });
    
    loadFollowers("<?php echo $this->session->userdata('id'); ?>");
    function loadFollowers(id){
        jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "index.php/Follow_c/getFollowers/"+id+"/1",
                dataType: 'json',
                success: function (obj) {
                        $('.followercount').html(obj.length);
                    	var items=[];
                        $.each(obj, function(i,val){  
                             var pic = '<?php echo base_url();?>'+val.picture;
                             if(val.type=='google'){
                                 var pic = val.picture;
                             }
                             else if(val.type=='facebook'){
                                 var pic="http://graph.facebook.com/"+val.username+"/picture?type=normal";
                             }
                             items.push($('<a class="list-group-item" href="<?php echo base_url();?>FrontUser/Home/profile/'+val.id+'"><li class="list-group-item"/></a>').html('<img src="'+pic+'" width="50px"/>'+' '+val.name));
                        });

                        $('#follow_items').append.apply($('#follow_items'), items);
                        
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(jqXHR.responseText);
                }
            });
    }
    
    
   
</script>    



<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<!-- loader -->
<script type="text/javascript">
//paste this code under the head tag or in a separate js file.
    // Wait for window load
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });
</script>
</body>
