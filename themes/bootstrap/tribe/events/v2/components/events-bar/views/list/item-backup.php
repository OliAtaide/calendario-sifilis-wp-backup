$list_item_classes = ['tribe-events-c-view-selector__list-item', "tribe-events-c-view-selector__list-item--$public_view_slug"];
if ($view_slug === $public_view_slug) {
	$list_item_classes[] = 'tribe-events-c-view-selector__list-item--active';
	
}
?>
<!-- <li class="<?php echo esc_attr(implode(' ', $list_item_classes)); ?>">
	<a href="<?php echo esc_url($public_view_data->view_url); ?>" class="tribe-events-c-view-selector__list-item-link" data-js="tribe-events-view-link">
		<span class="tribe-events-c-view-selector__list-item-icon">
			<?php $this->template('components/icons/' . esc_attr($public_view_slug), ['classes' => ['tribe-events-c-view-selector__list-item-icon-svg']]); ?>
		</span>
		<span class="tribe-events-c-view-selector__list-item-text">
			<?php echo esc_html($public_view_data->view_label); ?>
		</span>
	</a>
</li> -->