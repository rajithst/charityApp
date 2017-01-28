<!-- START X-NAVIGATION -->
<ul class="x-navigation">
    <li class="xn-logo">
        <a href="index.html">ATLANT</a>
        <a href="#" class="x-navigation-control"></a>
    </li>
    <li class="xn-profile">
        <a href="#" class="profile-mini">
            <img src="assets/images/users/avatar.jpg" alt="John Doe"/>
        </a>
        <div class="profile">
            <div class="profile-image">
                <img src="assets/images/users/avatar.jpg" alt="John Doe"/>
            </div>
            <div class="profile-data">
                <div class="profile-data-name">  <?php echo $this->session->userdata('fname'). ' ' . $this->session->userdata('lname');?></div>
            </div>
        </div>
    </li>
    <li class="xn-title">Navigation</li>
    <li class="active">
        <a href="Dashboard"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
    </li>
    <li class="xn-openable">
        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Posts</span></a>
        <ul>
            <li><a href="<?php echo base_url('index.php/Pending'); ?>"><span class="fa fa-image"></span>Pending Posts</a></li>
            <li><a href="<?php echo base_url('index.php/Approved'); ?>"><span class="fa fa-user"></span>Approved</a></li>
            <li><a href="draftPosts"><span class="fa fa-users"></span>Draft</a></li>
        </ul>
    </li>
    <li class="xn-openable">
        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Users</span></a>
        <ul>
            <li><a href="pendingPosts"><span class="fa fa-image"></span>System Users</a></li>
            <li><a href="approvedPosts"><span class="fa fa-user"></span>Site Users</a></li>

        </ul>
    </li>

</ul>
<!-- END X-NAVIGATION -->