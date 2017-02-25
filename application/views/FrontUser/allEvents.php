<!--left side bar-->
<div class="col-sm-3 hidden-xs hidden-sm" style=" position:fixed; margin-top: 10px;">
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
			<div class="panel-body">
                            <p class="lead"><?php echo $this->session->userdata('name');?></p>
                            <p><l class="followercount"></l> Followers, <l class="postcount"></l> Posts</p>
                          </div>
		</div>
	</div>

</div>

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

<!--end of left side bar-->

<?php foreach($events as $event):?>
<div class="container">	

<div class="row">
<div class="row well well-sm col-sm-10 col-sm-offset-1  col-lg-offset-3" style="margin-top: 10px;">
	<div class="col-sm-12" style="margin-top:10px">
		<div>
			<img class="event-list-event-cover" src="<?php echo base_url('img/events/'); ?>event-cover.jpg"/>
			<h2 class="eventlist-cover-day"><span class="event-cover-image-span">29<sup>th</sup>Feb</span></h2>
		</div>
	</div>
	<div class="col-sm-7"  style="margin-top:0px">
		<div class="event-list-event-name">
			<a class="event-list-event-name" href="<?php echo base_url('events/').$event->id;?>"><h3 class=""><?= $event->name; ?></h3></a>
		</div>
		<hr/>
      	<div class="">
			<em>
				Location:
				<?= $event->location; ?>
				</br>
			</em>
			<?= $event->description; ?>
    	</div>
    </div>
</div>
</div>
</div>
<?php endforeach; ?>