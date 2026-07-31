<?php
/**
 * 404.php - Pagina de erro (nao encontrada).
 *
 * @package xavier-industrial-oficial
 */
get_header(); ?>

<main class="xi-main">
	<section style="min-height: 60vh; display: flex; align-items: center; justify-content: center; text-align: center; padding: 160px 24px 100px;">
		<div>
			<div class="xi-section-label" style="justify-content:center;">ERRO 404</div>
			<h1 class="xi-section-title">Pagina nao encontrada</h1>
			<p class="xi-section-body">A pagina que voce procura nao existe ou foi movida.</p>
			<p style="margin-top: 24px;">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="xi-btn-primary">Voltar ao inicio</a>
			</p>
		</div>
	</section>
</main>

<?php get_footer();
