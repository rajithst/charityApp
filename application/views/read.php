
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
        <ul class="breadcrumb push-down-0">
            <li><a href="#">Home</a></li>
            <li><a href="#">Posts</a></li>
            <li><a href="#">Read</a></li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- START CONTENT FRAME -->
        <div class="content-frame">
            <!-- START CONTENT FRAME TOP -->
            <div class="content-frame-top">
                <div class="page-title">
                    <h2><span class="fa fa-file-text"></span> Posts</h2>
                </div>


            </div>


            <!-- END CONTENT FRAME TOP -->

            <!-- START CONTENT FRAME LEFT -->
            <div class="content-frame-left">
                <div class="block">

                    <?php
                    foreach ($read as $res) {
                        $id = $res->id;
                    }



                    if (isset($msg)){ ?>
                        <a href="" class="btn btn-success btn-block btn-lg"><span class="fa fa-edit"></span> Published</a>
                  <?php  } else { ?>
                    <a href="<?php echo base_url('index.php/Posts/publishPost/'.$id); ?>" class="btn btn-info btn-block btn-lg"><span class="fa fa-edit"></span> Publish</a>
                    <?php } ?>
                </div>
                <div class="block">
                    <div class="list-group border-bottom">
                        <a href="#" class="list-group-item"><span class="fa fa-inbox"></span> See Other posts <span class="badge badge-success">3</span></a>
                        <a href="#" class="list-group-item"><span class="fa fa-star"></span> Delete </a>
                        <a href="#" class="list-group-item"><span class="fa fa-rocket"></span> Draft</a>
                    </div>
                </div>
            </div>
            <!-- END CONTENT FRAME LEFT -->

            <!-- START CONTENT FRAME BODY -->
            <div class="content-frame-body">
                <?php
                foreach ($read as $res) {


                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <?php

                        if (isset($msg)){

                            echo $msg;
                        }
                        ?>
                        <div class="pull-left">
                            <img src="<?php echo $res->picture; ?>" class="panel-title-image" alt="John Doe"/>
                            <h3 class="panel-title"><a href=""><?php echo $res->name; ?></a> <small><?php echo $res->email; ?></small></h3>
                        </div>
                    </div>
                    <div class="panel-body">
                        <h3><?php echo $res->needs; ?> <small class="pull-right text-muted"><span class="fa fa-clock-o"></span> <?php echo $res->posteddate; ?></small></h3>
                        <p>Hello Dmitry,</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ligula risus, viverra sit amet purus id, ullamcorper venenatis leo. Ut vitae semper neque. Nunc vel lacus vel erat sodales ultricies sed sed massa. Duis non elementum velit. Nunc quis molestie dui. Nullam ullamcorper lectus in mattis volutpat. Nunc egestas felis sit amet ultrices euismod. Donec lacinia neque vel quam pharetra, non dignissim arcu semper. Donec ultricies, neque ut vehicula ultrices, ligula velit sodales purus, eget eleifend libero risus sed turpis. Fusce hendrerit vel dui ut pulvinar. Ut sed tristique ante, sed egestas turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <p>Fusce sit amet dui at nunc laoreet facilisis. Proin consequat orci sollicitudin sem cursus, quis vehicula eros ultrices. Cras fermentum justo at nibh tincidunt, consectetur elementum est aliquam.</p>
                        <p>Nam dignissim convallis nulla, vitae porta purus fringilla ac. Praesent consectetur ex eu dui efficitur sollicitudin. Mauris libero est, aliquam a diam maximus, dignissim laoreet lacus.</p>
                        <p>Nulla ac nisi sodales, auctor dui et, consequat turpis. Cras dolor turpis, sagittis vel elit in, varius elementum arcu. Mauris aliquet lorem ac enim blandit, nec consequat tortor auctor. Sed eget nunc at justo congue mollis eget a urna. Phasellus in mauris quis tortor porta tristique at a risus.</p>
                        <p class="text-muted"><strong>Best Regards<br/>John Doe</strong></p>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-success pull-right"><span class="fa fa-mail-reply"></span> Post Reply</button>
                    </div>
                </div>
                <?php } ?>
            </div>
            <!-- END CONTENT FRAME BODY -->
        </div>
        <!-- END CONTENT FRAME -->
        <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php include "templates/footer.php"; ?>


    <script>


        $(document).ready(function () {

               /* $("#success-alert").alert();
                $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {

                    $("#success-alert").slideUp(500);
                });*/
        });

    </script>


