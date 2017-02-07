
<!-- START PAGE CONTAINER -->
<div class="page-container">

    <!-- START PAGE SIDEBAR -->
    <div class="page-sidebar">
        <?php include "layouts/page_sidebar.php"; ?>
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
                    foreach ($profile as $res){
                    
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-body profile" style="background-color:#a7adb5;">
                            <div class="profile-image">
                                <img src="<?php echo $res->picture; ?>" alt="Nadia Ali"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo $res->name . " ". $res->lastname; ?></div>
                                <div class="profile-data-title" style="color: #FFF;"><?php echo $res->email; ?></div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-info btn-rounded btn-block delete" id="<?php echo $res->id; ?>"><span class="fa fa-check"></span> Delete</button>
                                </div>

                                <div class="col-md-4">
                                    <?php 
                                    
                                    if($res->profilestatus == 1) 
                                            echo "<span class='label label-success label-form'>Active Profile</span>";
                                    else
                                        echo "<span class='label label-warning label-form'>Suspended Profile</span>";
                                    ?>
                                </div>

                               <?php
                               if($res->profilestatus == 1)
                                echo "<div class='col-md-4'>
                                    <button class='btn btn-primary btn-rounded btn-block suspend' id='". $res->id . "'><span class='fa fa-comments'></span> Suspend</button>
                                </div>";

                               else
                                   echo "<div class='col-md-4'>
                                    <button class='btn btn-warning btn-rounded btn-block setactive' id='". $res->id ."'><span class='fa fa-comments'></span> Active</button>
                                </div>";
                               ?>

                            </div>
                        </div>
                        <div class="panel-body list-group border-bottom">

                            <a href="#" class="list-group-item" id="<?php echo $res->id; ?>"><span class="fa fa-coffee"></span> Profile Reports <span class="badge badge-default">18</span></a>
                            <a href="#" class="list-group-item" id="<?php echo $res->id; ?>"><span class="fa fa-users"></span> Posts <span class="badge badge-danger">+7</span></a>
                            <a href="#" class="list-group-item" id="<?php echo $res->id; ?>"><span class="fa fa-cog"></span> Settings</a>
                        </div>
                    </div>
                    <?php } ?>

                </div>

                <div class="col-md-9">

                    <!-- START TIMELINE -->

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




