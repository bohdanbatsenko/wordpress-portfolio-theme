<?php /*
Template Name: Websites
*/

get_header(); ?>


<div class="page">
<h1 
	data-aos="fade-right" 
	data-aos-delay="50"	
	class="page-title"><?php the_title(); ?>
</h1>	

<div 
data-aos="fade-up" 
	data-aos-delay="50"	
class="container">

		<?php the_content(); ?>

</div>
</div>


<ul class="projects__list">

	<li class="project__list-item">
		<article class="project-item">
			<a href="https://www.bohdandev.com.ua" target="_blank" class="project-item__link">
				<div class="project-item__bg" 
				style="background-image: url(<?php bloginfo('template_url'); ?>/dist/img/projects/bohdandev.jpg")>
				</div>
				<div class="project-container">
					<span class="project-item__theme">Portfolio website</span>
					<h3 class="project-item__title">Bohdandev</h3>
				</div>
			</a>
		</article>
	</li>
	<li class="project__list-item">
		<article class="project-item">
			<a href="http://west-coast.iyf.com.ua/" target="_blank" class="project-item__link">
				<div class="project-item__bg" 
				style="background-image: url(<?php bloginfo('template_url'); ?>/dist/img/projects/west-coast-2_sm.jpg")>
				</div>
				<div class="project-container">
					<span class="project-item__theme">Credit: Adrian Twarog</span>
					<h3 class="project-item__title">E-commerce project</h3>
				</div>
			</a>
		</article>
	</li>
	<li class="project__list-item">
		<article class="project-item">
			<a href="http://dreamkitchen.iyf.com.ua/" target="_blank" class="project-item__link">
				<div class="project-item__bg" 
				style="background-image: url(<?php bloginfo('template_url'); ?>/dist/img/projects/kitchen.jpg")>
				</div>
				<div class="project-container">
					<span class="project-item__theme">Corporate website</span>
					<h3 class="project-item__title">Dream kitchen</h3>
				</div>
			</a>
		</article>
	</li>
	<li class="project__list-item">
		<article class="project-item">
			<a href="http://ortodont.iyf.com.ua/" target="_blank" class="project-item__link">
				<div class="project-item__bg" 
				style="background-image: url(<?php bloginfo('template_url'); ?>/dist/img/projects/dentist.jpg")>
				</div>
				<div class="project-container">
					<span class="project-item__theme">Corporate website</span>
					<h3 class="project-item__title">Vinir dental</h3>
				</div>
			</a>
		</article>
	</li>
	<li class="project__list-item">
		<article class="project-item">
			<a href="http://forum.imei.kiev.ua/" target="_blank" class="project-item__link">
				<div class="project-item__bg" 
				style="background-image: url(<?php bloginfo('template_url'); ?>/dist/img/projects/imei.jpg")>
				</div>
				<div class="project-container">
					<span class="project-item__theme">Corporate website</span>
					<h3 class="project-item__title">Imei forum</h3>
				</div>
			</a>
		</article>
	</li>
	<li class="project__list-item">
		<article class="project-item">
			<a href="http://globalyouth.com.ua/" target="_blank" class="project-item__link">
				<div class="project-item__bg" 
				style="background-image: url(<?php bloginfo('template_url'); ?>/dist/img/projects/globalyouth.jpg")>
				</div>
				<div class="project-container">
					<span class="project-item__theme">Corporate website</span>
					<h3 class="project-item__title">Global Youth Community</h3>
				</div>
			</a>
		</article>
	</li>
	<li class="project__list-item">
		<article class="project-item">
			<a href="http://uff.in.ua/" target="_blank" class="project-item__link">
				<div class="project-item__bg" 
				style="background-image: url(<?php bloginfo('template_url'); ?>/dist/img/projects/uff.jpg")>
				</div>
				<div class="project-container">
					<span class="project-item__theme">Corporate website</span>
					<h3 class="project-item__title">Ukrainian Family Foundation</h3>
				</div>
			</a>
		</article>
	</li>

</ul>




	
<?php get_footer(); ?>