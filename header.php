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

	<?php $url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>

	<?php if ( is_single() ) { ?>
		<?php
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
			if ($image != '') {
				$thumbnailURL = $image[0];
			} else {
			    $thumbnailURL = get_bloginfo( 'template_directory' ) . '/assets/img/headshot_500.png';
		    };
		?>
	    <meta name="twitter:card" content="summary">
	    <meta name="twitter:site" content="@mediatoybox">
	    <meta name="twitter:creator" content="@aschweig">
	    <meta property="og:title" content="<?php the_title(); ?>" />
	    <meta property="og:type" content="article" />
	    <meta property="og:url" content="<?php the_permalink(); ?>"/>
	    <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
	    <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt()); ?>" />
	    <meta property="og:image" content="<?php echo $thumbnailURL; ?>">
	<?php } elseif ( is_home() ) { ?>
		<meta name="twitter:card" content="summary">
	    <meta name="twitter:site" content="@mediatoybox">
	    <meta name="twitter:creator" content="@aschweig">
		<meta property="og:title" content="<?php bloginfo('name'); ?>" />
	    <meta property="og:type" content="website" />
	    <meta property="og:url" content="<?php bloginfo('url'); ?>"/>
	    <meta property="og:image" content="<?php bloginfo( 'template_directory' ); ?>/assets/img/headshot_500.png" />
	    <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
	    <meta property="og:description" content="<?php bloginfo('description'); ?>" />
	<?php } else { ?>
		<meta name="twitter:card" content="summary">
	    <meta name="twitter:site" content="@mediatoybox">
	    <meta name="twitter:creator" content="@aschweig">
		<meta property="og:title" content="<?php bloginfo('name'); ?> <?php wp_title(); ?>" />
	    <meta property="og:type" content="article" />
	    <meta property="og:url" content="<?php echo $url; ?>"/>
	    <meta property="og:image" content="<?php bloginfo( 'template_directory' ); ?>/assets/img/headshot_500.png" />
	    <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
	    <meta property="og:description" content="<?php bloginfo('description'); ?>" />
	<?php } ?>


    <?php wp_head(); ?>

  </head>

  <body>

    <div class="wrapper">

			<header id="main">
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
						<?php bootstrap_social_links (); ?>
		          	</ul>

			        <form method="get" name="searchform" id="searchform" action="<?php bloginfo('url'); ?>/" class="search form-inline clearfix">
				        <input type="text" value="" name="s" id="query" placeholder="Search" />
				        <button type="submit" id="searchsubmit" class="btn">Go</button>
				    </form>

				</div>

			</header>


