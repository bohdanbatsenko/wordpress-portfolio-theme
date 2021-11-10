<?php if(have_posts()) {
			while(have_posts()) {
				the_post();
 ?>
		<article class="<?php post_class(); ?>" style="background: green;">
			<?php the_title(); ?>

			<?php the_content(); ?>
		</article>
	<?php } ?>


	<?php } ?>