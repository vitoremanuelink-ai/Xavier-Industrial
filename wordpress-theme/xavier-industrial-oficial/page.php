<?php
/**
 * page.php - Template padrao para paginas sem template dedicado.
 *
 * @package xavier-industrial-oficial
 */
get_header(); ?>

<main class="xi-main">
	<section style="max-width: 900px; margin: 140px auto 80px; padding: 0 24px;">
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?>>
				<h1 class="xi-section-title"><?php the_title(); ?></h1>
				<div class="xi-section-body"><?php the_content(); ?></div>
			</article>
		<?php endwhile; ?>
	</section>
</main>

<?php get_footer();
