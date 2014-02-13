<?php



/*
Plugin Name: Buddypress Gifts Latest 2014
Plugin URI: http://wordpress.org/extend/plugins/buddypress-gifts-latest-2014/
Description: Third life of popular Gifts component for buddypress.
Version: 1.1
Revision Date: 07 01, 2014
Requires at least: WP 3.3.1, BuddyPress 1.5.1
Tested up to: WP 3.8.1, BuddyPress 1.9
License: GNU General Public License 2.0 (GPL) http://www.gnu.org/licenses/gpl.html
Author: Amreeta Ray
Author URI: http://urseo.com/
Site Wide Only: false
*/

/*************************************************************************************************************/
/*
define ( 'BP_GIFTS_IS_INSTALLED', 1 ); 
define ( 'BP_GIFTS_VERSION', '1.9' );
define ( 'BP_GIFTS_DB_VERSION', '1' );
*/
define ( 'BP_GIFTS_PLUGIN_DIR', dirname( __FILE__ ) );

/* Only load the component if BuddyPress is loaded and initialized. */


function bp_gifts_init() {

	require( dirname( __FILE__ ) . '/includes/bp-gifts-core.php' );
	if ( version_compare( BP_VERSION, '1.3', '>' ) )
		require( dirname( __FILE__ ) . '/includes/bp-gifts-loader.php' );

}


//add_action( 'bp_init', 'bp_gifts_init' );
add_action( 'bp_include', 'bp_gifts_init' );


/* Put setup procedures to be run when the plugin is activated in the following function */

function bp_gifts_activate() {

	global $wpdb;

	if ( !empty($wpdb->charset) )

		$charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";

	$sql[] = "CREATE TABLE {$wpdb->base_prefix}bp_gifts (

		  		id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				gift_name varchar(100) NOT NULL,
				gift_image varchar(100) NOT NULL,
				category varchar(100) NOT NULL DEFAULT 'gift',
				point bigint(20) NOT NULL DEFAULT '0',
			    KEY gift_name (gift_name),
				KEY category (category)
		 	   ) {$charset_collate};";


	require_once( ABSPATH . 'wp-admin/upgrade-functions.php' );


	/**
	* The dbDelta call is commented out so the example table is not installed.
	* Once you define the SQL for your new table, uncomment this line to install
	* the table. (Make sure you increment the BP_EXAMPLE_DB_VERSION constant though).
	*/



	dbDelta($sql);

	/* insert gift images to table - place your image in images folder and remove default image if want */

	if (get_site_option('bp-gifts-db-version') == '') { // if first install load image to gifts table

	if ($handle = opendir( dirname( __FILE__ ) . '/includes/images/') ) {

	    while (false !== ($imagefile = readdir($handle))) {

		if (imagefile != 'admin' && imagefile != '' && $imagefile != '.' && imagefile != '..') {

			$imagename = explode(".", $imagefile);

	if ( $imagename[0] != 'admin' && $imagename[0] != '' ){

        		$insert = $wpdb->prepare( "INSERT INTO " . $wpdb->base_prefix . "bp_gifts ( gift_name, gift_image ) VALUES ( %s, %s )", $imagename[0], $imagefile );

		$results = $wpdb->query( $insert );

	}

		}

        	    }

    	}

    	closedir($handle);

	}


	update_site_option( 'bp-gifts-db-version', BP_GIFTS_DB_VERSION );

}

register_activation_hook( __FILE__, 'bp_gifts_activate' );

/* On deacativation, clean up anything your component has added. */

function bp_gifts_deactivate() {

	/* You might want to delete any options or tables that your component created. */


}

register_deactivation_hook( __FILE__, 'bp_gifts_deactivate' );


?>