
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/childprofile.css');?>">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet" media="screen">  

<div class="container">
    <div class="row user-menu-container square">
        <div class="col-md-7 user-details">
            <div class="row coralbg white">
                <div class="col-md-6">
                    <div class="user-pad">
                        <h3><?php echo $child->name; ?></h3>
                        <h4 class="white"><i class="fa fa-globe" aria-hidden="true"></i> <?php echo $child->country; ?></h4>
                        <h5><i class="glyphicon glyphicon-map-marker"></i> <?php echo $child->address; ?></h5>
                        <h4 class="white"><i class="glyphicon glyphicon-chevron-right"></i><?php echo $child->accnumber; ?></h4>
                         <button type="button" class="btn btn-labeled" style ="background-color: white;color: #298751" href="#">
                             <span class="btn-label"><i class="glyphicon glyphicon-heart"></i></span>Donate</button>
                    </div>
                </div>
                <style>
                    .slim{
                        background-image: url("<?php echo base_url().$child->picture; ?>");
                        background-size: 350px 250px;
                    }
                </style>
                <div class="col-md-6 no-pad">
                    <div class="slim"
                        data-service="<?php echo base_url(); ?>index.php/FileUpload_c/slimasync/<?php echo $child->id; ?>/img1br1children1br1/children"
                        data-ratio="16:9"
                        data-size="640,418" style="width: 350px; height: 250px;">
                       <input type="file" name="slim[]" id="fileup"/>
                    </div>
                    
                </div>
            </div>
            <div class="row overview">
                <div class="col-md-4 user-pad text-center">
                    <h3>Donations</h3>
                    <h4 id="donationcount"></h4>
                </div>
                <div class="col-md-4 user-pad text-center">
                    <h3>Followers</h3>
                    <h4 id="followercount"></h4>
                </div>
                <div class="col-md-4 user-pad text-center">
                    <h3>Total Posts</h3>
                    <h4><?php echo(count($posts))?></h4>
                </div>
            </div>
        </div>
        <div class="col-md-1 user-menu-btns">
            <div class="btn-group-vertical square" id="responsive">
                <a href="#" class="btn btn-block btn-default active">
                  <i class="fa fa-bell-o fa-3x"></i>
                </a>
                <a href="#" class="btn btn-default">
                  <i class="fa fa-envelope-o fa-3x"></i>
                </a>
                <a href="#" class="btn btn-default">
                  <i class="fa fa-laptop fa-3x"></i>
                </a>
                <a href="#" class="btn btn-default">
                  <i class="fa fa-cog fa-3x"></i>
                </a>
            </div>
        </div>
        <div class="col-md-4 user-menu user-pad">
            <div class="user-menu-content active">
                <h3>
                    About me
                </h3>
                <ul class="user-menu-list">
                    <li>
                        <h4><i class="fa fa-user coral"></i> Full Name</h4>
                        <?php echo $child->name; ?>
                    </li>
                    <li>
                        <h4><i class="fa fa-heart-o coral"></i> Age</h4>
                        <?php 
                            $cdate = date_create(date("Y-m-d"));
                            $bdate = date_create($child->birthDate);
                            echo date_diff($cdate, $bdate)->format('%y years %m months %d days');
                        ?>
                    </li>
                    <li>
                        <h4><i class="fa fa-paper-plane-o coral"></i>Description</h4>
                        <div id="desc" class="collapse sidebar-box">
                        <p><?php echo $child->description; ?></p>
                        </div>
                    </li>
                    <li>
                        <button type="button" class="btn btn-labeled btn-success"  data-toggle="collapse" data-target="#desc" href="#">
                            <span class="btn-label"><i class="fa fa-bell-o"></i></span>View More</button>
                    </li>
                </ul>
            </div>
            <div class="user-menu-content">
                <h3>
                    Contact Details
                </h3>
                <ul class="user-menu-list ">
                    <li>
                       <h4 class="text-left"> <i class="glyphicon glyphicon-earphone"></i> <strong>  <?php echo $child->mobile; ?></strong> </h4>
                    </li>
                    <li>
                        <h4  class="text-left"><i class="glyphicon glyphicon-home"></i><strong>  <?php echo $child->address; ?></strong></h4>
                    </li>
                    <li>
                        <h4  class="text-left"><i class="glyphicon glyphicon-link"></i><strong>  <?php echo $child->email; ?></strong></h4>
                    </li>
