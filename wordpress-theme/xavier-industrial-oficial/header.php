<?php
/**
 * header.php - Cabecalho comum (doctype, head, nav).
 *
 * @package xavier-industrial-oficial
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php echo esc_url( home_url( '/wp-content/uploads/2023/03/cropped-logo-radape-32x32.png' ) ); ?>" sizes="32x32" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } ?>

	<!-- NAVBAR -->
	<nav class="xi-nav">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="xi-nav-logo">
			<img src="<?php echo esc_url( home_url( '/wp-content/uploads/2023/03/logo-radape.png' ) ); ?>" alt="Xavier Industrial" height="44">
		</a>
		<?php xavier_default_nav(); ?>
	</nav>
