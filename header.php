<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- Web fonts -->
<link href='https://fonts.googleapis.com/css?family=Varela+Round|Arimo:400,400italic,700' rel='stylesheet' type='text/css'>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/favicon.ico">
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="row middle-xs">
				<div class="col-xs-6">
					<div class="site-branding">
						<h1 class="site-title m0 h3"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<p class="site-description screen-reader-text"><?php bloginfo( 'description' ); ?></p>
					</div><!-- .site-branding -->
				</div>

				<div class="col-xs-6 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<button class="menu-toggle btn btn-primary icon-menu" aria-controls="primary-menu" aria-expanded="false"></button>
						<?php wp_nav_menu( array( 'theme_location' => 'main-nav', 'menu_id' => 'main-nav', 'menu_class' => 'main-nav--menu', 'container_class' => 'nav-container' ) ); ?>
					</nav><!-- #site-navigation -->
				</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">