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
                                <div class="panel-thumbnail"><img src="" class="profilepic img-responsive" width="80px"></div>
                                <div class="panel-body">
                                  <p class="lead"><?php echo $this->session->userdata('name');?></p>
                                  <p><l id="followercount"></l> Followers, 13 Posts</p>
                                  
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

                            <div class="post_content">

                              </div>

                              <div class="post_loadmore_content">

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
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Pick one child or more">
                            <span class="round-tab">
                                <i class="glyphicon glyphicons-user-add"></i>
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
      </div>

      <div class="modal-body">


            <form role="form">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <h3>Pick one child or more</h3>
                      <div class="row padding">
                      <div class="form-group">
        <div id="children">
            <!--load children in the post modal starts here-->
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
         <a href="#" style="margin-top: 25px"><h4 class="text-center"> &nbsp;or <button id="child_modal" type="button" class="btn btn-success">create new</button></h4></a>
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
                                <input type="text" class="form-control" id="pt_need" placeholder="What they Need">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Why they asking your help</label>
                                <input type="text" class="form-control" id="pt_why_help" placeholder="Why they asking your help">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Amount</label>
                                <input type="text" class="form-control" id="pt_amount" placeholder="Email">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Confirm Ammount</label>
                                <input type="text" class="form-control" id="pt_confirm_amount" placeholder="Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">How can you help</label>
                                <input type="text" class="form-control" id="pt_how_help" placeholder="Email">
                            </div>
                            <div class="col-md-6">
                            <label for="exampleInputEmail1">Tags</label>
                                <div class="row">
                                    <div class="col-md-9 col-xs-9">
                                        <input type="text" class="form-control" id="pt_tags" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step" onclick="postSave()">Save and continue</button></li>
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
                    <div class="form-group">
                        <label class="col-lg-3 control-label">First name:</label>
                        <div class="col-lg-8">
                            <input class="form-control validate[required]" required name="fname" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Last name:</label>
                        <div class="col-lg-8">
                            <input class="form-control validate[required]" name="lname" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Birth Date:</label>
                        <div class="col-lg-8">
                            <input class="form-control validate[required]" name="bdate" type="date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input class="form-control validate[required,custom[email]]" required name="email" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Mobile No:</label>
                        <div class="col-md-8">
                            <input class="form-control" maxlength="10" name="mobile" type="number" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Address:</label>
                        <div class="col-md-8">
                            <textarea class="form-control validate[required]" name="address" rows="5" id="address"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Postal Code:</label>
                        <div class="col-md-8">
                            <input class="form-control validate[required]" name="pcode" type="number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Country</label>
                        <div class="col-md-8 ui-select">
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
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Account Number:</label>
                        <div class="col-lg-8">
                            <input class="form-control validate[required]" name="accnumber" type="text">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">About:</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="about" rows="5" id="about_me"></textarea>
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
$(document).ready(function(){
  

	$("#post_txt").click(function(){
		$('#postModal').modal('show');

	});


  $("#child_modal").click(function(){
    $('#postModal').modal('toggle');
    $("#child_reg").modal('show');


  });

  postLoad();
  setInterval(postLoad, 2000);


});


//add post to db

