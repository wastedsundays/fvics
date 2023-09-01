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

	<div class="posts-carousel px-5">
   <!--Slide One-->
   <div class="card">
      <img width="350" height="233" src="https://via.placeholder.com/150" class="w-100" alt="alt-text">
      <div class="card-body">
         <h3 class="card-title">Your Post heading0</h3>
         <p>Your Post Excerpt</p>
         <a href="#" class="btn btn-primary">View More</a>
      </div>
   </div>
   <!--Slide Two-->
   <div class="card">
      <img width="500" height="233" src="https://via.placeholder.com/150" class="w-100" alt="alt-text">
      <div class="card-body">
         <h3 class="card-title">Your Post heading1</h3>
         <p>Your Post Excerpt</p>
         <a href="#" class="btn btn-primary">View More</a>
      </div>
   </div>
   <div class="card">
      <img width="350" height="233" src="https://via.placeholder.com/150" class="w-100" alt="alt-text">
      <div class="card-body">
         <h3 class="card-title">Your Post heading2</h3>
         <p>Your Post Excerpt</p>
         <a href="#" class="btn btn-primary">View More</a>
      </div>
   </div>
   <div class="card">
      <img width="350" height="233" src="https://via.placeholder.com/150" class="w-100" alt="alt-text">
      <div class="card-body">
         <h3 class="card-title">Your Post heading3</h3>
         <p>Your Post Excerpt</p>
         <a href="#" class="btn btn-primary">View More</a>
      </div>
   </div>
</div>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
