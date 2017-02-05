
<div class="" style="background-color: #c1f1d5">
    <div class="container" style="background-color: #c1f1d5">
        <div class="row">
            <div class="col-md-10 col-xs-11 col-lg-push-1 col-xs-push-">
                <div class="well panel panel-default profile-card">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 text-center">
                                <img src="<?php echo base_url($user->picture); ?>" alt="User" class="center-block img-circle img-thumbnail img-responsive">
                                <ul class="list-inline ratings text-center" title="Ratings">
                                    <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                                    <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                                    <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                                    <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                                    <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                                </ul>
                                <p>
                                    <h4>
                                    <b>Rating : 7.8/10</b>
                                    </h4>
                                </p>
                            </div>
                            <!--/col-->
                            <div class="col-xs-12 col-sm-8">
                                <h2><?php echo $user->name." ".$user->lastname; ?></h2>
                                <p><strong>About: </strong> <?php echo $user->about; ?> </p>
                                <p><strong>career: </strong>
                                    <?php 
                                    foreach($career as $row)       
                                    {
                                    ?>
                                    <span class="label label-info tags"><?php echo $row->career; ?></span>
                                    <?php
                                    }
                                    ?>
                                </p>
                            </div>
                            <?php 
                            if($this->session->userdata('id')==$user->id)
                            {
                            ?>
                            <div class="col-lg-2 edit-profile-btn">
                                <a href="<?php echo base_url(); ?>index.php/FrontUser/EditProfile_c"><button type="button" class="btn btn-primary btn-block col-lg-2"><span class="fa fa-pencil-square-o"></span> Edit Profile</button><a/>
                            </div>
                            <?php 
                            }
                            ?>
                            <div class="col-lg-2 edit-profile-btn">
                                <button type="button" class="btn btn-primary btn-block col-lg-2" data-toggle="modal" data-target="#Event_modal"><span class="fa fa-plus-circle"></span> Create Event</button>
                            </div>
                            <div id="Event_modal" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Add Donation Event</h4>
                                        </div>
                                        <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 well well-sm">
                                                        <form action="<?php echo base_url('saveEvent'); ?>" method="post" class="form" role="form">
                                                            <label>Event Name</label>
                                                            <input class="form-control" name="eventName" placeholder="Event Name" type="text" />
                                                            </br>
                                                            <label>Event Description</label>
                                                            <textarea name="description" id="message" class="form-control" rows="9" cols="25" placeholder="Event Description" required></textarea>
                                                            </br>
                                                            <label>Location</label>
                                                            <div class="row">
                                                                <div class="col-xs-12 col-md-12">
                                                                    <input type="text" class="form-control" name="eventLocation" placeholder="Event Location">
                                                                </div>
                                                            </div>
                                                            </br>
                                                            <label>Children</label>
                                                            <div class="row">
                                                                <div class="col-xs-12 col-md-12">
                                                                    <textarea name="children" id="child_mention" class="form-control mention" rows="9" cols="25" placeholder="type child name with @<child Name>" style="color: none;" required></textarea>
                                                                </div>
                                                            </div>
                                                            </br>
                                                            <button class="btn btn-lg btn-primary btn-block" type="submit">
                                                                Add Event</button>
                                                        </form>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--/col-->
                            <div class="clearfix"></div>
                            <div class="col-xs-12 col-sm-4">
                                <h2><strong id="followercount">  </strong></h2>
                                <p><small>Followers</small></p>
                                <?php 
                                if($this->session->userdata('id')!=$user->id)
                                {
                                ?>
                                <button class="btn btn-success btn-block" style="display: none;" id="follow" onclick="follow()"><span class="fa fa-plus-circle"></span> Follow </button>
                                <button class="btn btn-success btn-block" style="display: none;" id="unfollow" onclick="unfollow()"><span class="fa fa-plus-circle"></span> Unfollow </button>
                                <?php
                                }
                                ?>
                            </div>
                            <!--/col-->
                            <div class="col-xs-12 col-sm-4">
                                <h2><strong id="donationcount"></strong></h2>
                                <p><small >Donations</small></p>
                                <button class="btn btn-info btn-block"><span class="fa fa-thumbs-o-up"></span> View Donations </button>
                            </div>
                            <!--/col-->
                            <div class="col-xs-12 col-sm-4">
                                <h2><strong id="donatedamount"></strong></h2>
                                <p><small>Total Donations</small></p>
                                <button type="button" class="btn btn-primary btn-block"><span class="fa fa-money"></span> Transactions </button>
                            </div>
                            <!--/col-->
                        </div>
                        <!--/row-->
                    </div>
                    <!--/panel-body-->
                </div>
                <!--/panel-->
            </div>
            <!--/col-->
        </div>
        <!--/row-->
    </div>
    <!--/container-->
    <!-- Timeline -->
    <div class="container">
        <div class="page-header">
            <h1 id="">Timeline</h1>
        </div>
        <div id="timeline">
            <div class="row timeline-movement timeline-movement-top">
                <div class="timeline-badge timeline-future-movement">
                    <a href="#">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                </div>
                <div class="timeline-badge timeline-filter-movement">
                    <a href="#">
                        <span class="fa fa-chevron-up"></span>
                    </a>
                </div>

            </div>
            <?php
                foreach ($timelinecontent as $row){
            ?>
            <div class="row timeline-movement">

                <div class="timeline-badge">
                    <span class="timeline-balloon-date-day"><?php echo $row[0]['day']; ?></span>
                    <span class="timeline-balloon-date-month"><?php echo $row[0]['month']; ?></span>
                </div>
            <?php
                    $i=0;
                    foreach($row as $column){
                        if($i%2==0){
            ?>
                <div class="col-sm-6  timeline-item">
                    <div class="row">
                        <div class="col-sm-offset-1 col-sm-11">
                            <div class="timeline-panel debits">
                                <ul class="timeline-panel-ul">
                                    <li><span class="importo"><?php echo $column['type']; ?></span></li>
                                    <li><span class="causale"><?php echo $column['content']; ?></span></li>
                                    <li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> <?php echo $column['date']; ?></small></p> </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            <?php
                        }else{
            ?>
                <div class="col-sm-6  timeline-item">
                    <div class="row">
                        <div class="col-sm-11">
                            <div class="timeline-panel credits">
                                <ul class="timeline-panel-ul">
                                    <li><span class="importo"><?php echo $column['type']; ?></span></li>
                                    <li><span class="causale"><?php echo $column['content']; ?></span></li>
                                    <li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> <?php echo $column['date']; ?></small></p> </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            <?php
                        }
                        $i++;
                    }
            ?>
            </div>
            <?php
                }
            ?>
            <!--due -->

            
        </div>
    </div>
    <!-- /Timeline -->