function postSave(){

  var need=$("#pt_need").val();
  var whyHelp=$("#pt_why_help").val();
  var amount=$("#pt_amount").val();
  var confirmAmount=$("#pt_confirm_amount").val();
  var howHelp=$("#pt_how_help").val();
  var tags=$("#pt_tags").val();



  $.ajax({
    type: "POST",
    url: "savePost",
    data: {need:need,whyHelp:whyHelp,amount:amount,howHelp:howHelp,tags:tags},
    success: function( data, textStatus, jQxhr ){
      //console.log("success");
   

      
      },
    error: function( jqXhr, textStatus, errorThrown ){
        console.log("error");
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
      $('.post_content').append(' <div class="panel panel-default" style="margin-bottom:10px;">\
           <div class="panel-heading">\
           <a href="#" class="pull-right">View all</a> \
           <img src="http://1plusx.com/app/mu-plugins/all-in-one-seo-pack-pro/images/default-user-image.png" width="30px"/>'+data[i].postedby+'\
           <h4>post'+data[i].id+'</h4>\
           </div>\
          <div class="panel-body">\
          <div class="row">\
          <div class="col-sm-4">\
          <img src="//placehold.it/150x150" class="img pull-left">\
          </div>\
          <div class="col-sm-8">\
          <h4>what they want</h4><p>'+data[i].needs+'</p>\
          <h4>How can you help</h4><p>'+data[i].how_help+'</p>\
          <h4>Why they asking your help</h4><p>'+data[i].why_help+'</p>\
          </div>\
          </div>\
        <div class="row">\
        <div class="col-sm-4">\
        <div class="progress">\
          <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"\
          aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">\
            40% Complete (success)\
          </div>\
        </div>\
        </div>\
        <div class="col-sm-4">\
        <div class="input-group">\
          <span class="input-group-addon">$</span>\
          <input id="" type="text" class="form-control" name="" \
            placeholder="Amount">\
        </div>\
        </div>\
        <div class="col-sm-4"><a href="<?php echo base_url('/donations'); ?>"><button type="button" class="btn btn-success btn-block">donate</button>\
        </a></div>\
        </div>\
          <div class="row" style="background-color: #f5f5f5;margin-top:10px;padding:2px; border-color: #ddd;">\
             <div class="col-sm-4">\
              $8000.00 needed<br/>$3500.00 received </div>\
               <div class="col-sm-4">\
              56 days left<br/> 5 donations</div>\
              <div class="col-sm-4"><button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-share-alt"></span></button></div>\
                 </div>\
        </div>\
        </div>\
        <input type="hidden" value='+data[i].id+' class="lastid_value" />\
        ');

      
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
  var lastid=$(".lastid_value").val();
  lastid=parseInt(lastid)-4;
  alert(lastid);
  $("#load_more").text("Loading please wait..");


   $.ajax({
    type: "POST",
    url: "loadMorePost",
    data:{lastid:lastid},
    success: function( data, textStatus, jQxhr ){
      $("#load_more").remove();
      $(".lastid_value").remove();

      for(var i=0;i<data.length;i++){
      $('.post_loadmore_content').append(' <div class="panel panel-default">\
           <div class="panel-heading">\
           <a href="#" class="pull-right">View all</a> \
           <h4>post'+data[i].id+'</h4>\
           </div>\
          <div class="panel-body">\
          <div class="row">\
          <div class="col-sm-4">\
          <img src="//placehold.it/150x150" class="img pull-left">\
          </div>\
           <div class="col-sm-8">\
          <h4>what they want</h4><p>'+data[i].needs+'</p>\
          <h4>How can you help</h4><p>'+data[i].how_help+'</p>\
          <h4>Why they asking your help</h4><p>'+data[i].why_help+'</p>\
          </div>\
          </div>\
        <div class="row">\
        <div class="col-sm-4">\
        <div class="progress">\
          <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"\
          aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">\
            40% Complete (success)\
          </div>\
        </div>\
        </div>\
        <div class="col-sm-4">\
        <div class="input-group">\
          <span class="input-group-addon">$</span>\
          <input id="" type="text" class="form-control" name="" \
            placeholder="Amount">\
        </div>\
        </div>\
        <div class="col-sm-4"><a href="<?php echo base_url('/donations'); ?>"><button type="button" class="btn btn-success btn-block">donate</button>\
        </a></div>\
        </div>\
          <div class="row" style="background-color: #f5f5f5;margin-top:10px;padding:2px; border-color: #ddd;">\
             <div class="col-sm-4">\
              $8000.00 needed<br/>$3500.00 received </div>\
               <div class="col-sm-4">\
              56 days left<br/> 5 donations</div>\
                 </div>\
                 <div class="col-sm-4">\
                 <button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-share-alt"></span></button>\
                 </div>\
        </div>\
        </div>\
        <input type="hidden" value='+data[i].id+' class="lastid_value" />\
        ');

      
        }

        $('.post_loadmore_content').append('<button type="button" id="load_more" onclick="loadMore()"" class="btn btn-default">Load More</button>');
                                  
      
      },
    error: function( jqXhr, textStatus, errorThrown ){
        alert(jqXHR.responseText);;
      }
    });

}

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
                document.getElementById('followercount').innerHTML = res.length;
           
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText);
            }
        });
    }
</script>
<!-- end load follower count -->
