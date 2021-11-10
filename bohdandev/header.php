<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jeijones
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wrapper">
<header class="header">
<?php if (is_front_page() || is_home()) {  ?>
	<!--?php the_custom_logo(); ?-->
	<?php echo '<div></div>'?>
		<?php } ?>
<?php if (!is_front_page()) {  ?>
<a href="<?php echo get_site_url(); ?>" 
		class="page-back" 
		style="background: url(<?php bloginfo('template_url'); ?>/dist/img/back.svg")>back
	</a>
	<?php } ?>
<nav class="nav-menu">
		<div class="m-menu nav-icon">
				<span></span>
				<span></span>
				<span></span>
			</div>
		<?php 
		wp_nav_menu( array(
			'menu_class'=>'menu',
				'theme_location'=>'header',
				'container' 		 => true,
				'container' 		 => false,
				'menu_class'     => 'menu',
				'menu'            => '', 
				'container_class' => false, 
				'container_id'    => false,
				'menu_id'         => false,
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 3,		
				//'after'=>' /'
		) );
		?>
</nav>


	</header>