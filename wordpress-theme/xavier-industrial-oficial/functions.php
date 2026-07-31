<?php
/**
 * functions.php - Tema Xavier Industrial Oficial
 *
 * @package xavier-industrial-oficial
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'xavier_setup' ) ) {
	function xavier_setup() {
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
		add_theme_support( 'custom-logo' );
		register_nav_menus( array(
			'principal' => __( 'Menu Principal', 'xavier-industrial-oficial' ),
		) );
	}
}
add_action( 'after_setup_theme', 'xavier_setup' );

if ( ! function_exists( 'xavier_asset_ver' ) ) {
	function xavier_asset_ver( $rel ) {
		$path = get_template_directory() . $rel;
		return file_exists( $path ) ? filemtime( $path ) : '1.0.0';
	}
}

if ( ! function_exists( 'xavier_assets' ) ) {
	function xavier_assets() {
		$uri = get_template_directory_uri();

		// Font Awesome (mesma versao usada no site original).
		wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );

		// CSS de design preservado do site estatico.
		wp_enqueue_style( 'xavier-styles', $uri . '/assets/css/styles.css', array( 'font-awesome' ), xavier_asset_ver( '/assets/css/styles.css' ) );

		// style.css do tema (identidade / cabecalho).
		wp_enqueue_style( 'xavier-theme', get_stylesheet_uri(), array( 'xavier-styles' ), wp_get_theme()->get( 'Version' ) );

		// JavaScript por pagina (no rodape, sem dependencias).
		if ( is_front_page() ) {
			wp_enqueue_script( 'xavier-home', $uri . '/assets/js/xavier-home.js', array(), xavier_asset_ver( '/assets/js/xavier-home.js' ), true );
		}
		if ( is_page( 'servicos' ) || is_page_template( 'page-servicos.php' ) ) {
			wp_enqueue_script( 'xavier-servicos', $uri . '/assets/js/xavier-servicos.js', array(), xavier_asset_ver( '/assets/js/xavier-servicos.js' ), true );
		}
		if ( is_page( 'unidade-canaa' ) || is_page_template( 'page-unidade-canaa.php' ) ) {
			wp_enqueue_script( 'xavier-unidade', $uri . '/assets/js/xavier-unidade.js', array(), xavier_asset_ver( '/assets/js/xavier-unidade.js' ), true );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'xavier_assets' );

/**
 * Menu de navegacao padrao (fiel ao site original: ancoras diretas, sem <ul>).
 */
if ( ! function_exists( 'xavier_default_nav' ) ) {
	function xavier_default_nav() {
		$links = array(
			array( home_url( '/' ),             'Home' ),
			array( home_url( '/sobre/' ),       'Sobre nos' ),
			array( home_url( '/servicos/' ),    'Servicos' ),
			array( home_url( '/equipamentos/' ),'Equipamentos' ),
			array( home_url( '/#filial-pa' ),   'Filial PA' ),
			array( home_url( '/contato/' ),     'Contato' ),
		);
		echo '<div class="xi-nav-links">';
		foreach ( $links as $l ) {
			printf( '<a href="%s">%s</a>', esc_url( $l[0] ), esc_html( $l[1] ) );
		}
		echo '</div>';
	}
}
