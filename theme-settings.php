<?php
/* 
 * bootstrap THEME SETTINGS
 */
function bootstrap_add_options_page() {
    add_theme_page( 'bootstrap', 'Theme Options', 'manage_options', 'bootstrap', 'bootstrap_options_page' );
}
add_action( 'admin_menu', 'bootstrap_add_options_page' );

function bootstrap_options_page() {
?>
    <div class="wrap">
    	<?php screen_icon(); ?>
    	<h2>Theme Options</h2>
        <form action="options.php" method="post">
            <?php
            	settings_fields( 'bootstrap' );
            	do_settings_sections( 'bootstrap' );
            	submit_button();
            ?>
        </form>
    </div>
<?php
}

function bootstrap_settings_init() {
    add_settings_section( 'bootstrap_settings', false, 'bootstrap_settings_section_callback', 'bootstrap' );
    
    add_settings_field( 'ga_id', 'Google Analytics ID<br />(UA-XXXXXXXX-X)',
		'bootstrap_ga_id_callback', 'bootstrap', 'bootstrap_settings' );

	register_setting( 'bootstrap', 'ga_id', 'sanitize_text_field' );
    
	add_settings_section( 'bootstrap_links', 'Header Links', '__return_false', 'bootstrap' );

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
		$field = $field . '_link';
		add_settings_field( $field, $title, 'bootstrap_settings_field_link_callback',
			'bootstrap', 'bootstrap_links', array( 'field' => $field ) );
		register_setting( 'bootstrap', $field, 'esc_url_raw' );
	}
}
add_action( 'admin_init', 'bootstrap_settings_init' );

function bootstrap_settings_section_callback() {
    echo '<p>The following fields are <strong>optional</strong> and are used to show the social media links in the top navigation bar.</p>';
}

function bootstrap_ga_id_callback() {
    $option = esc_textarea( get_option( 'ga_id' ) );
	echo "<input type='text' name='ga_id' value='$option' class='regular-text' />
		<br /><span class='description'>If you use Google Analytics enter your ID here and the code will be included in the footer.</span>";
}

function bootstrap_settings_field_link_callback( $args ) {
	$field = $args['field'];
	echo '<input type="text" value="' . esc_url( get_option( $field ) ) . '" name="' . esc_attr( $field ) . '" class="regular-text" />';
}

?>