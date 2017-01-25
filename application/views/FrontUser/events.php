<div class="container">
<h1>events</h1>

<?php foreach($events as $event):?>

			
				event name
				
				<?= $event->name; ?>
				<br/>

				description

				<?= $event->description; ?>
				<br/>
				hosted by

				<?= $event->hosted_by; ?>
				<br/>
				location
				<?= $event->location ?>





				

<?php endforeach; ?>

</div>