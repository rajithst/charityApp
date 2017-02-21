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
<div class="col-sm-3 hidden-xs hidden-sm" style=" position:fixed">
  <div class="panel panel-default">
                                <div class="panel-thumbnail"><img src="<?php 
                                   if($this->session->userdata('google')){
                                          echo $this->session->userdata('picture');
                                    }else if($this->session->userdata('fb')){
                                           echo 'http://graph.facebook.com/' . $this->session->userdata('username') . '/picture?type=normal';
                                     }else{
                                            echo base_url().$this->session->userdata('picture');
                                      }
                                        ?>" class="profilepic img-responsive" width="80px"></div>
                                <div class="panel-body">
                                  <p class="lead"><?php echo $this->session->userdata('name');?></p>
                                  <p><l class="followercount"></l> Followers, <l class="postcount"></l> Posts</p>
                                  
                                  <p>
                                    <img src="https://lh3.googleusercontent.com/uFp_tsTJboUY7kue5XAsGA=s28" width="28px" height="28px">
                                  </p>
                                </div>
    </div>

    <div class="panel panel-default"  style="margin-top:10px">
      <div class="panel-body">
      <img src="<?php echo base_url('img/events/calendar.png')?>" width=20px>
     <a href="<?php echo base_url('events');?>"> events</a>
    </div>
    </div>


</div>


<!--end of left side bar-->


<!--center scrolling area-->


<div class="col-sm-12 col-xs-12 col-lg-6 col-lg-offset-3" style="height:2400px;">
                <div class="stitched text-center animated bounceIn col-sm-11 col-sm-push-0 col-xs-12 col-xs-push-5 col-lg-11 col-lg-push-0" id="post_txt" style="cursor:pointer;">
                   <div class=" hvr-pop">
                    Create New
                    </div>
                </div>

                <div class="col-sm-12 col-xs-12 post_content">
                    
                    

                </div>

                <div class="col-sm-12 col-xs-12 post_loadmore_content">

                </div>
</div>

