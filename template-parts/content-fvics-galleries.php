<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FVICS_by_Adam_H
 */

?>
<?php fvics_adamh_post_thumbnail(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post'|'fvics-galleries' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				fvics_adamh_posted_on();
				fvics_adamh_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->



	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'fvics_adamh' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
		?>
		<!-- Showing sponsors section on event page -->
		<div class="sponsor-wrapper">
			<?php $sponsors = get_field('event_sponsors'); ?>
			<?php if ( !empty( $sponsors ) ): ?> <p class="sponsor-thanks">Thank You to Our Sponsors</p> 
				<div class="sponsor-section">
					<?php foreach($sponsors as $sponsor):?>
						<div class="sponsor">
							<?php $photo = get_field('sponsor_logo', $sponsor->ID);?>
							<?php $url = get_field('sponsor_website', $sponsor->ID);?>
							<a href=<?php echo esc_url($url); ?> target="_blank" rel="noopener noreferrer">
								<img src=<?php echo esc_url($photo['url']); ?> alt="<?php ($photo['alt']) ?>Logo" class="sponsor-logo"/>
								<p><?php echo get_the_title( $sponsor->ID); ?></p>
							</a>
						</div>

					<?php endforeach;?>
				</div>
			<?php endif ?>
		</div> 
		<!-- End of Sponsor Wrapper -->
		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fvics_adamh' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php fvics_adamh_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
