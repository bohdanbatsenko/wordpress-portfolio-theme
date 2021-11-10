<?php get_header(); ?>


<?php if(have_posts()) {
			while(have_posts()) {
				the_post();
 ?>
 <div class="container" style="margin-top:20%;">
		<article class="<?php post_class(); ?>" style="display:flex;">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" style="flex:40%;">
			<div class="thumbnail" style="display:block; max-width:400px;">
			<?php the_post_thumbnail('small'); ?>
			</div>
		</a>
			<div class="post-excerpt" style="flex:50%;">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<?php the_excerpt(); ?>
			</div>
		</article>
	<?php } ?>
	<?php the_posts_pagination(); ?>

	<?php } ?>
	</div>
	<footer class="footer">
		<?php echo date('Y'); ?>
	</footer>
	<?php get_footer(); ?>
</body>
</html>