<!--end of center scrolling area-->

   	<!--right side bar-->
   <div class="col-sm-3 hidden-xs hidden-sm" style="position:fixed;margin-left:72.66%">
   				   <div class="panel panel-default">
                                <div class="panel-thumbnail"><img src="http://www.bootply.com/assets/example/bg_4.jpg" class="img-responsive"></div>
                                <div class="panel-body">
                                  <p class="lead">Social Good</p>
                                  <p><l class="followercount"></l> Followers, <l class="postcount"></l> Posts</p>
                                  
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
    <!--post modal header-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Pick one child or more" id="st1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2" id="st2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>

                     <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3" id="st3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Step 4" id="st4">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-share"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
      </div>
      </div>
      <!--end of post modal header-->
      <div class="modal-body padding">

                <div class="tab-content" style="margin-left: 5px;">

                    <!--step 1 of post modal-->
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <h3>Pick one child or more</h3>
                      <div class="row padding">
                      <div class="form-group">
                      <span>
                        <div class="row" style="margin-left: 3px;">
                            <div class="col-sm-6">
                            <input type="text" id="child_search" class="form-control">
                            </div>
                            <div class="col-sm-4" style="margin-top: 5px;">
                            <button type="button" class="btn btn-success" id="child_search_btn">Search</button>
                            </div>
                            </div>
                        </span>
                      </div>
                      <div class="form-group">
                    <div id="children">
                        <!--load children in the post modal starts here-->
                        <script>
                            $(document).ready(function(){
                                $("#child_search_btn").click(function(){
                                    $("#children").html("");
                                    searchChildren($("#child_search").val());
                                });

                            });

                            function searchChildren(name){
                                var name=name;
                                if(!name){
                                    alert("enter a child name to search");
                                    return false;
                                }
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url(); ?>" +"index.php/FrontUser/Home/searchChildren",
                                    data:{name:name},
                                    success: function (data) {
                                        if(data.length>0){
                                        var data=data;
                                        var outs = "";
                                        for(var i=0;i<data.length;i++){
                            outs = outs + "<span class=\"col-xs-2\">" +
                                                    "<a href=\"#aboutModal\" data-toggle=\"modal\" data-target=\"#myModal\"><img src=\"<?php echo base_url(); ?>" + data[i].picture + "\" name=\"aboutme\" width=\"70\" height=\"70\" class=\"img-circle\"></a>" +
                                                    "<h4 class=\"text-center\" >" + data[i].name + "</h4>" +
                                                    "<div id=\"c_p\" style=\"text-align:center\"><input type=\"checkbox\" name=\"ch_prof\" value="+data[i].id+"></div>"+
                                                    "</span>"
                                        }
                                        $("#children").append(outs);
                                        }
                                    },

                                    error:function(jqXHR, textStatus, errorThrown){
                                        console.log("error");

                                    }

                                });

                            }

                        </script>
                        <script>
                            loadChildren();
                            function loadChildren(){
                                jQuery.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url(); ?>" + "index.php/FrontUser/Home/loadChildren/<?php echo $this->session->userdata('id'); ?>",
                                    dataType: 'json',
                                    success: function (res) {
                                        var out = "";
                                        for(var i=0;i<res.length;i++){
            				out = out + "<span class=\"col-xs-2\">" +
                                                    "<a href=\"#aboutModal\" data-toggle=\"modal\" data-target=\"#myModal\"><img src=\"<?php echo base_url(); ?>" + res[i].picture + "\" name=\"aboutme\" width=\"70\" height=\"70\" class=\"img-circle\"></a>" +
                                                    "<h4 class=\"text-center\" >" + res[i].name + "</h4>" +
                                                    "<div id=\"c_p\" style=\"text-align:center\"><input type=\"checkbox\" name=\"ch_prof\" value="+res[i].id+"></div>"+
                                                    "</span>"
                                        }
                                        document.getElementById('children').innerHTML = out;
                                    },
                                    error: function (jqXHR, textStatus, errorThrown) {
                                        alert(jqXHR.responseText);
                                    }

                                });
                            }
                        </script>
                        <!--load children in the post modal ends here-->
                    </div>
                    <span class="col-xs-2 padding">
                          <a><img src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/sign-add-icon.png" width="40px" id="child_modal" style="margin-top:20px;" /></a>
                    </span>
                       </div> 
                    </div>          
                        <ul class="list-inline pull-right">
                           <li><button type="button" class="btn btn-success next-step" onclick="next1() ">Save and continue</button></li>
                        </ul>
                    </div>

                    <!--step 2 of post modal-->
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <div class="col">
                            <div class="row">
                                <div class="col-md-6" style="margin-top: 12px;">
                                    <label for="exampleInputEmail1">What they Need</label>
                                    <input type="text" class="form-control" id="pt_need" placeholder="What they Need">
                                </div>
                                <div class="col-md-6" style="margin-top: 12px;">
                                    <label for="exampleInputEmail1">Why they asking your help</label>
                                    <input type="text" class="form-control" id="pt_why_help" placeholder="Why they asking your help">
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md-6" style="margin-top: 12px;">
                                <label for="exampleInputEmail1">Amount</label>
                                <input type="text" class="form-control" id="pt_amount" placeholder="Amount">
                            </div>
                            <div class="col-md-6" style="margin-top: 12px;">
                                <label for="exampleInputEmail1">Confirm Ammount</label>
                                <input type="text" class="form-control" id="pt_confirm_amount" placeholder="Amount">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="margin-top: 12px;">
                                <label for="exampleInputEmail1">How can you help</label>
                                <input type="text" class="form-control" id="pt_how_help" placeholder="How can we help you">
                            </div>
                            <div class="col-md-6" style="margin-top: 12px;">
                            <label for="exampleInputEmail1">Tags</label>
                                <div class="row">
                                    <div class="col-md-9 col-xs-9">
                                        <input type="text" class="form-control" id="pt_tags" placeholder="Tags Like Books, Computer Etc">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="row" style="margin-top: 13px; margin-left: 8px;"><label class="checkbox-inline">
                            <input type="checkbox" checked data-toggle="toggle" name="diplayContent" > Display this
                                </label>
                        </div>
                      
                   
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-success prev-step" onclick="prev1()">Previous</button></li>
                            <li><button type="button" class="btn btn-success next-step" onclick="postSave()">Save and continue</button></li>
                        </ul>
                    </div>


                     <!--step 3 of post modal-->
                    <div class="tab-pane" role="tabpane3" id="step3">
                        <h3>Upload Image</h3>
                        <div class="row">
                                <div id="image_preview"><img id="previewing" src="noimage.png" /></div>
                                <label>Select Your Image</label><br/>
                                <form id="uploadimage" name="uploadimage" method="post">
                                    
                                    <div class="slim"
                                        data-service="<?php echo base_url(); ?>index.php/FileUpload_c/slimasync/<?php echo $this->session->userdata('id'); ?>/img1br1posts1br1/posts"
                                        data-ratio="16:9"
                                        data-size="640,418" style="width: 320px;height: 209px;">
                                       <input type="file" name="slim[]"/>
                                    </div>
                                    <!--
                                    <input type="file" name="file" id="file" required />
                                    <input type="button" id="postimgupload" value="Upload" class="submit" />
                                    -->
                                </form>
                        </div>
                        <div class="row">
                                    <h4 id='loading' >loading..</h4>
                                    <div id="message"></div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-success prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-success next-step">Skip</button></li>
                            <li><button type="button" class="btn btn-success btn-info-full next-step" onclick="next3()">Save and continue</button></li>
                        </ul>
                    </div>

                    <!--step 4 of post modal-->
                    <div class="tab-pane" role="tabpane4" id="step4">
                        <h3>Share </h3>
                        <div class="row">
                            <div class="col-sm-6">
                            <a class="btn btn-social-icon btn-facebook" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-facebook']);"><span class="fa fa-facebook"> Share on Facebook</span></a>
                            </div>
                            <div class="col-sm-6">
                            <a class="btn btn-social-icon btn-google" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-google']);"><span class="fa fa-google"> Share on Google+</span></a>

                            </div>
                            <div class="col-sm-6">
                            <!--face book share button-->
                             <iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Fcharityapp.azurewebsites.net%2FHome%23step2&layout=button&size=small&mobile_iframe=true&appId=307324332804525&width=58&height=20" width="58" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-success prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-success next-step">Skip</button></li>
                            <li><button type="button" class="btn btn-success btn-info-full next-step" onclick="next3()">Save and continue</button></li>
                        </ul>
                    </div>

                    <!--final step of post modal-->
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <h3>Complete</h3>
                        <p>You have successfully completed all steps.</p>
                    </div>

                    <div class="clearfix"></div>
                </div>
          
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!--end of post modal-->
<!--//////////////////////////////////////////////////////////////////////-->


