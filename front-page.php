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

$pagenum = 114;

?>

	<main id="primary" class="site-main">

	<div class="posts-carousel px-5">
   <!--Slide One-->
   <div class="card">
   <img src="http://localhost/fvics/wp-content/uploads/2023/08/canmandawe-ftTsK4QinMw-unsplash-scaled.jpg" alt="alt-text">
      <div class="card-body">
         <h3 class="card-title">Your Post heading0</h3>
         <p>Your Post Excerpt</p>
         <a href="#" class="btn btn-primary">View More</a>
      </div>
   </div>
   <!--Slide Two-->
   <div class="card">
      <img src="http://localhost/fvics/wp-content/uploads/2023/08/canmandawe-ftTsK4QinMw-unsplash-scaled.jpg" alt="alt-text">
      <div class="card-body">
         <h3 class="card-title">Your Post heading1</h3>
         <p>Your Post Excerpt</p>
         <a href="#" class="btn btn-primary">View More</a>
      </div>
   </div>
   <!-- Slide Three -->
   <div class="card">
   <img src="http://localhost/fvics/wp-content/uploads/2023/08/canmandawe-ftTsK4QinMw-unsplash-scaled.jpg" alt="alt-text">
      <div class="card-body">
         <h3 class="card-title">Your Post heading2</h3>
         <p>Your Post Excerpt</p>
         <a href="#" class="btn btn-primary">View More</a>
      </div>
   </div>
   <!-- Slide Four -->
   <div class="card">
   <img src="http://localhost/fvics/wp-content/uploads/2023/08/canmandawe-ftTsK4QinMw-unsplash-scaled.jpg" alt="alt-text">
      <div class="card-body">
         <h3 class="card-title">Your Post heading3</h3>
         <p>Your Post Excerpt</p>
         <a href="#" class="btn btn-primary">View More</a>
      </div>
   </div>
</div>

<!-- 'Welcome' Section Left Side Text -->
<section class="home-page-grid">
   <div>
      <h1>Welcome to the Fraser Valley Italo-Canadian Society</h1>
      <p><?php the_field('welcome_message', $pagenum); ?></p>
      <button>About Us</button>
      <button>Our History</button>
   </div>
   <div>
   <?php 
      $image = get_field('welcome_image', $pagenum);
      $size = 'full';
      if( $image ) {
         echo wp_get_attachment_image( $image, $size);
      }
   ?>
   </div>
</section>

<!-- News section - uses two images side by side with a small gap in between.  -->
<section class="home-page-grid">
   <!-- this div uses the most recent news article, with the featured image -->
   <div>
      <img src="http://localhost/fvics/wp-content/uploads/2023/08/canmandawe-ftTsK4QinMw-unsplash-scaled.jpg" alt="alt-text">
   </div>
   <!-- this div is going to show the title and featured image of either the second most recent update, or a specific photo. tbd -->
   <div>
      <img src="http://localhost/fvics/wp-content/uploads/2023/08/canmandawe-ftTsK4QinMw-unsplash-scaled.jpg" alt="alt-text">
   </div>
</section>

<!-- Events Section Left Side Text -->
<section class="home-page-grid">
   <div>
      <?php
         $home_query = new WP_Query( 'pagename=home' );
         while ( $home_query->have_posts() ) : $home_query->the_post();
            the_content();
         endwhile;
         wp_reset_postdata();
      ?>
   </div>
   <div>
   <?php
			$args = array(
				'post_type' => 'tribe_events',
				// 'post__not_in' => array( get_the_ID() ),
				'posts_per_page' => 1
			);
			$news_query = new WP_Query( $args );

         if ( $news_query -> have_posts() ) {

                while ( $news_query -> have_posts() ) {
                  $news_query -> the_post();
              ?>
 
                  <?php the_post_thumbnail( 'full' );?>
                  <h4 class="article-thumb-title"><?php the_title(); ?></h4>                    

              <?php
                }
              ?>

                          

            <?php
            wp_reset_postdata();
          } 
          ?>
   </div>
</section>

<!-- Events Section right side text -->
<section class="home-page-grid">
   <div>
      <img src="http://localhost/fvics/wp-content/uploads/2023/08/canmandawe-ftTsK4QinMw-unsplash-scaled.jpg" alt="alt-text">
   </div>
   <div>
      <h2>Event Galleries</h2>
      <p><?php the_field('event_galleries_message', $pagenum); ?></p>
      <button>See Event Galleries</button>
   </div>
</section>

<!-- Contact Section Left Side Text -->
<section class="home-page-grid">
   <div>
      <h2>Our Directors</h2>
      <p><?php the_field('directors_section_message', $pagenum); ?></p>
      <button>Meet our directors</button>
   </div>
   <div>
      <?php 
         $image = get_field('directors_image', $pagenum);
         $size = 'full';
         if( $image ) {
         echo wp_get_attachment_image( $image, $size);
         }
      ?>
   </div>
</section>

<!-- Contact Section right side text -->
<section class="home-page-grid">
   <div>
      <?php 
         $image = get_field('contact_image', $pagenum);
         $size = 'full';
         if( $image ) {
         echo wp_get_attachment_image( $image, $size);
         }
      ?>
   </div>
   <div>
      <h2>Contact Us</h2>
      <p><?php the_field('contact_section_message', $pagenum); ?></p>
      <button>Contact Us</button>
   </div>
</section>

	</main><!-- #main -->

<?php

get_footer();
