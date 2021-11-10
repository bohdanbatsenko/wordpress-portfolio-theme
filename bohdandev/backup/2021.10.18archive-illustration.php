<?php /*
Template Name: Illustrations
*/
get_header(); ?>

<div class="page">

	<h1 class="page-title">I Draw</h1>

<?php
 $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(  
			'post_type' => 'illustration',
			'post_status' => 'publish',
			'posts_per_page' => 3, 
			// 'orderby' => 'title', 
			// 'order' => 'ASC', 
			'paged' => $paged,
			//'paged' => get_query_var('paged', 1) // страница пагинации
	); ?>
  
    <!-- pagination here -->
     <!-- the loop -->
		<?php  $archive_loop = new WP_Query( $args ); ?>
		<div class="container">
			<?php if($archive_loop->have_posts()) : ?>
		<?php while ( $archive_loop->have_posts() ) : $archive_loop->the_post();  ?>
				
				<article class="illustration">
					<a href="<?php the_permalink(); ?>">
					<h2 class="illustration__title"><?php the_title(); ?></h2>
					</a>
					<a href="<?php echo the_post_thumbnail_url( 'full' ); ?>" 
					title="<?php echo the_title(); ?>">
					<img 
						src="<?php the_post_thumbnail_url( 'illustration_big' ); ?>" 
						srcset="<?php the_post_thumbnail_url( 'illustration_small' ); ?> 500w,
							<?php the_post_thumbnail_url( 'illustration_big' ); ?> 1000w,		" 
						sizes="100vw"
						alt="<?php echo the_title_attribute(); ?>"
						>


						</a>
					<div class="illustration__date"><?php echo get_the_date('d/m/y'); ?></div>
				</article>

    <?php endwhile; 
	?>
		<!-- end of the loop -->

		
		<div class="pagination">

			 <?php $total_pages = $archive_loop->max_num_pages;
			 

			if ($total_pages > 1){ ?>
				<div class="archive-pagination">
				<?php $current_page = max(1, get_query_var('paged'));
	
					echo paginate_links(array(
						//'mid_size'  => 2,
							'base' => get_pagenum_link( 1) . '%_%',
							'format' => 'page/%#%',
							'current' => $current_page,
							'total' => $total_pages,
							'prev_text'    => __('« prev'),
							'next_text'    => __('next »'),
		
					));
			  
			?> 
			</div>
			<?php } 
			wp_reset_postdata();
			?>


    </div>
	</div><!-- container -->

<?php endif; ?>


		</div><!-- page -->


 

<?php get_footer(); ?>