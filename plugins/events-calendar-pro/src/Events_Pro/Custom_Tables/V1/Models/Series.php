<?php
/**
 * The Series validation and format schema.
 *
 * @since   6.0.0
 *
 * @package TEC\Events\Custom_Tables\V1\Models
 */

namespace TEC\Events_Pro\Custom_Tables\V1\Models;

use TEC\Events\Custom_Tables\V1\Models\Post_Model;
use TEC\Events_Pro\Custom_Tables\V1\Series\Autogenerated_Series;
use TEC\Events_Pro\Custom_Tables\V1\Series\Post_Type as Series_Post_Type;
use TEC\Events_Pro\Custom_Tables\V1\Tables\Series_Relationships;
use WP_Error;
use WP_Post;
use function get_post;
use function update_post_meta;
use function wp_insert_post;

/**
 * Class Series
 *
 * @since   6.0.0
 *
 * @package TEC\Events\Custom_Tables\V1\Models
 */
class Series implements Post_Model {
	/**
	 * The default post status Series posts created by the class will have.
	 *
	 * @since 6.0.0
	 *
	 * @var string
	 */
	private static $default_status = 'publish';

	/**
	 * The Series post type name.
	 *
	 * @since 6.0.0
	 *
	 * @var string
	 */
	private static $post_type_name = 'tribe_event_series';

	/**
	 * Checks if we should tie this Series to the Event post status.
	 *
	 * @param WP_Post $post A reference to the Series post object.
	 * @param array<string,mixed> $create_overrides A map of values that should be used to override
	 *                                                the defaults the Series would be generated with.
	 *
	 * @return bool Whether the Series post status should be set to the updated Event
	 *              one or not.
	 * @since 6.0.0
	 *
	 */
	public static function should_sync_post_status( WP_Post $post, array $create_overrides ) {
		if ( self::$post_type_name !== $post->post_type ) {
			// Let's make sure we're acting on a Series post.
			return false;
		}

		if ( $create_overrides['post_status'] === $post->post_status ) {
			// Nothing to do here.
			return false;
		}

		if ( ! get_post_meta( $post->ID, Autogenerated_Series::FLAG_META_KEY, true ) ) {
			// Don't sync manually controlled Series.
			return false;
		}

		// Update the Series status to the Event one only if this is the only Event related to the Series.
		$count = Series_Relationship::where( 'series_post_id', '=', $post->ID )->count();

		return $count <= 1;
	}

	/**
	 * {@inheritDoc}
	 */
	public static function vinsert( $posts, array $create_overrides = [] ) {
		$return = [];
		foreach ( (array) $posts as $candidate ) {
			$series_post = null;
			// Existing series?
			if ( ! empty( $candidate['id'] ) ) {
				$series_post = get_post( $candidate['id'] );
				if ( $series_post instanceof WP_Post && self::$post_type_name === $series_post->post_type ) {
					if ( self::$post_type_name !== $series_post->post_type ) {
						$return[] = 0;
						continue;
					}

					$return[] = $series_post->ID;

					// This update should not trigger the removal of the auto-generated flag.
					add_filter(
						'tec_events_custom_tables_v1_remove_series_autogenerated_flag',
						self::do_not_remove_autogenerated_flag( $series_post->ID ),
						10,
						2
					);
					// If auto generated series and this is the only Event, sync the post status changes.
					if ( self::should_sync_post_status( $series_post, $create_overrides ) ) {
						wp_update_post( [
							'ID'          => $series_post->ID,
							'post_status' => $create_overrides['post_status']
						] );
					}
				}
			}

			// Found our series, don't need to create.
			if ( $series_post ) {
				continue;
			}

			// Never allow the post type to be different from the Series one.
			unset( $create_overrides['post_type'] );

			// New Series, create it now.
			$post_status = isset( $create_overrides['post_status'] ) ?
				$create_overrides['post_status']
				: self::$default_status;

			$series_id = wp_insert_post( wp_parse_args( $create_overrides, [
				'post_type'   => Series_Post_Type::POSTTYPE,
				'post_title'  => (string) $candidate['title'],
				'post_status' => $post_status,
			] ) );

			if ( $series_id instanceof WP_Error ) {
				$return[] = 0;
			}

			update_post_meta( $series_id, Autogenerated_Series::FLAG_META_KEY, 1 );
			// New, auto-generated series, should show the title.
			update_post_meta( $series_id, '_tec-series-show-title', true );

			$return[] = (int) $series_id;
		}

		return is_array( $posts ) ? $return : array_pop( $return );
	}

	/**
	 * Returns a closure that will hook in the autogenerated flag removal logic and will prevent
	 * its removal once, taking core of removing itself from the filter on application.
	 *
	 * @since 6.0.0
	 *
	 * @param int $series_id The ID of the Series post we're preventing the removal of the
	 *                       autogenerated flag for.
	 *
	 * @return \Closure A closure that will prevent the removal of the auto-generated flag
	 *                       for the specified Series post ID and will remove itself from the filter.
	 */
	private static function do_not_remove_autogenerated_flag( $series_id ) {
		// A closure that will prevent the removal of the auto-generated flag and will remove itself.
		$do_not_remove = static function ( $remove, WP_Post $post ) use ( $series_id, &$do_not_remove ) {
			if ( $series_id !== $post->ID ) {
				return $remove;
			}

			remove_filter( 'tec_events_custom_tables_v1_remove_series_autogenerated_flag', $do_not_remove );

			return false;
		};

		return $do_not_remove;
	}
}