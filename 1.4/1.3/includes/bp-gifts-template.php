<?php

/**
 * In this file you should define template tag functions that end users can add to their template
 * files.
 *
 * It's a general practice in WordPress that template tag functions have two versions, one that
 * returns the requested value, and one that echoes the value of the first function. The naming
 * convention is usually something like 'bp_gifts_get_item_name()' for the function that returns
 * the value, and 'bp_gifts_item_name()' for the function that echoes.
 */

/**
 * If you want to go a step further, you can create your own custom WordPress loop for your component.
 * By doing this you could output a number of items within a loop, just as you would output a number
 * of blog posts within a standard WordPress loop.
 *
 * The gifts template class below would allow you do the following in the template file:
 *
 * 	<?php if ( bp_get_gifts_has_items() ) : ?>
 *
 *		<?php while ( bp_get_gifts_items() ) : bp_get_gifts_the_item(); ?>
 *
 *			<p><?php bp_get_gifts_item_name() ?></p>
 *
 *		<?php endwhile; ?>
 *
 *	<?php else : ?>
 *
 *		<p class="error">No items!</p>
 *
 *	<?php endif; ?>
 *
 * Obviously, you'd want to be more specific than the word 'item'.
 *
 * In our gifts here, we've used a custom post type for storing and fetching our content. Though
 * the custom post type method is recommended, you can also create custom database tables for this
 * purpose. See bp-gifts-classes.php for more details.
 *
 */
 
 function bp_gifts_has_items( $args = '' ) {
	global $bp, $items_template;

	// This keeps us from firing the query more than once
	if ( empty( $items_template ) ) {
		/***
		 * This function should accept arguments passes as a string, just the same
		 * way a 'query_posts()' call accepts parameters.
		 * At a minimum you should accept 'per_page' and 'max' parameters to determine
		 * the number of items to show per page, and the total number to return.
		 *
		 * e.g. bp_get_gifts_has_items( 'per_page=10&max=50' );
		 */

		/***
		 * Set the defaults for the parameters you are accepting via the "bp_get_gifts_has_items()"
		 * function call
		 */
		$defaults = array(
			'high_fiver_id' => 0,
			'recipient_id'  => 0,
			'per_page'      => 10,
			'paged'		=> 1
		);

		/***
		 * This function will extract all the parameters passed in the string, and turn them into
		 * proper variables you can use in the code - $per_page, $max
		 */
		$r = wp_parse_args( $args, $defaults );
		extract( $r, EXTR_SKIP );

		$items_template = new BP_Gifts_Highfive();
		$items_template->get( $r );
	}

	return $items_template->have_posts();
}


function bp_gifts_pagination_count() {
	echo bp_gifts_get_pagination_count();
}
	/**
	 * Return "Viewing x of y pages"
	 *
	 * @package BuddyPress_Skeleton_Component
	 * @since 1.6
	 */
	function bp_gifts_get_pagination_count() {
		global $items_template;

		$pagination_count = sprintf( __( 'Viewing page %1$s of %2$s', 'bp-gifts' ), $items_template->query->query_vars['paged'], $items_template->query->max_num_pages );

		return apply_filters( 'bp_gifts_get_pagination_count', $pagination_count );
	}

/**
 * Echo pagination links
 *
 * @package BuddyPress_Skeleton_Component
 * @since 1.6
 */
function bp_gifts_item_pagination() {
	echo bp_gifts_get_item_pagination();
}
	/**
	 * return pagination links
	 *
	 * @package BuddyPress_Skeleton_Component
	 * @since 1.6
	 */
	function bp_gifts_get_item_pagination() {
		global $items_template;
		return apply_filters( 'bp_gifts_get_item_pagination', $items_template->pag_links );
	}

/**
 * Echo the high-fiver avatar (post author)
 *
 * @package BuddyPress_Skeleton_Component
 * @since 1.6
 */

?>