<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package FVICS_by_Adam_H
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="page-404">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'fvics_adamh' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'Well, this is a little embarassing. It looks like we set that page down somewhere and don&rsquo;t remember where. Try a search instead.', 'fvics_adamh' ); ?></p>

						<?php
						get_search_form();

						// the_widget( 'WP_Widget_Recent_Posts' );
						?>

						<!-- <div class="widget widget_categories"> -->
							<!-- <h2 class="widget-title"> -->
								<?php 
									// esc_html_e( 'Most Used Categories', 'fvics_adamh' ); 
								?>
							<!-- </h2> -->
							<!-- <ul> -->
								<?php
								// wp_list_categories(
								// 	array(
								// 		'orderby'    => 'count',
								// 		'order'      => 'DESC',
								// 		'show_count' => 1,
								// 		'title_li'   => '',
								// 		'number'     => 10,
								// 	)
								// );
								?>
							</ul>
						</div><!-- .widget -->

						<?php
						/* translators: %1$s: smiley */
						$fvics_adamh_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'fvics_adamh' ), convert_smilies( '' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$fvics_adamh_archive_content" );

						the_widget( 'WP_Widget_Tag_Cloud' );
						?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div>
	</main><!-- #main -->

<?php
get_footer();
