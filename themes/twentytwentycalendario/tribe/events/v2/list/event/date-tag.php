<?php

/**
 * View: List View - Single Event Date Tag
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/list/event/date-tag.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 5.0.0
 *
 * @var WP_Post            $event        The event post object with properties added by the `tribe_get_event` function.
 * @var \DateTimeInterface $request_date The request date object. This will be "today" if the user did not input any
 *                                       date, or the user input date.
 * @var bool               $is_past      Whether the current display mode is "past" or not.
 *
 * @see tribe_get_event() For the format of the event object.
 */

use Tribe__Date_Utils as Dates;

/*
 * If the request date is after the event start date, show the request date to avoid users from seeing dates "in the
 * past" in relation to the date they requested (or today's date).
 */

$display_date = empty($is_past) && !empty($request_date)
	? max($event->dates->start_display, $request_date)
	: $event->dates->start_display;

$event_month     = $event->dates->start_display->format_i18n('M');
$event_day_num   = $event->dates->start_display->format_i18n('j');
$event_year      = $event->dates->start_display->format_i18n('Y');
$event_date_attr = $event->dates->start_display->format(Dates::DBDATEFORMAT);
?>
<div class="col-2 d-sm-flex d-none">
	<time class="data p-1 rounded-circle text-center" datetime="<?php echo esc_attr($event_date_attr); ?>" aria-hidden="true">
		<span class="mes">
			<?php echo esc_html($event_month); ?>
		</span>
		<br>
		<span class="dia">
			<strong>
				<?php echo esc_html($event_day_num); ?>
			</strong>
		</span>
		<br>
		<span class="ano">
			<?php echo esc_html($event_year); ?>
		</span>
	</time>
</div>