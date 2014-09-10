<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package _tk
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_enqueue_script('jquery'); ?>
<?php wp_head(); ?>

<!-- Common style -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo bloginfo('template_url') ?>/common/css/bootstrap-overlay.css">
<link rel="stylesheet" href="<?php echo bloginfo('template_url') ?>/common/css/material.css">
<link rel="stylesheet" href="<?php echo bloginfo('template_url') ?>/common/css/nav.css">

<!-- Custom page templates styles -->
<?php if(is_page_template('home-page.php')) :?>
	<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url') ?>/common/css/home-page.css" media="screen" />
<?php endif;?>

<script src="<?php echo bloginfo('template_url') ?>/common/js/velocity-1.0.0.js"></script>
<script src="<?php echo bloginfo('template_url') ?>/common/js/velocity-ui.js"></script>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>

<nav class="site-navigation">
	<div class="row">
		<div class="site-navigation-inner col-sm-12">
			<div class="navbar navbar-default">
				<div class="container">
					<div class="navbar-header">
						<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
							<span class="sr-only">Toggle navigation</span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						</button>

						<!-- Your site title as branding in the menu -->
						<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo bloginfo('template_url') ?>/common/images/logo-paillasse-menu.png" alt="La Paillasse">
						</a>
						<!--<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>-->
					</div>

					<!-- The WordPress Menu goes here -->
					<?php wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'container_class' => 'collapse navbar-collapse navbar-responsive-collapse',
							'menu_class' => 'nav navbar-nav',
							'fallback_cb' => '',
							'menu_id' => 'main-menu',
							'walker' => new wp_bootstrap_navwalker()
						)
					); ?>
				</div><!--.container -->
			</div><!-- .navbar -->
		</div>
	</div>
</nav><!-- .site-navigation -->

<?php if(is_page_template('home-page.php')) :?>
<header id="masthead" class="site-header" role="banner">
	<div class="container">
		<div class="row">
			<div class="site-header-inner col-sm-12">

				<div class="site-branding">
					<!-- <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1> -->
					<h1 class="site-description"><?php bloginfo( 'description' ); ?></h1>
					<a href="#">
    					<button class="btn btn-primary">En savoir plus</button>
					</a>
				</div>

				<?php $header_image = get_header_image();
				if ( ! empty( $header_image ) ) { ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
					</a>
				<?php } // end if ( ! empty( $header_image ) ) ?>

			</div>
		</div>
	</div><!-- .container -->
</header><!-- #masthead -->
<?php endif;?>

<div class="main-content">
	<div class="container">
		<div class="row">
			<div id="content" class="main-content-inner col-sm-12 col-md-12">

