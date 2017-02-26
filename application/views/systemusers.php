
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
                <li class="xn-openable active">
                    <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Users</span></a>
                    <ul>
                        <li class="active"><a href="<?php echo base_url('index.php/Users'); ?>"><span class="fa fa-image"></span>System Users</a></li>

                    </ul>
                </li>
            <?php } ?>

        </ul>
    </div>
    <!-- END PAGE SIDEBAR -->

    <!-- PAGE CONTENT -->
    <div class="page-content" style="height: 945px;">

        <!-- START X-NAVIGATION VERTICAL -->
        <ul class="x-navigation x-navigation-horizontal x-navigation-panel">

            <li class="xn-icon-button pull-right">
                <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
            </li>
            <!-- END SIGN OUT -->

        </ul>
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Users</a></li>
            <li><a href="#">System Users</a></li>

        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">

            <div class="row">
                <div class="col-md-12">
                    <?php
                    if (isset($succ)){
                        echo $succ;
                    }
                    ?>

                    <form class="form-horizontal"  method="post" action="<?php echo base_url('index.php/Users/addUser'); ?>">
                        <div class="panel panel-default">
                            <div class="panel-heading ui-draggable-handle">
                                <h3 class="panel-title"><strong>Add new User</strong></h3>
                            </div>
                            <div class="panel-body">

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">First Name</label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control"  name="firstname">
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Last Name</label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control" name="lastname">
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">UserName</label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control" name="username">
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">E mail</label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control" name="email">
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Password</label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control" name="password">
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Select</label>
                                    <div class="col-md-6 col-xs-12">
                                        <select class="form-control select" name="role">
                                            <option value="1">Administrator</option>
                                            <option value="0">Normal User</option>

                                        </select>

                                    </div>
                                </div>


                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-default" type="reset">Clear Form</button>
                                <button class="btn btn-primary pull-right add" type="submit" >Add User</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <!-- START DEFAULT DATATABLE -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Users</h3>
                        </div>
                        <div class="panel-body" id="pendingtable">


                            <table class="table datatable" >
                                <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Role</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody id="tbody">
                                <?php
                                foreach ($log as $res){
                                ?>
                                    <tr>
                                        <td><?php echo $res->first_name; ?></td>
                                        <td><?php echo $res->last_name; ?></td>
                                        <?php
                                        if ($res->userlevel ==1) {
                                            echo "<td><span class=\"label label-success label-form\">Administrator</span></td>
                                                  <td><button class='btn btn-warning'>change to normal user</button> &nbsp; <button class='btn btn-danger'>Remove</button></td>";
                                        }else{

                                            echo "<td><span class=\"label label-info label-form\">Normal User</span></td>
                                                  <td><button class='btn btn-warning'>change to Administrator</button> &nbsp; <button class='btn btn-danger'>Remove</button></td>";
                                        }
                                        ?>



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
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php include "templates/footer.php"; ?>
<script>
    $(document).ready(function () {

        $("#success-alert").alert();
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {

            $("#delete-alert").slideUp(500);
        });

        });
</script>





