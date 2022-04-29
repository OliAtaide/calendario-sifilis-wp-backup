<?php

/**
 * View: Events Bar Views List
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/components/events-bar/views/list.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 5.0.0
 *
 * @var array $public_views Array of data of the public views, with the slug as the key.
 */
?>


<div class="dropdown alternar ">
	<button class="btn btn-secondary dropdown-toggle fw-bold" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
		
	</button>
	<ul class="dropdown-menu flex-column" aria-labelledby="dropdownMenuButton1">
		<?php foreach ($public_views as $public_view_slug => $public_view_data) : ?>
			<?php $this->template(
				'components/events-bar/views/list/item',
				['public_view_slug' => $public_view_slug, 'public_view_data' => $public_view_data]
			); ?>
		<?php endforeach; ?>
	</ul>
</div>