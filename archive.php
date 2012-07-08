	<?php get_header(); ?>

   	<div id="content">

   	 	<?php
			/* Queue the first post, that way we know
			 * what date we're dealing with (if that is the case).
			 *
			 * We reset this later so we can run the loop
			 * properly with a call to rewind_posts().
			 */
			if ( have_posts() )
				the_post();
		?>

				<header class="page-header">
					<h1 class="entry-title">
		<?php if ( is_day() ) : ?>
						Archives: <?php the_date( 'F j, Y', '', '', true ); ?>
		<?php elseif ( is_month() ) : ?>
						Archives: <?php the_date( 'F Y', '', '', true ); ?>
		<?php elseif ( is_year() ) : ?>
						Archives: <?php the_date( 'Y', '', '', true ); ?>
		<?php elseif ( is_category() ) : ?>
						<?php single_cat_title(); ?>
		<?php elseif ( is_tag() ) : ?>
						Posts tagged <?php single_tag_title(); ?>
		<?php elseif ( is_author() ) : ?>
						Posts by <?php the_author(); ?>
		<?php else : ?>
						Blog Archives
		<?php endif; ?>
					</h1>
				</header>

		<?php
			/* Since we called the_post() above, we need to
			 * rewind the loop back to the beginning that way
			 * we can run the loop properly, in full.
			 */
			rewind_posts();
		?>
		<hr>

   	 	<div class="stories <?php if ( is_home() ) echo 'homepage'; ?>">
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="story">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p class="meta">
						<time datetime="<?php echo date(DATE_W3C); ?>" class="updated"><?php the_time('F jS, Y') ?></time>
						<?php edit_post_link('edit post', ' - ', ''); ?>
					</p>
					<?php the_excerpt(); ?>
					<p class="more_link"><a href="<?php the_permalink(); ?>">Continue&nbsp;reading&nbsp;&rarr;</a></p>
				</article>
			<?php endwhile; ?>
		</div>
		<?php if (  $wp_query->max_num_pages > 1 ) : ?>
		<nav id="nav-below" class="pager">
			<div class="previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
			<div class="next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
		</nav><!-- #nav-below -->
		<?php endif; ?>
     </div><!-- end span9 -->

</div><!--end #main -->

<?php get_footer(); ?>
