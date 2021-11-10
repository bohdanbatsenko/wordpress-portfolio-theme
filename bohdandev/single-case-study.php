<?php get_header(); ?>

<div class="container">

	<h1 
	data-aos="fade-right" 
		data-aos-delay="50"		
	class="page-title"><?php the_title(); ?></h1>	
</div>




<?php $description = get_field('description'); ?>
	<?php $role = get_field('role');

					?>

<div class="container blocs">
	<div class="casestudy-intro-wrap">
		<div 
		data-aos="fade-right" 
		data-aos-delay="150"			
		class="">
			<h2 class="h3 mb-3">Overview</h2>
			<?php echo $description; ?>
		</div>
		<div 
		data-aos="fade-left" 
		data-aos-delay="350"			
		class="">
			<h2 class="h3 mb-3">Role</h2>
			<?php echo $role; ?>
		</div>
	</div> <!-- casestudy-intro -->

	<div class="bloc">

	<?php 
		$image = get_field('image');
		if( !empty( $image ) ): ?>
		<a href="<?php echo esc_url($image['url']); ?>">
    <img 
		data-aos="zoom-in" 
		data-aos-delay="50"			
		data-fancybox 
		src="<?php echo esc_url($image['url']); ?>" 
		alt="<?php echo esc_attr($image['alt']); ?>" />
		</a>
<?php endif; ?>

	</div>	
	<!-- <div class="bloc">
		<a href="<?php the_post_thumbnail_url('full'); ?>">
		<img 
		data-fancybox 
		class="case-study__thumbnail" 
		src="<?php the_post_thumbnail_url('casestudy-thumbnail'); ?>">
		</a>
	</div>	 -->
