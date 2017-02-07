<!--left side bar-->
<div class="col-sm-3" style=" position:fixed; margin-top: 10px;">
	<div class="panel panel-default">
		<div class="panel-thumbnail"><img src="" class="profilepic img-responsive" width="80px"></div>
		<div class="panel-body">
			<p class="lead"><?php echo $this->session->userdata('name');?></p>
			<p><l id="followercount"></l> Followers, 13 Posts</p>

			<p>
				<img src="https://lh3.googleusercontent.com/uFp_tsTJboUY7kue5XAsGA=s28" width="28px" height="28px">
			</p>
		</div>
	</div>

</div>


<!--end of left side bar-->

<?php foreach($events as $event):?>
<div class="container">	

<div class="row">
<div class="row well well-sm col-sm-6 col-sm-offset-3" style="margin-top: 10px;">
	<div class="col-sm-5" style="margin-top:10px">
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