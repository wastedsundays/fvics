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
			the_post();



			get_template_part( 'template-parts/content', 'page-static' );


						// Check rows existexists.
						if( have_rows('director_entry') ):
							?><div class="directors-bio"><?php
							// Loop through rows.
							while( have_rows('director_entry') ) : the_row();
			
								// Load sub field value.
								$sub_name = get_sub_field('name');
								$sub_position = get_sub_field('position');
								$sub_email = get_sub_field('email');
								$sub_bio = get_sub_field('director_bio');
								$sub_image = get_sub_field('director_image');
								// Do something...
								?>
									<div class="director-card">
										<div class="director-image">
											<?php
												if( $sub_image ) {
													echo wp_get_attachment_image( $sub_image, "bio-pic" );
												}
											?>
										</div>
										<div class="director-info">
											<h3><?php echo $sub_name; ?></h3>
											<h4><?php echo $sub_position; ?></h4>
											<p><?php echo $sub_bio; ?></p>
											<div><?php echo $sub_email; ?></div>
										</div>
									</div>
								<?php

			
							// End loop.
							endwhile;
							?></div><?php
			
						// No value.
						else :
							// Do something...
						endif;


		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