</div>


<!--
  following is for donation charts need to attach to profile  
-->
<!-- donation with starts here -->

<div class="panel col-lg-12" style="border: solid;">

<div class="row">
    <div class="row">
        <br>
        <form class="form-group col-sm-6 center-block" id="donateForm" name="donateForm" method="post">
            <input type="date" required class="form-control" placeholder="Date" id="donationdate"/>
            <input type="text" required class="form-control" placeholder="Amount" id="donationamount"/>
            <textarea class="form-control" placeholder="Description" id="donationdescription"/></textarea> 
            <input type="text" required class="form-control" placeholder="Receiver" id="donationreceiver"/>
            <script>
                $('[name=donationamount]').change(function (){
                    if(isNaN($('[name=donationamount]').val())){
                        alert('Only numerical values');
                    }
                });
                $('#donateForm').submit(function (e){
                    e.preventDefault();
                    return;
                });
                function donate(){
                    var date = document.getElementById('donationdate').value;
                    var amount = document.getElementById('donationamount').value;
                    var description = document.getElementById('donationdescription').value;
                    var receiver = document.getElementById('donationreceiver').value;
                    if((date==="")||(amount==="")||(description==="")||(receiver==="")){
                        alert('fill in the required fields');
                        return;
                    }
                    var obj = {
                            donationdate : date,
                            donationamount : amount,
                            donationdescription : description,
                            receiver : receiver
                        };
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + "index.php/Donation_c/donate",
                        dataType: 'json',
                        data: obj,
                        success: function (res) {
                            alert(res);
                            var year = new Date().getFullYear();
                            google.charts.setOnLoadCallback(loadData(year+"-01-01",year+"-12-31"));
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert(jqXHR.responseText);
                        }
                    });
                }
            </script>
            <input type="submit" onclick="donate()" class="btn btn-default" value="Donate"/>
            
        </form>
        <br>
        
    </div>
    <br>
    
    <div class="row">
        <div class="col-sm-6">
            <input type="date" id="strtdate" class="form-control">
        </div>
        <div class="col-sm-6">
            <input type="date" id="enddate" class="form-control">
        </div>
    </div>
    
    <div id="chart_div" style="width: 100%; height: 500px;"></div>
    <button id="change">Change X-axis</button>
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
    }
                
    function loadData(startdate,endDate){
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/Donation_c/getGraphData/"+startdate+"/"+endDate,
            dataType: 'json',
            success: function (res) {
                var x = document.getElementById('donationcount');
                if(x.innerHTML=="")
                    x.innerHTML = res.length;
                if(res.length==0){
                    document.getElementById('chart_div').innerHTML="No donations to show up";
                    return;
                }
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
                  width: 900,
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
    loadDonatedAmounts();
    function loadDonatedAmounts(){
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/Donation_c/getTotalDonatedAmount/"+<?php echo $user->id;  ?>,
            success: function (res) {
                document.getElementById('donatedamount').innerHTML = "Rs. "+res;
           
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText);
            }
        });
    }
