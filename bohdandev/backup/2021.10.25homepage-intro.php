<?php /*
Template Name: Homepage Intro
*/

get_header(); ?>

<div class="blocs">
<div class="homepage-intro">

	<?php if( have_rows('blocs') ): ?>
    <?php while( have_rows('blocs') ): the_row(); ?>
        <?php if( get_row_layout() == 'homepage-intro' ): ?>
           
							<h1 class="homepage-intro__title">
							<?php echo nl2br(the_sub_field('title')); ?>
							</h1>
								<div class="homepage-intro__body">
									<div class="homepage-intro__image">
										<?php 
										$image = get_sub_field('image');
										if( !empty( $image ) ): ?>
												<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
										<?php endif; ?>
									</div> <!--homepage-intro__image -->

									<div class="homepage-intro__content is-1"><?php the_sub_field('content_1'); ?></div>
									<div class="homepage-intro__content is-2"><?php the_sub_field('content_2'); ?></div>
									<div class="homepage-intro__content is-3"><?php the_sub_field('content_3'); ?></div>
								</div><!--homepage-intro__body -->
				</div><!--homepage-intro -->


				

	<?php
	elseif ( get_row_layout() == 'case-studies' ): ?>
	<div class="case-studies container">
	<h2 class="case-studies__title">
	<?php	the_sub_field('title'); ?>
	</h2>

	<div class="case-studies__body">
	<div class="case-studies__content formatted">
		<?php $content = get_sub_field('content');
			echo $content; 	?>
		</div>
		
<?php 
 if( have_rows('items') ): ?>
	<?php while( have_rows('items') ): the_row(); ?>
			<?php $post_object = get_sub_field('post'); ?>
			<?php if( $post_object ): ?>
					<?php // override $post
					$post = $post_object;
					//foreach( $post_object as $post):
					setup_postdata( $post );
				//	$terms = get_the_terms( $post->ID, 'case-study-type' );
					?>
			<?php
		$terms = get_the_terms( $post->ID , 'case-study-type' );
		foreach ( $terms as $term ) {
		$term_link = get_term_link( $term, 'case-study-type' );
		if( is_wp_error( $term_link ) )
		continue;
		} ?>				
		<?php $image = get_sub_field( 'image' ); ?>
		<!--?php $title = the_title(); ?-->

		<div class="case-studies__item">
		<div class="case-studies__image" >
			<span class="case-studies__type"><?php echo '<a href="' . $term_link . '" class="case_studies__type">' . $term->name . '</a>'; 	?></span>
		<a href="<?php the_permalink(); ?>" title=""  class="js-flip" id="case-study-<?php echo $post->ID; ?>-image">
			<img src="<?php echo $image['url']; ?>" alt="">
			<!--?php echo '<img src="'. $image['url'] . '" alt="' . $image[$title] . '" />'; ?-->
		<p><?php the_excerpt(); ?></p>	
		</a>	

<?php 
wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif; ?>
			</div>
			</div>
	<?php endwhile; ?>
<?php endif; ?>
<?php endif; ?>
	</div> <!--case-studies__body -->
</div> <!--case-studies container -->



<?php
	if ( get_row_layout() == 'illustrations' ): ?>

	<div class="illustrations container">
		<div class="illustrations__body">
		<h2 class="illustrations__title"><?php	the_sub_field('title'); ?></h2>
		<?php	the_sub_field('content'); ?>
		<?php $link = get_sub_field( 'link' );
		?>
		<a href="<?php echo $link['url'];  ?>" class="link mt-3"><?php	echo $link['title']; ?></a>
		</div>

		<?php 
		$args = array( 'post_type' => 'illustration', 'posts_per_page' => '4', );
		$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 

			echo '<a href="'.$featured_img_url.'" class="illustrations__image">'; 
            the_post_thumbnail('full | resize ' );
        echo '</a>';

			//$thumb = get_the_post_thumbnail( 'illustration' );
			//echo '<img src="'. $thumb['url'] .'" />';
		endwhile; 	
		wp_reset_postdata();			
?>
<?php endif ; ?>
</div><!--illustrations container -->


<?php
	if ( get_row_layout() == 'homepage-footer' ): ?>
	<div class="homepage-footer container">
		<div class="homepage-footer_title">
			<?php	the_sub_field('title'); ?>
		</div>
		<div class="grid2 formatted">
			<div class="class-left">
				<?php	the_sub_field('content_left'); ?>
			</div>
			<div class="class-right">
				<?php	the_sub_field('content_right'); ?>
			</div>
		</div>

<?php endif ; ?>
</div><!--illustrations container -->





				<?php endwhile; ?>
		<?php endif; ?>

</div> <!-- blocs -->




<footer class="footer">
<?php get_footer(); ?>
		Footer Jei Jones <?php echo date('Y'); ?>
	</footer>