</div> <!-- container blocs -->





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
							while( have_rows('columns') ): the_row(); ?>
							<div
							data-aos="zoom-in" 
							data-aos-delay="50"								
							>
								<h2 class="h3 mb-3">							
									<?php	$title = the_sub_field('title');
										if ( !empty ($title)) : ?><?php echo $title; ?></h2>
											<h3 class="h3 mb-3"><?php	else : ?>&nbsp;</h3>
										<?php	endif; ?>
									<div class="formatted"><?php	the_sub_field('content'); ?></div>
								</div>									
								
								<?php	endwhile; ?>
								<div class="text-pivoted"><?php the_sub_field('label'); ?></div>	
								</div> <!-- grid2 -->
								
							<?php endif; ?>
					
								
							</div> <!-- bloc -->
						<?php endif; ?>



		
				<?php if( get_row_layout() == 'image' ): ?>
					<?php
							$image = get_sub_field('image', 'full');
					?>
					<div class="bloc bloc-image">			
						<div class="container">

						<a
						data-aos="fade-right" 
		data-aos-delay="50"	
						href="<?php echo esc_url($image['url']); ?>" 
						title="<?php echo esc_attr($image['title']); ?>">
					<?php	if( !empty( $image ) ): ?>
    				<img 
						data-fancybox 
						src="<?php echo esc_url($image['url']); ?>" 
						alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>
					</a>
						</div> <!-- container -->
					</div> <!-- bloc -->
				<?php endif; ?>

				
				<?php if( get_row_layout() == 'text' ): ?>
					<?php
							$text = get_sub_field('text');
					?>
					<div class="bloc">			
						<div 
						data-aos="fade-right" 
						data-aos-delay="50"	
						
						class="container formatted">

							<?php echo $text; ?>
						</div> <!-- container -->
					</div> <!-- bloc -->
				<?php endif; ?>



				<?php if( get_row_layout() == 'mosaic' ): ?>
					<?php
						$image_square = get_sub_field('image_square', 'illustration_small');
						$image_tall = get_sub_field('image_tall', 'casestudy_tall');
					?>
					<div class="mosaic container">			
						<div class="mosaic__body">
								<div 
								data-aos="fade-right" 
								data-aos-delay="50"	
								class="mosaic__title"><?php the_sub_field('title'); ?></div>
								<div 
								data-aos="fade-right" 
								data-aos-delay="150"									
								class="formatted"><?php the_sub_field('content'); ?></div>
							<?php  ?>
						</div> <!-- mosaic__body -->

							<a 
							data-aos="fade-left" 
							data-aos-delay="350"								
							class="mosaic__tall" href="<?php echo $image_tall['url']; ?>">
							<img data-fancybox="mosaic" src="<?php echo esc_url($image_tall['url']); ?>" alt="<?php echo esc_attr($image_tall['alt']); ?>" />
							</a>
							<a 
							data-aos="fade-right" 
							data-aos-delay="450"								
							class="mosaic__square" href="<?php echo $image_square['url']; ?>">
							<img data-fancybox="mosaic" src="<?php echo esc_url($image_square['url']); ?>" alt="<?php echo esc_attr($image_square['alt']); ?>" />
							</a>
					</div> <!-- mosaic -->
				<?php endif; ?>				




		<?php if( get_row_layout() == 'image-fullwidth' ): ?>
			<div class="image-fullwidth">			
				<div class="container">
					<?php $title = get_sub_field('title'); ?>

						<?php 
						$title = get_sub_field('title');
						$columns = get_sub_field('columns');
							?>
							<?php
							if ($columns) {
								$count = count($columns);
								if ($count > 1) {
									?>
									<div 
									data-aos="fade-up" 
									data-aos-delay="50"										
									class="image-fullwidth__title"><?php	echo $title; ?></div>
									<div class="grid2">	
										<?php foreach ($columns as $key => $column) {
											echo '<div 	data-aos="fade-up" data-aos-delay="50"	class="formatted">' .$column['content']. '</div>';
										}	?>
								</div>
											
								<?php } else { ?>

										<div 
										data-aos="fade-up" 
										data-aos-delay="50"											
										class="image-fullwidth__title text-center"><?php	echo $title; ?></div>
											<div class="text-center">
											<?php echo $columns[0]['content']; ?>
											</div>

									<?php }  } ?>


						</div> <!-- container -->

					</div> <!-- image-fullwidth -->

								
					<?php $image = get_sub_field('image'); 
								$size_full = 'full';
								$size_medium = 'medium';
								$size_large = 'large';
					?>
				<?php if (!empty ($image)) : ?>		
					<a href="<?php echo $image['url']; ?>" class="image-fullwidth__image">
					<img 
							data-aos="zoom-up" 
							data-aos-delay="50"						
							data-fancybox
							src="<?php echo esc_url($image['url'], $size_full); ?>" 
							srcset="<?php echo esc_url($image['url'], $size_medium); ?> 500w, 
											<?php echo esc_url($image['url'], $size_full); ?> 1000w,
											<?php echo esc_url($image['url'], $size_large); ?> 1280w,
											" 
							sizes="100vw"
							alt="<?php echo esc_attr($image['alt']); ?>">
					</a>
					<?php endif; ?>	
					<!-- if acf field set to GALLERY "images" -->



					<?php
						$images = get_sub_field('gallery');
						if( $images ): ?>
							<div class="container">
								<div class="case-study-gallery">
									<?php $i = 0; ?>
										<?php foreach( $images as $image ): ?>
														<a 
														data-aos="fade-up" 
														data-aos-delay="<?php echo $i; ?>"																
														href="<?php echo $image['url']; ?>" class="">
																<img data-fancybox="gallery-images" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
														</a>
														<p><?php echo $image['caption']; ?></p>
										<?php 
									$i = $i + 350;
									endforeach; 
									?>
								</div>
								</div> <!-- container -->
								<!-- end ofGALLERY "images" -->
								<!-- if acf field is set to REPEATER "images" -->
						<?php endif; ?>




					<?php	
						if( have_rows('images') ): 	?>
							<div class="image-fullwidth__images">
							<?php while( have_rows('images') ): the_row(); ?>	
								
									<?php 
									$image_preview = get_sub_field('preview', 'preview');
									$image_full = get_sub_field('full');
									if( !empty( $image_preview || $image_full ) ): ?>
									<a
									data-aos="fade-up" 
									data-aos-delay="50"											
									href="<?php echo esc_url($image_full['url']); ?>">
											<img data-fancybox="fullwidth-images" src="<?php echo esc_url($image_preview['url']); ?>" alt="<?php echo esc_attr($image_full['alt']); ?>" />
											</a>											
									<?php endif; ?>
									
						<?php endwhile; ?>
						<?php endif; ?>
					</div> <!-- image-fullwidth__images -->
					<?php endif; ?> <!-- end of "get_row_laoyt image_fullwidth" -->



				<?php if( get_row_layout() == 'youtube' ): ?>
					<div class="youtube">
								<?php
									$youtube = get_sub_field('youtube');
								?>
										<?php
											// echo "<pre>";
											// print_r($youtube);
											// echo "</pre>";
										?>
										<div class="ratio">

										<?php echo $youtube; ?>

									</div>
								</div> <!-- youtube -->
								<?php endif; ?>


						<?php if( get_row_layout() == 'image-text' ): ?>
							<div class="image-text">
								<?php
									$title = get_sub_field('title');
									$content = get_sub_field('content');
									$content_right = get_sub_field('content_right');
									$image = get_sub_field('image');
								?>

							<div class="bloc">
								<div class="container text-center">
									<div class="image-text__title">
										<?php echo $title; ?>
									</div>
									<div class="formatted">
									<?php echo $content; ?>
									</div>
								</div> <!-- container -->
								<div class="image-text__columns">
									<div>
										<a href="<?php	echo esc_url($image['url']); ?>" class="image-text__image">
										<img 
										data-fancybox="image-text"
							src="<?php echo esc_url($image['url'], $size_full); ?>" 
							srcset="<?php echo esc_url($image['url'], $size_medium); ?> 500w, 
											<?php echo esc_url($image['url'], $size_full); ?> 1000w,
											<?php echo esc_url($image['url'], $size_large); ?> 1280w,
											" 
							sizes="100vw"
							alt="<?php echo esc_attr($image['alt']); ?>">
										</a>										
									</div>
									<div class="formatted">
										<?php echo $content_right; ?>
									</div>
								</div>
									<?php  ?>
								</div><!-- bloc -->
							</div> <!-- image-text -->
							<?php endif; ?>



				<?php endwhile; ?>
			</div><!-- blocs -->
				<?php endif; ?>





				<?php 
		$prev = get_previous_post(); 
		$next = get_next_post(); 
		?>
		<?php if($prev || $next) { ?>
			<div class="container">
			<div class="pagination">
				<div class="pagination-links">
					<?php if($prev) { ?>
						<div class="pagination-prev">
							<a href="<?php the_permalink( $prev->ID ); ?>" class="pagination-link">
								<?php if(has_post_thumbnail( $prev->ID)) { ?>
									<div class="pagination-thumbnail">
										<?php echo get_the_post_thumbnail( $prev->ID, 'preview'); ?>
									</div>
								<?php } ?>
								<div class="pagination-content">
									<span class="pagination_subtitle">
										<?php esc_html_e('Previous Case'); ?>
									</span>
									<span class="pagination_title">
										<?php echo esc_html(get_the_title($prev->ID)); ?>
									</span>
								</div>
							</a>
						</div>
						<?php } ?>

						<?php if($next) { ?>
						<div class="pagination-next">
							<a href="<?php the_permalink( $next->ID ); ?>" class="pagination-link">
								<?php if(has_post_thumbnail( $next->ID)) { ?>
									<div class="pagination-thumbnail">
										<?php echo get_the_post_thumbnail( $next->ID, 'preview'); ?>
									</div>
								<?php } ?>
								<div class="pagination-content">
									<span class="pagination_subtitle">
										<?php esc_html_e('Next Case'); ?>
									</span>
									<span class="pagination_title">
										<?php echo esc_html(get_the_title($next->ID)); ?>
									</span>
								</div>
							</a>
						</div>
						<?php } ?>


				</div> <!-- pagination-links -->
			</div> <!-- pagination -->
			</div> <!-- container -->
			<?php } ?>


<?php get_footer(); ?>



