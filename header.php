<?php
/**
 * The Header
 *
 * Displays all of the <head> section and everything up till <main>
 *
 * @package Roseta
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php cryout_meta_hook(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php
	cryout_header_hook();
	wp_head();
?>
</head>

<body <?php body_class(); cryout_schema_microdata( 'body' );?>>
	<?php cryout_body_hook(); ?>
<div id="site-wrapper">
	<header id="masthead" class="cryout" <?php cryout_schema_microdata( 'header' ) ?> role="banner">

		<div id="site-header-main">

			<div class="site-header-top">

				<div class="site-header-inside">

					<div id="branding">
						<?php cryout_branding_hook();?>
						<a id="nav-toggle"><i class="icon-menu"></i></a>
					</div><!-- #branding -->

					<div id="top-section-widget">
						<?php do_action( 'cryout_top_section_hook' ) ?>
					</div>


					<div id="top-section-menu" role="navigation"  aria-label="<?php esc_attr_e( 'Top Menu', 'roseta' ) ?>" <?php cryout_schema_microdata( 'menu' ); ?>>
						<?php cryout_topmenu_hook(); ?>
					</div><!-- #top-menu -->

				</div><!-- #site-header-inside -->

			</div><!--.site-header-top-->

			<nav id="mobile-menu">
				<span id="nav-cancel"><i class="icon-cancel"></i></span>
				<?php cryout_mobilemenu_hook(); ?>
			</nav> <!-- #mobile-menu -->

			<div class="site-header-bottom">

				<div class="site-header-bottom-fixed">

					<div class="site-header-inside">

						<nav id="access" role="navigation"  aria-label="<?php esc_attr_e( 'Primary Menu', 'roseta' ) ?>" <?php cryout_schema_microdata( 'menu' ); ?>>
							<?php cryout_access_hook();?>
						</nav><!-- #access -->

					</div><!-- #site-header-inside -->

				</div><!-- #site-header-bottom-fixed -->

			</div><!--.site-header-bottom-->

		</div><!-- #site-header-main -->

		<div id="header-image-main">
			<div id="header-image-main-inside">
				<?php cryout_headerimage_hook(); ?>
			</div><!-- #header-image-main-inside -->
		</div><!-- #header-image-main -->

	</header><!-- #masthead -->
    <div id="breadcrumbs-container" class="cryout one-column"><div id="breadcrumbs-container-inside"><div id="breadcrumbs"> <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?></div></div></div>
	
	<?php if ( ! roseta_header_title_check() ) cryout_breadcrumbs_hook(); ?>

	<?php cryout_absolute_top_hook(); ?>

	<div id="content" class="cryout">
		<?php cryout_main_hook(); ?>
