<?php get_header(); ?>

	<div class="container-fluid">
   		<div class="span8 offset2">
   			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

   			<article class="hnews hentry item <?php post_class() ?>" id="post-<?php the_ID(); ?>">
			
				<h1 class="entry-title"><?php the_title(); ?></h1>

				<div class="entry-content">
				
					<?php the_content(); ?>

					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				
					<?php the_tags( 'Tags: ', ', ', ''); ?>
			
					<footer class="meta">
						<i>Posted on:</i> <time datetime="<?php echo date(DATE_W3C); ?>" pubdate class="updated"><?php the_time('F jS, Y') ?></time>
						<span class="byline author vcard">
							<i>by</i> <span class="fn"><?php the_author() ?></span>
							</span>
						<?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'comments-link', ''); ?>
					</footer>

				</div>
			
				<?php edit_post_link('Edit this entry','','.'); ?>
			
			</article>

			<?php comments_template(); ?>

			<?php endwhile; endif; ?>
		</div>
	
<?php //get_sidebar(); ?>

<?php get_footer(); ?>