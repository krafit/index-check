<?php
/**
 * Plugin Name: Index Check
 * Description: Displays a warning in the admin bar, if search engines are discouraged.
 * Author: Simon Kraft
 * Author URI: https://simonkraft.de
 * Version: 0.2
 * Text Domain: index-check
 **/


/**
 * Check if website is visible to search engines
 */
	function krafit_index_check() {
		if ( '0' == get_option( 'blog_public' ) ) {
			
			add_action( 'admin_bar_menu', function( \WP_Admin_Bar $bar ) {
				$bar->add_menu( array(
					'id'     => 'index-check',
					'title'  => '<span class="ab-icon"></span>'.__( 'Search Engines discouraged', 'index-check' ),
					'href'   => esc_url( admin_url( 'options-reading.php' ) ),
				) );
			}, 210 );

		}
	}

	add_action( 'admin_init', 'krafit_index_check' );

			
	function krafit_index_check_css() {
		echo '<style type="text/css">
		#wpadminbar #wp-admin-bar-index-check a {
			color: #d54e21;
		}
		#wpadminbar #wp-admin-bar-index-check .ab-icon:before {
			content: "\f534";
			top: 3px;
			color: #d54e21;
		}
		</style>';
	}

	add_action( 'admin_head', 'krafit_index_check_css' );

