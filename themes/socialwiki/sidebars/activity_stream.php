<? if ($POD->isAuthenticated()) { ?>
	<? $activity = $POD->getActivityStream(); ?>
	<div class="sidebar padded" id="activity_stream_sidebar">
		<h3>Recent Activity</h3>
		<ul>
			<? $activity->output('output'); ?>
		</ul>
	</div>
<? } ?>