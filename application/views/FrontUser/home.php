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

	<a href="<?php echo base_url()?>index.php/Home/profile"><button type="button" class="btn btn-primary btn-block">Profile</button><a/>


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



</div>



<!--
  following is for donation charts need to attach to profile  
-->
<!-- donation with starts here -->

<div class="panel col-lg-12" style="border: solid">

<div class="row">
    <div class="row">
        <br>
        <form class="form-group col-sm-6 center-block" id="donateForm" name="donateForm" method="post">
            <input type="date" required class="form-control" placeholder="Date" id="donationdate"/>
            <input type="text" required class="form-control" placeholder="Amount" id="donationamount"/>
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
                    var receiver = document.getElementById('donationreceiver').value;
                    if((date==="")||(amount==="")||(receiver==="")){
                        alert('fill in the required fields');
                        return;
                    }
                    var obj = {
                            donationdate : date,
                            donationamount : amount,
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
                if(res.length==0){
                    document.getElementById('chart_div').innerHTML="No donations to show up";
                    return;
                }
                var arr=[];
                var k = Object.keys(res);
                for(var i=0;i<k.length-1;i++){
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
</script>

<!-- donation ends here -->

<!-- children belonging to user starts here -->
    <!-- this data loads form controller home and views child profile with href using Children_c/viewChild function gets data using Children_m -->
    <div class="row"> 
        <ul class="list-inline">
        <?php
            foreach ($children as $row){
        ?>
            <li class="col-sm-3"><a href="<?php echo base_url()."index.php/Child/Children_c/viewChild/".$row->id; ?>"><?php echo $row->name; ?></a></li>
        <?php
            }
        ?>
        </ul>
    </div>
<!-- children belonging to user ends here -->





