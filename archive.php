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
						<?php post_type_archive_title( '<h1 class="hero-title">', '</h1>' ); ?>
					</div>
				</div>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				?>

				<?php
				the_post();

				?>
				<ul>
					<li><a href="<?php the_permalink();?>"><?php fvics_adamh_post_thumbnail(); the_title(); the_excerpt();?></a></li>
				</ul>
				<?php
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				// get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
