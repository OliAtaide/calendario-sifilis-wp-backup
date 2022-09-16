<h2 class="tribe-common-a11y-visual-hide">
    <?php echo esc_html($heading); ?>
</h2>

<?php if (empty($disable_event_search)) : ?>
    <?php $this->template('components/events-bar/search-button'); ?>

    <div class="tribe-events-c-events-bar__search-container" id="tribe-events-search-container" data-js="tribe-events-search-container">
        <?php $this->template('components/events-bar/search'); ?>
    </div>
<?php endif; ?>