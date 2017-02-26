
<!-- START PAGE CONTAINER -->
<div class="page-container">

    <!-- START PAGE SIDEBAR -->
    <div class="page-sidebar">
        <ul class="x-navigation">
            <li class="xn-logo">
                <a href="">Admin</a>
                <a href="#" class="x-navigation-control"></a>
            </li>
            <li class="xn-profile">
                <a href="#" class="profile-mini">
                    <img src="<?php echo base_url('public/img/user/user.jpg'); ?>" alt="John Doe"/>
                </a>
                <div class="profile">
                    <div class="profile-image">
                        <img src="<?php echo base_url('public/img/user/user.jpg'); ?>" alt="John Doe"/>
                    </div>
                    <div class="profile-data">
                        <div class="profile-data-name">  <?php echo $this->session->userdata('fname'). ' ' . $this->session->userdata('lname');?></div>
                    </div>
                </div>
            </li>

            <li class="">
                <a href="Dashboard"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
            </li>
            <li class="xn-openable">
                <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Posts</span></a>
                <ul>
                    <li><a href="<?php echo base_url('index.php/Pending'); ?>"><span class="fa fa-image"></span>Pending Posts</a></li>
                    <li><a href="<?php echo base_url('index.php/Approved'); ?>"><span class="fa fa-user"></span>Approved</a></li>
                    <li><a href="<?php echo base_url('index.php/Draft'); ?>"><span class="fa fa-users"></span>Draft</a></li>
                </ul>
            </li>
            <?php
            $ulevel = $this->session->userdata('userlevel');
            if ($ulevel==1) {
                ?>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Users</span></a>
                    <ul>
                        <li><a href="<?php echo base_url('index.php/Users'); ?>"><span class="fa fa-image"></span>System Users</a></li>

                    </ul>
                </li>
            <?php } ?>

        </ul>
    </div>
    <!-- END PAGE SIDEBAR -->

    <!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        <?php include "layouts/x-nav.php";  ?>
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Pages</a></li>
            <li class="active">Profile</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">

            <div class="row">
                <div class="col-md-3">

                    <div class="alert alert-success" id="success-alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <center><h3>Success!</h3>
                           This account active again <br><a href="">Undo changes?</a></center>
                    </div>

                    <div class="alert alert-danger" id="delete-alert">
                        <center> <strong><h3>Deleted</h3></strong> You have been Deleted this account</center>
                    </div>

                    <div class="alert alert-info" id="draft-info">
                        <center> <strong><h3>Suspended</h3></strong> You have been suspended this account<br><a href="">Undo changes?</a></center>
                    </div>

                    <?php

                    $count=0;

                        $rows = 0;
                    foreach ($profile as $res){
                        $rows++;
                    }
                        foreach ($profile as $res){

                            if($count==0){

                            ?>
                            <div class="panel panel-default">
                                <div class="panel-body profile" style="background-color:#a7adb5;">
                                    <div class="profile-image">
                                        <img src="<?php echo base_url('public/'.$res->picture); ?>" alt="Nadia Ali"/>
                                    </div>
                                    <div class="profile-data">
                                        <div class="profile-data-name"><?php echo $res->name . " ". $res->lastname; ?></div>
                                        <div class="profile-data-title" style="color: #FFF;"><?php echo $res->email; ?></div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <button class="btn btn-info btn-rounded btn-block delete" id="<?php echo $res->postedby; ?>"><span class="fa fa-check"></span> Delete</button>
                                        </div>

                                        <div class="col-md-4">
                                            <?php

                                            if($res->profilestatus == 1) {
                                                echo "<span class='label label-success label-form'>Active Profile</span>";
                                            }else {
                                                echo "<span class='label label-warning label-form'>Suspended Profile</span>";
                                            }
                                            ?>
                                        </div>

                                        <?php
                                        if($res->profilestatus == 1) {
                                            echo "<div class='col-md-4'>
                                    <button class='btn btn-primary btn-rounded btn-block suspend' id='" . $res->postedby . "'><span class='fa fa-comments'></span> Suspend</button>
                                </div>";

                                        }else {
                                            echo "<div class='col-md-4'>
                                    <button class='btn btn-warning btn-rounded btn-block setactive' id='" . $res->postedby . "'><span class='fa fa-comments'></span> Active</button>
                                </div>";
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div class="panel-body list-group border-bottom">

                                    <a href="#" class="list-group-item reports" id="<?php echo $res->postedby; ?>"><span class="fa fa-coffee"></span> Profile Reports <span class="badge badge-default">18</span></a>
                                    <a href="#" class="list-group-item posts" id="<?php echo $res->postedby; ?>"><span class="fa fa-users"></span> Posts <span class="badge badge-danger"><?php echo $rows; ?></span></a>
                                    <a href="#" class="list-group-item donations" id="<?php echo $res->postedby; ?>"><span class="fa fa-users"></span> Donations <span class="badge badge-danger">7</span></a>
                                    <a href="#" class="list-group-item settings" id="<?php echo $res->postedby; ?>"><span class="fa fa-cog"></span> Settings</a>
                                </div>
                            </div>
                        <?php }

                        $count++;

                    }

                    ?>

                </div>

                <div class="col-md-9">

                    <!-- START TIMELINE -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Profile Posts</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th>Posted Date</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                foreach ($profile as $res) {
                                    if ($res->status==1){
                                        $token="/read";
                                    }else{
                                        $token= NULL;
                                    }
                                echo "<tr>
                                    <td>$res->posteddate</td>
                                  
                                    <td><a href=".base_url()."index.php/Post/read/$res->id$token>$res->needs</a></td>";

                                     if ($res->status==1){
                                        echo "<td><span class=\"label label-success label-form\">Approved</span></td> ";
                                    }else if ($res->status==0){
                                         echo "<td><span class=\"label label-warning label-form\">Pending</span></td> ";
                                    }else{
                                         echo "<td><span class=\"label label-danger label-form\">Drafted</span></td> ";
                                     }
                                 echo "   
                                  
                                </tr>";
                                 } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END TIMELINE -->

                </div>

            </div>

        </div>
        <!-- END PAGE CONTENT WRAPPER -->
        <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php include "templates/footer.php"; ?>

    <script>


        $(document).ready(function () {

            $("#success-alert").hide();
            $("#delete-alert").hide();
            $("#draft-info").hide();

            $('button.delete').click(function () {

                var accid = this.id;

                alertify.confirm("You want to delete this account?", function (e) {
                    if (e) {

                        $.ajax({

                            type:'get',
                            url:"<?php echo site_url(); ?>/Profile/deleteProfile",
                            dataType: 'json',
                            data: {accid: accid},
                            success:function (data) {

                                if(data) {
                                    $("#delete-alert").alert();
                                    $("#delete-alert").fadeTo(2000, 500).slideUp(500, function () {

                                        $("#delete-alert").slideUp(500);
                                    });



                                    /*  $("table#pendingtable").html("");
                                     $("table#pendingtable").html("<center><h2>No Pending posts available</h2></center>");
                                     }*/

                                }
                            }
                        })


                    } else {

                    }
                });

            })

            $('button.suspend').click(function () {

                var accid = this.id;
                console.log(accid);
                alertify.confirm("You want to suspend this account ?", function (e) {
                    if (e) {

                        $.ajax({

                            type:'get',
                            url:"<?php echo site_url(); ?>/Profile/suspend",
                            dataType: 'json',
                            data: {accid: accid},
                            success:function (data) {

                                if(data) {
                                    $("#draft-info").alert();
                                    $("#draft-info").fadeTo(2000, 500).slideUp(500, function () {

                                        $("#draft-info").slideUp(500);
                                    });
                                    setTimeout(location.reload.bind(location), 3000);


                                    /*  $("table#pendingtable").html("");
                                     $("table#pendingtable").html("<center><h2>No Pending posts available</h2></center>");
                                     }*/

                                }
                            }
                        })

                    } else {
                        // user clicked "cancel"
                    }
                });



            })


            $('button.setactive').click(function () {

                var accid = this.id;

                alertify.confirm("This account will be activated again?", function (e) {
                    if (e) {


                        $.ajax({

                            type:'get',
                            url:"<?php echo site_url(); ?>/Profile/setActive",
                            dataType: 'json',
                            data: {accid: accid},
                            success:function (data) {

                                if(data) {
                                    $("#success-alert").alert();
                                    $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {

                                        $("#success-alert").slideUp(500);
                                    });
                                    setTimeout(location.reload.bind(location), 3000);


                                    /*  $("table#pendingtable").html("");
                                     $("table#pendingtable").html("<center><h2>No Pending posts available</h2></center>");
                                     }*/

                                }
                            }
                        })


                    } else {
                        // user clicked "cancel"
                    }
                });

            })

        })

    </script>




