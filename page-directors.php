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

							// Loop through rows.
							while( have_rows('director_entry') ) : the_row();
			
								// Load sub field value.
								$sub_name = get_sub_field('name');
								$sub_position = get_sub_field('position');
								$sub_email = get_sub_field('email');
								$sub_bio = get_sub_field('director_bio');
								$sub_image = get_sub_field('director_image');
								// Do something...
								echo "<div class='card-body'>".$sub_name ."-". $sub_position ."-". $sub_email ."-". $sub_bio ."-". $sub_image."</div>";
			
							// End loop.
							endwhile;
			
						// No value.
						else :
							// Do something...
						endif;


		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