<!--add new child modal-->
<div id="child_reg" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Register child</h4>
      </div>
      <div class="modal-body">
            
            <!-- register form column -->
                <form class="form-horizontal" role="form" method="POST" id="childRegisterForm" name="childRegisterForm" action="">
                    <div class="row">
                        <div class="form-group col-sm-6 col-lg-6 col-md-6">
                            <label class="col-lg-5 control-label">First name:</label>
                            <div class="col-lg-12">
                                <input class="form-control validate[required]" required name="fname" type="text">
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-lg-6 col-md-6">
                            <label class="col-lg-5 control-label">Last name:</label>
                            <div class="col-lg-12">
                                <input class="form-control validate[required]" name="lname" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6 col-lg-6 col-md-6">
                        <label class="col-lg-5 control-label">Birth Date:</label>
                        <div class="col-lg-12">
                            <input class="form-control validate[required]" name="bdate" type="date">
                        </div>
                    </div>
                    <div class="form-group col-sm-6 col-lg-6 col-md-6">
                        <label class="col-lg-5 control-label">Email:</label>
                        <div class="col-lg-12">
                            <input class="form-control validate[required,custom[email]]" required name="email" type="text">
                        </div>
                    </div>
                    </div>
                   <div class="row">
                        <div class="form-group col-sm-6 col-lg-6 col-md-6">
                        <label class="col-lg-5 control-label">Mobile No:</label>
                        <div class="col-lg-12">
                            <input class="form-control" maxlength="10" name="mobile" type="number" value="">
                        </div>
                    </div>
                     <div class="form-group col-sm-6 col-lg-6 col-md-6">
                        <label class="col-lg-5 control-label">Address:</label>
                        <div class="col-lg-12">
                            <textarea class="form-control validate[required]" name="address" rows="5" id="address"></textarea>
                        </div>
                    </div>
                    </div>
                   <div class="row">
                        <div class="form-group col-sm-6 col-lg-6 col-md-6">
                        <label class="col-lg-6 control-label">Postal Code:</label>
                        <div class="col-lg-12">
                            <input class="form-control validate[required]" name="pcode" type="number">
                        </div>
                    </div>
                    <div class="form-group col-sm-6 col-lg-6 col-md-6">
                        <label class="col-lg-5 control-label">Country</label>
                        <div class="col-lg-12 ui-select">
                            <select id="user_country" name="country" class="form-control validate[required]">
                                <option value="AF">Afghanistan</option>
                                <option value="AX">Åland Islands</option>
                                <option value="AL">Albania</option>
                                <option value="DZ">Algeria</option>
                                <option value="AS">American Samoa</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                                <option value="AQ">Antarctica</option>
                                <option value="AG">Antigua and Barbuda</option>
                                <option value="AR">Argentina</option>
                                <option value="AM">Armenia</option>
                                <option value="AW">Aruba</option>
                                <option value="AU">Australia</option>
                                <option value="AT">Austria</option>
                                <option value="AZ">Azerbaijan</option>
                                <option value="BS">Bahamas</option>
                                <option value="BH">Bahrain</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BB">Barbados</option>
                                <option value="BY">Belarus</option>
                                <option value="BE">Belgium</option>
                                <option value="BZ">Belize</option>
                                <option value="BJ">Benin</option>
                                <option value="BM">Bermuda</option>
                                <option value="BT">Bhutan</option>
                                <option value="BO">Bolivia, Plurinational State of</option>
                                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                <option value="BA">Bosnia and Herzegovina</option>
                                <option value="BW">Botswana</option>
                                <option value="BV">Bouvet Island</option>
                                <option value="BR">Brazil</option>
                                <option value="IO">British Indian Ocean Territory</option>
                                <option value="BN">Brunei Darussalam</option>
                                <option value="BG">Bulgaria</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BI">Burundi</option>
                                <option value="KH">Cambodia</option>
                                <option value="CM">Cameroon</option>
                                <option value="CA">Canada</option>
                                <option value="CV">Cape Verde</option>
                                <option value="KY">Cayman Islands</option>
                                <option value="CF">Central African Republic</option>
                                <option value="TD">Chad</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CX">Christmas Island</option>
                                <option value="CC">Cocos (Keeling) Islands</option>
                                <option value="CO">Colombia</option>
                                <option value="KM">Comoros</option>
                                <option value="CG">Congo</option>
                                <option value="CD">Congo, the Democratic Republic of the</option>
                                <option value="CK">Cook Islands</option>
                                <option value="CR">Costa Rica</option>
                                <option value="CI">Côte d'Ivoire</option>
                                <option value="HR">Croatia</option>
                                <option value="CU">Cuba</option>
                                <option value="CW">Curaçao</option>
                                <option value="CY">Cyprus</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="DK">Denmark</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DM">Dominica</option>
                                <option value="DO">Dominican Republic</option>
                                <option value="EC">Ecuador</option>
                                <option value="EG">Egypt</option>
                                <option value="SV">El Salvador</option>
                                <option value="GQ">Equatorial Guinea</option>
                                <option value="ER">Eritrea</option>
                                <option value="EE">Estonia</option>
                                <option value="ET">Ethiopia</option>
                                <option value="FK">Falkland Islands (Malvinas)</option>
                                <option value="FO">Faroe Islands</option>
                                <option value="FJ">Fiji</option>
                                <option value="FI">Finland</option>
                                <option value="FR">France</option>
                                <option value="GF">French Guiana</option>
                                <option value="PF">French Polynesia</option>
                                <option value="TF">French Southern Territories</option>
                                <option value="GA">Gabon</option>
                                <option value="GM">Gambia</option>
                                <option value="GE">Georgia</option>
                                <option value="DE">Germany</option>
                                <option value="GH">Ghana</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GR">Greece</option>
                                <option value="GL">Greenland</option>
                                <option value="GD">Grenada</option>
                                <option value="GP">Guadeloupe</option>
                                <option value="GU">Guam</option>
                                <option value="GT">Guatemala</option>
                                <option value="GG">Guernsey</option>
                                <option value="GN">Guinea</option>
                                <option value="GW">Guinea-Bissau</option>
                                <option value="GY">Guyana</option>
                                <option value="HT">Haiti</option>
                                <option value="HM">Heard Island and McDonald Islands</option>
                                <option value="VA">Holy See (Vatican City State)</option>
                                <option value="HN">Honduras</option>
                                <option value="HK">Hong Kong</option>
                                <option value="HU">Hungary</option>
                                <option value="IS">Iceland</option>
                                <option value="IN">India</option>
                                <option value="ID">Indonesia</option>
                                <option value="IR">Iran, Islamic Republic of</option>
                                <option value="IQ">Iraq</option>
                                <option value="IE">Ireland</option>
                                <option value="IM">Isle of Man</option>
                                <option value="IL">Israel</option>
                                <option value="IT">Italy</option>
                                <option value="JM">Jamaica</option>
                                <option value="JP">Japan</option>
                                <option value="JE">Jersey</option>
                                <option value="JO">Jordan</option>
                                <option value="KZ">Kazakhstan</option>
                                <option value="KE">Kenya</option>
                                <option value="KI">Kiribati</option>
                                <option value="KP">Korea, Democratic People's Republic of</option>
                                <option value="KR">Korea, Republic of</option>
                                <option value="KW">Kuwait</option>
                                <option value="KG">Kyrgyzstan</option>
                                <option value="LA">Lao People's Democratic Republic</option>
                                <option value="LV">Latvia</option>
                                <option value="LB">Lebanon</option>
                                <option value="LS">Lesotho</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libya</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LT">Lithuania</option>
                                <option value="LU">Luxembourg</option>
                                <option value="MO">Macao</option>
                                <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                <option value="MG">Madagascar</option>
                                <option value="MW">Malawi</option>
                                <option value="MY">Malaysia</option>
                                <option value="MV">Maldives</option>
                                <option value="ML">Mali</option>
                                <option value="MT">Malta</option>
                                <option value="MH">Marshall Islands</option>
                                <option value="MQ">Martinique</option>
                                <option value="MR">Mauritania</option>
                                <option value="MU">Mauritius</option>
                                <option value="YT">Mayotte</option>
                                <option value="MX">Mexico</option>
                                <option value="FM">Micronesia, Federated States of</option>
                                <option value="MD">Moldova, Republic of</option>
                                <option value="MC">Monaco</option>
                                <option value="MN">Mongolia</option>
                                <option value="ME">Montenegro</option>
                                <option value="MS">Montserrat</option>
                                <option value="MA">Morocco</option>
                                <option value="MZ">Mozambique</option>
                                <option value="MM">Myanmar</option>
                                <option value="NA">Namibia</option>
                                <option value="NR">Nauru</option>
                                <option value="NP">Nepal</option>
                                <option value="NL">Netherlands</option>
                                <option value="NC">New Caledonia</option>
                                <option value="NZ">New Zealand</option>
                                <option value="NI">Nicaragua</option>
                                <option value="NE">Niger</option>
                                <option value="NG">Nigeria</option>
                                <option value="NU">Niue</option>
                                <option value="NF">Norfolk Island</option>
                                <option value="MP">Northern Mariana Islands</option>
                                <option value="NO">Norway</option>
                                <option value="OM">Oman</option>
                                <option value="PK">Pakistan</option>
                                <option value="PW">Palau</option>
                                <option value="PS">Palestinian Territory, Occupied</option>
                                <option value="PA">Panama</option>
                                <option value="PG">Papua New Guinea</option>
                                <option value="PY">Paraguay</option>
                                <option value="PE">Peru</option>
                                <option value="PH">Philippines</option>
                                <option value="PN">Pitcairn</option>
                                <option value="PL">Poland</option>
                                <option value="PT">Portugal</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="QA">Qatar</option>
                                <option value="RE">Réunion</option>
                                <option value="RO">Romania</option>
                                <option value="RU">Russian Federation</option>
                                <option value="RW">Rwanda</option>
                                <option value="BL">Saint Barthélemy</option>
                                <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                <option value="KN">Saint Kitts and Nevis</option>
                                <option value="LC">Saint Lucia</option>
                                <option value="MF">Saint Martin (French part)</option>
                                <option value="PM">Saint Pierre and Miquelon</option>
                                <option value="VC">Saint Vincent and the Grenadines</option>
                                <option value="WS">Samoa</option>
                                <option value="SM">San Marino</option>
                                <option value="ST">Sao Tome and Principe</option>
                                <option value="SA">Saudi Arabia</option>
                                <option value="SN">Senegal</option>
                                <option value="RS">Serbia</option>
                                <option value="SC">Seychelles</option>
                                <option value="SL">Sierra Leone</option>
                                <option value="SG">Singapore</option>
                                <option value="SX">Sint Maarten (Dutch part)</option>
                                <option value="SK">Slovakia</option>
                                <option value="SI">Slovenia</option>
                                <option value="SB">Solomon Islands</option>
                                <option value="SO">Somalia</option>
                                <option value="ZA">South Africa</option>
                                <option value="GS">South Georgia and the South Sandwich Islands</option>
                                <option value="SS">South Sudan</option>
                                <option value="ES">Spain</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="SD">Sudan</option>
                                <option value="SR">Suriname</option>
                                <option value="SJ">Svalbard and Jan Mayen</option>
                                <option value="SZ">Swaziland</option>
                                <option value="SE">Sweden</option>
                                <option value="CH">Switzerland</option>
                                <option value="SY">Syrian Arab Republic</option>
                                <option value="TW">Taiwan, Province of China</option>
                                <option value="TJ">Tajikistan</option>
                                <option value="TZ">Tanzania, United Republic of</option>
                                <option value="TH">Thailand</option>
                                <option value="TL">Timor-Leste</option>
                                <option value="TG">Togo</option>
                                <option value="TK">Tokelau</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad and Tobago</option>
                                <option value="TN">Tunisia</option>
                                <option value="TR">Turkey</option>
                                <option value="TM">Turkmenistan</option>
                                <option value="TC">Turks and Caicos Islands</option>
                                <option value="TV">Tuvalu</option>
                                <option value="UG">Uganda</option>
                                <option value="UA">Ukraine</option>
                                <option value="AE">United Arab Emirates</option>
                                <option value="GB">United Kingdom</option>
                                <option value="US">United States</option>
                                <option value="UM">United States Minor Outlying Islands</option>
                                <option value="UY">Uruguay</option>
                                <option value="UZ">Uzbekistan</option>
                                <option value="VU">Vanuatu</option>
                                <option value="VE">Venezuela, Bolivarian Republic of</option>
                                <option value="VN">Viet Nam</option>
                                <option value="VG">Virgin Islands, British</option>
                                <option value="VI">Virgin Islands, U.S.</option>
                                <option value="WF">Wallis and Futuna</option>
                                <option value="EH">Western Sahara</option>
                                <option value="YE">Yemen</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabwe</option>
                            </select>
                                
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6 col-lg-6 col-md-6">
                        <label class="col-lg-5 control-label">Account Number:</label>
                        <div class="col-lg-12">
                            <input class="form-control validate[required]" name="accnumber" type="text">
                        </div>
                    </div>
                    
                    <div class="form-group col-sm-6 col-lg-6 col-md-6">
                        <label class="col-lg-5 control-label">About:</label>
                        <div class="col-lg-12">
                            <textarea class="form-control" name="about" rows="5" id="about_me"></textarea>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <input type="submit" onclick="registerChild()" class="btn btn-primary" value="Save Changes">
                            <span></span>
                            <input type="button" data-dismiss="modal" id="cancel" class="btn btn-primary" value="Cancel">
                        </div>
                    </div>
                </form>
        </div>
        
    </div>
  </div>
