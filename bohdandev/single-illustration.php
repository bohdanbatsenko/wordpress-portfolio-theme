<?php get_header(); ?>

<div class="page">

	<h1 
	data-aos="fade-right" 
	data-aos-delay="50"			
	class="page-title"><?php the_title(); ?></h1>	
</div>


<div class="container">

<?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <div 
								data-aos="fade-up" 
								data-aos-delay="50"										
								class="single-post-heading">
                <h2><?php the_title(); ?></h2>
                </div>
								<div 
								data-aos="fade-up" 
								data-aos-delay="300"									
								class="">
								<?php the_post_thumbnail(); ?>
							</div>
                <?php  the_content();  ?>
						<?php endwhile; ?>
		<?php 
		$prev = get_previous_post(); 
		$next = get_next_post(); 
		?>
		<?php if($prev || $next) { ?>
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
										<?php esc_html_e('Previous Post'); ?>
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
										<?php esc_html_e('Next Post'); ?>
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
			<?php }
			wp_reset_postdata();
			?>	
	</div><!-- container -->
	<?php get_footer(); ?>