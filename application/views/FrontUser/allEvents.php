<?php foreach($events as $event):?>
<div class="container">	

<div class="row">
<div class="col-sm-6 col-sm-offset-3">
	<div class="panel panel-default"  style="margin-top:10px">
		<a href="<?php echo base_url('events/').$event->id;?>"><h3><?= $event->name; ?></h3></a>
      <div class="panel-body">
      	<?= $event->description; ?>
      	<?= $event->location ?>
    </div>
    </div>
</div>
</div>
</div>
<?php endforeach; ?>