</div>


<!--end of add new child-->
<!--register new child script starts here-->
<script>
    //validation starts here
    $('#childRegisterForm').submit(function(e){
        e.preventDefault();
    });
    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    function registerChild() {
                var fname = lname = bdate = email = mobilenumber = address = postalcode = country = about = accnumber = "";
                
                fname = document.forms["childRegisterForm"]["fname"].value;
                if (fname == "")
                    return;
                lname = document.forms["childRegisterForm"]["lname"].value;
                bdate = document.forms["childRegisterForm"]["bdate"].value;
                email = document.forms["childRegisterForm"]["email"].value;
                if (email == "")
                    return;
                mobilenumber = document.forms["childRegisterForm"]["mobile"].value;
                address = document.forms["childRegisterForm"]["address"].value;
                postalcode = document.forms["childRegisterForm"]["pcode"].value;
                country = document.forms["childRegisterForm"]["country"].value;
                about = document.forms["childRegisterForm"]["about"].value;
                accnumber = document.forms["childRegisterForm"]["accnumber"].value;
                if (!validateEmail(email)){
                    alert("Email is incorrect");
                    return;
                }
                var obj = {fname: fname, lname: lname, bdate: bdate, email: email, mobilenumber: mobilenumber, address: address, postalcode: postalcode, country: country, about: about, accnumber: accnumber};
                registerchild(obj);

            }
    //validation ends here
    //form submissions
    function registerchild(obj) {

                var ret = confirm("Do you want to regsiter child");
                if (ret == true) {
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + "index.php/Register/registerChild",
                        dataType: 'json',
                        data: obj,
                        success: function (res) {
                            alert('child added');
                            loadChildren();
                            $('#child_reg').modal('hide');
                            $('#postModal').modal('show');
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert(jqXHR.responseText);
                        }

                    });
                }

            }
    $('#cancel').on('click',function (){
        $('#postModal').modal('show');
    });