<!--                     <li>
                        <button type="button" class="btn btn-labeled" href="#" style="color: white; background-color: #1c8e1c ">
                            <span class="btn-label"><i class="fa fa-envelope-o"></i></span>View All Messages</button>
                    </li> -->
                </ul>
            </div>

            <!--post content-->
            <div class="user-menu-content">
                <h3>
                    Posts
                </h3>
                <div class="row">
                    <!--post slider-->
                     <div class="col-md-12">
                  <div class="carousel slide multi-item-carousel" id="theCarousel">
                    <div class="carousel-inner">
                    <?php $i=0; ?>
                   <?php foreach($posts as $post) { ?>
                    <?php if ($i==0){ ?>
                      <div class="item active">
                        <div class="col-xs-4"><a href="#1">
                        <div class="view">
                                        <div class="caption">
                                            <p>47LabsDesign</p>
                                            <a href="" rel="tooltip" title="Appreciate"><span class="fa fa-heart-o fa-2x"></span></a>
                                            <a href="" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
                                        </div>
                                        <img src="<?php echo base_url();?><?php echo $post->imagepaths; ?>" class="img-responsive">
                                    </div>
                                    <div class="info">
                                        <p class="small" style="text-overflow: ellipsis"><?php echo $post->needs; ?></p>
                                        <p class="small coral text-right"><i class="fa fa-clock-o"></i> Posted|
                                         <?php echo $post->posteddate;?>
                                    </div>
                                    <div class="stats turqbg">
                                        <span class="fa fa-heart-o"> needed<strong><?php echo $post->amount;?></strong></span>
                                        <span class="fa fa-eye pull-right"> received<strong><?php echo $post->received_amount;?></strong></span>
                                    </div>
                        </a></div>
                      </div>
                      <?php $i++;}else{?>
                         <div class="item">
                        <div class="col-xs-4"><a href="#1">

                            <div class="view">
                                            <div class="caption">
                                                <p>47LabsDesign</p>
                                                <a href="" rel="tooltip" title="Appreciate"><span class="fa fa-heart-o fa-2x"></span></a>
                                                <a href="" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
                                            </div>
                                            <img src="<?php echo base_url();?><?php echo $post->imagepaths; ?>" class="img-responsive">
                                        </div>
                                        <div class="info">
                                            <p class="small" style="text-overflow: ellipsis"><?php echo $post->needs; ?></p>
                                            <p class="small coral text-right"><i class="fa fa-clock-o"></i> Posted | <?php echo $post->posteddate;?>
                                        </div>
                                        <div class="stats turqbg">
                                            <span class="fa fa-heart-o"> needed<strong><?php echo $post->amount;?></strong></span>
                                            <span class="fa fa-eye pull-right"> Received<strong><?php echo $post->received_amount;?></strong></span>
                                        </div>
                                
                            </a></div>
                          </div>

                       <?php }} ?>

           
                     
                   
                    
                                          
                   
            
                    </div>
                    <a class="left carousel-control" href="#theCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                    <a class="right carousel-control" href="#theCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                  </div>
                </div>   
                <!--end of post slider-->
                </div>

            </div>
            <!--end of post content-->
            <div class="user-menu-content">
                <h2 class="text-center">
                    FeedBack
                </h2>
                <center><i class="fa fa-cog" aria-hidden="true"></i></center>
                <div class="share-links">
                    <center><button type="button" style="display:none" onclick="follow()" id="follow" class="btn btn-lg btn-labeled btn-success" href="#" style="margin-bottom: 15px;">
                            <span class="btn-label"><i class="fa fa-bell-o"></i></span>Follow
                    </button></center>
                    <center><button type="button" style="display:none" onclick="unfollow()" id="unfollow" class="btn btn-lg btn-labeled btn-success" href="#" style="margin-bottom: 15px;">
                            <span class="btn-label"><i class="fa fa-bell-o"></i></span>UnFollow
                    </button></center>
                    <center><button type="button" class="btn btn-lg btn-labeled btn-warning" data-toggle="modal" data-target="fakemodal">
                            <span class="btn-label"><i class="glyphicon glyphicon-warning-sign" aria-hidden="true"></i></span>This is Fake
                    </button></center>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="fakemodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body…</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--
  following is for donation charts for received donation  
-->
<!-- donation with starts here -->

<!-- chart -->
    <div class="col-lg-12 col-sm-12" style="margin-top: 3px;">
        <div class="col-lg-3 col-sm-3">
        </div>
        <div class="col-lg-6 col-sm-6">
            <div id="chart_div"></div>
            <div class="row" id="chartinfo">
                <div class="col-sm-4">
                    <input type="date" id="strtdate" class="form-control">
                </div>
                <div class="col-sm-4">
                    <input type="date" id="enddate" class="form-control">
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-danger" id="change">Change X-axis</button>
                </div>
            </div>
        </div>


    </div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(loadGraphOnLoad);
    $('#strtdate,#enddate').change(function (){
        var strtDate = $('#strtdate').val();
        var endDate = $('#enddate').val();
        if((strtDate !== "") && (endDate !== "")){
             google.charts.setOnLoadCallback(loadData(strtDate,endDate));
        }
    });
    function loadGraphOnLoad(){
        var year = new Date().getFullYear();
        loadData(year+"-01-01",year+"-12-31");
		$('#strtdate').val(year+"-01-01");
        $('#enddate').val(year+"-12-31");
    }
    function loadData(startdate,endDate){
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/Donation_c/getRecievedDonationGraphData/"+<?php echo $child->id;  ?>+"/"+startdate+"/"+endDate,
            dataType: 'json',
            success: function (res) {
                var x = document.getElementById('donationcount');
                if(x.innerHTML=="")
                    x.innerHTML = res.length;
                if(res.length==0){
                    document.getElementById('chart_div').innerHTML="No donations to show up";
					$('#chartinfo').hide();
                    return;
                }
				$('#chartinfo').show();
                var arr=[];
                var k = Object.keys(res);
                for(var i=0;i<k.length;i++){
                    arr.push(
                            [new Date(res[k[i]].date),parseFloat(res[k[i]].amount)]
                    );
                }

                var data = new google.visualization.DataTable();
                data.addColumn('date', 'Date');
                data.addColumn('number', 'Amount');
                data.addRows(arr);


                var options = {
                  title: 'Your Donations',
                  width: 625,
                  height: 500,
                  hAxis: {
                    format: 'M/d/yy',
                    gridlines: {count: 15}
                  },
                  vAxis: {
                    gridlines: {color: 'none'},
                    minValue: 0
                  },
                  vAxis: {
                      format : 'currency'
                  }
                };

                var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));

                chart.draw(data, options);

                var button = document.getElementById('change');

                button.onclick = function () {

                    // If the format option matches, change it to the new option,
                    // if not, reset it to the original format.
                    options.hAxis.format === 'M/d/yy' ?
                    options.hAxis.format = 'MMM dd, yyyy' :
                    options.hAxis.format = 'M/d/yy';

                    chart.draw(data, options);
                };            
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText);
            }
        });
    }
