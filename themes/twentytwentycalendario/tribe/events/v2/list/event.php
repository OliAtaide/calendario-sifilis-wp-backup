<?php

/**
 * View: List Event
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/list/event.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 5.0.0
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 *
 * @see tribe_get_event() For the format of the event object.
 */

$container_classes = ['tribe-common-g-row', 'tribe-events-calendar-list__event-row'];
$container_classes['tribe-events-calendar-list__event-row--featured'] = $event->featured;

$event_classes = tribe_get_post_class(['tribe-events-calendar-list__event', 'tribe-common-g-row', 'tribe-common-g-row--gutters'], $event->ID);
?>
<div class="row my-4" <?php tribe_classes($container_classes); ?>>

<?php $this->template('list/event/date-tag', ['event' => $event]); ?>
<div class="col-sm-10">
	<div class="data-mb mb-3 p-3 text-center w-100 d-sm-none">
		<span>
			<b>
				<?php $this->template('list/event/date', ['event' => $event]); ?>
			</b>
		</span>
	</div>

	<div class="card d-flex flex-column px-sm-4 py-2 event_card">
		<div class="row g-0">
			<div class="col-md-10">
				<div class="card-body">
					<h3 class="card-title">
						<b>
							<?php $this->template('list/event/title', ['event' => $event]); ?>
						</b>
					</h3>
					<div class="card-text">
						<?php $this->template('list/event/description', ['event' => $event]); ?>
					</div>
					<a href="<?php echo esc_url( $event->permalink ); ?>">Ler mais >></a>
				</div>
			</div>
			<div class="col-md-2">
				<?php $this->template('list/event/featured-image', ['event' => $event]); ?>
			</div>
		</div>
	</div>
</div>

</div>