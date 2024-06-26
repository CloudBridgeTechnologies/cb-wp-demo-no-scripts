<?php
/* 	SPARK Theme's General Page to display all Pages
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since SPARK 1.0
*/

 get_header(); ?>
	<div id="container">
	<div id="content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<h1 class="page-title"><?php the_title(); ?></h1>
			<div class="content-ver-sep"> </div>
            <div class="entrytext">
 <?php the_post_thumbnail('thumbnail'); ?>
 <?php spark_content(); ?>

				<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'spark').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; ?><div class="clear"> </div>
	<?php edit_post_link(__('Edit This Entry','spark'), '<p>', '</p>'); ?>
<?php comments_template(); ?>
	<?php else: ?>
		<p><?php echo __('Sorry, no pages matched your criteria.', 'spark'); ?></p>
	<?php endif; ?>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>