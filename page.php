		<?php get_header(); ?>
		
   		<div id="content">
   			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

   			<article <?php post_class('hnews hentry item') ?>" id="post-<?php the_ID(); ?>">
			
				<h1 class="entry-title"><?php the_title(); ?></h1>
				
				<hr>

				<div class="entry-content">
				
					<?php the_content(); ?>
					
					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				
					<?php the_tags( 'Tags: ', ', ', ''); ?>
					
					<hr>
				</div>
			
			</article>

			<?php endwhile; endif; ?>
		</div>

<?php get_footer(); ?>