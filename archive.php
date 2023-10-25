<?php
/**
 * The template for displaying archive pages
 * 
 * 
 * 
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FVICS_by_Adam_H
 */

get_header();
?>

	<main id="primary" class="site-main archive-page">

		<?php if ( have_posts() ) : ?>

			<div class="hero-section news-hero-section">
					<?php 
						// fvics_adamh_post_thumbnail(); 
					?>

					<div class="card-body">
						<?php if ( is_post_type_archive() ) {
							post_type_archive_title( '<h1 class="hero-title">', '</h1>' );
						} else {
						the_archive_title( '<h1 class="hero-title">News Archive ', '</h1>' );
						}?>
					</div>
				</div>
				<div class="archive-page-content">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				?>

				<?php
				the_post();

				?>
				<div class="archive-single-grid">
					<?php fvics_adamh_post_thumbnail();
					// the_permalink();
					?>
					<div class="archive-box-text">
						<h3><?php the_title();?></h3>
						<p><?php the_excerpt();?></p>
						<a href="<?php the_permalink();?>" class="link-button">Read More</a>
					</div>
				</div>
				<?php
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				// get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
			?>
			</div>
			<?php
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
if ( !is_post_type_archive() ) {
get_sidebar();
}
get_footer();