</script>
<!--register new child script ends here-->
<!--//////////////////////////////////////////////////////////////////////-->



</div>




<script >
<!--/////////////////////////script of posts////////////////////////////////-->
var limit = 12;
$(document).ready(function(){

   
  
	$("#post_txt").click(function(){
		$('#postModal').modal('show');

	});


  $("#child_modal").click(function(){
    $('#postModal').modal('toggle');
    $("#child_reg").modal('show');


  });

  postLoad();
  setInterval(postLoad, 10000);


});




//add post to db



function postSave(){

  var need=$("#pt_need").val();
  var whyHelp=$("#pt_why_help").val();
  var amount=$("#pt_amount").val();
  var confirmAmount=$("#pt_confirm_amount").val();
  var howHelp=$("#pt_how_help").val();
  var tags=$("#pt_tags").val();
  if(!need || !whyHelp || !amount || !confirmAmount || !howHelp || !tags){
    alert("fill all fields");
    return false;
    
  }

  if(amount!=confirmAmount){
    alert("amount mismatch");
    return false;
  }
 
  var p = [];
            $.each($("input[name='ch_prof']:checked"), function(){            
                p.push($(this).val());
            });
    var pr=p.join();
  



  $.ajax({
    type: "POST",
    url: "savePost",
    data: {need:need,whyHelp:whyHelp,amount:amount,howHelp:howHelp,tags:tags,profiles:pr},
    success: function( data, textStatus, jQxhr ){
      //console.log("success");
      alert("added to database");
      $("#st3").click();

      myFacebookLogin();
   

      
      },
    error: function( jQXhr, textStatus, errorThrown ){
        alert(jQXhr.responseText);
      }
    });

}

