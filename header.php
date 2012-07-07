<!DOCTYPE html>

<!--[if lt IE 7 ]> <html class="ie ie6 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    
	
	<?php if (is_search()) { ?>
	<meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
    
   	<meta name="description" content="<?php bloginfo('description'); ?>">
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    
    <meta name="author" content="Adam Schweigert, http://mediatoybox.com">

    <!-- styles -->
    <link href="<?php bloginfo( 'template_directory' ); ?>/assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
           
    <script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/modernizr.custom.js"></script>

    <!-- fav and touch icons
    <link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/assets/img/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo( 'template_directory' ); ?>/assets/img/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo( 'template_directory' ); ?>/assets/img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo( 'template_directory' ); ?>/assets/img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php bloginfo( 'template_directory' ); ?>/assets/img/ico/apple-touch-icon-57-precomposed.png">
    -->
    
    <?php wp_enqueue_script("jquery"); ?>
    
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

    <?php wp_head(); ?>
  
  </head>

  <body>
  
    <div class="container-fluid wrapper">
		
		<div id="main" class="row-fluid span12">
		
			<header>
				<div id="branding">
					<a href="<?php bloginfo('url'); ?>">
						<h1><?php bloginfo('name'); ?></h1>
						<p class="hidden-phone"><?php bloginfo('description'); ?></p>
					</a>
				</div>
					
				<nav id="mainnav">
					<?php wp_nav_menu('primary'); ?>
				</nav>
		
				<div id="nav-drop">
					<ul class="social-icons hidden-phone">
		          		
		          		<?php if ( get_option( 'rss_link' ) ) : ?>
							<li>
								<a href="<?php echo esc_url( get_option( 'rss_link' ) ); ?>" title="RSS">
									<img src="<?php bloginfo('template_directory'); ?>/assets/img/social-icons/rss.png" alt="rss-fav" />
								</a>
							</li>
						<?php endif; ?>
						
		          		<?php if ( get_option( 'facebook_link' ) ) : ?>
							<li>
								<a href="<?php echo esc_url( get_option( 'facebook_link' ) ); ?>" title="Facebook">
									<img src="<?php bloginfo('template_directory'); ?>/assets/img/social-icons/facebook.png" alt="facebook-fav" />
								</a>
							</li>
						<?php endif; ?>
			
						<?php if ( get_option( 'twitter_link' ) ) : ?>
							<li>
								<a href="<?php echo esc_url( get_option( 'twitter_link' ) ); ?>" title="twitter">
									<img src="<?php bloginfo('template_directory'); ?>/assets/img/social-icons/twitter.png" alt="twitter-fav" />
								</a>
							</li>
						<?php endif; ?>
			
						<?php if ( get_option( 'youtube_link' ) ) : ?>
							<li>
								<a href="<?php echo esc_url( get_option( 'youtube_link' ) ); ?>" title="youtube">
									<img src="<?php bloginfo('template_directory'); ?>/assets/img/social-icons/youtube.png" alt="youtube-fav" />
								</a>
							</li>
						<?php endif; ?>
			
						<?php if ( get_option( 'flickr_link' ) ) : ?>
							<li>
								<a href="<?php echo esc_url( get_option( 'flickr_link' ) ); ?>" title="flickr">
									<img src="<?php bloginfo('template_directory'); ?>/assets/img/social-icons/flickr.png" alt="flickr-fav" />
								</a>
							</li>
						<?php endif; ?>
			
						<?php if ( get_option( 'gplus_link' ) ) : ?>
							<li>
								<a href="<?php echo esc_url( get_option( 'gplus_link' ) ); ?>" title="gplus">
									<img src="<?php bloginfo('template_directory'); ?>/assets/img/social-icons/googleplus_black.png" alt="gplus-fav" />
								</a>
							</li>
						<?php endif; ?>
						
						<?php if ( get_option( 'pinterest_link' ) ) : ?>
							<li>
								<a href="<?php echo esc_url( get_option( 'pinterest_link' ) ); ?>" title="pinterest">
									<img src="<?php bloginfo('template_directory'); ?>/assets/img/social-icons/pinterest.png" alt="pinterest-fav" />
								</a>
							</li>
						<?php endif; ?>
						
						<?php if ( get_option( 'linkedin_link' ) ) : ?>
							<li>
								<a href="<?php echo esc_url( get_option( 'linkedin_link' ) ); ?>" title="linkedin">
									<img src="<?php bloginfo('template_directory'); ?>/assets/img/social-icons/linkedin.png" alt="linkedin-fav" />
								</a>
							</li>
						<?php endif; ?>

		          	</ul>
		          	
			        <form method="get" name="searchform" id="searchform" action="<?php bloginfo('url'); ?>/" class="search form-inline">
				        <input type="text" value="" name="s" id="query" placeholder="Search" />
				    </form>
				
				</div>
				
			</header>
			
				
			