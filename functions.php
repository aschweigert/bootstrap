<?php

    require_once( TEMPLATEPATH . '/theme-settings.php' );

        // Translations can be filed in the /languages/ directory
        load_theme_textdomain( 'bootstrap', TEMPLATEPATH . '/languages' );

        $locale = get_locale();
        $locale_file = TEMPLATEPATH . "/languages/$locale.php";
        if ( is_readable($locale_file) )
            require_once($locale_file);

	// Add RSS links to <head> section
	automatic_feed_links();

	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    	remove_action('wp_head', 'wp_generator');
    }
    add_action('init', 'removeHeadLinks');

    // Add the Nav menu
    if (function_exists('register_nav_menu')) {
    	register_nav_menu( 'primary', 'Primary Menu');
    }

    // add user contact methods
    function bootstrap_contactmethods( $contactmethods ) {
	    // Add Twitter
	    if ( !isset( $contactmethods['twitter'] ) )
	    $contactmethods['twitter'] = 'Twitter';

	    // Add Facebook
	    if ( !isset( $contactmethods['facebook'] ) )
	    $contactmethods['Facebook'] = 'Facebook';

	    // Add Google+
	    if ( !isset( $contactmethods['gplus'] ) )
	    $contactmethods['gplus'] = 'Google+';

	    // Remove Yahoo IM
	    if ( isset( $contactmethods['yim'] ) )
	    unset( $contactmethods['yim'] );

	    // Remove AIM
	    if ( isset( $contactmethods['aim'] ) )
	    unset( $contactmethods['aim'] );

	    return $contactmethods;
	}

	add_filter( 'user_contactmethods', 'bootstrap_contactmethods', 10, 1 );

	// a little function to retrieve to the social media links
	function bootstrap_social_links () {

		$fields = array(
			'rss' => 'Link to RSS Feed',
			'facebook' => 'Link to Facebook Profile',
			'twitter' => 'Link to Twitter Page',
			'youtube' => 'Link to YouTube Page',
			'flickr' => 'Link to Flickr Page',
			'gplus' => 'Link to Google Plus Page',
			'pinterest' => 'Link to Pinterest Profile',
			'linkedin' => 'Link to LinkedIn Profile or Group'
		);

		foreach ( $fields as $field => $title ) {
			$field_link = $field . '_link';

			if ( get_option( $field_link ) ) :
				echo '<li><a href="' . esc_url( get_option( $field_link ) ) . '" title="' . $title . '"><i class="social-icons small ' . $field . '"></i></a></li>';
			endif;
		}
	}

	//hide the admin bar
	add_filter( 'show_admin_bar', '__return_false' );
?>