function postLoad(){

  $.ajax({
    type: "POST",
    url: "loadPost",
    success: function( data, textStatus, jQxhr ){
      if(data.length>0){
      $('.post_content').empty();

      for(var i=0;i<data.length;i++){
      var amountprogress = (parseFloat(data[i].received_amount)/parseFloat(data[i].amount))*100;
      var pic="";
      if(data[i].type=='google'){
        pic=data[i].picture;
      }
      else if(data[i].type=='facebook'){
        pic="http://graph.facebook.com/"+ data[i].username+ "/picture?type=normal";
      }
      else{
        pic="<?php echo base_url(); ?>"+data[i].picture;

      }
        $(".lastid_value").remove();
        var out = '';
        
        var children = data[i].children;
        var childrenstr = '';
        for(var j=0;j<children.length;j++){
            childrenstr += '<a href="<?php echo base_url(); ?>index.php/Child/Children_c/viewChild/'+children[j].id+'">'+children[j].name+' '+children[j].lastname+'</a>'
        }
        
        if(data[i].sharedpost!='sharedpost'){
            
            out = '<div class="panel panel-default" style="width:630px; margin-bottom:14px;">\
                        <div class="panel-heading">\
                            <div class="row">\
                                <div class="col-sm-6 pull-right" style="background-color: #f5f5f5;margin-top:10px;padding:2px; border-color: #ddd;">\
                                    <div class="col-sm-6">$'+data[i].amount+' needed<br/>$'+data[i].received_amount+' received</div>\
                                    <div class="col-sm-6">\
                                    56 days left<br/> 5 donations\
                                    </div>\
                                </div>\
                                <div class="col-sm-6 pull-left">\
                                    <img src="'+pic+'" width="35px" height="35px"/>\
                                    <span><a href="<?php echo base_url(); ?>FrontUser/Home/profile/'+data[i].ids+'">'+data[i].username+'</a></span>\
                                </div>\
                            </div>\
                            <div>Children : '+childrenstr+'</div>\
                        </div>\
                        <div class="panel-body">\
                            <div class="row" style="width: 630px; min-width:auto; position: absolute;">\
                               <div class="col-sm-3 col-xs-3 overimage resize animated fadeIn "><h4 class="text-center" style="font-size: 1em;">What</h4>\
                               <h6 class="text-center" >'+data[i].needs+'</h6></div>\
                               <div class="col-sm-3 col-xs-3 overimage resize  animated fadeIn "><h4 class="text-center" style="font-size: 1em;">why</h4>\
                               <h6 class="text-center" >'+data[i].why_help+'</h6></div>\
                               <div class="col-sm-4 col-xs-4 overimage resize animated fadeIn "><h4 class="text-center" style="font-size: 1em;">How</h4>\
                               <h6 class="text-center" >'+data[i].how_help+'</h6></div>\
                            </div>\
                            <img src="<?php echo base_url(); ?>'+data[i].imagepaths+'" alt="" class="img-responsive center-block" />\
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
                                        <input id="" type="text" value="'+data[i].amount+'" class="form-control" name="" placeholder="Amount">\
                                    </div>\
                                </div>\
                            </div>\
                            <div class="row">\
                                <div class="col-sm-6 pull-left">\
                                    <a href="<?php echo base_url('/donations'); ?>/'+data[i].id+'"><button type="button" class="btn btn-success btn-block">Donate</button>\
                                    </a>\
                                </div>\
                                <div class="col-sm-6 pull-right"><button data-toggle="modal" data-target="#confirm-share" type="button" class="btn btn-primary btn-xs" onclick="confirmShare('+data[i].id+');"><span class="glyphicon glyphicon-share-alt"></span>Share</button></div>\
                            </div>\
                        </div>\
                    </div>';
              
        }else{
            var spic="";
            if(data[i].stype=='google'){
              spic=data[i].spicture;
            }
            else if(data[i].stype=='facebook'){
              spic="http://graph.facebook.com/"+ data[i].susername+ "/picture?type=normal";
            }
            else{
              spic="<?php echo base_url(); ?>"+data[i].spicture;

            }
            
            out = '<div class="panel panel-default" style="width:630px; margin-bottom:14px;">\
                        <div class="panel-heading">\
                            <div class="row">\
                                <div class="col-sm-6 pull-right" style="background-color: #f5f5f5;margin-top:10px;padding:2px; border-color: #ddd;">\
                                </div>\
                                <div class="col-sm-6 pull-left">\
                                    <img src="'+spic+'" width="35px" height="35px"/>\
                                    <span><a href="<?php echo base_url(); ?>FrontUser/Home/profile/'+data[i].sids+'">'+data[i].susername+'</a></span>\
                                </div>\
                            </div>\
                        </div>\
                        <div class="panel-body">\
                            <div class="panel panel-default" style="width:600px; margin-bottom:14px;">\
                                <div class="panel-heading">\
                                    <div class="row">\
                                        <div class="col-sm-6 pull-right" style="background-color: #f5f5f5;margin-top:10px;padding:2px; border-color: #ddd;">\
                                            <div class="col-sm-6">$'+data[i].amount+' needed<br/>$'+data[i].received_amount+' received</div>\
                                            <div class="col-sm-6">56 days left<br/> 5 donations</div>\
                                        </div>\
                                        <div class="col-sm-6 pull-left">\
                                            <img src="'+pic+'" width="35px" height="35px"/>\
                                            <span><a href="<?php echo base_url(); ?>FrontUser/Home/profile/'+data[i].ids+'">'+data[i].username+'</a></span>\
                                        </div>\
                                    </div>\
                                    <div>Children : '+childrenstr+'</div>\
                                </div>\
                                <div class="panel-body">\
                                    <div class="row" style="width: 600px; min-width:auto; position: absolute;">\
                                       <div class="col-sm-3 col-xs-3 overimage resize animated fadeIn "><h4 class="text-center" style="font-size: 1em;">What</h4>\
                                       <h6 class="text-center" >'+data[i].needs+'</h6></div>\
                                       <div class="col-sm-3 col-xs-3 overimage resize  animated fadeIn "><h4 class="text-center" style="font-size: 1em;">why</h4>\
                                       <h6 class="text-center" >'+data[i].why_help+'</h6></div>\
                                       <div class="col-sm-4 col-xs-4 overimage resize animated fadeIn "><h4 class="text-center" style="font-size: 1em;">How</h4>\
                                       <h6 class="text-center" >'+data[i].how_help+'</h6></div>\
                                    </div>\
                                    <img src="<?php echo base_url(); ?>'+data[i].imagepaths+'" alt="" class="img-responsive center-block" />\
                                </div>\
                                <div class="panel-footer">\
                                    <div class="row">\
                                        <div class="col-sm-12">\
                                            <div class="progress">\
                                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="'+amountprogress+'" aria-valuemin="0" aria-valuemax="100" style="width:'+amountprogress+'%">'+amountprogress+'% Complete (success)</div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                    <div class="row">\
                                        <div class="col-sm-12" style="margin-bottom: 5px">\
                                            <div class="input-group">\
                                                <span class="input-group-addon">$</span>\
                                                <input id="" type="text" value="'+data[i].amount+'" class="form-control" name="" placeholder="Amount">\
                                            </div>\
                                        </div>\
                                    </div>\
                                    <div class="row">\
                                        <div class="col-sm-6 pull-left">\
                                            <a href="<?php echo base_url('/donations'); ?>/'+data[i].id+'"><button type="button" class="btn btn-success btn-block">Donate</button>\
                                            </a>\
                                        </div>\
                                        <div class="col-sm-6 pull-right"><button data-toggle="modal" data-target="#confirm-share" type="button" class="btn btn-primary btn-xs" onclick="confirmShare('+data[i].id+');"><span class="glyphicon glyphicon-share-alt"></span>Share</button></div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    </div>';
        }
      $('.post_content').append(out);
      
        }

        if($('.post_loadmore_content').text()==0){

        $('.post_content').append('<button type="button" id="load_more" onclick="loadMore()"" class="btn btn-default">Load More</button>');
        }
        }                          
      
      },
    error: function( jqXhr, textStatus, errorThrown ){

       // alert("errortest");

        alert(jqXHR.responseText);;

      }
    });

}


