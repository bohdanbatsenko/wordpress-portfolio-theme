<?php /*
Template Name: Case studies
*/

get_header(); ?>

<?php the_content(); ?>
<div class="page">
<h1 
	data-aos="fade-right" 
	data-aos-delay="50"		
	class="page-title"><?php the_title(); ?></h1>	
</div>


<?php if( have_rows('blocs') ): ?>
	<div class="blocs">
		<?php while( have_rows('blocs') ): the_row(); ?>
	
		

		<?php if( get_row_layout() == '2columns' ): ?>
				<?php
							$color = get_sub_field('color');
							//$label = the_sub_field('label');
					?>
					<div class="bloc is-<?php echo $color; ?>">			
					<div class="grid2 container">
					<?php	
						if( have_rows('columns') ):
							$i = 0;
							while( have_rows('columns') ): the_row(); ?>
							<div
							data-aos="fade-up" 
							data-aos-delay="<?php echo $i; ?>"									
							>
								<h2 class="h3 mb-3">							
									<?php	$title = the_sub_field('title');
										if ( !empty ($title)) : ?><?php echo $title; ?></h2>
											<h3 class="h3 mb-3"><?php	else : ?>&nbsp;</h3>
										<?php	endif; ?>
									<div class="formatted"><?php	the_sub_field('content'); ?></div>
								</div>									
								
								<?php	$i = $i + 350; ?>
								<?php	endwhile; ?>
								<div class="text-pivoted"><?php the_sub_field('label'); ?></div>	
								</div> <!-- grid2 -->
								<?php endif; ?>
							</div> <!-- bloc -->
						<?php endif; ?>






	
			<?php	if ( get_row_layout() == 'case-studies' ): ?>
			
				<div class="case-studies-square container">

				<div class="grid2">

				<?php 
					if( have_rows('items') ): ?>
						<?php while( have_rows('items') ): the_row(); ?>

						<?php $post_object = get_sub_field('post'); ?>
						<?php 
						if( $post_object ): ?>
								<?php // override $post
								$post = $post_object;
								//foreach( $post_object as $post):
								setup_postdata( $post );
							//	$terms = get_the_terms( $post->ID, 'case-study-type' );
								?>
						<?php
							$terms = get_the_terms( $post->ID , 'case-study-type' );
							if (is_array($terms) || is_object($terms))
							{
								$i = 0;
								foreach ( $terms as $term ) {
								$term_link = get_term_link( $term, 'case-study-type' );
								if( is_wp_error( $term_link ) )
								break;
								}
							} ?>				
					<?php $image = get_sub_field( 'image' ); ?>
					<!--?php $title = the_title(); ?-->

					<div 
					data-aos="fade-up" 
					data-aos-delay="<?php echo $i; ?>"		
					class="case-studies">
					<h2 class="case-studies-square__title">
						<?php echo the_title(); ?>
						</h2>						
					<div class="case-studies__image" >
						<span class="case-studies__type"><?php echo '<a href="' . $term_link . '" class="case_studies__type">' . $term->name . '</a>'; 	?></span>
						<a href="<?php the_permalink(); ?>" title=""  class="js-flip" id="case-study-<?php echo $post->ID; ?>-image">
						<img src="<?php echo $image['url']; ?>" alt="">
						<!--?php echo '<img src="'. $image['url'] . '" alt="' . $image[$title] . '" />'; ?-->
					</a>	
					</div><!-- case-studies__image -->
					<?php the_excerpt(); ?>
					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php $i = $i + 350; ?>
					<?php endif; ?>
						</div>
				<?php endwhile; ?>
		
		<?php endif; ?>
			</div>	<!--grid2 -->
		</div><!--case-studies container -->
			<?php endif; ?>




			<?php if( get_row_layout() == 'mosaic-long' ): ?>
					<?php
						$image_square = get_sub_field('image_square', 'illustration_small');
						$image_long = get_sub_field('image_long', 'casestudy_long');
					?>
					<div class="mosaic-long">	
						<div class="container">	
						<div 
						data-aos="fade-right" 
							data-aos-delay="50"								
						class="mosaic-long__body">
								<div class="mosaic__title"><?php the_sub_field('title'); ?></div>
								<div class="formatted"><?php the_sub_field('content'); ?></div>
							<?php  ?>
						</div> <!-- mosaic__body -->

						<a 
						data-aos="fade-left" 
							data-aos-delay="200"								
						class="mosaic-long__square" href="<?php echo $image_square['url']; ?>">
						<img data-fancybox src="<?php echo esc_url($image_square['url']); ?>" alt="<?php echo esc_attr($image_square['alt']); ?>" />
						</a>


						<?php	
						if( have_rows('image_long') ): 
							$i = 0;
							while( have_rows('image_long') ): the_row(); ?>
								<?php	$mosaic_long_image = get_sub_field('mosaic-long-image', 'full'); ?>
						
							<a 
							data-aos="fade-up" 
							data-aos-delay="<?php echo $i; ?>"									
							class="mosaic-long__image" href="<?php echo $mosaic_long_image['url']; ?>">
							<img data-fancybox="mosaic-long" src="<?php echo esc_url($mosaic_long_image['url']); ?>" alt="<?php echo esc_attr($mosaic_long_image['alt']); ?>" />
						</a>								
						<?php $i = $i + 200;?>
						<?php endwhile; ?>
						<?php endif; ?>


						</div><!--container -->
					</div> <!-- mosaic-long -->
				<?php endif; ?>		




		<?php endwhile; ?>
			</div><!-- blocs -->
				<?php endif; ?>

	
<?php get_footer(); ?>