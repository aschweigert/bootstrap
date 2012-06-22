<?php get_header(); ?>

   <div id="main" class="row-fluid span12">
   	
   	<?php get_sidebar(); ?>
   	
   	<div id="content" class="span8">
   	 
   	 	<div class="stories">
			<?php
				$temp = $wp_query;
				$wp_query= null;
				$wp_query = new WP_Query();
				$wp_query->query('posts_per_page=10'.'&paged='.$paged);
				while ($wp_query->have_posts()) : $wp_query->the_post();
				?>
				<div class="story">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p class="meta">
						<time datetime="<?php echo date(DATE_W3C); ?>" class="updated"><?php the_time('F jS, Y') ?></time>
						<?php edit_post_link('edit post', ' - ', ''); ?>
					</p>
					<?php the_excerpt(); ?>
					<p class="more_link"><a href="<?php the_permalink(); ?>">Continue&nbsp;reading&nbsp;&rarr;</a></p>
				</div>
				<hr>
			<?php endwhile; ?>
		</div>
		<?php if (  $wp_query->max_num_pages > 1 ) : ?>
		<div id="nav-below" class="navigation pager">
			<div class="previous nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
			<div class="next nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
		</div><!-- #nav-below -->
		<?php endif; ?>
     </div><!-- end span9 -->

</div><!--end #main -->

<?php get_footer(); ?>