function loadMore(){
    if($('.post_loadmore_content').text()==0){
        var lastid=$(".lastid_value").val();
    }

    else{
        var lastid=$(".lastid_val").val();

    }

  lastid=parseInt(lastid)-1;
  //alert(lastid);
  $("#load_more").text("Loading please wait..");


//  if(lastid>0){
   $.ajax({
    type: "POST",
    url: "loadMorePost/"+limit,
    data:{lastid:lastid},
    success: function( data, textStatus, jQxhr ){
      $("#load_more").remove();
      limit += 6;
      $('.post_loadmore_content').html('');
      
      for(var i=6;i<data.length;i++){
      var amountprogress = (parseFloat(data[i].received_amount)/parseFloat(data[i].amount))*100;
      var pic="";
      if(data[i].type=='google'){
        pic=data[i].picture;
      }
      else if(data[i].type=='facebook'){
        pic="http://graph.facebook.com/"+ data[i].username+ "/picture?type=normal";
      }
      else{
        pic="<?php echo base_url(); ?>"+data[i].picture;

      }
        $(".lastid_val").remove();
        var out = '';
        
        var children = data[i].children;
        var childrenstr = '';
        for(var j=0;j<children.length;j++){
            childrenstr += '<a href="<?php echo base_url(); ?>index.php/Child/Children_c/viewChild/'+children[j].id+'">'+children[j].name+' '+children[j].lastname+'</a>'
        }
        
        if(data[i].sharedpost!='sharedpost'){
            
            out = '<div class="panel panel-default" style="width:630px; margin-bottom:14px;">\
                        <div class="panel-heading">\
                            <div class="row">\
                                <div class="col-sm-6 pull-right" style="background-color: #f5f5f5;margin-top:10px;padding:2px; border-color: #ddd;">\
                                    <div class="col-sm-6">$'+data[i].amount+' needed<br/>$'+data[i].received_amount+' received</div>\
                                    <div class="col-sm-6">\
                                    56 days left<br/> 5 donations\
                                    </div>\
                                </div>\
                                <div class="col-sm-6 pull-left">\
                                    <img src="'+pic+'" width="35px" height="35px"/>\
                                    <span><a href="<?php echo base_url(); ?>FrontUser/Home/profile/'+data[i].ids+'">'+data[i].username+'</a></span>\
                                </div>\
                            </div>\
                            <div>Children : '+childrenstr+'</div>\
                        </div>\
                        <div class="panel-body">\
                            <div class="row" style="width: 630px; min-width:auto; position: absolute;">\
                               <div class="col-sm-3 col-xs-3 overimage resize animated fadeIn "><h4 class="text-center" style="font-size: 1em;">What</h4>\
                               <h6 class="text-center" >'+data[i].needs+'</h6></div>\
                               <div class="col-sm-3 col-xs-3 overimage resize  animated fadeIn "><h4 class="text-center" style="font-size: 1em;">why</h4>\
                               <h6 class="text-center" >'+data[i].why_help+'</h6></div>\
                               <div class="col-sm-4 col-xs-4 overimage resize animated fadeIn "><h4 class="text-center" style="font-size: 1em;">How</h4>\
                               <h6 class="text-center" >'+data[i].how_help+'</h6></div>\
                            </div>\
                            <img src="<?php echo base_url(); ?>'+data[i].imagepaths+'" alt="" class="img-responsive center-block" />\
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
                                        <input id="" type="text" value="'+data[i].amount+'" class="form-control" name="" placeholder="Amount">\
                                    </div>\
                                </div>\
                            </div>\
                            <div class="row">\
                                <div class="col-sm-6 pull-left">\
                                    <a href="<?php echo base_url('/donations'); ?>/'+data[i].id+'"><button type="button" class="btn btn-success btn-block">Donate</button>\
                                    </a>\
                                </div>\
                                <div class="col-sm-6 pull-right"><button data-toggle="modal" data-target="#confirm-share" type="button" class="btn btn-primary btn-xs" onclick="confirmShare('+data[i].id+');"><span class="glyphicon glyphicon-share-alt"></span>Share</button></div>\
                            </div>\
                        </div>\
                    </div>';
              
        }else{
            var spic="";
            if(data[i].stype=='google'){
              spic=data[i].spicture;
            }
            else if(data[i].stype=='facebook'){
              spic="http://graph.facebook.com/"+ data[i].susername+ "/picture?type=normal";
            }
            else{
              spic="<?php echo base_url(); ?>"+data[i].spicture;

            }
            
            out = '<div class="panel panel-default" style="width:630px; margin-bottom:14px;">\
                        <div class="panel-heading">\
                            <div class="row">\
                                <div class="col-sm-6 pull-right" style="background-color: #f5f5f5;margin-top:10px;padding:2px; border-color: #ddd;">\
                                </div>\
                                <div class="col-sm-6 pull-left">\
                                    <img src="'+spic+'" width="35px" height="35px"/>\
                                    <span><a href="<?php echo base_url(); ?>FrontUser/Home/profile/'+data[i].sids+'">'+data[i].susername+'</a></span>\
                                </div>\
                            </div>\
                        </div>\
                        <div class="panel-body">\
                            <div class="panel panel-default" style="width:600px; margin-bottom:14px;">\
                                <div class="panel-heading">\
                                    <div class="row">\
                                        <div class="col-sm-6 pull-right" style="background-color: #f5f5f5;margin-top:10px;padding:2px; border-color: #ddd;">\
                                            <div class="col-sm-6">$'+data[i].amount+' needed<br/>$'+data[i].received_amount+' received</div>\
                                            <div class="col-sm-6">56 days left<br/> 5 donations</div>\
                                        </div>\
                                        <div class="col-sm-6 pull-left">\
                                            <img src="'+pic+'" width="35px" height="35px"/>\
                                            <span><a href="<?php echo base_url(); ?>FrontUser/Home/profile/'+data[i].ids+'">'+data[i].username+'</a></span>\
                                        </div>\
                                    </div>\
                                    <div>Children : '+childrenstr+'</div>\
                                </div>\
                                <div class="panel-body">\
                                    <div class="row" style="width: 600px; min-width:auto; position: absolute;">\
                                       <div class="col-sm-3 col-xs-3 overimage resize animated fadeIn "><h4 class="text-center" style="font-size: 1em;">What</h4>\
                                       <h6 class="text-center" >'+data[i].needs+'</h6></div>\
                                       <div class="col-sm-3 col-xs-3 overimage resize  animated fadeIn "><h4 class="text-center" style="font-size: 1em;">why</h4>\
                                       <h6 class="text-center" >'+data[i].why_help+'</h6></div>\
                                       <div class="col-sm-4 col-xs-4 overimage resize animated fadeIn "><h4 class="text-center" style="font-size: 1em;">How</h4>\
                                       <h6 class="text-center" >'+data[i].how_help+'</h6></div>\
                                    </div>\
                                    <img src="<?php echo base_url(); ?>'+data[i].imagepaths+'" alt="" class="img-responsive center-block" />\
                                </div>\
                                <div class="panel-footer">\
                                    <div class="row">\
                                        <div class="col-sm-12">\
                                            <div class="progress">\
                                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="'+amountprogress+'" aria-valuemin="0" aria-valuemax="100" style="width:'+amountprogress+'%">'+amountprogress+'% Complete (success)</div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                    <div class="row">\
                                        <div class="col-sm-12" style="margin-bottom: 5px">\
                                            <div class="input-group">\
                                                <span class="input-group-addon">$</span>\
                                                <input id="" type="text" value="'+data[i].amount+'" class="form-control" name="" placeholder="Amount">\
                                            </div>\
                                        </div>\
                                    </div>\
                                    <div class="row">\
                                        <div class="col-sm-6 pull-left">\
                                            <a href="<?php echo base_url('/donations'); ?>/'+data[i].id+'"><button type="button" class="btn btn-success btn-block">Donate</button>\
                                            </a>\
                                        </div>\
                                        <div class="col-sm-6 pull-right"><button data-toggle="modal" data-target="#confirm-share" type="button" class="btn btn-primary btn-xs" onclick="confirmShare('+data[i].id+');"><span class="glyphicon glyphicon-share-alt"></span>Share</button></div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    </div>';
        }
      $('.post_loadmore_content').append(out);

      
        }

        $('.post_loadmore_content').append('<button type="button" id="load_more" onclick="loadMore()"" class="btn btn-default">Load More</button>');
                                  
      
      },
    error: function( jqXhr, textStatus, errorThrown ){
        alert(jqXHR.responseText);;
      }
    });
// }

}


