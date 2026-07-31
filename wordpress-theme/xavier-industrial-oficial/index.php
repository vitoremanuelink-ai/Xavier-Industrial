<?php
/**
 * index.php - Template de fallback (blog, busca, arquivos).
 *
 * @package xavier-industrial-oficial
 */
get_header(); ?>

<main class="xi-main">
	<section style="max-width: 900px; margin: 140px auto 80px; padding: 0 24px;">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class(); ?>>
					<h1 class="xi-section-title"><?php the_title(); ?></h1>
					<div class="xi-section-body"><?php the_content(); ?></div>
				</article>
			<?php endwhile; ?>
			<?php the_posts_navigation(); ?>
		<?php else : ?>
			<h1 class="xi-section-title">Nada encontrado</h1>
			<p class="xi-section-body">O conteudo solicitado nao esta disponivel.
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Voltar ao inicio</a>.</p>
		<?php endif; ?>
	</section>
</main>

<?php get_footer();
