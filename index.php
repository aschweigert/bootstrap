	<?php get_header(); ?>

   	<div id="content">

   	 	<div class="stories <?php if ( is_home() ) echo 'homepage'; ?>">
			<?php
				$temp = $wp_query;
				$wp_query= null;
				$wp_query = new WP_Query();
				$wp_query->query('posts_per_page=10'.'&paged='.$paged);
				while ($wp_query->have_posts()) : $wp_query->the_post();
				?>
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

     </div><!-- end #content -->

<?php get_footer(); ?>