function next1(){
    $("#st2").click();
}


function prev1(){
    $("#st1").click();
}
function next3(){
    $("#st4").click();
}



//image upload of post

$(document).ready(function () {
$("#postimgupload").click(function() {
$("#message").empty();
$('#loading').show();
$.ajax({
url: "<?php echo base_url(); ?>" + "index.php/FileUpload_c/uploadPicture/posts/file/<?php echo $this->session->userdata('id'); ?>/img1br1posts", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(document.getElementById("uploadimage")), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
alert(data);
$('#loading').hide();
$("#message").html(data);
},error:function(xhr, textStatus, errorThrown){
    alert("error");

}
});
});

// Function to preview image after validation
$(function() {
$("#file").change(function() {
$("#message").empty(); // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
$('#previewing').attr('src','noimage.png');
$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
return false;
}
else
{
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
}
});
});
function imageIsLoaded(e) {
$("#file").css("color","green");
$('#image_preview').css("display", "block");
$('#previewing').attr('src', e.target.result);
$('#previewing').attr('width', '250px');
$('#previewing').attr('height', '230px');
};
});

<!--//////////////////////////////end of post script//////////////////////-->


</script>

<!-- load follower count -->
<script>
    loadFollowers();
    function loadFollowers(){
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/Follow_c/getFollowers/"+<?php echo $this->session->userdata('id'); ?>+"/1",
            dataType: 'json',
            success: function (res) {
                $('.followercount').html(res.length);
           
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText);
            }
        });
    }
</script>
<!-- end load follower count -->

<!-- load post count -->
<script>
    loadPosts();
    function loadPosts(){
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/FrontUser/postController/loadPostUserCount/"+<?php echo $this->session->userdata('id'); ?>,
            dataType: 'json',
            success: function (res) {
                $('.postcount').html(res.length); 
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText);
            }
        });
    }
</script>
<!-- end load post count -->

<!-- share starts here -->
<div class="modal fade" id="confirm-share" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Share on the wall
            </div>
            <div class="modal-body">
                This post will be shared on your timeline
            </div>
            <div id="shareit"></div>
        </div>
    </div>
</div>
<script>
    function confirmShare(postid){
        $('#shareit').html('\
                <div class="modal-footer">\
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>\
                <a class="btn btn-primary btn-ok" data-dismiss="modal" onclick="share('+postid+');">Ok</a>\
                </div>')
    }
    function share(postid){
        var ret = true;
        if (ret == true) {
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "index.php/FrontUser/postController/sharePost/"+<?php echo $this->session->userdata('id'); ?>+"/"+postid,
                success: function () {
                    $.bootstrapGrowl("post shared on your timeline", { type: 'success', align: 'center',
                        width: 'auto' });
                    $('#shareit').html('');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $.bootstrapGrowl(jqXHR.responseText, { type: 'success', align: 'center',
                        width: 'auto' });
                }
            });
        }
    }
</script>
<!-- share ends here -->

