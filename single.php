		<?php get_header(); ?>

   		<div id="content">
   			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

   			<article <?php post_class('hnews hentry item') ?>" id="post-<?php the_ID(); ?>">

				<header class="post-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<p class="meta">
						<em>Posted on:</em> <time datetime="<?php echo date(DATE_W3C); ?>" class="updated"><?php the_time('F jS, Y') ?></time>
						<?php edit_post_link('Edit this entry',' - ','.'); ?>
					</p>
				</header>

				<div class="entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				</div>

				<footer class="post-footer">
					<?php the_tags('<div class="tags"><p>Tagged with:</p><ul><li><i class="icon-white icon-tag"></i>','</li><li><i class="icon-white icon-tag"></i>','</li></ul></div>'); ?>
					<nav id="nav-below" class="pager">
						<div class="previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'bootstrap' ) . '</span> %title' ); ?></div>
						<div class="next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'bootstrap' ) . '</span>' ); ?></div>
					</nav><!-- #nav-below -->

					<?php comments_template(); ?>
				</footer>

			</article>

			<?php endwhile; endif; ?>
		</div><!-- #content -->

<?php get_footer(); ?>