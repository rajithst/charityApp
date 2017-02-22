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
     <a href="<?php echo base_url('events');?>"> Events</a></br></br>
          <img src="<?php echo base_url('img/events/calendar.png')?>" width=20px>
          <a data-toggle="modal" data-target="#Event_modal"> Create Event</a></br></br>
    </div>
    </div>


</div>


<!--end of left side bar-->
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
   <div class="col-sm-3">
       <div class="childcard">
           <canvas class="header-bg" width="250" height="70" id="header-blur"><img class="src-image" src="<?php echo base_url('img/children/child.png');?>"/></canvas>
           <div class="childavatar">
               <img class="src-image" src="<?php echo base_url('img/children/child.png');?>"/>
           </div>
           <div class="content">
               <p>Child in need Help! <br>
                   More description here- This need to be a slider</p>
               <p><button type="button" class="btn btn-default">Donate</button></p>
           </div>
       </div>


       <img class="src-image"  src="data:image/jpg;base64,/9j/4AAQSkZJRgABAQEASABIAAD/4gKgSUNDX1BST0ZJTEUAAQEAAAKQbGNtcwQwAABtbnRyUkdCIFhZWiAH3QAKABEAAwAsAB9hY3NwQVBQTAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA9tYAAQAAAADTLWxjbXMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAtkZXNjAAABCAAAADhjcHJ0AAABQAAAAE53dHB0AAABkAAAABRjaGFkAAABpAAAACxyWFlaAAAB0AAAABRiWFlaAAAB5AAAABRnWFlaAAAB+AAAABRyVFJDAAACDAAAACBnVFJDAAACLAAAACBiVFJDAAACTAAAACBjaHJtAAACbAAAACRtbHVjAAAAAAAAAAEAAAAMZW5VUwAAABwAAAAcAHMAUgBHAEIAIABiAHUAaQBsAHQALQBpAG4AAG1sdWMAAAAAAAAAAQAAAAxlblVTAAAAMgAAABwATgBvACAAYwBvAHAAeQByAGkAZwBoAHQALAAgAHUAcwBlACAAZgByAGUAZQBsAHkAAAAAWFlaIAAAAAAAAPbWAAEAAAAA0y1zZjMyAAAAAAABDEoAAAXj///zKgAAB5sAAP2H///7ov///aMAAAPYAADAlFhZWiAAAAAAAABvlAAAOO4AAAOQWFlaIAAAAAAAACSdAAAPgwAAtr5YWVogAAAAAAAAYqUAALeQAAAY3nBhcmEAAAAAAAMAAAACZmYAAPKnAAANWQAAE9AAAApbcGFyYQAAAAAAAwAAAAJmZgAA8qcAAA1ZAAAT0AAACltwYXJhAAAAAAADAAAAAmZmAADypwAADVkAABPQAAAKW2Nocm0AAAAAAAMAAAAAo9cAAFR7AABMzQAAmZoAACZmAAAPXP/bAEMABQMEBAQDBQQEBAUFBQYHDAgHBwcHDwsLCQwRDxISEQ8RERMWHBcTFBoVEREYIRgaHR0fHx8TFyIkIh4kHB4fHv/bAEMBBQUFBwYHDggIDh4UERQeHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHv/AABEIAIAAgAMBIgACEQEDEQH/xAAcAAACAwEBAQEAAAAAAAAAAAAFBgMEBwIBAAj/xAA7EAABAwMCBAQDBgUDBQEAAAABAgMEAAUREiEGMUFRBxMiYRRxgRUjMkJSkQgzYqHRFrHBJFPS4fDx/8QAGQEAAgMBAAAAAAAAAAAAAAAAAQQAAgMF/8QAIREAAgICAwEAAwEAAAAAAAAAAAECEQMSBCExQRMiURT/2gAMAwEAAhEDEQA/ANpbTyzUyE8tq8bTyqZKeXOqGx8lPLapkJ5V6hJ22qVCOVQB82j2qZKa9QnepEp5VAHiE74xUyEmlviDjWwWKUI0p9b7w/mtx061tjuRSBP8a5aJLseHYWUuAFTaXnTqKc7HA9vepskWWOUl0jZ9PcUv+I3o4Onk/wDaV/tWRSfHS/sS0vLs8D4YK0KaAXqJ5n1cwcdMfvRi8eLlg4j4em219h63SXG8N+Z6kKJ/q6dOdVck0FYpJop8NK0Wgq21AbDrTHalfEsFCkhGR+JW1VbfBgC2MMRVFTykBRIOakuEeYqMymKkq0qwqmdk40Z6OM7QGuMdMecVNJOnO6096tWu6TQlwPyHHY4PKiQiOIimLISn19+YqJqG03FLbKckGo6l0yzbitgDepLr1wQ/GSUJb5dM0Xl3eY/CbZADaceojmahuTadCsAJ04JqBZQ5HbXq01vjxQ6bQpmzz8XhpTafrUyE4A2rxA5VOhNIjZ6hNTITXiE1MlO9QB8kYpH8UeP2uFEi3wECTdnUakIHqDfuoA/XBxtvR7xBvn+m+DrhdkEB9tvQxnB+8Vsk79uf0rDODrZKv96ZlSH35UqYS444STrUeZUeuO3IbYrPJPVG2HHu7YNZ+2Z9yVKmwHXpatW50hQycnYchjOKPPcHCX5Up1DkWRhQU6RttsMjocY25bGto4Y4LtlibC0MebIx6nF771du9qjTGihzKCeqdqUc2x1JI/LVyirbdkxpePiWtP3g5OIGyVgjtlP0zS7L8tMo/l87v+VeMH/n9vetn418P5aJKXYwLqcn8J/Kee3TbpS6jw9UpChJQoEjJ9zVo5UvS3478AXAfiCrhWeYtxSH4zykgFSt2gdiodx3FbvZr7bpKMttEAjUo9K/NfH3Dcm2K/CFNnJacV07g9qc/AC53K9iTYUPH4mM0XEqWnUCjIBGfbI503jlGaFMqcHRrV0ZauUlEmM6oJb5joa7kaVhBQkIPI4qtE4c4jhk6H2VJJzjSf8ANS/ZXEKWvL8thXXO9aQlq+0L5ltGosoPx3XSsLaKh+oV5IVHRB8kspJA2OKICJxC0wWBFZOeuTQ520X4pIMNo5/rP+K2WZP0UnimktTQGxUyBXKB+9TIBrCho6SOW1SIGa8SNqlbTy6UAGbfxBOlXDUC2hCT8TK1qyMnCE9Pqai8F4HkSI61o3SgpT6eX1ox4nW9M26WXzEFbbaXlbdD6f3PtTBwRZhAiC4yEllAB8tB54zzP+KWyP8AYcxUsY1PpDYOBsRQK4rwrURsP7VzeeIHmEByNb3pIHPbH7UvxuOIFwmGDJt0uI7nTlxG2awZtBMt3B1LjQUBqwKASjtuKPaWWvNW4rS2DhOaWbjcraZBQqWyk5xgqxvVJJjEKFfje3R7hZZAWkKwgkbcjSf/AAxoTb/Fb4VbGfPiupSQDlOB/ttjPSnjjBxDNklPIUlSC2cFJyKUf4fkKd8XLe+lG3lSMjc6QUGmeM2Lcqmj9Q+Un9IrksJ/SKnrymzlFfyEfpH7Vz8O3+kVZ+dckUSWBkCpUjlXCc7VKkdqBpZ2kZxUiR/+1ykbipByqAA/FEQPxEvrSnW06hEfJGdSjheO+xA+lMTiCIIQGwvy0jCM4BI5UHv0QLYjXFTiyWHEBKByzrHqpmbQlTJII9W9JNNyY/1rEzHjG232fAlqPETMN1xOGgzrSWf/AC/tv+1CPDyzcRovba35LkmEn+Z8QCrWf6SdxTpxbcYFsSVyXAD0HU1b4Sll6A28pttpTyzpbdXhWnHSqK30M1rDYWPG1SodoCoTZ1AZCQrGTmsUanSUKbk3HhpU1C+bjUlWW/n0Nbb4qLC1hheMJOOfWk62RbfMWtOVNvoOlZbWUkn3xzoXTZeELghVYW1eYT0eAVojvpKFocJ1IVjaiX8NFrmOccTbg4nQ1CiFDgAIHmLOAPfYE0cet0SJJEhsHzNwVlWSfnTH4CRQxb7y+Uqy7LThR5YCTt9M1rgfdC3KjUGzSa+ryvqcOUfZrmuq8NQgIRUiloab1rOAKjTyFV7mohlOkZOrlUNCq/e3g5pjxyU9zUarxPOxj4pX4xtnEDriJFrugt/dBQDqNDhZ/ECCgv3G8NKYSjUcNgGrJWGh3fu0l2Eth9pIbxkqxuAN6Pwb4wbU0t4lKgg498Csut9q4xnoD7fElvQ3n+W41nbsTmic+6hllDZJUqOoocOdhv8A35Ck+QnF2hzB+/T+C03Pcv3ET1wnywA26pLbR/CwAdifc9z9KaJ8m7xI7bjExooQnIAXp3PehvALiIHGUjKcNyASvWnnk5/+2pv4pkQvIIMdxIOw0YKfnS8aatsf27SZjviDcrleAyXXtDiDlY83GD749qFW27y7RJZfW35qBs4EqB8wdd+9MF6ttscDhC0IJWdRLQJJ360o3lq3RCxEjhKAtWXF9x1qWvjLyqPjHq9XDS0uQ2rUhTPmIJ25jI/4p/8AC+bboHDbVtbfQp9BK3d98nl/YCsJvN9NwdDaCEssAZI/pG1GPCW4PKelOuOqUpatyo7mm+Njbi5s53Myp1A/RiJralDCgatIWDy3pGtkpRWlWo0zwZAUOea3Oe40FU71D53oJPMGpIh1JJobIUoSw0OSjQbBRwkUQs0WNKLheKdTeCjJrApPi5I+0nICPLU6g40o3+tdHxFmKQtLsORlQxlJIo7oY/BJo264Wpy7Tm0v+W0y0vUrCvxdhQq8XCND+Mtz9ucmj8i9aSMY2G5rEVcYOJZws3NKd+Tygf3zXSRdp8dM1tN4bS84lDCXFqSqQTndGeaQBkqzgZHepGaYXgkvQ6ux32TJDcZPlB08vMAA/wDQpmsfC5lcHs3G2rVMcakvIfDm3xKUqxqR2wRgDqBU/h9wZNSw7eJN3fezGebaZKiU6ikp1ajzxvjarvgPdAnghqwzvu7hb3Xm3kE76i4pX/NZ8iWySZbEqtoVIxWJCVKQtpxQOs5yQc7D58qJyLstMFTMlJKQnCcnmrtTbxLwxDuUhb7IMaSvJ81CchR/qHXlWe8UWW+21gnzIb7YGy0nQo45HB26f70i4P4PQyJifxPKEZa0hOGf089/as9usx16YENnUVHAHPvmma/ruM4BhSAAnYb7H6/vQxVvRbI65b4BcQglPtRhCgzbZQchE22OpMsAvKVlQ3Gxxp+Y/wAVats+dwqlt9uWy604rJTyxRW2cDzpXh9Ht4kiHc0umUgubpGrm2e22PkRSnM4Pv2oxpy/WgKOB1A3OO/euimow1EK3lZqEXxFmptyJDMNK9tzqp48NeNlX23KkyWhH0rKd1bbVg8GG8xCTHTJbCBz9XOitnbejxnGFXMtNncJQrG9V2jfpZ4m1VH6cgcU2tIU0uY0lQ/qqFN/tj10aS3LaUo9lZr8num+BxflracTk4KlnJFXeFHr3Eu6H5BQEk/iCvw1Hq/pn+Br4XovxDi2IcNoOSHFaG0NtjUonkB1zRuHbJrrWpmTcXsK0+ZDtjr7Ocb4cGEqHTI2zyJrYP8ATvCvCf3sK1tGYtOzjpK1cu/Q/L3orwqDKjvMy0ZaeSAEcgkDkAOgHTFaKK+geR1aEzh3hkQimUq1zLlKB0pXckoaisq6LLaVKU5zzj26UzcZWtNtsCXA85Ku88ojqlrGV4UoYSgDZCQTslI6b5NEprrkGQiAvU4yT6VHCa48QJdui/ZEi5TGIUOO4l9S3V6QSnBSkdznH0BqypeGezbVjda2GotubiM58tlAQn5JGP74z9ayjjOK5Zr7IvNn0rkpcAkR2lDUrbOCM/ixvg4JH0r7jPxIudytZtfh9b5j7kgaF3dbJbaaB5lsKAKldlEYHPeoPDrw2kWe2yZwmrTdZKcv+YPMQ91+8CvxnO+Tv771WWNSXYccnjdhPhjxIsVy+7NwjolIJC2XXAhaVDmCFYI+tR8c3u0z4ZYMuKrfOUvJzn96BSeHjfJclPFFht8tKFlBkRmClxkdNQzrI5epKvpWV3bhfhS38dPWKRfLgGmvxNQ4hfcz+lLhwDtnmCRy3rH/ADL+jEcyu0hjnXHh+EpTkmdFZCdwS6DTLwPw23eQjim4xXE2lveGy6ggyl/lWUn8gPLI9XyG4y2OcDWaM2/wtwa7cpmQkSLoyTjf1HKs4VtgYGNzXfEd64z4jtv2auL8AwtYWsx1LC1HOcas5A2Gw7VeHHUXZJ8iclXgVnuBy4PLT+DUdJHX3qlPtqZp++cKRo1FaDpWlQyAQR1r2zvSyhEO6trbnckrUMB/69Fdx15jtRd1lRdYbKNIUFZ+hH+avVGViNxFw6/FcRIVDcusd3YrZSlEhs46jZLg/Y+5oO5brX5f/UIk25ZOAJzCmge3qGUj6kVuzdnSq3tvO7JbJUvbp2rm2NM3CS4VtJLA9AQcEEe4rKeCEu2jSPIlFdGFGyxY6wJAwFp1NqDgKVp7pUDgj5VaatNvLR0qX7+rNajxF4fWV6JJSVO29oO+clTGAlDihgkJIxvgZHXntWa8Q8HX2xMOzIE1c6K2SVKQ1hbY55UnOCPcftS0+J/JG8eVfqNu4/aIuNuCVbOJKe3WrDq3YYTHjNFTq0ZU4TshPeqnFcqPNttvuaFgstOlQ90kA4296JSXvLhxVkHzHE6nDjcA8tvlXQoQvpFy4RhdLM28ydbjG4J5nvQXxEQ1O4dtbiwlaScEGicErtklD6AoxHlYcSd9BPWq/H0ZQgtIbB0IXrSB0GajBF9o4iNMizIawE/d+nsCBtRYTlREQpZB8lxIQ4Ox5UHaWG4bTLnpUpI57VbkIVI4WkMLJLkdXP5cqhGrZ3dkCDf41wZwI8r0rxyz3pLsnDsBV/El2K0uUE5S8pAKslZzv7imm1SftKzJYc/mMrSoHtg71HGQhuUtWMKOMHHz5VEROuinYbSwzZ2F6ACATpI2HqNSNsIkLcPl+lB2wMVdsDhNvfDuNKHXU4PstVTWJpOHA4SNSjkkcwahGwPcbfHcYSHGUrStWMKGRUNttfmT2EgLUnGlOVEgDNH5sdTylNhvGHAM+xBqD4yPabM9OBCnSstt+6u4qETLFxUh9xFni4JCT5pB2+VB7IkNB5pScFKtyatcKNrS45JfP3zidaiTyqG5n4VwqaKfv1ZzjpQCv4WOOV+VabayMD4mSNQ7hKSaXZbTk95MRon4dj1PEclr7E9hRvjFQcdskULCVDWrJ76ccvrQTiRfl+TYYyi2HEB6YrOClHQE91f2FB9hj4f/2Q=="/>

       <img class="src-image"  src="data:image/jpeg;base64,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"/>
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
                            <a class="btn btn-social-icon btn-google" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-google']);"><span class="fa fa-google"> Share on Google+</span></a>

                            </div>
                            <div class="col-sm-6">
                            <!--face book share button-->
                             <iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Fcharityapp.azurewebsites.net%2FHome%23step2&layout=button&size=small&mobile_iframe=true&appId=307324332804525&width=58&height=60" width="58" height="60" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
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
      $.bootstrapGrowl("Fill All Fileds", { type: 'danger', align: 'center',
                        width: 'auto' });
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
      $.bootstrapGrowl("Added Successfully", { type: 'info', align: 'center',
                        width: 'auto' });
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
                                <div class="col-sm-6 pull-right" style="color:white; padding:5px; background-color:#27ae60; ">\
                                    <div class="col-sm-6 ">$'+data[i].amount+' needed<br/>$'+data[i].received_amount+' received</div>\
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
                                <div class="col-sm-2 pull-left">\
                                    <a class="button-style btn green" href="<?php echo base_url('/donations'); ?>/'+data[i].id+'">Donate\
                                    </a>\
                                </div>\
                                <div class="col-sm-2 pull-left"><button data-toggle="modal" data-target="#confirm-share" type="button" class="button-style blue" onclick="confirmShare('+data[i].id+');">Share</button></div>\
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
                                        <div class="col-sm-6 pull-right" style="color:white; padding:5px; background-color:#27ae60;  width:50%">\
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
                                        <div class="col-sm-2 pull-left">\
                                            <a href="<?php echo base_url('/donations'); ?>/'+data[i].id+'"><button type="button" class="button-style btn green">Donate</button>\
                                            </a>\
                                        </div>\
                                        <div class="col-sm-2 pull-left"><button data-toggle="modal" data-target="#confirm-share" type="button" class="button-style blue" onclick="confirmShare('+data[i].id+');">Share</button></div>\
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
                            <div class="col-sm-6 pull-right" style="color:white; padding:5px; background-color:#27ae60; ">\
                                    <div class="col-sm-6 ">$'+data[i].amount+' needed<br/>$'+data[i].received_amount+' received</div>\
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
                                    <a href="<?php echo base_url('/donations'); ?>/'+data[i].id+'"><button type="button" class="button-style btn green">Donate</button>\
                                    </a>\
                                </div>\
                                <div class="col-sm-6 pull-right"><button data-toggle="modal" data-target="#confirm-share" type="button" class="button-style blue" onclick="confirmShare('+data[i].id+');">Share</button></div>\
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
                                    <div class="col-sm-6 pull-right" style="color:white; padding:5px; background-color:#27ae60; ">\
                                    <div class="col-sm-6 ">$'+data[i].amount+' needed<br/>$'+data[i].received_amount+' received</div>\
                                    <div class="col-sm-6">\
                                    56 days left<br/> 5 donations\
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
                                            <a  class="button-style blue btn" href="<?php echo base_url('/donations'); ?>/'+data[i].id+'">Donate\
                                            </a>\
                                        </div>\
                                        <div class="col-sm-6 pull-left"><button data-toggle="modal" data-target="#confirm-share" type="button" class="button-style blue" onclick="confirmShare('+data[i].id+');">Share</button></div>\
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
<script type="text/javascript">
     $('.button-style').mousedown(function (e) {
    var target = e.target;
    var rect = target.getBoundingClientRect();
    var ripple = target.querySelector('.ripple');
    $(ripple).remove();
    ripple = document.createElement('span');
    ripple.className = 'ripple';
    ripple.style.height = ripple.style.width = Math.max(rect.width, rect.height) + 'px';
    target.appendChild(ripple);
    var top = e.pageY - rect.top - ripple.offsetHeight / 2 -  document.body.scrollTop;
    var left = e.pageX - rect.left - ripple.offsetWidth / 2 - document.body.scrollLeft;
    ripple.style.top = top + 'px';
    ripple.style.left = left + 'px';
    return false;
});

