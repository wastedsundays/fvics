<?php
/**
 * The template for displaying the front page
 *
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

      <?php
         $carouselargs = array(
            'post_type' => 'post',
            // 'category_name' => 'featured',
            'posts_per_page' => 3

         );


         $carousel_query = new WP_Query( $carouselargs );

         if ( $carousel_query -> have_posts() ) {

            while ( $carousel_query -> have_posts() ) {
               $carousel_query -> the_post();
      ?>
      <div class="card">
         <?php the_post_thumbnail( 'full' );?>
         <div class="card-body">
            <h3 class="article-thumb-title"><?php the_title(); ?></h3>
            <button>Do Thing</button>
         </div>                    
      </div>
      <?php
            }
            wp_reset_postdata();
         } 
      ?>

      <!--Slide One-->
      <div class="card">
      <img src="http://localhost/fvics/wp-content/uploads/2023/08/canmandawe-ftTsK4QinMw-unsplash-scaled.jpg" alt="alt-text">
         <div class="card-body">
            <h3 class="card-title">Join Us</h3>
            <p>Become a Member Today</p>
            <button>Join Us</button>
         </div>
      </div>

   </div>

   <!-- 'Welcome' Section -->
   <section>
      <div class="home-page-grid">
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
      </div>
   </section>

   <!-- News Section -->
   <section>
      <h2>News & Updates</h2>
      <div class="home-page-grid">
         <!-- this div uses the most recent news article, with the featured image -->
         <div>
            <?php
               $newsargs = array(
                  'post_type' => 'post',
                  'posts_per_page' => 1
               );
               $news_query = new WP_Query( $newsargs );

               if ( $news_query -> have_posts() ) {

                  while ( $news_query -> have_posts() ) {
                     $news_query -> the_post();
            ?>
         
            <?php the_post_thumbnail( 'full' );?>
            <h3 class="article-thumb-title"><?php the_title(); ?></h3>                    

            <?php
                  }
                  wp_reset_postdata();
               } 
            ?>
         </div>
         <!-- this div is going to show the title and featured image of either the second most recent update, or a specific photo. tbd -->
         <div>
            <?php
               $oldnewsargs = array(
                  'post_type' => 'post',
                  'offset' => 1,
                  'posts_per_page' => 1
               );
               $oldnews_query = new WP_Query( $oldnewsargs );

               if ( $oldnews_query -> have_posts() ) {

                  while ( $oldnews_query -> have_posts() ) {
                     $oldnews_query -> the_post();
            ?>
         
            <?php the_post_thumbnail( 'full' );?>
            <h3 class="article-thumb-title">All News</h3>                    

            <?php
                  }
                  wp_reset_postdata();
               } 
            ?>
         </div>
      </div>
   </section>

   <!-- Events Section -->
   <section>

      <div class="home-page-grid">
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
                  'posts_per_page' => 1
               );
               $event_query = new WP_Query( $args );

               if ( $event_query -> have_posts() ) {

                  while ( $event_query -> have_posts() ) {
                     $event_query -> the_post();
            ?>
         
            <?php the_post_thumbnail( 'full' );?>
            <h3 class="article-thumb-title"><?php the_title(); ?></h3>                    

            <?php
                  }
                  wp_reset_postdata();
               } 
            ?>
         </div>
      </div>

      <!-- Events Recaps -->
      <div class="home-page-grid">
         <div>
            <!-- this needs to pull the featured image and title from the most recent recap post -->
            <img src="http://localhost/fvics/wp-content/uploads/2023/08/canmandawe-ftTsK4QinMw-unsplash-scaled.jpg" alt="alt-text">
         </div>
         <div>
            <h2>Event Galleries</h2>
            <p><?php the_field('event_galleries_message', $pagenum); ?></p>
            <button>See Event Galleries</button>
         </div>
      </div>

   </section>

   <!-- Contact section -->
   <section>

      <div class="home-page-grid">
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
      </div>

      <div class="home-page-grid">
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
      </div>

   </section>

</main><!-- #main -->

<?php

get_footer();
