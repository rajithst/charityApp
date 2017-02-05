<div class="container" style="background-color: #c1f1d5">
<?php foreach($events as $event):?>
    <div class="container">
        <div class="row">
            <div class="well well-lg col-lg-12">
                <img src="<?php echo base_url('img/events/'); ?>event-cover.jpg" class="event-cover">
                <h2 class="event-cover-text"><span class="event-cover-image-span"><?= $event->name; ?></span></h2>
                <div class="">
                    <h2 class="event-cover-place"><span class="event-cover-image-span">@<?= $event->location ?></span></h2>
                    <h2 class="event-cover-day"><span class="event-cover-image-span">29<sup>th</sup>Feb</span></h2>
                    <h2 class="event-cover-time"><span class="event-cover-image-span">11.00 AM</span></h2>
                </div>
            </div>
            <div class="row well well-sm">
                <div class="hostname col-lg-6">
                    Hosted By : <a href=""><b><?= $event->hosted_by; ?></b></a>
                </div>
                <div class="event-rsvp col-lg-6">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-info">RSVP</button>
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Interest</a></li>
                            <li><a href="#">Going</a></li>
                            <li><a href="#">Decline</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Follow the Hoster</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row well well-lg">
                <div id="add-post" class="col-lg-6 col-sm-12 col-md-12 pull-left row well well-lg">
                    <form class="form-horizontal" role="form">
                        <h4>Add Post</h4>
                        <div class="form-group" style="padding:14px;">
                            <textarea class="form-control" placeholder="Update your status" id="post_txt"></textarea>
                        </div>
                        <button class="btn btn-primary pull-right" type="button">Post</button><ul class="list-inline"><li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li><li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
                    </form>
                </div>
                <div id="event-desc" class="col-lg-6 col-sm-12 col-md-12 pull-right row well well-sm">
                    <h4>Event Description</h4>
                    <p><?= $event->description; ?></p>
                </div>
            </div>
            <div id="posts" class="row well well-lg">
                <h2>Posts</h2>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>





<script type="text/javascript">
    $(document).ready(function(){
        $('.status').click(function() { $('.arrow').css("left", 0);});
        $('.photos').click(function() { $('.arrow').css("left", 146);});
    });
</script>