</script>

<!-- modal js to disable steps -->
<script type="text/javascript">
$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}



// Child card in right hand side
/*

 This Snippet is using a modified Stack Blur js lib for blurring the header images.

 I could not use hosted images because Canvas cannot work with cross domain images. If you want to use hosted images make sure they are on the same domain.

 Have fun!

 */

/*

 StackBlur - a fast almost Gaussian Blur For Canvas

 Version:     0.5
 Author:		Mario Klingemann
 Contact: 	mario@quasimondo.com
 Website:	http://www.quasimondo.com/StackBlurForCanvas
 Twitter:	@quasimondo

 In case you find this class useful - especially in commercial projects -
 I am not totally unhappy for a small donation to my PayPal account
 mario@quasimondo.de

 Or support me on flattr:
 https://flattr.com/thing/72791/StackBlur-a-fast-almost-Gaussian-Blur-Effect-for-CanvasJavascript

 Copyright (c) 2010 Mario Klingemann

 Permission is hereby granted, free of charge, to any person
 obtaining a copy of this software and associated documentation
 files (the "Software"), to deal in the Software without
 restriction, including without limitation the rights to use,
 copy, modify, merge, publish, distribute, sublicense, and/or sell
 copies of the Software, and to permit persons to whom the
 Software is furnished to do so, subject to the following
 conditions:

 The above copyright notice and this permission notice shall be
 included in all copies or substantial portions of the Software.

 THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 OTHER DEALINGS IN THE SOFTWARE.
 */

