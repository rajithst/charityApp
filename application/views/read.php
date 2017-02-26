
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
                        <a href="#" class="list-group-item"><span class="fa fa-inbox"></span> See Other posts</a>
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
                            <img src="<?php echo base_url('public/'.$res->picture); ?>" class="panel-title-image" alt="John Doe"/>
                            <h3 class="panel-title"><a href=""><?php echo $res->name; ?></a> <small><?php echo $res->email; ?></small></h3>
                        </div>
                    </div>
                    <div class="panel-body">



                        <div class="page-content-wrap">

                            <div class="row">
                                <div class="col-md-12">

                                    <form class="form-horizontal">
                                        <div class="panel panel-default">
                                            <div class="panel-body form-group-separated">

                                                <div class="form-group">
                                                    <label class="col-md-3 col-xs-12 control-label">Needs</label>
                                                    <div class="col-md-6 col-xs-12">
                                                        <div class="input-group">
                                                            <?php echo $res->needs; ?>

                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 col-xs-12 control-label">Amount</label>
                                                    <div class="col-md-6 col-xs-12">
                                                        <div class="input-group">

                                                            <?php echo $res->amount; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 col-xs-12 control-label">How Help</label>
                                                    <div class="col-md-6 col-xs-12">
                                                        <div class="input-group">

                                                            <?php echo $res->how_help; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 col-xs-12 control-label">Why help</label>
                                                    <div class="col-md-6 col-xs-12">
                                                        <div class="input-group">
                                                            <?php echo $res->why_help; ?>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-md-3 col-xs-12 control-label">Tags</label>
                                                    <div class="col-md-6 col-xs-12">
                                                        <div class="input-group">
                                                            <?php echo $res->tags; ?>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-md-3 col-xs-12 control-label">Numbe of Children</label>
                                                    <div class="col-md-6 col-xs-12">
                                                        <div class="input-group">
                                                            <?php echo $res->n_of_children; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>

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