</script>

<!-- donation ends here -->

<!-- children belonging to user starts here -->
    <!-- this data loads form controller home and views child profile with href using Children_c/viewChild function gets data using Children_m -->
    <div class="row center-block"> 
        <h>Children</h>
        <ul>
        <?php
            foreach ($children as $row){
        ?>
            <li><a href="<?php echo base_url()."index.php/Child/Children_c/viewChild/".$row->id; ?>"><?php echo $row->name; ?></a></li>
        <?php
            }
        ?>
        </ul>
    </div>
<!-- children belonging to user ends here -->

<!-- following scripts starts here -->
<script>
    isFollower();
    loadFollowers();
    function loadFollowers(){
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/Follow_c/getFollowers/"+<?php echo $user->id; ?>+"/1",
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
            url: "<?php echo base_url(); ?>" + "index.php/Follow_c/isFollower/"+<?php echo $user->id; ?>+"/1",
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
            url: "<?php echo base_url(); ?>" + "index.php/Follow_c/follow/"+<?php echo $user->id; ?>+"/1",
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
            url: "<?php echo base_url(); ?>" + "index.php/Follow_c/unfollow/"+<?php echo $user->id; ?>+"/1",
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

<!--@ sign methion tags-->

 <script>
    // var data;
     $(document).ready(function(){ 
         var data;

         $('textarea.mention').mentionsInput({


        onDataRequest:function (mode, query, callback) {
    
    // var data = [
    //   { id:1, name:'Kenneth Auchenberg', 'avatar':'http://cdn0.4dots.com/i/customavatars/avatar7112_1.gif', 'type':'contact' },
    //   { id:2, name:'Jon Froda', 'avatar':'http://cdn0.4dots.com/i/customavatars/avatar7112_1.gif', 'type':'contact' },
    //   { id:3, name:'Anders Pollas', 'avatar':'http://cdn0.4dots.com/i/customavatars/avatar7112_1.gif', 'type':'contact' },
    //   { id:4, name:'Kasper Hulthin', 'avatar':'http://cdn0.4dots.com/i/customavatars/avatar7112_1.gif', 'type':'contact' },
    //   { id:5, name:'Andreas Haugstrup', 'avatar':'http://cdn0.4dots.com/i/customavatars/avatar7112_1.gif', 'type':'contact' },
    //   { id:6, name:'Pete Lacey', 'avatar':'http://cdn0.4dots.com/i/customavatars/avatar7112_1.gif', 'type':'contact' }
    // ];
       

          $.ajax({
              type: "POST",
              url: "getAllChildren",
              success: function( datas, textStatus, jQxhr ){
              
                data=jQuery.parseJSON(datas);
                
                },
              error: function( jqXhr, textStatus, errorThrown ){
                alert("error");
                
                }
              });

    


   data = _.filter(data, function(item) { return item.name.toLowerCase().indexOf(query.toLowerCase()) > -1 });

    callback.call(this, data);
  }
});

         

});
    

  </script>


<!--end of @ sign mention tags-->
