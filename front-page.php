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
      // this loop shows the posts and event recaps with featured
         $posttypes = array ('post');
         $carouselargs = array(
            'post_type' => $posttypes,
            // 'category_name' => 'featured',
            'posts_per_page' => get_field('news_articles_to_show', $pagenum)
         );

         $carousel_query = new WP_Query( $carouselargs );

         if ( $carousel_query -> have_posts() ) {

            while ( $carousel_query -> have_posts() ) {
               $carousel_query -> the_post();
      ?>
      <div class="card">
         <?php the_post_thumbnail( 'full' );?>
         <div class="card-body">
            <p class="hero-title"><?php the_title(); ?></p>
            <a href="<?php the_permalink();?>" class="hero-link-button">
               <?php if(get_post_type() === 'tribe_events') {
                  ?>Register<?php 
                  }else {
                     ?>See More<?php
                  };?>
            </a>
         </div>                    
      </div>
      <?php
            }
            wp_reset_postdata();
         } 
      ?>

      <?php
      // this loop shows the upcoming events that have featured

         $eventargs = array(
            'post_type' => 'tribe_events',
            'posts_per_page' => get_field('events_to_show', $pagenum),

         );

         if (get_field('show_events', $pagenum)) {
         $eventscarousel_query = new WP_Query( $eventargs );

         if ( $eventscarousel_query -> have_posts() ) {

            while ( $eventscarousel_query -> have_posts() ) {
               $eventscarousel_query -> the_post();
      ?>
      <div class="card">
         <?php the_post_thumbnail( 'full' );?>
         <div class="card-body">
            <p class="hero-title"><?php the_title(); ?></p>
            <p class="hero-excerpt"><?php echo get_the_excerpt(); ?></p>
            <a href="<?php the_permalink();?>" class="hero-link-button">
               <?php if(get_post_type() === 'tribe_events') {
                  ?>Register<?php 
                  }else {
                     ?>See More<?php
                  };?>
            </a>
         </div>                    
      </div>
      <?php
            }
            wp_reset_postdata();
         } 
      } //closes the if loop on the show events option
      ?>

      <!--Join Us Slide-->
      <?php if (get_field('show_join', $pagenum)) { ?>
         <div class="card">
         <img src="http://localhost/fvics/wp-content/uploads/2023/08/canmandawe-ftTsK4QinMw-unsplash-scaled.jpg" alt="alt-text">
            <div class="card-body">
               <p class="hero-title">Join Us</p>
               <p class="hero-excerpt">Become a Member Today</p>
               <a href="join" class="hero-link-button">
                  See More
               </a>
            </div>
         </div>
      <?php }; //closes the if loop for the show join option ?>

   </div>

   <!-- 'Welcome' Section -->
   <section class="page-section">
      <h1 class="home-section-title">Welcome to the Fraser Valley Italo-Canadian Society</h1>
      <div id="welcome-grid" class="home-page-grid home-grid-left">
         <div class="grid-text top-grid-text">
            <h3><?php echo esc_html( get_field('welcome_title') ); ?></h3>
            <p><?php the_field('welcome_message', $pagenum); ?></p>
            <a href="about-us" class="link-button">About Us</a>
            <a href="our-history" class="link-button">Our History</a>
         </div>
         <div class="grid-image">
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
   <section class="page-section">
      <h2 class="home-section-title">News & Updates</h2>
      <div class="home-page-grid news-grid">
         <!-- this div uses the most recent news article, with the featured image -->
         <div class="news-link">
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
            <a href="<?php the_permalink(); ?>">
               <?php the_post_thumbnail( 'full' );?>
               <h3 class="article-thumb-title"><?php the_title(); ?></h3>                    
            </a>        
            <?php
                  }
                  wp_reset_postdata();
               } 
            ?>
         </div>
         <!-- this div is going to show the title and featured image of either the second most recent update, or a specific photo. tbd -->
         <div class="news-link">
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
            <a href="news">
               <?php the_post_thumbnail( 'full' );?>
               <h3 class="article-thumb-title">All News</h3>                    
            </a>
            <?php
                  }
                  wp_reset_postdata();
               } 
            ?>
         </div>
      </div>
   </section>

   <!-- Events Section -->
   <section class="page-section double-section">
      <h2 class="home-section-title">Events</h2>
      <?php 	
      // hiding the current events module if there are no current events
         $countofevents = tribe_get_events(array('ends_after' => 'now'));
         if (count($countofevents) > 0) {
      ?>
            <div class="home-page-grid  home-grid-left">
            <div class="grid-text other-grid-text grid-reverse">
               <?php
                  $home_query = new WP_Query( 'pagename=home' );
                  while ( $home_query->have_posts() ) : $home_query->the_post();
                     the_content();
                  endwhile;
                  wp_reset_postdata();
               ?>
            </div>
            
            <div class="grid-image news-link">
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
               <a href="<?php the_permalink();?>">
                  <?php the_post_thumbnail( 'full' );?>
                  <h3 class="article-thumb-title"><?php the_title(); ?></h3>                    
               </a>
               <?php
                     }
                     wp_reset_postdata();
                  } 
               ?>
            </div>
         </div>
      <?php           

         };

      ?>


      <!-- Events Recaps -->
      <div class="home-page-grid home-grid-right">
         <div class="grid-image">
            <!-- this needs to pull the featured image and title from the most recent recap post -->
            <?php
               $argsImg = array(
                  'post_type' => 'fvics-galleries',
                  'posts_per_page' => 1,
               );
               $gallery_query = new WP_Query( $argsImg );

               if ( $gallery_query -> have_posts() ) {

                  while ( $gallery_query -> have_posts() ) {
                     $gallery_query -> the_post();
                     ?>
                     <a href="<?php the_permalink(); ?>">

                     <?php
                     the_post_thumbnail( 'full' );?>
                     <h3 class="article-thumb-title"><?php the_title(); ?></h3> 
                     </a>
                     <?php
                  }
                  wp_reset_postdata();
               } 
            ?>
         </div>
         <div class="grid-text other-grid-text">
            <h3>Event Galleries</h3>
            <p><?php the_field('event_galleries_message', $pagenum); ?></p>
            <a href='galleries' class="link-button">See Event Galleries</a>
         </div>
      </div>

   </section>

   <!-- Contact section -->
   <section class="page-section double-section">
      <h2 class="home-section-title">Say Hello!</h2>
      <div class="home-page-grid home-grid-left">
         <div class="grid-text other-grid-text grid-reverse">
            <h3>Our Directors</h3>
            <p><?php the_field('directors_section_message', $pagenum); ?></p>
            <a href="directors" class='link-button'>Meet our directors</a>
         </div>
         <div class="grid-image">
            <?php 
               $image = get_field('directors_image', $pagenum);
               $size = 'full';
               if( $image ) {
               echo wp_get_attachment_image( $image, $size);
               }
            ?>
         </div>
      </div>

      <div class="home-page-grid home-grid-right">
         <div class="grid-image">
            <?php 
               $image = get_field('contact_image', $pagenum);
               $size = 'full';
               if( $image ) {
               echo wp_get_attachment_image( $image, $size);
               }
            ?>
         </div>
         <div class="grid-text other-grid-text">
            <h3>Contact Us</h3>
            <p><?php the_field('contact_section_message', $pagenum); ?></p>
            <a href='contact' class='link-button'>Contact Us</a>
         </div>
      </div>

   </section>

</main><!-- #main -->

<?php

get_footer();