var mul_table = [
    512,512,456,512,328,456,335,512,405,328,271,456,388,335,292,512,
    454,405,364,328,298,271,496,456,420,388,360,335,312,292,273,512,
    482,454,428,405,383,364,345,328,312,298,284,271,259,496,475,456,
    437,420,404,388,374,360,347,335,323,312,302,292,282,273,265,512,
    497,482,468,454,441,428,417,405,394,383,373,364,354,345,337,328,
    320,312,305,298,291,284,278,271,265,259,507,496,485,475,465,456,
    446,437,428,420,412,404,396,388,381,374,367,360,354,347,341,335,
    329,323,318,312,307,302,297,292,287,282,278,273,269,265,261,512,
    505,497,489,482,475,468,461,454,447,441,435,428,422,417,411,405,
    399,394,389,383,378,373,368,364,359,354,350,345,341,337,332,328,
    324,320,316,312,309,305,301,298,294,291,287,284,281,278,274,271,
    268,265,262,259,257,507,501,496,491,485,480,475,470,465,460,456,
    451,446,442,437,433,428,424,420,416,412,408,404,400,396,392,388,
    385,381,377,374,370,367,363,360,357,354,350,347,344,341,338,335,
    332,329,326,323,320,318,315,312,310,307,304,302,299,297,294,292,
    289,287,285,282,280,278,275,273,271,269,267,265,263,261,259];