</script>

<!-- donation ends here -->


<script type="text/javascript">
		$(document).ready(function() {        
        BootstrapDialog.show({
            message: 'Hi Apple!',
            buttons: [{
                label: 'Button 1',
                title: 'Mouse over Button 1'
            }, {
                label: 'Button 2',
                // no title as it is optional
                cssClass: 'btn-primary',
                action: function(){
                    alert('Hi Orange!');
                }
            }, {
                icon: 'glyphicon glyphicon-ban-circle',
                label: 'Button 3',
                title: 'Mouse over Button 3',
                cssClass: 'btn-warning'
            }, {
                label: 'Close',
                action: function(dialogItself){
                    dialogItself.close();
                }
            }]
        });
        })
</script>


<script type="text/javascript">
	var $el, $ps, $up, totalHeight;

$(".sidebar-box .button").click(function() {
      
  totalHeight = 0

  $el = $(this);
  $p  = $el.parent();
  $up = $p.parent();
  $ps = $up.find("p:not('.read-more')");
  
  // measure how tall inside should be by adding together heights of all inside paragraphs (except read-more paragraph)
  $ps.each(function() {
    totalHeight += $(this).outerHeight();
  });
        
  $up
    .css({
      // Set height to prevent instant jumpdown when max height is removed
      "height": $up.height(),
      "max-height": 9999
    })
    .animate({
      "height": totalHeight
    });
  
  // fade out read-more
  $p.fadeOut();
  
  // prevent jump-down
  return false;
    
});
</script>
<script type="text/javascript">
	$(document).ready(function() {
    var $btnSets = $('#responsive'),
    $btnLinks = $btnSets.find('a');
 
    $btnLinks.click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.user-menu>div.user-menu-content").removeClass("active");
        $("div.user-menu>div.user-menu-content").eq(index).addClass("active");
    });
});

$( document ).ready(function() {
    $("[rel='tooltip']").tooltip();    
 
    $('.view').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    ); 
});
</script>


<!-- following scripts starts here -->
<script>
    isFollower();
    function loadFollowers(){
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/Follow_c/getFollowers/"+<?php echo $child->id; ?>+"/0",
            dataType: 'json',
            success: function (res) {
                document.getElementById('followercount').innerHTML = res.length;
           
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText);
            }
        });
    }
    function isFollower(){
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/Follow_c/isFollower/"+<?php echo $child->id; ?>+"/0",
            success: function (res) {
                if(res){
                    document.getElementById('follow').style.display="none";
                    document.getElementById('unfollow').style.display="block";
                }
                else{
                    document.getElementById('unfollow').style.display="none";
                    document.getElementById('follow').style.display="block";
                }
                loadFollowers();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText);
            }
        });
    }
    function follow(){
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/Follow_c/follow/"+<?php echo $child->id; ?>+"/0",
            success: function (res) {
                if(res){
                    document.getElementById('follow').style.display="none";
                    document.getElementById('unfollow').style.display="block";
                    loadFollowers();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText);
            }
        });
    }
    function unfollow(){
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/Follow_c/unfollow/"+<?php echo $child->id; ?>+"/0",
            success: function (res) {
                if(res){
                    document.getElementById('unfollow').style.display="none";
                    document.getElementById('follow').style.display="block";
                    loadFollowers();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText);
            }
        });
    }
    
</script>
<!-- following scripts end`s here -->


<!--slider script-->

<script>
    

    // Instantiate the Bootstrap carousel
$('.multi-item-carousel').carousel({
  interval: false
});

// for every slide in carousel, copy the next slide's item in the slide.
// Do the same for the next, next item.
$('.multi-item-carousel .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  if (next.next().length>0) {
    next.next().children(':first-child').clone().appendTo($(this));
  } else {
    $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
  }
});
</script>


<!--end of slider script-->


