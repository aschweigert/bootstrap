		<?php get_header(); ?>

   		<div id="content">
   			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

   			<article <?php post_class('hnews hentry item') ?>" id="post-<?php the_ID(); ?>">
			
				<h1 class="entry-title"><?php the_title(); ?></h1>
				
				<p class="meta">
					<i>Posted on:</i> <time datetime="<?php echo date(DATE_W3C); ?>" class="updated"><?php the_time('F jS, Y') ?></time>
					<?php edit_post_link('Edit this entry',' - ','.'); ?>
				</p>
				
				<hr>

				<div class="entry-content">
				
					<?php the_content(); ?>
					
					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
					
					<?php the_tags('<div class="tags"><p class="tags-heading">Tagged with:</p><ul class="tags-list"><li class="label label-info">','</li><li class="label label-info">','</li></ul></div>'); ?>
					
				</div>
			
			</article>
			
			<div id="nav-below" class="navigation pager">
				<div class="previous nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'bootstrap' ) . '</span> %title' ); ?></div>
				<div class="next nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'bootstrap' ) . '</span>' ); ?></div>
			</div><!-- #nav-below -->
			
		
			<?php comments_template(); ?>

			<?php endwhile; endif; ?>
		</div>

<?php get_footer(); ?>