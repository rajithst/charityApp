
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
            <li class="xn-openable active">
                <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Posts</span></a>
                <ul>
                    <li class="active"><a href="<?php echo base_url('index.php/Pending'); ?>"><span class="fa fa-image"></span>Pending Posts</a></li>
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
            <li><a href="#">Tables</a></li>
            <li class="active">Data Tables</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE TITLE -->
        <div class="page-title">
            <h2><span class="fa fa-arrow-circle-o-left"></span>Pending Posts</h2>
        </div>
        <!-- END PAGE TITLE -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">

            <div class="row">
                <div class="col-md-12">

                    <!-- START DEFAULT DATATABLE -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">pending Posts</h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body" id="pendingtable">

                            <div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <center><h3>Success!</h3>
                                 You have been publish post <br><a href="">Undo changes?</a></center>
                            </div>

                            <div class="alert alert-danger" id="delete-alert">
                                <center> <strong><h3>Deleted</h3></strong> You have been Deleted post</center>
                            </div>

                            <div class="alert alert-info" id="draft-info">
                                <center> <strong><h3>Drafted</h3></strong> You have been draft a post <br><a href="">Undo changes?</a></center>
                            </div>

                            <table class="table datatable" >
                                <thead>
                                <tr>
                                    <th>Published By</th>
                                    <th>Post Subject</th>
                                    <th>Published Date</th>
                                    <th>Pending Status</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody id="tbody">

                                <?php
                                foreach ($pending as $res) {


                                ?>
                                <tr>
                                    <td><a href="Profile/view/<?php echo $res->postedby; ?>"><?php echo $res->name . " " . $res->lastname;?></a></td>
                                    <td><a href="Post/read/<?php echo $res->id; ?>"><?php echo $res->needs;?></a></td>
                                    <td><?php echo $res->posteddate;?></td>
                                    <td><span class="label label-success label-form">18 days</span></td>
                                    <td><button type="button" class="btn btn-success btn-rounded publish" id="<?php echo $res->id; ?>">Publish</button> <button type="button" class="btn btn-danger btn-rounded delete" id="<?php echo $res->id; ?>">Delete</button><button type="button" class="btn btn-warning btn-rounded draft" id="<?php echo $res->id; ?>">Add to Draft</button></td>

                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END DEFAULT DATATABLE -->

                    <!-- START SIMPLE DATATABLE -->

                    <!-- END SIMPLE DATATABLE -->

                </div>
            </div>

        </div>
        <!-- PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php include "templates/footer.php"; ?>

<script>


    $(document).ready(function () {

        $("#success-alert").hide();
        $("#delete-alert").hide();
        $("#draft-info").hide();

        $('button.publish').click(function () {

            var postid = this.id;

            alertify.confirm("You want to publish this post?", function (e) {
                if (e) {

                    $.ajax({

                        type:'get',
                        url:"<?php echo site_url(); ?>/Posts/publishPost",
                        dataType: 'json',
                        data: {postid: postid},
                        success:function (data) {

                           if(data) {
                                $("#success-alert").alert();
                                $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {

                                    $("#success-alert").slideUp(500);
                                });
                                //setTimeout(location.reload.bind(location), 3000);

                            }
                        }
                    })


                } else {

                }
            });

        })

        $('button.delete').click(function () {

            var postid = this.id;

            alertify.confirm("You want to delete this post?", function (e) {
                if (e) {

                    $.ajax({

                        type:'get',
                        url:"<?php echo site_url(); ?>/Posts/DeletePost",
                        dataType: 'json',
                        data: {postid: postid},
                        success:function (data) {

                         if(data) {
                                $("#delete-alert").alert();
                                $("#delete-alert").fadeTo(2000, 500).slideUp(500, function () {

                                    $("#delete-alert").slideUp(500);
                                });
                                setTimeout(location.reload.bind(location), 3000);


                            }
                        }
                    })

                } else {

                }
            });



        })


        $('button.draft').click(function () {

            var postid = this.id;

            alertify.confirm("This post will be added to draft?", function (e) {
                if (e) {


                    $.ajax({

                        type:'get',
                        url:"<?php echo site_url(); ?>/Posts/DraftPost",
                        dataType: 'json',
                        data: {postid: postid},
                        success:function (data) {

                            if(data) {
                                $("#draft-info").alert();
                                $("#draft-info").fadeTo(2000, 500).slideUp(500, function () {

                                    $("#draft-info").slideUp(500);
                                });
                                setTimeout(location.reload.bind(location), 3000);


                            }
                        }
                    })


                } else {

                }
            });

        })


    })
</script>




