<?php get_header(); ?>

   		<div id="content">
		   	<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="entry-title">Search Results For: <?php echo get_search_query(); ?></h1>
				</header>

				<?php
					/* Since we called the_post() above, we need to
					 * rewind the loop back to the beginning that way
					 * we can run the loop properly, in full.
					 */
					rewind_posts();
				?>
				<hr>

				<div class="stories">
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

			<?php else : ?>

				<header class="page-header">
					<h1 class="entry-title">Nothing Found For: <?php echo get_search_query(); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'bootstrap' ); ?></p>
					<form method="get" name="searchform" id="searchform" action="<?php bloginfo('url'); ?>/" class="well form-search">
						<input type="text" value="" name="s" id="query" placeholder="Search" class="input-xlarge search-query">
						<button type="submit" id="searchsubmit" class="btn">Go</button>
					</form>
				</div><!-- .entry-content -->
		    <?php endif; ?>
		</div>

<?php get_footer(); ?>