<?php

/**
 * View: Top Bar
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events-pro/v2/week/top-bar.php
 *
 * See more documentation about our views templating system.
 *
 * @link https://evnt.is/1aiy
 *
 * @version 5.0.1
 *
 */
?>
<div class="tribe-events-c-top-bar tribe-events-header__top-bar">

	<!-- <?php $this->template('day/top-bar/nav'); ?> -->

	<?php $this->template('components/top-bar/today'); ?>

	<?php $this->template('day/top-bar/datepicker'); ?>

	<?php $this->template('components/top-bar/actions'); ?>

	<?php $this->template('components/events-bar'); ?>

</div>