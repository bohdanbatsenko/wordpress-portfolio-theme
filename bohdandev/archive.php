<?php get_header(); ?>
	<div class="container">

		<header class="archive-case-study-type-header">
			<?php the_archive_title('<h1>', '</h1>'); ?>
			<?php the_archive_description('<p>', '</p>'); ?>
		</header>

		<?php if(have_posts()) {
			while(have_posts()) {
				the_post();

 ?>
		<div class="archive-case-study-type grid2">
		<article class="<?php post_class(); ?>">
			<a href="<?php the_permalink(); ?>">
				<h2 class="case-studies-square__title">
						<?php the_title(); ?>
				</h2>
				<div class="case-studies__image">
					<?php the_post_thumbnail(); ?>
				</div>
		</a>

			<?php the_excerpt(); ?>
		</article>
		</div>
	<?php } ?>
                 
				<?php the_posts_navigation(); ?>

	<?php } ?>

	</div>
<?php get_footer(); ?>






