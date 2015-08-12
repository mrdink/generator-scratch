<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package <%= opts.projectTitle %>
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
<!--[if lt IE 9]>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/ie.js"></script>
<![endif]-->
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '<%= opts.funcPrefix %>' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<% if ( opts.sass ) { %><nav id="site-navigation" class="main-navigation top-bar" data-topbar role="navigation">
	    <ul class="title-area">
	      <li class="name">
	      <?php if ( is_front_page() && is_home() ) : ?>
	        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	      <?php else : ?>
	        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
	      <?php endif; ?>
	      </li>
	       <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
	      <li class="toggle-topbar menu-icon"><a href="#"><span><?php echo esc_html( 'Menu' , '<%= opts.funcPrefix %>' ); ?></span></a></li>
	    </ul><!-- .title-area -->

	    <section class="top-bar-section">
  	    <?php if ( has_nav_menu( 'social' ) ) : ?>
  	      <?php
  	      	wp_nav_menu( array(
  	      		'theme_location' 	=> 'social',
  	      		'menu_id' 				=> 'social-menu',
  	      		'menu_class'     	=> 'social-navigation right',
  	      		'link_before'    	=> '<span class="screen-reader-text">',
  	      		'link_after'     	=> '</span>',
  	      		'container' 			=> '',
  	      		'depth' 					=> '1'
  	      	)
  	      ); ?>
  		  <?php endif; ?>
			  <?php if ( has_nav_menu( 'primary' ) ) : ?>
		      <?php
		        wp_nav_menu( array(
		          'menu_id' => 'primary-menu',
		          'theme_location' => 'primary',
		          'menu_class'     => 'left',
		          'walker' => new <%= opts.funcPrefix %>_topbar_walker(),
		          'container' => ''
		        ) );
		      ?>
	      <?php endif; ?>
	    </section><!-- .top-bar-section -->
	  </nav><!-- #site-navigation -->
		<% } else { %><div class="site-branding">
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', '<%= opts.funcPrefix %>' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation --><% } %>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