var shg_table = [
    9, 11, 12, 13, 13, 14, 14, 15, 15, 15, 15, 16, 16, 16, 16, 17,
    17, 17, 17, 17, 17, 17, 18, 18, 18, 18, 18, 18, 18, 18, 18, 19,
    19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 20, 20, 20,
    20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 21,
    21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21,
    21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 22, 22, 22, 22, 22, 22,
    22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22,
    22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 23,
    23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23,
    23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23,
    23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23,
    23, 23, 23, 23, 23, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24,
    24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24,
    24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24,
    24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24,
    24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24 ];


function stackBlurCanvasRGBA( canvas, top_x, top_y, width, height, radius )
{
    if ( isNaN(radius) || radius < 1 ) return;
    radius |= 0;

    var context = canvas.getContext("2d");
    var imageData;

    try {
        try {
            imageData = context.getImageData( top_x, top_y, width, height );
        } catch(e) {

            // NOTE: this part is supposedly only needed if you want to work with local files
            // so it might be okay to remove the whole try/catch block and just use
            // imageData = context.getImageData( top_x, top_y, width, height );
            try {
                netscape.security.PrivilegeManager.enablePrivilege("UniversalBrowserRead");
                imageData = context.getImageData( top_x, top_y, width, height );
            } catch(e) {
                alert("Cannot access local image");
                throw new Error("unable to access local image data: " + e);
                return;
            }
        }
    } catch(e) {
        alert("Cannot access image");
        throw new Error("unable to access image data: " + e);
    }

    var pixels = imageData.data;

    var x, y, i, p, yp, yi, yw, r_sum, g_sum, b_sum, a_sum,
        r_out_sum, g_out_sum, b_out_sum, a_out_sum,
        r_in_sum, g_in_sum, b_in_sum, a_in_sum,
        pr, pg, pb, pa, rbs;

    var div = radius + radius + 1;
    var w4 = width << 2;
    var widthMinus1  = width - 1;
    var heightMinus1 = height - 1;
    var radiusPlus1  = radius + 1;
    var sumFactor = radiusPlus1 * ( radiusPlus1 + 1 ) / 2;

    var stackStart = new BlurStack();
    var stack = stackStart;
    for ( i = 1; i < div; i++ )
    {
        stack = stack.next = new BlurStack();
        if ( i == radiusPlus1 ) var stackEnd = stack;
    }
    stack.next = stackStart;
    var stackIn = null;
    var stackOut = null;

    yw = yi = 0;

    var mul_sum = mul_table[radius];
    var shg_sum = shg_table[radius];

    for ( y = 0; y < height; y++ )
    {
        r_in_sum = g_in_sum = b_in_sum = a_in_sum = r_sum = g_sum = b_sum = a_sum = 0;

        r_out_sum = radiusPlus1 * ( pr = pixels[yi] );
        g_out_sum = radiusPlus1 * ( pg = pixels[yi+1] );
        b_out_sum = radiusPlus1 * ( pb = pixels[yi+2] );
        a_out_sum = radiusPlus1 * ( pa = pixels[yi+3] );

        r_sum += sumFactor * pr;
        g_sum += sumFactor * pg;
        b_sum += sumFactor * pb;
        a_sum += sumFactor * pa;

        stack = stackStart;

        for( i = 0; i < radiusPlus1; i++ )
        {
            stack.r = pr;
            stack.g = pg;
            stack.b = pb;
            stack.a = pa;
            stack = stack.next;
        }

        for( i = 1; i < radiusPlus1; i++ )
        {
            p = yi + (( widthMinus1 < i ? widthMinus1 : i ) << 2 );
            r_sum += ( stack.r = ( pr = pixels[p])) * ( rbs = radiusPlus1 - i );
            g_sum += ( stack.g = ( pg = pixels[p+1])) * rbs;
            b_sum += ( stack.b = ( pb = pixels[p+2])) * rbs;
            a_sum += ( stack.a = ( pa = pixels[p+3])) * rbs;

            r_in_sum += pr;
            g_in_sum += pg;
            b_in_sum += pb;
            a_in_sum += pa;

            stack = stack.next;
        }


        stackIn = stackStart;
        stackOut = stackEnd;
        for ( x = 0; x < width; x++ )
        {
            pixels[yi+3] = pa = (a_sum * mul_sum) >> shg_sum;
            if ( pa != 0 )
            {
                pa = 255 / pa;
                pixels[yi]   = ((r_sum * mul_sum) >> shg_sum) * pa;
                pixels[yi+1] = ((g_sum * mul_sum) >> shg_sum) * pa;
                pixels[yi+2] = ((b_sum * mul_sum) >> shg_sum) * pa;
            } else {
                pixels[yi] = pixels[yi+1] = pixels[yi+2] = 0;
            }

            r_sum -= r_out_sum;
            g_sum -= g_out_sum;
            b_sum -= b_out_sum;
            a_sum -= a_out_sum;

            r_out_sum -= stackIn.r;
            g_out_sum -= stackIn.g;
            b_out_sum -= stackIn.b;
            a_out_sum -= stackIn.a;

            p =  ( yw + ( ( p = x + radius + 1 ) < widthMinus1 ? p : widthMinus1 ) ) << 2;

            r_in_sum += ( stackIn.r = pixels[p]);
            g_in_sum += ( stackIn.g = pixels[p+1]);
            b_in_sum += ( stackIn.b = pixels[p+2]);
            a_in_sum += ( stackIn.a = pixels[p+3]);

            r_sum += r_in_sum;
            g_sum += g_in_sum;
            b_sum += b_in_sum;
            a_sum += a_in_sum;

            stackIn = stackIn.next;

            r_out_sum += ( pr = stackOut.r );
            g_out_sum += ( pg = stackOut.g );
            b_out_sum += ( pb = stackOut.b );
            a_out_sum += ( pa = stackOut.a );

            r_in_sum -= pr;
            g_in_sum -= pg;
            b_in_sum -= pb;
            a_in_sum -= pa;

            stackOut = stackOut.next;

            yi += 4;
        }
        yw += width;
    }


    for ( x = 0; x < width; x++ )
    {
        g_in_sum = b_in_sum = a_in_sum = r_in_sum = g_sum = b_sum = a_sum = r_sum = 0;

        yi = x << 2;
        r_out_sum = radiusPlus1 * ( pr = pixels[yi]);
        g_out_sum = radiusPlus1 * ( pg = pixels[yi+1]);
        b_out_sum = radiusPlus1 * ( pb = pixels[yi+2]);
        a_out_sum = radiusPlus1 * ( pa = pixels[yi+3]);

        r_sum += sumFactor * pr;
        g_sum += sumFactor * pg;
        b_sum += sumFactor * pb;
        a_sum += sumFactor * pa;

        stack = stackStart;

        for( i = 0; i < radiusPlus1; i++ )
        {
            stack.r = pr;
            stack.g = pg;
            stack.b = pb;
            stack.a = pa;
            stack = stack.next;
        }

        yp = width;

        for( i = 1; i <= radius; i++ )
        {
            yi = ( yp + x ) << 2;

            r_sum += ( stack.r = ( pr = pixels[yi])) * ( rbs = radiusPlus1 - i );
            g_sum += ( stack.g = ( pg = pixels[yi+1])) * rbs;
            b_sum += ( stack.b = ( pb = pixels[yi+2])) * rbs;
            a_sum += ( stack.a = ( pa = pixels[yi+3])) * rbs;

            r_in_sum += pr;
            g_in_sum += pg;
            b_in_sum += pb;
            a_in_sum += pa;

            stack = stack.next;

            if( i < heightMinus1 )
            {
                yp += width;
            }
        }

        yi = x;
        stackIn = stackStart;
        stackOut = stackEnd;
        for ( y = 0; y < height; y++ )
        {
            p = yi << 2;
            pixels[p+3] = pa = (a_sum * mul_sum) >> shg_sum;
            if ( pa > 0 )
            {
                pa = 255 / pa;
                pixels[p]   = ((r_sum * mul_sum) >> shg_sum ) * pa;
                pixels[p+1] = ((g_sum * mul_sum) >> shg_sum ) * pa;
                pixels[p+2] = ((b_sum * mul_sum) >> shg_sum ) * pa;
            } else {
                pixels[p] = pixels[p+1] = pixels[p+2] = 0;
            }

            r_sum -= r_out_sum;
            g_sum -= g_out_sum;
            b_sum -= b_out_sum;
            a_sum -= a_out_sum;

            r_out_sum -= stackIn.r;
            g_out_sum -= stackIn.g;
            b_out_sum -= stackIn.b;
            a_out_sum -= stackIn.a;

            p = ( x + (( ( p = y + radiusPlus1) < heightMinus1 ? p : heightMinus1 ) * width )) << 2;

            r_sum += ( r_in_sum += ( stackIn.r = pixels[p]));
            g_sum += ( g_in_sum += ( stackIn.g = pixels[p+1]));
            b_sum += ( b_in_sum += ( stackIn.b = pixels[p+2]));
            a_sum += ( a_in_sum += ( stackIn.a = pixels[p+3]));

            stackIn = stackIn.next;

            r_out_sum += ( pr = stackOut.r );
            g_out_sum += ( pg = stackOut.g );
            b_out_sum += ( pb = stackOut.b );
            a_out_sum += ( pa = stackOut.a );

            r_in_sum -= pr;
            g_in_sum -= pg;
            b_in_sum -= pb;
            a_in_sum -= pa;

            stackOut = stackOut.next;

            yi += width;
        }
    }

    context.putImageData( imageData, top_x, top_y );

}

function BlurStack()
{
    this.r = 0;
    this.g = 0;
    this.b = 0;
    this.a = 0;
    this.next = null;
}

$( document ).ready(function() {
    var BLUR_RADIUS = 40;
    var sourceImages = [];

    $('.src-image').each(function(){
        sourceImages.push($(this).attr('src'));
    });

    $('.avatar img').each(function(index){
        $(this).attr('src', sourceImages[index] );
    });

    var drawBlur = function(canvas, image) {
        var w = canvas.width;
        var h = canvas.height;
        var canvasContext = canvas.getContext('2d');
        canvasContext.drawImage(image, 0, 0, w, h);
        stackBlurCanvasRGBA(canvas, 0, 0, w, h, BLUR_RADIUS);
    };


    $('.card canvas').each(function(index){
        var canvas = $(this)[0];

        var image = new Image();
        image.src = sourceImages[index];

        image.onload = function() {
            drawBlur(canvas, image);
        }
    });
});


</script>