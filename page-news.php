<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FVICS_by_Adam_H
 */
get_header();
?>

	<main id="primary" class="site-main">

			<?php
			while ( have_posts() ) :
				?>
				<div class="hero-section">
					<?php fvics_adamh_post_thumbnail(); ?>

					<div class="card-body">
						<?php the_title( '<h1 class="hero-title">', '</h1>' ); ?>
					</div>
				</div>
				<?php
				the_post();?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



			
				<?php /*fvics_adamh_post_thumbnail();*/ ?>
			
				<div class="entry-content news-page-content">
					<?php
					the_content();
			
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fvics_adamh' ),
							'after'  => '</div>',
						)
					);
					?>
				</div><!-- .entry-content -->
			
				<?php if ( get_edit_post_link() ) : ?>
					<footer class="entry-footer">
						<?php
						edit_post_link(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Edit <span class="screen-reader-text">%s</span>', 'fvics_adamh' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post( get_the_title() )
							),
							'<span class="edit-link">',
							'</span>'
						);
						?>
					</footer><!-- .entry-footer -->
				<?php endif; ?>
			</article><!-- #post-<?php the_ID(); ?> -->
			<?php
				
			endwhile; // End of the loop.
			get_sidebar();
			?>

		</main><!-- #main -->

	<?php
	// get_sidebar();

get_footer();

