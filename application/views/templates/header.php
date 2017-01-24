<!DOCTYPE html>
<html lang="en">
<head>
  <title>charity</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">

   <link rel="stylesheet" href="<?php echo base_url('assets/css/chat.css');?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>


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
      <a href="<?php echo base_url()."Home"; ?>" class="navbar-brand logo"><b style="color: #990000;">Help Me</b></a>
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
                    <div class="pull-right">
                      <img src=<?php echo base_url($this->session->userdata('picture')) ?>" class="img-circle" alt="User Image">
                    </div>
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
              <img src="<?php echo base_url($this->session->userdata('picture')) ?>" class="user-image" alt="User Image" width="160px" height="160px">
              <span class="hidden-xs"><?php echo $this->session->userdata('username').'<br>';?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url($this->session->userdata('picture')) ?>" class="img-circle" alt="User Image">
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
                  <a href="<?php echo base_url(); ?>profile" class="btn btn-success btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href='Login/logout' class="btn btn-success btn-flat">logout</a>
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


<body>
