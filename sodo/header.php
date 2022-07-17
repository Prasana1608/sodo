<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sodo
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
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'sodo' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="site-branding flex">
				<div class="flex">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png">
						<p class="site-title"><?php bloginfo( 'name' ); ?></p>
						</a>
						<?php
					else :
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png">
						<p class="site-title"><?php bloginfo( 'name' ); ?></p>
						</a>
						<?php
					endif;
					?>
					<?php
										wp_nav_menu( array(
											'theme_location' => 'header-menus',
											'menu_id'        => 'header-menus',
										) );
									?>
				</div>
				<div>
				<?php
										wp_nav_menu( array(
											'theme_location' => 'login-menus',
											'menu_id'        => 'login-menus',
										) );
									?>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
